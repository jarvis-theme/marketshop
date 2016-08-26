							<div id="cart">
								<button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle">
								<span class="cart-icon pull-left flip"></span>
								<span id="cart-total">{{ Shpcart::cart()->total_items() }} item(s) - {{ price(Shpcart::cart()->total() )}}</span></button>
								<ul class="dropdown-menu">
									@if(Shpcart::cart()->total_items() > 0)
									<li>
										<table class="table">
											<tbody>
												@foreach (Shpcart::cart()->contents() as $key => $cart)
												<tr>
													<td class="text-center"><a href="{{ URL::to('produk/'.@$cart['slug']) }}"><img class="img-thumbnail" title="{{ $cart['name'] }}" alt="{{ $cart['name'] }}" src="{{ product_image_url($cart['image'],'thumb') }}" style="max-width: 50px; max-height: 50px"></a></td>
													<td class="text-left"><a href="{{ URL::to('produk/'.@$cart['slug']) }}">{{ $cart['name'] }}</a></td>
													<td class="text-right">x {{ $cart['qty'] }}</td>
													<td class="text-right">{{ price($cart['price']) }}</td>
													<td class="text-center"><button class="btn btn-danger btn-xs remove" title="Remove" onClick="{{'javascript:deletecartdialog('."'".$cart['rowid']."'".')'}}" type="button"><i class="fa fa-times"></i></button></td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</li>
									<li>
										<div>
											<table class="table table-bordered">
												<tbody>
													<!-- <tr>
														<td class="text-right"><strong>Sub-Total</strong></td>
														<td class="text-right">$940.00</td>
													</tr>
													<tr>
														<td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
														<td class="text-right">$4.00</td>
													</tr>
													<tr>
														<td class="text-right"><strong>VAT (20%)</strong></td>
														<td class="text-right">$188.00</td>
													</tr> -->
													<tr>
														<td class="text-right"><strong>Total</strong></td>
														<td class="text-right">{{ price(Shpcart::cart()->total() )}}</td>
													</tr>
												</tbody>
											</table>
											<p class="checkout">
												<!-- <a href="cart.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> View Cart</a>&nbsp;&nbsp;&nbsp; -->
												<a href="{{url('checkout')}}" class="btn btn-primary"><i class="fa fa-share"></i> Checkout</a>
											</p>
										</div>
									</li>
									@else
									<li>
										<h5><center><i>Your shopping cart is empty</i></center></p>
									</li>
									@endif
								</ul>
							</div>
