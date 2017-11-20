<!DOCTYPE HTML>
<html>
<head>
<title>Healthy Heart Laboratories | Register</title>
<link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">

  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/plugins/iCheck/square/blue.css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<link href="/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Dr.Care Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Cambo' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Hind:400,300,500,600,700' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="/js/move-top.js"></script>
<script type="text/javascript" src="/js/easing.js"></script>
<script src="/js/lockr.js" type="text/javascript"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
<!-- //end-smoth-scrolling -->
<link rel="stylesheet" type="text/css" href="/css/style_common.css" />
<link rel="stylesheet" type="text/css" href="/css/style4.css" />
</head>
<body>
<!--header start here-->
<div class="header">
	<div class="container">
		<div class="header-main">
			<div class="header-left">
				<div class="logo">
				   <h1><a href="index.html"> <img src="/img/logov3.png" alt=""/></a></h1>
			    </div>
				<div class="social-icons">
					<ul>
						<li><a href="#"><span class="fa"> </span></a></li>
						<li><a href="#"><span class="tw"> </span></a></li>
						<li><a href="#"><span class="ga"> </span></a></li>
					</ul>
				</div>
				 <div class="clearfix"> </div>
			  </div>
				<div class="top-navg">
					   <span class="menu"> <img src="/images/icon.png" alt=""/></span>
					<nav class="cl-effect-16">
						<ul class="res">
							<li><a class="scroll" data-hover="Home" href="index.html">Home</a></li>
							<li><a class="scroll" data-hover="About" href="#about">About</a></li>
							<li><a class="scroll" data-hover="Services" href="#services">Services</a></li>
							<li><a class="scroll" data-hover="Gallery" href="#gallery">Gallery</a></li>
							<li><a class="scroll" data-hover="Contact" href="#contact">Contact</a></li>
						</ul>
					<!-- script-for-menu -->
						 <script>
						   $( "span.menu" ).click(function() {
							 $( "ul.res" ).slideToggle( 300, function() {
							 // Animation complete.
							  });
							 });
						</script>

					</nav>
				</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			 <div class="register-box-body">
			<p class="login-box-msg">Please register to our system to continue</p>

			    <form action="/front/register" method="POST">

			      {{ csrf_field() }}
			      <div class="form-group has-feedback">
			        <input type="text" class="form-control" placeholder="First name" name="first_name" required>
			        <span class="glyphicon glyphicon-user form-control-feedback"></span>
			      </div>
			      <div class="form-group has-feedback">
			        <input type="text" class="form-control" placeholder="Last name" name="last_name" required>
			        <span class="glyphicon glyphicon-user form-control-feedback"></span>
			      </div>
			      <div class="form-group has-feedback">
			        <input type="email" class="form-control" placeholder="Email" name="email" required>
			        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			      </div>

			      <div class="form-group has-feedback">
			        <input type="text" class="form-control" placeholder="Age" name="age" required>
			        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			      </div>

			      <div class="form-group has-feedback">
			        <select class="form-control" name="gender" required>
			          <option value="">--Select gender--</option>
			          <option value="male">Male</option>
			          <option value="female">Female</option>
			        </select>
			      </div>

			      <div class="form-group has-feedback">
			        <input type="text" class="form-control" placeholder="Phone number" name="phone_number" required>
			        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
			      </div>

			      <div class="form-group has-feedback">
			        <textarea name="address" id="" cols="10" rows="3" class="form-control" placeholder="Address"></textarea>
			      </div>

			      <div class="row">
			        <div class="col-xs-8">
			          <div class="checkbox icheck">
			            <label>
			              <!-- <input type="checkbox"> I agree to the <a href="#">terms</a> -->
			            </label>
			          </div>
			        </div>
			        <!-- /.col -->
			        <div class="col-xs-4">
			          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
			        </div>
			        <!-- /.col -->
			      </div>
			    </form>

			    <div class="social-auth-links text-center">
			      <p>- OR -</p>
			      <span>Already registered? </span><a href="/login" class="btn btn-primary btn-block btn-flat">Login</a>
			    </div>
			    </div>

		</div>
	</div>
</div>
<!--header start here-->
<!--banner strat here-->
<!-- <div class="banner">
	<div class="container">
		<div class="banner-main">
			 <h3>We Work For Your Health</h3>
			 <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni</p>
			<div class="clearfix"> </div>
		</div>
	</div>
</div> -->
<!--banner end here-->
<!--about strat here-->
<!-- <div class="about" id="about">
	<div class="container">
		<div class="abou-main">
			<div class="about-top">
				<h2>About us</h2>
				<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally pleasure.</p>
			</div>
			<div class="about-bottom">
				<div class="col-md-4 about-grid">
					<img src="/images/a1.jpg" alt="" class="img-responsive">
					<div class="grid-details">
						<h3>Et harum quidem rerum facilis</h3>
						<p>Excepteur sint occaecat cupidatat proident sunt culpa officia.</p>
					</div>
				</div>
				<div class="col-md-4 about-grid">
					<img src="/images/a2.jpg" alt="" class="img-responsive">
					<div class="grid-details">
						<h3>Et harum quidem rerum facilis</h3>
						<p>Excepteur sint occaecat cupidatat proident sunt culpa officia.</p>
					</div>
				</div>
				<div class="col-md-4 about-grid">
					<img src="/images/a3.jpg" alt="" class="img-responsive">
					<div class="grid-details">
						<h3>Et harum quidem rerum facilis</h3>
						<p>Excepteur sint occaecat cupidatat proident sunt culpa officia.</p>
					</div>
				</div>
			  <div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div> -->
<!--about end here-->
<!--team start here-->
<!-- <div class="team-mem">
		<div class="container">
			   <div class="team-main">
					<div class="team-top">
							<h3>Our Team</h3>
					</div>
					<div class="team-bottom">
						<div class="col-md-3 team-grid">
							<a href="#"> <img src="/images/t1.jpg" alt="" class="img-responsive"> </a>
						</div>
						<div class="col-md-3 team-grid">
							<a href="#"> <img src="/images/t2.jpg" alt="" class="img-responsive"> </a>
						</div>
						<div class="col-md-3 team-grid">
							<a href="#"> <img src="/images/t3.jpg" alt="" class="img-responsive"> </a>
						</div>
						<div class="col-md-3 team-grid">
							<a href="#"> <img src="/images/t4.jpg" alt="" class="img-responsive"> </a>
						</div>
					<div class="clearfix"> </div>
				</div>
			</div>
	  </div>
</div> -->
<!--team end  here-->
<!--services strta here-->
<!-- <div class="services" id="services">
	<div class="container">
		<div class="services-main">
			<div class="services-top">
				<h3>Available Tests</h3>
				<p>Please browse all the standard tests we provide.</p>
			</div>
			<div class="row">
				<div class="col-md-12">
					
					@if(isset($data))
						@foreach($data as $item)
							<div class="panel panel-info"> 
								<div class="panel-heading">Test name: {{ $item['test_name'] }}</div>

								<table class="table"> 
									<thead> <tr><th>Slot</th> <th>Time</th><th></th></tr> </thead> 
									<tbody> 
										@if(isset($item['slots']))
											@foreach($item['slots'] as $slot)	
												<tr>
													<td>{{ $slot['notes'] }}</td> 
													<td>{{ $slot['time'] }}</td> 
													<td> <a data-test_id="{{ $item['test_id'] }}" 
													data-slot_id="{{ $slot['id'] }}" 
													data-slot_time="{{ $slot['time'] }}" class="btn btn-info btn-appoinment">Make Appointment</a> </td>
												</tr> 
											@endforeach
										@endif
									</tbody>
								</table>
							</div>
						@endforeach
					@endif

				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div> -->
<!--services end here-->
<!--testimony start here-->
<!-- <div class="testmony">
	<div class="container">
		<div class="testmony-main">
			<div class="col-md-4 testmo-left">
				<img src="/images/tes.jpg" alt="" class="img-responsive">
			</div>
			<div class="col-md-8 testmo-right">
				<span class="quota1"> </span>
				<h4>Nam libero tempore soluta nobis eligendi optio cumque impedit</h4>
				<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings</p>
			    <span class="quota2"> </span>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div> -->
<!--testmony end here-->
<!--gallery start here-->
<!-- <div class="gallery" id="gallery">
	<div class="container">
		<div class="gallery-main">
			<div class="gallery-top">
				<h3>Gallery</h3>
				<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally pleasure.</p>
			</div>
			<div class="gallery-bottom">
				<div class="view view-fourth">
                     <a href="/images/g1.jpg" class="b-link-stripe b-animate-go  swipebox"  title="Image Title"><img src="/images/g1.jpg" alt="" class="img-responsive">
                    <div class="mask">
                         <h3>Medical</h3>
                        <p>A wonderful serenity has taken possession of my entire soul.</p>
                      <span class="gall">More</span>
                    </div></a>
                </div>
                <div class="view view-fourth">
                     <a href="/images/g2.jpg" class="b-link-stripe b-animate-go  swipebox"  title="Image Title"><img src="/images/g2.jpg" alt="" class="img-responsive">
                    <div class="mask">
                          <h3>Medical</h3>
                        <p>A wonderful serenity has taken possession of my entire soul.</p>
                      <span class="gall">More</span>
                    </div></a>
                </div>
                <div class="view view-fourth">
                     <a href="/images/g3.jpg" class="b-link-stripe b-animate-go  swipebox"  title="Image Title"><img src="/images/g3.jpg" alt="" class="img-responsive">
                    <div class="mask">
                          <h3>Medical</h3>
                        <p>A wonderful serenity has taken possession of my entire soul.</p>
                      <span class="gall">More</span>
                    </div></a>
                </div>
                <div class="view view-fourth">
                     <a href="/images/g4.jpg" class="b-link-stripe b-animate-go  swipebox"  title="Image Title"><img src="/images/g4.jpg" alt="" class="img-responsive">
                    <div class="mask">
                          <h3>Medical</h3>
                        <p>A wonderful serenity has taken possession of my entire soul.</p>
                      <span class="gall">More</span>
                    </div></a>
                </div>
                <div class="view view-fourth">
                     <a href="/images/g5.jpg" class="b-link-stripe b-animate-go  swipebox"  title="Image Title"><img src="/images/g5.jpg" alt="" class="img-responsive">
                    <div class="mask">
                          <h3>Medical</h3>
                        <p>A wonderful serenity has taken possession of my entire soul.</p>
                      <span class="gall">More</span>
                    </div></a>
                </div>
                <div class="view view-fourth">
                     <a href="/images/g6.jpg" class="b-link-stripe b-animate-go  swipebox"  title="Image Title"><img src="/images/g6.jpg" alt="" class="img-responsive">
                    <div class="mask">
                        <h3>Medical</h3>
                        <p>A wonderful serenity has taken possession of my entire soul.</p>
                      <span class="gall">More</span>
                    </div></a>
                </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div> -->
<!--gallery end here-->
<link rel="stylesheet" href="css/swipebox.css">
	<script src="/js/jquery.swipebox.min.js"></script> 
	    <script type="text/javascript">
			jQuery(function($) {
				$(".swipebox").swipebox();
			});
</script>


<!--advantages start here-->
<!-- <div class="advantages">
	<div class="container">
		<div class="advantages-main">
			 <h3>Our Advantages</h3>
			<div class="col-md-7 advant-left">
				<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue weakness</p>
				<ul>
					<li><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> </span> <a href="#">To take a trivial which of us ever </a></li>
					<li><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> </span> <a href="#">Idea denouncing pleasure praising</a></li>
					<li><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> </span><a href="#">Neque porro quisquam dolorem ipsum </a></li>
					<li><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> </span><a href="#">Quidem facilis expedita distinctio</a></li>
					<li><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> </span> <a href="#">Idea denouncing pleasure praising</a></li>
				</ul>
			</div>
			<div class="col-md-5 advant-right">
				<a href="#"><img src="/images/doctor.png" alt=""></a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div> -->
<!--advantages end here-->
<!--contact start here-->
<!-- <div class="contact" id="contact">
	<div class="container">
		<div class="contact-main">
			<div class="contact-top">
				<h3>Quick Contact</h3>
				<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally pleasure.</p>
			</div>
			<div class="contact-bottom">
			 <form>
				<div class="col-md-6 contact-left">
				   
					<textarea placeholder="Message" required=""></textarea>
					
				</div>
				<div class="col-md-6 contact-right">
					<input type="text" placeholder="Name">
				    <input type="text" placeholder="Email">
					<input type="submit" value="Send">
				
				</div>
			  <div class="clearfix"> </div>
			    </form>
			</div>
		</div>
	</div>
</div> -->
<!--concact end here-->
<!--map start here-->
<!-- <div class="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
</div> -->
<!--map end here-->
<!--footer strat here-->
<div class="footer">
	<div class="container">
		<div class="footer-main">
		   <div class="col-md-4 ftr-grid">
		   	<h4>About Us</h4>
		   	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p>
		   </div>
		   <div class="col-md-4 ftr-grid">
		   	<h4>Address</h4>
		   	<p>Company Office</p>
		   	<p>Perspiciatis unde</p>
		   	<p>Ph:+1285 587 624</p>
		   </div>
		   <div class="col-md-4 ftr-grid">
		   	<h4>Newsletter</h4>
		   	<input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
		   	<input type="submit" value="Subscribe">
		   </div>
		  <div class="clearfix"> </div>
	    </div>
	</div>
	<div class="copy-right">
			<p>© 2016 Healthy Heart. All rights reserved</p>
		</div>
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

					$('.btn-appoinment').on('click', function(e){

							//e.preventDefault;
							//console.log('clicked');
							Lockr.rm('test_id');
							Lockr.rm('slot_id');
							Lockr.rm('slot_time');

							//alert('clicked');

							var test_id = $(this).attr('data-test_id');
							//var test_id = $('.btn-appoinment').attr('data-test_id');
							var slot_id = $(this).attr('data-slot_id');
							var slot_time = $(this).attr('data-slot_time');

							console.log('test: ' + test_id + ' slot: ' + slot_id);

							Lockr.set('test_id', test_id);
							Lockr.set('slot_id', slot_id);
							Lockr.set('slot_time', slot_time);


							location.href='/front/register';
						
					});
				});
			</script>

			<script>
				
				$('#btn-appoinment').on('click', function(e){

					//e.preventDefault;
					var test_id = $('#btn-appoinment').attr('data-test_id');
					var slot_id = $('#btn-appoinment').attr('data-slot_id');

					console.log('test: ' + test_id + ' slot: ' + slot_id);
				});
			</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

</div>
</body>