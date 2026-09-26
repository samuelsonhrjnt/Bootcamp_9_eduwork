<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Elektronik', 'slug' => 'elektronik'],
            ['name' => 'Fashion Pria', 'slug' => 'fashion-pria'],
            ['name' => 'Fashion Wanita', 'slug' => 'fashion-wanita'],
            ['name' => 'Perawatan Rumah', 'slug' => 'perawatan-rumah'],
            ['name' => 'Olahraga', 'slug' => 'olahraga'],
        ];

        ProductCategory::query()->insert($categories);

        $categoryMap = ProductCategory::query()
            ->pluck('id', 'slug')
            ->toArray();

        $products = [
            'elektronik' => [
                ['name' => 'Smartphone X1', 'slug' => 'smartphone-x1', 'description' => 'Smartphone dengan layar AMOLED 6.7 inci dan kamera 108 MP.', 'image' => 'images/products/example.jpg', 'stock' => 25, 'price' => 3999000],
                ['name' => 'Laptop Pro 14', 'slug' => 'laptop-pro-14', 'description' => 'Laptop ringan untuk kerja dan desain dengan performa cepat.', 'image' => 'images/products/example.jpg', 'stock' => 15, 'price' => 12999000],
                ['name' => 'Headphone AirWave', 'slug' => 'headphone-airwave', 'description' => 'Headphone wireless dengan kualitas audio premium dan noise cancelling.', 'image' => 'images/products/example.jpg', 'stock' => 30, 'price' => 1899000],
                ['name' => 'Smartwatch Pulse', 'slug' => 'smartwatch-pulse', 'description' => 'Smartwatch dengan fitur pemantauan kesehatan dan GPS.', 'image' => 'images/products/example.jpg', 'stock' => 18, 'price' => 2499000],
                ['name' => 'Keyboard Mechanical', 'slug' => 'keyboard-mechanical', 'description' => 'Keyboard mekanik dengan switch responsif dan desain ergonomis.', 'image' => 'images/products/example.jpg', 'stock' => 20, 'price' => 899000],
                ['name' => 'Monitor 27 inch', 'slug' => 'monitor-27-inch', 'description' => 'Monitor 27 inch dengan resolusi Full HD dan refresh rate tinggi.', 'image' => 'images/products/example.jpg', 'stock' => 12, 'price' => 3599000],
                ['name' => 'Speaker Mini Boom', 'slug' => 'speaker-mini-boom', 'description' => 'Speaker bluetooth portabel dengan bass yang kuat.', 'image' => 'images/products/example.jpg', 'stock' => 22, 'price' => 1299000],
                ['name' => 'Power Bank Ultra', 'slug' => 'power-bank-ultra', 'description' => 'Power bank kapasitas besar dengan pengisian cepat dua port.', 'image' => 'images/products/example.jpg', 'stock' => 40, 'price' => 599000],
                ['name' => 'Tablet Flex', 'slug' => 'tablet-flex', 'description' => 'Tablet untuk belajar, kerja, dan hiburan dengan layar besar.', 'image' => 'images/products/example.jpg', 'stock' => 17, 'price' => 4999000],
                ['name' => 'Webcam HD Pro', 'slug' => 'webcam-hd-pro', 'description' => 'Webcam full HD untuk meeting online dan streaming.', 'image' => 'images/products/example.jpg', 'stock' => 28, 'price' => 799000],
            ],
            'fashion-pria' => [
                ['name' => 'Jaket Bomber Navy', 'slug' => 'jaket-bomber-navy', 'description' => 'Jaket bomber casual yang cocok untuk aktivitas harian.', 'image' => 'images/products/example.jpg', 'stock' => 35, 'price' => 1299000],
                ['name' => 'Kaos Polos Premium', 'slug' => 'kaos-polos-premium', 'description' => 'Kaos premium berbahan katun lembut dan nyaman dipakai.', 'image' => 'images/products/example.jpg', 'stock' => 60, 'price' => 189000],
                ['name' => 'Celana Chino Slim', 'slug' => 'celana-chino-slim', 'description' => 'Celana chino dengan potongan slim modern untuk tampilan rapi.', 'image' => 'images/products/example.jpg', 'stock' => 32, 'price' => 449000],
                ['name' => 'Sneakers Urban Run', 'slug' => 'sneakers-urban-run', 'description' => 'Sepatu sneakers dengan desain sporty dan nyaman untuk harian.', 'image' => 'images/products/example.jpg', 'stock' => 45, 'price' => 899000],
                ['name' => 'Kemeja Formal Lengan Panjang', 'slug' => 'kemeja-formal-lengan-panjang', 'description' => 'Kemeja formal dengan bahan halus dan model klasik.', 'image' => 'images/products/example.jpg', 'stock' => 24, 'price' => 549000],
                ['name' => 'Tas Sling Travel', 'slug' => 'tas-sling-travel', 'description' => 'Tas sling multifungsi untuk perjalanan ringan dan aktivitas harian.', 'image' => 'images/products/example.jpg', 'stock' => 20, 'price' => 699000],
                ['name' => 'Sepatu Boots Casual', 'slug' => 'sepatu-boots-casual', 'description' => 'Boots casual dengan bahan kokoh dan desain trendi.', 'image' => 'images/products/example.jpg', 'stock' => 18, 'price' => 1099000],
                ['name' => 'Topi Baseball Classic', 'slug' => 'topi-baseball-classic', 'description' => 'Topi baseball dengan warna netral dan nyaman dipakai.', 'image' => 'images/products/example.jpg', 'stock' => 50, 'price' => 159000],
                ['name' => 'Belt Leather Premium', 'slug' => 'belt-leather-premium', 'description' => 'Sabuk kulit premium yang cocok untuk outfit formal.', 'image' => 'images/products/example.jpg', 'stock' => 27, 'price' => 399000],
                ['name' => 'Polo Shirt Active', 'slug' => 'polo-shirt-active', 'description' => 'Polo shirt dengan bahan breathable untuk aktivitas santai.', 'image' => 'images/products/example.jpg', 'stock' => 38, 'price' => 349000],
            ],
            'fashion-wanita' => [
                ['name' => 'Dress Satin Elegant', 'slug' => 'dress-satin-elegant', 'description' => 'Dress satin elegan untuk acara formal dan semi formal.', 'image' => 'images/products/example.jpg', 'stock' => 26, 'price' => 799000],
                ['name' => 'Blouse Rayon Casual', 'slug' => 'blouse-rayon-casual', 'description' => 'Blouse nyaman dengan bahan rayon yang halus.', 'image' => 'images/products/example.jpg', 'stock' => 42, 'price' => 329000],
                ['name' => 'Rok Midi Pleat', 'slug' => 'rok-midi-pleat', 'description' => 'Rok midi dengan model pleat yang stylish dan feminin.', 'image' => 'images/products/example.jpg', 'stock' => 30, 'price' => 459000],
                ['name' => 'Heels Reina', 'slug' => 'heels-reina', 'description' => 'Sepatu heels dengan desain modern dan nyaman dipakai.', 'image' => 'images/products/example.jpg', 'stock' => 22, 'price' => 699000],
                ['name' => 'Tas Wanita Liora', 'slug' => 'tas-wanita-liora', 'description' => 'Tas wanita dengan desain minimalis dan kapasitas cukup besar.', 'image' => 'images/products/example.jpg', 'stock' => 34, 'price' => 559000],
                ['name' => 'Scarf Silk Soft', 'slug' => 'scarf-silk-soft', 'description' => 'Scarf berbahan sutra lembut dengan warna elegan.', 'image' => 'images/products/example.jpg', 'stock' => 40, 'price' => 249000],
                ['name' => 'Kimono Cotton', 'slug' => 'kimono-cotton', 'description' => 'Kimono nyaman untuk sehari-hari dan santai.', 'image' => 'images/products/example.jpg', 'stock' => 19, 'price' => 639000],
                ['name' => 'Jilbab Instant', 'slug' => 'jilbab-instant', 'description' => 'Jilbab instan trendy dengan bahan nyaman dan ringan.', 'image' => 'images/products/example.jpg', 'stock' => 55, 'price' => 99000],
                ['name' => 'Flat Sandal', 'slug' => 'flat-sandal', 'description' => 'Sandal flat dengan bahan lembut untuk aktivitas santai.', 'image' => 'images/products/example.jpg', 'stock' => 47, 'price' => 199000],
                ['name' => 'Cardigan Cozy', 'slug' => 'cardigan-cozy', 'description' => 'Cardigan hangat dengan desain klasik dan nyaman dipakai.', 'image' => 'images/products/example.jpg', 'stock' => 21, 'price' => 529000],
            ],
            'perawatan-rumah' => [
                ['name' => 'Setrika Steam Pro', 'slug' => 'setrika-steam-pro', 'description' => 'Setrika uap dengan fitur anti lengket dan cepat panas.', 'image' => 'images/products/example.jpg', 'stock' => 18, 'price' => 649000],
                ['name' => 'Vacuum Cleaner Mini', 'slug' => 'vacuum-cleaner-mini', 'description' => 'Vacuum cleaner portabel untuk membersihkan rumah dengan mudah.', 'image' => 'images/products/example.jpg', 'stock' => 12, 'price' => 1199000],
                ['name' => 'Lampu LED Philips', 'slug' => 'lampu-led-philips', 'description' => 'Lampu LED hemat energi dengan cahaya terang stabil.', 'image' => 'images/products/example.jpg', 'stock' => 48, 'price' => 199000],
                ['name' => 'Kipas Angin Smart', 'slug' => 'kipas-angin-smart', 'description' => 'Kipas angin modern dengan kontrol jarak jauh.', 'image' => 'images/products/example.jpg', 'stock' => 20, 'price' => 899000],
                ['name' => 'Pembersih Lantai', 'slug' => 'pembersih-lantai', 'description' => 'Mesin pembersih lantai yang efektif dan mudah digunakan.', 'image' => 'images/products/example.jpg', 'stock' => 10, 'price' => 1699000],
                ['name' => 'Teko elektrik', 'slug' => 'teko-elektrik', 'description' => 'Teko listrik untuk menyeduh teh dan kopi otomatis.', 'image' => 'images/products/example.jpg', 'stock' => 25, 'price' => 449000],
                ['name' => 'Rak Dinding Kayu', 'slug' => 'rak-dinding-kayu', 'description' => 'Rak dinding multifungsi untuk ruang tamu dan kamar.', 'image' => 'images/products/example.jpg', 'stock' => 14, 'price' => 699000],
                ['name' => 'Mop Robot', 'slug' => 'mop-robot', 'description' => 'Robot pembersih lantai yang bekerja otomatis.', 'image' => 'images/products/example.jpg', 'stock' => 8, 'price' => 2299000],
                ['name' => 'Kursi Lipat', 'slug' => 'kursi-lipat', 'description' => 'Kursi lipat praktis untuk kebutuhan rumah dan acara.', 'image' => 'images/products/example.jpg', 'stock' => 30, 'price' => 399000],
                ['name' => 'Sofa Mini', 'slug' => 'sofa-mini', 'description' => 'Sofa mini multifungsi untuk ruang sempit dan nyaman dipakai.', 'image' => 'images/products/example.jpg', 'stock' => 9, 'price' => 3199000],
            ],
            'olahraga' => [
                ['name' => 'Sepeda Lipat', 'slug' => 'sepeda-lipat', 'description' => 'Sepeda lipat ringan untuk berolahraga dan berpergian.', 'image' => 'images/products/example.jpg', 'stock' => 11, 'price' => 4899000],
                ['name' => 'Yoga Mat Pro', 'slug' => 'yoga-mat-pro', 'description' => 'Matras yoga tebal dengan bahan anti slip.', 'image' => 'images/products/example.jpg', 'stock' => 36, 'price' => 299000],
                ['name' => 'Botol Minum Sport', 'slug' => 'botol-minum-sport', 'description' => 'Botol minum tahan lama untuk aktivitas harian dan olahraga.', 'image' => 'images/products/example.jpg', 'stock' => 58, 'price' => 99000],
                ['name' => 'Raket Badminton', 'slug' => 'raket-badminton', 'description' => 'Raket badminton ringan dengan grip nyaman.', 'image' => 'images/products/example.jpg', 'stock' => 24, 'price' => 499000],
                ['name' => 'Treadmill Mini', 'slug' => 'treadmill-mini', 'description' => 'Treadmill mini untuk latihan di rumah.', 'image' => 'images/products/example.jpg', 'stock' => 7, 'price' => 6599000],
                ['name' => 'Bola Basket Pro', 'slug' => 'bola-basket-pro', 'description' => 'Bola basket dengan kualitas premium untuk latihan dan pertandingan.', 'image' => 'images/products/example.jpg', 'stock' => 27, 'price' => 399000],
                ['name' => 'Dumbbell Set', 'slug' => 'dumbbell-set', 'description' => 'Set dumbbell ringan untuk latihan kekuatan di rumah.', 'image' => 'images/products/example.jpg', 'stock' => 18, 'price' => 899000],
                ['name' => 'Jersey Running', 'slug' => 'jersey-running', 'description' => 'Jersey lari dengan bahan breathable dan ringan.', 'image' => 'images/products/example.jpg', 'stock' => 33, 'price' => 289000],
                ['name' => 'Kacamata Outdoor', 'slug' => 'kacamata-outdoor', 'description' => 'Kacamata olahraga dengan perlindungan UV dan desain ringan.', 'image' => 'images/products/example.jpg', 'stock' => 29, 'price' => 279000],
                ['name' => 'Tas Gym Deluxe', 'slug' => 'tas-gym-deluxe', 'description' => 'Tas gym berkapasitas besar untuk membawa perlengkapan olahraga.', 'image' => 'images/products/example.jpg', 'stock' => 16, 'price' => 599000],
            ],
        ];

        $payload = [];

        foreach ($products as $slug => $items) {
            $categoryId = $categoryMap[$slug] ?? null;

            if (! $categoryId) {
                continue;
            }

            foreach ($items as $item) {
                $payload[] = [
                    'name' => $item['name'],
                    'slug' => $item['slug'],
                    'description' => $item['description'],
                    'image' => 'images/products/example.jpg',
                    'stock' => $item['stock'],
                    'price' => $item['price'],
                    'product_category_id' => $categoryId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        Product::query()->insert($payload);
    }
}
