<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(userSeeder::class);
    }
}

class userSeeder extends Seeder
{
    public function run() {
        DB::table('users')->insert([
            [
                'name'=>'Nguyen',
                'email'=>str_random(3).'@gmail.com',
                'password'=>bcrypt('matkhau')
            ],
            [
                'name'=>'Manh',
                'email'=>str_random(3).'@gmail.com',
                'password'=>bcrypt('matkhau')
            ],
            [
                'name'=>'Laravel',
                'email'=>str_random(3).'@gmail.com',
                'password'=>bcrypt('matkhau')
            ]
    ]);
    }
}