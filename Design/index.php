<?php
define("BASE_DIR",__DIR__);
require BASE_DIR."/CYCPHP/CYCPHP.php";

$rst=$db->query("select * from info_class");
var_dump($rst);