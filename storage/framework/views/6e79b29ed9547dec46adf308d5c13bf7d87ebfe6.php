<?php $__env->startSection('titolo','FAQ'); ?>

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
        <a class="nav-link active" href="">FAQ</a>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Hard Disk\Programmi\XAMPP\htdocs\ecommerce\resources\views/faq.blade.php ENDPATH**/ ?>