@extends('layouts.app')

@section('title')
    

@section('content')
     <!-- header -->
     <header class="text-center">
        <h1>
            Dolen Dengan Mlaku Mlaku
            <br>
            Kamu yang di bayar bukan aku yang bayar 
        </h1>
        <p>
            Kamu akan merasakan perjalan yang
            <br>
            Tidak bisa di lupakan dengan mudah
        </p>
        <a href="#popular" class="btn btn-get-started px-4 mt-4">
            Get Started
        </a>
    </header>

    <main>
        <div class="container">
            <section class="section-stats row justify-content-center" id="stats">
                <div class="col-2 col-1 stats-detail">
                    <h1>20K</h1>
                    <p>Members</p>
                </div>
                <div class="col-2 col-1 stats-detail">
                    <h1>12k</h1>
                    <p>Countries</p>
                </div>
                <div class="col-2 col-1 stats-detail">
                    <h1>10K</h1>
                    <p>Hotels</p>
                </div>
                <div class="col-2 col-1 stats-detail">
                    <h1>72</h1>
                    <p>Partners</p>
                </div>
            </section>
        </div>

        <section class="section-popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Wisata Populer </h2>
                        <p>Some thing you never try
                            <br>
                            before in this world 
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-popular-content" id="popularContent">
            <div class="section-popular-travel row justify-content-center">

                @foreach ($items as $item)
                <div class="col-sm-5 col-md-3 col-lg-2">
                    <div class="card-travel text-center d-flex flex-column"
                    style="background-image: url('{{$item->galleries->count() ? Storage::url ($item->galleries->first()->image) : '' }}');">
                        <div class="travel-country">{{$item -> location}}</div>
                        <div class="div-travel-location">{{$item -> title}}</div>
                        <div class="travel-button mt-auto">
                            <a href="{{route('detail', $item -> slug)}}" class="btn btn-travel-details px-4">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </section>

        <section class="section-networks" id="networks">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Our Networks</h2>
                        <p>Companies are trusted us more
                            <br> 
                            than just a trip</p>
                    </div>
                    <div class="col-md-8 text-center">
                        <img src="frontend/image/titile.png" alt="logo Partner" class="img-partner">
                    </div>
                </div>
            </div>
        </section>

        <section class="section-testimonial-heading" id="testimonialHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>They are loving us </h2>
                        <p>Moments were giving them
                           <br>
                            the best experience
                           </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-testimonial-content" id="testimonialContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/image/Mask Group 6.png" alt="User" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Miku Ohashi</h3>
                                <p class="testimonial">
                                    "We booked Hotel Eucalyptus through Mlaku 
                                    and it was easily the
                                    best decision we made for
                                    our trip to Santorini."    
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Ubud
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/image/Mask Group 8.png" alt="User" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Julia</h3>
                                <p class="testimonial">
                                    "We booked Hotel Eucalyptus through Mlaku 
                                    and it was easily the
                                    best decision we made for
                                    our trip to Santorini."
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Ubud
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/image/review 2.png" alt="User" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Tsumugi Akari</h3>
                                <p class="testimonial">
                                    "We booked Hotel Eucalyptus through Mlaku 
                                    and it was easily the
                                    best decision we made for
                                    our trip to Santorini."
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Bromo,Malang
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                            I Need Help
                        </a>
                        <a href="{{route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection