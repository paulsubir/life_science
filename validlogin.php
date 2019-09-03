<?php
include('dbcon.php');
if(isset($_POST['login'])){
	$username=$_POST['username'];
	$password=$_POST['pass'];
	$qry="SELECT * FROM `admin` WHERE `username`='$username' and `password`='$password';";
	$run=mysqli_query($con,$qry);
	$user = mysqli_fetch_assoc($run);
	$id = $user['uid'];
	$row=mysqli_num_rows($run);
	if($row<1)
	{
		?>
		<script>
		alert('Username or password not matched!!');
		window.open('adlogin.php','_self');
		</script>
		<?php
	}
	else{
        session_start();
		$_SESSION['uid']=$id;
        if(isset($_SESSION['uid'])){
            header('location:admindash.php');
        }
	}
}

?>