<?php
namespace weather7days\constant;
/**
 * Created by PhpStorm.
 * User: TFF-PC-PHP
 * Date: 2019/9/27
 * Time: 10:44
 */
/*
 * 常量配置
 * */
const APPID = 26436189;
const APPSECRET = "oY9XGzDh";
const VERSION = "v1";
class constant{
    public static function config(){
        $param = array(
            "appid" => 26436189,
            "appsecret" => "oY9XGzDh",
        );
        return $param;
    }

    public static function getcCityId(){
        return array(
            "2019-10-1" => array(
                "成都" => 101270101,
                "郫县" => 101270107,
                "都江堰" => 101270111,
                "汶川" => 101271902,
                "小金" => 101271908,
            ),
            "2019-10-2" => array(
                "汶川" => 101271902,
                "小金" => 101271908,
            ),
            "2019-10-3" => array(
                "宝兴" => 101271708,
                "芦山" => 101271707,
                "雅安" => 101271701,
                "雨城" => 101271709,
            ),
        );
    }
}
