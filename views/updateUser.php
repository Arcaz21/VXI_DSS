<?php include "../controllers/updateUserFunction.php"; ?>
<?php

	$db = new userModel();
	$data = $db -> getUser($_REQUEST['id']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update User</title>
		<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOGOL FONTS -->
    <link href='../assets/fonts/gugulFonts.css' rel='stylesheet' type='text/css' />
</head>
<body>
<center>
<div class="panel panel-primary" style="width: 300px;" >
<div class="panel-heading"  style="background-color: #6b7a89;">
<div class="panel-body">
	<form>
		<div class="group"><input type="hidden" id="InputBox" name="id" value="<?php echo $_REQUEST['id']; ?>" required>
		<div class="group"></div>
			<label  class="">Username</label>
			<input class="form-control"  id="username" name="username" type="text" value="<?php echo $data->username ?>" required>
		</div>
		<div class="group">
			<label  class="">Password</label>
			<input class="form-control"  id="password" name="password" type="text" value="<?php echo $data->password ?>" required>
		</div>
		<div class="group">
			<label  class="">First Name</label>
			<input class="form-control"  id="fname" name="fname" type="text" value="<?php echo $data->fname ?>" required>
		</div>
		<div class="group">
			<label  class="">Last Name</label>
			<input class="form-control"  id="lname" name="lname" type="text" value="<?php echo $data->lname ?>" required>
		</div>
		<div class="group">
			<label  class="">Role</label><br>
			<select name="role" type="radio" class="btn btn-default" value="<?php echo $data->role ?>" >
      			<option value="admin">admin</option>
      			<option value="cashier">cashier</option>
  			  </select>
		</div class="group">	
		<div>
			<br>
			<input type="submit" class="btn btn-warning" name="submit" value="Update" style="font-size: 20px">
		</div>							
	</form>
	</div></div></div>
</body>
</html>