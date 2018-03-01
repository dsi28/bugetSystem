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
        <!-- Navigation -->
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
                    <button class="cfbutton btn btn-primary" onclick="window.location='all_forms.php'" style="margin-right: 20px;">Create Form</button>
                    <form action="finalDraftForm.php" method="post">
                        <input type="hidden" name="url" value="<?php echo $_SERVER['PHP_SELF'];?>">
                        <button class="fdbutton btn btn-success">Submit Final Draft</button>
                    </form>
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
        <script> document.getElementById("brand").innerHTML="ASAB";
        </script>  
        <?php
        include("footer.php");?>
    </body>
</html>
