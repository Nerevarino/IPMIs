<?php

include 'ip.php';

file_put_contents("outputIPMIs.txt", "");

foreach(ipRange("172.16.0.2", "172.16.1.254") as $ip) {
    $command = "ipmitool -I lanplus -U ADMIN -P 21UfLv5ydYc212t -H $ip  mc info 1";
    echo $command . "\n";
    $result = "";
    $result = `$command`;
    if($result != "") {
        $result = explode("\n", $result); //теперь это массив подстрок 
        $product_strings = preg_grep("/^Product ID/", $result);
        $ipmi_strings = preg_grep("/^IPMI Version/", $result);        


        
        $product_id = $product_strings[6];
        $product_strings = explode(":", $product_id);
        $product_id = trim($product_strings[1]);
        
        $ipmi = $ipmi_strings[3];
        $ipmi_strings = explode(":", $ipmi);
        $ipmi = trim($ipmi_strings[1]);

        
        $str = "ipaddress:\t$ip;\t\tProduct ID:\t$product_id;\t\tIPMI Version:\t$ipmi;\n";
        
        file_put_contents("outputIPMIs.txt", $str, FILE_APPEND);
    } else {
        $str = "ipaddress:\t$ip;\t\tProduct ID:\t     ???     ;\t\tIPMI Version:\t???;\n";
        file_put_contents("outputIPMIs.txt", $str, FILE_APPEND);        
    }
}

echo `cat outputIPMIs.txt`;
echo "\n";
echo "Work finished!\n";

