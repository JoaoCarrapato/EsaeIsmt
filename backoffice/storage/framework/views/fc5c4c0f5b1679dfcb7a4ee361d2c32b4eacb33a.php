<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<h1>Adicionar um novo Documento...</h1>
		<p class="lead">Insira toda a informação sobre o Documento.</p>
		<hr>
		<form action="<?php echo e(route('documento.store')); ?>" method="POST">
		
			<div class="form-group">
				<label for="name" class="control-label">Nome:</label>
				<input type="text" id="name" name="name" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="type" class="control-label">Tipo de Documento:</label>
				<input type="text" id="type" name="type" class="form-control" required>
			</div>

			<input type="submit" value="Inserir novo documento" class="btn btn-primary">
			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		</form>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>