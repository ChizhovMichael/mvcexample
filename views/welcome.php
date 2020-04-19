<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/layouts/header.php';
?>
<h1 class="text-center mb-5 mt-4">Main page</h1>
<div class="container">
	<div class="row">
		<div class="col-12 col-md-8">
			<div class="d-flex justify-content-start mb-5">
				<a href="?name=asc" class="btn btn-dark btn-sm mr-1 ml-1">Имя &#8593;</a>
				<a href="?name=desc" class="btn btn-dark btn-sm mr-1 ml-1">Имя &#8595;</a>
				<a href="?email=asc" class="btn btn-dark btn-sm mr-1 ml-1">Email &#8593;</a>
				<a href="?email=desc" class="btn btn-dark btn-sm mr-1 ml-1">Email &#8595;</a>
				<a href="?status=asc" class="btn btn-dark btn-sm mr-1 ml-1">Статус задачи &#8593;</a>
				<a href="?status=desc" class="btn btn-dark btn-sm mr-1 ml-1">Статус задачи &#8595;</a>
			</div>
			<div class="row">
				<?php
				if ($param['tasks']) 
				{					
					foreach ($param['tasks'] as $key => $value) 
					{
						include $_SERVER["DOCUMENT_ROOT"] . '/views/components/task.php';	
					}					
				}							
				?>
			</div>
			<div class="text-center">
				<div class="d-inline-block mt-5">
					<?php 
			          // Example of rendering the pagination control with the built-in template.
			          // See below for information about using other templates or custom rendering.

			          echo $param['paginator'];
			        ?>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4">
			<form action="/add/new/task" method="POST">
				<div class="form-group">
					<label for="exampleInputName">Введите имя</label>
					<input type="text" name="task[name]" class="form-control <?php if(@$_SESSION['errors']['name']): ?>is-invalid<?php endif; ?>" id="exampleInputName" placeholder="Введите имя">
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
					<input type="email" name="task[email]" class="form-control <?php if(@$_SESSION['errors']['email']): ?>is-invalid<?php endif; ?>" id="exampleInputEmail" placeholder="Введите email">
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
					<textarea name="task[description]" class="form-control <?php if(@$_SESSION['errors']['description']): ?>is-invalid<?php endif; ?>" id="exampleFormDescription" rows="3"></textarea>
					<?php if(@$_SESSION['errors']['description']): ?>
						<div class="invalid-feedback">
							<?php
							echo $_SESSION['errors']['description'];
							unset($_SESSION['errors']['description']);
							?>
						</div>
					<?php endif; ?>
				</div>
				<button type="submit" class="btn btn-primary">Добавить задачу</button>
			</form>
			<div class="mt-5">
				<?php if(@$_SESSION['user'] != 'admin'): ?>
					<a href="/login" class="btn btn-secondary">Авторизация</a>
				<?php else: ?>
					<a href="/admin" class="btn btn-secondary">В админ панель</a>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/layouts/footer.php';
?>