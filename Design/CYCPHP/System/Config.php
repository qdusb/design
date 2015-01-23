<?php
/**
 * Created by PhpStorm.
 * User: ZhW
 * Date: 2015/1/23
 * Time: 8:55
 */

namespace CYCPHP\System;


class Config {
    private static $data=array();
    public static function get($key)
    {
        if(isset(self::$data[$key])){
            return self::$data[$key];
        }else{
            return null;
        }
    }
    public static function set($key,$val){
        self::$data[$key]=$val;
    }
    public static  function add($config_data){
        self::$data=array_merge(self::$data,$config_data);
    }
    public static function getAll(){
        return self::$data;
    }
} 