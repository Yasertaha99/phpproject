<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once('..app.php');
require("/controller/categoryController.php");
$cate = new categoryController();
if (!empty($_POST)) {
    $cate->store($_POST["cate_name"]);
    header("Location:/cafeteria/view/products/addProduct.php");
}

?>
<div class="container">
    <h2>Add Category</h2>
    <form method="post">
        <div class="form-group">
            <label for="catename">Category Name</label>
            <input type="text" class="form-control" name="cate_name" id="catename" aria-describedby="emailHelp"
                placeholder="Enter Category Name">
        </div>
        <div class="form-group m-10">
            <input type="submit" class="btn btn-primary" value="Add Category">
        </div>
    </form>
</div>