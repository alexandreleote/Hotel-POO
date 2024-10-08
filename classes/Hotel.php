<?php

class Hotel {
    private string $name; // Raison sociale de l'établissement
    private string $stars; // Distinction étoilée
    private string $adress; // Adresse Rue
    private string $pc; // Code postal
    private string $town; // Ville
    private array $rooms; // array de chambres appartenant à l'établissement

    public function __construct(string $name, string $stars, string $adress, string $pc, string $town) {
        $this->name = $name;
        $this->stars = $stars;
        $this->adress = $adress;
        $this->pc = $pc;
        $this->town = $town;
        $this->rooms = [];
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
 
    public function getStars() : string
    {
        return $this->stars;
    }

    public function setStars($stars)
    {
        $this->stars = $stars;

        return $this;
    }

    public function getAdress() : string
    {
        return $this->adress;
    }

    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPc() : string
    {
        return $this->pc;
    }

    public function setPc($pc)
    {
        $this->pc = $pc;

        return $this;
    }

    public function getTown() : string
    {
        return $this->town;
    }

    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    public function getRooms() : array
    {
        return $this->rooms;
    }

    public function setRooms($rooms)
    {
        $this->rooms = $rooms;

        return $this;
    }

    // Functions

    // Ajout de la chambre à l'hôtel
    public function addRoom(Room $room) {
        $this->rooms[] = $room; 
    }

    public function addReservation(Reservation $reservation) {
        $this->reservations[] = $reservation;
    }

    // Compter les chambres
    public function countRooms() {
        return count($this->rooms);
    }

    // Créer parc de chambres

    // Compter nombre de chambres réservées
    public function countReservedRooms () {
        $result = 0;
        foreach ($this->rooms as $room){ // Foreach sur array rooms[] qui indique le nombre de chambres 
            if ($room->getIsBooked() == true){ // Si la chambre est réservée / true = alors on incrémente de 1
                $result +=1;
            }
        }
        return $result; // Si aucune chambre n'est réservée on retourne la valeur initiale
    }

    // Compter nombre de chambres dipos
    public function countAvailableRooms() {
        $result = $this->countRooms()-$this->countReservedRooms(); // On soustrait le nombre de chambre réservée au nombre total
        return $result;
    }


    // Informations de l'établissement
    public function getInfos() {
        $result = "<h2>$this</h2>";
        $result .= "$this->adress $this->pc ".strtoupper($this->town)."<br>";
        $result .= "Nombre de chambres : ".$this->countRooms()."<br>";
        $result .= "Nombre de chambres réservées : ".$this->countReservedRooms()."<br>";
        $result .= "Nombre de chambres dispo : ".$this->countAvailableRooms();
        return $result;
    }

    // Fonction de réservation
    public function bookedRoom(){
        if ($rooms->isBooked == false){
            $result = setIsBooked(true);
        }
        return $result;
    }

    // Afficher les réservations
    public function showReservations () {
        $result = "<h3> Réservations de l'hôtel $this</h3>";
        if ($this->countReservedRooms() == 0){
            $result .= "Aucune réservation !<br>";
        } else {
            $result .= $this->countReservedRooms()." ".mb_strtoupper("réservations")."<br>";
            

        }
        return $result;
    }

        
    // Afficher les statuts des chambres
    public function showRoomsStatus () {
        $result = "Statuts des chambres de <b>".$this."</b>";
        $result .= "";
        return $result;
    }
    // toString()

    public function __toString() {
        return "$this->name $this->stars $this->town";
    }

}