<?php 
        require 'db.php';
       // value sent to here by post method
        $id =$_GET['user_id'];   
        $product =$_GET['product'];
        try{
        $sql="insert into favorite_p  values (?,?);";
	$stmt=$conn->prepare($sql);
	$stmt->execute(array($id,$product));
        }
        catch (PDOExeption $e )
        {
            if(strpos($e->getmessage(), "for key 'PRIMARY' ") !== false )
            {
                $sql="delete from favorite_p  where id=?;";
	$stmt=$conn->prepare($sql);
	$stmt->execute(array($id));
            }
           }
        
    ?>