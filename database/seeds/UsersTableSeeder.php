<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\User;

use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        
        
        $adminRole = Role::where('name','admin')->first();
        $clientRole = Role::where('name','client')->first();
        $userRole = Role::where('name','user')->first();
        
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
        
        $client = User::create([
            'name' => 'Client User',
            'email' => 'client@client.com',
            'password' => Hash::make('password')
        ]);
        
        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@auser.com',
            'password' => Hash::make('password')
        ]);
        
        $admin->roles()->attach($adminRole);
        $client->roles()->attach($clientRole);
        $user->roles()->attach($userRole);
    }
}
