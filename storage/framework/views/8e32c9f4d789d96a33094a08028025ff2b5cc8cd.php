<?php $__env->startSection('titolo','FAQ'); ?>

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
        <a class="nav-link active" href="<?php echo e(route('faq.index')); ?>">FAQ</a>
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

        <a href="<?php echo e(route('cart.index')); ?>" role="button" class="btn btn-outline-dark button-sm position-relative" style="vertical-align: middle;">
            <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
            <use xlink:href="fonts/bootstrap-icons.svg#cart4"/>
            </svg>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-success">
                <?php echo e($num_cart_lines); ?>

            </span>

        </a>
        <?php endif; ?>
        <?php else: ?>
        <a href="<?php echo e(route('login')); ?>">
            <button type="button" class="btn btn-outline-dark button-sm position-relative" style="vertical-align: middle;">
                <svg class="bi" width="32" height="32" fill="currentColor" style="vertical-align: middle">
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
            <button type="button" class="btn btn-outline-dark button-sm position-relative">
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
<div class="container-sm" style="padding-bottom:3rem; margin-top: 3rem">
    <div class="row border-bottom border-dark mb-4 text-uppercase text-dark">
        <h1>FAQ</h1>
    </div>
    <div class="row">

        <div class="col-12 col-sm-6">
            <div class="row ms-2 mb-4 mt-4">
                <div class="col-1">
                    <svg class="bi text-dark" width="32" height="32" fill="currentColor">
                    <use xlink:href="fonts/bootstrap-icons.svg#credit-card"/>
                    </svg>

                </div>
                <div class="col-11 align-items-start">
                    <h3 class="text-dark"><?php echo e(trans('labels.payment')); ?></h3>
                </div>
            </div>


            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h1 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <?php echo e(trans('labels.faq1')); ?>

                        </button>
                    </h1>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body fs-5">
                            <?php echo e(trans('labels.faq1r')); ?>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <?php echo e(trans('labels.faq2')); ?>

                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body fs-5">
                            <?php echo e(trans('labels.faq2r')); ?>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <?php echo e(trans('labels.faq3')); ?>

                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body fs-5">
                            <?php echo e(trans('labels.faq3r')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="row ms-2 mb-4 mt-4">
                <div class="col-1">
                    <svg class="bi text-dark" width="32" height="32" fill="currentColor">
                    <use xlink:href="fonts/bootstrap-icons.svg#truck"/>
                    </svg>

                </div>
                <div class="col-11 align-items-start">
                    <h3 class="text-dark"><?php echo e(trans('labels.shipment')); ?></h3>
                </div>
            </div>

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h1 class="accordion-header" id="heading4">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                            <?php echo e(trans('labels.faq4')); ?>

                        </button>
                    </h1>
                    <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                        <div class="accordion-body fs-5">
                            <?php echo e(trans('labels.faq4r')); ?>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading5">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            <?php echo e(trans('labels.faq5')); ?>

                        </button>
                    </h2>
                    <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionExample">
                        <div class="accordion-body fs-5">
                            <?php echo e(trans('labels.faq5r')); ?>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading6">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                            <?php echo e(trans('labels.faq6')); ?>

                        </button>
                    </h2>
                    <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordionExample">
                        <div class="accordion-body fs-5">
                            <?php echo e(trans('labels.faq6r')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">

        <div class="col-12 col-sm-6">
            <div class="row ms-2 mb-4 mt-4">
                <div class="col-1">
                    <svg class="bi text-dark" width="32" height="32" fill="currentColor">
                    <use xlink:href="fonts/bootstrap-icons.svg#wallet2"/>
                    </svg>

                </div>
                <div class="col-11 align-items-start">
                    <h3 class="text-dark"><?php echo e(trans('labels.returns&refunds')); ?></h3>
                </div>
            </div>


            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h1 class="accordion-header" id="heading7">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                            <?php echo e(trans('labels.faq7')); ?>

                        </button>
                    </h1>
                    <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordionExample">
                        <div class="accordion-body fs-5">
                            <?php echo e(trans('labels.faq7r')); ?>

                       </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading8">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                            <?php echo e(trans('labels.faq8')); ?>

                        </button>
                    </h2>
                    <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordionExample">
                        <div class="accordion-body fs-5">
                            <?php echo e(trans('labels.faq8r')); ?>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading9">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                           <?php echo e(trans('labels.faq9')); ?>

                        </button>
                    </h2>
                    <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9" data-bs-parent="#accordionExample">
                        <div class="accordion-body fs-5">
                            <?php echo e(trans('labels.faq9r')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="row ms-2 mb-4 mt-4">
                <div class="col-1">
                    <svg class="bi text-dark" width="32" height="32" fill="currentColor">
                    <use xlink:href="fonts/bootstrap-icons.svg#box-seam"/>
                    </svg>

                </div>
                <div class="col-11 align-items-start">
                    <h3 class="text-dark"><?php echo e(trans('labels.orderManagement')); ?></h3>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h1 class="accordion-header" id="heading10">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
                            <?php echo e(trans('labels.faq10')); ?>

                        </button>
                    </h1>
                    <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body fs-5">
                            <?php echo e(trans('labels.faq10r')); ?>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading11">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                            <?php echo e(trans('labels.faq11')); ?>

                        </button>
                    </h2>
                    <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11" data-bs-parent="#accordionExample">
                        <div class="accordion-body fs-5">
                            <?php echo e(trans('labels.faq11r')); ?>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading12">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                            <?php echo e(trans('labels.faq12')); ?>

                        </button>
                    </h2>
                    <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionExample">
                        <div class="accordion-body fs-5">
                            <?php echo e(trans('labels.faq12r')); ?>

                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Hard Disk\Programmi\XAMPP\htdocs\ecommerce\resources\views/layouts/faq.blade.php ENDPATH**/ ?>