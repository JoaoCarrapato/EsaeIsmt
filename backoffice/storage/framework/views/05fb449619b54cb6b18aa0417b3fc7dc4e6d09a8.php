<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <h1>Lista de finanças</h1>
    <p class="lead">Lista de finanças</p>
    <br>
    <div class="container-fluid table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Data</th>
            <th>Valor</th>
            <th>Pago?</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          <?php $__currentLoopData = $financas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $financa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo $financa->date; ?></td>
              <td><?php echo $financa->price; ?></td>
              <td><?php echo $financa->paid; ?></td>

              <!-- coluna de editar financas -->
             <td>
                <a class="btn btn-default" href="<?php echo e(URL::route('financa.edit', $financa->id)); ?>"><img src="<?php echo e(asset('img/edit.png')); ?>" width="25" height="25"></a>
              </td>

              <!-- coluna de apagar financas -->
              <td>
                <form action="<?php echo e(route('financa.destroy', $financa->id)); ?>" method="POST">
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger">
                    <img src="<?php echo e(asset('img/delete.png')); ?>" width="25" height="25">
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
    <p><a href="<?php echo e(URL::route('financa.create')); ?>">Adicionar uma Propina/Multa?</a></p> <!--bem dito seja o Find/Replace entre os programadores #oremosirmãos-->
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>