@extends('front.layout')

@section('css')
   <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
@endsection

@section('main')

   <h2>About us</h2>

@endsection

@section('js')
    <script src="{{ asset('public/js/mine.js') }}"></script>
    <script>
       $(document).ready(function(){
          //...
       });       
    </script>
@endsection  