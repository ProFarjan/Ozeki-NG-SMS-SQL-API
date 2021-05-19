<?php
print_r('<pre>');



$CSVfp = fopen("check_goip_call.csv", "r");
$res = [];
if($CSVfp !== FALSE) {
    while(! feof($CSVfp)) {
        $data = fgetcsv($CSVfp, 1000, ",");
        if (strlen($data[0]) == 10){
            $res[$data[0]] = '0'.$data[0];
        }
    }
}
fclose($CSVfp);

print_r(implode(',',array_values($res)));

?>