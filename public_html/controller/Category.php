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
}