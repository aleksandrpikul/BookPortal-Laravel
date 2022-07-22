<?php $__env->startSection('content'); ?>

    <div class="container my-5 flex-fill">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-body">
                        <form action="/user/<?php echo e($user->id); ?>/admin" method="POST">
                            <?php echo csrf_field(); ?>
                            <h3><?php echo e($user->name); ?></h3>
                            <div class="row mb-3">
                                <label class="col-sm-6 col-form-label">Имя</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-6 col-form-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-6 col-form-label">Профиль</label>
                                <div class="col-sm-6">
                                    <select class="form-select" name="role" required>
                                        <option value="Admin" <?php echo e($user->role->id === 1 ? 'selected' : ''); ?>>Админ</option>
                                        <option value="Member" <?php echo e($user->role->id === 2 ? 'selected' : ''); ?>>Пользователь</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark col-sm-4">Обновить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/admin/user_detail.blade.php ENDPATH**/ ?>