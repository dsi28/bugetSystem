<?php
session_start();
/*$ROLE = $_SESSION['role'];
switch ($ROLE) {
	case 'ASAB' :
		$ath = "asab_help.php";
		break;
	case 'CSAB' :
		$ath = "csab.php";
		break;
	case 'SG' :
		$ath = "sg-advisors.php";
		break;
	case 'AGSC' :
		$ath = "agsc.php";
		break;
	case 'ACCOUNT' :
		$ath = "manager.php";
		break;
}*/
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


<!--
				<li class="nav-link">
					<a class="text-white nav-link" href="#create-form" id="brand2">Create Form</a>
				</li>
				<li class="nav-link" >
					<a class="text-white nav-link" href="#read-form" id="brand3">Forms List</a>
				</li>
-->
				<li class="nav-item">
					<form action="php/end_session_script.php">
						<button type="submit" class="btn btn-outline-danger mt-2 ">Sign Out</button>
					</form>
				</li>
			</ul>
		</div>

		<!--   <button class="navbar-toggler pull-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>--> 
	</div>
	<script>
		document.getElementById("help").onclick = function() {
			var user_role = '<?php echo $_SESSION['role'];?>';
			var ath = "index.php";
			switch(user_role){
				case 'ASAB' :
					ath = "asab_help.php";
					break;
				case 'CSAB' :
					ath = "csab_help.php";
					break;
				case 'SG' :
					ath = "sg-advisors.php";
					break;
				case 'AGSC' :
					ath = "agsc.php";
					break;
				case 'ACCOUNT' :
					ath = "manager.php";
					break;				}

			window.location.href = ath;
		};
	</script>
</nav>