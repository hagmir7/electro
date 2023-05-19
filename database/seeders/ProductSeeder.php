<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => "MacBook Pro (M1 chip)",
            'category_id' => 1,
            'brand_id' => 1,
            'user_id' => 1,
            'stock' => 100,
            'price' => 19999,
            'old_price' => 29999,
            'description' => "Le MacBook Pro avec puce M1 est un PC portable révolutionnaire. Grâce à sa puce Apple Silicon, il offre des performances incroyables, une efficacité énergétique exceptionnelle et une autonomie prolongée. ",
            'body' => "Le MacBook Pro avec puce M1 est un PC portable révolutionnaire. Grâce à sa puce Apple Silicon, il offre des performances incroyables, une efficacité énergétique exceptionnelle et une autonomie prolongée. Son écran Retina magnifique, son clavier confortable et son système d'exploitation macOS fluide en font l'outil idéal pour les professionnels créatifs et les utilisateurs exigeants. Avec sa construction en aluminium de qualité supérieure et ses fonctionnalités avancées, le MacBook Pro M1 est un choix puissant et fiable pour réaliser vos tâches les plus exigeantes."
        ]);


        Product::create([
            'name' => "Dell XPS 13",
            'category_id' => 1,
            'brand_id' => 2,
            'user_id' => 1,
            'stock' => 100,
            'price' => 12000,
            'old_price' => 2000,
            'description' => "Le Dell XPS 13 est un PC portable ultraportable qui allie performances et élégance. Avec son écran InfinityEdge pratiquement sans bordure, il offre une expérience visuelle immersive.",
            'body' => "Le MacBook Pro avec puce M1 est un PC portable révolutionnaire. Grâce à sa puce Apple Silicon, il offre des performances incroyables, une efficacité énergétique exceptionnelle et une autonomie prolongée. Son écran Retina magnifique, son clavier confortable et son système d'exploitation macOS fluide en font l'outil idéal pour les professionnels créatifs et les utilisateurs exigeants. Avec sa construction en aluminium de qualité supérieure et ses fonctionnalités avancées, le MacBook Pro M1 est un choix puissant et fiable pour réaliser vos tâches les plus exigeantes."
        ]);


        Product::create([
            'name' => "HP Spectre x360",
            'category_id' => 1,
            'brand_id' => 3,
            'user_id' => 1,
            'stock' => 100,
            'price' => 30000,
            'old_price' => 19990,
            'description' => "Le HP Spectre x360 est un PC portable ultraportable qui allie performances et élégance. Avec son écran InfinityEdge pratiquement sans bordure, il offre une expérience visuelle immersive.",
            'body' => "Le Dell XPS 13 est un PC portable révolutionnaire. Grâce à sa puce Apple Silicon, il offre des performances incroyables, une efficacité énergétique exceptionnelle et une autonomie prolongée. Son écran Retina magnifique, son clavier confortable et son système d'exploitation macOS fluide en font l'outil idéal pour les professionnels créatifs et les utilisateurs exigeants. Avec sa construction en aluminium de qualité supérieure et ses fonctionnalités avancées, le MacBook Pro M1 est un choix puissant et fiable pour réaliser vos tâches les plus exigeantes."
        ]);


        Product::create([
            'name' => "Lenovo ThinkPad X1 Carbon",
            'category_id' => 1,
            'brand_id' => 4,
            'user_id' => 1,
            'stock' => 100,
            'price' => 10000,
            'old_price' => 12000,
            'description' => "Le Lenovo ThinkPad X1 Carbon est un PC portable ultraportable qui allie performances et élégance. Avec son écran InfinityEdge pratiquement sans bordure, il offre une expérience visuelle immersive.",
            'body' => "Le Lenovo ThinkPad X1 Carbon est un PC portable révolutionnaire. Grâce à sa puce Apple Silicon, il offre des performances incroyables, une efficacité énergétique exceptionnelle et une autonomie prolongée. Son écran Retina magnifique, son clavier confortable et son système d'exploitation macOS fluide en font l'outil idéal pour les professionnels créatifs et les utilisateurs exigeants. Avec sa construction en aluminium de qualité supérieure et ses fonctionnalités avancées, le MacBook Pro M1 est un choix puissant et fiable pour réaliser vos tâches les plus exigeantes."
        ]);



        Product::create([
            'name' => "Samsung Galaxy Book2",
            'category_id' => 1,
            'brand_id' => 5,
            'user_id' => 1,
            'stock' => 100,
            'price' => 12000,
            'old_price' => 19000,
            'description' => "Le Samsung Galaxy Book2 est un PC portable ultraportable qui allie performances et élégance. Avec son écran InfinityEdge pratiquement sans bordure, il offre une expérience visuelle immersive.",
            'body' => "Le Samsung Galaxy Book2 est un PC portable révolutionnaire. Grâce à sa puce Apple Silicon, il offre des performances incroyables, une efficacité énergétique exceptionnelle et une autonomie prolongée. Son écran Retina magnifique, son clavier confortable et son système d'exploitation macOS fluide en font l'outil idéal pour les professionnels créatifs et les utilisateurs exigeants. Avec sa construction en aluminium de qualité supérieure et ses fonctionnalités avancées, le MacBook Pro M1 est un choix puissant et fiable pour réaliser vos tâches les plus exigeantes."
        ]);


        Product::create([
            'name' => "Samsung Galaxy Book2",
            'category_id' => 1,
            'brand_id' => 6,
            'user_id' => 1,
            'stock' => 100,
            'price' => 13999,
            'old_price' => 29999,
            'description' => "Le Samsung Galaxy Book2 est un PC portable ultraportable qui allie performances et élégance. Avec son écran InfinityEdge pratiquement sans bordure, il offre une expérience visuelle immersive.",
            'body' => "Le Samsung Galaxy Book2 est un PC portable révolutionnaire. Grâce à sa puce Apple Silicon, il offre des performances incroyables, une efficacité énergétique exceptionnelle et une autonomie prolongée. Son écran Retina magnifique, son clavier confortable et son système d'exploitation macOS fluide en font l'outil idéal pour les professionnels créatifs et les utilisateurs exigeants. Avec sa construction en aluminium de qualité supérieure et ses fonctionnalités avancées, le MacBook Pro M1 est un choix puissant et fiable pour réaliser vos tâches les plus exigeantes."
        ]);


        Product::create([
            'name' => "MateBook X Pro",
            'category_id' => 1,
            'brand_id' => 7,
            'user_id' => 1,
            'stock' => 100,
            'price' => 12000,
            'old_price' => 19000,
            'description' => "Le MateBook X Pro est un PC portable ultraportable qui allie performances et élégance. Avec son écran InfinityEdge pratiquement sans bordure, il offre une expérience visuelle immersive.",
            'body' => "Le MateBook X Pro est un PC portable révolutionnaire. Grâce à sa puce Apple Silicon, il offre des performances incroyables, une efficacité énergétique exceptionnelle et une autonomie prolongée. Son écran Retina magnifique, son clavier confortable et son système d'exploitation macOS fluide en font l'outil idéal pour les professionnels créatifs et les utilisateurs exigeants. Avec sa construction en aluminium de qualité supérieure et ses fonctionnalités avancées, le MacBook Pro M1 est un choix puissant et fiable pour réaliser vos tâches les plus exigeantes."
        ]);


        // MacBook Pro (M1 chip)
        // Dell XPS 13
        // HP Spectre x360
        // Lenovo ThinkPad X1 Carbon
        // Samsung Galaxy Book2
        // ASUS ZenBook 14
        // Acer Swift 5
        // Microsoft Surface Laptop 4
        // Razer Blade 15
        // MSI GS66 Stealth
        // LG Gram 14
    }
}
