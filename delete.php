<?php
include "polacz.php";


$pesel = wczytaj("pesel");

$sql = "DELETE FROM ucznie WHERE pesel=$pesel";
mysqli_query($baza, $sql);
mysqli_close($baza);