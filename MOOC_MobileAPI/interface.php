<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * 定义一个接口
 * 提供一个标准
 */
interface video {
    public function getVideos();
    public function getCount();
}

/*
 * 必须要实现接口中的所有方法
 */
class movie implements video {

    function __construct() {
        
    }
    
    public function getVideos() {
        echo 2;
    }
    
    public function getCount() {
        echo 1;
    }
}

movie::getVideos();
echo '<br/>';
movie::getCount();

/*
 * 接口定义
 * 1.接口地址：http://app.com/api.php?format=xml
 * 2.接口文件：api.php处理业务逻辑
 * 3.接口数据：
 */