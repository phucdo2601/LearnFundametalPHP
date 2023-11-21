<?php
    class Product {
        public $item_id;
        public $item_brand;
        public $item_name;
        public $item_price;
        public $item_image;
        public $item_register;

        public function __construct($modelArr)
        {
            $this->item_id = $modelArr['item_id'];
            $this->item_brand = $modelArr['item_brand'];
            $this->item_name = $modelArr['item_name'];
            $this->item_price = $modelArr['item_price'];
            $this->item_image = $modelArr['item_image'];
            $this->item_register = $modelArr['item_register'];
        }

        public function getItemId() {
            return $this->item_id;
        }

        public function setItemId($item_id) {
            $this->item_id = $item_id;
        }

        public function getItemBrand() {
            return $this->item_brand;
        }

        public function setItemBrand($item_brand) {
            $this->item_brand = $item_brand;
        }

        public function getItemName() {
            return $this->item_name;
        }

        public function setItemName($item_name) {
            $this->item_name = $item_name;
        }

        public function getItemPrice() {
            return $this->item_price;
        }

        public function setItemPrice($item_price) {
            $this->item_price = $item_price;
        }
    }
?>