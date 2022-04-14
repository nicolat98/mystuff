@extends('layouts.master')

@section('titolo','Send a mail')

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
        <a class="nav-link" href="{{ route('watch.index') }}">{{ trans('labels.watches') }}</a>
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

        <a href="{{ route('cart.index') }}" role="button" class="btn btn-outline-dark button-sm position-relative" style="vertical-align: middle;">
            <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
            <use xlink:href="fonts/bootstrap-icons.svg#cart4"/>
            </svg>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-success">
                {{$num_cart_lines}}
            </span>

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
<form name="message-form" method="post" action="{{route('mail.send')}}" enctype="multipart/form-data">
    @csrf
    <div class="container-sm text-dark" style="margin-top: 3rem; margin-bottom:3rem;">
        <div class="row border-bottom border-dark mb-4">
            <h1>{{ trans('labels.contactUs') }}</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <input id="subject" name="subject" type="text" class="form-control text-2xl mb-4" style="font-size: 150%" placeholder="{{ trans('labels.writeObject') }}">
            </div>
            <div class="col-12">
                <textarea id="email" name="email" rows="10" class="form-control text-2xl mb-4 " style="font-size: 150%" type="email" placeholder="{{ trans('labels.writeEmail') }}"></textarea>   
            </div>
        </div>
        <div class="row">
            <div class="col-0 col-sm-8 col-md-10"></div>
            <div class="col-12 col-sm-4 col-md-2 ">
                <button type="submit" class="btn btn-primary btn-lg btn-send">{{ trans('labels.send') }}</button>
            </div>
        </div>
        
    </div>
</form>
@endsection