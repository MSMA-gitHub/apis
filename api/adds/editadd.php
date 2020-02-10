<?php 
echo'
<form id="user" action="../../pages/ads/editAdd.php" method="POST"> <input type="hidden" name="id" value="'.$_POST['add_branch'].'">
</form>';
        require '../db.php';
       // value sent to here by post method
       $store =$_POST['store']; 
        $branch =$_POST['branch']; 
        $product =$_POST['product'];  
        $start =$_POST['start'];
        $end =$_POST['end'];
        $add_id =$_POST['add'];
        $add_branch =$_POST['add_branch'];

        $file_get = $_FILES['image']['name'];
        $file="";
        if(!empty($file_get))
         {
        $temp = $_FILES['image']['tmp_name'];
        $file = "assets/adds/".$file_get; 
        move_uploaded_file($temp, "../".$file);
         }
         
         $sql="select countryid from store_branch where id=$branch";
         $stmt=$conn->prepare($sql);
         $stmt->execute();
        $result=$stmt->fetchAll()[0][0];
        $sql="update  `addvertisement` set product_id=? ,start_date=?, end_date=? ";
        if(!empty($file_get))
         $sql.=" , photo='$file'";
        $sql.="where id=?";
        echo $sql;
	$stmt=$conn->prepare($sql);
    $stmt->execute(array($product,$start,$end,$add_id));
    $sql="update `addvertisement_branch` set country =? ,store=?,branch=? where add_id=?";
    echo $sql;
    $stmt=$conn->prepare($sql);
$stmt->execute(array($result,$store,$branch,$add_branch));
echo'<script> document.getElementById("user").submit();</script>';

  
    ?>
