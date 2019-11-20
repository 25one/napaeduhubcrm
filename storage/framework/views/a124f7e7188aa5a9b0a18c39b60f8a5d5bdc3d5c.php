<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="row">
        <!-- left column -->
       <div class="col-md-3">
       </div>
        <!-- center column -->       
        <div class="col-md-6 margin">
            <?php if(session('student-ok')): ?>
                <?php $__env->startComponent('back.components.alert'); ?>
                    <?php $__env->slot('type'); ?>
                        success
                    <?php $__env->endSlot(); ?>
                    <?php echo session('student-ok'); ?>

                <?php echo $__env->renderComponent(); ?>
            <?php endif; ?>
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                    <?php echo $__env->yieldContent('form-open'); ?>
                    <div class="box-body">
                        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                            <label for="name"><?php echo app('translator')->getFromJson('Name <span class="red">(required)</span>'); ?></label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($student)): ?><?php echo e($student->name); ?><?php elseif(old('name')): ?><?php echo e(old('name')); ?><?php endif; ?>" placeholder="Name of student" required> 
                            <?php echo $errors->first('name', '<small class="help-block">:message</small>'); ?>

                        </div>
                        <div class="form-group <?php echo e($errors->has('contacts') ? 'has-error' : ''); ?>">
                            <label for="contacts"><?php echo app('translator')->getFromJson('Contacts <span class="red">(required)</span>'); ?></label>
                            <textarea rows="2" style="width: 100%;" id="contacts" name="contacts" value="" placeholder="Contacts of student" required><?php if(isset($student)): ?><?php echo e($student->contacts); ?><?php elseif(old('contacts')): ?><?php echo e(old('contacts')); ?><?php endif; ?></textarea>
                            <?php echo $errors->first('contacts', '<small class="help-block">:message</small>'); ?>

                        </div> 
                        <div class="form-group">
                            <label for="test"><?php echo app('translator')->getFromJson('Test'); ?></label>
                            <select class="form-control" name="test_id" id="test_id">
                                <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($test->id); ?>" 
                                    <?php if(isset($student) && $student->test_id == $test->id): ?>
                                       <?php echo e('selected'); ?> 
                                    <?php endif; ?>
                                    <?php if(old('test_id') && old('test_id') == $test->id): ?>
                                       <?php echo e('selected'); ?> 
                                    <?php endif; ?>                                    
                                   ><?php echo app('translator')->getFromJson( $test->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                       
                            </select>
                        </div>                                         
                        <div class="form-group">
                            <label for="statuse"><?php echo app('translator')->getFromJson('Statuse'); ?></label>
                            <select class="form-control" name="statuse_id" id="statuse_id">
                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $statuse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($statuse->id); ?>" 
                                    <?php if(isset($student) && $student->statuse_id == $statuse->id): ?>
                                       <?php echo e('selected'); ?> 
                                    <?php endif; ?>
                                    <?php if(old('statuse_id') && old('statuse_id') == $statuse->id): ?>
                                       <?php echo e('selected'); ?> 
                                    <?php endif; ?>
                                   ><?php echo app('translator')->getFromJson( $statuse->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                       
                            </select>
                        </div>                                                         
                        <div class="form-group">
                            <label for="course"><?php echo app('translator')->getFromJson('Course'); ?></label>
                            <select class="form-control" name="course_id" id="course_id">
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($course->id); ?>" 
                                    <?php if(isset($student) && $student->course_id == $course->id): ?>
                                       <?php echo e('selected'); ?> 
                                    <?php endif; ?>
                                    <?php if(old('course_id') && old('course_id') == $course->id): ?>
                                       <?php echo e('selected'); ?> 
                                    <?php endif; ?>                                    
                                   ><?php echo app('translator')->getFromJson( $course->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                       
                            </select>
                        </div>  

                            <div class="row">
                               <div class="col-md-6 col-sm-6 col-xs-6">
                                  <div class="form-group <?php echo e($errors->has('datelesson') ? 'has-error' : ''); ?>">
                                      <label for="date"><?php echo app('translator')->getFromJson('Date of course (not required)'); ?></label>
      		                            <input type="text" class="form-control" id="datepicker" name="datelesson" value="<?php if(isset($student)): ?><?php echo e($student->datelesson); ?><?php elseif(old('datelesson')): ?><?php echo e(old('datelesson')); ?><?php endif; ?>" placeholder="Date of course"> 
      		                            <?php echo $errors->first('datelesson', '<small class="help-block">:message</small>'); ?>

                                  </div>
                               </div>
                               <div class="col-md-6 col-sm-6 col-xs-6">
                                  <div class="form-group <?php echo e($errors->has('timeteacherlesson') ? 'has-error' : ''); ?>">
                                      <label for="date"><?php echo app('translator')->getFromJson('Time and teacher (not required)'); ?></label>
      		                            <input type="text" class="form-control" id="timeteacherlesson" name="timeteacherlesson" value="<?php if(isset($student)): ?><?php echo e($student->timeteacherlesson); ?><?php elseif(old('timeteacherlesson')): ?><?php echo e(old('timeteacherlesson')); ?><?php endif; ?>" placeholder="Time and teacher"> 
      		                            <?php echo $errors->first('timeteacherlesson', '<small class="help-block">:message</small>'); ?>

                                  </div>
                               </div>                               
                            </div>
                        </div>

                        <div class="form-group <?php echo e($errors->has('note') ? 'has-error' : ''); ?>">
                            <label for="note"><?php echo app('translator')->getFromJson('Note - English,Russian,HTML/CSS... (not required)'); ?></label>
                            <textarea rows="2" style="width: 100%;" id="note" name="note" value="" placeholder="Note"><?php if(isset($student)): ?><?php echo e($student->note); ?><?php elseif(old('note')): ?><?php echo e(old('note')); ?><?php endif; ?></textarea>
                            <?php echo $errors->first('note', '<small class="help-block">:message</small>'); ?>

                        </div>                                                          
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('Submit'); ?></button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
        <!-- right column -->
       <div class="col-md-3">
       </div> 
    </div>
    <!-- /.row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
       $(document).ready(function(){
          $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'});
       });
    </script>
<?php $__env->stopSection(); ?>   


<?php echo $__env->make('back.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-napaeduhub/resources/views/back/students/template.blade.php ENDPATH**/ ?>