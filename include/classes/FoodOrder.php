<?php

class FoodOrder
{
    private $conn;
    private $orderDate;
    private $customerId;

    public function __construct($conn, $orderDate, $customerId)
    {
        $this->conn = $conn;
        $this->orderDate = $orderDate;
        $this->customerId = $customerId;
    }

    public function createNewFoodOrder()
    {
        mysqli_autocommit($this->conn, false);
        $query = "INSERT INTO food_order (order_date, customer_id)
            VALUES ('$this->orderDate', '$this->customerId')";

        mysqli_query($this->conn, $query);
        return mysqli_insert_id($this->conn);
    }

    public function createNewOrderItem($orderId, $menuItemId)
    {
        // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        // mysqli_autocommit($this->conn, false);
        try {
            $query = "INSERT INTO order_item VALUES ('$orderId', '$menuItemId')";
            mysqli_query($this->conn, $query);
        } catch (mysqli_sql_exception $exception) {
            throw $exception;
        }
    }
}
