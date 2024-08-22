<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once('../layouts/app.php');
require("../../controller/product.php");
$allProd = new ProductController();
// $methods = get_class_methods('ProductController');
// echo '<pre>';
// print_r($methods);
// echo '</pre>'; 
// $allCategories =  Category::getAllAsObject();
$id = $_GET['id'];
if(!empty($_POST))
{ 
    // echo $_POST['prod_id'];
    $one = Category::getOneAsObject($_POST['cate_name']);
    $allProd->updateProd($_POST['prod_id'],$_POST['prod_name'], $_POST['price'], $_FILES['image'], $_POST['available'], $one[0]);
    header("Location:allProduct.php");
}
$product = $allProd->getProduct($id);
$category = $allProd->getCategory($product[0]['cate_id']);
$allCategories = $allProd->getAllCategories();
// foreach($allCategories as $cate)
// {
//     echo $cate['name'];
// }
// echo "-------------------<br>";

// // print_r($allCategories[0]['name']);
// echo "-------------------<br>";
// print_r($category[0]['name']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- for popup -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" />

</head>

<body>
    <div class="container">
        <form action="#" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend> Edit Product</legend>
                <div class="mb-3">
                    <label for="TextInput" class="form-label"> Product</label>
                    <input type="text" id="TextInput" class="form-control" value="<?php echo $product[0]['name'] ?>"
                        name="prod_name">
                </div>
                <div class="mb-3">
                    <label for="TextInput" class="form-label"> Price</label>
                    <input type="number" id="TextInput" class="form-control" value="<?php echo $product[0]['price'] ?>"
                        name="price">
                </div>

                <div class="mb-3">
                    <label for="Select" class="form-label"> Category</label>
                    <select id="Select" class="form-select" name="cate_name">
                        <?php
                        echo "<option selected>{$category[0]['name']}</option>";
                        foreach ($allCategories as $cate) {
                            echo "<option>{$cate['name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Select" class="form-label"> Category</label>
                    <select id="Select" class="form-select" name="available">
                        <option>avaliable</option>
                        <option>unavaliable</option>
                    </select>
                </div>

                <!-- Add Category -->
                <a href="/cafeteria/view/categories/addCategory.php" class='btn btn-primary'> Add Category </a>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Product Picture</label>
                    <input type="file" class="form-control" name="image" aria-describedby="emailHelp">
                </div>
                <input type="hidden" name="prod_id" value="<?php echo $product[0]['id'];?>">

                <input type="submit" class="btn btn-primary" value="Save">
                <input type="reset" class="btn btn-warning" value="Reset">

            </fieldset>
        </form>
    </div>


    <!-- for popup -->
    <!-- MDB -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>