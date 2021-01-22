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
        // returns the new food order id

        $conn = $this->conn;
        $orderDate = mysqli_real_escape_string($conn, $this->orderDate);
        $customerId = mysqli_real_escape_string($conn, $this->customerId);

        $query = "INSERT INTO food_order (order_date, customer_id)
            VALUES ('$orderDate', '$customerId')";

        mysqli_query($conn, $query);
        return mysqli_insert_id($conn); // retrieves id of last record inserted
    }

    public function createNewOrderItem($orderId, $menuItemId)
    {
        // create new order item with the new food order id
        // does not return anything but catches and throws exception on error
        $conn = $this->conn;
        $orderId = mysqli_real_escape_string($conn, $orderId);
        $menuItemId = mysqli_real_escape_string($conn, $menuItemId);

        try {
            $query = "INSERT INTO order_item VALUES ('$orderId', '$menuItemId')";
            mysqli_query($this->conn, $query);
        } catch (mysqli_sql_exception $exception) {
            throw $exception;
        }
    }
}
