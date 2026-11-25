<?php
function hitungDiskon(float $harga, float $persen = 10): float {
 return $harga * ($persen / 100);
}
echo hitungDiskon(200000); // diskon 10%
echo hitungDiskon(200000, 15); // diskon 15%
?>
