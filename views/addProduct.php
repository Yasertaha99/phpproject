<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once('../layouts/app.php');
require("../../controller/product.php");
$allProd = new ProductController();
// $allCategories = $allProd->getAllCategories();
$allCategories =  Category::getAllAsObject();
if(!empty($_POST))
{ 
    $one = Category::getOneAsObject($_POST['name']);
// echo '=-----------------one--<br>';
// var_dump($one[0]);
// echo '-------------'. $one[0]['id'];
// echo $_FILES['prod_image']['name'];
    // $prod1= new Product("Tea33", 10, "tea", "avaliable", (object) $allCategories[0]);
    // $prod1= new Product($_POST['cate_name'], $_POST['price'], "image", "avaliable", $one[0]);
    $allProd->insertProd($_POST['name'], $_POST['price'], $_FILES['image'], "avaliable",$_POST['id']);
}
print_r($_POST);
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
                <legend> Add New Product</legend>
                <input type="hidden" name="id" value="<?php var_dump($product['id']+1) ;?>">
                <div class="mb-3">
                    <label for="TextInput" class="form-label"> Product</label>
                    <input type="text" id="TextInput" class="form-control" placeholder="Put your product name"
                        name="prod_name">
                </div>
                <div class="mb-3">
                    <label for="TextInput" class="form-label"> Price</label>
                    <input type="number" id="TextInput" class="form-control" name="price">
                </div>

                <div class="mb-3">
                    <label for="Select" class="form-label"> Category</label>
                    <select id="Select" class="form-select" name="name">
                        <option selected>Select Category</option>
                        <?php
                        for($i=0;$i<count($allCategories);$i++)
                            {
                                echo "<option>{$allCategories[$i]['name']}</option>";
                            }
                        ?>
                    </select>
                    <!-- <td><a href='#' class='btn btn-info'> Add Category </a> -->
                    <!-- <input type="hidden" name="categoryid" value="{$cate['id']}"> -->
                </div>
                <a href="/cafeteria/view/categories/addCategory.php" class='btn btn-primary'> Add Category </a>
                <!-- Add Category -->
                <!-- Button trigger modal -->
                <!-- <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary"
                    data-mdb-modal-init data-mdb-target="#staticBackdrop5">
                    Add Category
                </button> -->

                <!-- Modal -->
                <!-- <div class="modal top fade" id="staticBackdrop5" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
                    <div class="modal-dialog modal-dialog-centered text-center d-flex justify-content-center">
                        <div class="modal-content w-75">
                            <div class="modal-body p-4">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.webp" alt="avatar" class="rounded-circle position-absolute top-0 start-50 translate-middle h-50" />
                                <form action="/var/www/html/cafeteria/view/categories/addCategory.php" method="post">
                                    <div>
                                        <div class="modal-header">
                                            <h5 class="my-3">Add Category</h5>
                                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="cate_name" class="form-control" name="name" />
                                            <label class="form-label" for="cate_name">Category Name</label>
                                        </div>

                                        Submit button
                                        <input type="submit" class="btn btn-primary"value="Add">
                                        <input type="reset" class="btn btn-warning" value="Reset">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- Modal -->
                <!--  -->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Product Picture</label>
                    <input type="file" class="form-control" name="image" aria-describedby="emailHelp">
                </div>
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