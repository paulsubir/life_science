<?php 
include('dbcon.php');
if(isset($_POST["query"])){
    $output='';
    $query="SELECT count(*) as total FROM `details` WHERE `access_no`='$_POST[query]'";
    $result=mysqli_query($con,$query);
    $count = mysqli_fetch_array($result);
    if($count['total'] > 0){
        $output=1;
    }
    else{
        $output =2;
    }
    echo $output;
}
?>