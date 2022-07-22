<?php $__env->startSection('content'); ?>

  <div class="container my-5 flex-fill">
    <div class="row justify-content-center">
      <div class="col-md-11">
        <form action="/admin/genre" method="POST">
          <?php echo csrf_field(); ?>
          <div class="card">
            <div class="card-body">
              <h3>Добавить жанр</h3>
              <div class="row mb-3">
                <label class="col-sm-6 col-form-label">Название</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="name" required>
                </div>
              </div>
              <button type="submit" class="btn btn-dark col-sm-4">Добавить</button>
            </div>
          </div>
        </form>
        <table class="table">
          <thead>
          <tr>
            <th scope="col">Название</th>
            <th scope="col">Действие</th>
          </tr>
          </thead>
          <tbody>
          <?php if($genres): ?>
            <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($genre->name); ?></td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <a href="/genre/<?php echo e($genre->id); ?>/admin" class="btn btn-dark">Детали</a>
                    <form action="/genre/<?php echo e($genre->id); ?>/admin" method="POST" class="d-inline-block">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                  </div>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/admin/manage_genre.blade.php ENDPATH**/ ?>