<?php
require '../db.php';

$stmt=$conn->prepare("select *  from city where  countrycode ='".$_POST['city']."';");
$stmt->execute();
$city=$stmt->fetchAll();
$size=$stmt->rowcount();
$msg="";
for($i=0;$i<$size;$i++)
{
$message[$i]=array("value"=>$city[$i][0],"text"=>$city[$i][1]);
}
$message=json_encode($message);
 echo $message;

/*if($size>0)
{
   $result=$stmt->fetchAll();
   $msg .= '<div class="dropdown bootstrap-select show-tick form-control"><select multiple="" data-live-search="true" id="selectpicker" name="branch[]" class="form-control selectpicker" tabindex="-98">';
}
   for($i=0;$i<$size;$i++)
   {
        $msg .= '<option value="'.$city[$i][0].'">'.$city[$i][1].'</option>';
   }
   if($size>0)
    $msg .= '</select><button type="button" class="btn dropdown-toggle btn-light bs-placeholder" data-toggle="dropdown" role="button" data-id="selectpicker" title="اختر الفروع" ><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">اختر الفروع</div></div> </div></button><div class="dropdown-menu" role="combobox" ><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1" style="max-height: 900px; overflow-y: auto; min-height: 0px;"><ul class="dropdown-menu inner show">';
    for($i=0;$i<$size;$i++)
    {
         $msg .= '<li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class=" bs-ok-default check-mark"></span><span class="text">'.$city[$i][1].'</span></a></li>';
    }
    
    if($size>0)
    $msg .= '</ul></div></div></div>';
    echo $msg;**/

?>