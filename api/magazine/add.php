<?php

require '../db.php';
     $file_get = $_FILES['image']['name'];
$temp = $_FILES['image']['tmp_name'];
$file = "assets/magazine/" . $file_get;
move_uploaded_file($temp, "../" . $file);


$sql = "insert into `magazine` (title,end_date,cover) values(?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute(array($_POST['title'], $_POST['date'],$file));
$id=$conn->lastInsertId();
for ($i = 0; $i < count($_FILES['images']['tmp_name']); $i++) {
    $file_get = $_FILES['images']['name'][$i];
    $temp = $_FILES['images']['tmp_name'][$i];
    $file = "assets/magazine/" . $file_get;
    move_uploaded_file($temp, "../" . $file);
    $sql = "insert into `magazine_photo` (id,photo) values(?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($id, $file));
}
$s = $_POST['store1'];
if (isset($s) && !empty($s)) {
    $branch = $_POST['branch'];
    for ($i = 0; $i < count($branch); $i++) {
        $sql = "insert into `magazine_branch` values(?,?,?,(select countryid from store_branch where id =$branch[$i]),(select branch from store_branch where id =$branch[$i]))";

        $stmt = $conn->prepare($sql);
        $stmt->execute(array($id, $branch[$i],$s));

    }
}
if ($stmt->rowCount() > 0)
    echo '<script> window.location.href="../../pages/";</script>';
else
    echo '<script> alert("no updated data");
     window.location.href="../../pages/";
      </script>';

?>
