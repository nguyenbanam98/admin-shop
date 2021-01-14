@extends('fontend.layouts.master')
  


  @section('content')
  <section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>Already have an account?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="button button-account" href="{{route('get.login')}}">Login Now</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">

		
					<div class="login_form_inner register_form_inner">
						<h3>Create an account</h3>
						@if(Session::has('success'))
						<div class="alert alert-success" role="alert">
							{{ Session('success') }}
						</div> 
						@endif

						@if(count($errors)>0)
							@foreach($errors->all() as $error)
								<div class="alert alert-danger" role="alert">
									{{ $error }}
								</div>  		
							@endforeach
						@endif
             
						<form class="row login_form" action="{{route('post.register') }}"  id="register_form" method="POST">
              @csrf
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
              </div>
              <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
              </div>
              <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
							</div>
			
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="button button-register w-100">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

  @endsection