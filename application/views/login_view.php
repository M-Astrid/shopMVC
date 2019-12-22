    <section id="form"><!--form-->
				<div class="col-sm-4 col-sm-offset-1">
                    <?php if ($errors != null): ?>
                        <?php foreach ($errors as $error): ?>
                            <div id="errors" style="color: red;"><li> <?=$error?> </li></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="/login" method="post">
							<input type="email" placeholder="Email Address" name="email" value="<?=@$_POST['email']?>"/>
							<input type="password" placeholder="Password" name="password"/>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
	</section><!--/form-->
    </br>
    </br>
    </br>
    </br>