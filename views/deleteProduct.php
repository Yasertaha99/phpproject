<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once('../layouts/app.php');
require("../../controller/product.php");
$id = $_GET['id'];
$allProd = new ProductController();
$allProd->delete($id);
// header('Location:allProducts.php');
header("Location: allProduct.php");
?>