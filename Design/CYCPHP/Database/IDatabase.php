<?php

namespace CYCPHP\Database;

interface IDatabase {
    function connect();
    function query($sql);
    function close();
} 