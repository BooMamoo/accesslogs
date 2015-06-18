<!DOCTYPE html>
<html>
	<head>
		
		<title>Test</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="access logs">
		<meta name="description" content="Show informaions about entering company.">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
	</head>

	<body class="test">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>

		<nav>
			<div class="nav-wrapper cyan">
				<a href="{{ url('/') }}" class="brand-logo space">Access Logs</a>

				<style>
					.space
					{
						margin-left: 50px;
						margin-right: 50px;

					}

					.content
					{
						margin-left: 100px;
						margin-right: 100px;
						margin-top: 50px;
					}

					.middle
					{
						vertical-align: middle;
					}
				</style>
			</div>
		</nav>



		<div class="white">
            		<div class="row.center content">

				<div class="col s12 m8">
						


					<div class="card-panel teal">
						<div class="col s12">
							<ul class="tabs">
								<li class="tab col s3"><a href="#test1" class="black-text middle"><i class="small mdi-action-face-unlock"></i>Test 1</a></li>
								<li class="tab col s3"><a class="active" href="#test2">Test 2</a></li>
							</ul>
						</div>

						<ul class="collection">

							@for ($i = 0 ; $i < 15 ; $i++)
								<a href="#!" class="collection-item">Alan</a>
							@endfor

							<a href="#!" class="collection-item">Alan<span class="badge">1</span></a>
							<a href="#!" class="collection-item">Alan<span class="new badge">4</span></a>
							<a href="#!" class="collection-item active">Alan</a>
							<a href="#!" class="collection-item">Alan<span class="badge">14</span></a>
						</ul>

					</div>
				</div>
			</div>
				
		


			<footer class="page-footer white">
				
				<div class="footer-copyright cyan darken-3">
					<div class="space right white-text">
						© 2014 Copyright Text
					</div>
				</div>
			</footer>

		</div>
	</body>
</html>
