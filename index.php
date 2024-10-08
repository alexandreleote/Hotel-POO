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



// Clients
$client1 = new Client ("Micka", "MURMANN", "mickael@elan-formaiton.fr");
$client2 = new Client ("Virgile", "GIBELLO", "virgile@elan-formaiton.fr");

// Reservations - après avoir déclaré les variables dont on a besoin
$booking1 = new Reservation ("2021-01-01", "2021-01-01", $client1, $room1);


// var_dump($hilton, $regent);
// var_dump($client1, $client2);

echo $hilton->getInfos();
echo $hilton->showReservations();
echo $regent->showReservations();
// echo $client1->showReservations();
echo $hilton->showRoomsStatus();