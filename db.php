<?php

// Define database connection parameters
$servername = "localhost";
$username = "dbadmin";
$password = "password123";
$dbname = "products";

// Create database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define functions to interact with database

// Function to get list of all products
function get_products() {
    global $conn;
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    $products = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
    return $products;
}

// Function to add a new product
function add_product($name, $price, $description) {
    global $conn;
    $sql = "INSERT INTO products (name, price, description) VALUES ('$name', '$price', '$description')";
    mysqli_query($conn, $sql);
}

// Function to update a product
function update_product($id, $name, $price, $description) {
    global $conn;
    $sql = "UPDATE products SET name='$name', price='$price', description='$description' WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Function to delete a product
function delete_product($id) {
    global $conn;
    $sql = "DELETE FROM products WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Close database connection
mysqli_close($conn);

?>
