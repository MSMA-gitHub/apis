 <?php
require 'db.php';

$sql="select *  from users;";
$stmt=$conn->prepare($sql);
$stmt->execute();
$size=$stmt->rowCount();
if($size>0)
   $result=$stmt->fetchAll();
   for($i=0;$i<$size;$i++)
   {
    $stmt=$conn->prepare("select country  from country where  id ='".$result[$i]["country"]."';");
    $stmt->execute();
    $country=$stmt->fetchAll();
    $stmt=$conn->prepare("select city  from city where  id ='".$result[$i]["city"]."';");
    $stmt->execute();
    $city=$stmt->fetchAll();
    ?>
<tr>
                                                    <td>
                                                        <img src="../../api/<?php echo $result[$i]["picture"]; ?>" class="mr-2" alt="image"><?php echo$result[$i]["name"]; ?></td>
                                                    <td><?php echo $result[$i]["phone"]; ?> </td>
                                                    <td> <?php echo$result[$i]["email"]; ?> </td>
                                                    <td> <?php echo@$country[0][0]; ?> </td>
                                                    <td> <?php echo@$city[0][0]; ?> </td>
                                                    <td>
                                                       <form id="user" action="profile.php" method="POST"> <input type="hidden" name="id" value="<?php echo$result[$i]['id']; ?>">
                                                       <a onclick="document.getElementById('user').submit();"><label class="badge badge-gradient-info">الصفحة الشخصية</label></a></form>
                                                    </td>
                                                </tr>';
                                                <?php
   }


?>