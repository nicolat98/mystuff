<?php $__env->startSection('titolo','Home'); ?>

<?php $__env->startSection('navbar'); ?>
<!-- LEFT NAVBAR-->
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="<?php echo e(route('home')); ?>">Home</a>
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
<div class="container">
    <div id="myCarousel" class="carousel slide my-carousel" data-bs-ride="carousel" >
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" class="not-active" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" class="not-active" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner my-carousel">
            <div class="carousel-item active my-carousel" align="center">
              <!--<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>-->
                <a class="image-holder" href="<?php echo e(route("smartphone.index")); ?>" >
                    <img  src="img/smartphones/sp-group2.png" class="img-thumbnail img-responsive border-0 img-carousel" >

                    <div class="carousel-caption text-start">
                        <div class="boxed py-1 px-3 col-12 col-sm-10 col-lg-8" style="border-radius: 25px;">
                            <h1><?php echo e(trans('labels.carousel-sp')); ?></h1>
                            <p><?php echo e(trans('labels.carousel-desc')); ?></p>  
                        </div>
                    </div>
                </a>

            </div>
            <div class="carousel-item">
              <!--<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>-->
                <a class="image-holder" href="<?php echo e(route("computer.index")); ?>"><img src="img/computers/com-group3.png" class="img-thumbnail img-responsive border-0 img-carousel">  </a>

                <div class="carousel-caption text-start">
                    <div class="boxed py-1 px-3 col-12 col-sm-10 col-lg-8" style="border-radius: 25px;">
                        <h1><?php echo e(trans('labels.carousel-pc')); ?></h1>
                        <p><?php echo e(trans('labels.carousel-desc')); ?></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
              <!--<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>-->
                <a class="image-holder" href="<?php echo e(route("watch.index")); ?>"><img src="img/watches/wa-group2.png" class="img-thumbnail img-responsive border-0 img-carousel"></a>

                <div class="carousel-caption text-start">
                    <div class="boxed py-1 px-3 col-12 col-sm-10 col-lg-8" style="border-radius: 25px;">
                        <h1><?php echo e(trans('labels.carousel-sw')); ?></h1>
                        <p><?php echo e(trans('labels.carousel-desc')); ?></p>
                    </div>
                </div>

            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <svg class="bi text-dark" width="50" height="50" fill="currentColor">
            <use xlink:href="fonts/bootstrap-icons.svg#chevron-left"/>
            </svg>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <svg class="bi text-dark" width="50" height="50" fill="currentColor">
            <use xlink:href="fonts/bootstrap-icons.svg#chevron-right"/>
            </svg>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
          <!--<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>-->
            <img src="img/others/corriere.png" class="img-thumbnail img-responsive border-0 rounded-circle" width="50%" height="50%" align="center">
            <h2><?php echo e(trans('labels.shipments')); ?></h2>

            <p><a class="btn btn-secondary" href="#" data-bs-toggle="modal" data-bs-target="#info1"><?php echo e(trans('labels.viewDetails')); ?> &raquo;</a></p>


            <!-- Modal -->
            <div class="modal fade" id="info1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" align='center'>
                            <h5 class="modal-title w-100" id="staticBackdropLabel"><?php echo e(trans('labels.shipments')); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                        </div>
                        <div id="modal-confirm-sp" class="modal-body text">
                            <p align="left"><?php echo e(trans('labels.shipmentsDesc')); ?></p>

                        </div>

                    </div>
                </div>
            </div> 

        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <!--<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>-->
            <img src="img/others/reso.png" class="img-thumbnail img-responsive border-0 rounded-circle" width="50%" height="50%" align="center">
            <h2><?php echo e(trans('labels.returns')); ?></h2>
            <p><a class="btn btn-secondary" href="#"data-bs-toggle="modal" data-bs-target="#info2"><?php echo e(trans('labels.viewDetails')); ?> &raquo;</a></p>

            <!-- Modal -->
            <div class="modal fade" id="info2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" align='center'>
                            <h5 class="modal-title w-100" id="staticBackdropLabel"><?php echo e(trans('labels.returns')); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                        </div>
                        <div id="modal-confirm-sp" class="modal-body text">
                            <p align="left"><?php echo e(trans('labels.returnsDesc')); ?></p>
                        </div>

                    </div>
                </div>
            </div> 
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <!--<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>-->
            <img src="img/others/payment.png" class="img-thumbnail img-responsive border-0 rounded-circle" width="60%" height="60%" align="center">
            <h2><?php echo e(trans('labels.payments')); ?></h2>

            <p><a class="btn btn-secondary" href="#" data-bs-toggle="modal" data-bs-target="#info3"><?php echo e(trans('labels.viewDetails')); ?> &raquo;</a></p>
            <!-- Modal -->
            <div class="modal fade" id="info3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" align='center'>
                            <h5 class="modal-title w-100" id="staticBackdropLabel"><?php echo e(trans('labels.payments')); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                        </div>
                        <div id="modal-confirm-sp" class="modal-body text">
                            <p align="left"><?php echo e(trans('labels.paymentDesc')); ?></p>
                            <ul>
                                <li align="left">Visa</li>
                                <li align="left">Visa Electron</li>
                                <li align="left">Postepay</li>
                                <li align="left">MasterCard</li>
                                <li align="left">American Express</li>
                                <li align="left">PayPal</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>


        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading text-dark"><?php echo e(trans('labels.featurette1.1')); ?> <span class="text-muted"><?php echo e(trans('labels.featurette1.2')); ?></span></h2>
            <p class="lead" style="font-size: 30px"><?php echo e(trans('labels.featurette1.3')); ?></p>
            <a href="<?php echo e(route("smartphone.index")); ?>" class="btn btn-primary rounded-pill fs-5" role="button">
                <?php echo e(trans('labels.discover&buy')); ?>

                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="fonts/bootstrap-icons.svg#chevron-right"/>
                </svg>

            </a>
        </div>
        <div class="col-md-5">
            <img class="img-responsive img-thumbnail border-0" src="img/featurette1.png" >
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading text-dark"><?php echo e(trans('labels.featurette2.1')); ?> <span class="text-muted"><?php echo e(trans('labels.featurette2.2')); ?></span></h2>
            <p class="lead" style="font-size: 30px"><?php echo e(trans('labels.featurette2.3')); ?></p>
            <a href="<?php echo e(route("computer.index")); ?>" class="btn btn-primary rounded-pill fs-5" role="button">
                <?php echo e(trans('labels.discover&buy')); ?>

                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="fonts/bootstrap-icons.svg#chevron-right"/>
                </svg>

            </a>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="img-responsive img-thumbnail border-0" src="img/featurette2.png" >
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading text-dark"><?php echo e(trans('labels.featurette3.1')); ?> <span class="text-muted"><?php echo e(trans('labels.featurette3.2')); ?></span></h2>
            <p class="lead" style="font-size: 30px"><?php echo e(trans('labels.featurette3.3')); ?></p>
            <a href="<?php echo e(route("watch.index")); ?>" class="btn btn-primary rounded-pill fs-5" role="button">
                <?php echo e(trans('labels.discover&buy')); ?>

                <svg class="bi" width="20" height="20" fill="currentColor">
                <use xlink:href="fonts/bootstrap-icons.svg#chevron-right"/>
                </svg>

            </a>
        </div>
        <div class="col-md-5">
            <img class="img-responsive img-thumbnail border-0" src="img/featurette3.png" >
        </div>
    </div>

    <hr class="featurette-divider">
    <div class="row justify-content-center my-auto" style="padding-bottom: 80px">
        <button id="btnToTop" type="button" class="btn btn-dark btn-circle btn-xl text-center" onclick="topFunction()">
            <svg id="" class="bi" width="30" height="30" fill="currentColor">
            <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#arrow-up"/>
            </svg>
        </button>
    </div>

    <!-- /END THE FEATURETTES -->

</div><!-- /.container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Hard Disk\Programmi\XAMPP\htdocs\ecommerce\resources\views/index.blade.php ENDPATH**/ ?>