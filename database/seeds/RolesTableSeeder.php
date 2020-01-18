<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        $roles=[
            [
                'name' => 'administrator',
                'description' => 'Администратор',
                'instrumental' => 'для администратора'],
            [
                'name' => 'teacher',
                'description' => 'Учитель',
                'instrumental' => 'для учителя'],
            [
                'name' => 'student',
                'description' => 'студент',
                'instrumental' => 'для студента'
            ]
            ];
            foreach($roles as $role){
                Role::create([
                    'name' => $role['name'],
                    'description' => $role['description'],
                    'instrumental' => $role['instrumental']
              ]
            );
            }
        

    }
}
