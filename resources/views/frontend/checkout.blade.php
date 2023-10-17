@extends('frontend.layout.header')
@section('title')
checkout
@endsection()
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="home-slider owl-carousel">
	@foreach($sliders as $slider)
	<div class="slider-item" style="background-image: url('/images/{{$slider->image}}')">
	  <div class="overlay"></div>
	<div class="container">
	  <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

		<div class="col-md-12 ftco-animate text-center">
		  <h1 class="mb-2">{{$slider->premiereDescription}}</h1>
		  <h2 class="subheading mb-4">{{$slider->deuxiemeDescription}}</h2>
		  <p><a href="#" class="btn btn-primary">View Details</a></p>
		</div>

	  </div>
	</div>
  </div>

 @endforeach
</div> 
<form action="{{route('commandes.store')}}" method="POST"  class="billing-form" enctype="multipart/form-data">
	@csrf  
<section class="ftco-section">
	<div class="container">
	  <div class="row justify-content-center">
		<div class="col-xl-7 ftco-animate">
					 
					
						
						  <h3 class="mb-4 billing-heading">Completez les informations</h3>
				<div class="row align-items-end">
					<div class="col-md-6">
				  <div class="form-group">
					  <label for="firstname">Nom</label>
					<input type="text" class="form-control" name="nomClient" placeholder="">
				  </div>
				</div>
				  </div>
				  <div class="w-100"></div>
				  <div class="col-md-6">
				  <div class="form-group">
					  <label for="phone">Phone</label>
					<input type="text" class="form-control" placeholder="" name="Phone">
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
					  <label for="emailaddress">Email</label>
					<input type="text" class="form-control" placeholder="" name="email">
				  </div>
			  </div>
			  
		
				  </div>
				  <div class="col-xl-5">
			<div class="row mt-5 pt-3">
				<div class="col-md-12 d-flex mb-5">
					<div class="cart-detail cart-total p-3 p-md-4">
						
						<h3 class="billing-heading mb-4">Cart Total</h3>
						@php $total=0 @endphp
						@foreach($cart as $panier)
							@php $total += $panier['prix'] * $panier['quantity'] @endphp
						<p class="d-flex">
								  <span></span>
								  <span></span>
							  </p>
							  <p class="d-flex">
								  
								  <input type="text" name="nomProduit" value="{{$panier['name']}}" 
								  style="border: none; background-color: white;">
								 
									<span><input type="text" name="qteProduit" value="{{$panier['quantity']}}" disabled style="border: none; background-color: white;"></span> 
							  </p>
							  @endforeach
							  <hr>
							  <p class="d-flex total-price">
								<p class="d-flex">
									<span>TOTAL</span>
									<span>  <span> <input type="total" name="total" value="{{$total}} "  style="border: none; background-color: white;"> AR</span></span>
								</p>
								
							  </p>
							
							</div>
						</div>
						<button  type="submit" class="btn btn-lg btn-info btn-block">
                                                   
						Commander
						   
						</button>
			
			</div>
		</div> <!-- .col-md-8 -->
	  </div>
	</div>
</form><!-- END -->
  </section> <!-- .section -->
 
  
 
@endsection()