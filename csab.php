<?php 

 include("session_check_form.php");
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>FAU - CSAB and UAC </title>


        <!-- Custom stylesheet -->
        <!-- Bootstrap core JavaScript -->
        <script src="startbootstrap-full-width-pics-gh-pages/vendor/jquery/jquery.min.js"></script>
        <script src="startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/js/bootstrap.min.js"></script>
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
        include("navbar_signed.php");?>

        <!-- Header - set the background image for the header in the line below -->
        <header class="py-5 bg-image-full" style="background-image: url('pics/beach.jpg');">
            <img class="img-fluid d-block mx-auto" src="pics/Florida_Atlantic_University_monogram_logo.svg.png" alt="">
        </header>

        <!-- Content section -->
        <section class="py-5" id="create-form">
            <br><br><br>
            <div class="container" >
                <h1>Create Form</h1>
                <br><br><br>
                <p class="lead">Instructions on how to create a form if necessary. Refernece documents. Get help information </p><br><br>
                <div class="row" >
                    <button class="cfbutton btn btn-primary" onclick="window.location='all_forms.php'">Create Form</button>
                </div>
            </div>
        </section>  


        <section class="py-5">
            <br><br>
            <div class="container" id="read-form">
                <h1>Forms List</h1>
                <p class="lead">Instructions on how to create a form if necessary. <br><br>Refernece documents.<br><br><br><br> Get help information </p><br><br>

                <button class="flbutton btn btn-info" onclick="window.location='php/form_list.php'">Forms List</button>
            </div>
        </section>



        <script> document.getElementById("brand").innerHTML="CSAB and UAC";
        </script>


        <?php
        include("footer.php");?>


    </body>

</html>
