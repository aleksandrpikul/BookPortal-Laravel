<?php $__env->startSection('content'); ?>
    <div class="container my-5 flex-fill">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Код покупки</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $receipts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receipt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($receipt->id); ?></td>
                                <td><?= date_format(date_create($receipt->date), "D, M d, Y g:i A"); ?></td>
                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <a class="btn btn-secondary" href="/history/<?php echo e($receipt->id); ?>">Детали</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/order/history.blade.php ENDPATH**/ ?>