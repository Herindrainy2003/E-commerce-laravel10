@extends('frontend.layout.header')

@section('title')
Cart
@endsection()
@section('content')


    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{URL::to('/')}}">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

	<section class="ftco-section ftco-cart">
		<div class="container">
			<div class="row">
			<div class="col-md-18 ftco-animate">
				<div class="cart-list">
				<table id="cart" class="table table-hover table-condensed">

   		 <thead class="thead-primary">

        <tr class="text-center">

            <th>&nbsp;</th>
			 <th>Imageproduit</th>
			<th>Nom produit</th>
			 <th>Prix</th>
			<th>Quantite</th>
			 <th>Total</th>

        </tr>

    </thead>

  
	<tbody>

		@php $total = 0 @endphp

		@if(session('cart'))

			@foreach(session('cart') as $id => $details)

			
				@php $total += $details['prix'] * $details['quantity'] @endphp

				<tr data-id="{{ $id }}">

					    <td>

							<button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
					    </td>
					

						<td>

							<div class="col-sm-3 hidden-xs"><img src="/images/{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
						</td>
							<td data-th="Product"><div class="col-sm-9">

								<h4 class="nomargin">{{ $details['name'] }}</h4>

							</div>
						</td>
						</div>

					<td data-th="prix">Ariary {{$details['prix']}}</td>

					<td data-th="Quantity">

						<input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />

					</td>

					<td data-th="Subtotal" class="text-center">Ariary  {{ $details['prix'] * $details['quantity'] }}</td>

					

				</tr>

			@endforeach

		@endif

	</tbody>

	<tfoot>

		<tr>

			<td colspan="5" class="text-right"><h3><strong>Total Ariary  {{ $total }}</strong></h3></td>

		</tr>

		<tr>

			<td colspan="5" class="text-right">

				<a href="{{url('/shop')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>

				<a class="btn btn-success" href="{{url('/checkout')}}">Checkout</a>

			</td>

		</tr>

	</tfoot>


</table>

					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Coupon Code</h3>
    					<p>Enter your coupon code if you have one</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Coupon code</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Estimate shipping and tax</h3>
    					<p>Enter your destination to get a shipping estimate</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Country</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">State/Province</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">Zip/Postal Code</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>{{ $details['name'] }}</span>
							<span>{{ $details['quantity'] }}</span>
    						<span> {{ $details['prix'] * $details['quantity'] }}</span>
    					</p>
    					
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>{{$total}}</span>
    					</p>
    				</div>
    				<form id="stripe-form">
					<p><a href="{{URL::to('/checkout')}}" class="btn btn-primary py-3 px-4">Commander
					</a></p>
					</form>
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
	

	<script type="text/javascript">
	
		$(".update-cart").change(function (e) {
	
			e.preventDefault();
	
	  
	
			var ele = $(this);
	
	  
	
			$.ajax({
	
				url: '{{ route('update.cart') }}',
	
				method: "patch",
	
				data: {
	
					_token: '{{ csrf_token() }}', 
	
					id: ele.parents("tr").attr("data-id"), 
	
					quantity: ele.parents("tr").find(".quantity").val()
	
				},
	
				success: function (response) {
	
				   window.location.reload();
	
				}
	
			});
	
		});
	
	  
	
		$(".remove-from-cart").click(function (e) {
	
			e.preventDefault();
	
	  
	
			var ele = $(this);
	
	  
	
			if(confirm("Are you sure want to remove?")) {
	
				$.ajax({
	
					url: '{{ route('remove.from.cart') }}',
	
					method: "DELETE",
	
					data: {
	
						_token: '{{ csrf_token() }}', 
	
						id: ele.parents("tr").attr("data-id")
	
					},
	
					success: function (response) {
	
						window.location.reload();
	
					}
	
				});
	
			}
	
		});
	
	  
	
	</script>
	
    
 @endsection()