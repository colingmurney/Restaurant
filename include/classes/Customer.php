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
        // use object email attribute to find customer
        // return null if no customer matches email
        $email = mysqli_real_escape_string($this->conn, $this->email);
        $query = "SELECT customer_id FROM customer WHERE email='$email'";
        if ($result = mysqli_query($this->conn, $query)) {
            $row = $result->fetch_assoc();
            return $row['customer_id'];
        } else {
            return NULL;
        }
    }

    public static function getCustomerIdByEmailStatic($conn, $email)
    {
        // static version of getCustomerIdByEmail
        $email = mysqli_real_escape_string($conn, $email);
        $query = "SELECT customer_id FROM customer WHERE email='$email'";
        if ($result = mysqli_query($conn, $query)) {
            $row = mysqli_fetch_assoc($result);
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
        //method creates a new customer record and returns id
        $conn = $this->conn;
        // escape variables for db query
        $customerName = mysqli_real_escape_string($conn, $this->customerName);
        $email = mysqli_real_escape_string($conn, $this->email);
        $city = mysqli_real_escape_string($conn, $this->city);
        $address = mysqli_real_escape_string($conn, $this->address);
        $postalCode = mysqli_real_escape_string($conn, $this->postalCode);
        $provinceId = mysqli_real_escape_string($conn, $this->provinceId);

        $query = "INSERT INTO customer (customer_name, email, city, address, postal_code, province_id)
            VALUES ('$customerName', '$email', '$city', '$address', '$postalCode', '$provinceId')";

        mysqli_query($conn, $query);
        return mysqli_insert_id($conn); // retrieves id of last record inserted
    }
}
