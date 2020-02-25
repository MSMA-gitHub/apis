<?php
include 'db.php';
session_start();
$user = htmlspecialchars($_POST['user'], ENT_QUOTES,"UTF-8");
$pass = htmlspecialchars($_POST['pass'], ENT_QUOTES,"UTF-8");
$sql= "select pass,name  from admin where email = ? ";
$stmt = $conn->prepare($sql);
$stmt->execute(array($user));
$res = $stmt->fetchAll();
$size = $stmt->rowCount();
if ($size < 1)
    echo "<script> alert('هذا الايميل غير مسجل');    window.location.href='../index.html';</script>";
else {
if($res[0][0]==$pass) {
    $_SESSION["orodyadmin"]=$res[0][1];
    header("location:../pages/");
}
else
    echo "<script> alert('عذرا اهذا الباسورد خاطئ');    window.location.href='../index.html';</script>";

}

?>
<script>