<?php $__env->startSection('content'); ?>
  <style>
    span {
      color: red;
    }
  </style>
  <div class="container my-5 flex-fill">
    <div class="row justify-content-center">
      <div class="col-md-11">
        <form action="/admin/book" method="POST"
              enctype="multipart/form-data" onsubmit="convertGenreArr()">
          <?php echo csrf_field(); ?>
          <div class="card">
            <div class="card-body">
              <h3>Информация о книге</h3>
              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Название</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="name">
                  <span><?php echo e($errors->first('name')); ?></span>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Автор</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="author">
                  <span><?php echo e($errors->first('author')); ?></span>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Синопсис</label>
                <div class="col-sm-6">
                  <textarea type="text" class="form-control" name="synopsis"></textarea>
                  <span><?php echo e($errors->first('synopsis')); ?></span>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Жанр</label>
                <div class="col-sm-4">
                  <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group form-check" onclick="checkGenres(<?php echo e($genre->id); ?>)">
                      <input class="form-check-input" type="checkbox"
                             value="<?php echo e($genre->id); ?>" id="check<?php echo e($genre->id); ?>">

                      <label class="form-check-label">
                        <?php echo e($genre->name); ?>

                      </label>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <span><?php echo e($errors->first('genres')); ?></span>
                </div>
              </div>


              <input value="" type="text" id="genres" class="form-control" name="genres" hidden>

              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Цена</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="price">
                  <span><?php echo e($errors->first('price')); ?></span>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Обложка</label>
                <div class="col-sm-6">
                  <input type="file" class="form-control" name="cover">
                  <span><?php echo e($errors->first('cover')); ?></span>
                </div>
              </div>

              <button type="submit" class="btn btn-dark col-sm-4">Добавить</button>
            </div>
          </div>
        </form>

        <table class="table">
          <thead>
          <tr>
            <th scope="col">Название</th>
            <th scope="col">Автор</th>
            <th scope="col">Синопсис</th>
            <th scope="col">Жанр</th>
            <th scope="col">Цена</th>
            <th scope="col">Действие</th>
          </tr>
          </thead>
          <tbody>
          <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($book->name); ?></td>
              <td><?php echo e($book->author); ?></td>
              <td><?php echo e($book->synopsis); ?></td>
              <td>
                <?php $__currentLoopData = $book->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php echo e($genre->name); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </td>
              <td>руб. <?php echo e($book->price); ?></td>
              <td>
                <div class="d-grid gap-2 d-md-block">
                  <a href="/book/<?php echo e($book->id); ?>/admin" class="btn btn-dark">Детали</a>
                  <form action="/book/<?php echo e($book->id); ?>/admin" method="POST" class="d-inline-block">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger" type="submit">Удалить</button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>

  <script>
      const genreInput = document.getElementById('genres');
      let genreArr = [];
      const checkGenres = (idGenre) => {
          const check = document.getElementById('check' + idGenre);
          if (genreArr.includes(idGenre) === false) {
              genreArr.push(idGenre);
              check.checked = true;
          } else {
              genreArr = arrayRemove(genreArr, idGenre);
              check.checked = false;
          }

          console.log(genreArr);
      }
      const convertGenreArr = () => {
          genreInput.value = genreArr.join('_');
      }
      const arrayRemove = (arr, value) => {
          return arr.filter((loop) => {
              return loop !== value;
          });
      }
  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/admin/manage_book.blade.php ENDPATH**/ ?>