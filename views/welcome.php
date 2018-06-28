<!DOCTYPE html>
<html>
<head>
    <title>WELCOME to POD</title>
            <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!--WIZARD STYLES-->
    <link href="assets/css/wizard/normalize.css" rel="stylesheet" />
    <link href="assets/css/wizard/wizardMain.css" rel="stylesheet" />
    <link href="assets/css/wizard/jquery.steps.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<style>
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {opacity: 0.7;}

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content, #caption {    
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
    }

    @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
    }
</style>

<body>

        <div>
        <center>
            <img style="max-width: 150px; " src="assets/img/pod.png">
            <div class="alert alert-info">
                <p>WELCOME TO P.O.D. PROFILING SYSTEM.</p> <h3>PLEASE FOLLOW INSTRUCTIONS ACCORDINGLY.</h3>
            </div>
        </center>
        </div>
    
                   <div class="row">
                  <div class="col-md-12">                     
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            INSTALLATION...
                        </div>
                        <div class="panel-body">
                             <div id="wizard">
                <h2>First Step</h2>
                <section>
                    <p>1. First let us install a local web server. In this system we will use XAMPP. </p>
                    <p>If you have not downloaded the software yet download below.</p>
                    <img src="assets/img/xampp.png">
                    <a href="https://www.apachefriends.org/xampp-files/7.2.0/xampp-win32-7.2.0-0-VC15-installer.exe">DOWNLOAD HERE</a>
                    <p>2. After downloading, install and follow instruction on the installation wizard.</p>

                </section>

                <h2>Second Step</h2>
                <section>
                <table>
                        <tr>
                            <td>
                                <h2> 1. COPY PASTE CONFIG FILE</h2>
                                <img onclick="document.getElementById('myModal').style.display='none'" class="myImg" src="assets/img/photo1.png"  style="width: 80%;">
                                <div id="myModal" class="modal"> <span class="close">&times;</span>
                                <img style="max-width: 60%;" class="modal-content" id="img01">
                                <div id="caption"></div>
                                </div>
                                <script src="assets/js/modal.js"></script>
                            </td>
                            <td><h2>2. OPEN XAMPP</h2>
                                <img onclick="document.getElementById('myModal').style.display='none'" class="myImg" src="assets/img/photo3.png"  style="width: 80%;">
                                <div id="myModal" class="modal"> <span class="close">&times;</span>
                                <img style="max-width: 60%;" class="modal-content" id="img01">
                                <div id="caption"></div>
                                </div>
                                <script src="assets/js/modal.js"></script>
                            </td>
                            <td><h2>3. START XAMPP</h2>
                                <img alt="START Apache & MYSQL" onclick="document.getElementById('myModal').style.display='none'" class="myImg" src="assets/img/photo2.png"  style="width: 80%;">
                                <div id="myModal" class="modal"> <span class="close">&times;</span>
                                <img style="max-width: 60%;" class="modal-content" id="img01">
                                <div id="caption"></div>
                                </div>
                                <script src="assets/js/modal.js"></script>
                            </td>
                        </tr>
                    </table>
                </section>

                <h2>Third Step</h2>
                <section>
                    <table>
                        <tr>
                            <td>
                            <tr>
                                <img onclick="document.getElementById('myModal').style.display='none'" class="myImg" src="assets/img/photo5.png"  style="width: 30%;">
                                <div alt="type: localhost/phpmyadmin on your browser's address bar." id="myModal" class="modal"> <span class="close">&times;</span>
                                <img style="max-width: 60%;" class="modal-content" id="img01">
                                <div id="caption"></div>
                                </div>
                                <script src="assets/js/modal.js"></script>
                            </tr>
                            <tr>
                                <img onclick="document.getElementById('myModal').style.display='none'" class="myImg" src="assets/img/photo6.png"  style="width: 30%;">
                                <div alt="type: localhost/phpmyadmin on your browser's address bar." id="myModal" class="modal"> <span class="close">&times;</span>
                                <img style="max-width: 60%;" class="modal-content" id="img01">
                                <div id="caption"></div>
                                </div>
                                <script src="assets/js/modal.js"></script>
                            </tr>
                            <td>
                                <img onclick="document.getElementById('myModal').style.display='none'" class="myImg" src="assets/img/photo7.png"  style="width: 30%;">
                                <div alt="type: localhost/phpmyadmin on your browser's address bar." id="myModal" class="modal"> <span class="close">&times;</span>
                                <img style="max-width: 60%;" class="modal-content" id="img01">
                                <div id="caption"></div>
                                </div>
                                <script src="assets/js/modal.js"></script>
                            </td>
                            <td>
                                <img alt="Create Database: 'pod'. onclick="document.getElementById('myModal').style.display='none'" class="myImg" src="assets/img/photo2.png"  style="width: 50%;">
                                <div id="myModal" class="modal"> <span class="close">&times;</span>
                                <img style="max-width: 60%;" class="modal-content" id="img01">
                                <div id="caption"></div>
                                </div>
                                <script src="assets/js/modal.js"></script>
                            </td>
                            <td>
                                <img onclick="document.getElementById('myModal').style.display='none'" class="myImg" src="assets/img/photo4.png"  style="width: 50%;">
                                <div id="myModal" class="modal"> <span class="close">&times;</span>
                                <img style="max-width: 60%;" class="modal-content" id="img01">
                                <div id="caption"></div>
                                </div>
                                <script src="assets/js/modal.js"></script>
                            </td>
                        </tr>
                    </table>
                </section>

                <h2>Forth Step</h2>
                <section>
                    <p>Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris vehicula vulputate. Aliquam sed sem tortor. 
                        Quisque sed felis ut mauris feugiat iaculis nec ac lectus. Sed consequat vestibulum purus, imperdiet varius est pellentesque vitae. 
                        Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo tortor.</p>
                </section>
            </div>       
                        </div>
                    </div>
                 </div>

                </div>

    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- WIZARD SCRIPTS -->
    <script src="assets/js/wizard/modernizr-2.6.2.min.js"></script>
    <script src="assets/js/wizard/jquery.cookie-1.3.1.js"></script>
    <script src="assets/js/wizard/jquery.steps.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>   
</body>
</html>