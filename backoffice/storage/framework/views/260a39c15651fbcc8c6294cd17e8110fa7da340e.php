<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <h1>Lista de Eventos</h1>
    <p class="lead">Lista de Eventos</p>
    <br>
    <div class="container-fluid table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nome do Evento</th>
            <th>Date</th>
            <th>Local</th>
            <th>Descrição</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo $evento->name; ?></td>
              <td><?php echo $evento->date; ?></td>
              <td><?php echo $evento->local; ?></td>
              <td><?php echo $evento->descri; ?></td>

              <!-- coluna de editar eventos -->
             <td>
                <a class="btn btn-default" href="<?php echo e(URL::route('evento.edit', $evento->id)); ?>"><img src="<?php echo e(asset('img/edit.png')); ?>" width="25" height="25"></a>
              </td>

              <!-- coluna de apagar eventos -->
              <td>
                <form action="<?php echo e(route('evento.destroy', $evento->id)); ?>" method="POST">
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
    <p><a href="<?php echo e(URL::route('evento.create')); ?>">Adicionar um evento?</a></p> <!--bem dito seja o Find/Replace entre os programadores #oremosirmãos-->
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>