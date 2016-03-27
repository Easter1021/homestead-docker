<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->command->info('users table seeded!');

        Model::reguard();
    }
}

class UsersTableSeeder extends Seeder {

    public function run()
    { 
        App\User::truncate();

        factory(App\User::class, 20)->create();
    }

}

class BooksTableSeeder extends Seeder {

    public function run()
    { 
        App\Book::truncate();

        factory(App\Book::class, 20*5)->create();
    }

}