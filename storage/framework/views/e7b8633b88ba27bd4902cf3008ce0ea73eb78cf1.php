<?php $__env->startSection('content'); ?>

  <div class="container my-5 flex-fill">
    <div class="row justify-content-center">
      <div class="col-md-11">
        <form action="" method="post">
          <?php echo csrf_field(); ?>
          <div class="card">
            <div class="card-body">
              <h3>Профиль</h3>
              <div class="row mb-3">
                <label class="col-sm-6 col-form-label">Имя</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="name" value="<?php echo e(auth()->user()->name); ?>" required>
                </div>
              </div>
              <div class="row mb-3">
                <p class="col-sm-6 col-form-label">Email</p>
                <div class="col-sm-6">
                  <label class="col-form-label"><?php echo e(auth()->user()->email); ?></label>
                </div>
              </div>
              <div class="d-grid gap-2 d-md-block">
                <a href="/" class="btn btn-dark">Главная</a>
                <button type="submit" class="btn btn-dark">Обновить</button>
                <a href="/profile/password" class="btn btn-dark">Изменить пароль</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/auth/profile.blade.php ENDPATH**/ ?>