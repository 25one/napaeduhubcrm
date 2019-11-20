<?php $__env->startSection('form-open'); ?>
    <form method="post" action="<?php echo e(route('students.update', [$student->id])); ?>">
                     <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('PUT')); ?>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.students.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-napaeduhub/resources/views/back/students/edit.blade.php ENDPATH**/ ?>