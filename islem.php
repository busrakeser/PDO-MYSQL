<?php
require_once 'baglan.php';

if (isset($_POST['insert']))
{

    $kaydet = $db->prepare("INSERT into bilgilerim set 
        bilgilerim_ad=:bilgilerim_ad,
        bilgilerim_soyad=:bilgilerim_soyad,
        bilgilerim_mail=:bilgilerim_mail,
        bilgilerim_yas=:bilgilerim_yas
    ");

    $insert = $kaydet->execute(array(
        'bilgilerim_ad' => $_POST['bilgilerim_ad'],
        'bilgilerim_soyad' => $_POST['bilgilerim_soyad'],
        'bilgilerim_mail' => $_POST['bilgilerim_mail'],
        'bilgilerim_yas' => $_POST['bilgilerim_yas']
    ));
if ($insert){
   // echo "Kayıt Başarılı";
    header("Location:index.php?durum=ok");//yönlendirme fonsiyonu
    exit();
}
else{
   // echo "Kayıt Başarısız";
    header("Location:index.php?durum=no");
    exit();
}

}
if (isset($_POST['update']))
{

    $bilgilerim_id=$_POST['bilgilerim_id'];
    $kaydet = $db->prepare("UPDATE bilgilerim set 
        bilgilerim_ad=:bilgilerim_ad,
        bilgilerim_soyad=:bilgilerim_soyad,
        bilgilerim_mail=:bilgilerim_mail,
        bilgilerim_yas=:bilgilerim_yas
        where bilgilerim_id={$_POST['bilgilerim_id']}
    ");

    $insert = $kaydet->execute(array(
        'bilgilerim_ad' => $_POST['bilgilerim_ad'],
        'bilgilerim_soyad' => $_POST['bilgilerim_soyad'],
        'bilgilerim_mail' => $_POST['bilgilerim_mail'],
        'bilgilerim_yas' => $_POST['bilgilerim_yas']
    ));
    if ($insert){
        // echo "Kayıt Başarılı";
        header("Location:duzenle.php?durum=ok&bilgilerim_id=bilgilerim_id");//yönlendirme fonsiyonu
        exit();
    }
    else{
        // echo "Kayıt Başarısız";
        header("Location:duzenle.php?durum=no&bilgilerim_id=bilgilerim_id");
        exit();
    }

}

if ($_GET['bilgilerisil']=="ok"){

$sil=$db->prepare("DELETE from bilgilerim where bilgilerim_id=:id");
$kontrol=$sil->execute(array(
    'id'=>$_GET['bilgilerim_id']
));

    if ($kontrol){
        // echo "Kayıt Başarılı";
        header("Location:index.php?durum=ok");//yönlendirme fonsiyonu
        exit();
    }
    else{
        // echo "Kayıt Başarısız";
        header("Location:index.php?durum=no");
        exit();
    }



}

?>