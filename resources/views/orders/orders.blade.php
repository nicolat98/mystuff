@extends('layouts.master')

@section('titolo','Orders')

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
            <button type="button" class="btn btn-dark button-sm position-relative">
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
<div class="container mt-5 mb-5">


    @if(Auth::user()->name === "admin")

    @if(count($orders) === 0)
    <div class="row border-bottom text-dark border-dark mb-4 text-uppercase">
        <h1>{{ trans('labels.allOrders') }}</h1>
    </div>

    <div class="row" style="margin-top: 10rem; margin-bottom: 10rem;">
        <svg class="bi text-ligth img-responsive" width="100" height="100" style="margin-bottom: 3rem">
        <use xlink:href="fonts/bootstrap-icons.svg#box-seam"/>
        </svg>
        <h1 class="display-2" align="center" >{{ trans('labels.noOrders') }}</h1>
    </div>
    @else

    <div class="row border-bottom text-dark border-dark mb-4 text-uppercase">
        <h1>{{ trans('labels.allOrders') }}</h1>
    </div>
    <div class="row mb-1">
        <div class="col-12 col-sm-3">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelectStatus">{{ trans('labels.status') }}</label>
                <select class="form-select" id="inputGroupSelectStatus" onchange="statusSelection()">
                    <option value="0">{{ trans('labels.all') }}</option>
                    <option value="1">{{trans('labels.purchased')}}</option>
                    <option value="2">{{trans('labels.takingCharge')}}</option>
                    <option value="3">{{trans('labels.sent')}}</option>
                    <option value="4">{{trans('labels.delivered')}}</option>
                </select>
            </div>
        </div>
        <div class="col-0 col-sm-9"></div>
    </div>

    @php($i=1)
    @php($a=0)
    <ol class="list-group">
        @foreach ($orders as $order)

        @php($totalPrice = 0)
        @php($numProducts = 0)
        @foreach ($orders_lines as $order_line)
        @if($order_line->id_cart == $order->id)
        @php($numProducts = $numProducts + 1)
        @php($totalPrice = $totalPrice + $order_line->total_price)
        @endif
        @endforeach

        @foreach ($shipments as $shipment)
        @if($shipment->id_cart == $order->id)
        @php($status = $shipment->status)
        @endif
        @endforeach

        <div id="selectedItem{{$order->id}}s{{$status}}">
            <li id="li{{$order->id}}" class="list-group-item list-group-item-secondary">
                <div class="row my-auto mt-1 mb-1">
                    <div class="col-12 col-sm-3 fs-5 my-auto">
                        <b>{{ trans('labels.name') }}: </b>{{$order->user->name}}<br>
                        <b>{{ trans('labels.orderID') }}: </b>{{$order->id}}
                    </div>
                    <div class="col-12 col-sm-3 fs-5 my-auto">

                        <b>{{ trans('labels.status') }}: </b>
                        @if($status == 0)
                        <span id="span1{{$order->id}}">{{ strtoupper(trans('labels.purchased')) }}</span><br>
                        @elseif($status == 1)
                        <span id="span1{{$order->id}}">{{ strtoupper(trans('labels.takingCharge')) }}</span><br>
                        @elseif($status == 2)
                        <span id="span1{{$order->id}}">{{ strtoupper(trans('labels.sent')) }}</span><br>
                        @elseif($status == 3)
                        <span id="span1{{$order->id}}">{{ strtoupper(trans('labels.delivered')) }}</span><br>
                        @endif
                        <b>{{ trans('labels.purchaseDate') }}: </b>{{$order->confirm_date}}
                    </div>
                    <div class="col-12 col-sm-3 fs-5 my-auto">
                        <b>{{ trans('labels.numProducts') }}: </b>{{$numProducts}}<br>
                        <b>{{ trans('labels.totalPrice') }}: </b>{{$totalPrice}} €
                    </div>

                    <div class="col-12 col-sm-3 my-auto d-flex align-items-end flex-column">
                        <button class="btn border-dark fs-5 my-auto" id="button{{$order->id}}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$order->id}}" aria-controls="collapseExample" onclick="changeIcon({{$order->id}})">
                            <span class="me-1">{{ trans('labels.details') }}</span>
                            <svg id="bi{{$order->id}}" class="bi my-auto" width="20" height="20" fill="currentColor">
                            <use id="icon{{$order->id}}" xlink:href="fonts/bootstrap-icons.svg#plus-lg"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </li>

            <li class="collapse list-group-item" id="collapse{{$order->id}}" style="background-color: #f8f9fa">
                <!--
                <div class="row text-uppercase">
                    <h3>{{ trans('labels.orderDetails') }}</h3>
                </div>-->
                @foreach ($shipments as $shipment)
                @if($shipment->id_cart == $order->id)
                @php($thisShipment = $shipment)
                @php($status = $shipment->status)
                @endif
                @endforeach

                <div class="card card-body mb-3 mt-1">
                    <div class="row mt-3 mb-3">
                        <div class="col-12 col-sm-4 fs-3 my-auto" align="center">
                            @if($status == 0)
                            <b>{{ trans('labels.status') }}: </b><span id="span2{{$order->id}}">{{ strtoupper(trans('labels.purchased')) }}</span>
                            @elseif($status == 1)
                            <b>{{ trans('labels.status') }}: </b><span id="span2{{$order->id}}">{{ strtoupper(trans('labels.takingCharge')) }}</span>
                            @elseif($status == 2)
                            <b>{{ trans('labels.status') }}: </b><span id="span2{{$order->id}}">{{ strtoupper(trans('labels.sent')) }}</span>
                            @elseif($status == 3)
                            <b>{{ trans('labels.status') }}: </b><span id="span2{{$order->id}}">{{ strtoupper(trans('labels.delivered')) }}</span>
                            @endif
                        </div>

                        <div class="col-12 col-sm-8 my-auto" align="center">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle btn-lg" type="button" id="dropdownMenuButtonStatus" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ trans('labels.change') }} {{ strtolower(trans('labels.status')) }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonStatus">
                                    <li><a class="dropdown-item" href="" onclick="event.preventDefault(); confirm_change_status(this, {{$thisShipment->id}}, '0', {{$status}}, {{$order->id}})">{{trans('labels.purchased') }}</a></li>
                                    <li><a class="dropdown-item" href="" onclick="event.preventDefault(); confirm_change_status(this, {{$thisShipment->id}}, '1', {{$status}}, {{$order->id}})">{{ trans('labels.takingCharge') }}</a></li>
                                    <li><a class="dropdown-item" href="" onclick="event.preventDefault(); confirm_change_status(this, {{$thisShipment->id}}, '2', {{$status}}, {{$order->id}})">{{ trans('labels.sent') }}</a></li>
                                    <li><a class="dropdown-item" href="" onclick="event.preventDefault(); confirm_change_status(this, {{$thisShipment->id}}, '3', {{$status}}, {{$order->id}})">{{ trans('labels.delivered') }}</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>


                </div>

                <table id="details_table" class="table text-uppercase table-hover table-responsive table-bordered fs-5" style="background-color: white">
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
                        @foreach ($orders_lines as $order_line)
                        @if($order_line->id_cart === $order->id)
                        @php($total = $total + $order_line->total_price)

                        <tr>
                            <th scope="row">{{$j}}</th>
                            <td>{{$order_line->product->name}}</td>
                            <td>{{$order_line->quantity}}</td>
                            <td>{{$order_line->total_price}} €</td>
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

                @foreach ($shipments as $shipment)
                @if($shipment->id_cart == $order->id)
                <div class="card card-body mt-3">
                    <div class="row mb-2">
                        <div class="col">
                            <b class="fs-3 ms-3 text-uppercase my-auto">{{ trans('labels.shipmentInfo') }}</b>
                            <svg class="bi ms-3 mb-2" width="40" height="40" fill="currentColor">
                            <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#truck"/>
                            </svg>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 col-sm-6">
                            <ul class="list-group list-group-flush fs-5">
                                <li class="list-group-item"><b>{{ trans('labels.name') }}: </b>{{$shipment->user_name}}</li>
                                <li class="list-group-item"><b>{{ trans('labels.streetAddress') }}: </b>{{$shipment->address}}</li>
                                <li class="list-group-item"><b>{{ trans('labels.province') }}: </b>{{$shipment->province}}</li>
                                <li class="list-group-item"><b>CAP: </b>{{$shipment->CAP}}</li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-6">
                            <ul class="list-group list-group-flush fs-5">
                                <li class="list-group-item"><b>{{ trans('labels.surname') }}: </b>{{$shipment->user_surname}}</li>
                                <li class="list-group-item"><b>{{ trans('labels.city') }}: </b>{{$shipment->city}}</li>
                                <li class="list-group-item"><b>{{ trans('labels.country') }}: </b>{{$shipment->country}}</li>
                                <li class="list-group-item"><b>{{ trans('labels.cellNumber') }}: </b>{{$shipment->telephone_number}}</li>
                            </ul>
                        </div>
                    </div>

                </div>

                @endif
                @endforeach

            </li>
        </div>
        @php($i=$i+1)
        @endforeach

    </ol>
    @endif <!-- controllo se ci sono ordini o meno-->

    @else <!--UTENTE NON ADMIN -->
    <div class="row border-bottom text-dark border-dark mb-4 text-uppercase">
        <h1>{{ trans('labels.allOrders') }}: {{Auth::user()->name}}</h1>
    </div>

    @if(is_null($orders))
    <div class="row" style="margin-top: 10rem; margin-bottom: 10rem;">
        <svg class="bi text-secondary img-responsive" width="100" height="100" style="margin-bottom: 3rem">
        <use xlink:href="fonts/bootstrap-icons.svg#box-seam"/>
        </svg>
        <h1 class="display-2 text-secondary" align="center" >{{ trans('labels.emptyOrder') }}</h1>
    </div>
    @else

    <div class="row mb-1">
        <div class="col-12 col-sm-3">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelectStatus">{{ trans('labels.status') }}</label>
                <select class="form-select" id="inputGroupSelectStatus" onchange="statusSelection()">
                    <option value="0">{{ trans('labels.all') }}</option>
                    <option value="1">{{trans('labels.purchased')}}</option>
                    <option value="2">{{trans('labels.takingCharge')}}</option>
                    <option value="3">{{trans('labels.sent')}}</option>
                    <option value="4">{{trans('labels.delivered')}}</option>
                </select>
            </div>

        </div>
        <div class="col-0 col-sm-9"></div>
    </div>

    @php($i=1)
    @php($a=0)
    <ol class="list-group">
        @foreach ($orders as $order)
        @php($numProducts = 0)
        @php($totalPrice = 0)
        @foreach ($orders_lines as $order_line)
        @if($order_line->id_cart == $order->id)
        @php($numProducts = $numProducts + 1)
        @php($totalPrice = $totalPrice + $order_line->total_price)
        @endif
        @endforeach

        @foreach ($shipments as $shipment)
        @if($shipment->id_cart == $order->id)
        @php($status = $shipment->status)
        @endif
        @endforeach

        <div id="selectedItem{{$order->id}}s{{$status}}">
            <li class="list-group-item list-group-item-secondary">
                <div class="row my-auto">
                    <div class="col-12 col-sm-2 fs-5 my-auto">
                        <b>{{ trans('labels.orderID') }}: </b>{{$order->id}}<br>
                        <b>{{ trans('labels.status') }}: </b>
                        @if($status == 0)
                        {{ strtoupper(trans('labels.purchased')) }}
                        @elseif($status == 1)
                        {{ strtoupper(trans('labels.takingCharge')) }}
                        @elseif($status == 2)
                        {{ strtoupper(trans('labels.sent')) }}
                        @elseif($status == 3)
                        {{ strtoupper(trans('labels.delivered')) }}
                        @endif
                    </div>
                    <div class="col-12 col-sm-3 fs-5 my-auto">
                        <b>{{ trans('labels.purchaseDate') }}: </b>{{$order->confirm_date}}
                    </div>
                    <div class="col-12 col-sm-3 fs-5 my-auto">
                        <b>{{ trans('labels.totalPrice') }}: </b>{{$totalPrice}} €
                    </div>
                    <div class="col-12 col-sm-2 fs-5 my-auto">
                        <b>{{ trans('labels.numProducts') }}: </b>{{$numProducts}}
                    </div>
                    <div class="col-12 col-sm-2 my-auto" align="right">
                        <button class="btn border-dark fs-5 my-auto" id="button{{$order->id}}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$order->id}}" aria-controls="collapseExample" onclick="changeIcon({{$order->id}})">
                            <span class="me-1">{{ trans('labels.details') }}</span>
                            <svg id="bi{{$order->id}}" class="bi my-auto" width="20" height="20" fill="currentColor">
                            <use id="icon{{$order->id}}" xlink:href="fonts/bootstrap-icons.svg#plus-lg"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </li>

            <li id="collapse{{$order->id}}" class="list-group-item collapse" style="background-color: #f8f9fa">
                @foreach ($shipments as $shipment)
                @if($shipment->id_cart == $order->id)
                @php($status = $shipment->status)
                @php($thisShipment = $shipment)
                @endif
                @endforeach
                <div class="card card-body mb-3 mt-1">
                    @if($status == 0)
                    <div class="row mt-3 mb-3">
                        <div class="col-12 col-sm-6 fs-3 my-auto" align="center">
                            <div class="row my-auto">
                                <span><b>{{ trans('labels.status') }}: </b>{{ strtoupper(trans('labels.purchased')) }}</span>
                            </div>

                            @if(is_null($thisShipment->shipment_date))
                            <div class="row"><span><b>{{ trans('labels.shipmentDate') }}: </b>{{ strtoupper(trans('labels.notSent')) }}</span></div>
                            @else
                            <div class="row my-auto"><span><b>{{ trans('labels.shipmentDate') }}: </b>{{$thisShipment->shipment_date}}</span></div>
                            @endif
                        </div>
                        <div class="col-0 col-sm-6 d-none d-sm-block">
                            <ul class="nav list-group-horizontal">
                                <li class="nav-item my-auto">
                                    <button type="button" class="btn btn-success btn-circle btn-xl text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('labels.purchased') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#credit-card"/>
                                        </svg>
                                    </button>
                                    <script>
                                        //initialize tooltips
                                        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                                <li class="nav-item my-auto">
                                    <svg id="" class="bi text-secondary ms-2 me-2" width="40" height="40" fill="currentColor">
                                    <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-outline-success btn-circle btn-xl myBtnHover" data-bs-toggle="tooltip" data-placement="top" title="{{ trans('labels.takingCharge') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#box-seam"/>
                                        </svg>
                                    </button>
                                    <script>
                                                //initialize tooltips
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                                <li class="nav-item my-auto">
                                    <svg id="" class="bi text-secondary ms-2 me-2" width="40" height="40" fill="currentColor">
                                    <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-outline-success btn-circle btn-xl myBtnHover" data-bs-toggle="tooltip" data-placement="top" title="{{ trans('labels.sent') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#truck"/>
                                        </svg>
                                    </button>
                                    <script>
                                                //initialize tooltips
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                                <li class="nav-item my-auto">
                                    <svg id="" class="bi text-secondary ms-2 me-2" width="40" height="40" fill="currentColor">
                                    <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-outline-success btn-circle btn-xl myBtnHover"  data-bs-toggle="tooltip" data-placement="top" title="{{ trans('labels.delivered') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#check-circle"/>
                                        </svg>
                                    </button>
                                    <script>
                                                //initialize tooltips
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                            </ul>
                        </div>
                    </div>

                    @elseif($status == 1)
                    <div class="row mt-3 mb-3">
                        <div class="col-12 col-sm-6 fs-3 my-auto" align="center">
                            <div class="row my-auto">
                                <span><b>{{ trans('labels.status') }}: </b>{{ strtoupper(trans('labels.takingCharge')) }}</span>
                            </div>

                            @if(is_null($thisShipment->shipment_date))
                            <div class="row"><span><b>{{ trans('labels.shipmentDate') }}: </b>{{ strtoupper(trans('labels.notSent')) }}</span></div>
                            @else
                            <div class="row my-auto"><span><b>{{ trans('labels.shipmentDate') }}: </b>{{$thisShipment->shipment_date}}</span></div>
                            @endif
                        </div>
                        <div class="col-0 col-sm-6 d-none d-sm-block">
                            <ul class="nav list-group-horizontal">
                                <li class="nav-item my-auto">
                                    <button type="button" class="btn btn-success btn-circle btn-xl text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('labels.purchased') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#credit-card"/>
                                        </svg>
                                    </button>
                                    <script>
                                                //initialize tooltips
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                                <li class="nav-item my-auto">
                                    <svg id="" class="bi text-success ms-2 me-2" width="40" height="40" fill="currentColor">
                                    <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-success btn-circle btn-xl"  data-bs-toggle="tooltip" data-placement="top" title="{{ trans('labels.takingCharge') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#box-seam"/>
                                        </svg>
                                    </button>
                                    <script>
                                                //initialize tooltips
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                                <li class="nav-item my-auto">
                                    <svg id="" class="bi text-secondary ms-2 me-2" width="40" height="40" fill="currentColor">
                                    <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-outline-success btn-circle btn-xl myBtnHover"  data-bs-toggle="tooltip" data-placement="top" title="{{ trans('labels.sent') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#truck"/>
                                        </svg>
                                    </button>
                                    <script>
                                                //initialize tooltips
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                                <li class="nav-item my-auto">
                                    <svg id="" class="bi text-secondary ms-2 me-2" width="40" height="40" fill="currentColor">
                                    <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-outline-success btn-circle btn-xl myBtnHover" data-bs-toggle="tooltip" data-placement="top" title="{{ trans('labels.delivered') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#check-circle"/>
                                        </svg>
                                    </button>
                                    <script>
                                                //initialize tooltips
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @elseif($status == 2)
                    <div class="row mt-3 mb-3">
                        <div class="col-12 col-sm-6 fs-3 my-auto" align="center">
                            <div class="row my-auto">
                                <span><b>{{ trans('labels.status') }}: </b>{{ strtoupper(trans('labels.sent')) }}</span>
                            </div>

                            @if(is_null($thisShipment->shipment_date))
                            <div class="row"><span><b>{{ trans('labels.shipmentDate') }}: </b>{{ strtoupper(trans('labels.notSent')) }}</span></div>
                            @else
                            <div class="row my-auto"><span><b>{{ trans('labels.shipmentDate') }}: </b>{{$thisShipment->shipment_date}}</span></div>
                            @endif
                        </div>
                        <div class="col-0 col-sm-6 d-none d-sm-block">
                            <ul class="nav list-group-horizontal">
                                <li class="nav-item my-auto">
                                    <button type="button" class="btn btn-success btn-circle btn-xl text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('labels.purchased') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#credit-card"/>
                                        </svg>
                                    </button>
                                    <script>
                                                //initialize tooltips
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                                <li class="nav-item my-auto">
                                    <svg id="" class="bi text-success ms-2 me-2" width="40" height="40" fill="currentColor">
                                    <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-success btn-circle btn-xl"  data-bs-toggle="tooltip" data-placement="top" title="{{ trans('labels.takingCharge') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#box-seam"/>
                                        </svg>
                                    </button>
                                    <script>
                                                //initialize tooltips
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                                <li class="nav-item my-auto">
                                    <svg id="" class="bi text-success ms-2 me-2" width="40" height="40" fill="currentColor">
                                    <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-success btn-circle btn-xl"  data-bs-toggle="tooltip" data-placement="top" title="{{ trans('labels.sent') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#truck"/>
                                        </svg>
                                    </button>
                                    <script>
                                                //initialize tooltips
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                                <li class="nav-item my-auto">
                                    <svg id="" class="bi text-secondary ms-2 me-2" width="40" height="40" fill="currentColor">
                                    <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-outline-success btn-circle btn-xl myBtnHover" data-bs-toggle="tooltip" data-placement="top" title="{{ trans('labels.delivered') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#check-circle"/>
                                        </svg>
                                    </button>
                                    <script>
                                                //initialize tooltips
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @elseif($status == 3)
                    <div class="row mt-3 mb-3">
                        <div class="col-12 col-sm-6 fs-3 my-auto" align="center">
                            <div class="row my-auto">
                                <span><b>{{ trans('labels.status') }}: </b>{{ strtoupper(trans('labels.delivered')) }}</span>
                            </div>

                            @if(is_null($thisShipment->shipment_date))
                            <div class="row"><span><b>{{ trans('labels.shipmentDate') }}: </b>{{ strtoupper(trans('labels.notSent')) }}</span></div>
                            @else
                            <div class="row my-auto"><span><b>{{ trans('labels.shipmentDate') }}: </b>{{$thisShipment->shipment_date}}</span></div>
                            @endif

                        </div>
                        <div class="col-0 col-sm-6 d-none d-sm-block">
                            <ul class="nav list-group-horizontal">
                                <li class="nav-item my-auto">
                                    <button type="button" class="btn btn-success btn-circle btn-xl text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('labels.purchased') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#credit-card"/>
                                        </svg>
                                    </button>
                                    <script>
                                                //initialize tooltips
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                                <li class="nav-item my-auto">
                                    <svg id="" class="bi text-success ms-2 me-2" width="40" height="40" fill="currentColor">
                                    <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-success btn-circle btn-xl"  data-bs-toggle="tooltip" data-placement="top" title="{{ trans('labels.takingCharge') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#box-seam"/>
                                        </svg>
                                    </button>
                                    <script>
                                                //initialize tooltips
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                                <li class="nav-item my-auto">
                                    <svg id="" class="bi text-success ms-2 me-2" width="40" height="40" fill="currentColor">
                                    <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-success btn-circle btn-xl"  data-bs-toggle="tooltip" data-placement="top" title="{{ trans('labels.sent') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#truck"/>
                                        </svg>
                                    </button>
                                    <script>
                                                //initialize tooltips
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                                <li class="nav-item my-auto">
                                    <svg id="" class="bi text-success ms-2 me-2" width="40" height="40" fill="currentColor">
                                    <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-success btn-circle btn-xl" data-bs-toggle="tooltip" data-placement="top" title="{{ trans('labels.delivered') }}">
                                        <svg class="bi" width="30" height="30" fill="currentColor">
                                        <use class="" xlink:href="fonts/bootstrap-icons.svg#check-circle"/>
                                        </svg>
                                    </button>
                                    <script>
                                                //initialize tooltips
                                                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                                                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                return new bootstrap.Tooltip(tooltipTriggerEl)
                                                })
                                    </script>
                                </li>
                            </ul>
                        </div>

                    </div>
                    @endif
                </div>
                <ul id="ulID" class="list-group">

                    @php($total_price = 0) 

                    @foreach($orders_lines as $order_line)

                    @if($order_line->id_cart === $order->id)

                    @php($total_price = $total_price + $order_line->total_price)


                    <li id="li{{$order_line->id}}" class="list-group-item d-flex justify-content-between align-items-start">

                        <div class="row ms-2 me-auto">
                            <div class="col-xs-12 col-sm-4 fw-bold" align="center" style="border-right: solid; border-right-width: 1.5px; border-right-color: lightgrey">
                                @if($order_line->product->id_category === 1)
                                <img src="img/smartphones/sp-{{ strtolower($order_line->product->color) }}.png" class="img-thumbnail img-responsive border-0" width="60%" height="60%" align="center">
                                @elseif($order_line->product->id_category === 2)
                                <img src="img/computers/pc-{{ strtolower($order_line->product->color) }}.png" class="img-thumbnail img-responsive border-0" style="margin-top: 3rem" width="70%" height="70%" align="center">
                                @elseif($order_line->product->id_category === 3)
                                <img src="img/watches/wa-{{ strtolower($order_line->product->color) }}.png" class="img-thumbnail img-responsive border-0" style="margin-top: 3rem;" width="70%" height="70%" align="center">
                                @endif
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <div class="row" style="margin-bottom: 1rem; margin-top: 1rem">
                                    <h4>{{ trans('labels.productCode') }}: {{ $order_line->product->name }}</h5>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                {{ trans('labels.category') }}: 
                                                @if($order_line->product->id_category === 1)
                                                Smartphone
                                                @elseif($order_line->product->id_category === 2)
                                                Computer
                                                @elseif($order_line->product->id_category === 3)
                                                Smartwatch
                                                @endif

                                            </li>
                                            @if($order_line->product->id_category !== 3)
                                            <li class="list-group-item">
                                                {{ trans('labels.capacity') }}: {{ $order_line->product->capacity }} GB
                                            </li>
                                            <li class="list-group-item">
                                                {{ trans('labels.color') }}: {{ $order_line->product->color }}
                                            </li>
                                            @else
                                            <li class="list-group-item">
                                                {{ trans('labels.color') }}: {{ $order_line->product->color }}
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="list-group">
                                            @if($order_line->product->id_category !== 3)
                                            <li class="list-group-item">
                                                {{ trans('labels.model') }}: {{ $order_line->product->model }}"
                                            </li>
                                            <li class="list-group-item">
                                                @if( $order_line->product->assurance === 0 )
                                                <label>{{ trans('labels.assurance') }}: {{ trans('labels.no') }}</label>
                                                @else
                                                <label>{{ trans('labels.assurance') }}: {{ trans('labels.yes') }}</label>
                                                @endif
                                            </li>
                                            @endif
                                            <li class="list-group-item">
                                                {{ trans('labels.quantity') }}: {{ $order_line->quantity }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 1rem; margin-bottom: 1rem">
                                    <div class="col-sm-8">
                                        @if($order_line->quantity === 1)
                                        <h4>{{ trans('labels.price') }}: {{ $order_line->total_price }} €</h4>
                                        @else
                                        <h4>{{ trans('labels.price') }}: {{ $order_line->product->price }} € x {{ $order_line->quantity }} = {{ $order_line->total_price }} €</h4>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#feedback-modal" onclick="changeCategoryID({{$order_line->product->id_category}})">
                                            {{ trans('labels.leaveFeedback') }}
                                            <svg class="bi mb-1" width="15" height="15" fill="currentColor">
                                            <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#star"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endif

                    @endforeach
                </ul>
                @foreach ($shipments as $shipment)
                @if($shipment->id_cart == $order->id)
                <div class="card card-body mt-3">
                    <div class="row mb-2">
                        <div class="col">
                            <b class="fs-3 ms-3 text-uppercase my-auto">{{ trans('labels.shipmentInfo') }}</b>
                            <svg class="bi ms-3 mb-2" width="40" height="40" fill="currentColor">
                            <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#truck"/>
                            </svg>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 col-sm-6">
                            <ul class="list-group list-group-flush fs-5">
                                <li class="list-group-item"><b>{{ trans('labels.name') }}: </b>{{$shipment->user_name}}</li>
                                <li class="list-group-item"><b>{{ trans('labels.streetAddress') }}: </b>{{$shipment->address}}</li>
                                <li class="list-group-item"><b>{{ trans('labels.province') }}: </b>{{$shipment->province}}</li>
                                <li class="list-group-item"><b>CAP: </b>{{$shipment->CAP}}</li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-6">
                            <ul class="list-group list-group-flush fs-5">
                                <li class="list-group-item"><b>{{ trans('labels.surname') }}: </b>{{$shipment->user_surname}}</li>
                                <li class="list-group-item"><b>{{ trans('labels.city') }}: </b>{{$shipment->city}}</li>
                                <li class="list-group-item"><b>{{ trans('labels.country') }}: </b>{{$shipment->country}}</li>
                                <li class="list-group-item"><b>{{ trans('labels.cellNumber') }}: </b>{{$shipment->telephone_number}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </li>
        </div>
        @php($i=$i+1)
        @endforeach
    </ol>
    @endif

    <!--MODAL FEEDBACK-->
    <form id="feedbackForm" name="feedbackForm" method="post" action="{{route('feedback.add')}}" enctype="multipart/form-data">  
        @csrf
        <div class="fade modal" id="feedback-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content form-group">
                    <div id="feedbackHeaderToHide" class="modal-header">
                        <h5 class="modal-title">{{ trans('labels.leaveFeedback') }}</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body form-group">
                        <div class="row mt-3 justify-content-center" align="center">
                            <h4 class="mb-4 text-dark" id="textLoadingFeedback" hidden>{{ trans('labels.loading') }}...</h4>
                            <h4 class="mb-4 text-success" id="textFeedbackConfirmed" hidden>{{ trans('labels.feedbackConfirmed') }}</h4>
                            <div class="row" id="feedbackBodyToHide">
                                <div class="col-12 col-sm-3 fs-3"><b>{{ trans('labels.rate') }}:</b></div>
                                <div class="col-12 col-sm-6" id="newFeedback"></div>
                                <div class="col-12 col-sm-3 fs-3 text-dark form-group">
                                    <b id="newScoreFeedback">(0/5)</b>
                                    <input class="form-control hidden" type="text" id="newScoreForm" name="newScoreForm" value="0">
                                    <input class="form-control hidden" type="text" id="idCategoryForm" name="idCategoryForm" value="0">
                                </div>
                            </div>
                            <div id="spinnerConfirmFeedback" hidden class="spinner-border text-dark" role="status">
                            </div>
                            <div id="svgCheckConfirmFeedback" hidden>
                                <svg class="bi text-success" width="50" height="50" fill="currentColor">
                                <use xlink:href="{{ url('/') }}/fonts/bootstrap-icons.svg#check-circle"/>
                                </svg> 
                            </div>
                        </div>
                        <div id="textAreaToHide" class="row">
                            <div class="col-12 mt-5">
                                <textarea id="review" name="review" rows="5" class="form-control text-2xl mb-4 " style="font-size: 150%" type="text" placeholder="{{ trans('labels.writeFeedback') }}"></textarea>   
                            </div>
                        </div>
                    </div>
                    <div id="feedbackFooter" class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('labels.close') }}</button>
                        <button type="button" class="btn btn-success" onclick="confirmFeedback()">{{ trans('labels.send') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL FEEDBACK-->
    @endif
</div>
@endsection

