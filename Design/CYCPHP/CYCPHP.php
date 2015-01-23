<?php
require BASE_DIR."/CYCPHP/AutoLoad.php";
spl_autoload_register("\\CYCPHP\AutoLoad::auto_load_class");
require BASE_DIR."/CYCPHP/Config.php";
$db=\CYCPHP\Database\MySQLDB::getInstance();
?>