<?php
	require_once('backend assets/connection.php');
	require('backend assets/counter.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Sanctum</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Gaming Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

<link rel="stylesheet" href="css/loginstyle.css" type="text/css" media="all" />

<link href="css/font-awesome.css" rel="stylesheet"> 

<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="all">


<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- New -->

<!-- new -->


<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<script src="js/hmburgerclose.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 


</head>
<body class="whites">

	<div class="banner">
		<div class="agileinfo-dot">
			<div class="agileits-logo">
				<h1><a href="index.php">Sanctum<span></span></a></h1>
			</div>
			<!-- navbar -->
			<div class="header-top">
				<div class="container">
					<div class="header-top-info">
						<nav class="navbar navbar-default">
						
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>

							
							<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
								<nav>
									<ul class="nav navbar-nav">
										<li class="active"><a href="index.php" >Home</a></li>
										<li><a href="#about" class="scroll" onclick="$('.navbar-toggle').click();">About</a></li>
										<li><a href="#gallery" class="scroll" onclick="$('.navbar-toggle').click();">Scoreboard</a></li>
										<li><a href="#team" class="scroll" onclick="$('.navbar-toggle').click();">Team</a></li>
										<!-- <li><a href="#blog" class="scroll">Tournament</a></li> -->
										<li><a href="#mail" class="scroll" onclick="$('.navbar-toggle').click();">Feedback</a></li>
										<li><a href="#" class="scroll" data-toggle="modal" data-target="#myModal" onclick="$('.navbar-toggle').click();">Log In</a></li>
									</ul>
								</nav>
							</div>
							
						</nav>
					</div>
				</div>
			</div>
			<!-- banner -->
			<div class="w3layouts-banner-info">
				<div class="container">
					<div class="w3layouts-banner-slider">
						<div class="w3layouts-banner-top-slider">
							<div class="slider">
								<div class="callbacks_container">
									<!-- <ul class="rslides callbacks callbacks1" id="slider4"> -->
										<!--<li>
											 <div class="banner_text">
												<h3>Lorem ipsum</h3>
												<p>In volutpat metus quis velit malesuada</p>
												<div class="w3-button">
													<a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
												</div>
											</div> 
										</li>-->
										<!-- <li> -->
											<div class="banner_text">
												<img src="images\logo.png" width=25%>
												<p></p>
												<div class="w3-button">
													<a href="#footer" class="scroll"> Download Mobile App</a>
												</div>
											</div>
										<!-- </li> -->
									<!-- </ul> -->
								</div>
								<div class="clearfix"> </div>
								<!-- <script src="js/responsiveslides.min.js"></script>
								<script>									// You can also use "$(window).load(function() {"
								// 	$(function () {
								// 	  // Slideshow 4
								// 	  $("#slider4").responsiveSlides({
								// 		auto: true,
								// 		pager:true,
								// 		nav:true,
								// 		speed: 500,
								// 		namespace: "callbacks",
								// 		// before: function () {
								// 		//   $('.events').append("<li>before event fired.</li>");
								// 		// },
								// 		// after: function () {
								// 		//   $('.events').append("<li>after event fired.</li>");
								// 		// }
								// 	  });
								
								// 	});
								//  </script>
								<!--banner Slider starts Here--> -->

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //banner GAMES-->
	<!-- about -->
	<div class="about" id="about"> 
		<div class="container "> 
			<div class="welcome">
				<div class="agileits-title"> 
					<h2>Welcome</h2>
					<p>Sanctum is a platform through which you get an lucrative opportunity to earn real cash by 
					just playing your favourite arcade/classic games which we grew up playing.
					
					</p>
				</div>
			</div>
			<!-- <div class="about-w3lsrow"> 
				<div class="col-md-7 col-sm-7 w3about-img"> 
					<div class="w3about-text"> 
						<h5 class="w3l-subtitle">- About Us</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at placerat ante. Praesent nulla nunc, pretium dapibus efficitur in, auctor eget elit. Lorem ipsum dolor sit amet</p>
					</div>
				</div> 
				<div class="clearfix"> </div>
			</div> -->
			
			<!-- About Us -->
			<div class="jarallax testimonial" id="testimonial">
				<div class="testimonial-dot">
					<div class="container">
						<div class="agileits-title testimonial-heading"> 
							<h3>Games</h3> 
						</div>
						<div class="w3-agile-testimonial">
							<div class="slider">
								<div class="callbacks_container">
									<ul class="rslides callbacks callbacks1" id="slider3">
										<?php
									    	require('backend assets/games.php');
											get_game_section();
										?>
									</ul>
								</div>
								<div class="clearfix"> </div>
								<script>
											// You can also use "$(window).load(function() {"
											$(function () {
											  // Slideshow 4 and about us 
											  $("#slider3").responsiveSlides({
												auto: true,
												pager:false,
												nav:false,
												speed: 1500,
												namespace: "callbacks",
												before: function () {
												  $('.events').append("<li>before event fired.</li>");
												},
												after: function () {
												  $('.events').append("<li>after event fired.</li>");
												}
											  });
										
											});
								</script>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //about GAMES--> 
	<!-- Features -->
	<div class="markets greys" id="markets">
		<div class="container">
			<div class="agileits-title"> 
				<h3>Features</h3>
			</div>
			<div class="markets-grids">
				<div class="col-md-4 w3ls-markets-grid">
					<div class="agileits-icon-grid">
						<div class="icon-left">
							<i class="fa fa-gamepad" aria-hidden="true"></i>
						</div>
						<div class="icon-right">
							<h5>Nostalgic</h5>
							<p>Our app will bring back your childhood memories(If u are an adult).It has games like snake,tic tac toe which u must have surely played in your childhood</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 w3ls-markets-grid">
					<div class="agileits-icon-grid">
						<div class="icon-left">
							<i class="fa fa-trophy" aria-hidden="true"></i>
						</div>
						<div class="icon-right">
							<h5>Mind Freshing</h5>
							<p>Our main moto is to provide entertainment,fun to our users.We can assure user will have a good experience by playing games on our platform</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 w3ls-markets-grid">
					<div class="agileits-icon-grid">
						<div class="icon-left">
							<i class="fa fa-user" aria-hidden="true"></i>
						</div>
						<div class="icon-right">
							<h5>Classic Games</h5>
							<p>Our platform has old classic games like tic tac toe,snake game,memory game etc.It will surely bring back childhood memories of 90's kids.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 w3ls-markets-grid">
					<div class="agileits-icon-grid">
						<div class="icon-left">
							<i class="fa fa-thumbs-up" aria-hidden="true"></i>
						</div>
						<div class="icon-right">
							<h5>Tournament </h5>
							<p>We are also organising tournament where user can compete with another users and compare there scores.This feature is mainly for those people who love to play competitive games</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 w3ls-markets-grid">
					<div class="agileits-icon-grid">
						<div class="icon-left">
							<i class="fa fa-comments" aria-hidden="true"></i>
						</div>
						<div class="icon-right">
							<h5>Reward Based System</h5>
							<p>On winning tournament,user will also get rewards in terms of points.Number of points a winner will get will be decided at the time of tournment.Point system may not be fixed for each tournament</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 w3ls-markets-grid">
					<div class="agileits-icon-grid">
						<div class="icon-left">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</div>
						<div class="icon-right">
							<h5>Feedback</h5>
							<p>User can share there experience with us in feedback section of our website.They can also suggest some improvements which they would like to see on our platform.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //Features -->
	<!-- Scoreboard -->
	<div class="portfolio whites" id="gallery">
		<div class="container">
			<div class="agileits-title"> 
				<h3>Scoreboard</h3> 
			</div>
					
				<?php
					require('backend assets/scoreboard.php');
					get_scoreboard_data();
				?>
											
										
				<link href="css/scoreboard.css" rel="stylesheet" />
				<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
				<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
				<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
				<script src="js/datatables-demo.js"></script> 
				<div class="clearfix"></div>
		    </div>
	    </div>
    </div>
	<!-- //Scoreboard -->
	<!-- modal -->
	<div class="modal about-modal fade" id="myModal" tabindex="-1" role="dialog">
		<!-- <div class="modal-dialog" role="document"> -->
			<!-- <div class="modal-content"> -->
				<!-- <div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
					<h4 class="modal-title">..<span>Log in</span></h4>
				</div>  -->
				<!-- <div class="modal-body"> -->
					<!-- <div class="agileits-w3layouts-info"> -->
						<div class="login-wrap modal-dialog">
							
							<div class="login-html">
								<button type="submit" class="close" data-dismiss="modal" style="font-size:2em;color:white;opacity:0.5;margin-top:0;padding-top:0;">&times;</button>
								<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
								<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
								<div class="login-form">

									<form method="post" action="backend assets/signin.php">

										<div class="sign-in-htm"><br><br>
											<div class="group">
												<label for="user" class="label">E-mail</label>
												<input name="signin_user" type="text" class="inputs" placeholder="example@sanctum.com">
											</div>
											<div class="group">
												<label for="pass" class="label">Password</label>
												<input name="signin_password" type="password" class="inputs" data-type="password">
											</div>
											<div class="group">
												<input name="signin_keep" type="checkbox" checked>
												<label style="color:white"> Remember me</label>
												<label id="error_invalid" style="color:orange;" class="label"></label>
											</div>
											<div class="group">
												<input type="submit" class="button" value="Sign In">
											</div>
											<div class="hr"></div>
											<div class="foot-lnk">
												<a class="a" href="/backend assets/forgotpassword.php">Forgot Password?</a>
											</div>
										</div>

									</form>
									
									<form method="post" action="backend assets/signup.php" onsubmit="return checkPassword()">

										<div class="sign-up-htm"><br><br>
											<div class="group">
												<label for="user" class="label">Name</label>
												<input id="signup_user" name="signup_user" type="text" class="inputs" required>
											</div>
											<div class="group">
												<label for="pass" class="label">Password</label>
												<input id="signup_password1" name="signup_password1" type="password" class="inputs" data-type="password" required>
											</div>
											<div class="group">
												<label for="pass" class="label">Repeat Password</label>
												<input id="signup_password2" name="signup_password2" type="password" class="inputs" data-type="password" required>
											</div>
											<div class="group">
												<label for="pass" class="label">Email Address</label>
												<input id="signup_email" name="signup_email" type="text" class="inputs" required><br>
												<label id="error_msg" style="color:orange;" class="label"></label>
											</div>
											<div class="group">
												<input type="submit"  class="button" value="Sign Up" required>
											</div>
											
										</div>

									</form>
									<script>
										function checkPassword()
										{
											var passwd1=document.getElementById('signup_password1');
											var passwd2=document.getElementById('signup_password2');
											if(passwd1.value==passwd2.value)
												return true;
											else
												alert("Password and confirm password doesn't match.");
												
											return false;
										}
									</script>
								</div>
							</div>
						</div>
					<!-- </div> -->
				<!-- </div> -->
			<!-- </div> -->
		<!-- </div> -->
	</div>
	<!-- //modal -->
	<!-- result -->
	<div id="blog" class="blog greys">
		<div class="container"> 
			<div class="agileits-title">
				<h3>Results</h3>
			</div> 
			<div class="wthree-blog-grids">
				<!-- <div class="col-md-6 w3-agileits-blog-grid">
					<div class="col-sm-4 col-xs-3 blog-left">
						<h4>02/21</h4>
					</div>
					<div class="col-sm-8 col-xs-9 blog-right">
						<a href="#" data-toggle="modal" data-target="#myModal">February Season</a>
						<p>1. Hellios <br>2. Mauris<br>3. Krutos </p>
					</div>
					<div class="clearfix"> </div>
				</div> -->
				<?php 
					require('backend assets/results.php');
					get_results();
				?>
				 <!-- <div class="col-md-6 w3-agileits-blog-grid">
					<div class="col-sm-4 col-xs-3 blog-left">
						<h4>01/21</h4>
					</div>
					<div class="col-sm-8 col-xs-9 blog-right">
						<a href="#" data-toggle="modal" data-target="#myModal">January Season</a>
						<p>1. Hellios <br>2. Mauris<br>3. Krutos </p>
					</div>
					<div class="clearfix"> </div>
				</div> -->
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //result -->
	<!-- team -->
	<div class="team whites" id="team">
		<div class="container">
			<div class="agileits-title"> 
				<h3>Amazing Team</h3> 
			</div>
			<div class="agileits-team-grids">
				<div class="col-md-4 agileits-team-grid">
					<div class="team-info">
						<img src="images/t2.jpg" alt="">
						<div class="team-caption"> 
							<h4>Dhruv Dani</h4>
							<!-- <p>Fusce laoreet</p> -->
							<ul>
								<li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
								<!-- <li><a href=""><i class="fa fa-linkedin-in"></i></a></li> -->
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 agileits-team-grid">
					<div class="team-info">
						<img src="images/t3.jpg" alt="">
						<div class="team-caption"> 
							<h4>Zaneta Bhagwagar</h4>
							<!-- <p>Fusce laoreet</p> -->
							<ul>
								<li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<!-- <li><a href="#"><i class="fa fa-rss"></i></a></li> -->
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 agileits-team-grid">
					<div class="team-info">
						<img src="images/t4.jpg" alt="">
						<div class="team-caption"> 
							<h4>Nilay Thakkar</h4>
							<!-- <p>Fusce laoreet</p> -->
							<ul>
								<li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<!-- 	 -->
							</ul>
						</div>
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //team -->
	<!-- feedback -->
	<div class="mail greys" id="mail">
		<div class="container">
			<div class="agileits-title">
				<h3>Feedback</h3>
			</div> 

			<div class="w3_mail_grids">
				<form action="backend assets/feedbacksubmit.php" method="post">

					<span class="input input--jiro">
						<input class="input__field input__field--jiro" type="text" id="input-10" name="feedback_name" placeholder="Your Name" required=""/>
						<label class="input__label input__label--jiro" for="input-10">
							<span class="input__label-content input__label-content--jiro">Your Name</span>
						</label>
					</span>
					<span class="input input--jiro">
						<input class="input__field input__field--jiro" type="email" id="input-11" name="feedback_email" placeholder="Your Email Address" required=""/>
						<label class="input__label input__label--jiro" for="input-11">
							<span class="input__label-content input__label-content--jiro">Your Email</span>
						</label>
					</span>
					<span class="input input--jiro">
						<input class="input__field input__field--jiro" type="text" id="input-12" name="feedback_contact" placeholder="Your Contact Number" />
						<label class="input__label input__label--jiro" for="input-12">
							<span class="input__label-content input__label-content--jiro">Contact (Optional)</span>
						</label>
					</span>
					<textarea name="feedback_message" placeholder="Message..." required=""></textarea>
					<input type="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>
	<script src="js/classie.js"></script>
	<script>
			(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}

				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			})();
		</script>
	<!-- //feedback -->
	<!-- contact -->
	<div id="contact" class="contact whites">
		<div class="contact-row agileits-w3layouts">  
			<div class="col-md-5 contact-w3lsleft map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29769.46355069038!2d72.7610618!3d21.1451166!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x672dfe4f512e4d87!2sSDJ%20International%20College!5e0!3m2!1sen!2sin!4v1614593717099!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
			<div class="col-md-7 contact-w3lsright whites" style="padding:3em 6em 9em 6em;">
				<div class="agileits-title">
					<h3 >Contact Us</h3>
				</div> 
				<h6 style="text-align: center;">Sanctum,SDJ International College</h6>
				<div class="col-xs-6 address-row">
					<div class="col-xs-2 address-left">
						<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
					</div>
					<div class="col-xs-10 address-right">
						<h5>Visit Us</h5>
						<p>Plot No.166,Opp IDI,Vesu, <br>Surat,Gujarat,India-395007</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-xs-6 address-row w3-agileits">
					<div class="col-xs-2 address-left">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
					</div>
					<div class="col-xs-10 address-right">
						<h5>Mail Us</h5>
						<p><a href="info@sanctum.com"> info@Sanctum.com </a></p>
						<p style="visibility: hidden;"><a href="inf@sanctum.com"> help@Sanctum.com </a></p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-xs-6 address-row">
					<div class="col-xs-2 address-left">
						<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
					</div>
					<div class="col-xs-10 address-right">
						<h5>Call Us</h5>
						<p>+91 12345 67890<br></p>
						<p style="visibility: hidden;">+91 </p>
					</div>
					<div class="clearfix"> </div>
				</div> 
				<div class="col-xs-6 address-row">
					<div class="col-xs-2 address-left">
						<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
					</div>
					<div class="col-xs-10 address-right">
						<h5>Working Hours</h5>
						<p>Mon - Fri : 8:00 am to 10:30 pm<br>
						Sat - Sun : 9:00 am to 11:30 pm</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>	
			</div>
			<div class="clearfix"> </div>
		</div>	
	</div>
	<!-- //contact -->  
	<!-- footer -->
	<div class="footer" id="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-6 amet-sed"> 
					<div class="footer-title">
						<h3>About Us</h3>
					</div> 
					<p>We are Sanctum developers !!!! Lolllll</p>
				</div>
				<div class="col-md-6 amet-sed amet-medium">
					<div class="footer-title">
						<h3>Downloads</h3>
					</div> 
					
					<div class="w3_mail_grids whitehover" style="margin-top: 0em;">
						<p>For mobile application </p>
						<form action="#" method="post">
							<input type="submit" value="&#xf17b; ANDROID" class="fa fa-android" aria-hidden="true" style="color: white;">
							<input type="submit" value="&#xf179; IOS" class="fa fa-android" aria-hidden="true" style="color: white;">
						</form> 
					</div>
				</div>
				<!-- <div class="col-md-4 amet-sed ">
					<div class="footer-title">
						<h3>Follow Us</h3> 
						<h3>Newsletter</h3>
					</div> 
					 <div class="agileinfo-social-grids">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-rss"></i></a></li>
							<li><a href="#"><i class="fa fa-vk"></i></a></li>
						</ul>
					</div> 
					<div class="support">
						<form action="#" method="post">
							<input type="email" placeholder="Enter email...." required=""> 
							<input type="submit" value="Subscribe" class="botton">
						</form> 
					</div>
				</div> -->
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //footer --> 
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<p class="footer-class">© 2021 Sanctum . All Rights Reserved</p>
		</div>
	</div>
	<!-- //copyright -->
	<script src="js/jarallax.js"></script>
	<!-- <script src="js/SmoothScroll.min.js"></script> -->
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
	<script src="js/responsiveslides.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- Tabs-JavaScript -->
	<script src="js/jquery.filterizr.js"></script>
		<script src="js/controls.js"></script>
		<script type="text/javascript">
			$(function() {
				$('.filtr-container').filterizr();
			});
		</script>
	<!-- //Tabs-JavaScript -->
	<!-- PopUp-Box-JavaScript -->
		<script src="js/jquery.chocolat.js"></script>
		<script src="js/error_code.js"></script>
		<script type="text/javascript">
			$(function() {
				$('.filtr-item a').Chocolat();
			});
		</script>
	<!-- //PopUp-Box-JavaScript -->
</body>	
</html>