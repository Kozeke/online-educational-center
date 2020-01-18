<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_administrator = Role::where('name', 'administrator')->first();
        $role_teacher = Role::where('name', 'teacher')->first();
        $role_student = Role::where('name', 'student')->first();

        $users=[[
            'name' => 'Administrator',
            'email' => 'metavice@gmail.com',
            'role_id' => $role_administrator->id,
            'password' => bcrypt('123456'),
            'phone' => '8 (777) 777 77 77',
            ],
            [
                'name' => 'Олег Евгеневич',
                'email' => 'oleg@gmail.com',
                'role_id' => $role_student->id,
                'password' => bcrypt('123456'),
                'phone' => '8 (777) 774 77 77',
            ],
            [
                'name' => 'Евгения Евгеневич',
                'email' => 'evgeni@gmail.com',
                'role_id' => $role_student->id,
                'password' => bcrypt('123456'),
                'phone' => '8 (777) 734 77 77',
            ],
            [
                'name' => 'Катерина Алексеевна',
                'email' => 'marinai@gmail.com',
                'role_id' => $role_teacher->id,
                'password' => bcrypt('123456'),
                'phone' => '8 (777) 734 37 77',
            ],
            [
                'name' => 'Марина Алексеевна',
                'email' => 'evni@gmail.com',
                'role_id' => $role_teacher->id,
                'password' => bcrypt('123456'),
                'phone' => '8 (737) 734 37 77',
            ]
            ];
            foreach($users as $user){
                User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role_id' => $user['role_id'],
                    'password' => $user['password'],
                    'phone' => $user['phone']
              ]
            );
            }
    }
}
