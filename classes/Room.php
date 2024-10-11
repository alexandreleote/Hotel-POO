<?php

class Room {
    private int $roomNumber; // Numéro de chambre
    private int $bedNumber;
    private bool $isBooked; // Statut de disponibilité
    private float $price; // Prix
    private bool $wifi; // Posséde le wifi ou non 
    private Hotel $hotel; // Appartenance à l'hôtel
    private array $reservations; // Réservations de la chambres

    public function __construct(int $roomNumber, int $bedNumber, bool $isBooked, float $price, bool $wifi, Hotel $hotel) {
        $this->roomNumber = $roomNumber;
        $this->bedNumber = $bedNumber;
        $this->isBooked = $isBooked;
        $this->price = $price;
        $this->wifi = $wifi;
        $this->hotel = $hotel;
        $this->hotel -> addRoom($this);
        $this->reservations = [];
    }

    // Getters & Setters

    public function getRoomNumber() : int
    {
        return $this->roomNumber;
    }
 
    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;

        return $this;
    }

    public function getBedNumber() : int
    {
        return $this->bedNumber;
    }

    public function setBedNumber($bedNumber)
    {
        $this->bedNumber = $bedNumber;

        return $this;
    }

    public function getIsBooked() : bool
    {
        return $this->isBooked;
    }

    public function setIsBooked($isBooked)
    {
        $this->isBooked = $isBooked;

        return $this;
    }
 
    public function getPrice() : float
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
 
    public function getWifi() : bool
    {
        return $this->wifi;
    }

    public function setWifi($wifi)
    {
        $this->wifi = $wifi;

        return $this;
    }

    public function getHotel() : Hotel
    {
        return $this->hotel;
    }

    public function setHotel($hotel)
    {
        $this->hotel = $hotel;

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

    // Réservation de la chambre
    public function addReservation(Reservation $reservation) {
        $this->reservations[] = $reservation;
    }

    public function addRoom(Reservation $room) {
        $this->reservations[] = $room; 
    }


    // toString()

    public function __toString() {
        return "Chambre $this->roomNumber";
    }







}