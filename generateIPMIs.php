<?php

include 'ip.php';

foreach(ipRange("172.16.0.2", "172.16.1.254") as $ip) {
    $command = "ipmitool -I lanplus -U ADMIN -P 21UfLv5ydYc212t -H $ip  mc info 1";
    echo $command . "\n";
    $result = "";
    $result = `$command`;
    if($result != "") {
        file_put_contents("sourceIPMIs.txt", "ipaddress: $ip\n" . $result . "\n\n\n", FILE_APPEND);            
    } else {}
}


echo "Work finished!\n";
