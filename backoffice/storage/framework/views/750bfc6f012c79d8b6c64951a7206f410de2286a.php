<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <h1>Lista de Cursos</h1>
    <p class="lead">Lista de Cursos</p>
    <br>
    <div class="container-fluid table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nome do Curso</th>
            <th>Tipo de Curso</th>
            <th>ECTS</th>
            <th>Descrição</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo $curso->name; ?></td>
              <td><?php echo $curso->type; ?></td>
              <td><?php echo $curso->ects; ?></td>
              <td><?php echo $curso->descri; ?></td>
              
              <!-- coluna de editar cursos -->
             <td>
                <a class="btn btn-default" href="<?php echo e(URL::route('curso.edit', $curso->id)); ?>"><img src="<?php echo e(asset('img/edit.png')); ?>" width="25" height="25"></a>
              </td>

              <!-- coluna de apagar cursos -->
              <td>
                <form action="<?php echo e(route('curso.destroy', $curso->id)); ?>" method="POST">
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
    <p><a href="<?php echo e(URL::route('curso.create')); ?>">Adicionar um curso?</a></p>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>