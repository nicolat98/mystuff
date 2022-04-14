@extends('layouts.master')

@section('titolo','Cart')

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

        @php($num_cart_lines = count($cartLines))
        @if($num_cart_lines === 0)
        <a href="{{ route('cart.index') }}">
            <button type="button" class="btn btn-dark button-sm position-relative" style="vertical-align: middle;">
                <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
                <use xlink:href="fonts/bootstrap-icons.svg#cart4"/>
                </svg>
            </button>
        </a>
        @else
        <a href="{{ route('cart.index') }}">
            <button type="button" class="btn btn-dark button-sm position-relative" style="vertical-align: middle;">
                <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
                <use xlink:href="fonts/bootstrap-icons.svg#cart4"/>
                </svg>
                <span id="cartBadge" class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-success">
                    {{$num_cart_lines}}
                </span>
            </button>
        </a>
        @endif
        @else
        <a href="{{ route('login') }}">
            <button class="border-0 trasparent-button">
                <svg class="bi" width="32" height="32" fill="currentColor">
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


<div class="container-sm" style="margin-top: 3rem; margin-bottom:3rem;">

    <div id="msg_success" class="alert alert-success popup-message alert-dismissible fs-5 align-items-center" data-bs-dismiss="alert" role="alert">

        <svg class="bi flex-shrink-0 me-2" width="32" height="32" fill="currentColor">
        <use xlink:href="fonts/bootstrap-icons.svg#check2-circle"/>
        </svg>
        <label id="msg_success_text"></label>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div id="msg_success_order" class="alert alert-success popup-message alert-dismissible fs-5 align-items-center" data-bs-dismiss="alert" role="alert">

        <svg class="bi flex-shrink-0 me-2" width="32" height="32" fill="currentColor">
        <use xlink:href="fonts/bootstrap-icons.svg#check2-circle"/>
        </svg>
        <label id="msg_success_text_order"></label>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="row border-bottom border-dark mb-4 text-uppercase text-dark">
        <h1>{{ trans('labels.cart') }}</h1>
    </div>

    @if (count($cartLines) === 0)
    <div class="row" style="margin-top: 10rem; margin-bottom: 10rem;">
        <svg class="bi text-ligth img-responsive" width="100" height="100" style="margin-bottom: 3rem">
        <use xlink:href="fonts/bootstrap-icons.svg#cart4"/>
        </svg>
        <h1 class="display-2" align="center" >{{ trans('labels.emptyCart') }}</h1>
    </div>
    @else
    <ul id="ulID" class="list-group">

        @php($total_price = 0) 

        @foreach($cartLines as $cart_line)
        @php($id_cart = $cart_line->id_cart)

        <!--@if($cart_line->cart->confirm_date === null)
            @php($id_cart = $cart_line->id_cart)
        @endif-->



        <!-- assegnare ad id_cart l'id del carrello non confermato e visualizzato   -->

        @php($total_price = $total_price + $cart_line->total_price)


        <li id="li{{$cart_line->id}}" class="list-group-item d-flex justify-content-between align-items-start">

            <div class="row ms-2 me-auto">
                <div class="col-xs-12 col-sm-4 fw-bold" align="center" style="border-right: solid; border-right-width: 1.5px; border-right-color: lightgrey">
                    @if($cart_line->product->id_category === 1)
                    <img src="img/smartphones/sp-{{ strtolower($cart_line->product->color) }}.png" class="img-thumbnail img-responsive border-0" width="60%" height="60%" align="center">
                    @elseif($cart_line->product->id_category === 2)
                    <img src="img/computers/pc-{{ strtolower($cart_line->product->color) }}.png" class="img-thumbnail img-responsive border-0" style="margin-top: 3rem" width="70%" height="70%" align="center">
                    @elseif($cart_line->product->id_category === 3)
                    <img src="img/watches/wa-{{ strtolower($cart_line->product->color) }}.png" class="img-thumbnail img-responsive border-0" style="margin-top: 3rem;" width="70%" height="70%" align="center">
                    @endif
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row" style="margin-bottom: 1rem; margin-top: 1rem">
                        <h4>{{ trans('labels.productCode') }}: {{ $cart_line->product->name }}</h5>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    {{ trans('labels.category') }}: 
                                    @if($cart_line->product->id_category === 1)
                                    Smartphone
                                    @elseif($cart_line->product->id_category === 2)
                                    Computer
                                    @elseif($cart_line->product->id_category === 3)
                                    Smartwatch
                                    @endif

                                </li>
                                @if($cart_line->product->id_category !== 3)
                                <li class="list-group-item">
                                    {{ trans('labels.capacity') }}: {{ $cart_line->product->capacity }} GB
                                </li>
                                <li class="list-group-item">
                                    {{ trans('labels.color') }}: {{ $cart_line->product->color }}
                                </li>
                                @else
                                <li class="list-group-item">
                                    {{ trans('labels.color') }}: {{ $cart_line->product->color }}
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-group">
                                @if($cart_line->product->id_category !== 3)
                                <li class="list-group-item">
                                    {{ trans('labels.model') }}: {{ $cart_line->product->model }}"
                                </li>
                                <li class="list-group-item">
                                    @if( $cart_line->product->assurance === 0 )
                                    <label>{{ trans('labels.assurance') }}: {{ trans('labels.no') }}</label>
                                    @else
                                    <label>{{ trans('labels.assurance') }}: {{ trans('labels.yes') }}</label>
                                    @endif
                                </li>


                                @endif
                                <li class="list-group-item">
                                    {{ trans('labels.quantity') }}: {{ $cart_line->quantity }} <!--{{ $cart_line->id }} -->
                                    @php($id = $cart_line->id)


                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2rem;">
                        <div class="col-sm-10">
                            @if($cart_line->quantity === 1)
                            <h4>{{ trans('labels.price') }}: {{ $cart_line->total_price }} €</h4>
                            @else
                            <h4>{{ trans('labels.price') }}: {{ $cart_line->product->price }} € x {{ $cart_line->quantity }} = {{ $cart_line->total_price }} €</h4>
                            @endif
                        </div>
                        <div class="col-sm-2">
                            <!--
                            <button type="submit" id="buttonRemove+{{$id}}" name="buttonRemove+{{$id}}" class="btn btn-danger btn-md" data-bs-toggle="modal" data-bs-target="#cart-modal" onclick="setCurrentProduct({{$cart_line->id }})">
                                
                                {{ trans('labels.remove') }}

                            </button> {{route('cartLine.destroy', ['id' => $cart_line->id])}}-->

                            <button id="buttonRemove" class="btn btn-danger btn-md"  onclick="event.preventDefault(); confirm_product_deletion(this, {{$cart_line->id}})">         
                                {{ trans('labels.remove') }}
                            </button>
                        </div>



                    </div>
                </div>
            </div>
            <!--<span class="badge bg-dark fs-6 rounded-pill ">{{ $cart_line->add_date }}</span>-->
        </li>
        @endforeach

    </ul>

    <div id="lastRowCart" class="row" style="margin-bottom: 1rem; margin-top: 3rem;">
        <div class="col-xs-12 col-sm-9" >
            <label class="display-5 text-dark">{{ trans('labels.totalPrice') }}: <b id="totalPriceCart">{{ number_format($total_price, 2, '.', '') }}</b><b> €</b></label>

        </div>
        <div class="col-xs-12 col-sm-3 " >

            <!--<button id="orderButton" href="" class="fs-4 btn btn-border btn-success btn-lg shadow"aria-expanded="true" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePurchaseForm" style="text-decoration:none; color: white; vertical-align: middle; width: 100%;" onclick="disableButton('orderButton')" >{{ trans('labels.placeOrder')}}-->
            <a href="{{route('cart.purchase', ['id' => $id_cart])}}" class="fs-4 btn btn-success btn-lg shadow" style="text-decoration:none; color: white; vertical-align: middle; width: 100%;" onclick="event.preventDefault(); confirm_button(this)">{{ trans('labels.placeOrder')}}
                <svg class="bi" width="32" height="32" fill="currentColor">
                <use xlink:href="fonts/bootstrap-icons.svg#cart-check"/>
                </svg>
            </a>

        </div>
    </div>

    <!--HIDDEN CART ELEMENT -->
    <div id="hiddenCartEmpty" class="row popup-message" style="margin-top: 10rem; margin-bottom: 10rem;">
        <svg class="bi text-ligth img-responsive" width="100" height="100" style="margin-bottom: 3rem">
        <use xlink:href="fonts/bootstrap-icons.svg#cart4"/>
        </svg>
        <h1 class="display-2" align="center" >{{ trans('labels.emptyCart') }}</h1>
    </div>
    <!--HIDDEN CART ELEMENT -->
    <!--
    <div id="collapsePurchaseForm" class="row collapse">
        <form name="purchaseForm" method="post" action="" enctype="multipart/form-data">  
            @csrf
            <div class="card">
                <div class="card-body form-group">
                    <h3 class="card-title">Inserisci dati per l'acquisto</h3>



                    <div class="row">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nameInput" placeholder="name@example.com">
                            <label class="fs-5" for="nameInput" style='margin-left: 1rem'>{{ trans('labels.name') }}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="surnameInput" placeholder="name@example.com">
                            <label class="fs-5" for="surnameInput" style='margin-left: 1rem'>{{ trans('labels.surname') }}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="streetInput" placeholder="name@example.com">
                            <label class="fs-5" for="streetInput" style='margin-left: 1rem'>{{ trans('labels.streetAddress') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="capInput" placeholder="name@example.com">
                                <label class="fs-5" for="capInput" style='margin-left: 1rem'>CAP</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="cityInput" placeholder="name@example.com">
                                <label class="fs-5" for="cityInput" style='margin-left: 1rem'>{{ trans('labels.city') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="countryInput" placeholder="name@example.com">
                            <label class="fs-5" for="countryInput" style='margin-left: 1rem'>{{ trans('labels.country') }}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="cellNumberInput" placeholder="name@example.com">
                            <label class="fs-5" for="cellNumberInput" style='margin-left: 1rem'>{{ trans('labels.cellNumber') }}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="cardNumberInput" placeholder="name@example.com">
                            <label class="fs-5" for="cardNumberInput" style='margin-left: 1rem'>{{ trans('labels.cardNumber') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="expirationInput" placeholder="name@example.com">
                                <label class="fs-5" for="expirationInput" style='margin-left: 1rem'>{{ trans('labels.cardExpiration') }}</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="cvvnput" placeholder="name@example.com">
                                <label class="fs-5" for="cvvInput" style='margin-left: 1rem'>CVV</label>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('labels.close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('labels.send') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>-->
    @endif
</div>




<!--
<div class="container-sm" style="margin-top: 3rem; margin-bottom:3rem;">
    
    <ul class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            
            <div class="row ms-2 me-auto">
                <div class="col-xs-12 col-sm-4 fw-bold" align="center" style="border-right: solid; border-right-width: 1.5px; border-right-color: lightgrey">
                        <img src="img/mara.png" class="img-thumbnail img-responsive border-0" width="60%" height="60%" align="center">
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row" style="margin-bottom: 1rem; margin-top: 1rem">
                        <h4>Mara Tirelli</h5>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Nazionalità: Italiana
                                    
                                </li>
                                <li class="list-group-item">
                                    Anno di nascita: 2001
                                </li>
                                <li class="list-group-item">
                                    Altezza: 1,70 m
                                    
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Carnagione: Chiara
                                </li>
                                <li class="list-group-item">
                                    Qualità: Ottima
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 text-center">
                            <h1 style="margin-top: 7rem">Prezzo: 999,99 €</h1>
                        </div>
                        <div class="col-sm-4 right">
                            <button style="margin-top: 7rem" type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#cart-modal" onclick='changeModalText()'>
                                Aggiungi al carrello   
                            </button> 
                        </div>
                    </div>
                   
                </div>
            </div>
            
            <span class="badge bg-danger rounded-pill">Offerta</span>
            
        </li>
    </ul>
</div> -->
@endsection
