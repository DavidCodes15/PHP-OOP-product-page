<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ADD Project</title>
</head>
<body>
    <section>
        <!-- Start of Heading -->
        <div class="container mx-auto border-b-2 border-black px-2 py-4">
            <h1 class="text-4xl">Add Product</h1>
        </div>
        <!-- End of Heading -->
    </section>
    <section>
        <!-- start of add project form -->
        <div class="container mx-auto mt-14">
            <form id="product_form" action="./insert.php" method="POST">
                <label for="sku">enter sku:</label><br>
                <input type="text" name="sku" id="sku" class="border-black border-2 px-2 py-2"><br>
                <span id="ErrorSku" class="mt-2 text-red-500 hidden">it is empty, please fill it out.Length of the sku should be between 1 and 20</span><br>
                
                <label for="name">enter Name:</label><br>
                <input type="text" name="name" id="name" class="border-black border-2 px-2 py-2"><br>
                <span id="ErrorName" class="mt-2 text-red-500 hidden">it is empty, please fill it out. Length of the name should be between 1 and 25</span><br>
                
                
                <label for="price">enter price:</label><br>
                <input type="text" id="price" name="price" class="border-black border-2 px-2 py-2"><br>
                
                <span id="ErrorDollar" class="mt-2 text-red-500 hidden">it should not be empty, also you have to include $ and use numbers.$ and numbers should be together, not seperated.</span><br>
                <div id="productType" class="space-y-4">
                    <label for="typeSwitcher">choose product type</label>
                    <div id="DivHandler" class="flex space-x-4">
                        <h2 onclick="DVDHandler()" class="cursor-pointer">DVD</h2>
                        <h2 onclick="BookHandler()" class="cursor-pointer">Book</h2>
                        <h2 onclick="FurHandler()" class="cursor-pointer">Furniture</h2>
                    </div>
                </div>
                <div id="dvd" class="hidden mt-14">
                    <label for="size">Please, provide size in MB:</label><br>
                    <input type="text" name="size" id="size" class="border-black border-2 px-2"><br>
                    <span id="ErrorSize" class="mt-2 text-red-500 hidden">it should not be empty,Include MB and use numbers.MB and numbers should be together not seperated.</span><br>
                </div>
                <div id="book" class="hidden mt-14">
                    <label for="weight">please, provide weight in KG:</label><br>
                    <input type="text" name="weight" id="weight" class="border-black border-2 px-2"><br>
                    <span id="ErrorWeight" class="mt-2 text-red-500 hidden">it should not be empty,Include KG and use numbers.Numbers and KG should be together, not seperated</span><br>
                </div>
                <div id="furniture" class="hidden mt-14">
                    <label for="" class="text-3xl">please, provide dimensions</label>
                    <div class="flex space-x-4 mt-14">
                    <div>
                    <label for="height">enter height:</label><br>
                    <input type="text" name="height" id="height" class="border-black border-2 px-2"><br>
                    <span id="ErrorH" class="mt-2 text-red-500 hidden">it is empty, please fill it out.Only use numbers.</span><br>
                    </div>
                    <div>
                    <label for="width">enter width:</label><br>
                    <input type="text" name="width" id="width" class="border-black border-2 px-2"><br>
                    <span id="ErrorW" class="mt-2 text-red-500 hidden">it is empty, please fill it out.Only use numbers.</span><br>
                    </div>
                    <div>
                    <label for="length">enter length:</label><br>
                    <input type="text" name="length" id="length" class="border-black border-2 px-2"><br>
                    <span id="ErrorL" class="mt-2 text-red-500 hidden">it is empty, please fill it out. Only use numbers.</span><br>
                    </div>
                    </div>
                </div>
                <div class="mt-14 pb-4">
                <button id="submitBtn" onclick="validateForm(event)" type="submit" name="submit" class="border-slate-500 border-2 px-2">Save</button>
                <button class="border-black border-2 px-2"><a href="./index.php">cancel</a></button>
            </div>
            </form>
            
        </div>
      
        <!-- end of add project form -->
    </section>
    <script src="./validate.js"></script>
</body>
</html>

