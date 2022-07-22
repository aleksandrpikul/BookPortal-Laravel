<style>
  h1{
    border-top: 1px solid rgb(0,0,0,1);
  }
</style>














































<h1>Genre Model</h1>
<?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <h3><?php echo e($genre->name); ?></h3>
  <ul>
    <?php $__currentLoopData = $genre->books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($book->name); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<h1>Book Model</h1>
<?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <h3><?php echo e($book->name); ?> , Author <?php echo e($book->author); ?></h3>
  <ul>
    <?php $__currentLoopData = $book->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($genre->name); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\resources\views/testing/model_testing.blade.php ENDPATH**/ ?>