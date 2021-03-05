<?php

try
{
    $db=new PDO("mysql:host=localhost;dbname=first_php;charset=utf8",'root','');
//    echo "Veritabanı bağlantısı başarılı";
}
catch (PDOException $e){
    echo $e->getMessage();
}
?>
