<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * 通信数据标准格式,如
 * code状态码, message提示信息, data返回数据
 */

class Response {
    // 按json方式输出通信数据
    public static function json($code, $message='', $data=array()){
        if(!is_numeric($code)){
            return '';
        }
        
        $result = array(
            'code' => $code,
            'message' => $message,
            'data' => $data
        );
        
        echo json_encode($result);
        //exit;
    }
    
    // 输出xml
    public static function xml(){
        $xml = "<?xml version='1.0' encoding='UTF-8'?>";
        $xml .= "<root>";
        $xml .= "<code>200</code>";
        $xml .= "<message>success</message>";
        $xml .= "<data>";
        $xml .= "<id>1</id>";
        $xml .= "<name>singwa</name>";
        $xml .= "</data>";
        $xml .= "</root>";
        //echo $xml;
        //exit;
        return $xml;
    }
    
    // 按xml方式输出
    public static function xmlEncode($code, $message='', $data=array()){
        if(!is_numeric($code)){
            return '';
        }
        $result = array(
            'code' => $code,
            'message' => $message,
            'data' => $data
        );
        $xml = "<?xml version='1.0' encoding='UTF-8'?>";
        $xml .= "<root>";
        $xml .= self::xmlToEncode($result);
        $xml .= "</root>";
        return $xml;
    }
    
    private static function xmlToEncode($data){
        $xml = "";
        $attr = "";
        foreach ($data as $key => $value) {
            if(is_numeric($key)){
                //'type' => array(3,4,5)//节点会使用0，1，2作为key，但是key不能为数字，所以会出错，需要在遇到时处理
                // 如果没有key的话（这时默认key为数字）
                $attr = "id='{$key}'";
                $key = "__undefinedKey";
            }
            $xml .= "<{$key} {$attr}>";
            $xml .= is_array($value)?self::xmlToEncode($value):$value;
            $xml .= "</{$key}>";
        }
        return $xml;
    }

    //综合方式输出（json或xml）
    public static function show($code, $message='', $data=array(), $type='json'){
        if(!is_numeric($code)){
            return '';
        }
        $result = array(
            'code' => $code,
            'message' => $message,
            'data' => $data
        );
        if($type == 'json') {
            return json_encode($result);
        } else if($type == 'xml') {
            return self::xmlEncode($code, $message, $data);
        } else {
            return "unknown type: {$type}";
        }
    }
    
    const JSON = 'json';
    public static function showFromURL($code, $message='', $data=array(), $type=self::JSON){
        if(!is_numeric($code)){
            return '';
        }
        
        $type = isset($_GET['format'])?$_GET['format']:self::JSON;
        $result = array(
            'code' => $code,
            'message' => $message,
            'data' => $data
        );
        if($type == 'json') {
            return json_encode($result);
        } else if($type == 'xml') {
            return self::xmlEncode($code, $message, $data);
        } else {
            return "unknown type: {$type}";
        }
    } 
}