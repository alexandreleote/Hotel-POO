<?php

class Client {
    private string $name; // Prénom
    private string $surname; // Nom
    private string $email; // e-mail
    private array $reservations; // Réservations du client

    public function __construct(string $name, string $surname, string $email) {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->reservations = [];
    }

    // Getters & Setters

    public function getName() : string
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
 
    public function getSurname() : string
    {
        return $this->surname;
    }
 
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    public function getEmail() : string
    {
        return $this->email;
    }
 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
 
    public function getReservations() : array
    {
        return $this->reservations;
    }

    public function setReservations($reservations)
    {
        $this->reservations = $reservations;

        return $this;
    }


    // Fonctions

    // Compter les réservations du client
    public function countBooking () {
        $result = 0;
        foreach ($this->reservations as $reservation) { // Foreach sur array rooms[] qui indique le nombre de chambres 
            $result +=1;
        }
        return $result; // Si aucune chambre n'est réservée on retourne la valeur initiale
    }

    // Afficher les réservations Client
    public function showClientBooking () {
        $result = "<h3> Réservations de $this</h3>";
        // On vérifie s'il y a des réservations
        $reservation = $this->countBooking();
        // S'il y a des réservations alors on affiche les informations - Lieu, Dates, Prix
        if ($reservation > 0) {
            $result .= "<span class='badge text-bg-success'>".$this->countBooking()." ".mb_strtoupper("réservations")."</span><br>";
            foreach ($this->reservations as $reservation) {
            $result .= "<b>Hotel : ".$reservation->getRoom()->getHotel()."</b>"." / Chambre : ".$reservation->getRoom()." (".$reservation->getRoom()." lits - ".$reservation->getRoom()->getPrice()." € ";
            if ($reservation->getRoom()->getWifi() == true ) {
                $result .= "- Wifi : OUI )".$reservation."<br>";
            } else {
                $result .= "- Wifi : NON )".$reservation."<br>";
            }
        }
            // On calcule le coût total des séjours par réservation
            $totalSpent = 0; 
            foreach ($this->reservations as $reservation) {
                // On calcule la différence entre la date de départ et date de fin
                $interval = $reservation->getBookingBegin()->diff($reservation->getBookingEnd());
                // On définit la valeur à la fin en jours
                $numDays = $interval->days;
                // On fait en sorte qu'une journée soit comptabilisée
                if ($numDays === 0 ) {
                    $numDays = 1;
                }
                $totalSpent += $numDays * $reservation->getRoom()->getPrice();
            }
        } else {
            // S'il n'y en a pas, on affiche aucune réservation et on définit le prix à 0
            $result .= "Aucune réservation !<br><br>";
            $totalSpent = 0;
        }
        $result .= "Total : ".$totalSpent." € <br>";
        return $result;
    }

    // Réservation du client
    public function addReservation(Reservation $reservation) {
        $this->reservations[] = $reservation;
    }

    // toString()

    public function __toString() {
        return "$this->name $this->surname";
    }

}