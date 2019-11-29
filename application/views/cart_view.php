	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
            <?php if (!empty($cart)): ?>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                    <?php foreach ($products as $product): ?>
						<tr id="item<?=$product['id']?>">
							<td class="cart_product">
								<a href="/product/<?=$product['id']?>"><img src="<?=\Components\Product::get_image($product['img'])?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="/product/<?=$product['id']?>"><?=$product['name']?></a></h4>
								<p>Web ID: <?=$product['code']?></p>
							</td>
							<td class="cart_price">
								<p><?=$product['price']?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
                                    <a href="" class="cart_quantity_down" data-id="<?=$product['id']?>"> - </a>
									<input class="cart_quantity_input" id="quantity_input<?=$product['id']?>" type="text" name="quantity" value="<?=$cart[$product['id']]?>" autocomplete="off" size="2">
                                    <a href="" class="cart_quantity_up" data-id="<?=$product['id']?>"> + </a>
								</div>
							</td>
							<td class="cart_total">
								<p>$ <span class="cart_total_price<?=$product['id']?>"><?=$cart[$product['id']]*$product['price']?></span></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" data-id="<?=$product['id']?>" href="/cart/delete/<?=$product['id']?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                    <?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>

							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>

							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>$<span class="subtotal"><?php print_r($total_price); ?></span></span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>$<span class="subtotal"><?=$total_price?></span></span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="/cart/checkout/">Check Out</a>
                    </div>
				</div>
			</div>
		</div>
    <?php else: ?>
    <h4 align="center">Корзина пуста</h4>
        <p align="center"><a href="/catalog/">Перейти к выбору товаров</a></p>
    <?php endif; ?>
    </section><!--/#do_action-->