<?php
/**
 * Created by PhpStorm.
 * User: TFF-PC-PHP
 * Date: 2019/9/27
 * Time: 10:44
 */
/*
 * 调用
 * */
namespace weather7days\start;
require_once "./index.php";
require_once "./constant.php";
use weather7days\index\index;
use weather7days\constant\constant;

$obj = new index();
echo '<pre>';
// 当前地点当前天气
echo '<iframe scrolling="no" src="https://tianqiapi.com/api.php?style=tw&skin=pitaya" frameborder="0" width="300" height="500" allowtransparency="true"></iframe>';
echo '<br/>';
foreach (constant::getcCityId() as $date => $city){
    echo "日期: ".$date;
    echo '<br/>';
    foreach ($city as $cityName => $cityId){
        $ret = ($obj->request($cityId));
        echo "天气更新时间: ".$ret->update_time;
        echo '<br/>';
        echo "城市名称: ".$ret->city.'-'.$ret->cityEn;
        echo '<br/>';
        foreach ($ret->data as $value){
            if (strtotime($value->date) == strtotime($date)){
                $flag = 0;
                echo "天气: ".$value->wea;
                echo '<br/>';
                echo "平均温度: ".$value->tem;
                echo '<br/>';
                echo "最高温度: ".$value->tem1;
                echo '<br/>';
                echo "最低温度: ".$value->tem2;
                echo '<br/>';
                break;
            }else{
                $flag = 1;
                continue;
            }
        }
        if ($flag == 1){
            // 说明没有能查到指定出行日期的天气
            echo "===========时间已过===========";
            echo '<br/>';
        }
        unset($flag);
        unset($ret);
    }
    echo "==============================".$date. "的一天结束==============================";
    echo '<br/>';
}
echo '</pre>';
