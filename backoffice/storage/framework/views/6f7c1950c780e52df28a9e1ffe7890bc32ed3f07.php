<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<h1>Adicionar uma novo Disciplina...</h1>
		<p class="lead">Insira toda a informação sobre a Disciplina.</p>
		<hr>
		<form action="<?php echo e(route('disciplina.store')); ?>" method="POST">
		
			<div class="form-group">
				<label for="name" class="control-label">Nome:</label>
				<input type="text" id="name" name="name" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="semester" class="control-label">Semestre:</label>
				<input type="text" id="semester" name="semester" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="prof" class="control-label">Professor:</label>
				<input type="text" id="prof" name="prof" class="form-control" required>
			</div>


			<input type="submit" value="Inserir nova disciplina" class="btn btn-primary">
			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		</form>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>