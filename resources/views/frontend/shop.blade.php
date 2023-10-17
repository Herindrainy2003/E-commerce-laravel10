@extends('frontend.layout.header')
@section('title')
Shop
@endsection()
@section('content')
  
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

    <section class="ftco-section">
    	<div class="container">
    	
			<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					
					<ul class="product-category">
    					<li><a href="{{URL::to('/shop')}}" class="{{(request()->is('shop')?'active':'')}}">Tout</a></li>
							@foreach($categories as $category)
							<li><a href="/selectionParCategories/{{$category->nomcategorie}}" class="{{(request()->is('selectionParCategories/'.$category->nomcategorie)?'active':'')}}" >{{$category->nomcategorie}}</a></li>
							@endforeach
    					
    				
    			
    				</ul>
    			</div>
    		</div>
			
    		<div class="row">
				@foreach($produit as $produits)
    			<div class="col-md-6 col-lg-3 ftco-animate">
    			
					<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="/images/{{$produits->image}}" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">{{$produits->nomProduit}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>{{$produits->prixProduit}} Ariary</span></p>
		    					</div>
	    					</div>
    						<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="ajouterCart/{{$produits->id}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
				
    			</div>
    			
				@endforeach
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
   @endsection()