<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $client = Client::updateOrCreate(
            ['email' => 'cliente1@camilatextil.com'],
            [
                'name' => 'Cliente Demo 1',
                'company' => 'Boutique Aurora',
                'phone' => '+591 70000001',
                'tax_id' => '78945601',
                'password' => Hash::make('Cliente1*2024'),
                'remember_token' => Str::random(10),
            ]
        );

        $products = [
            [
                'name' => 'Lino Premium Verona',
                'slug' => 'lino-premium-verona',
                'category' => 'Fibras Naturales',
                'fabric_type' => 'Lino 100%',
                'collection' => 'Colección Mediterránea',
                'description' => 'Lino europeo prelavado con caída suave, ideal para camisería y decoración liviana.',
                'composition' => '100% lino',
                'width' => '1.45 m',
                'weight' => '190 g/m²',
                'price_per_meter' => 68.50,
                'lead_time_days' => 2,
                'colors' => [
                    [
                        'name' => 'Arena Toscana',
                        'hex_code' => '#d6c4a2',
                        'image_url' => 'https://images.unsplash.com/photo-1503341455253-b2e723bb3dbb?auto=format&fit=crop&w=900&q=80',
                        'available_rolls' => 6,
                        'available_meters' => 420,
                    ],
                    [
                        'name' => 'Olivo Suave',
                        'hex_code' => '#8a8f5d',
                        'image_url' => 'https://images.unsplash.com/photo-1520256862855-398228c41684?auto=format&fit=crop&w=900&q=80',
                        'available_rolls' => 4,
                        'available_meters' => 280,
                    ],
                ],
            ],
            [
                'name' => 'Seda Satinada Aurora',
                'slug' => 'seda-satinada-aurora',
                'category' => 'Tejidos Especiales',
                'fabric_type' => 'Seda Satinada',
                'collection' => 'Noche de Gala',
                'description' => 'Satinado de seda con brillo uniforme y tacto ultra suave para vestidos de alta costura.',
                'composition' => '95% seda, 5% elastano',
                'width' => '1.40 m',
                'weight' => '120 g/m²',
                'price_per_meter' => 125.90,
                'lead_time_days' => 5,
                'colors' => [
                    [
                        'name' => 'Magenta Lucero',
                        'hex_code' => '#b11b5e',
                        'image_url' => 'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=900&q=80',
                        'available_rolls' => 3,
                        'available_meters' => 180,
                    ],
                    [
                        'name' => 'Azul Medianoche',
                        'hex_code' => '#1c2743',
                        'image_url' => 'https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=900&q=80',
                        'available_rolls' => 2,
                        'available_meters' => 140,
                    ],
                ],
            ],
            [
                'name' => 'Denim Stretch Andino',
                'slug' => 'denim-stretch-andino',
                'category' => 'Sintéticos',
                'fabric_type' => 'Denim Stretch',
                'collection' => 'Urban Street',
                'description' => 'Denim elástico de alto rendimiento con recuperación rápida, ideal para jeans y chaquetas.',
                'composition' => '72% algodón, 26% poliéster, 2% elastano',
                'width' => '1.50 m',
                'weight' => '330 g/m²',
                'price_per_meter' => 54.30,
                'lead_time_days' => 3,
                'colors' => [
                    [
                        'name' => 'Índigo Clásico',
                        'hex_code' => '#27334a',
                        'image_url' => 'https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?auto=format&fit=crop&w=900&q=80',
                        'available_rolls' => 8,
                        'available_meters' => 600,
                    ],
                    [
                        'name' => 'Gris Carbón',
                        'hex_code' => '#3b3d3f',
                        'image_url' => 'https://images.unsplash.com/photo-1537832816519-689ad163238b?auto=format&fit=crop&w=900&q=80',
                        'available_rolls' => 5,
                        'available_meters' => 360,
                    ],
                ],
            ],
            [
                'name' => 'Algodón Orgánico Pacific',
                'slug' => 'algodon-organico-pacific',
                'category' => 'Fibras Naturales',
                'fabric_type' => 'Algodón Orgánico',
                'collection' => 'Eco Essentials',
                'description' => 'Tejido hipoalergénico certificado GOTS con acabado peinado para prendas casuales.',
                'composition' => '100% algodón orgánico',
                'width' => '1.60 m',
                'weight' => '160 g/m²',
                'price_per_meter' => 45.70,
                'lead_time_days' => 2,
                'colors' => [
                    [
                        'name' => 'Coral Pacífico',
                        'hex_code' => '#ff6f61',
                        'image_url' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=900&q=80',
                        'available_rolls' => 7,
                        'available_meters' => 520,
                    ],
                    [
                        'name' => 'Turquesa Brisa',
                        'hex_code' => '#4fb3bf',
                        'image_url' => 'https://images.unsplash.com/photo-1520962913323-358f1070d49b?auto=format&fit=crop&w=900&q=80',
                        'available_rolls' => 6,
                        'available_meters' => 480,
                    ],
                ],
            ],
            [
                'name' => 'Chalis Floral Kyoto',
                'slug' => 'chalis-floral-kyoto',
                'category' => 'Tejidos Especiales',
                'fabric_type' => 'Rayón Chalis',
                'collection' => 'Primavera Japón',
                'description' => 'Chalis con estampados florales de alta definición y drapeado ligero.',
                'composition' => '100% rayón',
                'width' => '1.42 m',
                'weight' => '110 g/m²',
                'price_per_meter' => 39.90,
                'lead_time_days' => 4,
                'colors' => [
                    [
                        'name' => 'Sakura Rubor',
                        'hex_code' => '#ffb7c5',
                        'image_url' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=900&q=80',
                        'available_rolls' => 5,
                        'available_meters' => 340,
                    ],
                    [
                        'name' => 'Azul Porcelana',
                        'hex_code' => '#4a6fa5',
                        'image_url' => 'https://images.unsplash.com/photo-1530023367847-a683933f4177?auto=format&fit=crop&w=900&q=80',
                        'available_rolls' => 4,
                        'available_meters' => 300,
                    ],
                ],
            ],
            [
                'name' => 'Gabardina Tech Shield',
                'slug' => 'gabardina-tech-shield',
                'category' => 'Sintéticos',
                'fabric_type' => 'Gabardina Impermeable',
                'collection' => 'Outdoor Pro',
                'description' => 'Gabardina con recubrimiento repelente al agua y membrana cortaviento.',
                'composition' => '88% poliéster, 12% nylon',
                'width' => '1.52 m',
                'weight' => '280 g/m²',
                'price_per_meter' => 79.40,
                'lead_time_days' => 6,
                'colors' => [
                    [
                        'name' => 'Negro Eclipse',
                        'hex_code' => '#0f1115',
                        'image_url' => 'https://images.unsplash.com/photo-1516641394520-55e5d0bdf3c6?auto=format&fit=crop&w=900&q=80',
                        'available_rolls' => 6,
                        'available_meters' => 410,
                    ],
                    [
                        'name' => 'Mostaza Andes',
                        'hex_code' => '#c2872f',
                        'image_url' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=900&q=80',
                        'available_rolls' => 5,
                        'available_meters' => 360,
                    ],
                ],
            ],
        ];

        foreach ($products as $productData) {
            $colors = $productData['colors'];
            unset($productData['colors']);

            $product = Product::updateOrCreate(
                ['slug' => $productData['slug']],
                $productData
            );

            foreach ($colors as $color) {
                ProductColor::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'name' => $color['name'],
                    ],
                    $color
                );
            }
        }

        Reservation::updateOrCreate(
            [
                'client_id' => $client->id,
                'product_id' => Product::where('slug', 'lino-premium-verona')->value('id'),
                'product_color_id' => ProductColor::where('name', 'Arena Toscana')->value('id'),
                'status' => 'pendiente',
            ],
            [
                'quantity_meters' => 25,
                'desired_pickup_date' => now()->addDays(3),
                'notes' => 'Reservar con borde sin costura, recoger en sucursal Equipetrol.',
            ]
        );

        Reservation::updateOrCreate(
            [
                'client_id' => $client->id,
                'product_id' => Product::where('slug', 'gabardina-tech-shield')->value('id'),
                'product_color_id' => ProductColor::where('name', 'Mostaza Andes')->value('id'),
                'status' => 'confirmada',
            ],
            [
                'quantity_meters' => 18,
                'desired_pickup_date' => now()->addDays(7),
                'notes' => 'Pedido confirmado para producción de chaquetas impermeables.',
            ]
        );
    }
}
