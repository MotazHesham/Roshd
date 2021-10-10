<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 21,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 22,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 23,
                'title' => 'specialization_create',
            ],
            [
                'id'    => 24,
                'title' => 'specialization_edit',
            ],
            [
                'id'    => 25,
                'title' => 'specialization_show',
            ],
            [
                'id'    => 26,
                'title' => 'specialization_delete',
            ],
            [
                'id'    => 27,
                'title' => 'specialization_access',
            ],
            [
                'id'    => 28,
                'title' => 'center_access',
            ],
            [
                'id'    => 29,
                'title' => 'clinic_create',
            ],
            [
                'id'    => 30,
                'title' => 'clinic_edit',
            ],
            [
                'id'    => 31,
                'title' => 'clinic_show',
            ],
            [
                'id'    => 32,
                'title' => 'clinic_delete',
            ],
            [
                'id'    => 33,
                'title' => 'clinic_access',
            ],
            [
                'id'    => 34,
                'title' => 'center_service_create',
            ],
            [
                'id'    => 35,
                'title' => 'center_service_edit',
            ],
            [
                'id'    => 36,
                'title' => 'center_service_show',
            ],
            [
                'id'    => 37,
                'title' => 'center_service_delete',
            ],
            [
                'id'    => 38,
                'title' => 'center_service_access',
            ],
            [
                'id'    => 39,
                'title' => 'contract_access',
            ],
            [
                'id'    => 40,
                'title' => 'salary_contract_create',
            ],
            [
                'id'    => 41,
                'title' => 'salary_contract_edit',
            ],
            [
                'id'    => 42,
                'title' => 'salary_contract_show',
            ],
            [
                'id'    => 43,
                'title' => 'salary_contract_delete',
            ],
            [
                'id'    => 44,
                'title' => 'salary_contract_access',
            ],
            [
                'id'    => 45,
                'title' => 'precentage_contract_create',
            ],
            [
                'id'    => 46,
                'title' => 'precentage_contract_edit',
            ],
            [
                'id'    => 47,
                'title' => 'precentage_contract_show',
            ],
            [
                'id'    => 48,
                'title' => 'precentage_contract_delete',
            ],
            [
                'id'    => 49,
                'title' => 'precentage_contract_access',
            ],
            [
                'id'    => 50,
                'title' => 'group_create',
            ],
            [
                'id'    => 51,
                'title' => 'group_edit',
            ],
            [
                'id'    => 52,
                'title' => 'group_show',
            ],
            [
                'id'    => 53,
                'title' => 'group_delete',
            ],
            [
                'id'    => 54,
                'title' => 'group_access',
            ],
            [
                'id'    => 55,
                'title' => 'center_services_package_create',
            ],
            [
                'id'    => 56,
                'title' => 'center_services_package_edit',
            ],
            [
                'id'    => 57,
                'title' => 'center_services_package_show',
            ],
            [
                'id'    => 58,
                'title' => 'center_services_package_delete',
            ],
            [
                'id'    => 59,
                'title' => 'center_services_package_access',
            ],
            [
                'id'    => 60,
                'title' => 'allowance_create',
            ],
            [
                'id'    => 61,
                'title' => 'allowance_edit',
            ],
            [
                'id'    => 62,
                'title' => 'allowance_show',
            ],
            [
                'id'    => 63,
                'title' => 'allowance_delete',
            ],
            [
                'id'    => 64,
                'title' => 'allowance_access',
            ],
            [
                'id'    => 65,
                'title' => 'reservation_create',
            ],
            [
                'id'    => 66,
                'title' => 'reservation_edit',
            ],
            [
                'id'    => 67,
                'title' => 'reservation_show',
            ],
            [
                'id'    => 68,
                'title' => 'reservation_delete',
            ],
            [
                'id'    => 69,
                'title' => 'reservation_access',
            ],
            [
                'id'    => 70,
                'title' => 'doctor_create',
            ],
            [
                'id'    => 71,
                'title' => 'doctor_edit',
            ],
            [
                'id'    => 72,
                'title' => 'doctor_show',
            ],
            [
                'id'    => 73,
                'title' => 'doctor_delete',
            ],
            [
                'id'    => 74,
                'title' => 'doctor_access',
            ],
            [
                'id'    => 75,
                'title' => 'editor_create',
            ],
            [
                'id'    => 76,
                'title' => 'editor_edit',
            ],
            [
                'id'    => 77,
                'title' => 'editor_show',
            ],
            [
                'id'    => 78,
                'title' => 'editor_delete',
            ],
            [
                'id'    => 79,
                'title' => 'editor_access',
            ],
            [
                'id'    => 80,
                'title' => 'student_create',
            ],
            [
                'id'    => 81,
                'title' => 'student_edit',
            ],
            [
                'id'    => 82,
                'title' => 'student_show',
            ],
            [
                'id'    => 83,
                'title' => 'student_delete',
            ],
            [
                'id'    => 84,
                'title' => 'student_access',
            ],
            [
                'id'    => 85,
                'title' => 'dawrat_access',
            ],
            [
                'id'    => 86,
                'title' => 'general_setting_access',
            ],
            // [
            //     'id'    => 87,
            //     'title' => 'experience_create',
            // ],
            // [
            //     'id'    => 88,
            //     'title' => 'experience_edit',
            // ],
            // [
            //     'id'    => 89,
            //     'title' => 'experience_show',
            // ],
            // [
            //     'id'    => 90,
            //     'title' => 'experience_delete',
            // ],
            // [
            //     'id'    => 91,
            //     'title' => 'experience_access',
            // ],
            // [
            //     'id'    => 92,
            //     'title' => 'doctor_information_access',
            // ],
            // [
            //     'id'    => 93,
            //     'title' => 'education_create',
            // ],
            // [
            //     'id'    => 94,
            //     'title' => 'education_edit',
            // ],
            // [
            //     'id'    => 95,
            //     'title' => 'education_show',
            // ],
            // [
            //     'id'    => 96,
            //     'title' => 'education_delete',
            // ],
            // [
            //     'id'    => 97,
            //     'title' => 'education_access',
            // ],
            [
                'id'    => 98,
                'title' => 'activate_create',
            ],
            [
                'id'    => 99,
                'title' => 'activate_edit',
            ],
            [
                'id'    => 100,
                'title' => 'activate_show',
            ],
            [
                'id'    => 101,
                'title' => 'activate_delete',
            ],
            [
                'id'    => 102,
                'title' => 'activate_access',
            ],
            [
                'id'    => 103,
                'title' => 'contactu_create',
            ],
            [
                'id'    => 104,
                'title' => 'contactu_edit',
            ],
            [
                'id'    => 105,
                'title' => 'contactu_show',
            ],
            [
                'id'    => 106,
                'title' => 'contactu_delete',
            ],
            [
                'id'    => 107,
                'title' => 'contactu_access',
            ],
            [
                'id'    => 108,
                'title' => 'setting_create',
            ],
            [
                'id'    => 109,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 110,
                'title' => 'setting_show',
            ],
            [
                'id'    => 111,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 112,
                'title' => 'setting_access',
            ],
            [
                'id'    => 113,
                'title' => 'advice_create',
            ],
            [
                'id'    => 114,
                'title' => 'advice_edit',
            ],
            [
                'id'    => 115,
                'title' => 'advice_show',
            ],
            [
                'id'    => 116,
                'title' => 'advice_delete',
            ],
            [
                'id'    => 117,
                'title' => 'advice_access',
            ],
            [
                'id'    => 118,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
