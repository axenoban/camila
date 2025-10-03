<header class="bg-primary-dark py-3 shadow-sm">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg ">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="<?php echo e(asset('images/logo/3.png')); ?>" alt="Logo Camila Textil" height="40" class="d-inline-block align-text-top me-2">
                    <span class="d-none d-sm-inline">Importadora Camila</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->is('/') ? 'active' : ''); ?>" aria-current="page" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->is('about') ? 'active' : ''); ?>" href="/about">Nosotros</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo e(request()->is('products*') ? 'active' : ''); ?>" href="#" id="navbarDropdownProducts" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Productos
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownProducts">
                                <li><a class="dropdown-item <?php echo e(request()->is('products#naturales') ? 'active' : ''); ?>" href="/products#naturales">Fibras Naturales</a></li>
                                <li><a class="dropdown-item <?php echo e(request()->is('products#sinteticos') ? 'active' : ''); ?>" href="/products#sinteticos">Sintéticos</a></li>
                                <li><a class="dropdown-item <?php echo e(request()->is('products#especiales') ? 'active' : ''); ?>" href="/products#especiales">Tejidos Especiales</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item <?php echo e(request()->is('products') ? 'active' : ''); ?>" href="/products">Ver Todos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->is('contact') ? 'active' : ''); ?>" href="/contact">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header><?php /**PATH C:\xampp\htdocs\laravel\camila-textil\resources\views/components/header.blade.php ENDPATH**/ ?>