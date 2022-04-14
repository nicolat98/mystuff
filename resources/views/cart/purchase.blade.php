@extends('layouts.master')

@section('titolo',trans('labels.purchase'))

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
                <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#box-arrow-right"/>
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
                <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#person-circle"/>
                </svg>
            </button>
        </a>
    </li>
    @endauth

    <!-- CART -->
    <li class="nav-item">
        @auth
        @if(count($cart_lines) === 0)
        <a href="{{ route('cart.index') }}">
            <button type="button" class="btn btn-outline-dark button-sm position-relative" style="vertical-align: middle;">
                <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
                <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#cart4"/>
                </svg>
            </button>
        </a>
        @else

        <a href="{{ route('cart.index') }}" role="button" class="btn btn-outline-dark button-sm position-relative" style="vertical-align: middle;">
            <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
            <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#cart4"/>
            </svg>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-success">
                {{count($cart_lines)}}
            </span>

        </a>
        @endif
        @else
        <a href="{{ route('login') }}">
            <button type="button" class="btn btn-outline-dark button-sm position-relative" style="vertical-align: middle;">
                <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
                <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#cart4"/>
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
                <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#box-seam"/>
                </svg>
            </button>
        </a>
    </li>
    @endauth

</ul>
@endsection

@section('corpo')
<div class="container-sm" style="margin-top: 3rem; margin-bottom:3rem;">
    <div class="row justify-content-center">
        <div class="col-0 col-sm-3 d-none d-sm-block">
            <ul id="breadcrumb"  class="nav flex-column" align="center">
                <div id="bc2" >
                    <li class="nav-item mb-3">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <a href="{{route('cart.index')}}"><button type="button" class="btn btn-outline-primary btn-circle btn-lg"><b>1</b></button></a>
                            </div>
                            <div class="col-8 fs-4 my-auto text-dark" align="start">
                                {{trans('labels.cart')}}
                            </div>
                        </div>
                    </li>
                    <li class="nav-item mb-3">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <svg id="svgArrow1" class="bi text-primary" width="40" height="40" fill="currentColor">
                                <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#arrow-down"/>
                                </svg>
                            </div>
                            <div class="col-8 fs-4 my-auto" align="start">

                            </div>
                        </div>

                    </li>

                    <li class="nav-item mb-3">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <button id="btnShipment" type="button" class="btn btn-primary btn-circle btn-lg" onclick="activateShipmentForm()"><b>2</b></button>
                            </div>
                            <div id="textShipment" class="col-8 fs-4 my-auto text-dark" align="start">
                                {{trans('labels.shipment')}}
                            </div>
                        </div>
                    </li>
                </div>

                <div id="bc3">
                    <li class="nav-item mb-3">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <svg id="svgArrow2" class="bi text-secondary" width="40" height="40" fill="currentColor">
                                <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#arrow-down"/>
                                </svg>
                            </div>
                            <div class="col-8 fs-4 my-auto" align="start">

                            </div>
                        </div>

                    </li>

                    <li class="nav-item mb-3">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <button id="btnPayment" disabled type="button" class="btn btn-outline-secondary btn-circle btn-lg" onclick="activatePaymentForm()"><b>3</b></button>
                            </div>
                            <div id="textPayment" class="col-8 fs-4 my-auto" align="start">
                                {{trans('labels.payment')}}
                            </div>
                        </div>
                    </li>
                </div>
                <div id="bc4">
                    <li class="nav-item mb-3">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <svg id="svgArrow3" class="bi text-secondary" width="40" height="40" fill="currentColor">
                                <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#arrow-down"/>
                                </svg>
                            </div>
                            <div class="col-8 fs-4 my-auto" align="start">

                            </div>
                        </div>

                    </li>

                    <li class="nav-item mb-3">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <button id="btnSummary" disabled type="button" class="btn btn-outline-secondary btn-circle btn-lg"><b>4</b></button>
                            </div>
                            <div id="textSummary" class="col-8 fs-4 my-auto" align="start">
                                {{trans('labels.summary')}}
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
        </div>

        <div class="col-12 col-sm-9">

            <div id="msg_valid_card" class="alert alert-success popup-message alert-dismissible fs-5 align-items-center" data-bs-dismiss="alert" role="alert">

                <svg class="bi flex-shrink-0 me-2" width="32" height="32" fill="currentColor">
                <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#check2-circle"/>
                </svg>
                <label id="msg_valid_card_text"></label>
            </div>
            
            <div id="msg_not_valid_card" class="alert alert-danger popup-message alert-dismissible fs-5 align-items-center" data-bs-dismiss="alert" role="alert">

                <svg class="bi flex-shrink-0 me-2" width="32" height="32" fill="currentColor">
                <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#x-circle-fill"/>
                </svg>
                <label id="msg_not_valid_card_text"></label>
            </div>


            <form id="orderInfoForm" method="post" action="{{ route('orders.store') }}" enctype="multipart/form-data">  
                @csrf
                <div class="row">
                    <div class="card">
                        <div id="shipmentForm" class="card-body form-group collapse show" aria-expanded="true">
                            <div class="row">

                                <h1 class="card-title text-dark">{{trans('labels.inputShipmentInfo')}}</h1>
                            <!--<svg class="bi text-dark" width="32" height="32" fill="currentColor">
                            <use xlink:href="fonts/bootstrap-icons.svg#truck"/>
                            </svg>-->
                            </div>

                            <div class="row mb-2">
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="nameInput">{{ trans('labels.name') }}</label>
                                    <input type="text" class="form-control " name="nameInput" id="nameInput" placeholder="Mario" style="font-size:18pt;" >
                                    <!--<div class="valid-feedback">
                                        Looks good!
                                    </div>-->
                                    <div class="invalid-feedback">
                                        {{trans('labels.invalidInput')}}
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="surnameInput">{{ trans('labels.surname') }}</label>
                                    <input type="text" class="form-control" name="surnameInput" id="surnameInput" placeholder="Rossi" style="font-size:18pt;" >
                                    <div class="invalid-feedback">
                                        {{trans('labels.invalidInput')}}
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <label class="fs-5 mb-1 text-dark" for="streetInput">{{ trans('labels.streetAddress') }}</label>
                                    <input type="text" class="form-control" name="streetInput" id="streetInput" placeholder="Via Roma 10" style="font-size:18pt;" >
                                    <div class="invalid-feedback">
                                        {{trans('labels.invalidInput')}}
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="cityInput">{{ trans('labels.city') }}</label>
                                    <input type="text" class="form-control" name="cityInput" id="cityInput" placeholder="Quinzano D'Oglio" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        {{trans('labels.invalidInput')}}
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="capInput">CAP</label>
                                    <input type="text" class="form-control" name="capInput" id="capInput" placeholder="25027" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        {{trans('labels.invalidInputCAP')}}
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="provinceInput">{{ trans('labels.province') }}</label>
                                    <input type="text" class="form-control" name="provinceInput" id="provinceInput" placeholder="BS" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        {{trans('labels.invalidInput')}}
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="countryInput">{{ trans('labels.country') }}</label>
                                    <input type="text" class="form-control" name="countryInput" id="countryInput" placeholder="Italy" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        {{trans('labels.invalidInput')}}
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="mailInput">Mail</label>
                                    <input readonly type="text" class="form-control" name="mailInput" id="mailInput" value="{{Auth::user()->email}}" style="font-size:18pt;">

                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="cellNumberInput">{{ trans('labels.cellNumber') }}</label>
                                    <input type="text" class="form-control" name="cellNumberInput" id="cellNumberInput" placeholder="012 345 6789" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        {{trans('labels.invalidInputCellNumber')}}
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-0 col-sm-10"></div>
                                <div class="col-12 col-sm-2 my-auto ">
                                    <button type="button" class="btn btn-success float-end mt-2 btn-lg" data-bs-toggle="collapse" onclick="checkInputShipment()">
                                        <span id="shipmentBtnText" class="my-auto">{{ trans('labels.next') }}</span>
                                        <span id="shipmentSpinner" hidden class="spinner-border my-auto spinner-border-md" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>


                        </div>

                        <div id="collapsePaymentForm" class="card-body form-group collapse hide">
                            <div class="row">

                                <h1 class="card-title text-dark">{{trans('labels.inputPurchaseInfo')}}</h1>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="nameInputPay">{{ trans('labels.name') }}</label>
                                    <input type="text" class="form-control" name="nameInputPay" id="nameInputPay" placeholder="Mario" style="font-size:18pt;" >
                                    <div class="invalid-feedback">
                                        {{trans('labels.invalidInput')}}
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="surnameInputPay">{{ trans('labels.surname') }}</label>
                                    <input type="text" class="form-control" name="surnameInputPay" id="surnameInputPay" placeholder="Rossi" style="font-size:18pt;" >
                                    <div class="invalid-feedback">
                                        {{trans('labels.invalidInput')}}
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-2">
                                <div class="col-12">
                                    <label class="fs-5 mb-1 text-dark" for="cardNumberInput">{{ trans('labels.cardNumber') }}</label>
                                    <input type="text" class="form-control" name="cardNumberInput" id="cardNumberInput" placeholder="1234 1234 1234 1234" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        {{trans('labels.invalidInput')}}
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="expirationInput">{{ trans('labels.cardExpiration') }}</label>
                                    <input type="text" class="form-control" name="expirationInput" id="expirationInput" placeholder="01/26" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        {{trans('labels.invalidInput')}}
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="cvvInput">CVV</label>
                                    <input type="text" class="form-control" name="cvvInput" id="cvvInput" placeholder="123" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        {{trans('labels.invalidInput')}}
                                    </div>

                                </div>




                            </div>
                            <div class="row mb-2">
                                <div class="col-0 col-sm-8"></div>
                                <div class="col-6 col-sm-2 ">
                                    <button type="button" class="btn btn-secondary float-end mt-2 btn-lg" onclick="activateShipmentForm()">{{ trans('labels.back') }}</button>
                                </div>
                                <div class="col-6 col-sm-2 ">
                                    <button type="button" class="btn btn-success float-end mt-2 btn-lg" onclick="checkInputPurchase()">
                                        <span id="purchaseBtnText" class="my-auto">{{ trans('labels.next') }}</span>
                                        <span id="purchaseSpinner" hidden class="spinner-border my-auto spinner-border-md" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div id="collapseSummaryForm" class="card-body collapse hide">
                            <div class="row mb-3">
                                <h1 class="card-title text-dark">{{ trans('labels.summary') }}</h1>
                            </div>
                            <div class="row">
                                <table class="table text-uppercase table-hover table-responsive table-bordered fs-5">

                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ trans('labels.product') }}</th>
                                            <th scope="col">{{ trans('labels.quantity') }}</th>
                                            <th scope="col">{{ trans('labels.totalPrice') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @php($j=1)
                                        @php($total=0)
                                        @foreach ($cart_lines as $cart_line)

                                        @if($cart_line->id_cart == $id_cart)

                                        @php($total = $total + $cart_line->total_price)

                                        <tr>
                                            <th scope="row">{{$j}}</th>
                                            <td>{{$cart_line->product->name}}</td>
                                            <td>{{$cart_line->quantity}}</td>
                                            <td>{{$cart_line->total_price}} €</td>
                                        </tr>
                                        @php($j=$j+1)
                                        @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="noborders"></td>
                                            <th class="text-right" scope="row">{{$total}} €</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="row mb-2">
                                <div class="col-0 col-sm-7"></div>
                                <div class="col-12 col-sm-2 ">
                                    <button type="button" class="btn btn-secondary float-end mt-2 btn-lg" onclick="activatePaymentForm()">{{ trans('labels.back') }}</button>
                                </div>
                                <div class="col-12 col-sm-3 ">
                                    <!--<button type="button" class="btn btn-success float-end mt-2 btn-lg" onclick="event.preventDefault(); confirm_order(this)">{{ trans('labels.confirm') }} {{ strtolower(trans('labels.order')) }}</button>-->
                                    <button type="button" class="btn btn-success float-end mt-2 btn-lg" data-bs-toggle="modal" data-bs-target="#confirm-order-modal">{{ trans('labels.confirm') }} {{ strtolower(trans('labels.order')) }}</button>
                                    <input hidden type="text" class="form-control" name="idCartInput" id="idCartInput" value="{{$id_cart}}">

                                    <div class="modal fade" id="confirm-order-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div id="modal-confirm-sp" class="modal-body" align="center">
                                                    <h4 class="mb-4 text-dark" id="textAskConfirmOrder">{{ trans('labels.askConfirmOrder') }}</h4>
                                                    <h4 class="mb-4 text-dark" id="textLoading" hidden>{{ trans('labels.loading') }}...</h4>
                                                    <h4 class="mb-4 text-success" id="textOrderConfirmed" hidden>{{ trans('labels.orderConfirmed') }}</h4>
                                                    <div id="svgBoxConfirmOrder">
                                                        <svg class="bi text-dark" width="50" height="50" fill="currentColor">
                                                        <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#box-seam"/>
                                                        </svg> 
                                                    </div>

                                                    <div id="spinnerConfirmOrder" hidden class="spinner-border text-dark" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                    <div id="svgCheckConfirmOrder" hidden>
                                                        <svg class="bi text-success" width="50" height="50" fill="currentColor">
                                                        <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#check-circle"/>
                                                        </svg> 
                                                    </div>

                                                </div>
                                                <div id="modalFooter" class="modal-footer">
                                                    <div>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('labels.cancel') }}</button>
                                                        <button type="button" class="btn btn-success" style="text-decoration:none; color:white" onclick="confirmOrder()">
                                                            {{ trans('labels.confirm') }}

                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection
<!--
<div class="row mb-2">
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
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="cardNumberInput" placeholder="name@example.com">
        <label class="fs-5" for="cardNumberInput" style='margin-left: 1rem'>{{ trans('labels.cardNumber') }}</label>
    </div>
</div>-->