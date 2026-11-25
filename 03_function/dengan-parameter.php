<?php
function sapaPengguna($nama) {
 echo "Halo, " . htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
}
sapaPengguna("Rina");
?>
