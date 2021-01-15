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
        // $provinces = array();
        // $query = "SELECT * FROM province";
        // $result = mysqli_query($this->conn, $query);

        // while ($row = mysqli_fetch_assoc($result)) {
        //     array_push($provinces, $row);
        // }

        // return $provinces;

        $query = "SELECT * FROM province";
        $result = mysqli_query($this->conn, $query);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
