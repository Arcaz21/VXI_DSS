<?php 

session_start();
if( !isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("location: index.php");
    
}
?>
<?php include "../controllers/membersFunction.php";
 ?>
        
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
                <center><i class="fa fa-user fa-fw"></i>Edit User Information<i class="fa fa-user fa-fw"></i></center>
                </div>
            <div class="panel-body">
        <center>
    </body>
    <?php error_reporting(E_ERROR | E_PARSE); foreach ($getMember as $index => $value): ?>
    <form action="<?php $_PHP_SELF ?>" method="POST">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Member INFO</h4>
        </div>
        <div class="panel-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID Number</th>
                    <td>
                        <input  class="form-control" type="hidden" name="idNumStatic" required="" value="<?php echo $value['mID'] ?>" />
                        <input  class="form-control" type="text" name="idNum" required="" value="<?php echo $value['mID'] ?>" />
                    </td>
                </tr>
                <tr>
                    <th>First Name</th>
                    <td>
                        <input  class="form-control" type="text" name="fName" required="" value="<?php echo $value['fName'] ?>" />
                    </td>
                </tr>
               <tr>
                    <th>Middle Name</th>
                    <td>
                        <input  class="form-control" type="text" name="mName" required="" value="<?php echo $value['mName'] ?>" />
                    </td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>
                        <input  class="form-control" type="text" name="lName" required="" value="<?php echo $value['lName'] ?>" />
                    </td>
                </tr>
                <tr>
                    <th>Suffix</th>
                    <td>
                        <input  class="form-control" type="text" name="suffix" value="<?php echo $value['suffix'] ?>"/>
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        <input  class="form-control" type="textfield" name="address" required="" value="<?php echo $value['address'] ?>" />
                    </td>
                </tr>
                <tr>
                    <th>Contact Number</th>
                    <td>
                        <input  class="form-control" type="number" name="cNum" required="" value="<?php echo $value['cNum'] ?>" />
                    </td>
                </tr>
                <tr>
                    <th>Birthday</th>
                    <td>
                        <input  class="form-control" type="date" name="bday" required="" value="<?php echo $value['bday'] ?>" />
                    </td>
                </tr>
                <tr>
                    <th>Sex</th>
                    <td><?php if($value['sex'] == 'male'): ?>
                        <input type="radio" name="sex" value="male" checked="checked"> Male<br>
                        <input type="radio" name="sex" value="female"> Female<br>
                        <?php endif; ?>
                        <?php if($value['sex'] == 'female'): ?>
                        <input type="radio" name="sex" value="male"> Male<br>
                        <input type="radio" name="sex" value="female" checked="checked"> Female<br>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td>
                        <select name="size" id="size">
                            <option selected="selected" value="<?php echo $value['size'] ?>"> SAME SIZE
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
                        <input type="text" name="diocese" list="dname" required="" value="<?php echo $value['d_name']?>">
                        <datalist id="dname">
                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($showDiocese as $index => $valueD): ?>
                          <option value="<?php echo $valueD['d_name'] ?>">
                        <?php endforeach ?>
                        </datalist>
                    </td>
                   
                </tr>
                <tr>
                    <th>Parish</th>
                    <td>
                        <input type="text" name="parish" list="pname" required="" value="<?php echo $value['par_name']?>">
                        <datalist id="pname">
                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($showParish as $index => $valueP): ?>
                          <option value="<?php echo $valueP['par_name'] ?>">
                        <?php endforeach ?>
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <th>GKK</th>
                    <td>
                        <input type="text" name="gkk" list="gname" required="" value="<?php echo $value['g_name']?>">
                        <datalist id="gname">
                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($showGKK as $index => $valueG): ?>
                          <option value="<?php echo $valueG['g_name'] ?>">
                        <?php endforeach ?>
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <th>Lay batch #</th>
                    <td>
                        <input  class="form-control" type="number" name="laybatch" required="" value="<?php echo $value['lay_num'] ?>" />
                    </td>
                </tr>
                <tr>
                    <th>Trainer batch #</th>
                    <td>
                        <input  class="form-control" type="number" name="trainbatch" required="" value="<?php echo $value['train_num'] ?>" />
                    </td>
                </tr>           
            </thead>
        </table>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Guardian INFO</h4>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <td>
                                <input  class="form-control" type="text" name="guardName" required value="<?php echo $value['gName']?>" />
                            </td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>
                                <input  class="form-control" type="number" name="gcNum" required="" value="<?php echo $value['gCnum'] ?>" />
                            </td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>
                                <input  class="form-control" type="text" name="gaddress" required="" value="<?php echo $value['gAdd'] ?>" />
                            </td>
                        </tr>
                        <tr>
                            <th>Relationship</th>
                            <td>
                                <input  class="form-control" type="text" name="rel" required="" value="<?php echo $value['rel'] ?>" />
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
        <tr><input class="btn btn-info" value="EDIT" type="submit" name="edit"></tr>
    </form>
    <?php endforeach; ?>
</html>



        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>
        <script src="tabs.js"></script>
          