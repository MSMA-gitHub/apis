<?php
echo '<form id="user" action="../../pages/product/Product.php" method="POST"> <input type="hidden" name="id" value="' . $_POST['id'] . '">
</form>';
require '../db.php';
$file_get = $_FILES['image']['name'];
if (empty($file_get))
    $u = 0;
else {
    $u = 1;
    $temp = $_FILES['image']['tmp_name'];
    $file = "assets/product/" . $file_get;
    move_uploaded_file($temp, "../" . $file);
}
$sql = "update `product` set details=?,price=?,name=?,brand=? ";
if ($u == 1)
    $sql .= ",`image`='$file' ";
$sql .= "where id= ?";
$stmt = $conn->prepare($sql);
$stmt->execute(array( $_POST['details'], $_POST['price'], $_POST['name'], $_POST['brand'],$_POST['id']));
$s = $_POST['store1'];
if (isset($s) && !empty($s)) {
    $sql = "delete from  `product_branch` where product =?";

    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['id']));
    $branch = $_POST['branch'];
    for ($i = 0; $i < count($branch); $i++) {
        $sql = "insert into `product_branch` values(?,?,?,(select countryid from store_branch where id =$branch[$i]))";
        echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute(array( $_POST['id'], $branch[$i],$s));

    }
}
if ($stmt->rowCount() > 0)
    echo '<script> document.getElementById("user").submit();</script>';
else
    echo '<script> alert("no updated data");
      document.getElementById("user").submit();
      </script>';

?>