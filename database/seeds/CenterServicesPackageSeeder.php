<?php

use Illuminate\Database\Seeder;
use App\Models\CenterServicesPackage;

class CenterServicesPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CenterServicesPackage::create([
            'name' => 'باقة 1',
            'attend_type' => 'offline',
            'doctor_type' => 'specialist',
            'package_value' => '2450',
            'sessions' => '7',
            'free_sessions' => '2',
            'package_content' => '	باقة أخصائي (حضوري)',
        ]);
        CenterServicesPackage::create([
            'name' => 'باقة 2',
            'attend_type' => 'offline',
            'doctor_type' => 'advisor',
            'package_value' => '4200',
            'sessions' => '7',
            'free_sessions' => '2',
            'package_content' => 'باقة استشاري (حضوري)',
        ]);
        CenterServicesPackage::create([
            'name' => 'باقة 3',
            'attend_type' => 'online',
            'doctor_type' => 'specialist',
            'package_value' => '1400',
            'sessions' => '4',
            'free_sessions' => '1',
            'package_content' => 'باقة أخصائي(أونلاين)',
        ]);
        CenterServicesPackage::create([
            'name' => 'باقة 4',
            'attend_type' => 'online',
            'doctor_type' => 'advisor',
            'package_value' => '2400',
            'sessions' => '4',
            'free_sessions' => '1',
            'package_content' => 'باقة استشاري (أونلاين)',
        ]);
    }
}
