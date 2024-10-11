<h1>Exercice Hotel POO</h1>

<?php

spl_autoload_register(function($class_name){
    require "classes/".$class_name.".php";
});

// Hotels
$hilton = new Hotel ("Hilton", "****", "10 route de la Gare", "67000", "Strasbourg");
$regent = new Hotel ("Regent", "***", "61 Rue Dauphine", "75006", "Paris");

// Rooms
$room1 = new Room (1, 2, true, 120, false, $hilton);
$room2 = new Room (2, 2, true, 120, true, $hilton);



// Clients
$client1 = new Client ("Micka", "MURMANN", "mickael@elan-formaiton.fr");
$client2 = new Client ("Virgile", "GIBELLO", "virgile@elan-formaiton.fr");

// Reservations - après avoir déclaré les variables dont on a besoin
$booking1 = new Reservation ("2021-01-01", "2021-01-01", $client1, $room1);
$booking2 = new Reservation ("2021-01-18", "2021-01-22", $client2, $room1);
$booking3 = new Reservation ("2021-02-18", "2021-02-22", $client2, $room2);


// var_dump($hilton, $regent);
// var_dump($client1, $client2);

echo $hilton->getInfos();
echo $hilton->showReservations();
echo $regent->showReservations();
// echo $client1->showReservations();
echo $hilton->showRoomsStatus();