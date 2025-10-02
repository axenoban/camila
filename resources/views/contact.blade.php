@extends('layouts.app')

@section('title', 'Contacto - Habla con Expertos Textiles | Importadora Camila')

@section('content')
<section class="hero-subpage d-flex align-items-center justify-content-center text-white" style="background-image: url('{{ asset('images/contact-hero.jpg') }}');" data-aos="fade-in">
    <div class="container text-center">
        <h1 class="display-3 fw-bold mb-3" data-aos="fade-up" data-aos-delay="100">Contáctanos</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="200">Estamos listos para atender tus consultas y pedidos en Santa Cruz, Bolivia.</p>
    </div>
</section>

<section class="py-5" data-aos="fade-up">
    <div class="container">
        <h2 class="text-center display-5 fw-bold text-primary-dark mb-5">Comunícate con Nosotros</h2>

        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-right">
                <div class="card shadow-lg h-100 border-0 p-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-primary-dark mb-4"><i class="fas fa-envelope-open-text me-2 text-accent"></i>Envíanos un Mensaje</h5>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label text-secondary-dark">Nombre Completo</label>
                                <input type="text" class="form-control" id="name" placeholder="Tu nombre y apellido" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label text-secondary-dark">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" placeholder="ejemplo@dominio.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label text-secondary-dark">Asunto</label>
                                <input type="text" class="form-control" id="subject" placeholder="Consulta sobre productos, cotización, etc." required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label text-secondary-dark">Tu Mensaje</label>
                                <textarea class="form-control" id="message" rows="6" placeholder="Escribe tu consulta aquí..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary-dark btn-lg mt-3"><i class="fas fa-paper-plane me-2"></i>Enviar Mensaje</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <div class="card shadow-lg h-100 border-0 p-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-primary-dark mb-4"><i class="fas fa-info-circle me-2 text-accent"></i>Información de Contacto</h5>
                        <div class="mb-4">
                            <p class="text-secondary-dark mb-2"><i class="fas fa-map-marker-alt me-3 text-accent"></i><strong>Dirección:</strong> Av. Monseñor Rivero #234, Edificio Camila, Planta Baja<br> Santa Cruz de la Sierra, Bolivia</p>
                            <p class="text-secondary-dark mb-2"><i class="fas fa-phone-alt me-3 text-accent"></i><strong>Teléfono:</strong> +591 3 322 XXXX</p>
                            <p class="text-secondary-dark mb-2"><i class="fab fa-whatsapp me-3 text-accent"></i><strong>WhatsApp:</strong> <a href="https://wa.me/591789XXXXX" target="_blank" class="text-primary-dark text-decoration-none hover-accent">+591 789XXXXX</a></p>
                            <p class="text-secondary-dark mb-2"><i class="fas fa-envelope me-3 text-accent"></i><strong>Email:</strong> <a href="mailto:info@importadoracamilasc.com" class="text-primary-dark text-decoration-none hover-accent">info@importadoracamilasc.com</a></p>
                        </div>
                        <h5 class="card-title fw-bold text-primary-dark mb-4"><i class="fas fa-clock me-2 text-accent"></i>Horario de Atención</h5>
                        <p class="text-secondary-dark">Lunes a Viernes: 9:00 AM - 6:00 PM</p>
                        <p class="text-secondary-dark">Sábados: 9:00 AM - 1:00 PM</p>
                        <p class="text-secondary-dark">Domingos: Cerrado</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12">
                <h5 class="fw-bold text-primary-dark mb-3 text-center">Encuéntranos en el Mapa</h5>
                <div class="map-container rounded shadow-lg">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3799.0435948924197!2d-63.18738948484926!3d-17.77800707746404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f0b2f0a1c6a2f3%3A0x6a2c2c2c2c2c2c2c!2sAv.%20Monse%C3%B1or%20Rivero%2C%20Santa%20Cruz%20de%20la%20Sierra%2C%20Bolivia!5e0!3m2!1ses!2sbo!4v1689280000000!5m2!1ses!2sbo" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection