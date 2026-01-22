<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Midnight Biker Leather Jacket',
                'image' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'description' => 'Jaket kulit model biker klasik dengan detail ritsleting perak dan kancing tekan yang memberikan kesan edgy. Terbuat dari bahan sintetis berkualitas tinggi yang tahan lama, sangat cocok untuk melengkapi gaya streetwear atau berkendara motor dengan tetap tampil stylish.'
            ],
            [
                'name' => 'Sweet Heart Chambray Shirt',
                'image' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'description' => 'Kemeja berbahan katun chambray lembut dengan motif hati kecil yang manis. Desainnya yang simpel namun feminin menjadikannya pilihan tepat untuk tampilan kantor yang kasual atau sekadar berkumpul bersama teman di akhir pekan.'
            ],
            [
                'name' => 'White Minimalist Tee',
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'description' => 'Kaos minimalist dengan warna putih yang elegan. Desain simple dengan bahan cotton combed 30s yang lembut dan tidak mudah melar.'
            ],
            [
                'name' => 'Deep Indigo Straight Jeans',
                'image' => 'https://images.unsplash.com/photo-1624378439575-d8705ad7ae80?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'description' => 'Celana denim dengan potongan straight cut berwarna biru indigo pekat yang memberikan kesan rapi dan ramping.'
            ],
            [
                'name' => 'Essential Olive Tee',
                'image' => 'https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'description' => 'Kaos essential yang wajib dimiliki. Bahan cotton 100% dengan ketebalan optimal, cocok untuk layering atau standalone.'
            ],
            [
                'name' => 'Button-up Shirt',
                'image' => 'https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'description' => 'Kemeja dengan detail kancing premium. Cocok untuk acara semi-formal maupun meeting kantor. Easy iron material.'
            ],
            [
                'name' => 'Fortune Cat Graphic Tee',
                'image' => 'https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'description' => 'Kaos santai berwarna krem dengan desain grafis kucing keberuntungan (Maneki-neko) berwarna biru yang ikonik. Menggunakan bahan katun premium yang adem dan menyerap keringat, pas untuk kamu yang menyukai gaya minimalis dengan sentuhan seni pop.'
            ],
            [
                'name' => 'Azure Breeze Maxi Dress',
                'image' => 'https://images.unsplash.com/photo-1539008835657-9e8e9680c956?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'description' => 'Gaun panjang tanpa lengan berwarna biru muda yang elegan dengan detail belahan tinggi (slit) yang menawan. Potongan yang melambai dan bahan yang ringan membuatnya sangat nyaman digunakan untuk acara pantai, liburan musim panas, atau sesi foto outdoor.'
            ],
            [
                'name' => 'Retro Sky Mom Jeans',
                'image' => 'https://images.unsplash.com/photo-1582418702059-97ebafb35d09?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'description' => 'Celana jeans model high-waist dengan warna light wash yang memberikan kesan retro ala tahun 90-an. Potongannya yang longgar di area paha dan mengecil di bagian bawah memberikan kenyamanan maksimal sekaligus menonjolkan bentuk pinggang secara sempurna.'
            ],
            [
                'name' => 'Denim Jeans',
                'image' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'description' => 'Jeans denim bermodel skinny fit dengan stretch material untuk kenyamanan maksimal.'
            ],
        ];

        foreach ($products as $p) {
            Product::create([
                'name'        => $p['name'],
                'description' => $p['description'],
                'price'       => rand(200, 900) * 1000,
                'image'       => $p['image'],
            ]);
        }
    }
}
