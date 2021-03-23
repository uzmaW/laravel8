<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       /*  DB::table('users')->upsert([
           [ 'name' => 'John Doe',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('123456'),
            'type' => 'superadmin'],
            ['name' => 'John Doe',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('super1234'),
            'type' => 'admin'],
            ['name' => 'John Doe',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user1234'),
            'type' => 'user']
        ],['name','email']); */
    }
}
