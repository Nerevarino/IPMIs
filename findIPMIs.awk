/ipaddress/ {print $0}
/IPMI Version/ {print $0 $1}
/Product ID/ {print $0 $1"\n"}
