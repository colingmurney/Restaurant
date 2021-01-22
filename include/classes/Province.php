<?php

class Province
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllProvinces()
    {
        // get provinces for payment form 
        $query = "SELECT * FROM province";
        $result = mysqli_query($this->conn, $query);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
