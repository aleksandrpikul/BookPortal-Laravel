<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-11 my-5">
        <form action="/" class="d-flex justify-content-between mb-3">
          <label class="col me-3">
            <input type="text" class="form-control" name="search" placeholder="Поиск по названию книги">
          </label>
          <button type="submit" class="btn btn-dark">Поиск</button>
        </form>

        <div class="d-flex justify-content-between mt-3">
          <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card col-md-2 navbar navbar navbar-light" style="background-color: #E0E0E0;">
              <div class="card-body d-flex flex-column">
                <img src="/books/<?php echo e($book->cover); ?>" class="card-img-top" alt="<?php echo e($book->name); ?>">
                <h5 class="card-title fw-bold mt-1" style="min-height: 3rem;"><?php echo e($book->name); ?></h5>
                <p class="card-text mb-0">Автор: <?php echo e($book->author); ?></p>
                <p class="card-text">руб. <?php echo e($book->price); ?></p>
                <a href="/book/<?php echo e($book->id); ?><?php echo e($prefix); ?>" class="btn btn-dark mt-auto">
                  <i class="bi-info-circle-fill"></i>
                  Детали
                </a>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <nav>
          <ul class="pagination justify-content-center mt-3">
            <?php echo e($books->links()); ?>

          </ul>
        </nav>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/home/index.blade.php ENDPATH**/ ?>