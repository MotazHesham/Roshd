<?php

return [
    'userManagement' => [
        'title'          => 'إدارة المستخدمين',
        'title_singular' => 'إدارة المستخدمين',
    ],
    'permission' => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'المجموعات',
        'title_singular' => 'مجموعة',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'الأسم',
            'name_helper'              => ' ',
            'email'                    => 'البريد الإلكترونى',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'كلمة المرور',
            'password_helper'          => ' ',
            'roles'                    => 'الأدوار',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'phone'                    => 'الجوال',
            'phone_helper'             => ' ',
            'user_type'                => 'نوع المستخدم',
            'user_type_helper'         => ' ',
            'package'                  => 'الباقات',
            'package_helper'           => ' ',
            'photo'                  => 'الصورة',
            'photo_helper'           => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'تنبيهات المستخدم',
        'title_singular' => 'تنبيهات المستخدم',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'specialization' => [
        'title'          => 'التخصصات',
        'title_singular' => 'التخصصات',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'اسم التخصص',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'center' => [
        'title'          => 'إدارة المركز',
        'title_singular' => 'إدارة المركز',
    ],
    'clinic' => [
        'title'          => 'العيادات',
        'title_singular' => 'العيادات',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'clinic_number'         => 'رقم العيادة',
            'clinic_number_helper'  => ' ',
            'clinic_name'           => 'اسم العيادة',
            'clinic_name_helper'    => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'specialization'        => 'التخصصات',
            'specialization_helper' => ' ',
        ],
    ],
    'centerService' => [
        'title'          => 'خدمات المركز',
        'title_singular' => 'خدمات المركز',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'اسم الخدمة',
            'name_helper'       => ' ',
            'price'             => 'تكلفة الخدمة',
            'price_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contract' => [
        'title'          => 'العقود',
        'title_singular' => 'العقود',
    ],
    'salaryContract' => [
        'title'          => 'عقد العمل  (بالمرتب)',
        'title_singular' => 'عقد العمل  (بالمرتب)',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'contract_number'        => 'رقم العقد',
            'contract_number_helper' => ' ',
            'date'                   => 'تاريخ العقد',
            'date_helper'            => ' ',
            'duration'               => 'مدة العقد',
            'duration_helper'        => ' ',
            'work_hours'             => 'ساعات العمل',
            'work_hours_helper'      => ' ',
            'mechanism'              => 'آلية العمل',
            'mechanism_helper'       => ' ',
            'salary'                 => 'المرتب',
            'salary_helper'          => ' ',
           'extra_salary'          =>'قيمة البدلات الزائدة',
           'extra_salary_helper'          => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'doctor'                 => 'الأستشاري',
            'doctor_helper'          => ' ',
            'allowance'              => 'البدلات',
            'allowance_helper'       => ' ',
        ],
    ],
    'precentageContract' => [
        'title'          => 'عقد العمل (بالنسبة)',
        'title_singular' => 'عقد العمل (بالنسبة)',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'percentage'        => 'نسبة المركز',
            'percentage_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'doctor'            => 'الأستشاري',
            'doctor_helper'     => ' ',
        ],
    ],
    'group' => [
        'title'          => 'الدورات التدريبية',
        'title_singular' => 'دورة تدريبية',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'title'              => 'اسم الدورة',
            'title_helper'       => ' ',
            'start_date'          => 'تاريخ بداية الدورة',
            'start_date_helper'   => ' ',
            'end_date'            => 'تاريخ انتهاء الدورة',
            'end_date_helper'     => ' ',
            'course_hours'        => 'عدد ساعات الدورة',
            'course_hours_helper' => ' ',
            'course_cost'         => 'رسوم الدورة',
            'course_cost_helper'  => ' ',
            'status'              => 'حالة الدورة',
            'status_helper'       => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'user'                => 'مشرف المجموعة',
            'user_helper'         => ' ',
            'students'            => 'الطالبات',
            'students_helper'     => ' ',
            'student'            => 'طالب',
            'student_helper'     => ' ',
            'photo'               => 'صورة',
            'photo_helper'        => ' ',
            'date'               => 'التاريخ',
            'date_helper'        => ' ',
            'description'         => 'وصف',
            'description_helper'  => ' ',
            'transfer_name'             => 'اسم المحول',
            'transfer_name_helper'      => ' ',
            'reference_number'             => 'الرقم المرجعي',
            'reference_number_helper'      => ' ',
            'payment_type'             => 'نوع السداد',
            'payment_type_helper'      => ' ',
            'payment_status'             => 'حالة السداد',
            'payment_status_helper'      => ' ',
        ],
    ],
    'centerServicesPackage' => [
        'title'          => 'باقات المركز',
        'title_singular' => 'باقات المركز',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'name'                   => 'اسم الباقة',
            'name_helper'            => ' ',
            'package_content'        => 'محتوى الباقة',
            'package_content_helper' => ' ',
            'start_date'             => 'وقت بدأ التفعيل',
            'start_date_helper'      => ' ',
            'end_date'               => 'وقت الانتهاء',
            'end_date_helper'        => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'package_value'          => 'رسوم الباقة',
            'package_value_helper'   => ' ',
            'transfer_name'             => 'اسم المحول',
            'transfer_name_helper'      => ' ',
            'reference_number'             => 'الرقم المرجعي',
            'reference_number_helper'      => ' ',
            'payment_type'             => 'نوع السداد',
            'payment_type_helper'      => ' ',
            'payment_status'             => 'حالة السداد',
            'payment_status_helper'      => ' ',
        ],
    ],
    'allowance' => [
        'title'          => 'البدلات',
        'title_singular' => 'البدلات',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'نوع البدل',
            'name_helper'       => ' ',
            'value'             => 'قيمة البدل',
            'value_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'reservation' => [
        'title'          => 'الحجوزات',
        'title_singular' => 'حجز',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'reservation_date'        => 'تاريخ الحجز',
            'reservation_date_helper' => ' ',
            'statuse'                 => 'حالة الحجز',
            'statuse_helper'          => ' ',
            'delay_date'              => 'تاريخ التأجيل',
            'delay_date_helper'       => ' ',
            'cancel_reason'           => 'سبب الإلغاء',
            'cancel_reason_helper'    => ' ',
            'cost'                    => 'رسوم الكشف',
            'cost_helper'             => ' ',
            'condation'               => 'التشخيص',
            'condation_helper'        => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'user'                    => 'المراجع',
            'user_helper'             => ' ',
            'doctor'                  => 'الأستشاري',
            'doctor_helper'           => ' ',
            'clinic'                  => 'العيادة',
            'clinic_helper'           => ' ',
            'notes'                   => 'ملاحظات إضافية',
            'notes_helper'            => ' ',
            'payment_status'          => 'حالة الدفع',
            'payment_status_helper'   => ' ',
            'payment_type'             => 'نوع السداد',
            'payment_type_helper'     => ' ',
            'transfer_name'           => 'اسم المحول',
            'transfer_name_helper'    => ' ',
            'reference_number'        => 'الرقم المرجعي',
            'reference_number_helper' => ' ',  
        ],
    ],
    'doctor' => [
        'title'          => 'الأستشارين',
        'title_singular' => 'الأستشارين',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'years_experience'        => 'سنوات الخبرة',
            'years_experience_helper' => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'user'                    => 'المستخدم',
            'user_helper'             => ' ',
            'specialization'          => 'التخصص',
            'specialization_helper'   => ' ',
            'start_time'              => 'موعد بدء العيادة',
            'start_time_helper'       => ' ',
            'end_time'                => 'موعد انتهاء العيادة',
            'end_time_helper'         => ' ',
            'clinic'                  => 'العيادة',
            'clinic_helper'           => ' ',
            'work_days'               => 'أيام العمل',
            'work_days_helper'        => ' ',
            'cost'               => 'حساب الكشف',
            'cost_helper'        => ' ',
        ],
    ],
    'editor' => [
        'title'          => 'editor',
        'title_singular' => 'editor',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'city'              => 'المدينه',
            'city_helper'       => ' ',
            'work'              => 'العمل',
            'work_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'user'              => 'المستخدم',
            'user_helper'       => ' ',
        ],
    ],
    'student' => [
        'title'          => 'الطالبات',
        'title_singular' => 'الطالبات',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'hours'                 => 'عدد الساعات',
            'hours_helper'          => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'specialization'        => 'التخصص',
            'specialization_helper' => ' ',
            'user'                  => 'الطالب',
            'user_helper'           => ' ',
            'group'                  => 'مجموعة',
            'group_helper'           => ' ',
            'group_status'                  => 'الحالة',
            'group_status_helper'           => ' ',
        ],
    ],
    'dawrat' => [
        'title'          => 'الدورات',
        'title_singular' => 'الدورات',
    ],
    'generalSetting' => [
        'title'          => 'الأعدادات العامة',
        'title_singular' => 'الأعدادات العامة',
    ],
    'experience' => [
        'title'          => 'الخبرات السابقة',
        'title_singular' => 'الخبرات السابقة',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'work_place'         => 'مكان العمل',
            'work_place_helper'  => ' ',
            'description'        => 'وصف الوظيفة',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'job_title'          => 'المسمي الوظيفي',
            'job_title_helper'   => ' ',
            'doctor'             => 'الأستشاري',
            'doctor_helper'      => ' ',
            'start_date'          => 'تاريخ بدء الوظيفة',
            'start_date_helper'   => ' ',
            'end_date'           => 'تاريخ الانتهاء من الوظيفة',
            'end_date_helper'    => ' ',
        ],
    ],
    'doctorInformation' => [
        'title'          => 'معلومات الأستشاريين',
        'title_singular' => 'معلومات الأستشاريين',
    ],
    'education' => [
        'title'          => 'الدرجة العلمية',
        'title_singular' => 'الدرجة العلمية',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'الدرجة العلمية',
            'name_helper'       => ' ',
            'start_date'        => 'تاريخ بدء الدراسة',
            'start_date_helper' => ' ',
            'end_date'          => 'تاريخ انتهاء الدراسة',
            'end_date_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'doctor'            => 'الأستشاري',
            'doctor_helper'     => ' ',
        ],
    ],
    'activate' => [
        'title'          => 'نشاطات المركز',
        'title_singular' => 'نشاطات المركز',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'عنوان النشاط',
            'title_helper'       => ' ',
            'date'               => 'تاريخ النشاط',
            'date_helper'        => ' ',
            'description'        => 'وصف النشاط',
            'description_helper' => ' ',
            'photo'              => 'صورة النشاط',
            'photo_helper'       => ' ',
            'video'              => 'فيديو النشاط',
            'video_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'images'             => 'صور النشاط',
            'images_helper'      => ' ',
        ],
    ],
    'contactu' => [
        'title'          => 'تواصل معنا',
        'title_singular' => 'تواصل معنا',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'email'             => 'البريد الإلكتروني',
            'email_helper'      => ' ',
            'message'           => 'الرسالة',
            'message_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'phone'             => 'الجوال',
            'phone_helper'      => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'اعدادت الموقع',
        'title_singular' => 'اعدادت الموقع',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'site_name'                 => 'اسم الموقع',
            'site_name_helper'          => ' ',
            'email'                 => 'البريد الألكتروني',
            'email_helper'          => ' ',
            'phone'                     => 'رقم الجوال',
            'phone_helper'              => ' ',
            'address'                   => 'عنوان المركز',
            'address_helper'            => ' ',
            'logo'                      => 'الشعار',
            'logo_helper'               => ' ',
            'facebook'                  => 'رابط الفيسبوك',
            'facebook_helper'           => ' ',
            'twitter'                   => 'رابط تويتر',
            'twitter_helper'            => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'instagram'                 => 'رابط الانستغرام',
            'instagram_helper'          => ' ',
            'you_tube'                  => 'رابط اليوتيوب',
            'you_tube_helper'           => ' ',
            'about_rosd'                => 'عن رشد',
            'about_rosd_helper'         => ' ',
            'familly_advice'            => 'الاستشارات الأسرية',
            'familly_advice_helper'     => ' ',
            'individual_advice'         => 'الاستشارات الفردية',
            'individual_advice_helper'  => ' ',
            'el_gadaly_elsloky'         => 'علاج الجدلي السلوكي',
            'el_gadaly_elsloky_helper'  => ' ',
            'el_maarefe_elsloky'        => 'علاج المعرفي السلوكي',
            'el_maarefe_elsloky_helper' => ' ',
            'art_therapy'               => 'العلاج بالفن',
            'art_therapy_helper'        => ' ',
            'play_therapy'              => 'العلاج باللعب',
            'play_therapy_helper'       => ' ',
            'message'                   => 'رسالتنا',
            'message_helper'            => ' ',
            'vision'                    => 'رؤيتنا',
            'vision_helper'             => ' ',
            'services'                  => 'خدماتنا',
            'services_helper'           => ' ',
            'why'                       => 'لماذا رشد؟',
            'why_helper'                => ' ',
        ],
    ],
    'advice' => [
        'title'          => 'الاستشارات الطبية',
        'title_singular' => 'الاستشارات الطبية',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'الاسم',
            'name_helper'        => ' ',
            'email'              => 'البريد الإلكتروني',
            'email_helper'       => ' ',
            'advice_type'        => 'نوع الإستشارة',
            'advice_type_helper' => ' ',
            'description'        => 'نص الإستشارة',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'patients' => [
        'title'          => 'المراجعين',
        'title_singular' => 'مراجع',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'الأسم',
            'name_helper'              => ' ',
            'email'                    => 'البريد الإلكترونى',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'كلمة المرور',
            'password_helper'          => ' ',
            'roles'                    => 'الأدوار',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'phone'                    => 'الجوال',
            'phone_helper'             => ' ',
            'user_type'                => 'نوع المستخدم',
            'user_type_helper'         => ' ',
            'package'                  => 'الباقات',
            'package_helper'           => ' ',
        ],
    ],
    'expenseManagement' => [
        'title'          => 'المصاريف',
        'title_singular' => 'المصاريف',
    ],
    'expenseCategory' => [
        'title'          => 'تصنيف النفقات',
        'title_singular' => 'تصنيف المصاريف',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'incomeCategory' => [
        'title'          => 'تصنيفات الإيراد',
        'title_singular' => 'الإيراد حسب التصنيف',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'التصنيف',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'expense' => [
        'title'          => 'المصروفات',
        'title_singular' => 'المصروف',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'expense_category'        => 'التصنيف',
            'expense_category_helper' => ' ',
            'entry_date'              => 'تاريخ الأضافة',
            'entry_date_helper'       => ' ',
            'amount'                  => 'التكلفة',
            'amount_helper'           => ' ',
            'description'             => 'الوصف',
            'description_helper'      => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated At',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted At',
            'deleted_at_helper'       => ' ',
            'receipt_photo'           => 'صورة الفاتورة',
            'receipt_photo_helper'    => ' ',
        ],
    ],
    'income' => [
        'title'          => 'الإيرادات',
        'title_singular' => 'الإيرادات',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'income_category'        => 'التصنيف',
            'income_category_helper' => ' ',
            'entry_date'              => 'تاريخ الأضافة',
            'entry_date_helper'      => ' ',
            'amount'                  => 'التكلفة',
            'amount_helper'          => ' ',
            'description'             => 'الوصف',
            'description_helper'     => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => ' ',
            'receipt_photo'           => 'صورة الفاتورة',
            'receipt_photo_helper'   => ' ',
        ],
    ],
    'expenseReport' => [
        'title'          => 'تقرير شهري',
        'title_singular' => 'تقرير شهري',
        'reports'        => [
            'title'             => 'التقارير',
            'title_singular'    => 'تقرير',
            'incomeReport'      => 'تقرير الإيرادات',
            'incomeByCategory'  => 'الإيراد حسب التصنيف',
            'expenseByCategory' => 'المصروف حسب التصنيف',
            'income'            => 'الإيرادات',
            'expense'           => 'المصروف',
            'profit'            => 'ربح',
        ],
    ],
    'blog' => [
        'title'          => 'مدونه',
        'title_singular' => 'مدونه',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'video'              => 'الفيديو',
            'video_helper'       => ' ',
            'description'        => 'وصف الفيديو',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'service' => [
        'title'          => 'خدماتنا',
        'title_singular' => 'خدماتنا',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'اسم الخدمة',
            'name_helper'        => ' ',
            'description'        => 'نص الخدمة',
            'description_helper' => ' ',
            'photo'              => 'صورة',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
];

