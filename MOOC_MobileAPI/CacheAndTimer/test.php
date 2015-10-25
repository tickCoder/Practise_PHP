<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './file.php';
$data = array(
    'id'=>1,
    'name'=>'singwa',
    'type'=>array(4,5,6),
    'test'=>array(1,3,45=>array(123,'tssdfsdf'),),
);

$file = new File();
if($file->cacheData('index_cache', $data)) {
    echo 'save cache ok';
} else {
    echo 'save cache fail';
}

echo '</br>';
if($file->cacheData('index_cache')) {
    echo 'read cache ok';
} else {
    echo 'read cache fail';
}

echo '</br>';
if($file->cacheData('index_cache', NULL)) {
    echo 'delete cache ok';
} else {
    echo 'delete cache fail';
}


