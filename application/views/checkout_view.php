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
							<h4>Укажите информацию о себе</h4>
                            <br>
							<form class="signup-form" action="/cart/checkout/" method="post">
                                <input id="shopper-info-input" type="text" placeholder="Имя" name="username" value="<?=$username?>">
                                <input id="shopper-info-input" type="tel" placeholder="Телефон" name="tel" value="<?=$_POST['tel']?>">
                                <input id="shopper-info-input" type="text" size="" placeholder="Комментарий к заказу" name="comment" value="<?=$_POST['comment']?>">
                                <div/>
<br>
<br>
<br>
                                <section id="do_action">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="total_area">
                                    <ul>
                                        <li>Кол-во товаров в корзине: <span><?=\Components\Cart::count_items()?></span></li>
                                        <li>Итоговая сумма: <span>$<span class="subtotal"><?=$total_price?></span></span></li>
                                    </ul>
                                    <button class="btn btn-default check_out" type="submit">Оформить заказ.</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <br>

							</form>

            <br>
            <br>
        </div>