<?php
include('dbcon.php');
if(isset($_POST['submit'])){
    $ano=$_POST['ano'];
    $bname=$_POST['bname'];
    $loc=$_POST['loc'];
    $long=$_POST['long'];
    $lat=$_POST['lat'];
    $desp=$_POST['desp'];
    $localname=$_POST['localname'];
    $uses=$_POST['uses'];
    $rec=$_POST['rec'];
    $fam=$_POST['family'];
    $filesize=0;
    
    for($i=0; $i<count($_FILES['file_img']['name']); $i++){
        $filetmp=$_FILES['file_img']['tmp_name'][$i];
        $filename=$_FILES['file_img']['name'][$i];
        $filetype=$_FILES['file_img']['type'][$i];
        $filesize=$_FILES['file_img']['size'][$i]+$filesize;
        $fileext=explode('.',$filename);
        $filecheck= strtolower(end($fileext));
        $filestore= array('png','jpg','jpeg');
        if(!in_array($filecheck,$filestore)){
            ?>
            <script> 
                alert("File extension is not valid!!");
                window.open('admindash.php',"_self");
            </script>
            <?php
            exit(0);
        }
        else{
            $random=1;
        }
  
    }
    if($filesize<10240 || $filesize >10485760){
        ?>
        <script>
        alert('Total Photo size should be between 10kb to 10MB');
        window.open('admindash.php','_self');
        </script>
        <?php
    }
    else{
        if($random==1){
         $q1="SELECT `fam_id` FROM family WHERE `fam_name`='$fam';";
         $r=mysqli_query($con,$q1);
         $d=mysqli_fetch_assoc($r);
         $f=$d['fam_id'];
         $sql1="INSERT INTO `details`(`access_no`, `bot_name`, `locality`, `long`, `lati`, `description`, `local_name`, `uses`, `record`,`f_id`) VALUES ('$ano','$bname','$loc','$long','$lat','$desp','$localname','$uses','$rec','$f');";
         $run1=mysqli_query($con,$sql1);
         if(($run1 && $r)==true){
            for($i=0; $i<count($_FILES['file_img']['name']); $i++){
                $filetmp=$_FILES['file_img']['tmp_name'][$i];
                $filename=$_FILES['file_img']['name'][$i];
                $filetype=$_FILES['file_img']['type'][$i];
                $filesize=$_FILES['file_img']['size'][$i];
                $filepath='upload/'.$filename;

                move_uploaded_file($filetmp,$filepath); 
        
                $sql2="INSERT INTO `image`(`img_name`, `img_path`, `img_type`, `access_id`) VALUES ('$filename','$filepath','$filetype','$ano');";
                $run2=mysqli_query($con,$sql2);
         }
         if($run2==true){
            ?>
             <script> 
                 alert("Data Uploaded Successfully!!");
                 window.open('admindash.php',"_self");
             </script>
             <?php
         }
        }
        }
    }  
}?>