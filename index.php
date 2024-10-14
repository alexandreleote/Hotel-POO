<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>


<h1>Exercice Hotel POO</h1>

<?php

spl_autoload_register(function($class_name){
    require "classes/".$class_name.".php";
});

// Hotels
$hilton = new Hotel ("Hilton", "****", "10 route de la Gare", "67000", "Strasbourg");
$regent = new Hotel ("Regent", "***", "61 Rue Dauphine", "75006", "Paris");

// Rooms
// Instancier les chambres de l'hôtel avec $roomNumber étant le numéro de chambre

foreach (range(1,30) as $num) {
    if($num <= 15 ) {
        ${"roomH".$num} = new room ($num, 2, false, 120, false, $hilton) ;
        ${"roomR".$num} = new room ($num, 2, false, 120, false, $regent) ;
    } else {
        ${"roomH".$num} = new room ($num, 1, false, 300, true, $hilton) ;
        ${"roomR".$num} = new room ($num, 1, false, 300, true, $regent) ;
    }
}


// Clients
$client1 = new Client ("Micka", "MURMANN", "mickael@elan-formation.fr");
$client2 = new Client ("Virgile", "GIBELLO", "virgile@elan-formation.fr");

// Reservations - après avoir déclaré les variables dont on a besoin
$booking1 = new Reservation ("2021-01-01", "2021-01-01", $client2, $roomH17);
$booking2 = new Reservation ("2021-03-11", "2021-03-15", $client1, $roomH3);
$booking3 = new Reservation ("2021-04-01", "2021-04-17", $client1, $roomH4);

// Affichage

echo $hilton->getInfos();
echo $hilton->showReservations();
echo $regent->showReservations();
echo $client1->showClientBooking();
echo "<br>";
echo $hilton->showRoomsStatus();

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>