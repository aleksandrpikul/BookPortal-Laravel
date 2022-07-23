<?php $__env->startSection('content'); ?>

  

  <style>
    span {
      color: red;
    }
  </style>
  <div class="container my-5 flex-fill">
    <div class="row justify-content-center">
      <div class="col-md-11">
        <form action="/book/<?php echo e($book->id); ?>/admin" method="POST"
              enctype="multipart/form-data" onsubmit="convertGenreArr()">
          <?php echo csrf_field(); ?>
          <div class="card">
            <div class="card-body">
              <h3><?php echo e($book->name); ?>'s Описание</h3>
              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Название</label>
                <div class="col-sm-6">
                  <input value="<?php echo e($book->name); ?>" type="text" class="form-control" name="name">
                  <span><?php echo e($errors->first('name')); ?></span>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Автор</label>
                <div class="col-sm-6">
                  <input value="<?php echo e($book->author); ?>" type="text" class="form-control" name="author">
                  <span><?php echo e($errors->first('author')); ?></span>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Синопсис</label>
                <div class="col-sm-6">
                  <textarea type="text" class="form-control" name="synopsis"><?php echo e($book->synopsis); ?></textarea>
                  <span><?php echo e($errors->first('synopsis')); ?></span>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Жанр</label>
                <div class="col-sm-4">
                  <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group form-check" onclick="checkGenres(<?php echo e($genre->id); ?>)">
                      <input class="form-check-input" type="checkbox" name="genres"
                             value="<?php echo e($genre->id); ?>" id="check<?php echo e($genre->id); ?>"
                      <?php $__currentLoopData = $book->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookGenre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($genre->name === $bookGenre->name ? 'checked' : ''); ?>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      >
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
                  <input value="<?php echo e($book->price); ?>" type="number" class="form-control" name="price">
                  <span><?php echo e($errors->first('price')); ?></span>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Старая обложка</label>
                <div class="col-sm-6">
                  <img class="img-fluid mb-3" src="/books/<?php echo e($book->cover); ?>" alt="Обложка">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Новая обложка</label>
                <div class="col-sm-6">
                  <input type="file" class="form-control" name="cover">
                  <span><?php echo e($errors->first('cover')); ?></span>
                </div>
              </div>
              
              <input value="<?php echo e($book->cover); ?>" name="oldCover" hidden>
              <button type="submit" class="btn btn-dark col-sm-4">Обновление</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
      console.log(<?php echo json_encode($book->genres, 15, 512) ?>);
      const genreInput = document.getElementById('genres');
      let genreArr = [];
      window.onload = () => {
          (<?php echo json_encode($book->genres, 15, 512) ?>).forEach(genre => {
              genreArr.push(genre['id']);
          });
      }
      console.log(genreArr);
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/admin/book_detail.blade.php ENDPATH**/ ?>