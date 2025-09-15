<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            [
                'user_id' => 2,
                'name_en' => 'Rejaul Karim',
                'name_bn' => 'রেজাউল করিম',
                'father_name_en' => 'Abdul Karim',
                'father_name_bn' => 'আবদুল করিম',
                'mother_name_en' => 'Fatema Begum',
                'mother_name_bn' => 'ফাতেমা বেগম',
                'spouse_name_en' => null,
                'spouse_name_bn' => null,
                'email' => 'rejaul@example.com',
                'mobile' => '01700000000',
                'birth_date' => '1995-05-10',
                'gender' => 'male',
                'marital_status' => 'single',

                // Current Address
                'current_division' => 'Dhaka',
                'current_district' => 'Dhaka',
                'current_upazila' => 'Savar',
                'current_union' => 'Tetuljhora',
                'current_ward' => 'Ward-3',
                'current_village' => 'Hemayetpur',
                'current_post_office' => 'Savar',
                'current_post_code' => '1340',
                'current_full_address' => 'Hemayetpur, Savar, Dhaka',

                // Permanent Address
                'permanent_division' => 'Dhaka',
                'permanent_district' => 'Dhaka',
                'permanent_upazila' => 'Savar',
                'permanent_union' => 'Tetuljhora',
                'permanent_ward' => 'Ward-3',
                'permanent_village' => 'Hemayetpur',
                'permanent_post_office' => 'Savar',
                'permanent_post_code' => '1340',
                'permanent_full_address' => 'Hemayetpur, Savar, Dhaka',
                'same_as_current' => true,

                // Documents
                'photo_path' => null,
                'nid_path' => null,

                // Status
                'status' => 'approved',
                'remarks' => 'Auto seeded demo profile',

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
