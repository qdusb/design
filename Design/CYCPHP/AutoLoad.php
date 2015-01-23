<?php
/**
 * Created by PhpStorm.
 * User: ZhW
 * Date: 2015/1/21
 * Time: 16:28
 */

namespace CYCPHP;


class AutoLoad {
    public static function auto_load_class($class){
        echo str_replace("\\","/",$class)."<br>";
        require BASE_DIR."/".str_replace("\\","/",$class).".php";
    }
} 