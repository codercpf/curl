<?php 

//实例描述：通过调用WebService查询北京的当前天气
//接口调用 http://www.webxml.com.cn/WebServices/WeatherWebService.asmx/getWeatherbyCityName
//http://ws.webxml.com.cn/WebServices/WeatherWS.asmx

$data = 'theCityName=洛阳';  //多参数时 用&链接

$curlobj = curl_init();
//以变量形式设置curl的访问地址
curl_setopt($curlobj, CURLOPT_URL, "http://www.webxml.com.cn/WebServices/WeatherWebService.asmx/getWeatherbyCityName");
//不显示header
curl_setopt($curlobj, CURLOPT_HEADER, 0);
//执行后不打印
curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, TRUE);

//加上这几句话设置User-Agent，否则会报错：未将对象引用设置到对象的实例,
//且要指明"User-Agent",用print()输出变量
curl_setopt($curlobj, CURLOPT_USERAGENT, "User-Agent:".print($_SERVER['HTTP_USER_AGENT']));

//以post方式传值
curl_setopt($curlobj, CURLOPT_POST, TRUE);
//post中要传递的数据
curl_setopt($curlobj, CURLOPT_POSTFIELDS, $data);
//设置header头部信息
curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("application/x-www-form-urlencoded;	charset=utf-8",
	"Content-Length:".strlen($data)
	));

$rtn = curl_exec($curlobj);				//执行

//判断执行结果
if (!curl_errno($curlobj)) {
	// $info = curl_getinfo($curlobj);
	// print_r($info);
	echo $rtn;
}else{
	echo 'Curl error: '.curl_error($curlobj);
}
curl_close($curlobj);