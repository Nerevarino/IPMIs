<?php

$command = 'awk -F":" -f findIPMIs.awk sourceIPMIs.txt';
file_put_contents("outputIPMIs.txt", `$command`);
echo `cat outputIPMIs.txt`;
