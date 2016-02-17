<?php
$newLine = '</br>'. str_repeat('-', 100) . '</br>';
/*-------------------------------------------------------------------------------
<==================== Alter table, Alter column, Type int ====================>
-------------------------------------------------------------------------------*/

echo "ALTER TABLE affilired.actionsoncustomer ALTER COLUMN market_language 
TYPE int4 USING market_language::INTEGER $newLine";

/*-------------------------------------------------------------
<==================== Trigger on delete ====================>
-------------------------------------------------------------*/

echo "CREATE OR REPLACE FUNCTION actiononcustomer_merchant_delaft()
RETURNS trigger AS
$BODY$
BEGIN
DELETE FROM affilired.actionsoncustomer
WHERE  actionsoncustomer.id = OLD.rel_actionsoncustomers;
RETURN NULL;  -- AFTER trigger can return NULL
END;
$BODY$
LANGUAGE plpgsql VOLATILE
COST 100;
ALTER FUNCTION actiononcustomer_merchant_delaft()
OWNER TO affilired $newLine";



echo "CREATE TRIGGER delaft
AFTER DELETE ON affilired.actiononcustomer_merchant
FOR EACH ROW EXECUTE PROCEDURE actiononcustomer_merchant_delaft() $newLine";
/*------------------------------------------------------------
<==================== Important Queries ====================>
------------------------------------------------------------*/

echo "SELECT to_char(s.stamp::date,'DD/MM'), count(*) as total
from affilired.sale AS s JOIN access.user AS u
ON s.rel_access = u.rel_access where s.active
AND s.stamp >= '2015-01-15' AND s.stamp < '2015-02-12'
AND s.rel_access = 1 GROUP BY s.stamp::date
ORDER BY s.stamp::date $newLine";


echo "SELECT af.name, af.affiliate_id, af.rel_network, SUM(calculated_weight)
AS weight, string_agg(calculated_weight::text, ',') AS str_cal_weight, string_agg(rule_number::text,',')
AS str_rule_number, string_agg(auto_description, '') AS full_desc, string_agg(local_weight::text, ',')
as str_local_weight, date, auto_reject_merchants, auto_review_merchants, white_list, rel_affiliate, af.url
FROM ( SELECT af.affiliate_id, af.rel_network, af.name, af.url, to_char(af.stamp,'DD/MM/YYYY')
		AS date, a.auto_reject_merchants, a.auto_review_merchants, a.white_list ,af.rule_number,
		af.description, af.local_weight,
CASE WHEN rule_number = 1 THEN local_weight * .4
		WHEN rule_number = 2 THEN local_weight * 1 WHEN rule_number = 3 THEN local_weight * 1
		WHEN rule_number = 4 THEN local_weight * 1 WHEN rule_number = 5 THEN local_weight * .5
		WHEN rule_number = 6 THEN local_weight * .75 WHEN rule_number = 7 THEN local_weight * 1
		WHEN rule_number = 8 THEN local_weight * .75 WHEN rule_number = 9 THEN local_weight * 1
		END as calculated_weight, CONCAT('
Rule #', rule_number, ': ',
CASE WHEN rule_number = 1 THEN local_weight * .4
				WHEN rule_number = 2 THEN local_weight * 1 WHEN rule_number = 3 THEN local_weight * 1
				WHEN rule_number = 4 THEN local_weight * 1 WHEN rule_number = 5 THEN local_weight * .5
				WHEN rule_number = 6 THEN local_weight * .75 WHEN rule_number = 7 THEN local_weight * 1
				WHEN rule_number = 8 THEN local_weight * .75 WHEN rule_number = 9 THEN local_weight * 1
				END , ' : ', af.description, CASE WHEN af.sale_ids != '' THEN CONCAT('sale ids [[', af.sale_ids ,']]') END, '
') AS auto_description, a.id as rel_affiliate FROM affilired.fraud_affiliates
		AS af LEFT JOIN affilired.affiliate_v1 AS a ON af.affiliate_id = a.network_id
		AND af.rel_network = a.rel_network WHERE true AND rule_number IN ('1','2','3','4','5','6','7','8','9')
		AND stamp >= '2015-05-01 00:00' AND stamp <= '2015-05-01 23:59' AND reviewed = false
		AND (a.auto_reject_merchants = false OR a.auto_reject_merchants IS NULL)
		AND (a.white_list = false OR a.auto_reject_merchants IS NULL) AND a.test_affiliate=false ) af
		GROUP BY af.affiliate_id, af.rel_network,date, af.name, auto_reject_merchants,
		auto_review_merchants, white_list, rel_affiliate, af.url
		ORDER BY weight DESC
		LIMIT 10 OFFSET 0 $newLine";

/*------------------------- OR -------------------------------------------*/

echo "SELECT af.name, af.affiliate_id, af.rel_network, SUM(calculated_weight) AS weight, string_agg(calculated_weight::text, ',') AS str_cal_weight, string_agg(rule_number::text,',') AS str_rule_number, string_agg(auto_description, '') AS full_desc, string_agg(local_weight::text, ',') as str_local_weight,date, auto_reject_merchants, auto_review_merchants, white_list, rel_affiliate, af.urlFROM (SELECT af.affiliate_id, af.rel_network, af.name, af.url, to_char(af.stamp,'DD/MM/YYYY') AS date,a.auto_reject_merchants, a.auto_review_merchants, a.white_list ,af.rule_number, af.description, af.local_weight,
	CASE WHEN rule_number = 1 THEN local_weight * .4
	WHEN rule_number = 2 THEN local_weight * 1
	WHEN rule_number = 3 THEN local_weight * 1
	WHEN rule_number = 4 THEN local_weight * 1
	WHEN rule_number = 5 THEN local_weight * .5
	WHEN rule_number = 6 THEN local_weight * .75
	WHEN rule_number = 7 THEN local_weight * 1
	WHEN rule_number = 8 THEN local_weight * .75
	WHEN rule_number = 9 THEN local_weight * 1
	END as calculated_weight,
	CONCAT('<li><b>Rule #', rule_number, ': <font color=''red''>',
	CASE WHEN rule_number = 1 THEN local_weight * .4
			WHEN rule_number = 2 THEN local_weight * 1
			WHEN rule_number = 3 THEN local_weight * 1
			WHEN rule_number = 4 THEN local_weight * 1
			WHEN rule_number = 5 THEN local_weight * .5
			WHEN rule_number = 6 THEN local_weight * .75
			WHEN rule_number = 7 THEN local_weight * 1
			WHEN rule_number = 8 THEN local_weight * .75
			WHEN rule_number = 9 THEN local_weight * 1
			END , '</font> : </b> ', af.description, CASE WHEN af.sale_ids != '' THEN CONCAT('sale ids [[', af.sale_ids ,']]') END, '</li>') AS auto_description,
	a.id as rel_affiliate
	FROM affilired.fraud_affiliates AS af
	LEFT JOIN affilired.affiliate_v1 AS a ON af.affiliate_id = a.network_id AND af.rel_network = a.rel_network
	WHERE true $qfilter) af
	GROUP BY af.affiliate_id, af.rel_network,date, af.name, auto_reject_merchants, auto_review_merchants, white_list, rel_affiliate, af.url $order $range $newLine";


echo "WITH selsales AS ( SELECT am.status AS affiliate_status, 
CASE WHEN (v.auto_reject_merchants = true AND 
v.auto_reject_merchants_stamp >= s.stamp) THEN true 
WHEN (am.status=2 AND am.rejection_date >= s.stamp) THEN true 
ELSE false END rejected_sale, 

CASE WHEN (v.auto_reject_merchants = true OR am.status=2) THEN true 
ELSE false END rejected_affiliate, 

CASE WHEN (v.auto_review_merchants OR am.status=1) THEN true 
ELSE false END underreview_affiliate, v.test_affiliate, v.website, 
s.id, s.merchantid, s.rel_access, s.rel_network, s.value, s.currency_ratio, 
s.stamp, s.cancel_stamp, s.cancel_reason, s.active, s.reservation_id, 
s.tracking_ref, s.affiliate_ref, s.programme_id, s.payout_code, 
s.notification_required, s.notification_code, s.notification_message, 
s.merchant_commission, s.affiliate_commission, s.product_name, s.reference, 
s.rel_product, s.unique_product_id, s.referrer, s.rel_invoice, s.rel_merchant, 
s.ip_address, s.country_code, s.cancel_response, s.ignore_void, s.checkout_date, 
s.mvd, s.nvd, s.click_stamp, s.cancel_api_hash, s.archive, s.prepaid_sas, 
s.network_upgrade_required, s.browser, s.platform, s.browser_version, 
s.pre_affiliate_id, s.tracking_method, s.currency_code, s.local_value, 
s.usd_value, s.usd_merchant_commission, s.usd_affiliate_commission, 
s.network_upgrade_date, s.network_upgrade_error_description, s.network_upgrade_error, 
s.network_commission_value, s.network_commission_type, tracking_referrer, 
cancel_reasonid, s.saletype, (s.stamp -click_stamp ) as click_difference 
FROM affilired.sale AS s LEFT JOIN affilired.affiliate_v1 AS v 
ON v.rel_network=s.rel_network AND v.network_id=s.affiliate_ref 
LEFT JOIN affilired.affiliate_merchant AS am ON am.rel_merchant=s.rel_access 
AND am.rel_affiliate=v.id WHERE true AND s.rel_access =4352 AND s.tracking_method =1 
AND s.notification_code = 'NA' AND s.stamp >= '2014-06-29 00:00' 
AND s.stamp < '2015-07-30 00:00' AND s.country_code = 'IN' AND s.rel_access 
NOT IN (SELECT distinct rel_access FROM access.user WHERE invoiceable = false) 
AND am.status = 3 ORDER BY s.stamp desc ) SELECT (SELECT COUNT(*) FROM selsales) AS count,* 
FROM selsales 
LIMIT 10 OFFSET 0 $newLine";

/*------------------------- Destination table having btree -------------------------------------------*/

echo "CREATE TABLE hcms.destination
(
  id serial NOT NULL,
  description character varying(128) DEFAULT 'N/D'::character varying,
  active boolean DEFAULT true,
  rel_parent integer,
  highlighted boolean DEFAULT false,
  featured_homepage boolean DEFAULT true,
  latitude numeric(10,5),
  longitude numeric(10,5),
  map_view character varying(16),
  map_zoom integer,
  country_code character(2),
  CONSTRAINT destination_pkey PRIMARY KEY (id),
  CONSTRAINT destination_rel_parent_fkey FOREIGN KEY (rel_parent)
      REFERENCES hcms.destination (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE SET NULL
)
WITH (
  OIDS=FALSE
) $newLine
ALTER TABLE hcms.destination
  OWNER TO postgres $newLine";

// -- Index: hcms.destination_description_index

// -- DROP INDEX hcms.destination_description_index;

echo "CREATE INDEX destination_description_index
  ON hcms.destination
  USING btree
  (description COLLATE pg_catalog.'default') $newLine";

// -- Index: hcms.destination_id_index

// -- DROP INDEX hcms.destination_id_index;

echo "CREATE INDEX destination_id_index
  ON hcms.destination
  USING btree
  (id) $newLine";

// -- Index: hcms.destination_parent_index

// -- DROP INDEX hcms.destination_parent_index;

echo "CREATE INDEX destination_parent_index
  ON hcms.destination
  USING btree
  (rel_parent) $newLine";

/*------------------------- Fetching data -------------------------------------------*/
echo "WITH RECURSIVE rec_destinations(level,path,id,description,rel_parent) 
AS ( SELECT 0, description::text, id, description, rel_parent FROM hcms.destination 
	WHERE active AND rel_parent IS NULL UNION SELECT level+1,path || ' > ' || d.description, d.id, 
	d.description, d.rel_parent FROM hcms.destination d JOIN rec_destinations r ON r.id = d.rel_parent 
	WHERE active ) SELECT id, path FROM rec_destinations ORDER BY path $newLine";

/**************************************************************************************/

echo 'select sum("Value") as Value1, date from "Values" where id in(1,2,3) group by date
Union ALL
select sum("Value") as Value1, date from "Values" where id=8 group by date';


echo 'WITH Values123 AS
(
    SELECT SUM("Value") AS Values1,Date
    FROM "Values"
    WHERE ID IN(1,2,3)
    GROUP BY Date
)
SELECT Values123.Values1
      ,(SELECT SUM("Value") FROM "Values" WHERE Date=Values123.Date AND ID=8) as Values2
      ,Values123.Date 
FROM Values123'.$newLine;

/*------------------------- Row Number in Mysql -------------------------------------------*/
echo "SELECT a.i, a.j, count(*) as row_number FROM test9a a
JOIN test9a b ON a.i = b.i AND a.j >= b.j
GROUP BY a.i, a.j $newLine";

/*------------------------- Find Duplicate ids, on basis of column --------------------------*/
echo "select count(*), description, array_to_string(array_agg(id), ', ') as ids from invoice.invoice_item group by description having count(*)>1 $newLine";

/*------------------------- Find Total rows with data in two different form -----------------*/
echo "WITH item_arr as (SELECT  rel_innvoicecount,rel_invoice,ids,(rel_innvoicecount+rel_invoice)/rel_innvoicecount as total
from (
  select count(rel_invoice) as rel_innvoicecount,rel_invoice,array_to_string(array_agg(id), ', ') as ids from invoice.invoice_item group by rel_invoice having count(rel_invoice)>1
) as o) SELECT (SELECT COUNT(*) FROM item_arr) AS count,* 
FROM item_arr $newLine $newLine;


SELECT (SELECT row_number() over () from invoice.invoice_item group by rel_invoice having count(rel_invoice)>1 order by row_number desc limit 1) as total ,rel_innvoicecount,rel_invoice,ids,(rel_innvoicecount+rel_invoice)/rel_innvoicecount as total
from (
  SELECT count(rel_invoice) as rel_innvoicecount,rel_invoice,array_to_string(array_agg(id), ', ') as ids from invoice.invoice_item group by rel_invoice having count(rel_invoice)>1
) as o";

/*------------------------- Generate Series between start and end date with data with conditions -----------------*/
echo "SELECT to_char(series::date, 'YYYY-MM-DD') as date, count(impressions) as COUNT
FROM generate_series('2015-03-01'::date
                   , '2015-03-31'::date
                   , '1 day'::interval)  as series
LEFT JOIN affilired.affiliateimpressions as imp 
ON imp.stamp = series AND rel_access = 3827 
GROUP BY 1
ORDER BY 1 ASC";

/*------------------------- Get duplicate record with count -----------------*/
echo "SELECT COUNT(*), player_id, status FROM test1 GROUP BY player_id, status HAVING count(*) > 1";

/*------------------------- Generate series with data in mysql -----------------*/
// You have to import generate_series.sql in your table.

echo "CALL generate_series_date_minute('2016-02-01 11:50', '2016-02-01 17:00:00', 10);

SELECT (s.series + interval 10 MINUTE) AS series, count(t.time_left)
FROM series_tmp AS s LEFT JOIN tbl_student_log AS t
ON true
AND t.time_left > s.series
AND t.time_left <= (s.series + interval 10 MINUTE)
GROUP BY s.series limit 31";