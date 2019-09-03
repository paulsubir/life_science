<?php 
include('dbcon.php');
if(isset($_POST["query"])){
    $query="SELECT * FROM details WHERE bot_name LIKE '".$_POST["query"]."%'";
    $result=mysqli_query($con,$query);
   
    if(mysqli_num_rows($result)>0){
        $output='<ul class="list-unstyled">';
        while($row = mysqli_fetch_array($result)){
            $botname=$row["bot_name"];
            $output .='<a onclick="getdata(encodeURIComponent(\''.$botname.'\'))" href="#"><li>'.$botname.'</li></a>';
        }
        $output .='</ul>';
    }
    else{
        $output =2;
    }
    
    echo $output;
}
?>