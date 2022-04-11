<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $i = 1;
        $permissions = [
            [
                'id' => $i++,
                'title' => 'user_management_access',
            ],
            [
                'id' => $i++,
                'title' => 'permission_create',
            ],
            [
                'id' => $i++,
                'title' => 'permission_edit',
            ],
            [
                'id' => $i++,
                'title' => 'permission_show',
            ],
            [
                'id' => $i++,
                'title' => 'permission_delete',
            ],
            [
                'id' => $i++,
                'title' => 'permission_access',
            ],
            [
                'id' => $i++,
                'title' => 'role_create',
            ],
            [
                'id' => $i++,
                'title' => 'role_edit',
            ],
            [
                'id' => $i++,
                'title' => 'role_show',
            ],
            [
                'id' => $i++,
                'title' => 'role_delete',
            ],
            [
                'id' => $i++,
                'title' => 'role_access',
            ],
            [
                'id' => $i++,
                'title' => 'user_create',
            ],
            [
                'id' => $i++,
                'title' => 'user_edit',
            ],
            [
                'id' => $i++,
                'title' => 'user_show',
            ],
            [
                'id' => $i++,
                'title' => 'user_delete',
            ],
            [
                'id' => $i++,
                'title' => 'user_access',
            ],
            [
                'id' => $i++,
                'title' => 'user_alert_create',
            ],
            [
                'id' => $i++,
                'title' => 'user_alert_show',
            ],
            [
                'id' => $i++,
                'title' => 'user_alert_delete',
            ],
            [
                'id' => $i++,
                'title' => 'user_alert_access',
            ],
            [
                'id' => $i++,
                'title' => 'audit_log_show',
            ],
            [
                'id' => $i++,
                'title' => 'audit_log_access',
            ],
            [
                'id' => $i++,
                'title' => 'specialization_create',
            ],
            [
                'id' => $i++,
                'title' => 'specialization_edit',
            ],
            [
                'id' => $i++,
                'title' => 'specialization_show',
            ],
            [
                'id' => $i++,
                'title' => 'specialization_delete',
            ],
            [
                'id' => $i++,
                'title' => 'specialization_access',
            ],
            [
                'id' => $i++,
                'title' => 'center_access',
            ],
            [
                'id' => $i++,
                'title' => 'clinic_create',
            ],
            [
                'id' => $i++,
                'title' => 'clinic_edit',
            ],
            [
                'id' => $i++,
                'title' => 'clinic_show',
            ],
            [
                'id' => $i++,
                'title' => 'clinic_delete',
            ],
            [
                'id' => $i++,
                'title' => 'clinic_access',
            ],
            [
                'id' => $i++,
                'title' => 'center_service_create',
            ],
            [
                'id' => $i++,
                'title' => 'center_service_edit',
            ],
            [
                'id' => $i++,
                'title' => 'center_service_show',
            ],
            [
                'id' => $i++,
                'title' => 'center_service_delete',
            ],
            [
                'id' => $i++,
                'title' => 'center_service_access',
            ],
            [
                'id' => $i++,
                'title' => 'contract_access',
            ],
            [
                'id' => $i++,
                'title' => 'salary_contract_create',
            ],
            [
                'id' => $i++,
                'title' => 'salary_contract_edit',
            ],
            [
                'id' => $i++,
                'title' => 'salary_contract_show',
            ],
            [
                'id' => $i++,
                'title' => 'salary_contract_delete',
            ],
            [
                'id' => $i++,
                'title' => 'salary_contract_access',
            ],
            [
                'id' => $i++,
                'title' => 'precentage_contract_create',
            ],
            [
                'id' => $i++,
                'title' => 'precentage_contract_edit',
            ],
            [
                'id' => $i++,
                'title' => 'precentage_contract_show',
            ],
            [
                'id' => $i++,
                'title' => 'precentage_contract_delete',
            ],
            [
                'id' => $i++,
                'title' => 'precentage_contract_access',
            ],
            [
                'id' => $i++,
                'title' => 'group_create',
            ],
            [
                'id' => $i++,
                'title' => 'group_edit',
            ],
            [
                'id' => $i++,
                'title' => 'group_show',
            ],
            [
                'id' => $i++,
                'title' => 'group_delete',
            ],
            [
                'id' => $i++,
                'title' => 'group_access',
            ],
            [
                'id' => $i++,
                'title' => 'center_services_package_create',
            ],
            [
                'id' => $i++,
                'title' => 'center_services_package_edit',
            ],
            [
                'id' => $i++,
                'title' => 'center_services_package_show',
            ],
            [
                'id' => $i++,
                'title' => 'center_services_package_delete',
            ],
            [
                'id' => $i++,
                'title' => 'center_services_package_access',
            ],
            [
                'id' => $i++,
                'title' => 'allowance_create',
            ],
            [
                'id' => $i++,
                'title' => 'allowance_edit',
            ],
            [
                'id' => $i++,
                'title' => 'allowance_show',
            ],
            [
                'id' => $i++,
                'title' => 'allowance_delete',
            ],
            [
                'id' => $i++,
                'title' => 'allowance_access',
            ],
            [
                'id' => $i++,
                'title' => 'reservation_create',
            ],
            [
                'id' => $i++,
                'title' => 'reservation_edit',
            ],
            [
                'id' => $i++,
                'title' => 'reservation_show',
            ],
            [
                'id' => $i++,
                'title' => 'reservation_delete',
            ],
            [
                'id' => $i++,
                'title' => 'reservation_access',
            ],
            [
                'id' => $i++,
                'title' => 'doctor_create',
            ],
            [
                'id' => $i++,
                'title' => 'doctor_edit',
            ],
            [
                'id' => $i++,
                'title' => 'doctor_show',
            ],
            [
                'id' => $i++,
                'title' => 'doctor_delete',
            ],
            [
                'id' => $i++,
                'title' => 'doctor_access',
            ],
            [
                'id' => $i++,
                'title' => 'patient_create',
            ],
            [
                'id' => $i++,
                'title' => 'patient_edit',
            ],
            [
                'id' => $i++,
                'title' => 'patient_show',
            ],
            [
                'id' => $i++,
                'title' => 'patient_delete',
            ],
            [
                'id' => $i++,
                'title' => 'patient_access',
            ],
            [
                'id' => $i++,
                'title' => 'student_create',
            ],
            [
                'id' => $i++,
                'title' => 'student_edit',
            ],
            [
                'id' => $i++,
                'title' => 'student_show',
            ],
            [
                'id' => $i++,
                'title' => 'student_delete',
            ],
            [
                'id' => $i++,
                'title' => 'student_access',
            ],
            [
                'id' => $i++,
                'title' => 'dawrat_access',
            ],
            [
                'id' => $i++,
                'title' => 'general_setting_access',
            ],
            [
                'id' => $i++,
                'title' => 'activate_create',
            ],
            [
                'id' => $i++,
                'title' => 'activate_edit',
            ],
            [
                'id' => $i++,
                'title' => 'activate_show',
            ],
            [
                'id' => $i++,
                'title' => 'activate_delete',
            ],
            [
                'id' => $i++,
                'title' => 'activate_access',
            ],
            [
                'id' => $i++,
                'title' => 'contactu_create',
            ],
            [
                'id' => $i++,
                'title' => 'contactu_edit',
            ],
            [
                'id' => $i++,
                'title' => 'contactu_show',
            ],
            [
                'id' => $i++,
                'title' => 'contactu_delete',
            ],
            [
                'id' => $i++,
                'title' => 'contactu_access',
            ],
            [
                'id' => $i++,
                'title' => 'setting_create',
            ],
            [
                'id' => $i++,
                'title' => 'setting_edit',
            ],
            [
                'id' => $i++,
                'title' => 'setting_show',
            ],
            [
                'id' => $i++,
                'title' => 'setting_delete',
            ],
            [
                'id' => $i++,
                'title' => 'setting_access',
            ],
            [
                'id' => $i++,
                'title' => 'advice_create',
            ],
            [
                'id' => $i++,
                'title' => 'advice_edit',
            ],
            [
                'id' => $i++,
                'title' => 'advice_show',
            ],
            [
                'id' => $i++,
                'title' => 'advice_delete',
            ],
            [
                'id' => $i++,
                'title' => 'advice_access',
            ],
            [
                'id' => $i++,
                'title' => 'expense_management_access',
            ],
            [
                'id' => $i++,
                'title' => 'expense_category_create',
            ],
            [
                'id' => $i++,
                'title' => 'expense_category_edit',
            ],
            [
                'id' => $i++,
                'title' => 'expense_category_show',
            ],
            [
                'id' => $i++,
                'title' => 'expense_category_delete',
            ],
            [
                'id' => $i++,
                'title' => 'expense_category_access',
            ],
            [
                'id' => $i++,
                'title' => 'income_category_create',
            ],
            [
                'id' => $i++,
                'title' => 'income_category_edit',
            ],
            [
                'id' => $i++,
                'title' => 'income_category_show',
            ],
            [
                'id' => $i++,
                'title' => 'income_category_delete',
            ],
            [
                'id' => $i++,
                'title' => 'income_category_access',
            ],
            [
                'id' => $i++,
                'title' => 'expense_create',
            ],
            [
                'id' => $i++,
                'title' => 'expense_edit',
            ],
            [
                'id' => $i++,
                'title' => 'expense_show',
            ],
            [
                'id' => $i++,
                'title' => 'expense_delete',
            ],
            [
                'id' => $i++,
                'title' => 'expense_access',
            ],
            [
                'id' => $i++,
                'title' => 'income_create',
            ],
            [
                'id' => $i++,
                'title' => 'income_edit',
            ],
            [
                'id' => $i++,
                'title' => 'income_show',
            ],
            [
                'id' => $i++,
                'title' => 'income_delete',
            ],
            [
                'id' => $i++,
                'title' => 'income_access',
            ],
            [
                'id' => $i++,
                'title' => 'expense_report_create',
            ],
            [
                'id' => $i++,
                'title' => 'expense_report_edit',
            ],
            [
                'id' => $i++,
                'title' => 'expense_report_show',
            ],
            [
                'id' => $i++,
                'title' => 'expense_report_delete',
            ],
            [
                'id' => $i++,
                'title' => 'expense_report_access',
            ],
            [
                'id' => $i++,
                'title' => 'profile_password_edit',
            ],
            [
                'id' => $i++,
                'title' => 'blog_create',
            ],
            [
                'id' => $i++,
                'title' => 'blog_edit',
            ],
            [
                'id' => $i++,
                'title' => 'blog_show',
            ],
            [
                'id' => $i++,
                'title' => 'blog_delete',
            ],
            [
                'id' => $i++,
                'title' => 'blog_access',
            ],
            [
                'id' => $i++,
                'title' => 'service_create',
            ],
            [
                'id' => $i++,
                'title' => 'service_edit',
            ],
            [
                'id' => $i++,
                'title' => 'service_show',
            ],
            [
                'id' => $i++,
                'title' => 'service_delete',
            ],
            [
                'id' => $i++,
                'title' => 'service_access',
            ],
            [
                'id' => $i++,
                'title' => 'payment_store',
            ],
            [
                'id' => $i++,
                'title' => 'payment_edit',
            ],
            [
                'id' => $i++,
                'title' => 'payment_delete',
            ],
            [
                'id' => $i++,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'types_of_degree_create',
            ],
            [
                'id'    => $i++,
                'title' => 'types_of_degree_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'types_of_degree_show',
            ],
            [
                'id'    => $i++,
                'title' => 'types_of_degree_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'types_of_degree_access',
            ],
            [
                'id'    =>$i++,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
