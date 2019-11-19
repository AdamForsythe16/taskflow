<?php $__env->startSection('content'); ?>
  <div class="d-flex">
    <div class="mr-auto p-2">
      <h1><?php echo e($project->title); ?></h1>
      <div class="row">
        <a href="/projects/<?php echo e($project->id); ?>/edit" class="mr-2"><button class="btn btn-primary"><i class="fas fa-edit fa-xs"></i></button></a>
        <form action="/projects/<?php echo e($project->id); ?>" method="post">
          <?php echo method_field('DELETE'); ?>
          <?php echo csrf_field(); ?>
          <button class="btn btn-danger"><i class="fas fa-trash fa-xs"></i></button>
        </form>
      </div>
    </div>
    <div class="p-2">
      <?php if(($productivity == 100) && ($project->status !== 'completed')): ?>
        <form action="/projects/<?php echo e($project->id); ?>" method="post">
          <?php echo method_field('PATCH'); ?>
          <?php echo csrf_field(); ?>
          <input type="hidden" name="title" value="<?php echo e($project->title); ?>">
          <input type="hidden" name="description" value="<?php echo e($project->description); ?>">
          <input type="hidden" name="deadline" value="<?php echo e($project->deadline); ?>">
          <input type="hidden" name="status" value="completed">
          <button type="submit" class="btn btn-success">Complete project</button>
        </form>
        <?php elseif(($productivity == 100) && ($project->status == 'completed')): ?>
          <div class="alert alert-info">
            Project complete
          </div>
      <?php endif; ?>
    </div>
    <div class="p-2">
      <h2><?php echo e($productivity); ?>%</h2>
    </div>
  </div>
  <hr>
  <p><?php echo e($project->description); ?></p>
  <div class="row">
    <?php if($project->tasks->count()): ?>
      <?php $__currentLoopData = $project->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card  mb-2 mr-3" style="width: 13rem;">
          <div class="card-header">
            <?php echo e($task->title); ?>

          </div>
          <div class="card-body">
            <p class="card-text"><?php echo e($task->description); ?></p>
              <ul class="list-group list-group-flush">
                <?php $__currentLoopData = $task->subtasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtask): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="list-group-item">
                    <?php echo e($subtask->description); ?>

                    <span>
                      <form class="form-check form-check-inline" action="/subtasks/<?php echo e($subtask->id); ?>" method="post">
                        <?php echo method_field('PATCH'); ?>
                        <?php echo csrf_field(); ?>
                        <label class="checkbox" for="status">
                          <input type="checkbox" name="status" onChange="this.form.submit()" value="completed" <?php echo e(old('status', $subtask->status) === 'completed' ? 'checked': ''); ?>>
                        </label>
                      </form>
                    </span>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
                <form action="/projects/<?php echo e($project->id); ?>/<?php echo e($task->id); ?>/subtasks" method="post">
                  <?php echo csrf_field(); ?>
                  <div class="form-group">
                      <input type="text" class="form-control" name="description" placeholder="Sub task" value="<?php echo e(old('description')); ?>">
                  </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary" name="button">Add Subtask</button>
                    </div>
                </form>
                <?php
                  $subtaskcount = $task->subtasks->count();
                  $subtaskcompleted = $task->subtasks->where('status', '==', 'completed')->count()
                ?>
                <?php if($subtaskcompleted == $subtaskcount): ?>
                  <div class="row">
                    <p class="card-text">Complete task</p>
                    <span>
                      <form action="/tasks/<?php echo e($task->id); ?>" method="post">
                        <?php echo method_field('PATCH'); ?>
                        <?php echo csrf_field(); ?>
                        <label class="checkbox" for="completed">
                          <input type="checkbox" name="status" onChange="this.form.submit()" value="completed" <?php echo e(old('status', $task->status) === 'completed' ? 'checked': ''); ?>>
                        </label>
                      </form>
                    </span>
                  </div>
                <?php endif; ?>
              </div>
              <div class="card-footer">
                <div class="row">
                  <form action="/projects/<?php echo e($project->id); ?>/<?php echo e($task->id); ?>" method="post">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-danger"><i class="fas fa-trash fa-sm"></i></button>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <div class="card  mb-2 mr-3" style="width: 13rem;">
          <div class="card-header">Add Task</div>
          <div class="card-body">
            <form action="/projects/<?php echo e($project->id); ?>/tasks" method="post">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo e(old('title')); ?>">
              </div>
              <div class="form-group">
                  <input type="text" class="form-control" name="description" placeholder="Description" value="<?php echo e(old('description')); ?>">
              </div>
              <div class="form-group">
                  <input type="date" class="form-control" name="deadline" value="<?php echo e(old('title')); ?>">
              </div>
              <div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="button">Add Task</button>
                </div>
              </div>
            </form>
          </div>
        </a>
      </div>
      </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\taskflow_new\resources\views/projects/show.blade.php ENDPATH**/ ?>