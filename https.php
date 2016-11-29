<?php 

//实例描述：下载一个https的网络资源

$curlobj = curl_init();

//设置要访问的网页
curl_setopt($curlobj, CURLOPT_URL, "https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css");
curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, TRUE);	//执行之后不打印

//设置https支持，https证书有实效性
date_default_timezone_set('PRC');	//使用cookie，必须先设置时区

//https就是为了保证访问的正确性，故这里设置不验证
curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, 0);		//终止从服务器端进行验证

$output = curl_exec($curlobj);	//执行
curl_close($curlobj);

echo $output;