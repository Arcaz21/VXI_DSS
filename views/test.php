<!DOCTYPE html>
<html>
<head>
    <?php include "../controllers/adminsFunction.php"; ?>
    <?php include('process.php'); ?>
    <title></title> <!-- BOOTSTRAP STYLES-->
        <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.css"  />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
        <!--CUSTOM BASIC STYLES-->
        <link href="assets/css/basic.css" rel="stylesheet" />
        <!--CUSTOM MAIN STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
</head>
<body>

<table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Username</th>
                                            <th style="text-align: center;">Password</th>
                                            <th style="text-align: center;">First Name</th>
                                            <th style="text-align: center;">Last Name</th>
                                            <th style="text-align: center;">Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($rows as $index => $value): ?>
                                        <tr>
                                            <td>
                                                <?php echo $value['username']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['password']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['fname']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['lname']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['role']; ?>
                                                <input type="hidden" value="<?php echo $value['id']; ?>">
                                            </td>
                                           
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>



<table>
                                    
                                    <tbody>
                                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($rows as $index => $value): ?>
                                        <tr>
                                                <input type="hidden" id="user" name="user" value="<?php echo $value['username']; ?>">
                                            
                                                <input type="hidden" id="pass" value="<?php echo $value['password']; ?>">
                                                 <input type="hidden" value="<?php echo $value['fname']; ?>">
                                            
                                                <input type="hidden" value="<?php echo $value['lname']; ?>">
                                            
                                                <input type="hidden" value="<?php echo $value['role']; ?>">
                                                <input type="hidden" value="<?php echo $value['id']; ?>">
                                            </td>
                                           
                                        </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <tr>
                                                                <th>Password</th>
                                                                <td>
                                                                    <input  class="form-control" name="password" id="password" type="password" onkeyup='check();' /><span id='message' ></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                
                                                                <td>
                                                                    
        </script>
                                                                </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>




<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
      
         <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
         </ul>
      
      </form>
      





 <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-6">
                       <div class="panel panel-default">
                        <div class="panel-heading">
                           File Uploads
                        </div>
                        <div class="panel-body">
                   
                    <div class="form-group">
                        <label class="control-label col-lg-4">No Input</label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span class="btn btn-file btn-default">
                                    <span class="fileupload-new">Select file</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input type="file">
                                </span>
                                <span class="fileupload-preview"></span>
                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Image Upload</label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                <div>
                                    <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file"></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Pre Defined Image</label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file"></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-warning"><strong>Notice!</strong> Image preview only works in IE10+, FF3.6+, Chrome6.0+ and Opera11.1+. In older browsers and Safari, the filename is shown instead.</div>
                    </div>
                           </div>
                         <div class="panel panel-default">
                        <div class="panel-heading">


      
   </body>
</html>

</body>
</html>


        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>
        <script src="tabs.js"></script>



<script type="text/javascript">
           var check = function() {
      if (document.getElementById('password').value ==
          document.getElementById('user').value) {
          document.getElementById('message').style.color = 'green';
          document.getElementById('message').innerHTML = '';
      } else {
            document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = document.getElementById('pass').value;
      }
  }
        </script>





