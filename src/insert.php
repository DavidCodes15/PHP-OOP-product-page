<?php 

session_start();


class Product{
   private $pdo;

   public function __construct($pdo)
   {
      $this->pdo = $pdo;
   }

   public function saveProduct($sku, $name, $price, $height, $width, $length, $size, $weight){
      $dimensions = ($height === '' || $height == null) ? null : $height . "X" . $width . "X" . $length;

      $sql = "SELECT sku FROM products WHERE sku = ?";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$sku]);
      $existing_sku = $stmt->fetch();

      if ($existing_sku) {
          // SKU already exists in the database, handle the error accordingly
          echo "Error: SKU already exists in the database.";
          echo "<button><a href='./addProject.php'>Go back</a></button>";
          return;
      }
      
      $_SESSION['sku'] = $sku;
      $_SESSION['name'] = $name;
      $_SESSION['price'] = $price;
      $_SESSION['size'] = $size;
      $_SESSION['weight'] = $weight;
      $_SESSION['dimensions'] = $dimensions;

      $sql = "INSERT INTO products (sku, productN, price, Size, WeightP, dimensions) VALUES (?,?,?,?,?,?)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$sku, $name, $price, $size, $weight, $dimensions]);

      header("Location: ./index.php");
      exit();
   }
}
include "DB.php";

$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$height = $_POST['height'];
$width = $_POST['width'];
$length = $_POST['length'];
$size = $_POST['size'];
$weight = $_POST['weight'];

$product = new Product($pdo);
$product->saveProduct($sku, $name, $price, $height, $width, $length, $size, $weight);


?>


