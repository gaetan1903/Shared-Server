<?php

function multi($a, $b){
    $z = $a * $b;
    return $z;
}

echo "  3 * 4 = ".multi(3, 4);
echo "<br><br>";

echo addcslashes('fooAsdBsqsq\n', "A..Z");
echo "<br><br>";

print_r(apache_get_version());
echo "<br><br>";

$headers = apache_request_headers();
print_r($headers);
echo "<br><br>";
foreach($headers as $header=>$val){

    echo "$header = $val <br>";
}

?>