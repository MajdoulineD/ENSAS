<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ENSA SAFI</title>
    <link rel="icon" type="image/png" href="/ENSAS/public/imagz/logo.png">
    <!-- Bootstrap Core CSS -->
    <link href="/ENSAS/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
	<link href="/ENSAS/public/css/anas.css" rel="stylesheet"/>	
	<link href="/ENSAS/public/css/agency.min.css" rel="stylesheet"/>
	<link href="/ENSAS/public/css/StyleCSS.css" rel="stylesheet"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->
	<style type="text/css">
		
*{
	color:black;		
}
.lead{
	margin: 1.5% auto;
	padding: auto;
}
label{
	text-align: center;
}
.form-style-6{
    font: 90% 'Raleway', sans-serif;
    max-width: 450px;
    margin: auto;
    padding: 30px;
    background: #F7F7F7;
}
.form-style-6 h1{
    background: #01b1d7;
    padding: 20px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
.form-style-6 input[type="text"],
.form-style-6 input[type="password"],
.form-style-6 input[type="date"],
.form-style-6 input[type="datetime"],
.form-style-6 input[type="email"],
.form-style-6 input[type="number"],
.form-style-6 input[type="search"],
.form-style-6 input[type="time"],
.form-style-6 input[type="tel"],
.form-style-6 input[type="url"],
.form-style-6 textarea,
.form-style-6 select 
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
    color: #555;
    font: 95% Arial, Helvetica, sans-serif;
}
.form-style-6 textarea
{
	height: 100px;
	max-height: 150px;
}
.form-style-6 input[type="text"]:focus,
.form-style-6 input[type="password"]:focus,
.form-style-6 input[type="date"]:focus,
.form-style-6 input[type="datetime"]:focus,
.form-style-6 input[type="email"]:focus,
.form-style-6 input[type="number"]:focus,
.form-style-6 input[type="search"]:focus,
.form-style-6 input[type="time"]:focus,
.form-style-6 input[type="tel"]:focus,
.form-style-6 input[type="url"]:focus,
.form-style-6 textarea:focus,
.form-style-6 select:focus
{
    box-shadow: 0 0 5px #43D1AF;
    padding: 3%;
    border: 1px solid #43D1AF;
}

.form-style-6 input[type="submit"],
.form-style-6 input[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 3%;
    background:#01b1d7;
    border-bottom: 2px solid#01b1d7;
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;    
    color: #fff;
}
.form-style-6 input[type="submit"]:hover,
.form-style-6 input[type="button"]:hover{
    background:#01b1d7;
}
footer{background-color: #222222}
@media (min-width: 768px) {
  .navbar-custom {
    background-color: #222222;
  }
}
.navbar-custom {
    background-color: #222222;
}
</style>
</head>

<body id="page-top" class="index">
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="/ENSAS/Admin">ENSA SAFI</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestionnaire<span class="caret"></span></a>
						<div class="dropdown-menu" style="padding: auto; margin: auto;">
							<ul style="list-style: none; padding: 10px; padding-left: 13px; margin: auto; color:black; font-size: 10px;">
								<li><a style="color:black;" href="blog-fullwidth.html">Gestion des utilisateurs</a></li>
								<li role="separator" class="divider"></li>
								<li><a style="color:black;" href="blog-left-sidebar.html">Gestion des modules</a></li>
								<li role="separator" class="divider"></li>
								<li><a style="color:black;" href="blog-right-sidebar.html">Gestion du site</a></li>
								<li role="separator" class="divider"></li>
								<li><a style="color:black;" href="blog-right-sidebar.html">Gestion du département</a></li>
							</ul>
						</div>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Absence<span class="caret"></span></a>
						<div class="dropdown-menu" style="padding: auto; margin: auto;">
							<ul style="list-style: none; padding: 10px; padding-left: 13px; margin: auto; color:black; font-size: 10px;">
								<li><a style="color:black;" href="blog-fullwidth.html">Visualiser l'absence</a></li>
								<li role="separator" class="divider"></li>
								<li><a style="color:black;" href="/ENSAS/AdminController/JustifyAbsence">Justifier une absence</a></li>
							</ul>
						</div>
					</li>
					<li>
                        <a class="page-scroll" href="/ENSAS/AdminController/Conseil">Conseil</a>
                    </li>
					<li>
                        <a class="page-scroll" href="/ENSAS/AdminController
						/Contact">Contact</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/ENSAS/FrontEnd/Deconnecter">Deconnecter</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>