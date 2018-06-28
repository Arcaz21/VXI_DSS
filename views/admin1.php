<?php 

session_start();
if( !isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("location: index.php");
}
?>
<?php include "../controllers/adminsFunction.php"; ?>

<!DOCTYPE html>
<html
    xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>ADMIN</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
        <!--CUSTOM BASIC STYLES-->
        <link href="assets/css/basic.css" rel="stylesheet" />
        <!--CUSTOM MAIN STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    <body>
        <?php  $db = new userModel();
            $data = $db->getUse($_SESSION['username'],$_SESSION['password']); ?>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="admin1.php">
                        <img style="margin-top: -20px;" height="60" src="assets/img/POD.png" />
                    </a>
                </div>
                  <div class="col-md-3">
                        <div class="main-box mb-red">
                            <a href="#">
                              <?php date_default_timezone_set('Asia/Manila');?>
                              <!--  TIME SCRIPT -->
                              <script type="text/javascript" src="assets/js/date_time.js"></script>
                              <span id="date_time"></span>
                              <script type="text/javascript">window.onload = date_time('date_time');</script> 
                            </a>
                        </div>
                    </div>
                <div class="header-right">
                    <p style="font-size: 27px;">
                        <?php echo $data->fname ." ". $data->lname."  "?>
                        <a href="index.php" class="btn btn-danger" title="Logout">
                            <i class="fa fa-sign-out "></i>
                        </a>
                    </p>
                </div>
            </nav>
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                            <center>
                                <h2 style="color: white">ADMIN</h2>
                            </center>
                        </li>
                        <!-- <li>
                            <a  >
                                <i class="fa fa-users" id=""></i>Users
                            </a>
                        </li> -->
<!--                         <li>
                            <a style="cursor: pointer;" class="tablinks" href="admin1.php">
                                <i class="fa fa-child"></i>Members  
                        
                            </a>
                        </li>
                        
                        <li>
                            <a style="cursor: pointer;" class="tablinks" href="admin2.php" >
                                <i class="fa fa-users"></i>Users
                            </a>
                        
                        <li>
                                    <a style="cursor: pointer;" class="tablinks" href="adduser.php" data-toggle="modal" data-target="#theModal ">
                                        <i class="fa fa-user-plus "></i>Add New User
                                    </a>
                        </li> -->

                        <li>
                            <a style="cursor: pointer;" class="tablinks" href="import.php">
                                <i class="fa fa-child"></i>Import Data  
                        
                            </a>
                        </li>

                        </li>
                    </ul>
                </div>
            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                           





  <!-- Modal -->
  <div class="modal fade" id="theModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->  


<!-- FAILED NOTIFICATION -->
  <?php if(isset($_SESSION['failed'])): ?>
  <div class="alert alert-danger alert-dismissable">
    <?php echo $_SESSION['failed']." "; ?> 
    <button onclick="" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php unset($_SESSION['failed']) ?>
    <a href="addUser.php" data-toggle="modal" data-target="#theModal" class="alert-link">Add New User</a>.
  </div>
  <?php endif; ?>
<!-- END -->

<!-- SUCCESS NOTIFICATION -->
  <?php if(isset($_SESSION['success'])): ?>
  <div class="alert alert-success alert-dismissable">
    <?php echo $_SESSION['success']." "; ?> 
    <button onclick="" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php unset($_SESSION['success']) ?>
    <a href="addUser.php" data-toggle="modal" data-target="#theModal" class="alert-link">Add New User</a>.
  </div>
  <?php endif; ?>
<!-- END -->

<!-- DELETED NOTIFICATION -->
  <?php if(isset($_SESSION['delete'])): ?>
  <div class="alert alert-success alert-dismissable">
    <?php echo $_SESSION['delete']." "; ?> 
    <button onclick="" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php unset($_SESSION['delete']) ?>
    <a href="addUser.php" data-toggle="modal" data-target="#theModal" class="alert-link">Add New User</a>.
  </div>
  <?php endif; ?>
<!-- END -->

<!-- UPDATED NOTIFICATION -->
  <?php if(isset($_SESSION['update'])): ?>
  <div class="alert alert-success alert-dismissable">
    <?php echo $_SESSION['update']." "; ?> 
    <button onclick="" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php unset($_SESSION['update']) ?>
    <!-- <a href="addMember.php" data-toggle="modal" data-target="#theModal" class="alert-link">Add New Member</a>. -->
  </div>
  <?php endif; ?>
<!-- END -->



<div id="Students" class="tabcontent">
<center><h1 class="page-head-line">Members List</h1></center>
        <h1 class="page-subhead-line"> </h1>
              <table class="table table-striped table-bordered table-hover">
      <thead>
          <tr class="success">
              <th style="text-align: center;">ID NUMBER</th>
              <th style="text-align: center;">Name</th>
              <th style="text-align: center;">Lay Batch #</th>
              <th style="text-align: center;">Trainer #</th>

              <th style="text-align: center;" colspan="4" >Action</th>
          </tr>
      </thead>
      <tbody>
          <?php error_reporting(E_ERROR | E_PARSE); foreach ($showMembers as $index => $value): ?>
          <tr>  
              <input type="hidden" value="<?php echo $value['mID']; ?>">
              <td>
                  <?php echo $value['mID']; $mID = $value['mID'];?>
              </td>
              <td>
                 <?php echo $value['fName']." ".$value['mName']." ".$value['lName']." ".$value['suffix']; ?>
              </td>
              <td>
                  <?php echo $value['lay_num']; ?>
              </td>
              <td>
                  <?php echo $value['train_num']; ?>
              </td>
              <td>
                  <center>
                      <a type="button" class="btn btn-info "  href="viewstudinfo.php?value=<?php echo $mID ?>" data-toggle="modal" data-target="#theModal"> <i class="fa fa-list-ul" aria-hidden="true"></i> More</a>
                      </center>
              </td>
          </tr>
           <?php endforeach; ?>
      </tbody>
  </table>              
        <h1 class="page-subhead-line">
</div>










                            

</div><!-- end sa col12 -->
                    <!-- /. ROW  -->
                  

</body>
                        
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        <div id="footer-sec">
       <center>&copy; Arcaz 2017</center>
    </div>
        <!-- /. FOOTER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>
        <script src="tabs.js"></script>
 
    </body>
</html>
<script type="text/javascript">
           var check = function() {
      if (document.getElementById('password').value ==
          document.getElementById('confirm_password').value) {
          document.getElementById('message').style.color = 'green';
          document.getElementById('message').innerHTML = '';
      } else {
            document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = 'passwords do not match';
      }
  }
        </script>
        <script type="text/javascript">
           var check2 = function() {
      if (document.getElementById('contactn').value == document.getElementById('contact').value.length) {
          document.getElementById('message2').style.color = 'green';
          document.getElementById('message2').innerHTML = 'Contact ready with '+document.getElementById('contact').value.length+' digits';
      }else if(document.getElementById('contactn').value < document.getElementById('contact').value.length){
        document.getElementById('message2').style.color = 'red';
          document.getElementById('message2').innerHTML = 'Oops your digit count is '+document.getElementById('contact').value.length;
      } 
       else {
            document.getElementById('message2').style.color = 'blue';
          document.getElementById('message2').innerHTML = 'Your number has '+document.getElementById('contact').value.length+' digits';
      }
  }
        </script>
         <script type="text/javascript">
           var check1 = function() {
      if (document.getElementById('lrn1').value == document.getElementById('LRN').value.length) {
          document.getElementById('message1').style.color = 'green';
          document.getElementById('message1').innerHTML = 'LRN ready with: '+document.getElementById('LRN').value.length+' digits';
      }  else if(document.getElementById('lrn1').value < document.getElementById('LRN').value.length){
        document.getElementById('message1').style.color = 'red';
          document.getElementById('message1').innerHTML = 'Oops your digit count is '+document.getElementById('LRN').value.length;
      } 
      else {
            document.getElementById('message1').style.color = 'blue';
          document.getElementById('message1').innerHTML = 'Your LRN digit count: '+document.getElementById('LRN').value.length;
      }
  }
        </script>