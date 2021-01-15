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
        $query = "SELECT * FROM menu_item";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getTypeOneMenuItems()
    {
        $query = "SELECT * FROM menu_item WHERE item_type_id=1;";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getTypeTwoAndThreeMenuItems()
    {
        $query = "SELECT * FROM menu_item WHERE item_type_id=2 OR item_type_id=3 ORDER BY item_type_id;";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getTypeTwoMenuItems()
    {
        $query = "SELECT * FROM menu_item WHERE item_type_id=2;";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($result . MYSQLI_ASSOC);
    }

    public function getTypeThreeMenuItems()
    {
        $query = "SELECT * FROM menu_item WHERE item_type_id=3;";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
