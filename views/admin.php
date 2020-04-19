<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/layouts/header.php';
?>
<h1 class="text-center mb-5 mt-4">Admin Panel</h1>
<div class="container">
	<div class="row">
		<div class="col-12 col-md-8">
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
		</div>
		<div class="col-12 col-md-4">
			<div class="mt-5">
				<a href="/logout" class="btn btn-secondary col-12">Выйти</a>
			</div>
		</div>
	</div>
</div>
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/layouts/footer.php';
?>