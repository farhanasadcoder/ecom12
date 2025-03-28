<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Admin();
        $admin->name = 'Admin';
        $admin->role = 'admin';
        $admin->mobile = '1234567890';
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make('12345');
        $admin->status = 1;
        $admin->save();   
        
    }
}
