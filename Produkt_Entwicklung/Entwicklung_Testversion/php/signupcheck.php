<!-- Check, ob ein Proband oder ein Betreuer (in der Datenbank) registriert werden soll.-->
<!DOCTYPE html>
<html>
   	<head>
	<!-- BOOTSTRAP CSS -->
   	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- BOOTSTRAP SCRIPT-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- STYLESHEET CSS -->
	<link rel="stylesheet" href="../CSS/signupcheck.css">
	</head>

	<body>
	<!-- Header -->
		<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light flex-nowrap">
			<a class="navbar-brand" href="#">
			<img src="../CSS/image/Baericon.jpeg"  width="30" height="30" alt="Logo" > &nbsp;&nbsp;SoDi4U
			</a>
			<h4>Registrierung</h4>
		</nav>
		</header>

		<div class="container">
			<div class="row">
				<div class="col">
					<h1>Registrieren als:</h1>
					<br>
					<form  action="signup.php" method="POST">
						<input type="radio" name="rolle" value="betreuer"> Betreuer
						<br> 
						<input type="radio" name="rolle" value="admin"> Admin
						<br>
						<input type="radio" name="rolle" value="proband"> Proband
						<br><br>
						<button type="submit" class="btn btn-outline-danger" name="signupcheck-submit" value="Select a Radio Button">Weiter</button>
					</form>
				</div>
			</div>
		</div>
			
		</main>
	</body>
</html>


