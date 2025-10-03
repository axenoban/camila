<?php $__env->startSection('title', 'Acceso de Clientes - Camila Textil'); ?>

<?php $__env->startSection('content'); ?>
<section class="hero-subpage d-flex align-items-center text-white" style="background-image: url('https://images.unsplash.com/photo-1503342452485-86ce5e125a5a?auto=format&fit=crop&w=1600&q=80'); min-height: 60vh;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <h1 class="display-4 fw-bold mb-3">Portal de Clientes</h1>
                <p class="lead mb-0">Administra tus pedidos y reservas de telas en un solo lugar, con acceso seguro y seguimiento en tiempo real.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light-gray">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="card shadow-lg border-0 h-100">
                    <div class="card-body p-4 p-lg-5">
                        <h2 class="h3 fw-bold text-primary-dark mb-4">Ingresa a tu cuenta</h2>

                        <?php if(session('status')): ?>
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                <div><?php echo e(session('status')); ?></div>
                            </div>
                        <?php endif; ?>

                        <?php if(auth()->guard('clients')->check()): ?>
                            <div class="alert alert-info d-flex align-items-center" role="alert">
                                <i class="fas fa-user-check me-2"></i>
                                <div>
                                    Ya iniciaste sesión como <strong><?php echo e(Auth::guard('clients')->user()->name); ?></strong>.
                                    <a class="alert-link" href="<?php echo e(route('client.reservations.index')); ?>">Ir a mis reservas</a>.
                                </div>
                            </div>
                        <?php else: ?>
                            <form class="needs-validation" method="POST" action="<?php echo e(route('client.login.attempt')); ?>" novalidate>
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo electrónico</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-primary-dark text-white"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="cliente1@camilatextil.com" required>
                                        <div class="invalid-feedback">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php else: ?>
                                                Ingresa un correo válido.
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-primary-dark text-white"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" name="password" placeholder="••••••••" required>
                                        <div class="invalid-feedback">
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php else: ?>
                                                Ingresa tu contraseña.
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="remember">
                                            Recordarme
                                        </label>
                                    </div>
                                    <span class="text-secondary-dark small">Usuario demo: <code>cliente1@camilatextil.com</code> / <code>Cliente1*2024</code></span>
                                </div>
                                <button type="submit" class="btn btn-accent w-100 py-2">Acceder al portal</button>
                            </form>
                        <?php endif; ?>
                        <p class="small text-secondary-dark text-center mt-4 mb-0">Al iniciar sesión aceptas nuestras políticas de privacidad y términos de uso.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="card shadow-lg border-0 h-100 bg-primary-dark text-white">
                    <div class="card-body p-4 p-lg-5">
                        <h2 class="h3 fw-bold mb-4">¿Aún no tienes cuenta?</h2>
                        <p class="mb-4">Solicita tu acceso para realizar reservas de telas, revisar el historial de pedidos y descargar comprobantes al instante.</p>
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex align-items-start gap-3 mb-3">
                                <span class="badge rounded-circle bg-accent text-primary-dark">1</span>
                                <div>
                                    <h3 class="h6 fw-bold text-white mb-1">Solicita la activación</h3>
                                    <p class="mb-0">Completa el formulario de registro y un asesor validará tu información en minutos.</p>
                                </div>
                            </li>
                            <li class="d-flex align-items-start gap-3 mb-3">
                                <span class="badge rounded-circle bg-accent text-primary-dark">2</span>
                                <div>
                                    <h3 class="h6 fw-bold text-white mb-1">Configura tu perfil</h3>
                                    <p class="mb-0">Define tus datos de facturación y direcciones de entrega para agilizar tus pedidos.</p>
                                </div>
                            </li>
                            <li class="d-flex align-items-start gap-3">
                                <span class="badge rounded-circle bg-accent text-primary-dark">3</span>
                                <div>
                                    <h3 class="h6 fw-bold text-white mb-1">Empieza a reservar</h3>
                                    <p class="mb-0">Navega el catálogo completo y reserva telas con disponibilidad confirmada en tiempo real.</p>
                                </div>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-light text-primary-dark fw-semibold px-4 py-2">Solicitar acceso</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box bg-white shadow-sm p-4 h-100 text-center">
                    <i class="fas fa-clipboard-check fa-2x text-accent mb-3"></i>
                    <h3 class="h5 fw-bold text-primary-dark">Reservas con disponibilidad garantizada</h3>
                    <p class="text-secondary-dark mb-0">Visualiza en tiempo real el stock de cada rollo y asegura tus telas favoritas antes de visitarnos.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon-box bg-white shadow-sm p-4 h-100 text-center">
                    <i class="fas fa-file-invoice-dollar fa-2x text-accent mb-3"></i>
                    <h3 class="h5 fw-bold text-primary-dark">Historial y comprobantes</h3>
                    <p class="text-secondary-dark mb-0">Descarga facturas y notas de venta en PDF, revisa pedidos anteriores y repite tu compra en segundos.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="icon-box bg-white shadow-sm p-4 h-100 text-center">
                    <i class="fas fa-headset fa-2x text-accent mb-3"></i>
                    <h3 class="h5 fw-bold text-primary-dark">Acompañamiento personalizado</h3>
                    <p class="text-secondary-dark mb-0">Accede al chat con tu asesor comercial para resolver dudas, coordinar envíos y solicitar recomendaciones.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\camila-github\camila-textil\resources\views/client/login.blade.php ENDPATH**/ ?>