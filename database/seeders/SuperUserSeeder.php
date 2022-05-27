<?php

namespace Database\Seeders;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function run()
    {

        $new_user = User::query()->where('mobile',config('settings.default_user.mobile'))->first() ?? (new CreateNewUser())->create([
            'name' => config('settings.default_user.name'),
            'mobile' => config('settings.default_user.mobile'),
            'password' => config('settings.default_user.password'),
            'password_confirmation' => config('settings.default_user.password')
        ]);

        $super_user_role = Role::query()->updateOrCreate(
            ['name' => 'super-user'],
            [
                'slug' => 'مدیرکل'
            ]
        );

        $new_user->assignRole($super_user_role);
    }
}
