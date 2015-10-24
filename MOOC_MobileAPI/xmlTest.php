<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './Response.php';
header("Content-Type:text/xml");//如果不这样，就无法显示出xml结构
echo  Response::xml();

