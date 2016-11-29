<?php 

//实例描述：从FTP服务器下载一个文件到本地

$curlobj = curl_init();

curl_setopt($curlobj, CURLOPT_URL, "ftp://120.27.195.102:/demo.html");
curl_setopt($curlobj, CURLOPT_HEADER, 0);
curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, 1);
//下载文件时间较长，设置有效时间
curl_setopt($curlobj, CURLOPT_TIMEOUT, 300);		//300s到期

//FTP用户名：密码
curl_setopt($curlobj, CURLOPT_USERPWD, "cpf:c2016");

$outfile = fopen('demo.txt','wb');				//保存到本地的文件名
curl_setopt($curlobj, CURLOPT_FILE, $outfile);		//保存到本地

$rtn = curl_exec($curlobj);		//执行
fclose($outfile);									//关闭本地文件

if (!curl_errno($curlobj)) {
	// $info = curl_getinfo($curlobj);
	// print_r($info);
	echo "return: ".$rtn;
}else{
	echo 'Curl error: '. curl_error($curlobj);
}

curl_close($curlobj);