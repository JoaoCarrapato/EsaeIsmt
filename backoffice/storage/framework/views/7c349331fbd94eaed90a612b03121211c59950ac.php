<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<h1>Editar "<?php echo e($disciplina->name); ?>"</h1>
		<p class="lead">Edite a informação.</p>
		<hr>
		<form action="<?php echo e(route('disciplina.update', $disciplina->id)); ?>" method="POST">
			<input type="hidden" name="_method" value="PUT">

			<div class="form-group">
				<label for="id" class="control-label">Id:</label>
				<input type="text" id="id" name="id" class="form-control" value="<?php echo e($disciplina->id); ?>" readonly> <!--readonly porque nao se pode mudar o id e se tentar mudar da berro-->
			</div>

			<div class="form-group">
				<label for="name" class="control-label">Nome:</label>
				<input type="text" id="name" name="name" class="form-control" value="<?php echo e($disciplina->name); ?>" required>
			</div>

			<div class="form-group">
				<label for="semester" class="control-label">Semestre:</label>
				<input type="text" id="semester" name="semester" class="form-control" value="<?php echo e($disciplina->semester); ?>" required>
			</div>

			<div class="form-group">
				<label for="prof" class="control-label">Professor:</label>
				<input type="text" id="prof" name="prof" class="form-control" value="<?php echo e($disciplina->prof); ?>">
			</div>

			<input type="submit" value="Guardar" class="btn btn-primary">
			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		</form>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>