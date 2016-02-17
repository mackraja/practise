<?
        Class jquery{
            /**
             * @brief It stores all jquery code and scripts and renders it at the bottom of the page.
             * -----------------------------------------------------------------------------------------
             * ---------- Examples for set_windowLoad($js_code) and set_windowReady($js_code) ----------
             * -----------------------------------------------------------------------------------------
             * - Example 1:
             *   $jquery->set_windowLoad(<<<EOT
             *
             *      your_jquery_code(here);
             *
             *   EOT;
             *   )
             *
             * - Example 2:
             *   $js_code  = "alert(1)";
             *   $js_code .= "alert(2)";
             *   $js_code .= "alert(3)";
             *   $jquery->set_windowReady($js_code);
             * -----------------------------------------------------------------------------------------
             *
             * @method scripts($url_script);
             *
             * $jquery->set_script("js/url_to_the_js_file.js");
             *
             */
            private $window_load = "";
            private $window_ready = "";
            private $scripts = array();


            public function set_windowLoad($js_code){
                if(strlen($js_code) != 0){
                    $this->window_load .= $js_code;
                    return true;
                }else{
                    return false;
                }
            }

            public function set_windowReady($js_code){
                if(strlen($js_code) != 0){
                    $this->window_ready .= $js_code;
                    return true;
                }else{
                    return false;
                }
            }

            public function set_script($url_script){
                if(strlen($url_script) != 0){
                    array_push($this->scripts, "<script type='text/javascript' src='".$url_script."'></script>");
                    return true;
                }else{
                    return false;
                }
            }

            public function get_windowLoad(){
                return $this->window_load;
            }

            public function get_windowReady(){
                return $this->window_ready;
            }

            public function get_scripts(){
                if(sizeof($this->scripts) > 0){
                    $output = "";
                    for($i=0;$i<sizeof($this->scripts);$i++){
                        $output .= $this->scripts[$i];
                    }
                    return $output;
                }else{
                    return "";
                }
            }

        }
        $jquery = new jquery();
?>