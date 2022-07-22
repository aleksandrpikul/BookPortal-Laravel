<?php $__env->startSection('content'); ?>

  <div class="container my-5 flex-fill">
    <div class="row justify-content-center">
      <div class="col-md-11">
        <div class="card">
          <div class="card-body">
            <h3><?php echo e($book->name); ?></h3>
            <div class="row me-1">
              <div class="col-sm-3 text-center mb-3">
                <img class="img-fluid w-100" src="/books/<?php echo e($book->cover); ?>" alt="Book Title Cover">
              </div>
              <div class="col-sm-9">
                <div class="row mb-3">
                  <p class="col-sm-4">Название</p>
                  <p class="col-sm-8"><?php echo e($book->name); ?></p>
                </div>
                <div class="row mb-3">
                  <p class="col-sm-4">Автор</p>
                  <p class="col-sm-8"><?php echo e($book->author); ?></p>
                </div>
                <div class="row mb-3">
                  <p class="col-sm-4">Синопсис</p>
                  <p class="col-sm-8"><?php echo e($book->synopsis); ?></p>
                </div>
                <div class="row mb-3">
                  <p class="col-sm-4">Жанр</p>
                  <p class="col-sm-8">
                    <?php $__currentLoopData = $book->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php echo e($genre->name); ?><?= $loop->last ? '' : ', ' ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </p>
                </div>
                <div class="row mb-3">
                  <p class="col-sm-4">Цена</p>
                  <p class="col-sm-8">руб. <?php echo e($book->price); ?></p>
                </div>

                <?php if(auth()->guard()->check()): ?>
                  <form action="/cart/<?php echo e($book->id); ?>" method="POST" class="row justify-content-between">
                    <?php echo csrf_field(); ?>
                    <div class="col-sm-4">
                      <div class="input-group">
                        <span class="input-group-text">Количество</span>
                        <input type="number" min="1" class="form-control" name="quantity" placeholder="e.g. 1" value="<?php echo e($book->quantity > 0 ? $book->quantity : 1); ?>"
                               required>
                      </div>
                    </div>
                    <div class="col-sm text-end">
                      <button type="submit" class="btn btn-dark"><?php echo e($book->quantity > 0 ? 'Update' : 'В корзину'); ?></button>
                    </div>
                  </form>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/home/book_detail.blade.php ENDPATH**/ ?>