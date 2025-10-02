@extends('layouts.app')

@section('title', 'Mis Reservas - Portal de Clientes')

@section('content')
<section class="hero-subpage d-flex align-items-center text-white" style="background-image: url('https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=1600&q=80'); min-height: 45vh;">
    <div class="container py-5">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-7" data-aos="fade-right">
                <h1 class="display-5 fw-bold mb-3">Reservas personalizadas</h1>
                <p class="lead mb-0">Visualiza la disponibilidad en tiempo real y confirma tus reservas para garantizar los colores y metrajes que necesitas.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0" data-aos="fade-left">
                <div class="card shadow border-0 bg-white text-primary-dark">
                    <div class="card-body">
                        <p class="fw-semibold mb-2"><i class="fas fa-user-circle me-2 text-accent"></i>{{ $client->name }}</p>
                        <p class="mb-1"><i class="fas fa-building me-2 text-accent"></i>{{ $client->company ?? 'Cliente minorista' }}</p>
                        <p class="mb-0"><i class="fas fa-phone me-2 text-accent"></i>{{ $client->phone ?? 'Sin teléfono registrado' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light-gray">
    <div class="container">
        @if(session('status'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                <div>{{ session('status') }}</div>
            </div>
        @endif
        <div class="row g-4">
            <div class="col-lg-8">
                <h2 class="h4 fw-bold text-primary-dark mb-3">Catálogo disponible</h2>
                <p class="text-secondary-dark mb-4">Selecciona un producto para previsualizar sus colores y disponibilidad. Cada tono incluye fotografía real y stock actualizado.</p>
                <div class="row g-4">
                    @foreach($products as $product)
                        <div class="col-md-6" data-aos="zoom-in">
                            <div class="card h-100 shadow-sm border-0">
                                @php($firstColor = $product->colors->first())
                                @if($firstColor)
                                    <div class="ratio ratio-4x3 rounded-top" style="background: center/cover url('{{ $firstColor->image_url }}');"></div>
                                @else
                                    <div class="ratio ratio-4x3 bg-secondary"></div>
                                @endif
                                <div class="card-body">
                                    <span class="badge bg-accent text-primary-dark mb-2">{{ $product->category }}</span>
                                    <h3 class="h5 fw-bold text-primary-dark">{{ $product->name }}</h3>
                                    <p class="small text-secondary-dark mb-3">{{ $product->description }}</p>
                                    <ul class="list-unstyled small text-secondary-dark mb-4">
                                        <li><i class="fas fa-fiber-new text-accent me-2"></i>{{ $product->fabric_type }}</li>
                                        @if($product->composition)
                                            <li><i class="fas fa-percent text-accent me-2"></i>{{ $product->composition }}</li>
                                        @endif
                                        <li><i class="fas fa-ruler-horizontal text-accent me-2"></i>{{ $product->width }} · {{ $product->weight }}</li>
                                        @if($product->price_per_meter)
                                            <li><i class="fas fa-tags text-accent me-2"></i>Bs {{ number_format($product->price_per_meter, 2) }} / metro</li>
                                        @endif
                                    </ul>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($product->colors as $color)
                                            <button type="button"
                                                class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#colorPreviewModal"
                                                data-product="{{ $product->name }}"
                                                data-color="{{ $color->name }}"
                                                data-image="{{ $color->image_url }}"
                                                data-fabric="{{ $product->fabric_type }}"
                                                data-stock="{{ $color->available_meters ? $color->available_meters.' m' : $color->available_rolls.' rollos' }}"
                                                data-color-id="{{ $color->id }}"
                                                data-product-id="{{ $product->id }}">
                                                <span class="d-inline-block rounded-circle border" style="width:14px;height:14px;background-color: {{ $color->hex_code ?? '#fff' }};"></span>
                                                <span>{{ $color->name }}</span>
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-left">
                <div class="card shadow-lg border-0 sticky-top" style="top: 90px;">
                    <div class="card-body p-4">
                        <h2 class="h5 fw-bold text-primary-dark mb-3">Generar nueva reserva</h2>
                        <form method="POST" action="{{ route('client.reservations.store') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="product_id" class="form-label">Producto</label>
                                <select name="product_id" id="product_id" class="form-select @error('product_id') is-invalid @enderror" required>
                                    <option value="">Selecciona un producto</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" @selected(old('product_id') == $product->id)>{{ $product->name }} - {{ $product->fabric_type }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product_color_id" class="form-label">Color preferido</label>
                                <select name="product_color_id" id="product_color_id" class="form-select @error('product_color_id') is-invalid @enderror">
                                    <option value="">Selecciona un color (opcional)</option>
                                    @foreach($products as $product)
                                        @foreach($product->colors as $color)
                                            <option value="{{ $color->id }}" data-product="{{ $product->id }}" @selected(old('product_color_id') == $color->id)>
                                                {{ $product->name }} — {{ $color->name }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                                <div class="form-text">Elige el color que deseas asegurar o deja en blanco para que un asesor te contacte.</div>
                                @error('product_color_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="quantity_meters" class="form-label">Cantidad (en metros)</label>
                                <input type="number" min="5" step="1" class="form-control @error('quantity_meters') is-invalid @enderror" id="quantity_meters" name="quantity_meters" value="{{ old('quantity_meters', 10) }}" required>
                                <div class="form-text">Mínimo 5 metros por reserva.</div>
                                @error('quantity_meters')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="desired_pickup_date" class="form-label">Fecha tentativa de retiro</label>
                                <input type="date" class="form-control @error('desired_pickup_date') is-invalid @enderror" id="desired_pickup_date" name="desired_pickup_date" value="{{ old('desired_pickup_date') }}">
                                @error('desired_pickup_date')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notas adicionales</label>
                                <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3" placeholder="Ej: Cortar en rollos de 10 m, reservar botones a juego.">{{ old('notes') }}</textarea>
                                @error('notes')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-accent w-100">Confirmar reserva</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h2 class="h4 fw-bold text-primary-dark mb-0">Historial de reservas</h2>
            <span class="badge bg-primary-dark">{{ $reservations->count() }} registros</span>
        </div>
        <div class="table-responsive shadow-sm">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Color</th>
                        <th>Metros</th>
                        <th>Estado</th>
                        <th>Retiro</th>
                        <th>Notas</th>
                        <th>Creada</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservations as $reservation)
                        <tr>
                            <td>{{ str_pad((string) $reservation->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td>
                                <div class="fw-semibold">{{ $reservation->product->name }}</div>
                                <small class="text-secondary-dark">{{ $reservation->product->fabric_type }}</small>
                            </td>
                            <td>{{ optional($reservation->color)->name ?? 'Asignado por asesor' }}</td>
                            <td>{{ $reservation->quantity_meters }} m</td>
                            <td>
                                <span class="badge @class([
                                    'bg-warning text-dark' => $reservation->status === 'pendiente',
                                    'bg-success' => $reservation->status === 'confirmada',
                                    'bg-danger' => $reservation->status === 'cancelada',
                                ])">{{ ucfirst($reservation->status) }}</span>
                            </td>
                            <td>{{ optional($reservation->desired_pickup_date)->format('d/m/Y') ?? 'Por definir' }}</td>
                            <td>{{ $reservation->notes ?? '—' }}</td>
                            <td>{{ $reservation->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-secondary-dark py-4">Aún no registras reservas. Completa el formulario para asegurar tus telas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="colorPreviewModal" tabindex="-1" aria-labelledby="colorPreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary-dark text-white">
                <h5 class="modal-title" id="colorPreviewModalLabel">Vista previa de color</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <img src="" class="img-fluid rounded shadow" alt="Vista previa de tela" id="previewImage">
                    </div>
                    <div class="col-lg-6">
                        <h3 class="h4 fw-bold text-primary-dark" id="previewProduct"></h3>
                        <p class="text-secondary-dark mb-2" id="previewColor"></p>
                        <ul class="list-unstyled text-secondary-dark mb-3">
                            <li><i class="fas fa-fiber-new text-accent me-2"></i><span id="previewFabric"></span></li>
                            <li><i class="fas fa-warehouse text-accent me-2"></i>Disponibilidad: <span id="previewStock"></span></li>
                        </ul>
                        <p class="small text-secondary-dark">Recuerda confirmar tu reserva para asegurar el stock. Nuestro equipo validará la disponibilidad antes de confirmarla.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light-gray">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const colorModal = document.getElementById('colorPreviewModal');
    const productSelect = document.getElementById('product_id');
    const colorSelect = document.getElementById('product_color_id');

    if (colorModal) {
        colorModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            if (!button) return;
            document.getElementById('previewImage').src = button.getAttribute('data-image');
            document.getElementById('previewProduct').textContent = button.getAttribute('data-product');
            document.getElementById('previewColor').textContent = button.getAttribute('data-color');
            document.getElementById('previewFabric').textContent = button.getAttribute('data-fabric');
            document.getElementById('previewStock').textContent = button.getAttribute('data-stock');

            const colorId = button.getAttribute('data-color-id');
            const productId = button.getAttribute('data-product-id');
            if (productSelect && productId) {
                productSelect.value = productId;
                filterColors();
            }

            if (colorSelect && colorId) {
                colorSelect.value = colorId;
            }
        });
    }

    const filterColors = () => {
        if (!productSelect || !colorSelect) return;
        const productId = productSelect.value;
        Array.from(colorSelect.options).forEach(option => {
            if (!option.value) {
                option.hidden = false;
                return;
            }
            const optionProduct = option.getAttribute('data-product');
            option.hidden = productId && optionProduct !== productId;
        });

        if (colorSelect.value && colorSelect.options[colorSelect.selectedIndex]?.hidden) {
            colorSelect.value = '';
        }
    };

    if (productSelect) {
        filterColors();
        productSelect.addEventListener('change', filterColors);
    }
</script>
@endpush
