<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::truncate();

        $books = [
            [
                'title'       => 'Le Royaume des Étoiles',
                'author'      => 'Camille Rivière',
                'genre'       => 'Fantasy',
                'age_range'   => '10-15ans',
                'price'       => 12.99,
                'image'       => 'https://images.unsplash.com/photo-1534796636912-3b95b3ab5986?w=300&h=400&fit=crop',
                'description' => 'Une jeune héroïne découvre un royaume caché parmi les étoiles.',
            ],
            [
                'title'       => 'Petit Ours et la Lune',
                'author'      => 'Léa Bernard',
                'genre'       => 'Fiction',
                'age_range'   => '-3ans',
                'price'       => 0,
                'image'       => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?w=300&h=400&fit=crop',
                'description' => 'Un album tout-doux pour accompagner le coucher des plus petits.',
            ],
            [
                'title'       => 'Les Mystères de la Forêt',
                'author'      => 'Hugo Martin',
                'genre'       => 'Mystère',
                'age_range'   => '6-10ans',
                'price'       => 4.50,
                'image'       => 'https://images.unsplash.com/photo-1448375240586-882707db888b?w=300&h=400&fit=crop',
                'description' => 'Une enquête pleine de rebondissements au cœur des bois.',
            ],
            [
                'title'       => 'Voyage vers Mars',
                'author'      => 'Sophie Laurent',
                'genre'       => 'Science-Fiction',
                'age_range'   => '15-18ans',
                'price'       => 9.99,
                'image'       => 'https://images.unsplash.com/photo-1614728894747-a83421e2b9c9?w=300&h=400&fit=crop',
                'description' => 'Les premiers colons humains à la conquête de la planète rouge.',
            ],
            [
                'title'       => 'Comprendre le Climat',
                'author'      => 'Dr. Antoine Roy',
                'genre'       => 'Non-Fiction',
                'age_range'   => '+18ans',
                'price'       => 18.00,
                'image'       => 'https://images.unsplash.com/photo-1611273426858-450d8e3c9fce?w=300&h=400&fit=crop',
                'description' => 'Un essai clair et accessible sur les enjeux climatiques.',
            ],
            [
                'title'       => 'La Dragonne Argentée',
                'author'      => 'Camille Rivière',
                'genre'       => 'Fantasy',
                'age_range'   => '6-10ans',
                'price'       => 7.50,
                'image'       => 'https://images.unsplash.com/photo-1577493340887-b7bfff550145?w=300&h=400&fit=crop',
                'description' => 'Une amitié inattendue entre un enfant et une dragonne.',
            ],
            [
                'title'       => 'Le Code Secret',
                'author'      => 'Nadia Fontaine',
                'genre'       => 'Mystère',
                'age_range'   => '10-15ans',
                'price'       => 6.99,
                'image'       => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=300&h=400&fit=crop',
                'description' => 'Un message codé entraîne deux amis dans une aventure trépidante.',
            ],
            [
                'title'       => 'Comptines du Matin',
                'author'      => 'Léa Bernard',
                'genre'       => 'Fiction',
                'age_range'   => '3-6ans',
                'price'       => 0,
                'image'       => 'https://images.unsplash.com/photo-1490730141103-6cac27aaab94?w=300&h=400&fit=crop',
                'description' => 'Un recueil de comptines pour bien commencer la journée.',
            ],
            [
                'title'       => 'Robots & Compagnie',
                'author'      => 'Sophie Laurent',
                'genre'       => 'Science-Fiction',
                'age_range'   => '6-10ans',
                'price'       => 3.99,
                'image'       => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=300&h=400&fit=crop',
                'description' => 'Quand les robots de la maison prennent vie la nuit.',
            ],
            [
                'title'       => 'Histoire de la Philosophie',
                'author'      => 'Dr. Antoine Roy',
                'genre'       => 'Non-Fiction',
                'age_range'   => '+18ans',
                'price'       => 19.99,
                'image'       => 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=300&h=400&fit=crop',
                'description' => "Un panorama des grandes idées de l'Antiquité à nos jours.",
            ],
            [
                'title'       => "L'Épée de Cristal",
                'author'      => 'Hugo Martin',
                'genre'       => 'Fantasy',
                'age_range'   => '15-18ans',
                'price'       => 14.50,
                'image'       => 'https://images.unsplash.com/photo-1589656966895-2f33e7653819?w=300&h=400&fit=crop',
                'description' => "La quête d'un héros pour reforger une épée légendaire.",
            ],
            [
                'title'       => 'Le Train Fantôme',
                'author'      => 'Nadia Fontaine',
                'genre'       => 'Mystère',
                'age_range'   => '15-18ans',
                'price'       => 8.99,
                'image'       => 'https://images.unsplash.com/photo-1474487548417-781cb71495f3?w=300&h=400&fit=crop',
                'description' => "Un huis clos haletant à bord d'un train disparu.",
            ],
            [
                'title'       => 'Mon Premier Imagier',
                'author'      => 'Léa Bernard',
                'genre'       => 'Fiction',
                'age_range'   => '-3ans',
                'price'       => 2.99,
                'image'       => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=300&h=400&fit=crop',
                'description' => 'Des images colorées pour apprendre ses premiers mots.',
            ],
            [
                'title'       => 'Galaxie en Danger',
                'author'      => 'Sophie Laurent',
                'genre'       => 'Science-Fiction',
                'age_range'   => '10-15ans',
                'price'       => 11.00,
                'image'       => 'https://images.unsplash.com/photo-1462331940025-496dfbfc7564?w=300&h=400&fit=crop',
                'description' => 'Une équipe de jeunes pilotes doit sauver la galaxie.',
            ],
            [
                'title'       => 'Cuisiner Simplement',
                'author'      => 'Camille Rivière',
                'genre'       => 'Non-Fiction',
                'age_range'   => '+18ans',
                'price'       => 15.90,
                'image'       => 'https://images.unsplash.com/photo-1466637574441-749b8f19452f?w=300&h=400&fit=crop',
                'description' => 'Des recettes faciles et rapides pour le quotidien.',
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}