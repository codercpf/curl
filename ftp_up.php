<?php 

//实例描述：把本地文件上传到FTP服务器

$curlobj = curl_init();
$localfile = 'webservice.php';
$fp = fopen($localfile, 'r');

//设置上传到服务器上的目标文件
curl_setopt($curlobj, CURLOPT_URL, "ftp://120.27.195.102:/ftp_upload.php");

curl_setopt($curlobj, CURLOPT_HEADER, 0);
curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlobj, CURLOPT_TIMEOUT, 300);		//上传300s后，到期
//FTP用户名，密码
curl_setopt($curlobj, CURLOPT_USERPWD, "cpf:c2016");

//设置模式为upload
curl_setopt($curlobj, CURLOPT_UPLOAD, 1);
//要上传的内容
curl_setopt($curlobj, CURLOPT_INFILE, $fp);
//要上传文件的大小
curl_setopt($curlobj, CURLOPT_INFILESIZE, filesize($localfile));

$rtn = curl_exec($curlobj);				//执行

fclose($fp);

if (!curl_errno($curlobj)) {
	echo "Uploaded successfully!";
}else{
	echo 'Curl error: '.curl_error($curlobj);
}

curl_close($curlobj);
