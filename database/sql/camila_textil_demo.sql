-- ------------------------------------------------------------
-- Base de datos de ejemplo para Camila Textil
-- Este script crea la estructura principal y datos de prueba
-- para el portal de clientes, catálogo y reservas.
-- ------------------------------------------------------------

-- Eliminar y crear la base de datos (ajustar según el entorno)
DROP DATABASE IF EXISTS camila_textil_demo;
CREATE DATABASE camila_textil_demo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE camila_textil_demo;

SET FOREIGN_KEY_CHECKS = 0;

-- ------------------------------------------------------------
-- Tabla: clients (Clientes registrados en el portal)
-- ------------------------------------------------------------
DROP TABLE IF EXISTS clients;
CREATE TABLE clients (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    company VARCHAR(255) NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(255) NULL,
    tax_id VARCHAR(255) NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO clients (id, name, company, email, phone, tax_id, password, remember_token, created_at, updated_at)
VALUES
    (1, 'Cliente Demo 1', 'Boutique Aurora', 'cliente1@camilatextil.com', '+591 70000001', '78945601', '$2y$12$HzzE46ZWIgfiraf2RVH6Z.lpjtnW2HsJ4luIyRgA.B4x9l86UeNau', 'T3stT0k3n01', NOW(), NOW());

-- ------------------------------------------------------------
-- Tabla: products (Catálogo principal de telas)
-- ------------------------------------------------------------
DROP TABLE IF EXISTS products;
CREATE TABLE products (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    category VARCHAR(255) NOT NULL,
    fabric_type VARCHAR(255) NOT NULL,
    collection VARCHAR(255) NULL,
    description TEXT NOT NULL,
    composition VARCHAR(255) NULL,
    width VARCHAR(255) NULL,
    weight VARCHAR(255) NULL,
    price_per_meter DECIMAL(8,2) NULL,
    lead_time_days INT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO products (id, name, slug, category, fabric_type, collection, description, composition, width, weight, price_per_meter, lead_time_days, created_at, updated_at) VALUES
    (1, 'Lino Premium Verona', 'lino-premium-verona', 'Fibras Naturales', 'Lino 100%', 'Colección Mediterránea', 'Lino europeo prelavado con caída suave, ideal para camisería y decoración liviana.', '100% lino', '1.45 m', '190 g/m²', 68.50, 2, NOW(), NOW()),
    (2, 'Seda Satinada Aurora', 'seda-satinada-aurora', 'Tejidos Especiales', 'Seda Satinada', 'Noche de Gala', 'Satinado de seda con brillo uniforme y tacto ultra suave para vestidos de alta costura.', '95% seda, 5% elastano', '1.40 m', '120 g/m²', 125.90, 5, NOW(), NOW()),
    (3, 'Denim Stretch Andino', 'denim-stretch-andino', 'Sintéticos', 'Denim Stretch', 'Urban Street', 'Denim elástico de alto rendimiento con recuperación rápida, ideal para jeans y chaquetas.', '72% algodón, 26% poliéster, 2% elastano', '1.50 m', '330 g/m²', 54.30, 3, NOW(), NOW()),
    (4, 'Algodón Orgánico Pacific', 'algodon-organico-pacific', 'Fibras Naturales', 'Algodón Orgánico', 'Eco Essentials', 'Tejido hipoalergénico certificado GOTS con acabado peinado para prendas casuales.', '100% algodón orgánico', '1.60 m', '160 g/m²', 45.70, 2, NOW(), NOW()),
    (5, 'Chalis Floral Kyoto', 'chalis-floral-kyoto', 'Tejidos Especiales', 'Rayón Chalis', 'Primavera Japón', 'Chalis con estampados florales de alta definición y drapeado ligero.', '100% rayón', '1.42 m', '110 g/m²', 39.90, 4, NOW(), NOW()),
    (6, 'Gabardina Tech Shield', 'gabardina-tech-shield', 'Sintéticos', 'Gabardina Impermeable', 'Outdoor Pro', 'Gabardina con recubrimiento repelente al agua y membrana cortaviento.', '88% poliéster, 12% nylon', '1.52 m', '280 g/m²', 79.40, 6, NOW(), NOW());

-- ------------------------------------------------------------
-- Tabla: product_colors (Variantes cromáticas por producto)
-- ------------------------------------------------------------
DROP TABLE IF EXISTS product_colors;
CREATE TABLE product_colors (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id BIGINT UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    hex_code VARCHAR(255) NULL,
    image_url VARCHAR(2048) NOT NULL,
    available_rolls INT DEFAULT 0,
    available_meters INT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_product_colors_product FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO product_colors (id, product_id, name, hex_code, image_url, available_rolls, available_meters, created_at, updated_at) VALUES
    (1, 1, 'Arena Toscana', '#d6c4a2', 'https://images.unsplash.com/photo-1503341455253-b2e723bb3dbb?auto=format&fit=crop&w=900&q=80', 6, 420, NOW(), NOW()),
    (2, 1, 'Olivo Suave', '#8a8f5d', 'https://images.unsplash.com/photo-1520256862855-398228c41684?auto=format&fit=crop&w=900&q=80', 4, 280, NOW(), NOW()),
    (3, 2, 'Magenta Lucero', '#b11b5e', 'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=900&q=80', 3, 180, NOW(), NOW()),
    (4, 2, 'Azul Medianoche', '#1c2743', 'https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=900&q=80', 2, 140, NOW(), NOW()),
    (5, 3, 'Índigo Clásico', '#27334a', 'https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?auto=format&fit=crop&w=900&q=80', 8, 600, NOW(), NOW()),
    (6, 3, 'Gris Carbón', '#3b3d3f', 'https://images.unsplash.com/photo-1537832816519-689ad163238b?auto=format&fit=crop&w=900&q=80', 5, 360, NOW(), NOW()),
    (7, 4, 'Coral Pacífico', '#ff6f61', 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=900&q=80', 7, 520, NOW(), NOW()),
    (8, 4, 'Turquesa Brisa', '#4fb3bf', 'https://images.unsplash.com/photo-1520962913323-358f1070d49b?auto=format&fit=crop&w=900&q=80', 6, 480, NOW(), NOW()),
    (9, 5, 'Sakura Rubor', '#ffb7c5', 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=900&q=80', 5, 340, NOW(), NOW()),
    (10, 5, 'Azul Porcelana', '#4a6fa5', 'https://images.unsplash.com/photo-1530023367847-a683933f4177?auto=format&fit=crop&w=900&q=80', 4, 300, NOW(), NOW()),
    (11, 6, 'Negro Eclipse', '#0f1115', 'https://images.unsplash.com/photo-1516641394520-55e5d0bdf3c6?auto=format&fit=crop&w=900&q=80', 6, 410, NOW(), NOW()),
    (12, 6, 'Mostaza Andes', '#c2872f', 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=900&q=80', 5, 360, NOW(), NOW());

-- ------------------------------------------------------------
-- Tabla: reservations (Reservas realizadas por clientes)
-- ------------------------------------------------------------
DROP TABLE IF EXISTS reservations;
CREATE TABLE reservations (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    client_id BIGINT UNSIGNED NOT NULL,
    product_id BIGINT UNSIGNED NOT NULL,
    product_color_id BIGINT UNSIGNED NULL,
    quantity_meters INT NOT NULL,
    status ENUM('pendiente', 'confirmada', 'cancelada') DEFAULT 'pendiente',
    desired_pickup_date DATE NULL,
    notes TEXT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_reservations_client FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE,
    CONSTRAINT fk_reservations_product FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    CONSTRAINT fk_reservations_color FOREIGN KEY (product_color_id) REFERENCES product_colors(id) ON DELETE SET NULL
) ENGINE=InnoDB;

INSERT INTO reservations (id, client_id, product_id, product_color_id, quantity_meters, status, desired_pickup_date, notes, created_at, updated_at) VALUES
    (1, 1, 1, 1, 25, 'pendiente', DATE_ADD(CURDATE(), INTERVAL 3 DAY), 'Reservar con borde sin costura, recoger en sucursal Equipetrol.', NOW(), NOW()),
    (2, 1, 6, 12, 18, 'confirmada', DATE_ADD(CURDATE(), INTERVAL 7 DAY), 'Pedido confirmado para producción de chaquetas impermeables.', NOW(), NOW());

SET FOREIGN_KEY_CHECKS = 1;

