@extends('frontend.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/frontend/styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/frontend/styles/cart_responsive.css') }}">
@endpush
@section('category_menu')
    @include('frontend.includes.category_menu')
@endsection
@section('content')

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
                            @foreach ($cart as $item)
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<div class="cart_item_image">
                                        <img src="{{ asset('/public/backend/media/product/'.$item->options->image) ?? ''}}" alt="Cart Image" style="height: 120px;">
                                    </div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Product Name</div>
											<div class="cart_item_text">{{ $item->name }}</div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text">{{ $item->options->color }}</div>
                                        </div>
                                        @if($item->options->size == NULL)
										@else
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">{{ $item->options->size }}</div>
										</div>
										@endif
                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title mt-3">Quantity</div>
                                            <br>
                                            <form method="POST" action="{{ route('cart.product.update', $item->rowId) }}">
                                                @csrf
                                                <input name="qty" style="width: 50px; height:30px;" type="number" value="{{ $item->qty }}">
                                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-square"></i></button>
                                            </form>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">${{ $item->price }}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">${{ $item->price * $item->qty }}</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Action</div>
											<div class="cart_item_text"><a href="{{ route('cart.product.remove', $item->rowId) }}"><i class="fas fa-trash-alt" title="Delete" style="color: red;"></i></a></div>
										</div>
									</div>
								</li>
                            </ul>
                            @endforeach
						</div>
						
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">${{ Cart::Subtotal() }}</div>
							</div>
						</div>

						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">All Delete</button>
							<button type="button" class="button cart_button_checkout">Check Out</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
@push('js')
    <script src="{{ asset('/public/frontend/js/cart_custom.js') }}"></script>
@endpush