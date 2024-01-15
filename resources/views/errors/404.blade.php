@extends('layouts.app')
@section('title')  @stop


@section('content')

<div class="flex items-center justify-center py-28" style="background-image:url({{url('images/404.png')}}); background-repeat:no-repeat; background-size:800px; background-position:center">
    <div>
        <div><h1 class="text-9xl fw-bold text-blue-100">404</h1></div>
        <div><p class="fw-bold text-blue-100 text-center">Page not found</p></div>
        <div class="mt-10">
            <a class="block bg-indigo-600 fw-bold text-slate-100 py-2 rounded-md text-center hover:-translate-y-1 duration-500 hover:shadow-xl" href="/">Go back to promos</a>
        </div>
    </div>
    
</div>
    
@stop