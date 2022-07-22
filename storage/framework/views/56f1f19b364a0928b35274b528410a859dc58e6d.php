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
                        <?php if($items): ?>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $grandtotal += (int)$item->subtotal; ?>
                                <tr>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->author); ?></td>
                                    <td>руб. <?php echo e($item->price); ?></td>
                                    <td><?php echo e($item->quantity); ?> <?= $item->quantity > 1 ? 's' : '' ?></td>
                                    <td>IDR <?php echo e($item->subtotal); ?></td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <a href="/book/<?php echo e($item->id); ?>" class="btn btn-dark">Описание</a>
                                            <a href="/book/<?php echo e($item->id); ?>" class="btn btn-dark">Изменить</a>
                                            <form action="/cart/r/<?php echo e($item->id); ?>" method="POST" class="d-inline-block">
                                                <?php echo csrf_field(); ?>
                                                <button class="btn btn-danger" type="submit">Удалить</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <h6 class="mb-3">Итого: руб. <?= $grandtotal; ?></h6>
                <?php if($items): ?>
                    <form action="/checkout" method="POST">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-dark" type="submit">Проверить</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/order/cart.blade.php ENDPATH**/ ?>