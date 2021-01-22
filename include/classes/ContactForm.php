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
        // escape inputs
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

    public static function getMessagesSearch($conn, $searchInput, $filter)
    {
        // method can be used for any all contact form searches
        // as well as any filter

        // escape inputs
        $searchInput = mysqli_real_escape_string($conn, $searchInput);
        $filter = mysqli_real_escape_string($conn, $filter);

        $whereClause = 'WHERE customer_name REGEXP "' . $searchInput . '*" ';

        // generate a second where clause if filter arg is 'pending' or 'replied'
        if ($filter == "pending") {
            $whereClause .= "AND is_pending=1";
        } elseif ($filter == "replied") {
            $whereClause .= "AND is_pending=0";
        }

        $query = 'SELECT contact_form_id, customer_name, email, body, reason, is_pending
                    FROM customer
                    JOIN contact_form USING(customer_id)
                    JOIN contact_reason USING(reason_id) ' . $whereClause . ';';

        $result = mysqli_query($conn, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public static function getAllMessages($conn)
    {
        $query = "SELECT contact_form_id, customer_name, email, body, reason, is_pending
                    FROM customer
                    JOIN contact_form USING(customer_id)
                    JOIN contact_reason USING(reason_id);";

        $result = mysqli_query($conn, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public static function getPendingMessages($conn)
    {
        $query = "SELECT contact_form_id, customer_name, email, body, reason, is_pending
                    FROM customer
                    JOIN contact_form USING(customer_id)
                    JOIN contact_reason USING(reason_id)
                    WHERE is_pending=1;";
        $result = mysqli_query($conn, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public static function getRepliedMessages($conn)
    {
        $query = "SELECT contact_form_id, customer_name, email, body, reason, is_pending
                    FROM customer
                    JOIN contact_form USING(customer_id)
                    JOIN contact_reason USING(reason_id)
                    WHERE is_pending=0;";
        $result = mysqli_query($conn, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
