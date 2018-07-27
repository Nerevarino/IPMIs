<?php

function validateIp($ip)
{
    $octets = explode(".", $ip);
    $octets_count = 4;
    $processed_octets = array();

    for($i = 0; $i < $octets_count; $i++) {
        $processed_octets[$i] = ((int)$octets[$i]) % 256;
    }

    $octs = $processed_octets;
    return "$octs[0].$octs[1].$octs[2].$octs[3]";
}

function ipRange($ipA, $ipB)
{
    $ips = array();
    $a_octets = validateIp($ipA);
    $b_octets = validateIp($ipB);

    $ipA = ip2long($ipA);
    $ipB = ip2long($ipB);

    for($i = min($ipA, $ipB); $i <= max($ipA, $ipB); $i++) {
        $ips[] = long2ip($i);
    }

    return $ips;
}
