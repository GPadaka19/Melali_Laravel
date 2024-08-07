<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="home.css">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" type="text/css" >

	<!-- boxicons -->
	<link rel="stylesheet"
  	href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  	<!-- remixicons -->
  	<link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"/>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet">

	<title>Melali: Home</title>
</head>
<body class="bg-gray-100">
    <div class="overflow-x-auto mx-auto mt-8 max-w-lg rounded-lg bg-white p-5 shadow-lg">
        <h1 class="mb-4 text-3xl font-bold text-center text-gray-800">Home</h1>
	<!-- header -->
	<header>
		<a href="#" class="logo">
			<img src="img/logo-trans.png" class="navbar-logo">
		</a>

		<ul class="navlist">
			<li><a href="#home">Home</a></li>
			<li><a href="#about">About</a></li>
			<li><a href="#destinations">Destinations</a></li>
			<li><a href="#testimonial">Testimonial</a></li>
			<li><a href="{{ route('mytickets') }}">My Ticket</a></li>
		</ul>

		<div class="h-right">
			<a href="{{ route('actionlogout') }}" class="h-btn" style="display: flex; align-items: center;">
				<span style="margin-right: 5px;">Log Out</span>
				<img src="img/logout.png" style="width: 16px; height: 19px;">
			</a>
			<div class="bx bx-menu" id="menu-icon">
			</div>
		</div>
	</header>

	<!-- home section -->
	<section class="home" id="home">
		<div class="home-text">
			<h1>Discover the Best Lovely Places</h1>
			<p>Plan and book your perfect trip with expert advice, travel tips, destination information and inspiration from us</p>
			<div class="button">
				<a href="#" class="btn">Explore</a>
				<a href="#" class="btn2"><span><i class="ri-play-mini-fill"></i></span>Watch View</a>
			</div>
		</div>

		<div class="home-img">
			<img src="img/hero.png">
		</div>
	</section>


	<!-- category section -->
	<section class="category">
		<div class="category-content">
			<div class="row">
				<img src="img/row1.png">
				<h4>Nature</h4>
			</div>

			<div class="row">
				<img src="img/row2.png">
				<h4> History</h4>
			</div>

			<div class="row">
				<img src="img/row3.png">
				<h4>Flora & Fauna</h4>
			</div>

		</div>
	</section>

	<!-- about section -->
	<section class="about" id="about">
		<div class="about-img">
			<img src="img/about.png">
		</div>

		<div class="about-text">
			<span>Our Experience</span>
			<h2>Our Stories Have Adventure</h2>
			<p>We are experienced in bringing adventures to stay their journey, with all outdoor destinations in the world as our specialties. Start your adventure now! Nature has already called you!</p>
			<div class="about-box">
				<div class="box-in">
					<div class="main-box">
						<h5>12k+</h5>
						<h6>Success Journey</h6>
					</div>
				</div>

								<div class="box-in">
					<div class="main-box">
						<h5>16+</h5>
						<h6>Awards Winning</h6>
					</div>
				</div>

					<div class="box-in">
					<div class="main-box">
						<h5>20+</h5>
						<h6>Years of Experience</h6>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- destination section -->
<section class="destinations" id="destinations">
    <div class="center-text">
        <h2>Destination</h2>
        <p>Here are lots of interesting destinations to visit</p>
    </div>
    
		<div class="destination">
		@foreach($destinations as $destination)
		<div class="box">
			<img src="/img/{{ $destination->picture }}">
			<h3>{{ $destination->name }}</h3>
			<h6>{{ $destination->address }}</h6>
			<div class="box-main">
				<div class="box-text">
					<h5>Start From</h5>
					<h5>Rp {{ number_format($destination->price, 0, ',', '.') }}</h5>
				</div>
				<div class="box-btn">
				<a href="{{ route('booking', ['destination' => $destination->name]) }}" class="bxx-btn"> Book Now</a>
				</div>
			</div>
		</div>
		@endforeach
		</div>
</section>


	<!-- testimonial section -->
	<section class="testimonial" id="testimonial">
		<div class="testimonial-img">
			<img src="img/tst.jpg">
		</div>

		<div class="testimonial-text">
			<h2>TestiMONEY:</h2>
			<div class="tst-in">
				<p>Melali helped me a lot in finding the best place for our first outdoor adventure trip. They responded very quickly and gave me a detailed account of the place's history. As well as it's the best features.</p>
				<div class="tst-star">
					<a href="#"><i class="ri-star-fill"></i></a>
					<a href="#"><i class="ri-star-fill"></i></a>
					<a href="#"><i class="ri-star-fill"></i></a>
					<a href="#"><i class="ri-star-fill"></i></a>
					<a href="#"><i class="ri-star-fill"></i></a>
				</div>

				<div class="tst-main">
					<div class="tst-text">
						<h4>Werner Vogels</h4>
						<h6>CTO of Amazon.com</h6>
					</div>

					<div class="tst-icon">
						<i class="ri-arrow-right-double-fill"></i>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- contact section -->
	<!-- <section class="contact" id="contact">
		<div class="contact-content">
			<h3>Let's start booking an adventure</h3>
			<p>We will contact you to confirm your booking</p>
			<form action="book">
				<div class="input-box">
					<i class="ri-phone-fill"></i>
					<input type="tel" name="" placeholder="Your Number" id="">
				</div>

				<div class="input-box">
					<i class="ri-user-3-fill"></i>
					<input type="number" name="" placeholder="People" id="">
				</div>

				<a href="#" class="book-btn"> Book Now</a>

			</form>
		</div>
	</section> -->
	<!-- footer section -->
	<section class="footer">
		<div class="footer-box" id="footer">
			<a href="#" class="footer-logo">
				<img src="img/logo.png">
			</a>

			<p>Enjoy the tour <br> with Melali</p>

			<div class="social-link">
				<a href="#"><i class="ri-facebook-fill"></i></a>
				<a href="#"><i class="ri-instagram-fill"></i></a>
				<a href="#"><i class="ri-twitter-x-fill"></i></a>
			</div>
		</div>

		<div class="footer-box">
			<h3>Resources</h3>
			<a href="#">Download</a>
			<a href="#">Help Center</a>
			<a href="#">Guide Book</a>
			<a href="#">App Directory</a>
		</div>

		<div class="footer-box">
			<h3>Travellers</h3>
			<a href="#">Why Travellers</a>
			<a href="#">Help Center</a>
			<a href="#">Guide Book</a>
			<a href="#">App Directory</a>
		</div>

		<div class="footer-box">
			<h3>Company</h3>
			<a href="#">Download</a>
			<a href="#">Help Center</a>
			<a href="#">Guide Book</a>
			<a href="#">App Directory</a>
		</div>

		<div class="footer-box">
			<h3>Get App</h3>
			<a href="#">App</a>
			<a href="#">Store</a>
			<a href="#">Help Center</a>
		</div>
	</section>

	<div class="end-content">
		<div class="end-text">
			<p>© Melali 2024</p>
		</div>

		<div end-img>
			<img src="img/card.png">
		</div>
	</div>
	<!-- JS -->
	<script src="js\script-home.js"></script>
</body>
</html>