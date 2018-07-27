<?php

include 'ip.php';

file_put_contents("sourceIPMIs.txt", "");

foreach(ipRange("172.16.0.2", "172.16.1.254") as $ip) {
    $command = "ipmitool -I lanplus -U ADMIN -P 21UfLv5ydYc212t -H $ip  mc info 1";
    echo $command . "\n";
    $result = "";
    $result = `$command`;
    if($result != "") {
        file_put_contents("sourceIPMIs.txt", "ipaddress\t:\t$ip\n" . $result . "\n\n\n", FILE_APPEND);
    } else {
        file_put_contents("sourceIPMIs.txt", "ipaddress\t:\t$ip\nIPMI Version ???\nProduct ID ???" . "\n\n\n", FILE_APPEND);        
    }
}


echo "Work finished!\n";

