<?php $__env->startSection('content'); ?>
  <h1>projects</h1>
  <hr>
  <div class="row">
    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="/projects/<?php echo e($project->id); ?>">
        <div class="card  mb-2 mr-3" style="width: 13rem;">
          <div class="card-header">
            <?php echo e($project->title); ?>

          </div>
          <div class="card-body">
            <p class="card-text"><?php echo e($project->description); ?></p>
          </div>
          <div class="card-footer">
            <div class="row">
              <a href="/projects/<?php echo e($project->id); ?>/edit" class="mr-2"><button class="btn btn-primary"><i class="fas fa-edit fa-sm"></i></button></a>
              <form action="/projects/<?php echo e($project->id); ?>" method="post">
                <?php echo method_field('DELETE'); ?>
                <?php echo csrf_field(); ?>
                <button class="btn btn-danger"><i class="fas fa-trash fa-sm"></i></button>
              </form>
            </div>
          </div>
        </div>
      </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <a href="/projects/create" id="blue-link">
      <div class="card  mb-2 mr-2" style="width: 13rem;">
        <div class="card-body">
          <p class="card-text">Create Project</p>
        </div>
      </div>
    </a>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\taskflow_new\resources\views/projects/index.blade.php ENDPATH**/ ?>