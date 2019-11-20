@extends('back.students.template')

@section('form-open')
    <form method="post" action="{{ route('students.store') }}">
                    {{ csrf_field() }}
                {{ method_field('POST') }}   
@endsection