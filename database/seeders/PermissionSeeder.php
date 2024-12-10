<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
           [
               'id' => 1,
               'name' => 'educational.experience.index',
               'description' => 'Mostrar index de EE',
           ],
            [
               'id' => 2,
               'name' => 'educational.experience.create',
               'description' => 'Retornar vista create para EE',
           ],
            [
               'id' => 3,
               'name' => 'educational.experience.store',
               'description' => 'Guardar EE',
           ],
            [
               'id' => 4,
               'name' => 'educational.experience.show',
               'description' => 'Mostrar información de una EE',
           ],
            [
               'id' => 5,
               'name' => 'educational.experience.edit',
               'description' => 'Mostrar vista edit de una EE',
           ],
            [
               'id' => 6,
               'name' => 'educational.experience.update',
               'description' => 'Actualizar una EE',
           ],
            [
               'id' => 7,
               'name' => 'educational.experience.delete',
               'description' => 'Eliminar una EE',
           ],
        ]);
    }
}
