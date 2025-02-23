<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'admin'],
            ['name' => 'membre']
        ];

        foreach ($roles as $role) {
            // Modification ici : Utiliser firstOrCreate pour éviter les doublons
            Role::firstOrCreate(
                ['name' => $role['name']], // Colonne à vérifier
                $role // Données à créer si inexistant
            );
        }
    }
}

