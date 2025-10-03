<?php $__env->startSection('title', 'Nuestros Productos - Amplia Gama Textil | Importadora Camila'); ?>

<?php $__env->startSection('content'); ?>
<?php ($categories = ($categories ?? collect())->filter(function ($items) {
    return $items && $items->isNotEmpty();
})); ?>
<?php ($hasDynamicProducts = $categories->isNotEmpty()); ?>
<?php ($catalogAnchor = $hasDynamicProducts ? '#catalogo-dinamico' : '#naturales'); ?>

<section class="hero-subpage d-flex align-items-center justify-content-center text-white" style="background-image: url('https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=1600&q=80');" data-aos="fade-in">
    <div class="container text-center py-5">
        <h1 class="display-3 fw-bold mb-3" data-aos="fade-up" data-aos-delay="100">Nuestros Productos</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="200">Descubre la diversidad y calidad de nuestros textiles importados y reserva tus metrajes en línea.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap" data-aos="fade-up" data-aos-delay="300">
            <a href="<?php echo e($catalogAnchor); ?>" class="btn btn-outline-light btn-lg">Explorar catálogo</a>
            <a href="<?php echo e(route('client.login')); ?>" class="btn btn-accent btn-lg">Portal de reservas</a>
        </div>
    </div>
</section>

<?php if($hasDynamicProducts): ?>
<section id="catalogo-dinamico" class="py-5 bg-light-gray">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="display-5 fw-bold text-primary-dark mb-3">6 tejidos estrella listos para tus colecciones</h2>
                <p class="text-secondary-dark">Actualizamos el catálogo con fotografías reales de cada color para facilitar la aprobación de muestras con tus clientes. Todos los metrajes mostrados corresponden a stock disponible en nuestras sucursales de Santa Cruz.</p>
                <ul class="list-unstyled mt-4">
                    <li class="d-flex gap-3 mb-3">
                        <i class="fas fa-warehouse text-accent mt-1"></i>
                        <span>Inventario sincronizado en tiempo real y reservas garantizadas por 48 horas.</span>
                    </li>
                    <li class="d-flex gap-3 mb-3">
                        <i class="fas fa-palette text-accent mt-1"></i>
                        <span>Mínimo 12 variaciones cromáticas totales con fotos externas de referencia.</span>
                    </li>
                    <li class="d-flex gap-3">
                        <i class="fas fa-box-open text-accent mt-1"></i>
                        <span>Servicios de corte previo y logística en coordinación con tu asesor comercial.</span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="ratio ratio-4x3 rounded overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1521579742250-980c1e65be4c?auto=format&fit=crop&w=1200&q=80" alt="Muestrarios de telas" class="w-100 h-100 object-fit-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<section class="py-5 <?php echo e($loop->even ? 'bg-white' : 'bg-light-gray'); ?>" id="<?php echo e(\Illuminate\Support\Str::slug($category)); ?>">
    <div class="container">
        <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-lg-between mb-4" data-aos="fade-up">
            <div>
                <h2 class="display-6 fw-bold text-primary-dark mb-2"><?php echo e($category); ?></h2>
                <p class="text-secondary-dark mb-0"><?php echo e($items->first()->collection ?? 'Colección destacada Camila Textil'); ?></p>
            </div>
            <a href="<?php echo e(route('client.login')); ?>" class="btn btn-outline-accent mt-3 mt-lg-0">Reservar desde el portal</a>
        </div>
        <div class="row g-4">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-xl-4" data-aos="zoom-in" data-aos-delay="<?php echo e($loop->index * 100); ?>">
                    <div class="card h-100 shadow-sm border-0 product-card">
                        <?php ($highlight = $product->colors->first()); ?>
                        <div class="ratio ratio-4x3">
                            <img src="<?php echo e(optional($highlight)->image_url); ?>" alt="Vista de <?php echo e($product->name); ?>" class="w-100 h-100 object-fit-cover">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-accent text-primary-dark mb-2"><?php echo e($product->fabric_type); ?></span>
                            <h3 class="h5 fw-bold text-primary-dark"><?php echo e($product->name); ?></h3>
                            <p class="small text-secondary-dark flex-grow-1"><?php echo e(\Illuminate\Support\Str::limit($product->description, 160)); ?></p>
                            <ul class="list-unstyled small text-secondary-dark mb-3">
                                <li><i class="fas fa-ruler-horizontal text-accent me-2"></i><?php echo e($product->width); ?> · <?php echo e($product->weight); ?></li>
                                <?php if($product->price_per_meter): ?>
                                    <li><i class="fas fa-tags text-accent me-2"></i>Bs <?php echo e(number_format($product->price_per_meter, 2)); ?> / metro</li>
                                <?php endif; ?>
                                <?php if($product->lead_time_days): ?>
                                    <li><i class="fas fa-clock text-accent me-2"></i>Reposición en <?php echo e($product->lead_time_days); ?> días</li>
                                <?php endif; ?>
                            </ul>
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <?php $__currentLoopData = $product->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <button type="button" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2"
                                        data-bs-toggle="modal"
                                        data-bs-target="#previewModal"
                                        data-product="<?php echo e($product->name); ?>"
                                        data-description="<?php echo e($product->description); ?>"
                                        data-color="<?php echo e($color->name); ?>"
                                        data-fabric="<?php echo e($product->fabric_type); ?>"
                                        data-stock="<?php echo e($color->available_meters ? $color->available_meters.' m disponibles' : $color->available_rolls.' rollos disponibles'); ?>"
                                        data-image="<?php echo e($color->image_url); ?>">
                                        <span class="d-inline-block rounded-circle border" style="width:14px;height:14px;background-color: <?php echo e($color->hex_code ?? '#ffffff'); ?>"></span>
                                        <span><?php echo e($color->name); ?></span>
                                    </button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <a href="<?php echo e(route('client.login')); ?>" class="btn btn-accent btn-sm mt-auto">Reservar este tejido</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if (! ($hasDynamicProducts)): ?>
<section class="py-5 bg-light-gray" data-aos="fade-up">
    <div class="container">
        <div class="alert alert-info shadow-sm" role="alert">
            Estamos preparando el catálogo dinámico. Mientras tanto puedes explorar nuestras familias de productos principales.
        </div>
    </div>
</section>

<?php echo $__env->make('products-static', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php endif; ?>

<section class="py-5 bg-white" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center display-5 fw-bold mb-5 text-primary-dark">¿Cómo hacemos tu reserva?</h2>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col" data-aos="zoom-in" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="fas fa-user-plus fa-2x text-accent"></i>
                    </div>
                    <h3 class="h6 fw-bold text-primary-dark">1. Solicita acceso</h3>
                    <p class="text-secondary-dark mb-0">Nuestro equipo valida tus datos comerciales y habilita tu usuario.</p>
                </div>
            </div>
            <div class="col" data-aos="zoom-in" data-aos-delay="200">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="fas fa-table-list fa-2x text-accent"></i>
                    </div>
                    <h3 class="h6 fw-bold text-primary-dark">2. Explora el catálogo</h3>
                    <p class="text-secondary-dark mb-0">Verifica medidas, composición y fotos reales de cada color disponible.</p>
                </div>
            </div>
            <div class="col" data-aos="zoom-in" data-aos-delay="300">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="fas fa-calendar-check fa-2x text-accent"></i>
                    </div>
                    <h3 class="h6 fw-bold text-primary-dark">3. Reserva en segundos</h3>
                    <p class="text-secondary-dark mb-0">Define metros requeridos, fecha tentativa y notas para tu asesor.</p>
                </div>
            </div>
            <div class="col" data-aos="zoom-in" data-aos-delay="400">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="fas fa-truck-fast fa-2x text-accent"></i>
                    </div>
                    <h3 class="h6 fw-bold text-primary-dark">4. Recibe seguimiento</h3>
                    <p class="text-secondary-dark mb-0">Coordinamos retiro o envío y actualizamos el estado en el portal.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" data-aos="fade-up">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="display-5 fw-bold text-primary-dark mb-3">Colecciones Destacadas</h2>
                <p class="text-secondary-dark">Cada temporada incorporamos nuevas líneas de telas inspiradas en tendencias internacionales. Descubre colecciones cápsula listas para producción de moda, hotelería y decoración corporativa.</p>
                <ul class="list-unstyled mt-4">
                    <li class="d-flex gap-3 mb-3">
                        <i class="fas fa-leaf text-accent mt-1"></i>
                        <span>Fibras sostenibles certificadas OEKO-TEX y BCI.</span>
                    </li>
                    <li class="d-flex gap-3 mb-3">
                        <i class="fas fa-palette text-accent mt-1"></i>
                        <span>Paletas cromáticas exclusivas desarrolladas junto a diseñadores locales.</span>
                    </li>
                    <li class="d-flex gap-3">
                        <i class="fas fa-ruler-combined text-accent mt-1"></i>
                        <span>Servicios de corte previo y fichas técnicas descargables desde el portal del cliente.</span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="ratio ratio-4x3 rounded overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1521579742250-980c1e65be4c?auto=format&fit=crop&w=1200&q=80" alt="Muestrarios de telas coloridas" class="w-100 h-100 object-fit-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center display-5 fw-bold mb-5 text-primary-dark">¿Cómo hacer tu pedido en línea?</h2>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col" data-aos="zoom-in" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="fas fa-sign-in-alt fa-2x text-accent"></i>
                    </div>
                    <h3 class="h6 fw-bold text-primary-dark">1. Inicia sesión</h3>
                    <p class="text-secondary-dark mb-0">Accede al portal de clientes con tus credenciales o solicita la activación a tu asesor.</p>
                </div>
            </div>
            <div class="col" data-aos="zoom-in" data-aos-delay="200">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="fas fa-th-large fa-2x text-accent"></i>
                    </div>
                    <h3 class="h6 fw-bold text-primary-dark">2. Explora el catálogo</h3>
                    <p class="text-secondary-dark mb-0">Filtra por composición, ancho, color y disponibilidad para encontrar la tela perfecta.</p>
                </div>
            </div>
            <div class="col" data-aos="zoom-in" data-aos-delay="300">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="fas fa-calendar-check fa-2x text-accent"></i>
                    </div>
                    <h3 class="h6 fw-bold text-primary-dark">3. Reserva en segundos</h3>
                    <p class="text-secondary-dark mb-0">Bloquea la cantidad requerida y programa la recogida o envío a tu sucursal.</p>
                </div>
            </div>
            <div class="col" data-aos="zoom-in" data-aos-delay="400">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="icon-box mb-3">
                        <i class="fas fa-file-invoice-dollar fa-2x text-accent"></i>
                    </div>
                    <h3 class="h6 fw-bold text-primary-dark">4. Gestiona tus comprobantes</h3>
                    <p class="text-secondary-dark mb-0">Descarga facturas y haz seguimiento de tus pedidos desde cualquier dispositivo.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-primary-dark text-white text-center" data-aos="zoom-in">
    <div class="container">
        <h2 class="display-4 fw-bold mb-4">¿Buscas una tela específica?</h2>
        <p class="lead mb-4">Nuestro catálogo es extenso y en constante crecimiento. Permítenos ayudarte a encontrar el material perfecto para tu proyecto.</p>
        <a href="/contact" class="btn btn-accent btn-lg px-4 py-2 custom-shadow">Asesoría Personalizada <i class="fas fa-headset ms-2"></i></a>
    </div>
</section>

<?php if($hasDynamicProducts): ?>
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary-dark text-white">
                    <h5 class="modal-title" id="previewModalLabel">Vista previa del color</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-6">
                            <img src="" id="modalImage" class="img-fluid rounded shadow" alt="Vista de tela">
                        </div>
                        <div class="col-lg-6">
                            <h3 class="h4 fw-bold text-primary-dark" id="modalProduct"></h3>
                            <p class="text-secondary-dark" id="modalDescription"></p>
                            <ul class="list-unstyled text-secondary-dark">
                                <li><i class="fas fa-fill-drip text-accent me-2"></i><span id="modalColor"></span></li>
                                <li><i class="fas fa-warehouse text-accent me-2"></i><span id="modalStock"></span></li>
                            </ul>
                            <a href="<?php echo e(route('client.login')); ?>" class="btn btn-accent">Reservar este color</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light-gray">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php if($hasDynamicProducts): ?>
    <?php $__env->startPush('scripts'); ?>
        <script>
            const previewModal = document.getElementById('previewModal');
            if (previewModal) {
                previewModal.addEventListener('show.bs.modal', event => {
                    const trigger = event.relatedTarget;
                    if (!trigger) return;

                    document.getElementById('modalImage').src = trigger.getAttribute('data-image');
                    document.getElementById('modalProduct').textContent = trigger.getAttribute('data-product');
                    document.getElementById('modalDescription').textContent = trigger.getAttribute('data-description');
                    document.getElementById('modalColor').textContent = trigger.getAttribute('data-color');
                    document.getElementById('modalStock').textContent = trigger.getAttribute('data-stock');
                });
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\camila-github\camila-textil\resources\views/products.blade.php ENDPATH**/ ?>