<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" href="<?php echo e(route('students.destroy', [$student->id])); ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"><a class="btn btn-primary listbuttonupdate" href="<?php echo e(route('students.edit', [$student->id])); ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
<?php endif; ?>
   <td><?php echo e($student->name); ?></td>
   <td><?php echo e($student->contacts); ?></td>   
   <td><?php echo e($student->test->name); ?></td>
   <td><?php echo e($student->statuse->name); ?></td>  
   <td><?php echo e($student->course->name); ?></td>   
   <td><?php echo e($student->datelesson); ?></td> 
   <td><?php echo e($student->timeteacherlesson); ?></td>        
   <td><?php echo e($student->note); ?></td>   
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH /home/alex/www/laravel-napaeduhub/resources/views/back/brick-standard.blade.php ENDPATH**/ ?>