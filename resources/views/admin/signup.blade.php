
@extends('admin.layoutlogin')
@section('title')
Sign Up
@endsection
@section('contenu')
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form action="{{route('/creerCompte')}}"  class="login100-form validate-form" method="POST">
					@csrf
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Entrez votre Nom">
						<input class="input100" type="text" name="nom" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="entrez votre mot de passe">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="confirmez votre mot de passe">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

                    <a class="txt1" href="{{URL::to('/login')}}">
                       Avez-vous deja de compte
                    </a>	

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							S'iscrire
						</button>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
@endsection()