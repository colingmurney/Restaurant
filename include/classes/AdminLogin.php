<?php


class AdminLogin
{
    private $conn;
    private $username;
    private $hashedPassword;

    public function __construct($conn, $username, $hashedPassword)
    {
        $this->conn = $conn;
        $this->username = $username;
        $this->hashedPassword = $hashedPassword;
    }

    public function getAdminByUsername()
    {
        $username = mysqli_real_escape_string($this->conn, $this->username);
        $query = "SELECT * FROM admin_login WHERE username = '$username'";

        if ($result = mysqli_query($this->conn, $query)) {
            $row = $result->fetch_assoc();
            return $row;
        }
        return NULL;
    }

    public function getHashedPassword()
    {
        return $this->hashedPassword;
    }
}
