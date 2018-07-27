<?php

file_put_contents("outputIPMIs.txt", `awk -f findIPMIs.awk sourceIPMIs.txt`);
echo `cat outputIPMIs.txt`;
