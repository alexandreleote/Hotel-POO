<?php

class Hotel {
    private string $name; // Raison sociale de l'établissement
    private string $stars; // Distinction étoilée
    private string $adress; // Adresse Rue
    private string $pc; // Code postal
    private string $town; // Ville
    private array $rooms; // array de chambres appartenant à l'établissement
    private array $reservations; // array de chambres appartenant à l'établissement

    public function __construct(string $name, string $stars, string $adress, string $pc, string $town) {
        $this->name = $name;
        $this->stars = $stars;
        $this->adress = $adress;
        $this->pc = $pc;
        $this->town = $town;
        $this->rooms = [];
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

    public function getReservations() : array
    {
        return $this->reservations;
    }

    public function setReservations($reservations)
    {
        $this->reservations = $reservations;

        return $this;
    }



    // Functions

    // Ajout de la chambre à l'hôtel
    public function addRoom(Room $room) {
        $this->rooms[] = $room; 
    }

    // Ajout des réservations faites auprès de l'hôtel
    public function addReservation(Reservation $reservation) {
        $this->reservations[] = $reservation;
    }

    // Compter les chambres
    public function countRooms() {
        return count($this->rooms);
    }

    // Créer un parc de chambres

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

    // Afficher les réservations
    public function showReservations () {
        $result = "<h3> Réservations de l'hôtel $this</h3>";
        if ($this->countReservedRooms() > 0){ // Si le nombre de réservation est supérieur à 0 alors on affiche les infos suivants
            $result .= $this->countReservedRooms()." ".mb_strtoupper("réservations")."<br>";
            // On ajoute le nom du client ayant réservé avec les informations associées à la réservation
            foreach ($this->reservations as $reservation) {
                $result .= $reservation->getClient()." - ".$reservation->getRoom()." - ".$reservation."<br>";
            }
        } else {
            $result .= "Aucune réservation !<br><br>";
        }
        return $result;
    }

    // Afficher Wifi d'une chambre dans le status
    public function showHasWifi($room) {
        if ($room->getWifi() == true) {
            return "<img src='./ressources/wifi-icon.png' alt='icône du réseau wifi disponible'width=32 height=32 >"; // Si la valeur du WiFi est true on retourne l'icone
        } else {
            return "";
        }
    }

   // Fonction de disponibilité
    public function isRoomBooked($room){
        if ($room->getIsBooked() == true) {
            return mb_strtoupper("réservée"); // Si la valeur de la chambre est true on retourne qu'elle n'est pas disponible
        } else {
            return mb_strtoupper("disponible");
        }
    }




    // Afficher les statuts des chambres
    public function showRoomsStatus () {
        $result = "Statuts des chambres de <b>".$this."</b>";
        $result .= "<br><br><table>
                    <thead>
                        <tr>
                            <th>".mb_strtoupper("chambre")."</th> 
                            <th>".mb_strtoupper("prix")."</th> 
                            <th>".mb_strtoupper("wifi")."</th> 
                            <th>".mb_strtoupper("état")."</th>                     
                        </tr>
                    </thead>
                    <tbody>";
                    foreach($this->rooms as $room){ // Pour afficher les éléments de la chambre en question
                        $result .= // On récupère le numéro de la chambre puis son prix associer, on appelle notre méthode pour savoir si la chambre dispose d'une connexion WiFi et si la chambre est dispo
                            "<tr>
                                <td>Chambre ".$room->getRoomNumber()."</td>
                                <td>".$room->getPrice()." €</td>
                                <td>".$this->showHasWifi($room)."</td>  
                                <td>".$this->isRoomBooked($room)."</td>
                            </tr>";  
                    }        
            $result .=      "</tbody></table>";         
        return $result;
    }

    // toString()

    public function __toString() {
        return "$this->name $this->stars $this->town";
    }



}