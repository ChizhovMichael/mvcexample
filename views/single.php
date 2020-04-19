<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/layouts/header.php';
?>
<div class="mt-5 mb-5">
	<div class="container">
		<div class="mt-5 mb-5">
			<a href="/admin" class="btn btn-secondary">Вернуться обратно</a>
		</div>
		<div class="col-md-6 col-12">
		    <h2>Редактирование</h2>
		    <p>Пожалуйста, введите отредактированные данные для данной задачи.</p>
		    <form action="/edit/<?=$param['id']?>" method="POST">
				<div class="form-group">
					<label for="exampleInputName">Введите имя</label>
					<input type="text" name="task[name]" class="form-control <?php if(@$_SESSION['errors']['name']): ?>is-invalid<?php endif; ?>" id="exampleInputName" placeholder="Введите имя" value="<?=$param['task']['name']?>">
					<?php if(@$_SESSION['errors']['name']): ?>
						<div class="invalid-feedback">
							<?php
							echo $_SESSION['errors']['name'];
							unset($_SESSION['errors']['name']);
							?>
						</div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail">Введите email</label>
					<input type="email" name="task[email]" class="form-control <?php if(@$_SESSION['errors']['email']): ?>is-invalid<?php endif; ?>" id="exampleInputEmail" placeholder="Введите email" value="<?=$param['task']['email']?>">
					<?php if(@$_SESSION['errors']['email']): ?>
						<div class="invalid-feedback">
							<?php
							echo $_SESSION['errors']['email'];
							unset($_SESSION['errors']['email']);
							?>
						</div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label for="exampleInputDescription">Введите описание задачи</label>
					<textarea name="task[description]" class="form-control <?php if(@$_SESSION['errors']['description']): ?>is-invalid<?php endif; ?>" id="exampleFormDescription" rows="3"><?=$param['task']['description']?></textarea>
					<?php if(@$_SESSION['errors']['description']): ?>
						<div class="invalid-feedback">
							<?php
							echo $_SESSION['errors']['description'];
							unset($_SESSION['errors']['description']);
							?>
						</div>
					<?php endif; ?>
				</div>
				<button type="submit" class="btn btn-primary">Отредактировать задачу</button>
			</form>
	    </div>
	</div>
</div>
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/layouts/footer.php';
?>