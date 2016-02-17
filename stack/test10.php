<?php
$encoded = 'eyJ0b2tlbiI6IiQyeSQxMCRMTlgzU29HdEdOaExsay5yQ1puQ2ZlZ1wvbVNcL09BMDV2SjhcL1wvcHNRNjZaQmRpbWpOdnhGQlciLCJ0aW1lIjoiMjAxNS0xMi0xMVQwOTozOToyOSswMTAwIiwiZW1haWwiOiJsb3JlbS51dC5hbGlxdWFtQGZldWdpYXRwbGFjZXJhdHZlbGl0Lm9yZyJ9';
$data = json_decode(
    base64_decode($encoded), 
    true
);
echo "<pre>".print_r($data,1)."</pre>";

/*************************************************************************************************/

echo "<br>";
$newArr = array (
    'token' => '$2y$10$LNX3SoGtGNhLlk.rCZnCfeg/mS/OA05vJ8//psQ66ZBdimjNvxFBW',
    'time' => '2015-12-11T09:39:29+0100',
    'email' => 'lorem.ut.aliquam@feugiatplaceratvelit.org',
);

echo "<pre>";
echo base64_encode(json_encode($newArr)) . PHP_EOL;

/*************************************************************************************************/

$a = [];
for ($i = 0; $i < 150000; $i++) {
    $a[$i] = ['id' => $i,
               'name' => str_shuffle('abcde') . str_shuffle('01234')];
}

$start = microtime(true);

if (false) {
    // 7.7489550113678 secs for 15 000 itmes
    $r = array_reduce($a, function($res, $item) {
             $res[$item['id']] = $item['name'];
             return $res;
         });
}

if (false) {
    // 0.096649885177612 secs for 150 000 items
    $r = array_combine(array_column($a, 'id'),
                       array_column($a, 'name'));
}

if (true) {
    // 0.066264867782593 secs for 150 000 items
    $r = [];
    foreach ($a as $subarray) {
        $r[$subarray['id']] = $subarray['name'];
    }
}

if (false) {
    // 0.32427287101746 secs for 150 000 items
    $r = [];
    array_walk($a, function($v) use (&$r) {
        $r[$v['id']] = $v['name'];
    });
}

echo (microtime(true) - $start)  . ' secs' . PHP_EOL;

/*************************************************************************************************/

// Encode the data.
$json = json_encode(
    array(
        1 => array(
            'English' => array(
                'One',
                'January'
            ),
            'French' => array(
                'Une',
                'Janvier'
            )
        )
    )
);

// Define the errors.
$constants = get_defined_constants(true);
$json_errors = array();
foreach ($constants["json"] as $name => $value) {
    if (!strncmp($name, "JSON_ERROR_", 11)) {
        $json_errors[$value] = $name;
    }
}

echo "<pre>".print_r($constants,1)."<pre>";
echo "<pre>".print_r($json_errors,1)."<pre>";