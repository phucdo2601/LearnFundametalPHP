<?php
    class Product {
        public $item_id;
        public $item_brand;
        public $item_name;
        public $item_price;
        public $item_image;
        public $item_register;

        public function __construct($item_id, $item_brand, $item_name, $item_price,
            $item_image, $item_register
        ){
            $this->item_id = $item_id;
            $this->item_brand = $item_brand;
            $this->item_name = $item_name;
            $this->item_price = $item_price;
            $this->item_image = $item_image;
            $this->item_register = $item_register;
        }
        
        function getItemId() {
            return $this->item_id;
        }

        function setItemId($item_id) {
            $this->item_id = $item_id;
        }

        function getItemBrand() {
            return $this->item_brand;
        }

        function setItemBrand($item_brand) {
            $this->item_brand = $item_brand;
        }

        function getItemName() {
            return $this->item_name;
        }

        function setItemName($item_name) {
            $this->item_name = $item_name;
        }

        public function getItemPrice() {
            return $this->item_price;
        }

        public function setItemPrice($item_price) {
            $this->item_price = $item_price;
        }

        public function getItemImage() {
            return $this->item_image;
        }

        public function setItemImage($item_image) {
            $this->item_image = $item_image;
        }

        public function getItemRegister() {
            return $this->item_register;
        }

        public function setItemRegister($item_register) {
            $this->item_register = $item_register;
        }

    }
?>