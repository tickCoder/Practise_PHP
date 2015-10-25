<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Db {
    // 单例
    static private $_instance;
    static private $_connectSource;
    private $_dbConfig= array(
        'host' => 'localhost',
        'user' => 'practise',
        'password' => 'practise',
        'database' => 'Practise_PHP'
    );
    private function __construct() {
    }
    static public function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function connect() {
        if (!self::$_connectSource) {
            self::$_connectSource = mysql_connect($this->_dbConfig['host'], $this->_dbConfig['user'], $this->_dbConfig['password']);
            if (!self::$_connectSource) {
                throw new Exception('mysql connect error ' . mysql_error());
                //die('mysql connect error ' . mysql_error());
            }
            mysql_select_db($this->_dbConfig['database'], self::$_connectSource);
            mysql_query("set names UTF-8", self::$_connectSource);
        }
        return self::$_connectSource;
    }
}