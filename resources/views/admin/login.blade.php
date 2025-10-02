@extends('layouts.app')

@section('title', 'Acceso Administrador - Camila Textil')

@section('content')
<section class="hero-subpage d-flex align-items-center text-white" style="background-image: url('https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=1600&q=80'); min-height: 55vh;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center" data-aos="fade-up">
                <h1 class="display-4 fw-bold mb-3">Panel Administrativo</h1>
                <p class="lead mb-0">Controla inventario, pedidos y reportes en tiempo real para tomar decisiones estratégicas.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6" data-aos="fade-up">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4 p-lg-5">
                        <h2 class="h3 fw-bold text-primary-dark mb-4">Iniciar sesión</h2>
                        <form class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="adminEmail" class="form-label">Correo corporativo</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary-dark text-white"><i class="fas fa-user-tie"></i></span>
                                    <input type="email" class="form-control" id="adminEmail" placeholder="admin@camilatextil.com" required>
                                    <div class="invalid-feedback">Ingresa un correo válido.</div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="adminPassword" class="form-label">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary-dark text-white"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="adminPassword" placeholder="••••••••" required>
                                    <div class="invalid-feedback">Ingresa tu contraseña.</div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-accent w-100 py-2">Entrar al panel</button>
                        </form>
                        <p class="small text-secondary-dark text-center mt-4 mb-0">Acceso exclusivo para el personal autorizado de Camila Textil.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
