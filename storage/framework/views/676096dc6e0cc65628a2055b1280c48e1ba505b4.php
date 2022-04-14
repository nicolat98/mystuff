<?php $__env->startSection('titolo','Orders'); ?>

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
                <use xlink:href="fonts/bootstrap-icons.svg#box-arrow-right"/>
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
                <use xlink:href="fonts/bootstrap-icons.svg#person-circle"/>
                </svg>
            </button>
        </a>
    </li>
    <?php endif; ?>

    <!-- CART -->
    <li class="nav-item">
        <?php if(auth()->guard()->check()): ?>
        <?php if($num_cart_lines === 0): ?>
        <a href="<?php echo e(route('cart.index')); ?>">
            <button type="button" class="btn btn-outline-dark button-sm position-relative" style="vertical-align: middle;">
                <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
                <use xlink:href="fonts/bootstrap-icons.svg#cart4"/>
                </svg>
            </button>
        </a>
        <?php else: ?>
        <a href="<?php echo e(route('cart.index')); ?>">
            <button type="button" class="btn btn-outline-dark button-sm position-relative" style="vertical-align: middle;">
                <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
                <use xlink:href="fonts/bootstrap-icons.svg#cart4"/>
                </svg>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-success">
                    <?php echo e($num_cart_lines); ?>

                </span>
            </button>
        </a>
        <?php endif; ?>
        <?php else: ?>
        <a href="<?php echo e(route('login')); ?>">
            <button class="border-0 trasparent-button">
                <svg class="bi" width="32" height="32" fill="currentColor">
                <use xlink:href="fonts/bootstrap-icons.svg#cart4"/>
                </svg>
            </button>
        </a>
        <?php endif; ?>
    </li>

    <!-- ORDERS -->
    <?php if(auth()->guard()->check()): ?>
    <li class="nav-item me-3">
        <a href="<?php echo e(route('orders.index')); ?>" style="vertical-align: middle">
            <button type="button" class="btn btn-dark button-sm position-relative">
                <svg class="bi" width="32" height="32" fill="currentColor">
                <use xlink:href="fonts/bootstrap-icons.svg#box-seam"/>
                </svg>
            </button>
        </a>
    </li>
    <?php endif; ?>

</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
<div class="container mt-5 mb-5">


    <?php if(Auth::user()->name === "admin"): ?>

    <?php if(count($orders) === 0): ?>
    <div class="row border-bottom text-dark border-dark mb-4 text-uppercase">
        <h1><?php echo e(trans('labels.allOrders')); ?></h1>
    </div>

    <div class="row" style="margin-top: 10rem; margin-bottom: 10rem;">
        <svg class="bi text-ligth img-responsive" width="100" height="100" style="margin-bottom: 3rem">
        <use xlink:href="fonts/bootstrap-icons.svg#box-seam"/>
        </svg>
        <h1 class="display-2" align="center" ><?php echo e(trans('labels.noOrders')); ?></h1>
    </div>
    <?php else: ?>

    <div class="row border-bottom text-dark border-dark mb-4 text-uppercase">
        <h1><?php echo e(trans('labels.allOrders')); ?></h1>
    </div>
    <div class="row mb-1">
        <div class="col-12 col-sm-3">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelectStatus"><?php echo e(trans('labels.status')); ?></label>
                <select class="form-select" id="inputGroupSelectStatus" onchange="statusSelection()">
                    <option value="0"><?php echo e(trans('labels.all')); ?></option>
                    <option value="1"><?php echo e(trans('labels.purchased')); ?></option>
                    <option value="2"><?php echo e(trans('labels.takingCharge')); ?></option>
                    <option value="3"><?php echo e(trans('labels.sent')); ?></option>
                    <option value="4"><?php echo e(trans('labels.delivered')); ?></option>
                </select>
            </div>
        </div>
        <div class="col-0 col-sm-9"></div>
    </div>

    <?php ($i=1); ?>
    <?php ($a=0); ?>
    <ol class="list-group">
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php ($totalPrice = 0); ?>
        <?php ($numProducts = 0); ?>
        <?php $__currentLoopData = $orders_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($order_line->id_cart == $order->id): ?>
        <?php ($numProducts = $numProducts + 1); ?>
        <?php ($totalPrice = $totalPrice + $order_line->total_price); ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $__currentLoopData = $shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($shipment->id_cart == $order->id): ?>
        <?php ($status = $shipment->status); ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div id="selectedItem<?php echo e($order->id); ?>s<?php echo e($status); ?>">
            <li id="li<?php echo e($order->id); ?>" class="list-group-item list-group-item-secondary">
                <div class="row my-auto mt-1 mb-1">
                    <div class="col-12 col-sm-3 fs-5 my-auto">
                        <b><?php echo e(trans('labels.name')); ?>: </b><?php echo e($order->user->name); ?><br>
                        <b><?php echo e(trans('labels.orderID')); ?>: </b><?php echo e($order->id); ?>

                    </div>
                    <div class="col-12 col-sm-3 fs-5 my-auto">

                        <b><?php echo e(trans('labels.status')); ?>: </b>
                        <?php if($status == 0): ?>
                        <span id="span1<?php echo e($order->id); ?>"><?php echo e(strtoupper(trans('labels.purchased'))); ?></span><br>
                        <?php elseif($status == 1): ?>
                        <span id="span1<?php echo e($order->id); ?>"><?php echo e(strtoupper(trans('labels.takingCharge'))); ?></span><br>
                        <?php elseif($status == 2): ?>
                        <span id="span1<?php echo e($order->id); ?>"><?php echo e(strtoupper(trans('labels.sent'))); ?></span><br>
                        <?php elseif($status == 3): ?>
                        <span id="span1<?php echo e($order->id); ?>"><?php echo e(strtoupper(trans('labels.delivered'))); ?></span><br>
                        <?php endif; ?>
                        <b><?php echo e(trans('labels.purchaseDate')); ?>: </b><?php echo e($order->confirm_date); ?>

                    </div>
                    <div class="col-12 col-sm-3 fs-5 my-auto">
                        <b><?php echo e(trans('labels.numProducts')); ?>: </b><?php echo e($numProducts); ?><br>
                        <b><?php echo e(trans('labels.totalPrice')); ?>: </b><?php echo e($totalPrice); ?> €
                    </div>

                    <div class="col-12 col-sm-3 my-auto d-flex align-items-end flex-column">
                        <button class="btn border-dark fs-5 my-auto" id="button<?php echo e($order->id); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($order->id); ?>" aria-controls="collapseExample" onclick="changeIcon(<?php echo e($order->id); ?>)">
                            <span class="me-1"><?php echo e(trans('labels.details')); ?></span>
                            <svg id="bi<?php echo e($order->id); ?>" class="bi my-auto" width="20" height="20" fill="currentColor">
                            <use id="icon<?php echo e($order->id); ?>" xlink:href="fonts/bootstrap-icons.svg#plus-lg"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </li>

            <li class="collapse list-group-item" id="collapse<?php echo e($order->id); ?>" style="background-color: #f8f9fa">
                <!--
                <div class="row text-uppercase">
                    <h3><?php echo e(trans('labels.orderDetails')); ?></h3>
                </div>-->
                <?php $__currentLoopData = $shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($shipment->id_cart == $order->id): ?>
                <?php ($thisShipment = $shipment); ?>
                <?php ($status = $shipment->status); ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="card card-body mb-3 mt-1">
                    <div class="row mt-3 mb-3">
                        <div class="col-12 col-sm-4 fs-3 my-auto" align="center">
                            <?php if($status == 0): ?>
                            <b><?php echo e(trans('labels.status')); ?>: </b><span id="span2<?php echo e($order->id); ?>"><?php echo e(strtoupper(trans('labels.purchased'))); ?></span>
                            <?php elseif($status == 1): ?>
                            <b><?php echo e(trans('labels.status')); ?>: </b><span id="span2<?php echo e($order->id); ?>"><?php echo e(strtoupper(trans('labels.takingCharge'))); ?></span>
                            <?php elseif($status == 2): ?>
                            <b><?php echo e(trans('labels.status')); ?>: </b><span id="span2<?php echo e($order->id); ?>"><?php echo e(strtoupper(trans('labels.sent'))); ?></span>
                            <?php elseif($status == 3): ?>
                            <b><?php echo e(trans('labels.status')); ?>: </b><span id="span2<?php echo e($order->id); ?>"><?php echo e(strtoupper(trans('labels.delivered'))); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="col-12 col-sm-8 my-auto" align="center">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle btn-lg" type="button" id="dropdownMenuButtonStatus" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo e(trans('labels.change')); ?> <?php echo e(strtolower(trans('labels.status'))); ?>

                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonStatus">
                                    <li><a class="dropdown-item" href="" onclick="event.preventDefault(); confirm_change_status(this, <?php echo e($thisShipment->id); ?>, '0', <?php echo e($status); ?>, <?php echo e($order->id); ?>)"><?php echo e(trans('labels.purchased')); ?></a></li>
                                    <li><a class="dropdown-item" href="" onclick="event.preventDefault(); confirm_change_status(this, <?php echo e($thisShipment->id); ?>, '1', <?php echo e($status); ?>, <?php echo e($order->id); ?>)"><?php echo e(trans('labels.takingCharge')); ?></a></li>
                                    <li><a class="dropdown-item" href="" onclick="event.preventDefault(); confirm_change_status(this, <?php echo e($thisShipment->id); ?>, '2', <?php echo e($status); ?>, <?php echo e($order->id); ?>)"><?php echo e(trans('labels.sent')); ?></a></li>
                                    <li><a class="dropdown-item" href="" onclick="event.preventDefault(); confirm_change_status(this, <?php echo e($thisShipment->id); ?>, '3', <?php echo e($status); ?>, <?php echo e($order->id); ?>)"><?php echo e(trans('labels.delivered')); ?></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>


                </div>

                <table id="details_table" class="table text-uppercase table-hover table-responsive table-bordered fs-5" style="background-color: white">
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
                        <?php $__currentLoopData = $orders_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($order_line->id_cart === $order->id): ?>
                        <?php ($total = $total + $order_line->total_price); ?>

                        <tr>
                            <th scope="row"><?php echo e($j); ?></th>
                            <td><?php echo e($order_line->product->name); ?></td>
                            <td><?php echo e($order_line->quantity); ?></td>
                            <td><?php echo e($order_line->total_price); ?> €</td>
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

                <?php $__currentLoopData = $shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($shipment->id_cart == $order->id): ?>
                <div class="card card-body mt-3">
                    <div class="row mb-2">
                        <div class="col">
                            <b class="fs-3 ms-3 text-uppercase my-auto"><?php echo e(trans('labels.shipmentInfo')); ?></b>
                            <svg class="bi ms-3 mb-2" width="40" height="40" fill="currentColor">
                            <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#truck"/>
                            </svg>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 col-sm-6">
                            <ul class="list-group list-group-flush fs-5">
                                <li class="list-group-item"><b><?php echo e(trans('labels.name')); ?>: </b><?php echo e($shipment->user_name); ?></li>
                                <li class="list-group-item"><b><?php echo e(trans('labels.streetAddress')); ?>: </b><?php echo e($shipment->address); ?></li>
                                <li class="list-group-item"><b><?php echo e(trans('labels.province')); ?>: </b><?php echo e($shipment->province); ?></li>
                                <li class="list-group-item"><b>CAP: </b><?php echo e($shipment->CAP); ?></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-6">
                            <ul class="list-group list-group-flush fs-5">
                                <li class="list-group-item"><b><?php echo e(trans('labels.surname')); ?>: </b><?php echo e($shipment->user_surname); ?></li>
                                <li class="list-group-item"><b><?php echo e(trans('labels.city')); ?>: </b><?php echo e($shipment->city); ?></li>
                                <li class="list-group-item"><b><?php echo e(trans('labels.country')); ?>: </b><?php echo e($shipment->country); ?></li>
                                <li class="list-group-item"><b><?php echo e(trans('labels.cellNumber')); ?>: </b><?php echo e($shipment->telephone_number); ?></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </li>
        </div>
        <?php ($i=$i+1); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ol>
    <?php endif; ?> <!-- controllo se ci sono ordini o meno-->

    <?php else: ?> <!--UTENTE NON ADMIN -->
    <div class="row border-bottom text-dark border-dark mb-4 text-uppercase">
        <h1><?php echo e(trans('labels.allOrders')); ?>: <?php echo e(Auth::user()->name); ?></h1>
    </div>

    <?php if(is_null($orders)): ?>
    <div class="row" style="margin-top: 10rem; margin-bottom: 10rem;">
        <svg class="bi text-secondary img-responsive" width="100" height="100" style="margin-bottom: 3rem">
        <use xlink:href="fonts/bootstrap-icons.svg#box-seam"/>
        </svg>
        <h1 class="display-2 text-secondary" align="center" ><?php echo e(trans('labels.emptyOrder')); ?></h1>
    </div>
    <?php else: ?>

    <div class="row mb-1">
        <div class="col-12 col-sm-3">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelectStatus"><?php echo e(trans('labels.status')); ?></label>
                <select class="form-select" id="inputGroupSelectStatus" onchange="statusSelection()">
                    <option value="0"><?php echo e(trans('labels.all')); ?></option>
                    <option value="1"><?php echo e(trans('labels.purchased')); ?></option>
                    <option value="2"><?php echo e(trans('labels.takingCharge')); ?></option>
                    <option value="3"><?php echo e(trans('labels.sent')); ?></option>
                    <option value="4"><?php echo e(trans('labels.delivered')); ?></option>
                </select>
            </div>

        </div>
        <div class="col-0 col-sm-9"></div>
    </div>

    <?php ($i=1); ?>
    <?php ($a=0); ?>
    <ol class="list-group">
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php ($numProducts = 0); ?>
        <?php ($totalPrice = 0); ?>
        <?php $__currentLoopData = $orders_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($order_line->id_cart == $order->id): ?>
        <?php ($numProducts = $numProducts + 1); ?>
        <?php ($totalPrice = $totalPrice + $order_line->total_price); ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $__currentLoopData = $shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($shipment->id_cart == $order->id): ?>
        <?php ($status = $shipment->status); ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div id="selectedItem<?php echo e($order->id); ?>s<?php echo e($status); ?>">
            <li class="list-group-item list-group-item-secondary">
                <div class="row my-auto">
                    <div class="col-12 col-sm-2 fs-5 my-auto">
                        <b><?php echo e(trans('labels.orderID')); ?>: </b><?php echo e($order->id); ?><br>
                        <b><?php echo e(trans('labels.status')); ?>: </b>
                        <?php if($status == 0): ?>
                        <?php echo e(strtoupper(trans('labels.purchased'))); ?>

                        <?php elseif($status == 1): ?>
                        <?php echo e(strtoupper(trans('labels.takingCharge'))); ?>

                        <?php elseif($status == 2): ?>
                        <?php echo e(strtoupper(trans('labels.sent'))); ?>

                        <?php elseif($status == 3): ?>
                        <?php echo e(strtoupper(trans('labels.delivered'))); ?>

                        <?php endif; ?>
                    </div>
                    <div class="col-12 col-sm-3 fs-5 my-auto">
                        <b><?php echo e(trans('labels.purchaseDate')); ?>: </b><?php echo e($order->confirm_date); ?>

                    </div>
                    <div class="col-12 col-sm-3 fs-5 my-auto">
                        <b><?php echo e(trans('labels.totalPrice')); ?>: </b><?php echo e($totalPrice); ?> €
                    </div>
                    <div class="col-12 col-sm-2 fs-5 my-auto">
                        <b><?php echo e(trans('labels.numProducts')); ?>: </b><?php echo e($numProducts); ?>

                    </div>
                    <div class="col-12 col-sm-2 my-auto" align="right">
                        <button class="btn border-dark fs-5 my-auto" id="button<?php echo e($order->id); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($order->id); ?>" aria-controls="collapseExample" onclick="changeIcon(<?php echo e($order->id); ?>)">
                            <span class="me-1"><?php echo e(trans('labels.details')); ?></span>
                            <svg id="bi<?php echo e($order->id); ?>" class="bi my-auto" width="20" height="20" fill="currentColor">
                            <use id="icon<?php echo e($order->id); ?>" xlink:href="fonts/bootstrap-icons.svg#plus-lg"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </li>

            <li id="collapse<?php echo e($order->id); ?>" class="list-group-item collapse" style="background-color: #f8f9fa">
                <?php $__currentLoopData = $shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($shipment->id_cart == $order->id): ?>
                <?php ($status = $shipment->status); ?>
                <?php ($thisShipment = $shipment); ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="card card-body mb-3 mt-1">
                    <?php if($status == 0): ?>
                    <div class="row mt-3 mb-3">
                        <div class="col-12 col-sm-6 fs-3 my-auto" align="center">
                            <div class="row my-auto">
                                <span><b><?php echo e(trans('labels.status')); ?>: </b><?php echo e(strtoupper(trans('labels.purchased'))); ?></span>
                            </div>

                            <?php if(is_null($thisShipment->shipment_date)): ?>
                            <div class="row"><span><b><?php echo e(trans('labels.shipmentDate')); ?>: </b><?php echo e(strtoupper(trans('labels.notSent'))); ?></span></div>
                            <?php else: ?>
                            <div class="row my-auto"><span><b><?php echo e(trans('labels.shipmentDate')); ?>: </b><?php echo e($thisShipment->shipment_date); ?></span></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-0 col-sm-6 d-none d-sm-block">
                            <ul class="nav list-group-horizontal">
                                <li class="nav-item my-auto">
                                    <button type="button" class="btn btn-success btn-circle btn-xl text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(trans('labels.purchased')); ?>">
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
                                    <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-outline-success btn-circle btn-xl myBtnHover" data-bs-toggle="tooltip" data-placement="top" title="<?php echo e(trans('labels.takingCharge')); ?>">
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
                                    <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-outline-success btn-circle btn-xl myBtnHover" data-bs-toggle="tooltip" data-placement="top" title="<?php echo e(trans('labels.sent')); ?>">
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
                                    <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-outline-success btn-circle btn-xl myBtnHover"  data-bs-toggle="tooltip" data-placement="top" title="<?php echo e(trans('labels.delivered')); ?>">
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

                    <?php elseif($status == 1): ?>
                    <div class="row mt-3 mb-3">
                        <div class="col-12 col-sm-6 fs-3 my-auto" align="center">
                            <div class="row my-auto">
                                <span><b><?php echo e(trans('labels.status')); ?>: </b><?php echo e(strtoupper(trans('labels.takingCharge'))); ?></span>
                            </div>

                            <?php if(is_null($thisShipment->shipment_date)): ?>
                            <div class="row"><span><b><?php echo e(trans('labels.shipmentDate')); ?>: </b><?php echo e(strtoupper(trans('labels.notSent'))); ?></span></div>
                            <?php else: ?>
                            <div class="row my-auto"><span><b><?php echo e(trans('labels.shipmentDate')); ?>: </b><?php echo e($thisShipment->shipment_date); ?></span></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-0 col-sm-6 d-none d-sm-block">
                            <ul class="nav list-group-horizontal">
                                <li class="nav-item my-auto">
                                    <button type="button" class="btn btn-success btn-circle btn-xl text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(trans('labels.purchased')); ?>">
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
                                    <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-success btn-circle btn-xl"  data-bs-toggle="tooltip" data-placement="top" title="<?php echo e(trans('labels.takingCharge')); ?>">
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
                                    <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-outline-success btn-circle btn-xl myBtnHover"  data-bs-toggle="tooltip" data-placement="top" title="<?php echo e(trans('labels.sent')); ?>">
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
                                    <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-outline-success btn-circle btn-xl myBtnHover" data-bs-toggle="tooltip" data-placement="top" title="<?php echo e(trans('labels.delivered')); ?>">
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
                    <?php elseif($status == 2): ?>
                    <div class="row mt-3 mb-3">
                        <div class="col-12 col-sm-6 fs-3 my-auto" align="center">
                            <div class="row my-auto">
                                <span><b><?php echo e(trans('labels.status')); ?>: </b><?php echo e(strtoupper(trans('labels.sent'))); ?></span>
                            </div>

                            <?php if(is_null($thisShipment->shipment_date)): ?>
                            <div class="row"><span><b><?php echo e(trans('labels.shipmentDate')); ?>: </b><?php echo e(strtoupper(trans('labels.notSent'))); ?></span></div>
                            <?php else: ?>
                            <div class="row my-auto"><span><b><?php echo e(trans('labels.shipmentDate')); ?>: </b><?php echo e($thisShipment->shipment_date); ?></span></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-0 col-sm-6 d-none d-sm-block">
                            <ul class="nav list-group-horizontal">
                                <li class="nav-item my-auto">
                                    <button type="button" class="btn btn-success btn-circle btn-xl text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(trans('labels.purchased')); ?>">
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
                                    <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-success btn-circle btn-xl"  data-bs-toggle="tooltip" data-placement="top" title="<?php echo e(trans('labels.takingCharge')); ?>">
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
                                    <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-success btn-circle btn-xl"  data-bs-toggle="tooltip" data-placement="top" title="<?php echo e(trans('labels.sent')); ?>">
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
                                    <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-outline-success btn-circle btn-xl myBtnHover" data-bs-toggle="tooltip" data-placement="top" title="<?php echo e(trans('labels.delivered')); ?>">
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
                    <?php elseif($status == 3): ?>
                    <div class="row mt-3 mb-3">
                        <div class="col-12 col-sm-6 fs-3 my-auto" align="center">
                            <div class="row my-auto">
                                <span><b><?php echo e(trans('labels.status')); ?>: </b><?php echo e(strtoupper(trans('labels.delivered'))); ?></span>
                            </div>

                            <?php if(is_null($thisShipment->shipment_date)): ?>
                            <div class="row"><span><b><?php echo e(trans('labels.shipmentDate')); ?>: </b><?php echo e(strtoupper(trans('labels.notSent'))); ?></span></div>
                            <?php else: ?>
                            <div class="row my-auto"><span><b><?php echo e(trans('labels.shipmentDate')); ?>: </b><?php echo e($thisShipment->shipment_date); ?></span></div>
                            <?php endif; ?>

                        </div>
                        <div class="col-0 col-sm-6 d-none d-sm-block">
                            <ul class="nav list-group-horizontal">
                                <li class="nav-item my-auto">
                                    <button type="button" class="btn btn-success btn-circle btn-xl text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(trans('labels.purchased')); ?>">
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
                                    <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-success btn-circle btn-xl"  data-bs-toggle="tooltip" data-placement="top" title="<?php echo e(trans('labels.takingCharge')); ?>">
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
                                    <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-success btn-circle btn-xl"  data-bs-toggle="tooltip" data-placement="top" title="<?php echo e(trans('labels.sent')); ?>">
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
                                    <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-right"/>
                                    </svg>
                                </li>
                                <li class="nav-item my-auto">
                                    <button id="" type="button" class="btn btn-success btn-circle btn-xl" data-bs-toggle="tooltip" data-placement="top" title="<?php echo e(trans('labels.delivered')); ?>">
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
                    <?php endif; ?>
                </div>
                <ul id="ulID" class="list-group">

                    <?php ($total_price = 0); ?> 

                    <?php $__currentLoopData = $orders_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($order_line->id_cart === $order->id): ?>

                    <?php ($total_price = $total_price + $order_line->total_price); ?>


                    <li id="li<?php echo e($order_line->id); ?>" class="list-group-item d-flex justify-content-between align-items-start">

                        <div class="row ms-2 me-auto">
                            <div class="col-xs-12 col-sm-4 fw-bold" align="center" style="border-right: solid; border-right-width: 1.5px; border-right-color: lightgrey">
                                <?php if($order_line->product->id_category === 1): ?>
                                <img src="img/smartphones/sp-<?php echo e(strtolower($order_line->product->color)); ?>.png" class="img-thumbnail img-responsive border-0" width="60%" height="60%" align="center">
                                <?php elseif($order_line->product->id_category === 2): ?>
                                <img src="img/computers/pc-<?php echo e(strtolower($order_line->product->color)); ?>.png" class="img-thumbnail img-responsive border-0" style="margin-top: 3rem" width="70%" height="70%" align="center">
                                <?php elseif($order_line->product->id_category === 3): ?>
                                <img src="img/watches/wa-<?php echo e(strtolower($order_line->product->color)); ?>.png" class="img-thumbnail img-responsive border-0" style="margin-top: 3rem;" width="70%" height="70%" align="center">
                                <?php endif; ?>
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <div class="row" style="margin-bottom: 1rem; margin-top: 1rem">
                                    <h4><?php echo e(trans('labels.productCode')); ?>: <?php echo e($order_line->product->name); ?></h5>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <?php echo e(trans('labels.category')); ?>: 
                                                <?php if($order_line->product->id_category === 1): ?>
                                                Smartphone
                                                <?php elseif($order_line->product->id_category === 2): ?>
                                                Computer
                                                <?php elseif($order_line->product->id_category === 3): ?>
                                                Smartwatch
                                                <?php endif; ?>

                                            </li>
                                            <?php if($order_line->product->id_category !== 3): ?>
                                            <li class="list-group-item">
                                                <?php echo e(trans('labels.capacity')); ?>: <?php echo e($order_line->product->capacity); ?> GB
                                            </li>
                                            <li class="list-group-item">
                                                <?php echo e(trans('labels.color')); ?>: <?php echo e($order_line->product->color); ?>

                                            </li>
                                            <?php else: ?>
                                            <li class="list-group-item">
                                                <?php echo e(trans('labels.color')); ?>: <?php echo e($order_line->product->color); ?>

                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="list-group">
                                            <?php if($order_line->product->id_category !== 3): ?>
                                            <li class="list-group-item">
                                                <?php echo e(trans('labels.model')); ?>: <?php echo e($order_line->product->model); ?>"
                                            </li>
                                            <li class="list-group-item">
                                                <?php if( $order_line->product->assurance === 0 ): ?>
                                                <label><?php echo e(trans('labels.assurance')); ?>: <?php echo e(trans('labels.no')); ?></label>
                                                <?php else: ?>
                                                <label><?php echo e(trans('labels.assurance')); ?>: <?php echo e(trans('labels.yes')); ?></label>
                                                <?php endif; ?>
                                            </li>
                                            <?php endif; ?>
                                            <li class="list-group-item">
                                                <?php echo e(trans('labels.quantity')); ?>: <?php echo e($order_line->quantity); ?>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 1rem; margin-bottom: 1rem">
                                    <div class="col-sm-8">
                                        <?php if($order_line->quantity === 1): ?>
                                        <h4><?php echo e(trans('labels.price')); ?>: <?php echo e($order_line->total_price); ?> €</h4>
                                        <?php else: ?>
                                        <h4><?php echo e(trans('labels.price')); ?>: <?php echo e($order_line->product->price); ?> € x <?php echo e($order_line->quantity); ?> = <?php echo e($order_line->total_price); ?> €</h4>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#feedback-modal" onclick="changeCategoryID(<?php echo e($order_line->product->id_category); ?>)">
                                            <?php echo e(trans('labels.leaveFeedback')); ?>

                                            <svg class="bi mb-1" width="15" height="15" fill="currentColor">
                                            <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#star"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php $__currentLoopData = $shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($shipment->id_cart == $order->id): ?>
                <div class="card card-body mt-3">
                    <div class="row mb-2">
                        <div class="col">
                            <b class="fs-3 ms-3 text-uppercase my-auto"><?php echo e(trans('labels.shipmentInfo')); ?></b>
                            <svg class="bi ms-3 mb-2" width="40" height="40" fill="currentColor">
                            <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#truck"/>
                            </svg>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 col-sm-6">
                            <ul class="list-group list-group-flush fs-5">
                                <li class="list-group-item"><b><?php echo e(trans('labels.name')); ?>: </b><?php echo e($shipment->user_name); ?></li>
                                <li class="list-group-item"><b><?php echo e(trans('labels.streetAddress')); ?>: </b><?php echo e($shipment->address); ?></li>
                                <li class="list-group-item"><b><?php echo e(trans('labels.province')); ?>: </b><?php echo e($shipment->province); ?></li>
                                <li class="list-group-item"><b>CAP: </b><?php echo e($shipment->CAP); ?></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-6">
                            <ul class="list-group list-group-flush fs-5">
                                <li class="list-group-item"><b><?php echo e(trans('labels.surname')); ?>: </b><?php echo e($shipment->user_surname); ?></li>
                                <li class="list-group-item"><b><?php echo e(trans('labels.city')); ?>: </b><?php echo e($shipment->city); ?></li>
                                <li class="list-group-item"><b><?php echo e(trans('labels.country')); ?>: </b><?php echo e($shipment->country); ?></li>
                                <li class="list-group-item"><b><?php echo e(trans('labels.cellNumber')); ?>: </b><?php echo e($shipment->telephone_number); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </li>
        </div>
        <?php ($i=$i+1); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
    <?php endif; ?>

    <!--MODAL FEEDBACK-->
    <form id="feedbackForm" name="feedbackForm" method="post" action="<?php echo e(route('feedback.add')); ?>" enctype="multipart/form-data">  
        <?php echo csrf_field(); ?>
        <div class="fade modal" id="feedback-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content form-group">
                    <div id="feedbackHeaderToHide" class="modal-header">
                        <h5 class="modal-title"><?php echo e(trans('labels.leaveFeedback')); ?></h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body form-group">
                        <div class="row mt-3 justify-content-center" align="center">
                            <h4 class="mb-4 text-dark" id="textLoadingFeedback" hidden><?php echo e(trans('labels.loading')); ?>...</h4>
                            <h4 class="mb-4 text-success" id="textFeedbackConfirmed" hidden><?php echo e(trans('labels.feedbackConfirmed')); ?></h4>
                            <div class="row" id="feedbackBodyToHide">
                                <div class="col-12 col-sm-3 fs-3"><b><?php echo e(trans('labels.rate')); ?>:</b></div>
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
                                <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#check-circle"/>
                                </svg> 
                            </div>
                        </div>
                        <div id="textAreaToHide" class="row">
                            <div class="col-12 mt-5">
                                <textarea id="review" name="review" rows="5" class="form-control text-2xl mb-4 " style="font-size: 150%" type="text" placeholder="<?php echo e(trans('labels.writeFeedback')); ?>"></textarea>   
                            </div>
                        </div>
                    </div>
                    <div id="feedbackFooter" class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(trans('labels.close')); ?></button>
                        <button type="button" class="btn btn-success" onclick="confirmFeedback()"><?php echo e(trans('labels.send')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--END MODAL FEEDBACK-->
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Hard Disk\Programmi\XAMPP\htdocs\ecommerce\resources\views/orders/orders.blade.php ENDPATH**/ ?>