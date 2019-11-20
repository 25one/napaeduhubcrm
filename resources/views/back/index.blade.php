@extends('back.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
@endsection

@section('main')

        <div class="row padding_body">
           <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body">
                    <div class="row">
                       <div class="col-md-3">
                          <div class="form-group">
                            <label for="statuse">@lang('Statuse-filter')</label>
                            <select class="form-control" name="filter_statuse_id" id="filter_statuse_id">
                                <option value="0">---</option>
                                @foreach ($statuses as $key => $statuse)
                                   <option value="{{ $statuse->id }}" 
                                   >@lang( $statuse->name)</option>
                                @endforeach                       
                            </select>
                          </div>
                       </div>
                       <div class="col-md-3">
                        <div class="form-group">
                            <label for="course">@lang('Course-filter')</label>
                            <select class="form-control" name="filter_course_id" id="filter_course_id">
                                <option value="0">---</option>
                                @foreach ($courses as $key => $course)
                                   <option value="{{ $course->id }}"
                                   >@lang( $course->name)</option>
                                @endforeach                       
                            </select>
                        </div>  
                       </div>
                       <div class="col-md-3">
                          <div class="form-group">
                            <label for="name">@lang('Search by name')</label>
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
                      @if (session('student-updated'))
                          @component('back.components.alert')
                              @slot('type')
                                  success
                              @endslot
                              {!! session('student-updated') !!}
                          @endcomponent
                      @endif
                      <table>
                         <thead>
                          <tr>
                            @admin
                            <td class="widthbutton">&nbsp;</td>
                            <td class="widthbutton">&nbsp;</td>
                            @endadmin
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
                             @include('back.brick-standard')
                         </tbody>    
                       </table>
                     </div>
                     <hr> <!-- cards->links() -->
                     <div id="pagination" class="box-footer">
                       {{ $links }}
                     </div>
                   </div>  
                 </div>
              </div> 
           </div>  
</section>  

@endsection

@section('js')
    <script src="{{ asset('public/js/mine.js') }}"></script>
    <script>
       var url = "{{ route('dashboard') }}"; 
       var errorAjax = '@lang('Looks like there is a server issue...')';
       var swalTitle = '@lang('Really destroy card ?')';
       var confirmButtonText = '@lang('Yes')';
       var cancelButtonText = '@lang('No')'; 
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
@endsection    
