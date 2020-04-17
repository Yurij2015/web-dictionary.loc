<?php

/**
 * Created by PhpStorm.
 * File: Learnbook.php
 * Date: 17/04/2020
 * Time: 22:01
 */
class Learnbook
{
    function get()
    {
        return R::getAll('SELECT * FROM learnbook');
    }


}