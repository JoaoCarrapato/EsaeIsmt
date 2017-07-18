<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<h1>Adicionar uma novo Evento...</h1>
		<p class="lead">Insira toda a informação sobre o Evento.</p>
		<hr>
		<form action="<?php echo e(route('evento.store')); ?>" method="POST">
		
			<div class="form-group">
				<label for="name" class="control-label">Nome:</label>
				<input type="text" id="name" name="name" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="date" class="control-label">Data:</label>
				<input type="number" id="date" name="date" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="local" class="control-label">Local:</label>
				<input type="text" id="local" name="local" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="descri" class="control-label">Descrição:</label>
				<input type="text" id="descri" name="descri" class="form-control">
			</div>


			<input type="submit" value="Inserir nova evento" class="btn btn-primary">
			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		</form>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>