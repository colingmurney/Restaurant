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
        $reasons = array();
        $query = "SELECT * FROM contact_reason";
        $result = mysqli_query($this->conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($reasons, $row);
        }

        return $reasons;
    }
}
