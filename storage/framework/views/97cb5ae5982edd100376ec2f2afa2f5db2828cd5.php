<?php $__env->startSection('titolo','Computer'); ?>

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
        <a class="nav-link active" href="<?php echo e(route('computer.index')); ?>">Computer</a>
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
<div class="container-fluid " style="padding-right:4rem">
    <div class="row justify-content-center" align="center" style="margin-top: 5rem;"> 
        <div class="col-12 col-sm-6" align="center">
            <div class="row justify-content-center btn-group btn-circle" style="margin-top: 2rem; margin-bottom: 2rem">
                <button type="button" class="btn pc-color-blue btn-circle btn-md border-3 border-dark" onclick='changeImagePC("img/computers/pc-blue.png")'></button>
                <button type="button" class="btn pc-color-orange btn-circle btn-md border-3 border-dark" onclick='changeImagePC("img/computers/pc-orange.png")'></button>
                <button type="button" class="btn pc-color-white btn-circle btn-md border-3 border-dark" onclick='changeImagePC("img/computers/pc-white.png")'></button>
            </div>
            <div class="row justify-content-center">
                <img src="img/computers/pc-blue.png" class="img-fluid img-responsive " width="60%" height="60%" align="center" id="pc-img">
            </div>
            <!-- feedbacks-->
            <b class="fs-3 text-dark"><?php echo e($numFeedbacks); ?> <?php echo e(trans('labels.reviews')); ?>: <?php echo e($total_score); ?>/5.0</b>
            <div class="mb-3" id="feedbackStarsPC" data-rateyo-rating="<?php echo e($total_score); ?>"></div>
        </div>
        <div class="col-12 col-sm-6 " align="center">
            <div class="card">
                <div class="list-group list-group-flush">
                    <div class="list-group-item card-header bg-light">
                        <h5 class="display-4"><?php echo e(trans('labels.buyPC')); ?></h5> 
                    </div>

                    <li class="list-group-item mt-2">
                        <h5 class="card-title fs-3"><?php echo e(trans('labels.chooseCapacity')); ?></h5>

                        <div class="btn-toolbar mybtn justify-content-center" role="toolbar" aria-label="radioButtons1">
                            <div class="btn-group shadow" role="group">
                                <input type="radio" class="btn-check" name="btnradio1" id="btnradio1" autocomplete="off" checked onclick='changeTheTextPC()'>
                                <label class="btn btn-outline-dark fs-3" for="btnradio1">
                                    <p class='fs-2'>128 GB</p>
                                    <p class='fs-5'>Base</p>
                                </label> 

                                <input type="radio" class="btn-check" name="btnradio1" id="btnradio2" autocomplete="off" onclick='changeTheTextPC()'>
                                <label class="btn btn-outline-dark fs-3" for="btnradio2">
                                    <p class='fs-2'>256 GB</p>
                                    <p class='fs-5'>+ € 49.99</p>
                                </label>

                                <input type="radio" class="btn-check" name="btnradio1" id="btnradio3" autocomplete="off" onclick='changeTheTextPC()'>
                                <label class="btn btn-outline-dark fs-3" for="btnradio3">
                                    <p class='fs-2'>512 GB</p>
                                    <p class='fs-5'>+ € 99.99</p>
                                </label>

                                <input type="radio" class="btn-check" name="btnradio1" id="btnradio4" autocomplete="off" onclick='changeTheTextPC()'>
                                <label class="btn btn-outline-dark fs-3" for="btnradio4">
                                    <p class='fs-2'>1 TB</p>
                                    <p class='fs-5'>+ € 149.99</p>
                                </label>
                            </div> 
                        </div>
                    </li>
                    <li class="list-group-item mt-2">
                        <h5 class="card-title fs-3"><?php echo e(trans('labels.chooseModel')); ?></h5>
                        <div class="btn-toolbar mybtn justify-content-center" role="toolbar" aria-label="radioButtons2">
                            <div class="btn-group me-3 shadow" role="group">
                                <input type="radio" class="btn-check" name="btnradio2" id="btnradio5" autocomplete="off" checked onclick='changeTheTextPC()'>
                                <label class="btn btn-outline-dark fs-4" for="btnradio5">
                                    <p class='fs-3'>13"</p>
                                    <p class='fs-5'>Base</p>
                                </label>

                                <input type="radio" class="btn-check" name="btnradio2" id="btnradio6" autocomplete="off" onclick='changeTheTextPC()'>
                                <label class="btn btn-outline-dark fs-4" for="btnradio6">
                                    <p class='fs-3'>16"</p>
                                    <p class='fs-5'>+ € 119.99</p>
                                </label>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item mt-2">
                        <h5 class="card-title fs-3"><?php echo e(trans('labels.askAssurance')); ?></h5>

                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-8 justify-content-center">
                                <p class="card-text">
                                <ul style="margin-left: 5rem">
                                    <li class="text" align="left"><?php echo e(trans('labels.sp-ass-01')); ?></li>
                                    <li class="text" align="left"><?php echo e(trans('labels.sp-ass-02')); ?></li>
                                    <li class="text" align="left"><?php echo e(trans('labels.sp-ass-03')); ?></li>
                                </ul>
                                </p>
                            </div>


                            <div class="col-12 col-sm-4 justify-content-center">
                                <div class="btn-toolbar mybtn justify-content-center" role="toolbar" aria-label="radioButtons3">

                                    <div class="btn-group me-3 shadow" role="group">                                   
                                        <input type="radio" class="btn-check" name="btnradio3" id="btnradio8" autocomplete="off" checked onclick='changeTheTextPC()'>
                                        <label class="btn btn-outline-dark fs-4" for="btnradio8">
                                            <p class='fs-3'><?php echo e(trans('labels.no')); ?></p>
                                            <p class='fs-5'>Base</p>
                                        </label>

                                        <input type="radio" class="btn-check" name="btnradio3" id="btnradio7" autocomplete="off" onclick='changeTheTextPC()'>
                                        <label class="btn btn-outline-dark fs-4" for="btnradio7">
                                            <p class='fs-3'><?php echo e(trans('labels.yes')); ?></p>
                                            <p class='fs-5'>+ € 49.99</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class='row' style="margin-top:1rem; margin-bottom: 1rem; vertical-align: middle">
                            <div class='col-12 col-sm-6'>
                                <label class="display-4 text-dark" >
                                    <?php echo e(trans('labels.price')); ?>: <b id="price">€ 599.99</b>
                                </label> 
                            </div>


                            <div class='col-12 col-sm-2'>

                                <select class="form-select form-control fs-5 mt-3" id="selectQuantityPC">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <!--<div class='col'> 
                                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#cart-modal" data-bs-backdrop="static" aria-hidden="true" data-bs-keyboard="false"style="margin-top: 1rem; margin-bottom: 1rem">
                                    Aggiungi al carrello
                                </button>
                            </div> 
                            <div class="modal-dialog modal-dialog-centered" id='cart-modal'>
                                <p>ciao</p>
                            </div>-->
                            <div class="col-12 col-sm-4 mt-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#cart-modal" onclick='changeModalBodyTextPC()'>
                                    <?php echo e(trans('labels.add')); ?>

                                    <svg class="bi" width="24" height="24" style="margin-left:0.5rem; margin-bottom: 0.5rem" fill="currentColor">
                                    <use xlink:href="fonts/bootstrap-icons.svg#bag-plus"/>
                                    </svg>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="cart-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel"><?php echo e(trans('labels.confirmPurchase')); ?> Computer</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                            </div>
                                            <div id="modal-confirm-pc" class="modal-body">
                                            </div>
                                            <div class="modal-footer">
                                                <!----------------------------------------------------->                                                    
                                                <form class="form-horizontal" name="computer" method="post" action="<?php echo e(route('computer.store')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-group">
                                                        <div class="col-sm-10">
                                                            <input class="form-control hidden" type="text" id="inputNamePC" name="inputNamePC" placeholder="<?php echo e(trans('labels.confirm')); ?>" value="">
                                                            <input class="form-control hidden" type="text" id="inputPricePC" name="inputPricePC" placeholder="<?php echo e(trans('labels.confirm')); ?>" value="">
                                                            <input class="form-control hidden" type="text" id="inputCategoryPC" name="inputCategoryPC" platleceholder="<?php echo e(trans('labels.confirm')); ?>" value="">
                                                            <input class="form-control hidden" type="text" id="inputCapacityPC" name="inputCapacityPC" placeholder="<?php echo e(trans('labels.confirm')); ?>" value="">
                                                            <input class="form-control hidden" type="text" id="inputModelPC" name="inputModelPC" placeholder="<?php echo e(trans('labels.confirm')); ?>" value="">
                                                            <input class="form-control hidden" type="text" id="inputAssurancePC" name="inputAssurancePC" placeholder="<?php echo e(trans('labels.confirm')); ?>" value="">
                                                            <input class="form-control hidden" type="text" id="inputColorPC" name="inputColorPC" placeholder="<?php echo e(trans('labels.confirm')); ?>" value="">
                                                            <input class="form-control hidden" type="text" id="inputQuantityPC" name="inputQuantityPC" placeholder="<?php echo e(trans('labels.confirm')); ?>" value="">
                                                        </div>
                                                    </div>

                                                    <!------------------------------------------------------------------------------------> 


                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(trans('labels.cancel')); ?></button>
                                                        <?php if(auth()->guard()->check()): ?>

                                                        <button type="submit" class="btn btn-success" style="text-decoration:none; color:white">
                                                            <?php echo e(trans('labels.confirm')); ?>


                                                        </button>

                                                        <?php else: ?>
                                                        <button type="button" class="btn btn-success" style="text-decoration:none; color:white">
                                                            <a href="<?php echo e(route('cart.index')); ?>" style="text-decoration:none; color:white"><?php echo e(trans('labels.confirm')); ?></a>
                                                        </button>
                                                        <?php endif; ?> 
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>

                    </li>


                </div>
            </div>
        </div>                
    </div>

    <div class="row justify-content-center mb-3 mt-3">
        <div class="col-12 col-sm-6 justify-content-center">

            <?php if(count($feedbacks) === 0): ?>
            <div class="row justify-content-center mb-2">
                <b class="text-dark fs-3" align="center"><?php echo e(trans('labels.noReviews')); ?></b>
            </div>

            <?php elseif(count($feedbacks) === 1): ?>

            <div class="row justify-content-center mb-2 mt-4">
                <div class="col col-sm-9">
                    <div class="card" style=" margin-bottom: 0.5rem">
                        <div class="card-header fs-4">
                            <div class="row">
                                <div class="col">
                                    <?php echo e(trans('labels.latestReviews')); ?>

                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6"><b class="fs-5" ><?php echo e($feedbacks[count($feedbacks)-1]->user->name); ?></b></div>
                                    <div class="col-12 col-xl-4" id="userStarsPC1" data-rateyo-rating="<?php echo e($feedbacks[count($feedbacks)-1]->score); ?>"></div>
                                    <div class="col-12 col-xl-2"><b><?php echo e($feedbacks[count($feedbacks)-1]->score); ?>/5.0</b></div>
                                </div>

                                <div class="row">
                                    <label><?php echo e($feedbacks[count($feedbacks)-1]->comment); ?></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <?php elseif(count($feedbacks) === 2): ?>
            <div class="row justify-content-center mb-2 mt-4">
                <div class="col col-sm-9">
                    <div class="card" style=" margin-bottom: 0.5rem">
                        <div class="card-header fs-4">
                            <div class="row">
                                <div class="col-9">
                                    <?php echo e(trans('labels.latestReviews')); ?>

                                </div>
                                <div class="col-3 " align="right">

                                    <button class="btn fs-5 text-secondary" data-bs-toggle="modal" data-bs-target="#reviews-modal" onclick="updateStarsPC(<?php echo e(count($feedbacks)); ?>)">
                                        <?php echo e(trans('labels.all')); ?>

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
                                    <div class="col-12 col-xl-6"><b class="fs-5" ><?php echo e($feedbacks[count($feedbacks)-1]->user->name); ?></b></div>
                                    <div class="col-12 col-xl-4" id="userStarsPC1" data-rateyo-rating="<?php echo e($feedbacks[count($feedbacks)-1]->score); ?>"></div>
                                    <div class="col-12 col-xl-2"><b><?php echo e($feedbacks[count($feedbacks)-1]->score); ?>/5.0</b></div>
                                </div>

                                <div class="row">
                                    <label><?php echo e($feedbacks[count($feedbacks)-1]->comment); ?></label>
                                </div>
                            </li>
                        </ul>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6"><b class="fs-5" ><?php echo e($feedbacks[count($feedbacks)-2]->user->name); ?></b></div>
                                    <div class="col-12 col-xl-4" id="userStarsPC2" data-rateyo-rating="<?php echo e($feedbacks[count($feedbacks)-2]->score); ?>"></div>
                                    <div class="col-12 col-xl-2"><b><?php echo e($feedbacks[count($feedbacks)-2]->score); ?>/5.0</b></div>
                                </div>

                                <div class="row">

                                    <label><?php echo e($feedbacks[count($feedbacks)-2]->comment); ?></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php elseif(count($feedbacks) === 3): ?>
            <div class="row justify-content-center mb-2 mt-4">
                <div class="col col-sm-9">
                    <div class="card" style=" margin-bottom: 0.5rem">
                        <div class="card-header fs-4">
                            <div class="row">
                                <div class="col-9">
                                    <?php echo e(trans('labels.latestReviews')); ?>

                                </div>
                                <div class="col-3 " align="right">

                                    <button class="btn fs-5 text-secondary" data-bs-toggle="modal" data-bs-target="#reviews-modal" onclick="updateStarsPC(<?php echo e(count($feedbacks)); ?>)">
                                        <?php echo e(trans('labels.all')); ?>

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
                                    <div class="col-12 col-xl-6"><b class="fs-5" ><?php echo e($feedbacks[count($feedbacks)-1]->user->name); ?></b></div>
                                    <div class="col-12 col-xl-4" id="userStarsPC1" data-rateyo-rating="<?php echo e($feedbacks[count($feedbacks)-1]->score); ?>"></div>
                                    <div class="col-12 col-xl-2"><b><?php echo e($feedbacks[count($feedbacks)-1]->score); ?>/5.0</b></div>
                                </div>

                                <div class="row">
                                    <label><?php echo e($feedbacks[count($feedbacks)-1]->comment); ?></label>
                                </div>
                            </li>
                        </ul>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6"><b class="fs-5" ><?php echo e($feedbacks[count($feedbacks)-2]->user->name); ?></b></div>
                                    <div class="col-12 col-xl-4" id="userStarsPC2" data-rateyo-rating="<?php echo e($feedbacks[count($feedbacks)-2]->score); ?>"></div>
                                    <div class="col-12 col-xl-2"><b><?php echo e($feedbacks[count($feedbacks)-2]->score); ?>/5.0</b></div>
                                </div>

                                <div class="row">

                                    <label><?php echo e($feedbacks[count($feedbacks)-2]->comment); ?></label>
                                </div>
                            </li>
                        </ul>
                        
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6"><b class="fs-5" ><?php echo e($feedbacks[count($feedbacks)-3]->user->name); ?></b></div>
                                    <div class="col-12 col-xl-4" id="userStarsPC3" data-rateyo-rating="<?php echo e($feedbacks[count($feedbacks)-3]->score); ?>"></div>
                                    <div class="col-12 col-xl-2"><b><?php echo e($feedbacks[count($feedbacks)-3]->score); ?>/5.0</b></div>
                                </div>

                                <div class="row">

                                    <label><?php echo e($feedbacks[count($feedbacks)-3]->comment); ?></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="row justify-content-center mb-2 mt-4">
                <div class="col col-sm-9">
                    <div class="card" style=" margin-bottom: 0.5rem">
                        <div class="card-header fs-4">
                            <div class="row">
                                <div class="col-9">
                                    <?php echo e(trans('labels.latestReviews')); ?>

                                </div>
                                <div class="col-3 " align="right">

                                    <button class="btn fs-5 text-secondary" data-bs-toggle="modal" data-bs-target="#reviews-modal" onclick="updateStarsPC(<?php echo e(count($feedbacks)); ?>)">
                                        <?php echo e(trans('labels.all')); ?>

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
                                    <div class="col-12 col-xl-6"><b class="fs-5" ><?php echo e($feedbacks[count($feedbacks)-1]->user->name); ?></b></div>
                                    <div class="col-12 col-xl-4" id="userStarsPC1" data-rateyo-rating="<?php echo e($feedbacks[count($feedbacks)-1]->score); ?>"></div>
                                    <div class="col-12 col-xl-2"><b><?php echo e($feedbacks[count($feedbacks)-1]->score); ?>/5.0</b></div>
                                </div>

                                <div class="row">
                                    <label><?php echo e($feedbacks[count($feedbacks)-1]->comment); ?></label>
                                </div>
                            </li>
                        </ul>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6"><b class="fs-5" ><?php echo e($feedbacks[count($feedbacks)-2]->user->name); ?></b></div>
                                    <div class="col-12 col-xl-4" id="userStarsPC2" data-rateyo-rating="<?php echo e($feedbacks[count($feedbacks)-2]->score); ?>"></div>
                                    <div class="col-12 col-xl-2"><b><?php echo e($feedbacks[count($feedbacks)-2]->score); ?>/5.0</b></div>
                                </div>

                                <div class="row">

                                    <label><?php echo e($feedbacks[count($feedbacks)-2]->comment); ?></label>
                                </div>
                            </li>
                        </ul>
                        
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6"><b class="fs-5" ><?php echo e($feedbacks[count($feedbacks)-3]->user->name); ?></b></div>
                                    <div class="col-12 col-xl-4" id="userStarsPC3" data-rateyo-rating="<?php echo e($feedbacks[count($feedbacks)-3]->score); ?>"></div>
                                    <div class="col-12 col-xl-2"><b><?php echo e($feedbacks[count($feedbacks)-3]->score); ?>/5.0</b></div>
                                </div>

                                <div class="row">

                                    <label><?php echo e($feedbacks[count($feedbacks)-3]->comment); ?></label>
                                </div>
                            </li>
                        </ul>
                        
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >
                                <div class="row">
                                    <div class="col-12 col-xl-6"><b class="fs-5" ><?php echo e($feedbacks[count($feedbacks)-4]->user->name); ?></b></div>
                                    <div class="col-12 col-xl-4" id="userStarsPC4" data-rateyo-rating="<?php echo e($feedbacks[count($feedbacks)-4]->score); ?>"></div>
                                    <div class="col-12 col-xl-2"><b><?php echo e($feedbacks[count($feedbacks)-4]->score); ?>/5.0</b></div>
                                </div>

                                <div class="row">

                                    <label><?php echo e($feedbacks[count($feedbacks)-4]->comment); ?></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <!--MODAL REVIEWS-->
        <div class="fade modal" id="reviews-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title text-dark"><?php echo e(trans('labels.allReviews')); ?></h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <?php for($i=count($feedbacks); $i>0; $i--): ?>
                        <div class="card" style=" margin-bottom: 0.5rem">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" >
                                    <div class="row">
                                        <div class="col-12 col-xl-3"><b class="fs-5" ><?php echo e($feedbacks[$i-1]->user->name); ?></b></div>
                                        <div class="col-12 col-xl-7" id="userStarsPC<?php echo e($i+4); ?>" data-rateyo-rating="<?php echo e($feedbacks[$i-1]->score); ?>"></div>
                                        <div class="col-12 col-xl-2 "><b><?php echo e($feedbacks[$i-1]->score); ?>/5.0</b></div>
                                    </div>

                                    <div class="row">
                                        <label><?php echo e($feedbacks[$i-1]->comment); ?></label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <?php endfor; ?>
                    </div>
                </div>
            </div>

        </div>
        <!--END MODAL REVIEWS-->



        <div class="col-0 col-sm-6">
            <div class="row justify-content-center mb-4 mt-4">
                <div class="col col-sm-12">
                    <div class="card" style=" margin-bottom: 0.5rem">
                        <div class="card-header fs-4">
                            <?php echo e(trans('labels.technicalDetails')); ?>

                        </div>
                        
                        <ul class="list-group list-group-flush fs-5">
                            <li class="list-group-item">
                                <b><?php echo e(trans('labels.priceFromSP')); ?>: </b> 599.99 €
                            </li>
                            <li class="list-group-item" >
                                <b><?php echo e(trans('labels.chipPC')); ?>:</b> <?php echo e(trans('labels.chipInfoPC')); ?>

                            </li>
                            <li class="list-group-item">
                                <b><?php echo e(trans('labels.displayPC')); ?>:</b> <?php echo e(trans('labels.displayInfoPC')); ?>

                            </li>
                            <li class="list-group-item" >
                                <b><?php echo e(trans('labels.cameraSP')); ?>:</b> <?php echo e(trans('labels.cameraInfoSP')); ?>

                            </li>
                            <li class="list-group-item" >
                                <b><?php echo e(trans('labels.audioPC')); ?>:</b> <?php echo e(trans('labels.audioInfoPC')); ?>

                            </li>
                            <li class="list-group-item" >
                                <b>Wireless:</b> <?php echo e(trans('labels.wirelessPC')); ?>

                            </li>
                            <li class="list-group-item" >
                                <b><?php echo e(trans('labels.ports')); ?>:</b> <?php echo e(trans('labels.portsInfo')); ?>

                            </li>
                            
                            <li class="list-group-item" >
                                <b><?php echo e(trans('labels.batteryPC')); ?>:</b> <?php echo e(trans('labels.batteryInfoPC')); ?>

                            </li>
                            
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>



    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Hard Disk\Programmi\XAMPP\htdocs\ecommerce\resources\views/product/computer.blade.php ENDPATH**/ ?>