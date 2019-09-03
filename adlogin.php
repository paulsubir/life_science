<!DOCTYPE html>
<html>
<head> 
    <title> Admin Login</title>
    	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
		<!-- <link rel="stylesheet" href="css/global.css" > -->
        <script src="jquery-3.4.1.min.js"></script>
</head>
<body style="" class="bg">
<div class="col-md-12" align="left"> 
<a href="index.php" class="btn btn-outline-info" role="button" style="margin-top:10px";>Back</a>
</div>
    <center><h2 class="text"> Admin Login <h2>
    </center>
	<hr>
    <div class="container">
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                    <form method="post" action="validlogin.php" class="form-container">
                            <div class="form-group">
                              <label for="">User Name</label>
                              <input type="text" class="form-control" id="" name="username" placeholder="Enter Your User Id" required>
                            </div>
							<div class="form-group">
                              <label for="">Password</label>
                              <input type="password" class="form-control" id="" name="pass" placeholder="Enter Your Password" required>
                            </div>
							<div class="form-group" align="center">
                            <input type="submit" value="Login" class="btn btn-success" name="login">
							</div>

    				</form>
				</div>
				<div class="col-md-3"></div>
</div>
</div>
</body>
</html>
