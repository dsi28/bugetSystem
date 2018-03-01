<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>FAU - Activity and Service Accounting and Budget Office</title>


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
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="css/stylesheet.css" rel="stylesheet">

        <link rel="shortcut icon" type="image/x-icon" href="pics/FAU-icon.ico" />
    </head>

    <body>
        
        <div  class="top-logo-brand"><span class="lead">ACTIVITY AND SERVICE ACCOUNTING AND BUDGET OFFICE</span></div>

        <!-- Navigation -->
        <!-- TODO styles added to the elements of the navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-blue_fau ">
            <div class="container">
                <ul class="navbar-nav" id="moveRight">
                    <li class="nav-item">
                        <div id="btn_hide">
                            <button class="btn btn-red_fau hide text-white py-2 mt-1" id="signin" data-toggle="modal" data-target="#SigninModal">Sign In</button>
                        </div>

                    </li>

                </ul>
                <a class="navbar-brand mx-auto" href="#"><img src="pics/FAU.png" width="100px"></a>
                <!--   <button class="navbar-toggler pull-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>--> 
                <div id="navbarResponsive"><!-- Removed  class="collapse navbar-collapse" because we do not need it as we just have one element-->
                    <ul class="navbar-nav ml-auto " id="moveRight">
                        <li class="nav-item">
                            <button class="btn btn-red_fau text-white py-2 mt-1" id="signin" data-toggle="modal" data-target="#SigninModal">Sign In</button>


                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- End of navbar -->

        <!-- Header - set the background image for the header in the line below -->
        <header class="py-5 bg-image-full content-align-middle text-center" style="background-image: url('pics/beach.jpg');">
    <div class="row " >
                <h1 class="display-2 text-center mx-auto " style="color: #CC0000"><span>Be Daring,</span>
                <span class="display-2 text-center text-white "> Be Bold,</span>
                <span class="display-2 text-center " style="color: #3B5998"> Be FAU</span></h1>
            </div>
        </header>

        <!-- Content section -->
        <section class="py-5 container-fluid flex-grow">
            <div class="container">
                <h1 class="display-4">About</h1>
                <p class="lead">The Activity and Service, Accounting and Budget Office, also known as ASAB, consist of a team of professional administrators and a team of student specialist who manage the Activity and Service Fee. ASAB coordinates the A&S Fee budget process, performs financial transaction processing, and facilitates a range of services to include the Student Travel processing and fiscal trainings.</p>
            </div>
        </section>

        <!-- Image Section - set the background image for the header in the line below
<section class="py-5 bg-image-full" style="background-image: url('https://unsplash.it/1900/1080?image=1081');">

<div style="height: 200px;"></div>
</section> -->

        <!-- Content section -->
        <section class="py-5 container-fluid flex-grow">
            <div class="container">
                <h1 class="display-4">Contact</h1>
                <p class="lead">Detailed contact information for the ASAB office and other stakeholders that would like to be shown here.</p>
            </div>
        </section>

        <!-- Footer -->
        <footer id="footer">
            <div class="container py-1">
                <p class="m-0 text-center text-white">Copyright &copy; SNO</p>
            </div>
            <!-- /.container -->
        </footer>





        <!-- Modal -->
        <div class="modal fade" id="SigninModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="ModalLabel"><span class="lead">Sign in</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form class="form" action="php/validate_user.php" method="post">

                                <div class="form-group ">
                                    <label for="username">Username</label><br>
                                    <input type="text" class="form-control" placeholder="Enter Username" name="user" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label><br>
                                    <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                                </div>
                                       <div >
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>

                            </form>
                        </div>
                  
             
                          </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript -->

        <script src="startbootstrap-full-width-pics-gh-pages/vendor/bootstrap/js/bootstrap.min.js"> </script>
        <!-- <script src="script.js"></script>-->

    </body>

</html>
