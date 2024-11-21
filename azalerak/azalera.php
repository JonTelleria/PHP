<?php
    // Datuak jaso eta balioztatu
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $irudia = $_POST['irudia'];
        $aldea = $_POST['aldea'];
        $azalera = 0;

        // Zenbaki balioztatu
        if (!is_numeric($aldea) || $aldea < 0) {
            echo "<h2>Errorea: Mesedez, zenbaki positibo bat sartu.</h2>";
            echo '<a href="/ariketak/PHP/azalerak/index.html">Itzuli formularioara</a>'; // Bat-ezbesteko itzultzeko lotura
        } else {
            // Azalera kalkulatu
            switch ($irudia) {
                case 'karratua':
                    $azalera = $aldea ** 2; 
                    break;

                case 'triangelua':
                    $azalera = ($aldea ** 2) / 2; 
                    break;

                case 'zirkulua':
                    $azalera = pi() * ($aldea ** 2); 
                    break;
            }

            echo "<h2>Irudi geometrikoa: " . ucfirst($irudia) . "</h2>";
            echo "<h2>Azalera: " . round($azalera, 2) . " m karratu</h2>";
            echo '<a href="/ariketak/PHP/azalerak/index.html">Itzuli formularioara</a>'; // Itzultzeko lotura
        }
    } else {
        echo "<h2>Mesedez, formularioa bete.</h2>";
    }
?>