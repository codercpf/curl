<?php 

//实例描述：登录慕课网并下载个人空间页面

$data = 'username=makingdifference@163.com&password=chang2015';

$curlobj = curl_init();
curl_setopt($curlobj, CURLOPT_URL, "http://www.imooc.com/user/login");	//设置要访问的url

curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, TRUE);	//执行之后不打印


//Cookie相关设置，在所有会话开始之前设置
date_default_timezone_set('PRC');				//使用cookies前，必须先设置时区

curl_setopt($curlobj, CURLOPT_COOKIESESSION, TRUE);
curl_setopt($curlobj, CURLOPT_COOKIEFILE, "cookiefile");
curl_setopt($curlobj, CURLOPT_COOKIEJAR, "cookiefile");
curl_setopt($curlobj, CURLOPT_COOKIE, session_name() .'='. session_id());

//设置头部信息
curl_setopt($curlobj, CURLOPT_HEADER, 0);
//这一步让curl支持页面跳转
curl_setopt($curlobj, CURLOPT_FOLLOWLOCATION, 1);

curl_setopt($curlobj, CURLOPT_POST, 1);			//设置post传输
curl_setopt($curlobj, CURLOPT_POSTFIELDS, $data);	//要传递的数据
curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("application/x-www-form-urlencoded;charset=utf-8",
	"Content-Length: ".strlen($data)
	));
curl_exec($curlobj);		//执行

//以上是登录网站

//以下是下载用户中心首页

curl_setopt($curlobj, CURLOPT_URL, "http://www.imooc.com/space/index");

curl_setopt($curlobj, CURLOPT_POST, 0);			//关闭post传输方式
curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("Content-type: text/xml"));

$output = curl_exec($curlobj);			//执行，因有输出，故执行结果保存到变量
curl_close($curlobj);

echo $output;
