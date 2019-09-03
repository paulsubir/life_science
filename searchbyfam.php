<?php
include('dbcon.php');
    $fam=$_GET['fam'];
    $q="SELECT * FROM family,details where `fam_id`=`f_id` and `fam_name`='$fam'";
    $run=mysqli_query($con,$q);
        $row=mysqli_num_rows($run);
        if($row<1){
             ?>
             <script>
		     alert('No Records Found!');
		     window.open('index.php','_self');
		     </script>
            <?php
        }
        else{
    ?>
<html>
<head>
<title>Family Name</title>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
        <!-- <link rel="stylesheet" href="css/global.css" > -->
</head>
<body>
            <div class="col-md-12" align="left"> 
            <a href="index.php" class="btn btn-outline-info" role="button" style="margin-top:10px";>Back</a>
            </div>
            
            <br>
    <div class="container">
    <h1 align="center"><u>Details</u></h1>
    <br>
        <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Serial No.</th>
                <th scope="col">Accession Number</th>
                <th scope="col">Botanical Name</th>
                <th scope="col">Local name</th>
                <th scope="col">Family Name</th>
                <th scope="col">Details</th>
                </tr>
            </thead>
            <?php 
            $count=0;
            while($data=mysqli_fetch_assoc($run)){
                $count++;
            ?>
        <tbody>
            <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $data['access_no']; ?></td>
            <td><?php echo $data['bot_name']; ?></td>
            <td><?php echo $data['local_name']; ?></td>
            <td><?php echo $data['fam_name']; ?></td>
            <td><a href="viewdetails.php?id=<?php echo $data['access_no'];?>">View</a></td>
            </tr>
        </tbody>
        <?php 
            }
        ?>
        </table>
        </div>
        <div class="col-md-1"></div>
    </div>
    </div>
</body>
</html>
<?php
}
?>