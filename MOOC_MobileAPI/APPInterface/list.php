<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * 加载首页数据
 * http://localhost/Practise_PHP/MOOC_MobileAPI/APPInterface/list.php
 * 分页
 */
require_once '../response.php';
require_once './db.php';
//$dataFormat = isset($_GET['format'])?$_GET['format']:'json';
//if($dataFormat == "xml"){
//   header("Content-Type:text/xml");//如果不这样，就无法显示出xml结构 
//}

class index {

    static public function listIndex($page = 1, $pagesize = 6) {
        if (!is_numeric($page) || !is_numeric($pagesize)) {
            return Response::showFromURL(401, '请求数据不合法');
        }
        
        $offset = ($page - 1) * $pagesize;
        try {
            $connect = Db::getInstance()->connect();
        } catch (Exception $exc) {
            return Response::showFromURL(403, '数据库连接失败');
            //exit;
        }


        $sql = "select * from video where status=1 order by time desc limit " . $offset . "," . $pagesize;

        $result = mysql_query($sql, $connect);

        $videos = array();
        while ($video = mysql_fetch_assoc($result)) {
            $videos[] = $video;
        }

        if ($videos) {
            return Response::showFromURL(200, 'OK', $videos);
        } else {
            return Response::showFromURL(400, 'error');
        }
    }

}
