<?php

class ContactReason
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllContactReasons()
    {
        $query = "SELECT * FROM contact_reason";
        $result = mysqli_query($this->conn, $query);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
