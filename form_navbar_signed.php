<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//session_start();
?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-blue_fau fixed-top mb-3">
    <div class="container">
        <a class="navbar-brand" id="brand" href="#"><?php echo $_SESSION['role']; ?></a> <!-- This gives info to the SQL database ( primary key for storing data for wide forms) -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">


            <ul class="navbar-nav ml-auto">



                <li class="nav-item">
                <form action="http://lamp.cse.fau.edu/~dizquierdo2014/SNO/php/end_session.php">
                    <button type="submit" class="btn btn-outline-danger mt-2 ">Sign Out</button>
                </form>
                    </li>
            </ul>

        </div>
        <!--   <button class="navbar-toggler pull-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>-->

    </div>
</nav>
