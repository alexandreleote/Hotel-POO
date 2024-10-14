<?php

class Reservation {
    private DateTime $bookingBegin; // Date précise de la réservation
    private DateTime $bookingEnd; // Date précise de la réservation
    private Client $client; // Client unique de la réservation
    private Room $room; // Chambre unique de la réservation

    public function __construct(string $bookingBegin, string $bookingEnd, Client $client, Room $room) {
        $this->bookingBegin = new DateTime ($bookingBegin);
        $this->bookingEnd = new DateTime ($bookingEnd);
        $this->client = $client;
        $this->client->addReservation($this);
        $this->room = $room;
        $room->getHotel()->addReservation($this);
    }

    // Getters & Setters
    
    public function getBookingBegin() : DateTime
    {
        return $this->bookingBegin;
    }

    public function setBookingBegin($bookingBegin)
    {
        $this->bookingBegin = $bookingBegin;

        return $this;
    }

    public function getBookingEnd() : DateTime
    {
        return $this->bookingEnd;
    }

    public function setBookingEnd($bookingEnd)
    {
        $this->bookingEnd = $bookingEnd;

        return $this;
    }

    public function getClient() : Client
    {
        return $this->client;
    }

    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    public function getRoom() : Room
    {
        return $this->room;
    }

    public function setRoom($room)
    {
        $this->room = $room;

        return $this;
    }

    // toString

    public function __toString() {
        return " du ".$this->getBookingBegin()->format("d-m-Y")." au ".$this->getBookingEnd()->format("d-m-Y");
    }
}