<div class="col-12 col-lg-4">
	<div class="card border-<?php echo $value['status'] == 'off' ? 'primary' : 'success' ?> mb-3" style="max-width: 18rem;">
		<?php if(@$_SESSION['user'] == 'admin' && @$value['edit'] == 'yes'): ?>
			<div class="card-header bg-danger text-light">
				Admin Edit
			</div>
		<?php endif; ?>
		<?php if (@$_SESSION['user'] == 'admin'): ?>
			<div class="card-header">
				<?php if($value['status'] == 'off'): ?>
				<a href="/success/<?php echo $key; ?>" class="btn-sm btn btn-outline-primary" style="white-space: normal">Отметить как выполнена</a>
				<?php else: ?>
				<a href="/success/<?php echo $key; ?>" class="btn-sm btn btn-primary disabled" style="white-space: normal">Выполнено</a>
				<?php endif; ?>
			</div>
		<?php else: ?>
			<?php if($value['status'] == 'on'): ?>
				<div class="card-header">
					<div class="btn-sm btn btn-success disabled" style="white-space: normal">Выполнено</div>
				</div>
			<?php endif;?>
		<?php endif; ?>
		<div class="card-body text-<?php echo $value['status'] == 'off' ? 'primary' : 'success' ?>">
			<h5 class="card-title"><?php echo htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8');?></h5>
			<p class="card-text"><?php echo htmlspecialchars($value['description'], ENT_QUOTES, 'UTF-8');?></p>
			<small class="text-muted mt-2">
				Статус:
				<?php 
				if ($value['status'] == 'off') {
					echo 'Не выполнена';
				} else {
					echo 'Выполнена';
				}
				?>

			</small>
		</div>
		<div class="card-footer">
			<small class="text-muted d-flex justify-content-between align-items-center">
				<?php echo htmlspecialchars($value['email'], ENT_QUOTES, 'UTF-8');?>
				<?php if (@$_SESSION['user'] == 'admin' && $_SERVER['REQUEST_URI'] == '/admin'): ?>
					<a href="/task/<?php echo $key; ?>" class="btn-sm btn btn-outline-danger" style="white-space: normal">Edit</a>
				<?php endif; ?>	
			</small>
		</div>
	</div>
</div>