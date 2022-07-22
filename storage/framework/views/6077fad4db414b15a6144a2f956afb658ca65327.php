<style>
  h1 {
    border-top: 1px solid rgb(0, 0, 0, 1);
  }
</style>

<h1>Receipt Model</h1>
<h3><?php echo e($receipt->date); ?></h3>
<p><?php echo e($receipt->user); ?></p>
<ul>
  <?php $__currentLoopData = $receipt->transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($transaction->price * $transaction->quantity); ?></li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH C:\xampp\htdocs\resources\views/testing/controller_testing.blade.php ENDPATH**/ ?>