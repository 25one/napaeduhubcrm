@extends('back.students.template')

@section('form-open')
    <form method="post" action="{{ route('students.update', [$student->id]) }}">
                     {{ csrf_field() }}
                  {{ method_field('PUT') }}   
@endsection
