<?php
header('content-type:text/html;charset=utf-8');
require "../public/config.php";
try {
    $pdo = new PDO(DB_DSN,DB_USER,DB_PWD,
    [PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING]);
} catch (Exception $e) 
{
    echo $e->getMessage();
} catch(Throwable $e)
{
    echo $e->getMessage();
}