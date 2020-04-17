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

    function getOne($id)
    {
        return R::getAll("SELECT * FROM learnbook WHERE id=$id");
    }

    function create($title, $summary, $content, $tutor_id, $category_id)
    {
        $learnbook = R::dispense('learnbook');
        $learnbook->title = $title;
        $learnbook->summary = $summary;
        $learnbook->content = $content;
        $learnbook->tutor_id = $tutor_id;
        $learnbook->category_id = $category_id;
        return R::store($learnbook);
    }


    function update($title, $summary, $content, $tutor_id, $category_id, $id)
    {
        $learnbook = R::load('learnbook', $id);
        $learnbook->title = $title;
        $learnbook->summary = $summary;
        $learnbook->content = $content;
        $learnbook->tutor_id = $tutor_id;
        $learnbook->category_id = $category_id;
        return R::store($learnbook);
    }

}