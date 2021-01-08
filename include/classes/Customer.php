<?php

class Customer
{
    private $conn;
    private $customerName;
    private $email;
    private $city;
    private $address;
    private $postalCode;
    private $provinceId;


    public function __construct($conn, $customerName, $email, $city, $address, $postalCode, $provinceId)
    {
        $this->conn = $conn;
        $this->customerName = $customerName;
        $this->email = $email;
        $this->city = $city;
        $this->address = $address;
        $this->postalCode = $postalCode;
        $this->provinceId = $provinceId;
    }

    public function getCustomerIdByEmail()
    {
        $query = "SELECT customer_id FROM customer WHERE email='$this->email'";
        if ($result = mysqli_query($this->conn, $query)) {
            $row = $result->fetch_assoc();
            return $row['customer_id'];
        } else {
            return NULL;
        }
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function createNewCustomer()
    {
        $query = "INSERT INTO customer (customer_name, email, city, address, postal_code, province_id)
            VALUES ('$this->customerName', '$this->email', '$this->city', '$this->address', '$this->postalCode', '$this->provinceId')";

        mysqli_query($this->conn, $query);
        return mysqli_insert_id($this->conn);
    }
}
