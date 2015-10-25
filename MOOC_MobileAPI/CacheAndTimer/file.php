<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class File{
    private $_dir;
    const EXT = '.txt';

    public function __construct() {
        $this->_dir = dirname(__FILE__).'/cacheFile/';
    }

    public function cacheData($key, $value='', $path=''){
        $filename = $this->_dir.$path.$key.self::EXT;
        if($value!==''){
            
            // 删除缓存
            if(is_null($value)){
                return @unlink($filename);
            }
            
            // 将value值保存到缓存
            $dir = dirname($filename);
            if(!is_dir($dir)){
                // 创建目录
                mkdir($dir, 0777);
            }
            return file_put_contents($filename, json_encode($value));// 成功：返回字节数，否则返回false
        }
        
        // 获取缓存
        if(!is_file($filename)){
            return FALSE;
        } else {
            return json_decode(file_get_contents($filename), TRUE);
        }
    }
}

/*
 * 缓存技术
 * Memocache, Redis
 * 都是用来管理数据的，他们的数据都是放在内存中
 * Redis可以定期将数据备份到磁盘（memcache不能）
 * Memcache只是简单的key/value缓存
 * Redis不仅支持简单的k/v类型数据，同时支持list,set,hash等数据结构的存储
 * 
 * php处理程序 ------> Redis/Memcache客户端 ------> set/get命令 ------> Redis/Memcache
 * 1.开启Redis客户端
 * cd redis
 * redis-server 6307.conf
 * cd /wxh/redis-stable/src
 * redis-cli
 * 这时显示127.0.0.1:6379
 * 2.设置缓存值set key value （返回OK）
 * 3.获取缓存值get key  (返回值或nil)
 * 4.设置过期时间setex key 10 value（失效时间10秒)
 * 5.删除缓存del key （返回1代表成功）
 * 
 * php操作redis
 * 1.安装phpredis扩展
 * 2.php链接服务
 * cd /data/www/app
 * 新建setCache.php,并填写代码
 * php setCache.php//执行文件
 * 
 * php操作memcache，可参考php手册
 * 1.安装扩展memcache
 */

/*
$redis = new Redis();
$redis->connect('127.0.0.1', '6379');
$redis->set('singwa', 'value');//key/value-singwa/value
$redis->setex('singwa', 10, 'value');//设置失效时间10s
$redis->get('singwa');
 * */


