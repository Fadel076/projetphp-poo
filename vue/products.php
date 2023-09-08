
<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h1>Create a New Product</h1>
    
    <form action="products.php" method="post">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required><br><br>
        
        <label for="product_price">Price:</label>
        <input type="text" id="product_price" name="product_price" required><br><br>
        
        <label for="product_description">Description:</label><br>
        <textarea id="product_description" name="product_description" rows="4" cols="50" required></textarea><br><br>
        
        <input type="submit" value="Create Product">
    </form>
</body>
</html>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_description = $_POST["product_description"];
    
    try {
        // Connect to the database using PDO
        $pdo = new PDO("mysql:host=localhost;dbname=gestion_de_stock", "root", "");
        
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare the SQL statement for inserting the product data
        $stmt = $pdo->prepare("INSERT INTO products (name, price, description) VALUES (:name, :price, :description)");
        
        // Bind parameters
        $stmt->bindParam(':name', $product_name);
        $stmt->bindParam(':price', $product_price);
        $stmt->bindParam(':description', $product_description);
        
        // Execute the statement
        $stmt->execute();
        
        // Redirect back to the product listing page or do something else
        header("Location: products.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
