@extends('layouts.success')
@section('title','success')

@section('content')
    
<main>
       <div class="section-success d-flex align-items-center">
           <div class="col text-center">
               <img src="{{url('frontend/image/Group 30.png')}}" alt="">
               <h1>Yay! Succes</h1>
               <p>
                We sent you email for trip
                <br> 
                instruction please read as well 
               </p>
               <a href="{{url('/')}}" class="btn btn-home-page mt-3 px-5">
                   Home Page
               </a>
           </div>
       </div>
    </main>

@endsection

