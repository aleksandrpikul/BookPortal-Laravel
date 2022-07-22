<?php $__env->startSection('content'); ?>
    <div class="container my-5 flex-fill">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <?php $grandtotal = 0; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Название</th>
                            <th scope="col">Автор</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Всего</th>
                            <th scope="col">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($transactions): ?>
                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $subtotal = $transaction->price * $transaction->quantity;
                                    $grandtotal += (int)$subtotal;
                                ?>
                                <tr>
                                    <td><?php echo e($transaction->book->name); ?></td>
                                    <td><?php echo e($transaction->book->author); ?></td>
                                    <td>IDR <?php echo e($transaction->price); ?></td>
                                    <td><?php echo e($transaction->quantity); ?> <?= $transaction->quantity > 1 ? 's' : '' ?></td>
                                    <td>IDR <?= $subtotal; ?></td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <a class="btn btn-secondary" href="/book/<?php echo e($transaction->book->id); ?>">Описание</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <h6 class="mb-3">Итого: руб. <?= $grandtotal; ?></h6>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/order/history_detail.blade.php ENDPATH**/ ?>