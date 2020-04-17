<?php
/**
 * Created by PhpStorm.
 * File: add-edu-material-handler.php
 * Date: 17/04/2020
 * Time: 14:58
 */
require("lib/RedBeanPHP5_4_2/rb.php");
require ("Dbsettings.php");
R::setup("mysql:host=$host;port=$port;dbname=$db_name", "$user", "$password");