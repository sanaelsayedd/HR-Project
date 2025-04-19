<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Artisan;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Make sure job_position_id=1 exists in job_positions before this
        $superAdminId = Str::uuid();

        // Insert Superadmin
        DB::table('users')->insert([
            'id' => $superAdminId,
            'username' => 'superadmin',
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'email' => 'superadmin@starter-kit.com',
            'email_verified_at' => now(),
            'PhoneNumber' => '01156873001',
            'job_position_id' => 1, // must exist
            'Manager_id' => $superAdminId,
            'password' => Hash::make('superadmin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Give superadmin shield permission
        Artisan::call('shield:super-admin', ['--user' => $superAdminId]);

        // Get valid job_position IDs
        $jobPositionIds = DB::table('job_positions')->pluck('id')->toArray();

        // Get other roles (not super admin)
        $roles = DB::table('roles')->where('name', '!=', 'super_admin')->get();

        $allUserIds = [$superAdminId]; // To assign managers randomly later

        foreach ($roles as $role) {
            for ($i = 0; $i < 10; $i++) {
                $userId = Str::uuid();
                $jobPositionId = $faker->randomElement($jobPositionIds);

                DB::table('users')->insert([
                    'id' => $userId,
                    'username' => $faker->unique()->userName,
                    'firstname' => $faker->firstName,
                    'lastname' => $faker->lastName,
                    'email' => $faker->unique()->safeEmail,
                    'email_verified_at' => now(),
                    'PhoneNumber' => $faker->phoneNumber,
                    'job_position_id' => $jobPositionId,
                    'Manager_id' => $userId, // FK to another user
                    'password' => Hash::make('password'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Assign role
                DB::table('model_has_roles')->insert([
                    'role_id' => $role->id,
                    'model_type' => 'App\Models\User',
                    'model_id' => $userId,
                ]);

                // Add this user to potential future managers
                $allUserIds[] = $userId;
            }
        }
    }
}
