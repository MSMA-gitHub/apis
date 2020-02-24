<?php

require '../db.php';
$file_get = $_FILES['image']['name'];
$temp = $_FILES['image']['tmp_name'];
$file = "assets/offers/" . $file_get;
move_uploaded_file($temp, "../" . $file);
$sql = "insert into `product` (details,name,price,brand,image) values(?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute(array($_POST['details'], $_POST['product'], $_POST['price'], $_POST['brand'], $file));
$id = $conn->lastInsertId();
$sql = "insert into `product_cat`  values(?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute(array($id, $_POST['sub'], $_POST['cat']));

$s = $_POST['store1'];
if (isset($s) && !empty($s)) {
    $branch = $_POST['branch'];
    for ($i = 0; $i < count($branch); $i++) {
        $sql = "insert into `product_branch` values(?,?,?,(select countryid from store_branch where id =$branch[$i]))";

        $stmt = $conn->prepare($sql);
        $stmt->execute(array($id, $branch[$i], $s));

    }
}
if ($stmt->rowCount() > 0)
    echo '<script> window.location.href="../../pages/product/products.php";</script>';
else
    echo '<script> alert("no updated data");
     window.location.href="../../pages/product/products.php";
      </script>';

?>