<?php 

//实例描述：爬虫抓取百度首页，并把“百度”两个字替换为“屌丝”，之后输出

$curlobj = curl_init();
//设置访问网页的url
curl_setopt($curlobj, CURLOPT_URL, "http://www.baidu.com");
//执行之后不直接打印出来
curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);

$output = curl_exec($curlobj); 	//执行
curl_close($curlobj);			//关闭curl

//将输出结果output中的百度二字，替换为屌丝
echo str_replace("百度", "屌丝", $output);


//总结：当需要对抓取的内容做处理时，保存到一个变量中，然后对这个变量进行处理