<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->

	<!-- App -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Make your reservation for {{ $time }}</h1>
							<p>
								This Gas Station Reservation System is desgined 
								to organize and decrese the number of traffic jams per day
							</p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form action="{{ route('reservation.store') }}" method="POST">
								@csrf
								<!-- Success message -->
								@if(session('status'))
									<div class="alert alert-success">
										{{ session('status') }}
									</div>
								@endif
								<!-- Full name -->
								<x-input key="name" name="Full Name" class="col-md-12 mb-3" />
								<!-- Job -->
								<x-input key="job" name="Job" class="col-md-12 mb-3" />
								
								<div class="form-group">
									{{-- Select Box --}}
									<span class="form-label">Choose a time:</span> 
									<select name="time" id="time">
										<option value="{{ $time }}">{{ $time }}</option>
									</select>
								</div>
								<!-- Make a reservation -->
								<div class="form-btn">
									<button type="submit" class="submit-btn">Make a reservation</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->


<!-- Mix -->
<script src="{{ mix('js/app.js') }}"></script>

<script>
	// Select2
	$('select').select2({
		width: '100%'
	});
</script>

</html>