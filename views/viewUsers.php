<?php include "../controllers/viewUsersFunction.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Test - Select</title>
     <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>POS - ADMIN</title>
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
     <?php $name = (isset($name)) ?>
<center>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th style="text-align: center;">Username</th>
                <th style="text-align: center;">First Name</th>
                <th style="text-align: center;">Last Name</th>
                <th style="text-align: center;">Password</th>
                <th style="text-align: center;">Role</th>
                <th colspan="2" style="text-align: center;">Action</th>
            </tr>
        </thead>

        <tbody>
        
            <?php error_reporting(E_ERROR | E_PARSE); foreach ($rows as $index => $value): ?>
            <tr>
                <td><?php echo $value['username']; ?></td>
                <td><?php echo $value['fname']; ?></td>
                <td><?php echo $value['lname']; ?></td>
                <td><?php echo $value['password']; ?></td>
                <td><?php echo $value['role']; ?></td>
                <td style="text-align: center;"><a href="viewUsers.php?select=yes&delete=yes&id=<?php echo $value['id']; ?>" class="btn btn-danger">Delete</a></td>
                <td style="text-align: center;"><a href="updateUser.php?&update=yes&id=<?php echo $value['id'] ?>" target="iframe" class="btn btn-success">Update</a></td>
            </tr>
            <?php endforeach; ?>
        
        </tbody>
    </table>
</center>

    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
</body>
</html>