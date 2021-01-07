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
        $items = '';
        $query = "SELECT * FROM menu_item WHERE item_type_id=1";
        $result = mysqli_query($this->conn, $query);

        while ($row = mysqli_fetch_array($result)) {
            $items .= '<div class="description"><dt>' . $row['item']
                . '</dt><dd>' . $row['item_details'] . '</dd></div>';
        }

        return $items;
    }
}
