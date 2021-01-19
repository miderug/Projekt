<?php


$code =$_GET['code'];
if($code ==""){
    header('Location: http://localhost:81/projektPBSK/index.php');
    exit;
    
}

$client_id ='4f7b6b3be024989287c8';
$client_secret = '80078d54ba965e373cbeecd843a004cf9575f8e4';
$url= 'https://github.com/login/oauth/access_token';

$postParams =[
    'client_id'=>$client_id,
    'client_secret'=>$client_secret,
    'code'=>$code
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
$response = curl_exec($ch);
curl_close($ch);
//echo var_dump($response);
$data = json_decode($response);

if($data->access_token !=""){
    session_start();
    $_SESSION['my_accessToken']=$data->access_token;
    header('Location: http://localhost:81/projektPBSK/uzytkownik.php');
    exit;
}



?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

