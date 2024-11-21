<?php
    // Datuak jaso eta balioztatu
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $euros = $_POST['euros'];
        $moneta = $_POST['moneta'];
        $balioa = 0;

        // Zenbaki balioztatu
        if (!is_numeric($euros)) {
            echo "<h2>Errorea: Mesedez, zenbaki bat sartu.</h2>";
            echo '<a href="/ariketak/PHP/txamponak/index.html">Itzuli formularioara</a>'; // Itzultzeko lotura
        } else {
            // Balioak kalkulatu
            switch ($moneta) {
                case 'dolar_amerikano':
                    $balioa = $euros * 1.08;
                    break;

                case 'libra_britaniar':
                    $balioa = $euros * 0.83;
                    break;

                case 'yen_japoniar':
                    $balioa = $euros * 164.3;
                    break;

                case 'franko_suitzar':
                    $balioa = $euros * 0.94;
                    break;
            }

            echo "<h2>Zenbateko Bihurtua:</h2>";
            echo "<p>{$euros}€ = " . round($balioa, 2) . " " . ucfirst(str_replace('_', ' ', $moneta)) . "</p>";
            echo '<a href="/ariketak/PHP/txamponak/index.html">Itzuli formularioara</a>'; // Itzultzeko lotura
        }
    } else {
        echo "<h2>Mesedez, formularioa bete.</h2>";
    }
?>