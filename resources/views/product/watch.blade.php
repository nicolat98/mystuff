@extends('layouts.master')

@section('titolo','Watch')

@section('navbar')
<!-- LEFT NAVBAR-->
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('smartphone.index') }}">Smartphone</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('computer.index') }}">Computer</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('watch.index') }}">{{ trans('labels.watches') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('faq.index') }}">FAQ</a>
    </li>
</ul>

<!-- RIGHT NAVBAR-->
<ul class="d-flex navbar-nav" style="vertical-align: middle">
    <!-- LOGIN -->
    @auth
    <li class="nav-item mt-1" >
        <a style="vertical-align: middle"><i>{{ trans('labels.welcome') }} {{ Auth::user()->name }}</i></a>
    </li>
    <li class="nav-item mt-1 me-5">
        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <button class="border-0 trasparent-button" style="margin-left:1rem">
                {{ trans('labels.logout') }}
                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="fonts/bootstrap-icons.svg#box-arrow-right"/>
                </svg>
            </button>

        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>

    @else
    <li class="nav-item">
        <a href="{{ route('login') }}">
            <button class="border-0 trasparent-button">
                {{ trans('labels.login') }}
                <svg class="bi" width="22" height="22" fill="currentColor">
                <use xlink:href="fonts/bootstrap-icons.svg#person-circle"/>
                </svg>
            </button>
        </a>
    </li>
    @endauth

    <!-- CART -->
    <li class="nav-item">
        @auth
        @if($num_cart_lines === 0)
        <a href="{{ route('cart.index') }}">
            <button type="button" class="btn btn-outline-dark button-sm position-relative" style="vertical-align: middle;">
                <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
                <use xlink:href="fonts/bootstrap-icons.svg#cart4"/>
                </svg>
            </button>
        </a>
        @else
        <a href="{{ route('cart.index') }}">
            <button type="button" class="btn btn-outline-dark button-sm position-relative" style="vertical-align: middle;">
                <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
                <use xlink:href="fonts/bootstrap-icons.svg#cart4"/>
                </svg>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-success">
                    {{$num_cart_lines}}
                </span>
            </button>
        </a>
        @endif
        @else
        <a href="{{ route('login') }}">
            <button type="button" class="btn btn-outline-dark button-sm position-relative" style="vertical-align: middle;">
                <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
                <use xlink:href="fonts/bootstrap-icons.svg#cart4"/>
                </svg>
            </button>
        </a>
        @endauth
    </li>

    <!-- ORDERS -->
    @auth
    <li class="nav-item me-3">
        <a href="{{ route('orders.index') }}" style="vertical-align: middle">
            <button type="button" class="btn btn-outline-dark button-sm position-relative">
                <svg class="bi" width="32" height="32" fill="currentColor">
                <use xlink:href="fonts/bootstrap-icons.svg#box-seam"/>
                </svg>
            </button>
        </a>
    </li>
    @endauth

</ul>
@endsection

@section('corpo')
<div class="container-fluid" style="padding-bottom:5rem; margin-top: 5rem">
    <div class="row justify-content-center" align="center"> 
        <div class="col-12 col-sm-6">

            <div class="row justify-content-center btn-group btn-circle">

                <button type="button" class="btn wa-color-black btn-circle btn-md border-3 border-dark" onclick='changeImageWA("img/watches/wa-black.png")'></button>
                <button type="button" class="btn wa-color-blue btn-circle btn-md border-3 border-dark" onclick='changeImageWA("img/watches/wa-blue.png")'></button>
                <button type="button" class="btn wa-color-red btn-circle btn-md border-3 border-dark" onclick='changeImageWA("img/watches/wa-red.png")'></button>
                <button type="button" class="btn wa-color-white btn-circle btn-md border-3 border-dark" onclick='changeImageWA("img/watches/wa-white.png")'></button>

            </div>
            <div class="row justify-content-center" style="padding-top:2rem">
                <img src="img/watches/wa-black.png" class="img-responsive img-fluid wa-img"  align="center" id="wa-img">
            </div>
            <div class="row justify-content-center mt-3">
                <b class="fs-3 text-dark">{{$numFeedbacks}} {{ trans('labels.reviews') }}: {{$total_score}}/5.0</b>
                <div class="mb-3" id="feedbackStarsWA" data-rateyo-rating="{{$total_score}}"></div>

            </div>


            <div class='row justify-content-center' style="margin-top:2rem; margin-bottom: 1rem;">
                <div class="row justify-content-center">

                    <label class="display-5 text-dark" id="price">
                        {{ trans('labels.price') }}: € 399.99
                    </label>

                </div>
                <div class="row justify-content-center mt-5">
                    <div class='col-2'>
                        <div class="input-group">
                            <select class="form-select form-control fs-4" id="selectQuantityWA">
                                <option selected value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <!--<div class='col'> 
                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#cart-modal" data-bs-backdrop="static" aria-hidden="true" data-bs-keyboard="false"style="margin-top: 1rem; margin-bottom: 1rem">
                            Aggiungi al carrello
                        </button>
                    </div> 
                    <div class="modal-dialog modal-dialog-centered" id='cart-modal'>
                        <p>ciao</p>
                    </div>-->
                    <div class="col-3" >
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#cart-modal" onclick='changeModalBodyTextWA()'>
                            {{ trans('labels.add') }}
                            <svg class="bi" width="24" height="24" style="margin-left:0.5rem; margin-bottom: 0.5rem" fill="currentColor">
                            <use xlink:href="fonts/bootstrap-icons.svg#bag-plus"/>
                            </svg>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="cart-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">{{ trans('labels.confirmPurchase') }} {{trans('labels.watches')}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div id="modal-confirm-wa" class="modal-body">
                                    </div>
                                    <div class="modal-footer">
                                        <!----------------------------------------------------->                                                    
                                        <form class="form-horizontal" name="watches" method="post" action="{{ route('watch.store') }}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="col-sm-10">
                                                    <input class="form-control hidden" type="text" id="inputNameWA" name="inputNameWA" placeholder="{{ trans('labels.confirm') }}" value="">
                                                    <input class="form-control hidden" type="text" id="inputPriceWA" name="inputPriceWA" placeholder="{{ trans('labels.confirm') }}" value="">
                                                    <input class="form-control hidden" type="text" id="inputCategoryWA" name="inputCategoryWA" platleceholder="{{ trans('labels.confirm') }}" value="">
                                                    <input class="form-control hidden" type="text" id="inputCapacityWA" name="inputCapacityWA" placeholder="{{ trans('labels.confirm') }}" value="">
                                                    <input class="form-control hidden" type="text" id="inputModelWA" name="inputModelWA" placeholder="{{ trans('labels.confirm') }}" value="">
                                                    <input class="form-control hidden" type="text" id="inputAssuranceWA" name="inputAssuranceWA" placeholder="{{ trans('labels.confirm') }}" value="">
                                                    <input class="form-control hidden" type="text" id="inputColorWA" name="inputColorWA" placeholder="{{ trans('labels.confirm') }}" value="">
                                                    <input class="form-control hidden" type="text" id="inputQuantityWA" name="inputQuantityWA" placeholder="{{ trans('labels.confirm') }}" value="">
                                                </div>
                                            </div>

                                            <!------------------------------------------------------------------------------------> 


                                            <div class="form-group">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('labels.cancel') }}</button>
                                                @auth

                                                <button type="submit" class="btn btn-success" style="text-decoration:none; color:white">
                                                    {{ trans('labels.confirm') }}

                                                </button>

                                                @else
                                                <button type="button" class="btn btn-success" style="text-decoration:none; color:white">
                                                    <a href="{{ route('cart.index') }}" style="text-decoration:none; color:white">{{ trans('labels.confirm') }}</a>
                                                </button>
                                                @endauth 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-sm-6 justify-content-center">
            <div class="row justify-content-center mb-5">
                <div class="col col-sm-12">
                    <div class="card" style=" margin-bottom: 0.5rem">
                        <div class="card-header fs-4" align="left">
                            {{ trans('labels.technicalDetails') }}
                        </div>

                        <ul class="list-group list-group-flush fs-5">
                            <li class="list-group-item" align="left">
                                <b>{{ trans('labels.price') }}: </b> 399.99 €
                            </li>
                            <li class="list-group-item" align="left">
                                <b>{{ trans('labels.cassa') }}:</b> {{ trans('labels.cassaInfo') }}
                            </li>
                            <li class="list-group-item" align="left">
                                <b>{{ trans('labels.displayWA') }}:</b> {{ trans('labels.displayInfoWA') }}
                            </li>
                            <li class="list-group-item" align="left">
                                <b>{{ trans('labels.chipWA') }}:</b> {{ trans('labels.chipInfoWA') }}
                            </li>
                            <li class="list-group-item" align="left">
                                <b>{{ trans('labels.batteryWA') }}:</b> {{ trans('labels.batteryInfoWA') }}
                            </li>
                            <li class="list-group-item" align="left"php a>
                                <b>{{ trans('labels.connettivityWA') }}:</b> {{ trans('labels.connettivityInfoWA') }}
                            </li>

                        </ul>

                    </div>
                </div>
            </div>


            @if(count($feedbacks) === 0)

            <div class="row justify-content-center mb-2">
                <span class="my-auto"><b class="text-dark fs-2" align="center">{{ trans('labels.noReviews') }}</b></span>
            </div>

            @elseif(count($feedbacks) === 1)

            <div class="row justify-content-center mb-2">
                <div class="col-12">
                    <div class="card" style=" margin-bottom: 0.5rem">
                        <div class="card-header fs-4">
                            <div class="row">
                                <div class="col-9" align="left">
                                    {{ trans('labels.latestReviews') }}
                                </div>
                                <div class="col-3 " align="right">

                                    <button class="btn fs-5 text-secondary" data-bs-toggle="modal" data-bs-target="#reviews-modal" onclick="updateStarsWA({{count($feedbacks)}})">
                                        {{ trans('labels.all') }}
                                        <svg class="bi" width="20" height="20" fill="currentColor">
                                        <use xlink:href="fonts/bootstrap-icons.svg#chevron-right"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6" align="left"><b class="fs-5" >{{$feedbacks[count($feedbacks)-1]->user->name}}</b></div>
                                    <div class="col-12 col-xl-4" id="userStarsWA1" data-rateyo-rating="{{$feedbacks[count($feedbacks)-1]->score}}"></div>
                                    <div class="col-12 col-xl-2"><b>{{$feedbacks[count($feedbacks)-1]->score}}/5.0</b></div>
                                </div>

                                <div class="row">
                                    <label align="left">{{$feedbacks[count($feedbacks)-1]->comment}}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            @elseif(count($feedbacks) === 2)
            <div class="row justify-content-center mb-2">
                <div class="col-12">
                    <div class="card" style=" margin-bottom: 0.5rem">
                        <div class="card-header fs-4">
                            <div class="row">
                                <div class="col-9" align="left">
                                    {{ trans('labels.latestReviews') }}
                                </div>
                                <div class="col-3 " align="right">

                                    <button class="btn fs-5 text-secondary" data-bs-toggle="modal" data-bs-target="#reviews-modal" onclick="updateStarsWA({{count($feedbacks)}})">
                                        {{ trans('labels.all') }}
                                        <svg class="bi" width="20" height="20" fill="currentColor">
                                        <use xlink:href="fonts/bootstrap-icons.svg#chevron-right"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6" align="left"><b class="fs-5" >{{$feedbacks[count($feedbacks)-1]->user->name}}</b></div>
                                    <div class="col-12 col-xl-4" id="userStarsWA1" data-rateyo-rating="{{$feedbacks[count($feedbacks)-1]->score}}"></div>
                                    <div class="col-12 col-xl-2"><b>{{$feedbacks[count($feedbacks)-1]->score}}/5.0</b></div>
                                </div>

                                <div class="row">
                                    <label align="left">{{$feedbacks[count($feedbacks)-1]->comment}}</label>
                                </div>
                            </li>
                        </ul>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6" align="left"><b class="fs-5" >{{$feedbacks[count($feedbacks)-2]->user->name}}</b></div>
                                    <div class="col-12 col-xl-4" id="userStarsWA2" data-rateyo-rating="{{$feedbacks[count($feedbacks)-2]->score}}"></div>
                                    <div class="col-12 col-xl-2"><b>{{$feedbacks[count($feedbacks)-2]->score}}/5.0</b></div>
                                </div>

                                <div class="row">

                                    <label align="left">{{$feedbacks[count($feedbacks)-2]->comment}}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @elseif(count($feedbacks) === 3)
            <div class="row justify-content-center mb-2">
                <div class="col-12">
                    <div class="card" style=" margin-bottom: 0.5rem">
                        <div class="card-header fs-4">
                            <div class="row">
                                <div class="col-9" align="left">
                                    {{ trans('labels.latestReviews') }}
                                </div>
                                <div class="col-3 " align="right">

                                    <button class="btn fs-5 text-secondary" data-bs-toggle="modal" data-bs-target="#reviews-modal" onclick="updateStarsWA({{count($feedbacks)}})">
                                        {{ trans('labels.all') }}
                                        <svg class="bi" width="20" height="20" fill="currentColor">
                                        <use xlink:href="fonts/bootstrap-icons.svg#chevron-right"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6" align="left"><b class="fs-5" >{{$feedbacks[count($feedbacks)-1]->user->name}}</b></div>
                                    <div class="col-12 col-xl-4" id="userStarsWA1" data-rateyo-rating="{{$feedbacks[count($feedbacks)-1]->score}}"></div>
                                    <div class="col-12 col-xl-2"><b>{{$feedbacks[count($feedbacks)-1]->score}}/5.0</b></div>
                                </div>

                                <div class="row">
                                    <label align="left">{{$feedbacks[count($feedbacks)-1]->comment}}</label>
                                </div>
                            </li>
                        </ul>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6" align="left"><b class="fs-5" >{{$feedbacks[count($feedbacks)-2]->user->name}}</b></div>
                                    <div class="col-12 col-xl-4" id="userStarsWA2" data-rateyo-rating="{{$feedbacks[count($feedbacks)-2]->score}}"></div>
                                    <div class="col-12 col-xl-2"><b>{{$feedbacks[count($feedbacks)-2]->score}}/5.0</b></div>
                                </div>

                                <div class="row" align="left">

                                    <label align="left">{{$feedbacks[count($feedbacks)-2]->comment}}</label>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6" align="left"><b class="fs-5" >{{$feedbacks[count($feedbacks)-3]->user->name}}</b></div>
                                    <div class="col-12 col-xl-4" id="userStarsWA3" data-rateyo-rating="{{$feedbacks[count($feedbacks)-3]->score}}"></div>
                                    <div class="col-12 col-xl-2"><b>{{$feedbacks[count($feedbacks)-3]->score}}/5.0</b></div>
                                </div>

                                <div class="row">

                                    <label align="left">{{$feedbacks[count($feedbacks)-3]->comment}}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @else
            <div class="row justify-content-center mb-2">
                <div class="col-12">
                    <div class="card" style=" margin-bottom: 0.5rem">
                        <div class="card-header fs-4">
                            <div class="row">
                                <div class="col-9" align="left">
                                    {{ trans('labels.latestReviews') }}
                                </div>
                                <div class="col-3 " align="right">

                                    <button class="btn fs-5 text-secondary" data-bs-toggle="modal" data-bs-target="#reviews-modal" onclick="updateStarsWA({{count($feedbacks)}})">
                                        {{ trans('labels.all') }}
                                        <svg class="bi" width="20" height="20" fill="currentColor">
                                        <use xlink:href="fonts/bootstrap-icons.svg#chevron-right"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6" align="left"><b class="fs-5" >{{$feedbacks[count($feedbacks)-1]->user->name}}</b></div>
                                    <div class="col-12 col-xl-4" id="userStarsWA1" data-rateyo-rating="{{$feedbacks[count($feedbacks)-1]->score}}"></div>
                                    <div class="col-12 col-xl-2"><b>{{$feedbacks[count($feedbacks)-1]->score}}/5.0</b></div>
                                </div>

                                <div class="row">
                                    <label align="left">{{$feedbacks[count($feedbacks)-1]->comment}}</label>
                                </div>
                            </li>
                        </ul>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6" align="left"><b class="fs-5" >{{$feedbacks[count($feedbacks)-2]->user->name}}</b></div>
                                    <div class="col-12 col-xl-4" id="userStarsWA2" data-rateyo-rating="{{$feedbacks[count($feedbacks)-2]->score}}"></div>
                                    <div class="col-12 col-xl-2"><b>{{$feedbacks[count($feedbacks)-2]->score}}/5.0</b></div>
                                </div>

                                <div class="row" align="left">

                                    <label align="left">{{$feedbacks[count($feedbacks)-2]->comment}}</label>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6" align="left"><b class="fs-5" >{{$feedbacks[count($feedbacks)-3]->user->name}}</b></div>
                                    <div class="col-12 col-xl-4" id="userStarsWA3" data-rateyo-rating="{{$feedbacks[count($feedbacks)-3]->score}}"></div>
                                    <div class="col-12 col-xl-2"><b>{{$feedbacks[count($feedbacks)-3]->score}}/5.0</b></div>
                                </div>

                                <div class="row">

                                    <label align="left">{{$feedbacks[count($feedbacks)-3]->comment}}</label>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6" align="left"><b class="fs-5" >{{$feedbacks[count($feedbacks)-4]->user->name}}</b></div>
                                    <div class="col-12 col-xl-4" id="userStarsWA4" data-rateyo-rating="{{$feedbacks[count($feedbacks)-4]->score}}"></div>
                                    <div class="col-12 col-xl-2"><b>{{$feedbacks[count($feedbacks)-4]->score}}/5.0</b></div>
                                </div>

                                <div class="row">

                                    <label align="left">{{$feedbacks[count($feedbacks)-4]->comment}}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <!--MODAL REVIEWS-->
            <div class="fade modal" id="reviews-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title text-dark">{{ trans('labels.allReviews') }}</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">

                            @for($i=count($feedbacks); $i>0; $i--)
                            <div class="card" style=" margin-bottom: 0.5rem">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" >
                                        <div class="row">
                                            <div class="col-12 col-xl-3" align="left"><b class="fs-5" >{{$feedbacks[$i-1]->user->name}}</b></div>
                                            <div class="col-12 col-xl-7" id="userStarsWA{{$i+4}}" data-rateyo-rating="{{$feedbacks[$i-1]->score}}"></div>
                                            <div class="col-12 col-xl-2 "><b>{{$feedbacks[$i-1]->score}}/5.0</b></div>
                                        </div>

                                        <div class="row">
                                            <label align="left">{{$feedbacks[$i-1]->comment}}</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            @endfor
                        </div>
                    </div>
                </div>

            </div>
            <!--END MODAL REVIEWS-->

        </div>
    </div>
</div>
@endsection