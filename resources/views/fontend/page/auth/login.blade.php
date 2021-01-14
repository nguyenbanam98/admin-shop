@extends('fontend.layouts.master')
  


  @section('content')
  <section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="button button-account" href="{{route('get.register')}}">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					@if(Session::has('error-login'))
					<div class="alert alert-primary" style="background-color: red;" role="alert">
						{{ Session('error-login') }}
					</div> 
					@endif
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
					
            <form class="row login_form" action="{{ route('post.login') }}" id="contactForm" method="POST">
              @csrf
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="rememberme">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="button button-login w-100">Log In</button>
								<a href="#">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

  @endsection