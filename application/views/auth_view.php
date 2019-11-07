<?php if ($register_successful): ?>
    <h4 align="center">Вы успешно зарегистрированы!</h4>
<?php else: ?>
    <section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
                    <?php if ($errors != null): ?>
                        <?php foreach ($errors as $error): ?>
                            <div id="errors" style="color: red;"><li> <?=$error?> </li></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="/auth/login" method="post">
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
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
                    <?php if ($errors != null): ?>
                    <?php foreach ($errors as $error): ?>
                    <div id="errors" style="color: red;"><li> <?=$error?> </li></div>
                    <?php endforeach; ?>
                    <?php endif; ?>
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="/auth/signup" method="post">
							<input type="text" placeholder="Name" name="username" value="<?=@$_POST['username']?>"/>
							<input type="email" placeholder="Email Address" name="email" value="<?=@$_POST['email']?>"/>
							<input type="password" placeholder="Password" name="password"/>
							<input type="password" placeholder="Password" name="password_2"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
                    </div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
    <?php endif; ?>