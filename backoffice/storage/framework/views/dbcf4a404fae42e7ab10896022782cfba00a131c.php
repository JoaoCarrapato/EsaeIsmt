<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<h1>Editar cliente "<?php echo e($curso->id); ?>"</h1>
		<p class="lead">Edite a informação pretendida.</p>
		<hr>
		<form action="<?php echo e(route('curso.update', $curso->id)); ?>" method="POST">
			<input type="hidden" name="_method" value="PUT">

			<div class="form-group">
				<label for="id" class="control-label">Id:</label>
				<input type="text" id="id" name="id" class="form-control" value="<?php echo e($curso->id); ?>" readonly> <!--readonly porque nao se pode mudar o id e se tentar mudar da berro-->
			</div>

			<div class="form-group">
				<label for="name" class="control-label">Nome:</label>
				<input type="text" id="name" name="name" class="form-control" value="<?php echo e($curso->name); ?>" required>
			</div>

			<div class="form-group">
				<label for="type" class="control-label">Tipo de Curso:</label>
				<input type="text" id="type" name="type" class="form-control" value="<?php echo e($curso->type); ?>" required>
			</div>

			<div class="form-group">
				<label for="ects" class="control-label">ECTS:</label>
				<input type="number" id="ects" name="ects" class="form-control" value="<?php echo e($curso->ects); ?>" required>
			</div>

			<div class="form-group">
				<label for="descri" class="control-label">Descrição:</label>
				<input type="text" id="descri" name="descri" class="form-control" value="<?php echo e($curso->descri); ?>">
			</div>

			<input type="submit" value="Guardar" class="btn btn-primary">
			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		</form>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>