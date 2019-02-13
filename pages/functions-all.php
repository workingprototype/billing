<?php
if($request[1]=="breg")
{
    include_once "./classes/business-class.php";
    $business = new BusinessClass;
     /**
      *push to the table the values in an array
     */
    if($business->push($_POST))
    {
        echo 1; //success
    }else
    {
        echo 0;
    }
}
elseif($request[1]=="purchase")
{
    echo $_POST['data'];
}
?>
