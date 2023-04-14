<!-- NAVBAR -->
	<script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
	
	<nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky">
		<div class="container">
			<?php
			$site_setting = getSiteSetting();
			// print_r($site_setting->website_logo);
			// die;
				?>
					<img src="{{ asset($site_setting->website_logo) }}" width="40" height="40">
			 <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<i class="mdi mdi-menu"></i>
		</button>
		<?php
		$current_url = Request()->path();
		

	
		?>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
				   <li class="nav-item active">
						<a class="nav-link" href="{{route('home')}}">Home</a>
					</li>
			
					<li class="nav-item">
						<a class="nav-link" href="{{route('data.cms',"services")}}">Services</a>
					</li>
			
					
					<li class="nav-item">
						<a class="nav-link" href="{{route('data.cms',"aboutus")}}">About</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="{{ route("home") . "#price"; }}">Pricing</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route("home") . "#news"; }}">News</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="{{ route("home") . "#contact"; }}">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route("home") . "#price"; }}">Register</a>
					</li>
					
				</ul>
			</div>
		</div>
	</nav>
	