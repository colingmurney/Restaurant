<?php

class ContactForm
{
    private $conn;
    private $body;
    private $reasonId;
    private $customerId;

    public function __construct($conn, $body, $reasonId, $customerId)
    {
        $this->conn = $conn;
        $this->body = $body;
        $this->reasonId = $reasonId;
        $this->customerId = $customerId;
    }

    public function createNewContactForm()
    {
        $conn = $this->conn;
        $body = mysqli_real_escape_string($conn, $this->body);
        $reasonId = mysqli_real_escape_string($conn, $this->reasonId);
        $customerId = mysqli_real_escape_string($conn, $this->customerId);

        $query = "INSERT INTO contact_form (body, reason_id, customer_id)
            VALUES ('$body', '$reasonId', '$customerId')";
        try {
            mysqli_query($conn, $query);
            return true;
        } catch (mysqli_sql_exception $e) {
            throw $e;
            return false;
        }
    }
}
