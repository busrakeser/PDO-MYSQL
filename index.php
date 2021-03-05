<?php
require_once 'baglan.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO&MYSQL</title>
</head>
<body>
<h1>Veritabanı PDO Kayıt İşlemleri</h1>
<hr>
<?php
if ($_GET['durum']=="ok"){
    echo "İşlem başarılı";
}
elseif ($_GET['durum']=="no"){
    echo "İşlem Başarısız";
}
?>
<form action="islem.php" method="post">
    Ad <input type="text" required name="bilgilerim_ad" placeholder="Adınızı Giriniz..">
    Soyad <input type="text" required name="bilgilerim_soyad" placeholder="Soyadınızı Giriniz..">
    Mail <input type="email" required name="bilgilerim_mail" placeholder="Mail Giriniz..">
    Yaş <input type="text" required name="bilgilerim_yas" placeholder="Yaşınızı Giriniz..">
    <button type="submit" name="insert">Formu Gönder</button>
</form>
<br>
<h4>Kayıtların Listelenmesi</h4>
<hr>
<?php
//$bilgilerisor=$db->prepare("SELECT * from  bilgilerim");
//$bilgilerisor->execute();
////
//$bilgicek=$bilgilerisor->fetch(PDO::FETCH_ASSOC);//döngü kullanılmazsa ilk kaydı getirir
//
//echo "<pre>";
//print_r($bilgicek);
//echo "</pre>";
//echo "<br>";
//
//echo $bilgicek['bilgilerim_ad'];

echo "<hr>";

////tablodaki tüm verileri çekme işlemi
//while($bilgicek=$bilgilerisor->fetch(PDO::FETCH_ASSOC)){
//    echo $bilgicek['bilgilerim_ad'];
//    echo "<br>";
//}

?>

//verileri tabloda listeleme
<table border="1" width="60%">
    <tr>
        <th>ID</th>
        <th>Ad</th>
        <th>Soyad</th>
        <th>Mail</th>
        <th>Yaş</th>
        <th width="50">İşlemler</th>
        <th width="50">İşlemler</th>
    </tr>

    <?php
    $bilgisor=$db->prepare("SELECT * from bilgilerim");
    $bilgisor->execute();
    while ($bilgicek=$bilgisor->fetch(PDO::FETCH_ASSOC)){?>

    <tr>
        <td><?php echo $bilgicek['bilgilerim_id']?></td>
        <td><?php echo $bilgicek['bilgilerim_ad']?></td>
        <td><?php echo $bilgicek['bilgilerim_soyad']?></td>
        <td><?php echo $bilgicek['bilgilerim_mail']?></td>
        <td><?php echo $bilgicek['bilgilerim_yas']?></td>
        <td align="center"><a href="duzenle.php?bilgilerim_id=<?php echo $bilgicek['bilgilerim_id']?>"><button>Düzenle</button></a></td>
        <td align="center"><a href="sil.php?bilgilerim_id=<?php echo $bilgicek['bilgilerim_id']?>&bilgilerisil=ok"><button>Sil</button></a></td>
<!--        <td align="center"><a href=""><button>Sil</button></a></td>-->
    </tr>

    <?php }?>
</table>

</body>
</html>