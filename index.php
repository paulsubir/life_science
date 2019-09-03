<!DOCTYPE html>
<html>
<head>
<style>
  ul>a:hover {
    color: #212529;
    text-decoration: none;
    background-color: #28a745;
    font-weight:bold;
  }
</style>
<title>Home Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
        <!-- <link rel="stylesheet" href="css/global.css" > -->
        <script src="jquery-3.4.1.min.js"></script>
</head>
<body style="" class="">
<div class="col-md" align="right"> 

<a href="help.php" class="btn btn-outline-success" role="button" style="margin-top:20px;margin-right:25px";>Help</a>
<a href="adlogin.php" class="btn btn-outline-info" role="button" style="margin-top:20px;margin-right:25px";>Admin Login</a>
</div>
<div class="container" style="margin-top:50px";>
<div class="row">
<div class="col-md-2">
</div>
 <div class="col-md-8">
                <form class="form-inline" action="result.php" method="post">
                              <label for="" class="" ><b>Search As:</b></label>
                              <select class="form-control ml-3" value="" name="select" id="select" required onchange="myFun()">
                                <option value="">--Select Option--</option>
                                <option value="1">Botanial Name</option>
                                <option value="2">Family Name</option>
                                <option value="3">Accession Number</option>
                              </select>
                <!-- <label for="Botanical Name" class="col-md-3" style="font-weight: bold;margin-top: 4px;">Botanical Name:</label> -->
                
                <input style="" class="form-control ml-3" type="text" placeholder="" arial-label="Search" name="bname" id="bname" required disabled>
                <input type="submit" name="submit" value="Search" id="search" class="btn btn-primary form-control ml-3" disabled>
                </form>
                <div id="botname"  class="col-md-7 ml-auto mr-4">
                </div>
</div> 
<div class="col-md-2"></div> 
</div> 
</div>
</body>
</html>
<!-- code for script  -->
<script>
//onchange function


function myFun(){
 var a = $('#select').val();
 if(a != ''){
  $('#bname').attr("disabled",false);
 }
 else{
  $('#bname').attr("disabled",true);
 }
}


function getdata(name){
  var string = decodeURIComponent(name);
  $('#bname').val(string);
  $('#botname').fadeOut();
}

$(document).ready(function(){
  $('#bname').keyup(function(){
    var val=$('#select').val();
    //if botanical name is selected
    if(val==1){
    var query= $(this).val();
      if(query != ''){
        $.ajax({
            url:"ajaxbotname.php",
            method:"POST",
            data:{query:query},
            success:function(data){
              if(data != 2){
              $('#botname').fadeIn();
              $('#botname').html(data);
              $('#search').attr("disabled",false);
              }
              else{
              $('#botname').fadeIn();
              $('#botname').html("<ul class='list-unstyled'><li>No Records Found</li></ul>");
              $('#search').attr("disabled",true);
              }
            
            }
        });
      }
      else{
        $('#botname').fadeOut();
      }
    }
    //if family name is selected
    else if(val==2){
      var query= $(this).val();
      if(query != ''){
        $.ajax({
            url:"ajaxfamsearch.php",
            method:"POST",
            data:{query:query},
            success:function(data){
              if(data != 2){
              $('#botname').fadeIn();
              $('#botname').html(data);
              $('#search').attr("disabled",false);
              }
              else{
              $('#botname').fadeIn();
              $('#botname').html("<ul class='list-unstyled'><li>No Records Found</li></ul>");
              $('#search').attr("disabled",true);
              }
            
            }
        });
      }
      else{
        $('#botname').fadeOut();
      }
    }
    //if accession no. is selected
    else{
      var query= $(this).val();
      if(query != ''){
        $.ajax({
            url:"ajaxisnum.php",//this php pages returns is the no. numeric or not
            method:"POST",
            data:{query:query},
            success:function(data){
              if(data != 2){
              $('#search').attr("disabled",false);
              }
              else{
              $('#botname').fadeIn();
              $('#botname').html("<ul class='list-unstyled'><li style='color:red;'>*Only numbers are allowed</li></ul>");
              $('#search').attr("disabled",true);
              }
            
            }
        });
      }
      else{
        $('#botname').fadeOut();
      }
    }
  });
});
</script>