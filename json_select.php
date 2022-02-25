<?php
        header('Access-Control-Allow-Origin: *');
        include "polacz.php"; //wzór pliku we wpisie "Pełny panel administracyjny MySQLi"
        if ($sql = $baza->prepare( "SELECT DISTINCT imie, pesel, nazwisko, klasa FROM ucznie ORDER BY imie "))
        {
                $sql->execute(); //wykonaj SQL
                $sql->bind_result($imie,$pesel,$nazwisko,$klasa);
                while ($sql->fetch())
                  $nazwiska[] = array(
                     "pesel" => $pesel,
                     "first_name" => $imie,
                     "last_name" => $nazwisko,
                     "klasa" => $klasa
                   ); //dla każdego nazwiska tworzy 2 pary, nazwiska przekonwertowane do UTF
                $sql->close();
        }
        $baza->close();
        echo json_encode($nazwiska, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>