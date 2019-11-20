@extends('back.layout')

@section('css')

@endsection

@section('main')

    <div class="row">
        <!-- left column -->
       <div class="col-md-3">
       </div>
        <!-- center column -->       
        <div class="col-md-6 margin">
            @if (session('student-ok'))
                @component('back.components.alert')
                    @slot('type')
                        success
                    @endslot
                    {!! session('student-ok') !!}
                @endcomponent
            @endif
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                    @yield('form-open')
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">@lang('Name <span class="red">(required)</span>')</label>
                            <input type="text" class="form-control" id="name" name="name" value="@if(isset($student)){{$student->name}}@elseif(old('name')){{old('name')}}@endif" placeholder="Name of student" required> 
                            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('contacts') ? 'has-error' : '' }}">
                            <label for="contacts">@lang('Contacts <span class="red">(required)</span>')</label>
                            <textarea rows="2" style="width: 100%;" id="contacts" name="contacts" value="" placeholder="Contacts of student" required>@if(isset($student)){{$student->contacts}}@elseif(old('contacts')){{old('contacts')}}@endif</textarea>
                            {!! $errors->first('contacts', '<small class="help-block">:message</small>') !!}
                        </div> 
                        <div class="form-group">
                            <label for="test">@lang('Test')</label>
                            <select class="form-control" name="test_id" id="test_id">
                                @foreach ($tests as $key => $test)
                                   <option value="{{ $test->id }}" 
                                    @if(isset($student) && $student->test_id == $test->id)
                                       {{ 'selected' }} 
                                    @endif
                                    @if(old('test_id') && old('test_id') == $test->id)
                                       {{ 'selected' }} 
                                    @endif                                    
                                   >@lang( $test->name)</option>
                                @endforeach                       
                            </select>
                        </div>                                         
                        <div class="form-group">
                            <label for="statuse">@lang('Statuse')</label>
                            <select class="form-control" name="statuse_id" id="statuse_id">
                                @foreach ($statuses as $key => $statuse)
                                   <option value="{{ $statuse->id }}" 
                                    @if(isset($student) && $student->statuse_id == $statuse->id)
                                       {{ 'selected' }} 
                                    @endif
                                    @if(old('statuse_id') && old('statuse_id') == $statuse->id)
                                       {{ 'selected' }} 
                                    @endif
                                   >@lang( $statuse->name)</option>
                                @endforeach                       
                            </select>
                        </div>                                                         
                        <div class="form-group">
                            <label for="course">@lang('Course')</label>
                            <select class="form-control" name="course_id" id="course_id">
                                @foreach ($courses as $key => $course)
                                   <option value="{{ $course->id }}" 
                                    @if(isset($student) && $student->course_id == $course->id)
                                       {{ 'selected' }} 
                                    @endif
                                    @if(old('course_id') && old('course_id') == $course->id)
                                       {{ 'selected' }} 
                                    @endif                                    
                                   >@lang( $course->name)</option>
                                @endforeach                       
                            </select>
                        </div>  

                            <div class="row">
                               <div class="col-md-6 col-sm-6 col-xs-6">
                                  <div class="form-group {{ $errors->has('datelesson') ? 'has-error' : '' }}">
                                      <label for="date">@lang('Date of course (not required)')</label>
      		                            <input type="text" class="form-control" id="datepicker" name="datelesson" value="@if(isset($student)){{$student->datelesson}}@elseif(old('datelesson')){{old('datelesson')}}@endif" placeholder="Date of course"> 
      		                            {!! $errors->first('datelesson', '<small class="help-block">:message</small>') !!}
                                  </div>
                               </div>
                               <div class="col-md-6 col-sm-6 col-xs-6">
                                  <div class="form-group {{ $errors->has('timeteacherlesson') ? 'has-error' : '' }}">
                                      <label for="date">@lang('Time and teacher (not required)')</label>
      		                            <input type="text" class="form-control" id="timeteacherlesson" name="timeteacherlesson" value="@if(isset($student)){{$student->timeteacherlesson}}@elseif(old('timeteacherlesson')){{old('timeteacherlesson')}}@endif" placeholder="Time and teacher"> 
      		                            {!! $errors->first('timeteacherlesson', '<small class="help-block">:message</small>') !!}
                                  </div>
                               </div>                               
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                            <label for="note">@lang('Note - English,Russian,HTML/CSS... (not required)')</label>
                            <textarea rows="2" style="width: 100%;" id="note" name="note" value="" placeholder="Note">@if(isset($student)){{$student->note}}@elseif(old('note')){{old('note')}}@endif</textarea>
                            {!! $errors->first('note', '<small class="help-block">:message</small>') !!}
                        </div>                                                          
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
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
@endsection

@section('js')
    <script>
       $(document).ready(function(){
          $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'});
       });
    </script>
@endsection   

