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
        $provinces = '';
        $query = "SELECT * FROM province";
        $result = mysqli_query($this->conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $provinces .= '<option value="' . $row['province_id'] . '">' . $row['province_name']
                . '</option>';
        }

        return $provinces;
    }
}
