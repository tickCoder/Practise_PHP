<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './db.php';

$connect = Db::getInstance()->connect();
$sql = "select * from video";
$result = mysql_query($sql, $connect);
echo  mysql_num_rows($result);
echo '</br>';
var_dump($result);
