	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

            <?php if ($errors != null): ?>
                <?php foreach ($errors as $error): ?>
                    <div id="errors" style="color: red;"><li> <?=$error?> </li></div>
                <?php endforeach; ?>
            <?php endif; ?>

						<div class="shopper-info">
							<p>1) Укажите информацию о себе</p>
							<form class="user-form" action="/cart/checkout/" method="post">
                                <input type="text" placeholder="Имя" name="username" value="<?=$username?>">
                                <input type="tel" placeholder="Телефон" name="tel" value="<?=$_POST['tel']?>">
                                <input type="text" size="" placeholder="Комментарий к заказу" name="comment" value="<?=$_POST['comment']?>">
                                <button type="submit">Submit</button>
							</form>
                        </div>


            </br><div class="review-payment">
				<h2>2) Проверьте выбранные товары и подтвердите заказ</h2>
			</div>

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
                                <a href="/product/<?=$product['id']?>"><img src="/images/shop/<?=$product['img']?>" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="/product/<?=$product['id']?>">Colorblock Scuba</a></h4>
                                <p>Web ID: <?=$product['code']?></p>
                            </td>
                            <td class="cart_price">
                                <p><?=$product['price']?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a href="" class="cart_quantity_down" data-id="<?=$product['id']?>"> - </a>
                                    <input class="cart_quantity_input" id="quantity_input<?=$product['id']?>" type="text" name="quantity" value="<?=$_SESSION['products'][$product['id']]?>" autocomplete="off" size="2">
                                    <a href="" class="cart_quantity_up" data-id="<?=$product['id']?>"> + </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p>$ <span class="cart_total_price<?=$product['id']?>"><?=$_SESSION['products'][$product['id']]*$product['price']?></span></p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" data-id="<?=$product['id']?>" href="/cart/delete/<?=$product['id']?>"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td class="subtotal"><?=$total_price?></td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span class="subtotal"><?=$total_price?></span></td>
									</tr>
                                    <tr>
										<td><span>
                            <button class="btn btn-primary" type="submit">Оформить заказ</button></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
        </div>
	</section> <!--/#cart_items-->
    <script>
        $.(document).ready(function () {
            $.(".check_out").click(function () {
                $.(".user-form").submit();
            })
        })
    </script>