<?php 
if(isset($_POST["query"])){
    if(is_numeric($_POST["query"])){
        $output=1;
    }
    else{
       $output=2;
    }
    
    echo $output;
}
?>