<?php include "../controllers/xamppFunction.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/new.css">
<body>
<?php if(!isset($_SESSION['tab'])): ?>
<button class="tablink" onclick="openPage('one', this, '#696969')" id="defaultOpen">1. Install XAMPP</button>
<button class="tablink" onclick="openPage('two', this, '#0E3753')" >2. Copy Project Files</button>
<button class="tablink" onclick="openPage('three', this, '#0E9540')">3. Copy Configuration Files</button>
<button class="tablink" onclick="openPage('four', this, '#D78847')">4. Start XAMPP and Access System</button>
<?php endif; ?>
<?php if(isset($_SESSION['tab']) && $_SESSION['tab'] == 'two'): ?>
<button class="tablink" onclick="openPage('one', this, '#696969')" >1. Install XAMPP</button>
<button class="tablink" onclick="openPage('two', this, '#0E3753')" id="defaultOpen">2. Copy Project Files</button>
<button class="tablink" onclick="openPage('three', this, '#0E9540')">3. Copy Configuration Files</button>
<button class="tablink" onclick="openPage('four', this, '#D78847')">4. Start XAMPP and Access System</button>
<?php endif; ?>
<?php if(isset($_SESSION['tab']) && $_SESSION['tab'] == 'three'): ?>
<button class="tablink" onclick="openPage('one', this, '#696969')">1. Install XAMPP</button>
<button class="tablink" onclick="openPage('two', this, '#0E3753')">2. Copy Project Files</button>
<button class="tablink" onclick="openPage('three', this, '#0E9540')" id="defaultOpen">3. Copy Configuration Files</button>
<button class="tablink" onclick="openPage('four', this, '#D78847')">4. Start XAMPP and Access System</button>
<?php endif; ?>
<?php if(isset($_SESSION['tab']) && $_SESSION['tab'] == 'four'): ?>
<button class="tablink" onclick="openPage('one', this, '#696969')" >1. Install XAMPP</button>
<button class="tablink" onclick="openPage('two', this, '#0E3753')" >2. Copy Project Files</button>
<button class="tablink" onclick="openPage('three', this, '#0E9540')">3. Copy Configuration Files</button>
<button class="tablink" onclick="openPage('four', this, '#D78847')" id="defaultOpen">4. Start XAMPP and Access System</button>
<?php endif; ?>


<div id="one" class="tabcontent" style="fon">
  <h3>1. Install XAMPP</h3>
  <?php if($checkX){ ?>
  <p>You have installed XAMPP in your computer, please proceed to the <a onclick="openPage('two')">next step.</a> </p>
  <?php }else{ ?>
  <p>Xampp is the heart of your local server. This will host both your Database and System locally.</p>
  <a href="new.php?download=1"><button type="button" class="btn btn-success">CLICK HERE TO DOWNLOAD XAMPP</button></a>
  <a href="new.php?install=1"><button type="button" class="btn btn-info">CLICK HERE TO INSTALL IF FILE EXIST ON FOLDER</button></a>
  <?php } ?>

  <?php if(isset($_SESSION['install'])){ ?>
  <div class="alert alert-danger alert-dismissable">
    <?php echo $_SESSION['install']." "; ?>
  </div>
  <?php }else{ ?><?php } ?>
</div>

<div id="two" class="tabcontent">
  <h3>2. Copy Project Files</h3>
  <p>Some news this fine day!</p> 
  <a href="new.php?copy=1"><button type="button" class="btn btn-success">CLICK HERE TO COPY PROJECT FILES</button></a>
</div>

<div id="three" class="tabcontent">
  <h3>3. Copy Configuration Files</h3>
  <p>Get in touch, or swing by for a cup of coffee.</p>
</div>

<div id="four" class="tabcontent">
  <h3>4. Start XAMPP and Access System</h3>
  <p>Who we are and what we do.</p>
</div>

<script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     
</body>
</html> 
