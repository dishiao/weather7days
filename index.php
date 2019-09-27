<?php
/**
 * Created by PhpStorm.
 * User: TFF-PC-PHP
 * Date: 2019/9/27
 * Time: 10:38
 */
namespace weather7days\index;
require_once "./constant.php";
use weather7days\constant;
class index{
    public function request($cityId=101270101){
        //准备请求参数
        $appId = constant\APPID;
        $appSecret = constant\APPSECRET;
        $version = constant\VERSION;
        $curlPost = "version=".$version."&appid=".$appId."&appsecret=".$appSecret."&cityid=".$cityId;
        //初始化请求链接
        $req=curl_init();
        //设置请求链接
        curl_setopt($req, CURLOPT_URL,'https://www.tianqiapi.com/api/?'.$curlPost);
        //设置超时时长(秒)
//        curl_setopt($req, CURLOPT_TIMEOUT,10);
//        设置链接时长
//        curl_setopt($req, CURLOPT_CONNECTTIMEOUT,3);
        //设置头信息
        $headers=array('Content-Type: application/json; charset=utf-8',
            'Cache-Control: no-cache',
            'Pragma: no-cache');
        curl_setopt($req, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($req, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($req);
        curl_close($req);
        return json_decode($data);
    }
}