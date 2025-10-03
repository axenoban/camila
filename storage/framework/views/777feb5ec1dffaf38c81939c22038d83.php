

<?php $__env->startSection('title', 'Nuestra Historia - Importadora Textil Camila'); ?>

<?php $__env->startSection('content'); ?>
<section class="hero-subpage d-flex align-items-center justify-content-center text-white" style="background-image: url('<?php echo e(asset('images/about-hero.jpg')); ?>');" data-aos="fade-in">
    <div class="container text-center">
        <h1 class="display-3 fw-bold mb-3" data-aos="fade-up" data-aos-delay="100">Sobre Nosotros</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="200">Comprometidos con la excelencia y la innovación en cada fibra.</p>
    </div>
</section>

<section class="py-5" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-md-6" data-aos="fade-right">
                <img src="<?php echo e(asset('images/equipo-profesional-2.jpg')); ?>" class="img-fluid rounded shadow-lg" alt="Nuestra Misión">
            </div>
            <div class="col-md-6 mt-4 mt-md-0" data-aos="fade-left">
                <h2 class="display-6 fw-bold text-primary-dark mb-4">Nuestra Misión</h2>
                <p class="lead text-secondary-dark">Ser el proveedor líder de textiles importados en Bolivia, ofreciendo una diversidad inigualable y la más alta calidad, mientras construimos relaciones duraderas y de confianza con nuestros clientes.</p>
                <p class="text-secondary-dark">Nos dedicamos a impulsar el éxito de la industria textil local, proporcionando materiales que no solo cumplen, sino que superan las expectativas de diseño y rendimiento.</p>
            </div>
        </div>

        <div class="row align-items-center flex-row-reverse mb-5">
            <div class="col-md-6" data-aos="fade-left">
                <img src="<?php echo e(asset('images/vision-empresa.jpg')); ?>" class="img-fluid rounded shadow-lg" alt="Nuestra Visión">
            </div>
            <div class="col-md-6 mt-4 mt-md-0" data-aos="fade-right">
                <h2 class="display-6 fw-bold text-primary-dark mb-4">Nuestra Visión</h2>
                <p class="lead text-secondary-dark">Visualizamos un futuro donde Importadora Textil Camila es sinónimo de innovación y calidad en el sector textil boliviano. Aspiramos a ser el referente para diseñadores, fabricantes y emprendedores, facilitando el acceso a tendencias globales y materiales sostenibles.</p>
                <p class="text-secondary-dark">Nuestro compromiso es ser un motor de cambio, promoviendo prácticas responsables y un crecimiento continuo en la industria.</p>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade-up">
                <h2 class="display-6 fw-bold text-primary-dark mb-4">Nuestros Valores Fundamentales</h2>
                <p class="text-secondary-dark mb-5">Estos principios son la base de todo lo que hacemos, desde la selección de proveedores hasta la atención al cliente.</p>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="value-card p-4 rounded shadow-sm bg-white h-100 text-center">
                    <i class="fas fa-handshake fa-3x text-accent mb-3"></i>
                    <h4 class="fw-bold text-primary-dark">Confianza</h4>
                    <p class="text-secondary-dark">Construimos relaciones transparentes y duraderas.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="value-card p-4 rounded shadow-sm bg-white h-100 text-center">
                    <i class="fas fa-certificate fa-3x text-accent mb-3"></i>
                    <h4 class="fw-bold text-primary-dark">Excelencia</h4>
                    <p class="text-secondary-dark">Buscamos la perfección en cada tela y cada servicio.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="value-card p-4 rounded shadow-sm bg-white h-100 text-center">
                    <i class="fas fa-lightbulb fa-3x text-accent mb-3"></i>
                    <h4 class="fw-bold text-primary-dark">Innovación</h4>
                    <p class="text-secondary-dark">Siempre a la vanguardia de las tendencias y tecnologías.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <p class="lead text-primary-dark">¿Interesado en saber más sobre cómo trabajamos?</p>
            <a href="/contact" class="btn btn-primary btn-lg mt-3">Contáctanos <i class="fas fa-envelope ms-2"></i></a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\camila-textil\resources\views/about.blade.php ENDPATH**/ ?>