<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            $book =  new Book;

            $book->isbn = $faker->randomNumber(9);
            $book->title = $faker->name;
            $book->year = rand(2000, 2023);
            $book->publisher_id = rand(1, 10);
            $book->author_id = rand(1, 20);
            $book->catalog_id = rand(1, 4);
            $book->qty = rand(1, 20);
            $book->price = rand(5000, 20000);

            $book->save();
        }
    }
}
