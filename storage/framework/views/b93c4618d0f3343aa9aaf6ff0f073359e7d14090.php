<?php $__env->startSection('titolo','Cart'); ?>

<?php $__env->startSection('navbar'); ?>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a>
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
            <a class="nav-link" href="#"><?php echo e(trans('labels.accessories')); ?></a>
        </li>
        <!-- DROPDOWN NAVBAR
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
    </ul>
    <form class="d-flex navbar-nav">
        <input class="form-control me-2" type="search" placeholder="<?php echo e(trans('labels.search')); ?>" aria-label="Search">
        <button class="btn btn-outline-dark me-4" type="submit">
            <svg class="bi text-ligth" width="32" height="32" fill="currentColor">
            <use xlink:href="fonts/bootstrap-icons.svg#search"/>
            </svg> 
        </button>
    </form>

    <ul class="d-flex navbar-nav">

        <li class="nav-item">
            <!--<a href="<?php echo e(route('login')); ?>">
                <button class="border-0 trasparent-button">
                    <svg class="bi" width="32" height="32" fill="currentColor">
                    <use xlink:href="fonts/bootstrap-icons.svg#person"/>
                    </svg>
                </button>
            </a>-->
            <?php if(auth()->guard()->check()): ?>
            <a><i><?php echo e(trans('labels.welcome')); ?> <?php echo e(Auth::user()->name); ?></i></a>

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

            <?php else: ?>
            <a href="<?php echo e(route('login')); ?>">
                <button class="border-0 trasparent-button">
                    <?php echo e(trans('labels.login')); ?>

                    <svg class="bi" width="22" height="22" fill="currentColor">
                    <use xlink:href="fonts/bootstrap-icons.svg#person-circle"/>
                    </svg>
                </button>
            </a>
            <?php endif; ?>
        </li>

        <li class="nav-item">
            <a href="<?php echo e(route('cart.index')); ?>">
                <button class="border-0 trasparent-button">
                    <svg class="bi" width="32" height="32" fill="currentColor">
                    <use xlink:href="fonts/bootstrap-icons.svg#cart4"/>
                    </svg> 
                </button>
            </a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('corpo'); ?>
    <div class="container-sm" style="margin-top: 3rem; margin-bottom:3rem;">
        <?php if(count($cartLines) === 0): ?>
            <div class="row" style="margin-top: 10rem; margin-bottom: 10rem;">
                <svg class="bi text-ligth img-responsive" width="100" height="100" style="margin-bottom: 3rem">
                    <use xlink:href="fonts/bootstrap-icons.svg#cart4"/>
                </svg>
                <h1 class="display-2" align="center" ><?php echo e(trans('labels.emptyCart')); ?></h1>
            </div>
        <?php else: ?>
        <ul class="list-group list-group-numbered">
            <?php $__currentLoopData = $cartLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                
                <div class="row ms-2 me-auto">
                    <div class="col-xs-12 col-sm-4 fw-bold" align="center" style="border-right: solid; border-right-width: 1.5px; border-right-color: lightgrey">
                            <img src="img/smartphones/sp-<?php echo e(strtolower($cart_line->product->color)); ?>.png" class="img-thumbnail img-responsive border-0" width="60%" height="60%" align="center">
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <div class="row" style="margin-bottom: 1rem; margin-top: 1rem">
                            <h4><?php echo e($cart_line->product->name); ?></h5>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        Product ID: <?php echo e($cart_line->product->id); ?>

                                    </li>
                                    <li class="list-group-item">
                                        <?php echo e(trans('labels.capacity')); ?>: <?php echo e($cart_line->product->capacity); ?> GB
                                    </li>
                                    <li class="list-group-item">
                                        <?php echo e(trans('labels.color')); ?>: <?php echo e($cart_line->product->color); ?>

                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <?php echo e(trans('labels.model')); ?>: <?php echo e($cart_line->product->model); ?>"
                                    </li>
                                    <li class="list-group-item">
                                        <?php if( $cart_line->product->assurance === 0 ): ?>
                                            <label><?php echo e(trans('labels.assurance')); ?>: NO</label>
                                        <?php else: ?>
                                            <label><?php echo e(trans('labels.assurance')); ?>: SI</label>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 2rem">
                            <div class="col-sm-10">
                                <h2 ><?php echo e(trans('labels.price')); ?>: <?php echo e($cart_line->product->price); ?> €</h2>
                            </div>
                            <div class="col-sm-2">
                                <a href="<?php echo e(route('cartLine.destroy.confirm', ['id' => $cart_line->id])); ?>">
                                    <button type="button" class="btn btn-outline-primary btn-md">
                                        <?php echo e(trans('labels.remove')); ?>  
                                    </button> 
                                </a>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <span class="badge bg-dark rounded-pill"><?php echo e($cart_line->add_date); ?></span>
                
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Hard Disk\Programmi\XAMPP\htdocs\ecommerce\resources\views/cart.blade.php ENDPATH**/ ?>