<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>FAU - Students </title>

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
        <link href="stylesheet.css" rel="stylesheet">
    </head>

    <body>
        <!-- Navigation -->
        <?php 
        include("navbar_signed.php");?>

        <!-- Header - set the background image for the header in the line below -->
        <header class="py-5 bg-image-full" style="background-image: url('https://unsplash.it/1900/1080?image=1076');">
            <img class="img-fluid d-block mx-auto" src="pics/Florida_Atlantic_University_monogram_logo.svg.png" alt="">
        </header>

        <!-- Content section -->
        <section class="py-5">
            <div class="container" id="create-form">
                <h1>Create Form</h1>
                <p class="lead">Instructions on how to create a form if necessary. <br><br>Refernece documents.<br><br><br><br> Get help information </p><br><br>

                    <button class="cfbutton btn btn-primary" onclick="window.location='all_forms.php'" style="margin-right: 20px;">Create Form</button>

            </div>
        </section>


        <section class="py-5">
            <div class="container" id="read-form">
                <h1>List of existing forms</h1>
                <p class="lead">Instructions on how to read a form if necessary. <br><br>Refernece documents.<br><br><br><br> Get help information </p><br><br>

                <button class="flbutton btn btn-info" onclick="">Forms List</button>

            </div>
        </section>

        <script>
            document.getElementById("brand").innerHTML="Account Manager";
        </script> 
        <script>
            document.getElementById("brand3").style.display= "none";
        </script>


        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; SNO</p>
            </div>
            <!-- /.container -->
        </footer>


    </body>

</html>