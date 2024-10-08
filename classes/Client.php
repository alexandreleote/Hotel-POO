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

    // Réservation du client
    public function addReservation(Reservation $reservation) {
        $this->reservations[] = $reservation;
    }

    // toString()

    public function __toString() {
        return "$this->name $this->surname";
    }

}