
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>OOP Project</title>
</head>
<body id="body">
    <section>
        <!-- Heading and buttons  -->
        <div class="border-b-2 border-black px-4 py-4 container mx-auto flex justify-between items-center mt-14">
            <div>
                <h1 class="text-4xl">Product List</h1>
            </div>
           
            <div class="space-x-4">
                <button class="border-2 border-black px-2"><a href="addProject.php">ADD</a></button>
                <button id="delete-product-btn" class="border-2 border-black px-2">MASS DELETE</button>
                
            </div>
        </div>
        <!-- End of Heading and buttons -->
         
    </section>
    <section class="mt-25">
        <!-- products -->
        <?php
// Create a class for database connection and operations
class DBConnection {
    private $pdo;
    
    public function __construct($host, $user, $password, $dbname) {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->pdo = new PDO($dsn, $user, $password, $options);
    }
    
    public function fetchAllProducts() {
        $sql = "SELECT * FROM products";
        $q = $this->pdo->query($sql);
        return $q->fetchAll();
    }
}

// Create a class for products
class Product {
    private $sku;
    private $productName;
    private $price;
    private $size;
    private $weight;
    private $dimensions;
    
    public function __construct($sku, $productName, $price, $size, $weight, $dimensions) {
        $this->sku = $sku;
        $this->productName = $productName;
        $this->price = $price;
        $this->size = $size;
        $this->weight = $weight;
        $this->dimensions = $dimensions;
    }
    
    public function getSKU() {
        return $this->sku;
    }
    
    public function getProductName() {
        return $this->productName;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function getSize() {
        return $this->size;
    }
    
    public function getWeight() {
        return $this->weight;
    }
    
    public function getDimensions() {
        return $this->dimensions;
    }
}

// Create a class for rendering products
class ProductRenderer {
    public function render(Product $product) {
        echo '
        <div class="mt-15 flex justify-center space-x-12 px-2 py-2 border-2 border-blue-500 rounded">
            <div>
                <input id="chadbox" type="checkbox">
            </div>
            <div class="flex flex-col space-y-4 text-center">
                <h1>' . $product->getSKU() . '</h1>
                <h2>' . $product->getProductName() . '</h2>
                <h2>' . $product->getPrice() . '</h2>
                <h2>' . $product->getSize() . '</h2>
                <h2>' . $product->getWeight() . '</h2>
                <h2>' . $product->getDimensions() . '</h2>
            </div>
        </div>
        ';
    }
}

// Usage example
$db = new DBConnection("localhost", "root", "", "Product-DB");
$products = $db->fetchAllProducts();
$renderer = new ProductRenderer();
echo '<div class="container mx-auto grid grid-cols-4 space-x-4 space-y-2 py-4">';
foreach ($products as $productData) {
    $product = new Product(
        $productData['sku'],
        $productData['productN'],
        $productData['price'],
        $productData['Size'],
        $productData['WeightP'],
        $productData['dimensions']
    );
    $renderer->render($product);
}
echo '</div>';
?>

        </div>
        <form id="form" action="" method="POST">
        <div id="deleteDiv" class="hidden absolute w-44 top-3 left-[50%] flex-col z-10 justify-center px-2 py-2 border-black border-2 rounded">
            <div>
                <h2>Do you want to delete it?</h2>
            </div>
           <div class="flex space-x-2">
            
                <button type="submit" id="submit" name="submit" class="border-black border-2 px-2 py-2">Yes</button>
                <button onclick="cancel()" class="border-black border-2 px-2 py-2">Cancel</button>
           </div>
           <div id="valiSpan" class="hidden">
            <span class="text-sm text-red-500">checkbox is not checked, you can not delete anything</span>
           </div>
        </div>
        </form>
       
      
        
      
    </section>
    <script src="./delete.js"></script>
</body>
</html>
<?php
// Create a class for database connection and operations
class DConnection {
    private $pdo;
    
    public function __construct($host, $user, $password, $dbname) {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->pdo = new PDO($dsn, $user, $password, $options);
    }
    
    public function deleteProduct($sku) {
        $sql = "DELETE FROM products WHERE sku = :sku";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":sku", $sku);
        return $stmt->execute();
    }
}

// Usage example
if (isset($_POST['submit'])) {
    $db = new DConnection("localhost", "root", "", "Product-DB");
    if ($db->deleteProduct($_SESSION['sku'])) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "error";
    }
}