<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::updateOrCreate(
            ['slug' => 'garam-aura'],
            [
                'name' => 'Garam AURA✨',
                'tagline' => 'Pengasihan & Pembersih Energi Diri',
                'description' => 'Garam AURA diracik khusus untuk membantu membersihkan aura negatif di sekitar tubuh, menenangkan pikiran, dan memancarkan pesona alami agar orang-orang di sekitar Anda merasa lebih nyaman dan senang berada di dekat Anda.',
                'benefits' => "Membersihkan aura negatif\nMenenangkan energi dan pikiran\nMemancarkan pesona diri (pengasihan)\nMembuat orang lain merasa nyaman berada di dekat Anda\nCocok digunakan sebelum acara penting atau pertemuan",
                'price' => 40000,
                'stock' => 100,
                'is_active' => true,
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'garam-hoki'],
            [
                'name' => 'Garam HOKI✨',
                'tagline' => 'Penarik Rezeki, Karir & Kelancaran Usaha',
                'description' => 'Garam HOKI diformulasikan untuk membantu menarik energi keberuntungan, melancarkan rezeki, mendukung karir, serta membuka jalan agar usaha dan dagangan Anda semakin laris dan lancar.',
                'benefits' => "Menarik energi keberuntungan\nMelancarkan rezeki dan finansial\nMendukung kelancaran karir\nMelariskan dagangan dan usaha\nDianjurkan digunakan secara rutin",
                'price' => 40000,
                'stock' => 100,
                'is_active' => true,
            ]
        );
    }
}
