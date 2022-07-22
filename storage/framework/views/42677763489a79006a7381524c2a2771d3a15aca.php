<?php $__env->startSection('content'); ?>

    <div class="container my-5 flex-fill">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-body">
                        <form action="/genre/<?php echo e($genre->id); ?>/admin" method="POST">
                            <?php echo csrf_field(); ?>
                            <h3>О жанре</h3>
                            <div class="row mb-3">
                                <label class="col-sm-6 col-form-label">Название</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="name" value="<?php echo e($genre->name); ?>" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-secondary col-sm-4">Обновить</button>
                        </form>
                        <h3 class="mt-3">Список книг</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Название</th>
                                    <th scope="col">Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($books): ?>
                                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($book->name); ?></td>
                                            <td>
                                                <a href="/book/<?php echo e($book->id); ?>/admin" class="btn btn-info">Описание</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/admin/genre_detail.blade.php ENDPATH**/ ?>