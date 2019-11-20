<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

        <div class="row padding_body">
           <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body">
                    <div class="row">
                       <div class="col-md-3">
                          <div class="form-group">
                            <label for="statuse"><?php echo app('translator')->getFromJson('Statuse-filter'); ?></label>
                            <select class="form-control" name="filter_statuse_id" id="filter_statuse_id">
                                <option value="0">---</option>
                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $statuse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($statuse->id); ?>" 
                                   ><?php echo app('translator')->getFromJson( $statuse->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                       
                            </select>
                          </div>
                       </div>
                       <div class="col-md-3">
                        <div class="form-group">
                            <label for="course"><?php echo app('translator')->getFromJson('Course-filter'); ?></label>
                            <select class="form-control" name="filter_course_id" id="filter_course_id">
                                <option value="0">---</option>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($course->id); ?>"
                                   ><?php echo app('translator')->getFromJson( $course->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                       
                            </select>
                        </div>  
                       </div>
                       <div class="col-md-3">
                          <div class="form-group">
                            <label for="name"><?php echo app('translator')->getFromJson('Search by name'); ?></label>
                            <input type="text" class="form-control" id="filter_searching_text" name="filter_searching_text" value="" placeholder="Jahongir"> 
                          </div>
                       </div> 
                       <div class="col-md-3">
                          <div class="form-group">
                            <label for="name">&nbsp</label>
                            <button type="button" class="form-control" id="filter_searching_button" name="filter_searching_button" class="btn btn-primary" style="width: 75%; background: whitesmoke;"><span style="color: gray; font-weight: bolder;">Search</button> 
                          </div>
                       </div>                         
                    </div>
                    <hr>
                    <div id="spinner" class="text-center"></div>
                    <div class="table-responsive">
                      <?php if(session('student-updated')): ?>
                          <?php $__env->startComponent('back.components.alert'); ?>
                              <?php $__env->slot('type'); ?>
                                  success
                              <?php $__env->endSlot(); ?>
                              <?php echo session('student-updated'); ?>

                          <?php echo $__env->renderComponent(); ?>
                      <?php endif; ?>
                      <table>
                         <thead>
                          <tr>
                            <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td>
                            <?php endif; ?>
                            <td>Name/lastname of student</td>
                            <td>Contacts of student</td>
                            <td>Test</td>  
                            <td>Statuse</td>  
                            <td>Course</td>
                            <td>Date of lesson</td>   
                            <td>Time and teacher</td>
                            <td>Note - English,Russian,HTML/CSS...</td>                              
                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             <?php echo $__env->make('back.brick-standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                         </tbody>    
                       </table>
                     </div>
                     <hr> <!-- cards->links() -->
                     <div id="pagination" class="box-footer">
                       <?php echo e($links); ?>

                     </div>
                   </div>  
                 </div>
              </div> 
           </div>  
</section>  

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('public/js/mine.js')); ?>"></script>
    <script>
       var url = "<?php echo e(route('dashboard')); ?>"; 
       var errorAjax = '<?php echo app('translator')->getFromJson('Looks like there is a server issue...'); ?>';
       var swalTitle = '<?php echo app('translator')->getFromJson('Really destroy card ?'); ?>';
       var confirmButtonText = '<?php echo app('translator')->getFromJson('Yes'); ?>';
       var cancelButtonText = '<?php echo app('translator')->getFromJson('No'); ?>'; 
       $(document).ready(function(){
          $(".listbuttonremove").click(function(){
             BaseRecord.destroy(this, url, swalTitle, confirmButtonText, cancelButtonText, errorAjax);
             return false;
          }); 
          $("#filter_statuse_id").change(function(){
             BaseRecord.statuse = this.value;;
             BaseRecord.listDashboard(url, swalTitle, confirmButtonText, cancelButtonText, errorAjax);             
          }); 
          $("#filter_course_id").change(function(){
             BaseRecord.course = this.value;
             BaseRecord.listDashboard(url, swalTitle, confirmButtonText, cancelButtonText, errorAjax);
          }); 
          $("#filter_searching_button").click(function(){
             BaseRecord.searching = $("#filter_searching_text").val();
             BaseRecord.listDashboard(url, swalTitle, confirmButtonText, cancelButtonText, errorAjax);
          });                               
       })
    </script>
<?php $__env->stopSection(); ?>    

<?php echo $__env->make('back.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-napaeduhub/resources/views/back/index.blade.php ENDPATH**/ ?>