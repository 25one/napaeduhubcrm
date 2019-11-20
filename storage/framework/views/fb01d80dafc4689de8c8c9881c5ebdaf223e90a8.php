<?php $__env->startSection('css'); ?>
   <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

   <h2>About us</h2>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('public/js/mine.js')); ?>"></script>
    <script>
       $(document).ready(function(){
          //...
       });       
    </script>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-napaeduhub/resources/views/front/about.blade.php ENDPATH**/ ?>