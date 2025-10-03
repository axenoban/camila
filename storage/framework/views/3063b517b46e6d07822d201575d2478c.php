<header class="bg-primary-dark py-3 shadow-sm">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="<?php echo e(asset('images/logo/3.png')); ?>" alt="Logo Camila Textil" height="40" class="d-inline-block align-text-top me-2">
                    <span class="d-none d-sm-inline">Importadora Camila</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-lg-center">
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
                        <li class="nav-item dropdown">
                            <?php if(auth()->guard('clients')->check()): ?>
                                <a class="nav-link dropdown-toggle <?php echo e(request()->is('cliente/*') ? 'active' : ''); ?>" href="#" id="navbarDropdownAccount" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-circle me-1"></i>
                                    <?php echo e(strtok(Auth::guard('clients')->user()->name, ' ')); ?>

                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDropdownAccount">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2 <?php echo e(request()->is('cliente/reservas') ? 'active' : ''); ?>" href="<?php echo e(route('client.reservations.index')); ?>">
                                            <i class="fas fa-calendar-check text-accent"></i>
                                            Mis reservas
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="<?php echo e(route('client.logout')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="dropdown-item d-flex align-items-center gap-2">
                                                <i class="fas fa-arrow-right-from-bracket text-accent"></i>
                                                Cerrar sesión
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            <?php else: ?>
                                <a class="nav-link dropdown-toggle <?php echo e(request()->is('cliente/*') ? 'active' : ''); ?> <?php echo e(request()->is('admin/*') ? 'active' : ''); ?>" href="#" id="navbarDropdownAccount" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Iniciar sesión
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDropdownAccount">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2 <?php echo e(request()->is('cliente/login') ? 'active' : ''); ?>" href="<?php echo e(route('client.login')); ?>">
                                            <i class="fas fa-user text-accent"></i>
                                            Portal de Clientes
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2 <?php echo e(request()->is('admin/login') ? 'active' : ''); ?>" href="/admin/login">
                                            <i class="fas fa-user-gear text-accent"></i>
                                            Panel Administrador
                                        </a>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<?php /**PATH C:\xampp\htdocs\laravel\camila-github\camila-textil\resources\views/components/header.blade.php ENDPATH**/ ?>