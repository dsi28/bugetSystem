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

        <title>FAU - Account Manager</title>

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
        include("navbar_signed.php");?>
        <!-- Header - set the background image for the header in the line below -->
        <header class="py-5 bg-image-full" style="background-image: url('pics/beach.jpg');">
            <img class="img-fluid d-block mx-auto" src="pics/Florida_Atlantic_University_monogram_logo.svg.png" alt="">
        </header>

        <!-- Content section -->
        <section class="py-5">
            <div class="container" id="create-form">
                <h1>Create Form</h1>
                <p class="lead">Instructions on how to create a form if necessary. <br><br>Refernece documents.<br><br><br><br> Get help information </p><br><br>
                <div class="row" style="display: flex; justify-content: space-between;">

                    <button class="cfbutton btn btn-primary" onclick="window.location='all_forms.php'">Create Form</button>

                </div>
            </div>
        </section>


        <section class="py-5">
            <div class="container" id="read-form">
                <h1>List of existing forms</h1>
                <p class="lead">Instructions on how to read a form if necessary. <br><br>Refernece documents.<br><br><br><br> Get help information </p><br><br>

                <button class="flbutton btn btn-info" onclick="window.location='php/form_list.php'">Forms List</button>

            </div>
        </section>

        <script>
            document.getElementById("brand").innerHTML = "Account Manager";
        </script>


        <?php
        include("footer.php");?>


    </body>

</html>
