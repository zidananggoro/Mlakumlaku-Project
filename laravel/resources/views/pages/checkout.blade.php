@extends('layouts.checkout')
@section('title','checkout')

@section('content')
<main>
        <section class="section-details-header"></section>
            <section class="section-details-content">
                <div class="container">
                    <div class="row">
                        <div class="col p-0">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        Paket Travel
                                    </li>
                                    <li class="breadcrumb-item">
                                        Details
                                    </li>
                                    <li class="breadcrumb-item active">
                                        Checkout
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 pl-lg-0">
                            <div class="card card-details">
                            @if($errors->any())
                                <div class="alert alert-denger">
                                <ul>
                                     @foreach(@errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                <h1>Who's Going ? </h1>
                                <p>
                                   
                                </p>
                                <div class="attendee">
                                    <table class="table table-responsive-sm-text-center">
                                        <thead>
                                            <tr>
                                                <td>Picture</td>
                                                <td>Name</td>
                                                <td>Nationality</td>
                                                <td>Visa</td>
                                                <td>Passport</td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($item->details as $detail)
                                            <tr>
                                                <td>
                                                    <img src="https://ui-avatars.com/api/?name={{$detail->username}}" height="60" class="rounded-circle">
                                                </td>
                                                <td class="align-middle">
                                                    {{$detail->username}}
                                                </td>
                                                <td class="align-middle">
                                                    {{$detail->nationality}}
                                                </td>
                                                <td class="align-middle">
                                                    {{$detail->is_visa ? '30 days' : 'N/A' }}
                                                </td>
                                                <td class="align-middle">
                                                    {{\Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive'}}
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{route('checkout-remove', $detail->id )}}"><img src="{{url('frontend/image/Path 7.png')}}" alt=""></a>
                                                </td>
                                                
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td colspa="6" class="text-center">
                                                        No Visitor
                                                    </td>
                                                </tr>
                                            @endforelse
                                            
                                        </tbody>
                                    </table>
                                 </div>
                                 <div class="member mt-3">
                                     <h2>Add Member</h2>
                                     <form class="form-inline" method="post" action="{{route('checkout-create',$item->id)}}">
                                            @csrf
                                         <label for="username"  class="sr-only">Name</label>
                                         <input type="text" name="username" class="from-control mb-2 mr-sm-2" id="username" required placeholder="Username">

                                         <label for="nationality"  class="sr-only">Nationality</label>
                                         <input type="text" name="nationality" class="from-control mb-2 mr-sm-2" style="width: 50px" id="nationality" required placeholder="Nationality">
                                         
                                         <label for="is_visa" class="sr-only">Visa</label>
                                         <select name="is_visa" id="is_visa" required class="custom-select mb-2 mr-sm-2">
                                             <option value="" selected>Visa</option>
                                             <option value="1">30 Days</option>
                                             <option value="0">N/A</option>
                                         </select>
                                         
                                         <label for="doe_passport" class="sr-only">DOE Passport</label>
                                         <div class="input-group mb-2 mr-sm-2">
                                             <input type="text" class="from-control datepicker" name="doe_passport" id="doe_passport" placeholder="DOE Passport">
                                         </div>

                                        <button type="submit" class="btn btn-add-now mb-2 px-4">
                                            Add Now 
                                        </button>
                                     </form>
                                     <h3 class="mt-2 mb-0">Note</h3>
                                     <p class="disclaimer mb-0">
                                        You are only able to invite member that has registered in Mlaku Mlaku
                                     </p>
                                 </div>
                            </div> 
                        </div>
                        <div class="col-lg-4">
                             <div class="card card-details card-right">                                
                                 <h2>Trip Information</h2>
                                 <table class="trip-information">
                                     <tr>
                                         <th width="50%">Members</th>
                                         <td width="50%" class="text-right">
                                            {{$item->details->count()}} person
                                         </td>
                                     </tr>
                                     <tr>
                                        <th width="50%">Additional Visa</th>
                                        <td width="50%" class="text-right">
                                            $ {{$item-> additional_visa }},,00
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Trip Price</th>
                                        <td width="50%" class="text-right">
                                            $ {{$item->travel_package->price }},00 / person
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Total Price</th>
                                        <td width="50%" class="text-right">
                                            $ {{$item->transaction_total}}, 00
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Total Pay (+Unique)</th>
                                        <td width="50%" class="text-right text-total">
                                            <span class="text-blue">${{$item->transaction_total }},</span>
                                            <span class="text-orange"></span>
                                        </td>
                                    </tr>
                                 </table>
                                <hr>
                                <h2>Payment Intructions</h2>
                                <p class="paymet-intructions">
                                    Please Complete the payment before you 
                                    continue the Trip
                                </p>
                                <br>
                                <div class="bank">
                                    <div class="bank-item pb-4">
                                        <img src="{{url('frontend/image/Group 17.png')}}" alt="" class="bank-image">
                                        <div class="description">
                                            <h3>Pt Mlaku ID</h3>
                                            <p>
                                                0829 0999 8390
                                                <br>
                                                Bank Central Asia 
                                            </p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="bank-item pb-4">
                                        <img src="{{url('frontend/image/Group 17.png')}}" alt="" class="bank-image">
                                        <div class="description">
                                            <h3>Pt Mlaku ID</h3>
                                            <p>
                                                0853 3116 4966
                                                <br>
                                                Bank Titil
                                            </p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                             </div>
                             <div class="join-container">
                                 <a href="{{route('checkout-success',$item->id)}}" class="btn btn-block btn-join-now mt-0 py-3">
                                     I have Paid
                                 </a>
                             </div>
                             <div class="text-center mt-3">
                                 <a href="{{route('detail',$item->travel_package->slug)}}" class="text-muted">
                                     Cancel Booking
                                 </a>
                             </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>
@endsection

@push('prepend-style')
    link rel="stylesheet" href="{{url('frontend/libaries/combined/css/gijgo.min.css')}}">
@endpush

@push('addon-script')
<script src="frontend/libaries/combined/js/gijgo.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            icons :{
                rightIcon : '<img src="{{url('frontend/image/Group 16@2x.png')}}" />'
            }
        });
    });
    </script>
@endpush