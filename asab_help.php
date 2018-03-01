
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>FAU - ASAB </title>
        <!-- Custom stylesheet -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="startbootstrap-full-width-pics-gh-pages/vendor/jquery/jquery.min.js"></script>
        <!-- TODO Script added to make the navbar collapse work -->
        <script src="startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Bootstrap core CSS -->
        <link href= "startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="startbootstrap-full-width-pics-gh-pages/css/full-width-pics.css" rel="stylesheet">
        <link href="css/stylesheet.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="pics/FAU-icon.ico" />
    </head>

 <body>
<?php 
        include("form_navbar_signed.php");?>

<header class="py-5 bg-image-full" style="background-image: url('pics/beach.jpg');">
            <img class="img-fluid d-block mx-auto" src="pics/Florida_Atlantic_University_monogram_logo.svg.png" alt="">
        </header>
        <!-- Content section -->
        <section class="py-5" id="create-form">
            <br><br><br>
            <div class="container" >
                <h1>User Guide</h1>
                <br><br><br>
                <p class="lead">To view the user guide please click the following button.</p><br><br>
                <div class="row" >
                    <button class="cfbutton btn btn-primary" onclick="window.location='4-DavidIzquierdo-Lab.pdf'" style="margin-right: 20px;">User Guide</button>
                </div>
            </div>
        </section>
        <section class="py-5">
            <br><br>
            <div class="container" id="read-form">
                <h1>FAQ</h1>
                <p class="lead">LIST of faqs </p><br><br>
         
            </div>
        </section>
        <script> document.getElementById("brand").innerHTML="ASAB";
        </script>  	 
	 
<?php
        include("footer.php");?>
 </body>
</html>