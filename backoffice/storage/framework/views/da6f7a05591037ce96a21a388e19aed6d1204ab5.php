<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<h1>Editar "<?php echo e($user->name); ?>"</h1>
		<p class="lead">Edite a informação.</p>
		<hr>
		<form action="<?php echo e(route('user.update', $user->id)); ?>" method="POST">
			<input type="hidden" name="_method" value="PUT">

			<div class="form-group">
				<label for="id" class="control-label">Id:</label>
				<input type="number" id="id" name="id" class="form-control" value="<?php echo e($user->id); ?>" readonly> <!--readonly porque nao se pode mudar o id e se tentar mudar da berro-->
			</div>

			<div class="form-group">
				<label for="name" class="control-label">Nome:</label>
				<input type="text" id="date" name="date" class="form-control" value="<?php echo e($user->name); ?>" required>
			</div>

			<div class="form-group">
				<label for="curso" class="control-label">Curso:</label>
				<input type="text" id="curso" name="curso" class="form-control" value="<?php echo e($user->curso); ?>" required>
			</div>

			<div class="form-group">
				<label for="photo" class="control-label">Foto:</label>
				<input type="text" id="photo" name="photo" class="form-control" value="<?php echo e($user->photo); ?>">
			</div>

			<div class="form-group">
				<label for="type" class="control-label">Tipo de Utilizador:</label>
				<input type="text" id="type" name="type" class="form-control" value="<?php echo e($user->type); ?>" required>
			</div>

			<input type="submit" value="Guardar" class="btn btn-primary">
			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		</form>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>