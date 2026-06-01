<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['title' => 'Le Royaume des Étoiles',      'author' => 'Camille Rivière',   'genre' => 'Fantasy',         'age_range' => '10-15ans', 'price' => 12.99, 'description' => 'Une jeune héroïne découvre un royaume caché parmi les étoiles.'],
            ['title' => 'Petit Ours et la Lune',        'author' => 'Léa Bernard',       'genre' => 'Fiction',         'age_range' => '-3ans',    'price' => 0,     'description' => 'Un album tout-doux pour accompagner le coucher des plus petits.'],
            ['title' => 'Les Mystères de la Forêt',     'author' => 'Hugo Martin',       'genre' => 'Mystère',         'age_range' => '6-10ans',  'price' => 4.50,  'description' => 'Une enquête pleine de rebondissements au cœur des bois.'],
            ['title' => 'Voyage vers Mars',             'author' => 'Sophie Laurent',    'genre' => 'Science-Fiction', 'age_range' => '15-18ans', 'price' => 9.99,  'description' => 'Les premiers colons humains à la conquête de la planète rouge.'],
            ['title' => 'Comprendre le Climat',         'author' => 'Dr. Antoine Roy',   'genre' => 'Non-Fiction',     'age_range' => '+18ans',   'price' => 18.00, 'description' => 'Un essai clair et accessible sur les enjeux climatiques.'],
            ['title' => 'La Dragonne Argentée',         'author' => 'Camille Rivière',   'genre' => 'Fantasy',         'age_range' => '6-10ans',  'price' => 7.50,  'description' => 'Une amitié inattendue entre un enfant et une dragonne.'],
            ['title' => 'Le Code Secret',               'author' => 'Nadia Fontaine',    'genre' => 'Mystère',         'age_range' => '10-15ans', 'price' => 6.99,  'description' => 'Un message codé entraîne deux amis dans une aventure trépidante.'],
            ['title' => 'Comptines du Matin',           'author' => 'Léa Bernard',       'genre' => 'Fiction',         'age_range' => '3-6ans',   'price' => 0,     'description' => 'Un recueil de comptines pour bien commencer la journée.'],
            ['title' => 'Robots & Compagnie',           'author' => 'Sophie Laurent',    'genre' => 'Science-Fiction', 'age_range' => '6-10ans',  'price' => 3.99,  'description' => 'Quand les robots de la maison prennent vie la nuit.'],
            ['title' => 'Histoire de la Philosophie',   'author' => 'Dr. Antoine Roy',   'genre' => 'Non-Fiction',     'age_range' => '+18ans',   'price' => 19.99, 'description' => "Un panorama des grandes idées de l'Antiquité à nos jours."],
            ['title' => "L'Épée de Cristal",            'author' => 'Hugo Martin',       'genre' => 'Fantasy',         'age_range' => '15-18ans', 'price' => 14.50, 'description' => 'La quête d’un héros pour reforger une épée légendaire.'],
            ['title' => 'Le Train Fantôme',             'author' => 'Nadia Fontaine',    'genre' => 'Mystère',         'age_range' => '15-18ans', 'price' => 8.99,  'description' => 'Un huis clos haletant à bord d’un train disparu.'],
            ['title' => 'Mon Premier Imagier',          'author' => 'Léa Bernard',       'genre' => 'Fiction',         'age_range' => '-3ans',    'price' => 2.99,  'description' => 'Des images colorées pour apprendre ses premiers mots.'],
            ['title' => 'Galaxie en Danger',            'author' => 'Sophie Laurent',    'genre' => 'Science-Fiction', 'age_range' => '10-15ans', 'price' => 11.00, 'description' => 'Une équipe de jeunes pilotes doit sauver la galaxie.'],
            ['title' => 'Cuisiner Simplement',          'author' => 'Camille Rivière',   'genre' => 'Non-Fiction',     'age_range' => '+18ans',   'price' => 15.90, 'description' => 'Des recettes faciles et rapides pour le quotidien.'],
        ];

        foreach ($books as $book) {
            Book::create($book + ['image' => 'images/livre-test.jpg']);
        }
    }
}
