<?php
require("../model/category.php");

class CategoryController 
{
    function store($name)
    {
        $cate = new Category('mm');
        $category = $cate->insert($name);
    }
}
?>