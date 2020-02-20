<?php
echo '<form id="user" action="../../pages/coupons/coupon.php" method="POST"> <input type="hidden" name="id" value="' . $_POST['id'] . '">
</form>';
require '../db.php';
$file_get = $_FILES['image']['name'];
if (empty($file_get))
    $u = 0;
else {
    $u = 1;
    $temp = $_FILES['image']['tmp_name'];
    $file = "assets/offers/" . $file_get;
    move_uploaded_file($temp, "../" . $file);
}
$sql = "update `code` set title=?,details=?,type=?,code=?,end_date=?";
if ($u == 1)
    $sql .= ",`photo`='$file' ";
$sql .= "where id= ?";

$stmt = $conn->prepare($sql);
$stmt->execute(array($_POST['title'], $_POST['details'], $_POST['type'], $_POST['code'], $_POST['date'], $_POST['id']));
$s = $_POST['store1'];
if (isset($s) && !empty($s)) {
    $sql = "delete from  `store_code` where code =?";

    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['id']));
    $branch = $_POST['branch'];
    for ($i = 0; $i < count($branch); $i++) {
        $sql = "insert into `store_code` values(?,?,?,(select countryid from store_branch where id =$branch[$i]))";
        echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($s, $_POST['id'], $branch[$i]));

    }
}
if ($stmt->rowCount() > 0)
    echo '<script> document.getElementById("user").submit();</script>';
else
    echo '<script> alert("no updated data");
      document.getElementById("user").submit();
      </script>';

?>