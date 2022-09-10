@extends('errors::minimal')
 <center style="margin-top: 200px" >Error: <h1>Redirecting.....</h1> </center>
    <script>
         window.location.href = "{{ url('/admin/login') }}";
    </script>
@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))
