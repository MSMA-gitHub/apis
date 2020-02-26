<?php

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
if(isset($_POST['type0']))
    $u=$_POST['type0'];
else
    $u=1;
$sql = "insert into `code` (title,details,type,code,end_date,photo,type2) values(?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute(array($_POST['title'], $_POST['details'], $_POST['type'], $_POST['code'], $_POST['date'],$file,$u));
$id=$conn->lastInsertId();
$s = $_POST['store1'];
if (isset($s) && !empty($s)) {
    $branch = $_POST['branch'];
    for ($i = 0; $i < count($branch); $i++) {
        $sql = "insert into `store_code` values(?,?,?,(select countryid from store_branch where id =$branch[$i]))";

        $stmt = $conn->prepare($sql);
        $stmt->execute(array($s,$id, $branch[$i]));

    }
}
if ($stmt->rowCount() > 0)
    echo '<script> window.location.href="../../pages/";</script>';
else
    echo '<script> alert("no updated data");
     window.location.href="../../pages/";
      </script>';

?>