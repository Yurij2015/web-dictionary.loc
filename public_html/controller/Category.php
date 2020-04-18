<?php
/**
 * Created by PhpStorm.
 * File: Category.php
 * Date: 18/04/2020
 * Time: 01:12
 */

class Category
{
    function get()
    {
        return R::getAll('SELECT * FROM category');
    }

    function getOne($id)
    {
        return R::getAll("SELECT * FROM category WHERE id=$id");
    }

    function getCategory($category_id)
    {
        $category = R::load('category', $category_id);
        $category_name = $category->name;
        return $category_name;
    }

    function update($name, $id)
    {
        $category = R::load('category', $id);
        $category->name = $name;
        return R::store($category);
    }
}