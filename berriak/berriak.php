<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $izenburua = $_POST['izenburua'];
    $testua = $_POST['testua'];
    $mota = $_POST['mota'];

    $uploadDir = 'uploads/';

    // Konprobatu uploads direktorioa existitzen den
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); // Sortu direktorioa, existitzen ez bada
    }

    echo "Berria ondo jaso da<br>";
    echo " - Izenburua: $izenburua<br>";
    echo " - Testua: $testua<br>";
    echo " - Kategoria: $mota<br>";

    if (isset($_FILES['irudia']) && $_FILES['irudia']['error'] === UPLOAD_ERR_OK) {
        // Fitxategiaren ibilbidea zehaztu
        $uploadFile = $uploadDir . basename($_FILES['irudia']['name']);

        // Irudia movitu
        if (move_uploaded_file($_FILES['irudia']['tmp_name'], $uploadFile)) {
            echo " - Irudia: <a href='$uploadFile' download>Deskargatu irudia</a><br>";
            echo '<a href="/ariketak/PHP/berriak/index.html">Itzuli formularioara</a>';
        } else {
            echo "Argazkia ezin izan da kargatu.<br>";
            echo '<a href="/ariketak/PHP/berriak/index.html">Itzuli formularioara</a>';
        }
    } else {
        echo "Ez dago argazkirik.<br>";
        echo '<a href="/ariketak/PHP/berriak/index.html">Itzuli formularioara</a>';
    }
}
?>