<html>
<head>
<title>View Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/global.css" >
</head>
<body style="background-color:" class="bg">
<?php 
include('dbcon.php');
$id=$_GET['id'];
$qry="SELECT * FROM family,details where `fam_id`=`f_id` and `access_no`='$id';";
$run=mysqli_query($con,$qry);
$data=mysqli_fetch_assoc($run);
?>
<div class="col-md-12" align="left"> 
            <a href="searchbyfam.php?fam=<?php echo $data['fam_name'];?>" class="btn btn-outline-info" role="button" style="margin-top:10px";>Back</a>
            </div>
            <div class="container">
            <h1 align="center"><u>Details</u></h1>
            <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <?php
            // php code for image retrieval
            $qry2="SELECT * from image where `access_id`='$id';";
            $run2=mysqli_query($con,$qry2);
            $col=mysqli_num_rows($run2);
            ?>
            <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                <th scope="row"><u>Accession Number:</th>
                <td><?php echo $data['access_no'];?></td>
                </tr>
                <tr>
                <th scope="row"><u>Botanical Name:</th>
                <td><?php echo $data['bot_name'];?></td>
                </tr>
                <tr>
                <th scope="row"><u>Family Name:</th>
                <td><?php echo $data['fam_name'];?></td>
                </tr>
                <tr>
                <th scope="row"><u>Locality:</th>
                <td><?php echo $data['locality'];?></td>
                </tr>
                <tr>
                <th scope="row"><u>Longitude:</th>
                <td><?php echo $data['long'];?></td>
                </tr>
                <tr>
                <th scope="row"><u>Latitude:</th>
                <td><?php echo $data['lati'];?></td>
                </tr>
                <tr>
                <th scope="row"><u>Brief Morphological Description:</th>
                <td><?php echo $data['description'];?></td>
                </tr>
                <tr>
                <th scope="row"><u>Local Name(if any):</th>
                <td><?php echo $data['local_name'];?></td>
                </tr>
                <tr>
                <th scope="row"><u>Uses (if any):</th>
                <td><?php echo $data['uses'];?></td>
                </tr>
                <tr>
                <th scope="row"><u>GenBank Records:</th>
                <td><?php echo $data['record'];?></td>
                </tr>
            </tbody>
            </table>
            <!-- table for photo display -->
            <div align="center"> PHOTOS</div>
                <div class="pep">
                <div class="people">
                <div class="wrapper1">
                <div class="grid">
<?php
$sql="SELECT * from image where `access_id`='$id';";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
	{
		echo '<div class="thumb"><a href="upload/'.$row["img_name"].'"><img src="upload/'.$row["img_name"].'" width="150" height="190"></a><br></div>';
	}
?>
</div>
</div>
</div>    
            </div>
            </div>
            <div class="col-md-1"></div>
            </div>
            </div>
</body>
</html>