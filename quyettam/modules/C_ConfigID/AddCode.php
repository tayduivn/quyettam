<?php 
    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
    class Code{
        function addCode(&$bean, $event, $arguments)
        {
            $table = $bean->table_name;
            $sql = "SELECT name, code_separator, code_field, is_reset, custom_table, add_date, date_format, zero_padding, first_num FROM c_configid WHERE custom_table = '{$table}' AND deleted = 0 ORDER BY date_entered DESC LIMIT 1;";
            $res = $GLOBALS['db']->query($sql);
            if($r = $GLOBALS['db']->fetchByAssoc($res)){

                if( empty($bean->$r['code_field'])  ){

                    //pattern to detect valid code.
                    $pattern = "/^" . $r['name'] . ($r['add_date']?"[0-9]{".strlen(date($r['date_format']))."}":"") . $r['code_separator'] . "([0-9]+)$/";


                    if((!isset($bean->fetched_row[$r['code_field']]) || $bean->fetched_row[$r['code_field']]=='') && isset($pattern) ) {

                        $r['is_reset'] == '1' ? $len = strlen($r['name']) + strlen(date($r['date_format'])) : $len = strlen($r['name']);
                        $r['is_reset'] == '1' ? $str = $r['name'].date($r['date_format']) : $str = $r['name'];

                        $query = "SELECT ".$r['code_field']." FROM " . $r['custom_table'] ." WHERE ( ". $r['code_field'] . " <> '' AND ". $r['code_field'] . " IS NOT NULL) AND LEFT({$r['code_field']},$len) = '$str' ORDER BY RIGHT(" . $r['code_field'] . ", ".$r['zero_padding'].") DESC";
                        $result = $GLOBALS['db']->query($query);

//                        if($row = $GLOBALS['db']->fetchByAssoc($result)){
//                            $last_code = $row[$r['code_field']];
//                        }else{
//                            //no codes exist, generate default - PREFIX + CURRENT YEAR +  SEPARATOR + FIRST NUM
//                            $last_code = $r['name'] . ($r['add_date']?date($r['date_format']):"") . $r['code_separator'] . $r['first_num'];
//                        }
                        
                        // Edit by Bui Kim Tung
                        $last_code = $r['name'] . ($r['add_date']?date($r['date_format']):"") . $r['code_separator'] . $r['first_num'];
                        while($row = $GLOBALS['db']->fetchByAssoc($result)){
                             $last_code = $row[$r['code_field']];
                             if (preg_match($pattern, $last_code, $matches)) break;
                        }
                        // End edit by Bui Kim Tung

//                        preg_match($pattern, $last_code, $matches);
                        $num=$matches[1];
                        $num++;
                        $pads = $r['zero_padding'] - strlen($num);
                        $new_code = $r['name'] . ($r['add_date']?date($r['date_format']):"") . $r['code_separator'];

                        //preform the lead padding 0
                        for($i=0; $i < $pads; $i++) {
                            $new_code .= "0";
                        }
                        $new_code .= $num;

                        //write to database - Logic: Before Save
                        $bean->$r['code_field'] = $new_code;
                    }  
                }
            }
        }
    } 
?>
