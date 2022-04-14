<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $__env->yieldContent('titolo'); ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <!-- Fogli di stile -->
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/style.css">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/carousel.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

        <!-- Start Rateyo css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

        <!-- jQuery e plugin JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="<?php echo e(url('/')); ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo e(url('/')); ?>/js/myScriptSP.js"></script>
        <script src="<?php echo e(url('/')); ?>/js/myScriptPC.js"></script>
        <script src="<?php echo e(url('/')); ?>/js/myScriptWA.js"></script>
        <script src="<?php echo e(url('/')); ?>/js/myScript.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

        <!-- Start Rateyo js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    </head>
    <body lang="<?php echo e(App::getLocale()); ?>">

        <!--         <nav class="navbar-default">
                    <div class="container-fluid">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">  bottone che compare quando collassa la navbar
                            <span class="icon-bar"></span>  lineette del bottone 
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span> 
                        </button>
                        
                        <a class="navbar-brand" href="#">Devis Bianchini</a>
                        <div class="collapse navbar-collapse" id="myNavbar">  navbar che collassa
                            <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo e(url('/')); ?>">Cat1</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/')); ?>">Cat2</a></li>
                                <li class="nav-item"><a class="nav-link" aria-current="page"href="<?php echo e(url('/')); ?>">Cat3</a></li>
                                <li class="nav-item"><a class="nav-link" aria-current="page"href="<?php echo e(url('/')); ?>">Cat4</a></li>
                                
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Library<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="booksBootstrap.php">Books List</a></li>
                                        <li><a href="authorsBootstrap.php">Authors List</a></li>
                                    </ul>
                                </li> 
                                
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                
                                <li class='active'><a href="<?php echo e(url('/')); ?>">Cat4</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </nav>-->



        <!-- NAVBAR 1       
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Navbar</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav left">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Cat1</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Cat2</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Cat3</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Cat4</a>
                      </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                     <ul class="navbar-nav right">
                        <li>
                           <a class="nav-link active" aria-current="page" href="#">Cat1</a> 
                        </li>
                    </ul> 
                  </div>
                </div>
              </nav>-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand"  href="<?php echo e(route('home')); ?>">Navbar</a>

                <!-- bottone che compare quando viene rimpicciolita la finestra -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php echo $__env->yieldContent('navbar'); ?>
                </div>
            </div>      
        </nav>
        <div class="footer-sezione"></div><!-- linea vedre sotto la navbar -->

        <!--
        <div class="container">
            <ul class="breadcrumb pull-right">
                <li><a class="active">Home</a></li>
            </ul>
        </div> -->

        <!-- sezione prof
        <div class="container">
            <header class="header-sezione">
                <h1>
                    My Books List
                </h1>
            </header>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="box-lavoro-evidenza">
                        <p>Un semplicissimo esempio di sito web realizzato durante il corso di Programmazione Web e Servizi Digitali. Il sito riporta l'elenco dei libri che sto leggendo o che ho letto, e la lista degli autori che hanno popolato le mie letture e la mia fantasia. Il sito web continuerà a crescere durante questo semestre, completandosi di volta in volta grazie all'applicazione delle tecnologie web che verranno presentate nel corso. Buon divertimento!</p>
                        <blockquote>
                            <p>Semina un atto, e raccogli un'abitudine; semina un'abitudine, e raccogli un carattere; semina un carattere, e raccogli un destino. </p>
                            <small>[Il pensiero del Buddha]</small>
                        </blockquote>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="box-lavoro-evidenza">
                        <img src="img/pretty-4-th.jpg" class="img-thumbnail img-responsive">
                    </div>
                </div>
            </div>
        </div> -->
        <?php echo $__env->yieldContent('corpo'); ?>

        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted footer-sezione">
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <div class="container text-center text-md-start">
                    <div class="row mt-1">
                        <div class="col-md-6 col-lg-6 col-xl-6 my-auto">
                            <a href="<?php echo e(route('home')); ?>">
                                <img src="<?php echo e(url('/')); ?>/img/main_logo.png" class="img-thumbnail img-responsive img" style="border:0">
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 my-auto ">
                            <!--<p><?php echo e(trans('labels.sendEmail')); ?></p>
                            
                            <div class="input-group mt-2">
                                <input type="text" class="form-control" placeholder="Insert your email here" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                                    <svg class="bi" width="32" height="32" fill="currentColor">
                                    <use xlink:href="fonts/bootstrap-icons.svg#arrow-right-short"/>
                                    </svg>
                                </button>
                            </div>-->
                            <a href="<?php echo e(route('mail.index')); ?>">
                                <button class="btn btn-outline-secondary my-auto btn-lg" style="vertical-align: middle" type="button" id="button-addon2">
                                    <b style="vertical-align: middle"><?php echo e(trans('labels.contactUs')); ?> &nbsp </b> 
                                    <svg class="bi" width="32" height="32" fill="currentColor">
                                    <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#envelope"/>
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div> 
                </div>
            </section>


            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <?php echo e(trans('labels.aboutUs')); ?>

                            </h6>
                            <p>
                                <?php echo e(trans('labels.aboutUsDesc')); ?>

                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4"><?php echo e(trans('labels.products')); ?></h6>
                            <p>
                                <a href="<?php echo e(route('smartphone.index')); ?>" class="text-reset">Smartphone</a>
                            </p>
                            <p>
                                <a href="<?php echo e(route('computer.index')); ?>" class="text-reset">Computer</a>
                            </p>
                            <p>
                                <a href="<?php echo e(route('watch.index')); ?>" class="text-reset"><?php echo e(trans('labels.watches')); ?></a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Social -->
                            <div class="row">
                                <h6 class="text-uppercase fw-bold mb-4">Social Network</h6>
                                <p>
                                    <a href="https://www.facebook.com/nicola.tassi.9/">
                                        <svg class="bi text-secondary" width="32" height="32" fill="currentColor">
                                        <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#facebook"/>
                                        </svg> 
                                    </a>
                                    <a href="https://www.instagram.com/tassinicola_/">
                                        <svg class="bi text-secondary" width="32" height="32" fill="currentColor">
                                        <use xlink:href="<?php echo e(url('/')); ?>/fonts/bootstrap-icons.svg#instagram"/>
                                        </svg>
                                    </a>
                                </p>
                            </div>
                            <div class="row" style="margin-top: 1rem">
                                <h6 class="text-uppercase fw-bold mb-4"><?php echo e(trans('labels.language')); ?></h6>
                                <p>
                                    <a href="<?php echo e(route('setLang', ['lang' => 'en'])); ?>"><img src="<?php echo e(url('/')); ?>/img/flags/en.png" width="32"></a>
                                    <a href="<?php echo e(route('setLang', ['lang' => 'it'])); ?>"><img src="<?php echo e(url('/')); ?>/img/flags/it.png" width="30"></a>
                                </p>
                            </div>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <?php echo e(trans('labels.contacts')); ?>

                            </h6>
                            <p> Quinzano D'Oglio, BS, Italy</p>
                            <p>info@mystuff.com</p>
                            <p><!-- corsivo <i class="fas fa-print me-3"></i> -->+39 347 681 8082</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2021 Copyright:
                <a class="text-reset fw-bold" href="#">Tassi Nicola</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

    </body>
</html><?php /**PATH D:\Hard Disk\Programmi\XAMPP\htdocs\ecommerce\resources\views/layouts/master.blade.php ENDPATH**/ ?>