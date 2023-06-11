<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Agama;
use App\Models\Bansos;
use App\Models\Lokasi;
use App\Models\Status;
use App\Models\Role;
use App\Models\Relawan;
use App\Models\Jenis_kelamin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'role_id' => ('2')
        ]);
        User::create([
            'name' => 'Admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('12345'),
            'role_id' => ('2')
        ]);
        User::create([
            'name' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('12345'),
            'role_id' => ('2')
        ]);
        User::create([
            'name' => 'Developer',
            
            'email' => 'developer@gmail.com',
            'password' => bcrypt('12345'),
            'role_id' => ('1')  
        ]);
        User::create([
            'name' => 'Donatur',
            
            'email' => 'donatur@gmail.com',
            'password' => bcrypt('12345'),
            'role_id' => ('3')
        ]);
        User::create([
            'name' => 'Relawan',
            
            'email' => 'relawan@gmail.com',
            'password' => bcrypt('12345'),
            'role_id' => ('4')
        ]);

        Agama::create([
            'name' => 'Islam'
        ]);
        Agama::create([
            'name' => 'Hindu'
        ]);
        Agama::create([
            'name' => 'Kristen'
        ]);
        Agama::create([
            'name' => 'Katholik'
        ]);
        Agama::create([
            'name' => 'Konghuju'
        ]);
        Agama::create([
            'name' => 'Buddha'
        ]);

        Jenis_kelamin::create([
            'name' => 'Pria'
        ]);
        Jenis_kelamin::create([
            'name' => 'Wanita'
        ]);

        Status::create([
            'name' => 'Yatim'
        ]);
        Status::create([
            'name' => 'Piatu'
        ]);
        Status::create([
            'name' => 'Yatim Piatu'
        ]);
        Status::create([
            'name' => 'Duafa'
        ]);

        Lokasi::create([
            'name' => 'Panti'
        ]);
        Lokasi::create([
            'name' => 'Rumah'
        ]);

        Bansos::create([
            'name' => 'Donasi Barang'
        ]);
        Bansos::create([
            'name' => 'Donasi Uang'
        ]);
        Bansos::create([
            'name' => 'Donasi Pelatihan'
        ]);

        Role::create([
            'name' => 'Developer'
        ]);
        Role::create([
            'name' => 'Admin'
        ]);
        Role::create([
            'name' => 'Donatur'
        ]);
        Role::create([
            'name' => 'Relawan'
        ]);
        

    }
}
