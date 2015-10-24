<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$arr = array(
    'title' => 'singwa',
    'from' => 'online education',
    'description' => 'singwa',
    'address' => 'beijing'
);

function json($arr) {
    echo json_encode($arr);//json_encode只能接受utf－8，其他会为null
    exit;
}

function xml($arr) {
    header("Content-type:text/xml");
    $result = "<?xml version='1.0' encoding='UTF-8'?>\n";
    $result .= "<item>\n";
    $result .= "<title>singwa</title>\n<test id='1'/>\n";
    $result .= "<description><singwa1/description>\n";
    $result .= "<address>beijing</address>\n";
    $result .= "</item>\n";
    echo $result;
    echo '<br/>';;
    
    
//    $dom = new DOMDocument('1.0', 'utf-8');
//    $article = $dom->createElement('item');
//    $dom->appendChild();
    
    /*
     * PHP生成XML方法
     * 字符串拼接
     * DOMDocument
     * XMLWriter
     * SimpleXML
     */
}

echo json($arr);