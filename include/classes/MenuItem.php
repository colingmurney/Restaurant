<?php

class MenuItem
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllMenuItems()
    {
        $items = array();
        $query = "SELECT * FROM menu_item";
        $result = mysqli_query($this->conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($items, $row);
        }

        return $items;
    }

    public function getTypeOneMenuItems()
    {
        $items = array();
        $query = "SELECT * FROM menu_item WHERE item_type_id=1;";
        $result = mysqli_query($this->conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($items, $row);
        }

        return $items;
    }

    public function getTypeTwoAndThreeMenuItems()
    {
        $items = array();
        $query = "SELECT * FROM menu_item WHERE item_type_id=2 OR item_type_id=3 ORDER BY item_type_id;";
        $result = mysqli_query($this->conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($items, $row);
        }

        return $items;
    }

    public function getTypeTwoMenuItems()
    {
        $items = array();
        $query = "SELECT * FROM menu_item WHERE item_type_id=2;";
        $result = mysqli_query($this->conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($items, $row);
        }

        return $items;
    }

    public function getTypeThreeMenuItems()
    {
        $items = array();
        $query = "SELECT * FROM menu_item WHERE item_type_id=3;";
        $result = mysqli_query($this->conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($items, $row);
        }

        return $items;
    }
}
