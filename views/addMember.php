<?php 

session_start();
if( !isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("location: index.php");
    
}
?>
<?php include "../controllers/membersFunction.php";
 ?>
<!DOCTYPE html>
<html
    xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title></title>
        <!-- BOOTSTRAP STYLES-->
        <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.css"  />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
        <!--CUSTOM BASIC STYLES-->
        <link href="assets/css/basic.css" rel="stylesheet" />
        <!--CUSTOM MAIN STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link rel="stylesheet" href="assets/css/w3.css">
            <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        </head>
        <body>
            <center>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <center>
                            <i class="fa fa-child fa-fw"></i>Add New Member
                            
                            <i class="fa fa-child fa-fw"></i>
                        </center>
                    </div>
                    <div class="panel-body">
                        <center>
                            <div class="col-md-4"></div>
                            <!--   Basic Table  -->
                            <form  action="<?php $_PHP_SELF ?>" method="POST">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Member</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                            <tr>
                                                                <th>ID Number</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="idNum" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>First Name</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="fName" required="" />
                                                                </td>
                                                            </tr>
                                                           <tr>
                                                                <th>Middle Name</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="mName" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Last Name</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="lName" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Suffix</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="suffix"/>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Address</th>
                                                                <td>
                                                                    <input  class="form-control" type="textfield" name="address" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Contact Number</th>
                                                                <td>
                                                                    <input  class="form-control" type="number" name="cNum" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Birthday</th>
                                                                <td>
                                                                    <input  class="form-control" type="date" name="bday" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Sex</th>
                                                                <td>
                                                                    <input type="radio" name="sex" value="male"> Male<br>
                                                                    <input type="radio" name="sex" value="female"> Female<br>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Size</th>
                                                                <td><!-- 
                                                                    <input type="text" name="gkk" list="size"> -->
                                                                    <select name="size" id="size">
                                                                      <option value="16"> 16
                                                                      <option value="18"> 18
                                                                      <option value="20"> 20
                                                                      <option value="XS"> XS
                                                                      <option value="S"> S
                                                                      <option value="M"> M
                                                                      <option value="L"> L
                                                                      <option value="XL"> XL
                                                                      <option value="XXL"> XXL
                                                                      <option value="XXXL"> XXXL
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Diocese</th>
                                                                
                                                                <td>
                                                                    <input type="text" name="diocese" list="dname">
                                                                    <datalist id="dname">
                                                                    <?php error_reporting(E_ERROR | E_PARSE); foreach ($showDiocese as $index => $value): ?>
                                                                      <option value="<?php echo $value['d_name'] ?>">
                                                                    <?php endforeach ?>
                                                                    </datalist>
                                                                </td>
                                                               
                                                            </tr>
                                                            <tr>
                                                                <th>Parish</th>
                                                                <td>
                                                                    <input type="text" name="parish" list="pname">
                                                                    <datalist id="pname">
                                                                    <?php error_reporting(E_ERROR | E_PARSE); foreach ($showParish as $index => $value): ?>
                                                                      <option value="<?php echo $value['par_name'] ?>">
                                                                    <?php endforeach ?>
                                                                    </datalist>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>GKK</th>
                                                                <td>
                                                                    <input type="text" name="gkk" list="gname">
                                                                    <datalist id="gname">
                                                                    <?php error_reporting(E_ERROR | E_PARSE); foreach ($showGKK as $index => $value): ?>
                                                                      <option value="<?php echo $value['g_name'] ?>">
                                                                    <?php endforeach ?>
                                                                    </datalist>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Lay batch #</th>
                                                                <td>
                                                                    <input  class="form-control" type="number" name="laybatch" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Trainer batch #</th>
                                                                <td>
                                                                    <input  class="form-control" type="number" name="trainbatch" required="" />
                                                                </td>
                                                            </tr>             
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                        <!-- End  Basic Table  -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Guardian</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="guardName" required />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Contact Number</th>
                                                                <td>
                                                                    <input  class="form-control" type="number" name="gcNum" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Address</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="gaddress" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Relationship</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="rel" required="" />
                                                                </td>
                                                            </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                           
                                            <!-- End  Basic Table  -->
                            <input class="btn btn-info" value="SUBMIT NEW MEMBER" type="submit" name="add">
                            </form>
                            <br>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        </center>
                    </div>
                </div>
                                    <!-- /.modal-content -->
            </center>
                                <!-- Button trigger modal -->
                                <!--   <a data-toggle="modal" href="#my-modal" class="btn btn-primary btn-lg">Launch demo modal</a>
 -->
                                <!-- Modal -->
                                <!--   <div class="modal fade" id="my-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title">Hello World!</h4></div><div class="modal-body">
          Demo Modal
        </div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>  -->
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
            $('#my-modal').on('hidden.bs.modal', function () {
               /* location.reload();*/
  window.alert('hidden event fired!');
});
        