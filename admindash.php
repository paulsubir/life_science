<?php
session_start();
if(!isset($_SESSION['uid'])){
	header('location:adlogin.php');
}
include('dbcon.php');
?>
<html>
    <head>
        <title>Botanical Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
        <style>
        .div2{
            width: 730px;
            height: 100px;
            box-sizing: border-box;
        }
        p.ex{
            color: red;
        }
        </style>
    </head>
    <body>
    
        <hr>
        <div class="container">
            <div class="row">
              <div class="col-md-2">
              <a href="logout.php" class="btn btn-danger" role="button">Logout</a>
              </div>
              <div class="col-md-8">
                    <form method="post" action="testdata.php" enctype="multipart/form-data">
                            <div align="center" class="form-group">
                            <label for=""><h3><b><u>Add Information</u></b></h3></label>
                            </div>
                            <div class="form-group" id="">
                              <label for="">Accession Number:</label>
                              <input type="number" class="form-control" id="ac_no" name="ano" placeholder="Enter Access Number" required>
                              <div id="message"></div>
                             
                            </div>
                            <div class="form-group">
                              <label for="">Botanical Name:</label>
                              <input type="text" class="form-control" id="" name="bname" placeholder="Enter Botanical Name" required>
                            </div>
                            <div class="form-group">
                              <label for="">Family:</label>
                              <input type="text" class="form-control" id="fam" name="family" placeholder="Enter Family Name" required>
                            <div id="display">
                            </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="">Locality:</label>
                              <input type="text" class="form-control" id="" name="loc" placeholder="Enter Locality" required>
                            </div>
                            <div class="form-group">
                              <label for="">Longitude:</label>
                              <input type="text" class="form-control" id="" name="long" placeholder="Enter Longitude" required>
                            </div>
                            <div class="form-group">
                              <label for="">Latitude:</label>
                              <input type="text" class="form-control" id="" name="lat" placeholder="Enter Latitude" required>
                            </div>
                            <div class="form-group">
                              <label for="">Brief Morphological Description:</label>
                              <textarea class="div2" id="" name="desp" rows="10" cols="30" placeholder="Enter Description" required></textarea>
                            </div>
                            <div class="form-group">
                              <label for="">Local Name(if any):</label>
                              <input type="text" class="form-control" id="" name="localname" placeholder="Enter Local Name">
                            </div>
                            <div class="form-group">
                              <label for="">Uses(if any):</label>
                              <textarea class="div2" id="" name="uses" rows="10" cols="30" placeholder="Enter Uses"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="">GenBank Records:</label>
                              <input type="text" class="form-control" id="" name="rec" placeholder="Enter Record" required>
                            </div>
                            <div class="form-group">
                              <label for="file">Image:</label> 
                              <input type="file" class="form-control" value="" id="file" name="file_img[]" multiple="" required>
                              <p class="ex"> *Multiple Photos Can be selected. *Only .jpg,.jpeg and .png are allowed. 
                              <br>*Total photo size should be between 10KB to 10MB
                              </p>
                            </div>
                            <div class="form-group" align="center">
                            <input type="submit" class="btn btn-warning" role="button" name="submit" value="Upload" id="submit" disabled>
                            </div>
                            </form>
              </div>
              <div class="col-md-2">
              </div>
          </div>
        </div>
    </body>
</html>
<script src="jquery-3.4.1.min.js"></script>
<script>
function getdata(name){
  var string=decodeURIComponent(name);
  $('#fam').val(string);
  $('#display').fadeOut();
}
$(document).ready(function(){
  //ajax code to number validate but its input type is="number", this ajax is used for double check for security 
  $('#ac_no').keyup(function(){
    var query= $(this).val();
      if(query != ''){
        $.ajax({
            url:"ajaxisnum.php",//this php pages returns is the no. numeric or not
            method:"POST",
            data:{query:query},
            success:function(data1){
              if(data1 == 2){
                $('#message').fadeIn();
                $('#message').html("<ul class='list-unstyled'><li style='color:red;'>*Only numbers are allowed</li></ul>");
                $('#ac_no').val('');
              }
            
            }
        });
      }
      // else{
      //   $('#message').fadeOut();
      // }
  });
  //to check an accession no is already exist or not
  $('#ac_no').blur(function(){
    var query= $(this).val();
    if(query != ''){
      $.ajax({
          url:"ajaxsearchacno.php",
          method:"POST",
          data:{query:query},
          success:function(data){
            if(data == 1){
              $("#message").html('<span style="color:red"; >*This accession no. is already exists</span>');
              $('#ac_no').val('');
            }
            else{
              $("#message").html('<span style="color:green";>This accession no. is available for use</span>');
            }
           
          }
      });
    }
    // else{
    //     $('#message').fadeOut();
    // }
  });
  //to select the family name
  $('#fam').keyup(function(){
    var query=$(this).val();
    if(query != ''){
      $.ajax({
        url:"ajaxfamsearch.php",
        method:"POST",
        data:{query:query},
        success:function(data){
          if(data != 2){
              $('#display').fadeIn();
              $('#display').html(data);
               $('#submit').attr("disabled",false);
              }
              else{
              $('#display').fadeIn();
              $('#display').html("<ul class='list-unstyled'><li>No Records Found</li></ul>");
               $('#submit').attr("disabled",true);
              }
        }
      });
    }
    else{
      $('#display').fadeOut();
    }
  });
});
</script>
