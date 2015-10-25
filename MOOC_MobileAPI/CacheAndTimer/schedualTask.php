<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * 定时任务
 * 1.定时任务命令
 * crontab设定服务
 * crontab -e编辑某个用户的cron服务
 * crontab -l列出某个用户的cron服务
 * crontab -r删除某个用户的cron服务
 * 命令(分 小时 日 月 星期 命令)＊代表取值范围内的数字，／代表每
 * ＊／1 ＊ ＊ ＊ ＊ user/bin/php /data/www/cron.php每分钟执行cron.php文件
 * 50 7 ＊ ＊ ＊ /sbin/service sshd start 每天7:50开启ssh服务
 * 
 * 2.定时任务php操作
 * 如何设置每分钟插入数据到数据表中
 * 写好php文件
 * 
 * 
 */
$connect = mysql_connect('localhost', '', '');
mysql_select_db('test', $connect);
$sql = "insert into category ('name', 'value')";
mysql_query($sql, $connect);