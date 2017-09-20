<?php 
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

require_once "../lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';

header("Content-Type: application/json");
//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

//①、获取用户openid
$tools = new JsApiPay();
$openId =$_GET['openid'];
if(empty($openId))
{
   
   $result['message']= "openid is empty";
   $result['status']= "500";
   $result=json_encode($result);
   echo $result;
}
//$openId = "oqO4a0cuoyBeXkQ9q204rALiD3pc";


$total_fee =  $_GET['total_fee'];
if(empty($total_fee))
{
	$total_fee='1';
}

//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody(WxPayConfig::BODY);
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
$input->SetTotal_fee($total_fee);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);
$jsApiParameters = $tools->GetJsApiParameters($order);
$jsApiParameters['status']='201';
$jsApiParameters['message']='pay post success';
$jsApiParameters=json_encode($jsApiParameters);



echo $jsApiParameters;


