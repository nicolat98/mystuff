<?php $__env->startSection('titolo',trans('labels.purchase')); ?>

<?php $__env->startSection('navbar'); ?>
<!-- LEFT NAVBAR-->
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="<?php echo e(route('home')); ?>">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('smartphone.index')); ?>">Smartphone</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('computer.index')); ?>">Computer</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('watch.index')); ?>"><?php echo e(trans('labels.watches')); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('faq.index')); ?>">FAQ</a>
    </li>
</ul>

<!-- RIGHT NAVBAR-->
<ul class="d-flex navbar-nav" style="vertical-align: middle">
    <!-- LOGIN -->
    <?php if(auth()->guard()->check()): ?>
    <li class="nav-item mt-1" >
        <a style="vertical-align: middle"><i><?php echo e(trans('labels.welcome')); ?> <?php echo e(Auth::user()->name); ?></i></a>
    </li>
    <li class="nav-item mt-1 me-5">
        <a href="<?php echo e(route('logout')); ?>" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <button class="border-0 trasparent-button" style="margin-left:1rem">
                <?php echo e(trans('labels.logout')); ?>

                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#box-arrow-right"/>
                </svg>
            </button>

        </a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
    </li>

    <?php else: ?>
    <li class="nav-item">
        <a href="<?php echo e(route('login')); ?>">
            <button class="border-0 trasparent-button">
                <?php echo e(trans('labels.login')); ?>

                <svg class="bi" width="22" height="22" fill="currentColor">
                <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#person-circle"/>
                </svg>
            </button>
        </a>
    </li>
    <?php endif; ?>

    <!-- CART -->
    <li class="nav-item">
        <?php if(auth()->guard()->check()): ?>
        <?php if(count($cart_lines) === 0): ?>
        <a href="<?php echo e(route('cart.index')); ?>">
            <button type="button" class="btn btn-outline-dark button-sm position-relative" style="vertical-align: middle;">
                <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
                <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#cart4"/>
                </svg>
            </button>
        </a>
        <?php else: ?>

        <a href="<?php echo e(route('cart.index')); ?>" role="button" class="btn btn-outline-dark button-sm position-relative" style="vertical-align: middle;">
            <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
            <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#cart4"/>
            </svg>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-success">
                <?php echo e(count($cart_lines)); ?>

            </span>

        </a>
        <?php endif; ?>
        <?php else: ?>
        <a href="<?php echo e(route('login')); ?>">
            <button type="button" class="btn btn-outline-dark button-sm position-relative" style="vertical-align: middle;">
                <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
                <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#cart4"/>
                </svg>
            </button>
        </a>
        <?php endif; ?>
    </li>

    <!-- ORDERS -->
    <?php if(auth()->guard()->check()): ?>
    <li class="nav-item me-3">
        <a href="<?php echo e(route('orders.index')); ?>" style="vertical-align: middle">
            <button type="button" class="btn btn-outline-dark button-sm position-relative">
                <svg class="bi" width="32" height="32" fill="currentColor">
                <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#box-seam"/>
                </svg>
            </button>
        </a>
    </li>
    <?php endif; ?>

</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container-sm" style="margin-top: 3rem; margin-bottom:3rem;">
    <div class="row justify-content-center">
        <div class="col-0 col-sm-3 d-none d-sm-block">
            <ul id="breadcrumb"  class="nav flex-column" align="center">
                <div id="bc2" >
                    <li class="nav-item mb-3">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <a href="<?php echo e(route('cart.index')); ?>"><button type="button" class="btn btn-outline-primary btn-circle btn-lg"><b>1</b></button></a>
                            </div>
                            <div class="col-8 fs-4 my-auto text-dark" align="start">
                                <?php echo e(trans('labels.cart')); ?>

                            </div>
                        </div>
                    </li>
                    <li class="nav-item mb-3">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <svg id="svgArrow1" class="bi text-primary" width="40" height="40" fill="currentColor">
                                <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-down"/>
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
                                <?php echo e(trans('labels.shipment')); ?>

                            </div>
                        </div>
                    </li>
                </div>

                <div id="bc3">
                    <li class="nav-item mb-3">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <svg id="svgArrow2" class="bi text-secondary" width="40" height="40" fill="currentColor">
                                <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-down"/>
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
                                <?php echo e(trans('labels.payment')); ?>

                            </div>
                        </div>
                    </li>
                </div>
                <div id="bc4">
                    <li class="nav-item mb-3">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <svg id="svgArrow3" class="bi text-secondary" width="40" height="40" fill="currentColor">
                                <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-down"/>
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
                                <?php echo e(trans('labels.summary')); ?>

                            </div>
                        </div>
                    </li>
                </div>
            </ul>
        </div>

        <div class="col-12 col-sm-9">

            <div id="msg_valid_card" class="alert alert-success popup-message alert-dismissible fs-5 align-items-center" data-bs-dismiss="alert" role="alert">

                <svg class="bi flex-shrink-0 me-2" width="32" height="32" fill="currentColor">
                <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#check2-circle"/>
                </svg>
                <label id="msg_valid_card_text"></label>
            </div>
            
            <div id="msg_not_valid_card" class="alert alert-danger popup-message alert-dismissible fs-5 align-items-center" data-bs-dismiss="alert" role="alert">

                <svg class="bi flex-shrink-0 me-2" width="32" height="32" fill="currentColor">
                <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#x-circle-fill"/>
                </svg>
                <label id="msg_not_valid_card_text"></label>
            </div>


            <form id="orderInfoForm" method="post" action="<?php echo e(route('orders.store')); ?>" enctype="multipart/form-data">  
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="card">
                        <div id="shipmentForm" class="card-body form-group collapse show" aria-expanded="true">
                            <div class="row">

                                <h1 class="card-title text-dark"><?php echo e(trans('labels.inputShipmentInfo')); ?></h1>
                            <!--<svg class="bi text-dark" width="32" height="32" fill="currentColor">
                            <use xlink:href="fonts/bootstrap-icons.svg#truck"/>
                            </svg>-->
                            </div>

                            <div class="row mb-2">
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="nameInput"><?php echo e(trans('labels.name')); ?></label>
                                    <input type="text" class="form-control " name="nameInput" id="nameInput" placeholder="Mario" style="font-size:18pt;" >
                                    <!--<div class="valid-feedback">
                                        Looks good!
                                    </div>-->
                                    <div class="invalid-feedback">
                                        <?php echo e(trans('labels.invalidInput')); ?>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="surnameInput"><?php echo e(trans('labels.surname')); ?></label>
                                    <input type="text" class="form-control" name="surnameInput" id="surnameInput" placeholder="Rossi" style="font-size:18pt;" >
                                    <div class="invalid-feedback">
                                        <?php echo e(trans('labels.invalidInput')); ?>

                                    </div>
                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <label class="fs-5 mb-1 text-dark" for="streetInput"><?php echo e(trans('labels.streetAddress')); ?></label>
                                    <input type="text" class="form-control" name="streetInput" id="streetInput" placeholder="Via Roma 10" style="font-size:18pt;" >
                                    <div class="invalid-feedback">
                                        <?php echo e(trans('labels.invalidInput')); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="cityInput"><?php echo e(trans('labels.city')); ?></label>
                                    <input type="text" class="form-control" name="cityInput" id="cityInput" placeholder="Quinzano D'Oglio" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        <?php echo e(trans('labels.invalidInput')); ?>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="capInput">CAP</label>
                                    <input type="text" class="form-control" name="capInput" id="capInput" placeholder="25027" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        <?php echo e(trans('labels.invalidInputCAP')); ?>

                                    </div>
                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="provinceInput"><?php echo e(trans('labels.province')); ?></label>
                                    <input type="text" class="form-control" name="provinceInput" id="provinceInput" placeholder="BS" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        <?php echo e(trans('labels.invalidInput')); ?>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="countryInput"><?php echo e(trans('labels.country')); ?></label>
                                    <input type="text" class="form-control" name="countryInput" id="countryInput" placeholder="Italy" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        <?php echo e(trans('labels.invalidInput')); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="mailInput">Mail</label>
                                    <input readonly type="text" class="form-control" name="mailInput" id="mailInput" value="<?php echo e(Auth::user()->email); ?>" style="font-size:18pt;">

                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="cellNumberInput"><?php echo e(trans('labels.cellNumber')); ?></label>
                                    <input type="text" class="form-control" name="cellNumberInput" id="cellNumberInput" placeholder="012 345 6789" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        <?php echo e(trans('labels.invalidInputCellNumber')); ?>

                                    </div>
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-0 col-sm-10"></div>
                                <div class="col-12 col-sm-2 my-auto ">
                                    <button type="button" class="btn btn-success float-end mt-2 btn-lg" data-bs-toggle="collapse" onclick="checkInputShipment()">
                                        <span id="shipmentBtnText" class="my-auto"><?php echo e(trans('labels.next')); ?></span>
                                        <span id="shipmentSpinner" hidden class="spinner-border my-auto spinner-border-md" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>


                        </div>

                        <div id="collapsePaymentForm" class="card-body form-group collapse hide">
                            <div class="row">

                                <h1 class="card-title text-dark"><?php echo e(trans('labels.inputPurchaseInfo')); ?></h1>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="nameInputPay"><?php echo e(trans('labels.name')); ?></label>
                                    <input type="text" class="form-control" name="nameInputPay" id="nameInputPay" placeholder="Mario" style="font-size:18pt;" >
                                    <div class="invalid-feedback">
                                        <?php echo e(trans('labels.invalidInput')); ?>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="surnameInputPay"><?php echo e(trans('labels.surname')); ?></label>
                                    <input type="text" class="form-control" name="surnameInputPay" id="surnameInputPay" placeholder="Rossi" style="font-size:18pt;" >
                                    <div class="invalid-feedback">
                                        <?php echo e(trans('labels.invalidInput')); ?>

                                    </div>
                                </div>

                            </div>

                            <div class="row mb-2">
                                <div class="col-12">
                                    <label class="fs-5 mb-1 text-dark" for="cardNumberInput"><?php echo e(trans('labels.cardNumber')); ?></label>
                                    <input type="text" class="form-control" name="cardNumberInput" id="cardNumberInput" placeholder="1234 1234 1234 1234" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        <?php echo e(trans('labels.invalidInput')); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="expirationInput"><?php echo e(trans('labels.cardExpiration')); ?></label>
                                    <input type="text" class="form-control" name="expirationInput" id="expirationInput" placeholder="01/26" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        <?php echo e(trans('labels.invalidInput')); ?>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="fs-5 mb-1 text-dark" for="cvvInput">CVV</label>
                                    <input type="text" class="form-control" name="cvvInput" id="cvvInput" placeholder="123" style="font-size:18pt;">
                                    <div class="invalid-feedback">
                                        <?php echo e(trans('labels.invalidInput')); ?>

                                    </div>

                                </div>




                            </div>
                            <div class="row mb-2">
                                <div class="col-0 col-sm-8"></div>
                                <div class="col-6 col-sm-2 ">
                                    <button type="button" class="btn btn-secondary float-end mt-2 btn-lg" onclick="activateShipmentForm()"><?php echo e(trans('labels.back')); ?></button>
                                </div>
                                <div class="col-6 col-sm-2 ">
                                    <button type="button" class="btn btn-success float-end mt-2 btn-lg" onclick="checkInputPurchase()">
                                        <span id="purchaseBtnText" class="my-auto"><?php echo e(trans('labels.next')); ?></span>
                                        <span id="purchaseSpinner" hidden class="spinner-border my-auto spinner-border-md" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div id="collapseSummaryForm" class="card-body collapse hide">
                            <div class="row mb-3">
                                <h1 class="card-title text-dark"><?php echo e(trans('labels.summary')); ?></h1>
                            </div>
                            <div class="row">
                                <table class="table text-uppercase table-hover table-responsive table-bordered fs-5">

                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"><?php echo e(trans('labels.product')); ?></th>
                                            <th scope="col"><?php echo e(trans('labels.quantity')); ?></th>
                                            <th scope="col"><?php echo e(trans('labels.totalPrice')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php ($j=1); ?>
                                        <?php ($total=0); ?>
                                        <?php $__currentLoopData = $cart_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($cart_line->id_cart == $id_cart): ?>

                                        <?php ($total = $total + $cart_line->total_price); ?>

                                        <tr>
                                            <th scope="row"><?php echo e($j); ?></th>
                                            <td><?php echo e($cart_line->product->name); ?></td>
                                            <td><?php echo e($cart_line->quantity); ?></td>
                                            <td><?php echo e($cart_line->total_price); ?> €</td>
                                        </tr>
                                        <?php ($j=$j+1); ?>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="noborders"></td>
                                            <th class="text-right" scope="row"><?php echo e($total); ?> €</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="row mb-2">
                                <div class="col-0 col-sm-7"></div>
                                <div class="col-12 col-sm-2 ">
                                    <button type="button" class="btn btn-secondary float-end mt-2 btn-lg" onclick="activatePaymentForm()"><?php echo e(trans('labels.back')); ?></button>
                                </div>
                                <div class="col-12 col-sm-3 ">
                                    <!--<button type="button" class="btn btn-success float-end mt-2 btn-lg" onclick="event.preventDefault(); confirm_order(this)"><?php echo e(trans('labels.confirm')); ?> <?php echo e(strtolower(trans('labels.order'))); ?></button>-->
                                    <button type="button" class="btn btn-success float-end mt-2 btn-lg" data-bs-toggle="modal" data-bs-target="#confirm-order-modal"><?php echo e(trans('labels.confirm')); ?> <?php echo e(strtolower(trans('labels.order'))); ?></button>
                                    <input hidden type="text" class="form-control" name="idCartInput" id="idCartInput" value="<?php echo e($id_cart); ?>">

                                    <div class="modal fade" id="confirm-order-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div id="modal-confirm-sp" class="modal-body" align="center">
                                                    <h4 class="mb-4 text-dark" id="textAskConfirmOrder"><?php echo e(trans('labels.askConfirmOrder')); ?></h4>
                                                    <h4 class="mb-4 text-dark" id="textLoading" hidden><?php echo e(trans('labels.loading')); ?>...</h4>
                                                    <h4 class="mb-4 text-success" id="textOrderConfirmed" hidden><?php echo e(trans('labels.orderConfirmed')); ?></h4>
                                                    <div id="svgBoxConfirmOrder">
                                                        <svg class="bi text-dark" width="50" height="50" fill="currentColor">
                                                        <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#box-seam"/>
                                                        </svg> 
                                                    </div>

                                                    <div id="spinnerConfirmOrder" hidden class="spinner-border text-dark" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                    <div id="svgCheckConfirmOrder" hidden>
                                                        <svg class="bi text-success" width="50" height="50" fill="currentColor">
                                                        <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#check-circle"/>
                                                        </svg> 
                                                    </div>

                                                </div>
                                                <div id="modalFooter" class="modal-footer">
                                                    <div>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(trans('labels.cancel')); ?></button>
                                                        <button type="button" class="btn btn-success" style="text-decoration:none; color:white" onclick="confirmOrder()">
                                                            <?php echo e(trans('labels.confirm')); ?>


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
<?php $__env->stopSection(); ?>
<!--
<div class="row mb-2">
    <div class="col-6">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="expirationInput" placeholder="name@example.com">
            <label class="fs-5" for="expirationInput" style='margin-left: 1rem'><?php echo e(trans('labels.cardExpiration')); ?></label>
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
        <label class="fs-5" for="cardNumberInput" style='margin-left: 1rem'><?php echo e(trans('labels.cardNumber')); ?></label>
    </div>
</div>-->
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Hard Disk\Programmi\XAMPP\htdocs\ecommerce\resources\views/cart/purchase.blade.php ENDPATH**/ ?>