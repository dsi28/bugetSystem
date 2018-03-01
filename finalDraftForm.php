<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>FAU - Approval</title>

        <!-- Custom stylesheet -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="startbootstrap-full-width-pics-gh-pages/vendor/jquery/jquery.min.js"></script>
        <!-- TODO Script added to make the navbar collapse work -->
        <script src="startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


        <!-- Bootstrap core CSS -->
        <link href= "startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="startbootstrap-full-width-pics-gh-pages/css/full-width-pics.css" rel="stylesheet">
        <link href="css/stylesheet.css" rel="stylesheet">

        <script>
            $(document).ready(function(){
                $('#unapproved').onmouseover( function(){
                    $('#unapproved').removeClass('btn-danger').addClass('btn-outline-danger');
                });
                $('#unapproved').onmouseout( function(){
                    $('#unapproved').removeClass('btn-outline-danger').addClass('btn-danger');


                });
            });
        </script>
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
        <section class="py-5">
            <div class="container" id="create-form" class="input-group">
                <h1>List Of Forms</h1>
                <br>
                <br>



                <div class="row" style="display: flex; justify-content: space-between;">
                    <button type='button' 
                            <?php if($_SESSION['role']=='ACCOUNT') {
                            ?> disabled="disabled" style="visibility: hidden;"<?php } ?>
                            name="form" id="1" class=" btn btn-primary" onclick="formElected(this.id)">UBAC/CBAC Worksheet</button>
							<button class="cfbutton btn btn-outline-danger" onClick="window.location='http://lamp.cse.fau.edu/~dizquierdo2014/SNO/asab.php'">EXIT</button>	
            </div>
            <br>
            <br>
            <br>
            </div>
			
        </section>
    <!-- Footer -->
    <footer  class="py-1 btn-red_fau fixed-bottom">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; SNO</p>
        </div>
        <!-- /.container -->
    </footer>
        <script>
        function formElected(id){
            var xmlhttp = null;
            var dat = new FormData();
            dat.append("id",id);
            
            if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            }
            xmlhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    window.location = this.responseText;
                   console.log(this.responseText);
                }
            }
            xmlhttp.open('POST', 'excel_form/formelection.php');
            xmlhttp.send(dat);
        }
        
        </script>
    </body>
</html>