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
        $query = "SELECT * FROM menu_item WHERE item_type_id=1";
        $result = mysqli_query($this->conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($items, $row);
        }

        return $items;
    }
}
