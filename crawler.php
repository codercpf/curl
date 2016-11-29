<?php

// 定义：cURL, Client URL Library Functions
// 使用URL语法传输数据的命令行工具

/*
* 执行过程：
* 1、cmd中  cd /d F:\dev\imooc\curl(即文件路径)
* 2、dir 查看当前目录下的文件
* 3、php -f crawler.php
* 4、导出到静态页面：php -f crawler.php > baidu.html
*/

$curl = curl_init("http://www.baidu.com");
curl_exec($curl);
curl_close($curl);
