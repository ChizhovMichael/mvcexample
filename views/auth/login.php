<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/layouts/header.php';
?>
<div class="mt-5 mb-5">
	<div class="container">
		<div class="col-md-6 col-12">
		    <h2>Login</h2>
		    <p>Пожалуйста, введите свои учетные данные для входа в систему.</p>
		    <form action="/login/admin" method="post">
		        <div class="form-group">
		            <label>Username</label>
		            <input type="text" name="user[username]" class="form-control <?php if(@$_SESSION['errors']['username']): ?>is-invalid<?php endif; ?>" placeholder="Enter username">
		            <?php if(@$_SESSION['errors']['username']): ?>
						<div class="invalid-feedback">
							<?php
							echo $_SESSION['errors']['username'];
							unset($_SESSION['errors']['username']);
							?>
						</div>
					<?php endif; ?>
		        </div>    
		        <div class="form-group">
		            <label>Password</label>
		            <input type="password" name="user[password]" class="form-control <?php if(@$_SESSION['errors']['password']): ?>is-invalid<?php endif; ?>" placeholder="Enter password">
		            <?php if(@$_SESSION['errors']['password']): ?>
						<div class="invalid-feedback">
							<?php
							echo $_SESSION['errors']['password'];
							unset($_SESSION['errors']['password']);
							?>
						</div>
					<?php endif; ?>
		        </div>
		        <div class="form-group">
		            <button type="submit" class="btn btn-primary">Login</button>
		        </div>
		    </form>
	    </div>
	</div>
</div>
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/layouts/footer.php';
?>