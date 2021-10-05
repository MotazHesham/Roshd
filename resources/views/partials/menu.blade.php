<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/editors*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('editor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.editors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/editors") || request()->is("admin/editors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-edit c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.editor.title') }}
                            </a>
                        </li>
                    @endcan
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route("admin.patients.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/patients") || request()->is("admin/patients/*") ? "c-active" : "" }}">
                            <i class="fa-fw fas fa-user-edit c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.patients.title') }}
                        </a>
                    </li>
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('center_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/clinics*") ? "c-show" : "" }} {{ request()->is("admin/reservations*") ? "c-show" : "" }} {{ request()->is("admin/center-services*") ? "c-show" : "" }} {{ request()->is("admin/center-services-packages*") ? "c-show" : "" }} {{ request()->is("admin/activates*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-hospital-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.center.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('clinic_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.clinics.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clinics") || request()->is("admin/clinics/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hospital c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.clinic.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('reservation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reservations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reservations") || request()->is("admin/reservations/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reservation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('center_service_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.center-services.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/center-services") || request()->is("admin/center-services/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hand-holding-heart c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.centerService.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('center_services_package_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.center-services-packages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/center-services-packages") || request()->is("admin/center-services-packages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cubes c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.centerServicesPackage.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('activate_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.activates.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/activates") || request()->is("admin/activates/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-grin-beam c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.activate.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('doctor_information_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/doctors*") ? "c-show" : "" }} {{ request()->is("admin/experiences*") ? "c-show" : "" }} {{ request()->is("admin/education*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user-md c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.doctorInformation.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('doctor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.doctors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/doctors") || request()->is("admin/doctors/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-md c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.doctor.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('experience_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.experiences.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/experiences") || request()->is("admin/experiences/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.experience.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('education_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.education.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/education") || request()->is("admin/education/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-graduation-cap c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.education.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('dawrat_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/students*") ? "c-show" : "" }} {{ request()->is("admin/groups*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.dawrat.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('student_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.students.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/students") || request()->is("admin/students/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-graduate c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.student.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('group_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.groups.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/groups") || request()->is("admin/groups/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.group.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('contract_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/salary-contracts*") ? "c-show" : "" }} {{ request()->is("admin/precentage-contracts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-file-signature c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contract.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('salary_contract_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.salary-contracts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/salary-contracts") || request()->is("admin/salary-contracts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-dollar-sign c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.salaryContract.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('precentage_contract_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.precentage-contracts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/precentage-contracts") || request()->is("admin/precentage-contracts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-percent c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.precentageContract.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('general_setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/specializations*") ? "c-show" : "" }} {{ request()->is("admin/allowances*") ? "c-show" : "" }} {{ request()->is("admin/contactus*") ? "c-show" : "" }} {{ request()->is("admin/settings*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.generalSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('specialization_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.specializations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/specializations") || request()->is("admin/specializations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-ellipsis-h c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.specialization.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('allowance_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.allowances.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/allowances") || request()->is("admin/allowances/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-history c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.allowance.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('contactu_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.contactus.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contactus") || request()->is("admin/contactus/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-phone c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contactu.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.setting.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('advice_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.advice.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/advice") || request()->is("admin/advice/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-handshake c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.advice.title') }}
                </a>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>