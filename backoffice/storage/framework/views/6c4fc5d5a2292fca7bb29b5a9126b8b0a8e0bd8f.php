<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ISMT/ESAE</title>
		<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
	</head>

	<body>
		<header>
			<?php echo $__env->make('layouts.includes.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</header>

		<main>

			<div class="container-fluid">
				<?php if($errors->any()): ?>
					<div class="alert alert-danger">
						<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<p><?php echo e($error); ?></p>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="container-fluid">
				<?php if(session('flash_message')): ?>
			    	<div class="alert alert-success">
			    		<?php echo e(session('flash_message')); ?>

			    	</div>
				<?php endif; ?>
			</div>

			<?php echo $__env->yieldContent('content'); ?>
		</main>

		<footer class="footer navbar-inverse navbar-fixed-bottom">

		</footer>

		<script src="<?php echo e(asset('js/jquery-3.1.1.min.js')); ?>"></script>
		<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
	</body>
</html>
