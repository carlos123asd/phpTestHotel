<?php
    class Room{
        private $id;
        private $roomNumber;
        private $photo;
        private $typeRoom;
        private $description;
        private $offer;
        private $price;
        private $discount;
        private $cancellation;
        private $status;
        private $amenities;

        public function __construct($id,$roomNumber,$photo,$typeRoom,$description,$offer,$price,$discount,$cancellation,$status,$amenities)
        {
            $this -> $id = $id;
            $this -> $roomNumber = $roomNumber;
            $this -> $photo = $photo;
            $this -> $typeRoom = $typeRoom;
            $this -> $description = $description;
            $this -> $offer = $offer;
            $this -> $price = $price;
            $this -> $discount = $discount;
            $this -> $cancellation = $cancellation;
            $this -> $status = $status;
            $this -> $amenities = $amenities;
        }
    }
?>