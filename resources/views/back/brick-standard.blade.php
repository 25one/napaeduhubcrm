@foreach($students as $student)
<tr>
@admin
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" href="{{ route('students.destroy', [$student->id]) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"><a class="btn btn-primary listbuttonupdate" href="{{ route('students.edit', [$student->id]) }}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
@endadmin
   <td>{{ $student->name }}</td>
   <td>{{ $student->contacts }}</td>   
   <td>{{ $student->test->name }}</td>
   <td>{{ $student->statuse->name }}</td>  
   <td>{{ $student->course->name }}</td>   
   <td>{{ $student->datelesson }}</td> 
   <td>{{ $student->timeteacherlesson }}</td>        
   <td>{{ $student->note }}</td>   
</tr>
@endforeach


