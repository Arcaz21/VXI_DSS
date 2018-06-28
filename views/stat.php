<?php 

session_start();
if( !isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("location: index.php");
}
?>
<?php include "../controllers/importFunction.php"; ?>

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
        <!-- FAVICON-->
        <link rel="icon" href="assets/img/favicon.png">
    </head>
    <body>
        <?php  $db = new userModel();
            $data = $db->getUse($_SESSION['username']); ?>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="import.php">
                        <img style="margin-top:-10px;" height="60" src="assets/img/pod_2.png" />
                    </a>
                </div>
                    <div class="col-md-3">
                        <div class="main-box mb-red">
                            <a href="#">
                              <?php date_default_timezone_set('Asia/Manila');?>
                              <!--  TIME SCRIPT -->
                              <script type="text/javascript" src="assets/js/date_time.js" ></script>
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
                                <h2 style="color: white; margin-top:18%; font-weight:bold; font-size:250%;">ADMIN</h2>
                            </center>
                        </li>
                        <li>
                            <a style="cursor: pointer; margin-top:20%; margin-left:15%;" class="tablinks" href="import.php">
                                <i class="fa fa-save"></i>Import Data  
                        
                            </a>
                        </li>

                        <li>
                            <a style="cursor: pointer; margin-top:3%; margin-left:15%;" class="tablinks" href="stat.php">
                                <i class="fa fa-line-chart"></i>Statistics  
                        
                            </a>
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
  </div>
  <?php endif; ?>
<!-- END -->

<!-- SUCCESS NOTIFICATION -->
  <?php if(isset($_SESSION['success'])): ?>
  <div class="alert alert-success alert-dismissable">
    <?php echo $_SESSION['success']." "; ?> 
    <button onclick="" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php unset($_SESSION['success']) ?>
    <a href="addUser.php" data-toggle="modal" data-target="#theModal" class="alert-link">Add New Member</a>.
  </div>
  <?php endif; ?>
<!-- END -->

<!-- DELETED NOTIFICATION -->
  <?php if(isset($_SESSION['delete'])): ?>
  <div class="alert alert-success alert-dismissable">
    <?php echo $_SESSION['delete']." "; ?> 
    <button onclick="" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php unset($_SESSION['delete']) ?>
    <a href="addUser.php" data-toggle="modal" data-target="#theModal" class="alert-link">Add New Member?</a>
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


                            <div id="Userslist" class="tabcontent">
                                <center><h1 class="page-head-line">IMPORT DATA</h1></center>
                                <h3 style="font-size: 20px">Upload .xlxs or .xls files that will be processed in the system. This system will analyize and visuallize the data gathered.</h3>
                            <h1 class="page-subhead-line"> </h1>

                            </div>
</div><!-- end sa col12 -->
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