<?php
	@ob_start();
	session_start();
	if(isset($_POST['proses'])){
		require 'config.php';
			
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['pass']);

		$sql = 'select member.*, login.user, login.pass
				from member inner join login on member.id_member = login.id_member
				where user =? and pass = md5(?)';
		$row = $config->prepare($sql);
		$row -> execute(array($user,$pass));
		$jum = $row -> rowCount();
		if($jum > 0){
			$hasil = $row -> fetch();
			$_SESSION['admin'] = $hasil;
			echo '<script>alert("Login Sukses");window.location="index.php"</script>';
		}else{
			echo '<script>alert("Login Gagal");history.go(-1);</script>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword">

	<title>Login To Admin</title>

	<!-- Bootstrap core CSS -->
	<!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

	<style>
		body {

			font-weight: 300;
			font-size: 16px;
			line-height: 2;
			background: no-repeat center;
			/* color: #777; */
			color: #174EFA;
		}

		.centerDiv {
			height: 100vh;
			width: 100%;
		}
	</style>

</head>


<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

<body id="login-page">
	<div class="container-fluid">
		<div class="row centerDiv">
			<div class="col-sm-12 my-auto">
				<div class="card border-0">
					<div class="row">
						<div class="col-md-6">
							<div class="card-body">
								<img src="assets/img/assets1.jpg" class="img-fluid rounded-start shadow" alt="..." />
							</div>
						</div>
						<!-- <form class="form-login" method="post"> -->
							<div class="col-md-4">
								<div class="card-body">
									<div class="mb-5 text-center">
										<h2 class="h1 mt-2">Login</h2>
									</div>
									<form class="form-login" method="POST">
										<div class="mb-4">
											<h2 class="h6 mt-4">Username</h2>
											<input type="text" class="form-control" name="user" />
											<div id="emailHelp" class="form-text">
												fill in your username
											</div>
										</div>
										<div class="mb-4">
											<h2 class="h6 mt-4">Password</h2>
											<input type="password" class="form-control" id="exampleInputPassword1"
												name="pass" />
											<div id="emailHelp" class="form-text">
												fill in your password
											</div>
										</div>
										<div class="mb-4 form-check">
											<input type="checkbox" class="form-check-input" id="exampleCheck1" />
											<label class="form-check-label" for="exampleCheck1">Remember me</label>
										</div>
										<button type="submit" name="proses" class="btn btn-primary w-100">
											SIGN IN
										</button>
									</form>
								</div>
							</div>
						<!-- </form> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
		integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
		integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
	</script>
</body>

<!-- js placed at the end of the document so the pages load faster -->
<!-- <script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script> -->

</html>