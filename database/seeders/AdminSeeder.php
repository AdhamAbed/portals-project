<?php

namespace Database\Seeders;

use App\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'name' => 'adham',
            'email' => 'adham@email.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'type' => 'admin',
            'role_id' => '1',
            'mobile' => '056698865',
            'name' => 'adham',
            "status"=> 'active',
 
 
         ]);
    }
}
