<?php
define('DB_HOST','localhost');//主机名
define('DB_USER', 'root');//连接数据库的用户名
define('DB_PWD','111111');//连接数据库密码
define('DB_NAME', 'phpsql');//数据库名称
define('DB_PORT', '3306');//数据库端口号
define('DB_TYPE', 'mysql');//数据库的型号
define('DB_CHARSET', 'utf8');//数据库的编码方式
define('DB_DSN', DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET);//定义PDO的DSN
