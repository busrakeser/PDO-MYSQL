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
    <title>Düzenleme</title>
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


<?php
$bilgisor=$db->prepare("SELECT * from bilgilerim where bilgilerim_id=:id");
$bilgisor->execute(array(
   'id'=>$_GET['bilgilerim_id']
));
$bilgicek=$bilgisor->fetch(PDO::FETCH_ASSOC);
?>
<form action="islem.php" method="post">
    Ad <input type="text" required name="bilgilerim_ad" value="<?php echo $bilgicek['bilgilerim_ad']?> ">
    Soyad <input type="text" required name="bilgilerim_soyad" value="<?php echo $bilgicek['bilgilerim_soyad']?> ">
    Mail <input type="email" required name="bilgilerim_mail" value="<?php echo $bilgicek['bilgilerim_mail']?> ">
    Yaş <input type="text" required name="bilgilerim_yas" value="<?php echo $bilgicek['bilgilerim_yas']?> ">

    <input type="hidden" value="<?php echo $bilgicek['bilgilerim_id']?>" name="bilgilerim_id">
    <button type="submit" name="update">Formu Gönder</button>
</form>

</body>
</html>