@extends('layouts.frontend')

@section('content')
    <div class="  section container">
        <div class="container">
            <h3>باقات رشد</h3>
            <div class="row">
                @foreach($packages as $package)
                    <div class="col-md-4 mt-3">
                        <div class="card text-dark bg-light">
                            <div class="card-header bg-dark text-center text-light">
                                <h4>{{ $package->name }}</h4>
                            </div>
                            <div class="card-body ">
                                <h5 class="card-title">
                                    <?php echo nl2br($package->package_content ?? ''); ?>
                                </h5>
                                <!--Starting list group here -->
                                <div class="list-group">
                                    <a href="#"
                                        class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-primary">
                                        سعر الباقة
                                        <span class="badge bg-primary bg-pill">{{ $package->package_value }}</span>
                                    </a>
                                    <a href="#"
                                        class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-danger">
                                        نوع الحضور
                                        <span class="badge bg-primary bg-pill">{{ \App\Models\CenterServicesPackage::ATTEND_TYPE_RADIO[$package->attend_type]}}</span>
                                    </a>
                                    <a href="#"
                                        class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-success">
                                        نوع الباقة
                                        <span class="badge bg-primary bg-pill">{{ \App\Models\CenterServicesPackage::DOCTOR_TYPE_RADIO[$package->doctor_type]}}</span>
                                    </a>
                                    <a href="#"
                                        class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-info">
                                        عدد الجلسات
                                        <span class="badge bg-primary bg-pill">{{ $package->sessions }}</span>
                                    </a>
                                    <a href="#"
                                        class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary disabled">
                                        عدد الجلسات المجانية
                                        <span class="badge bg-primary bg-pill">{{ $package->free_sessions }}</span>
                                    </a>
                                </div>
                                <!--Ends here -->
                            </div>
                            <div class="card-footer bg-secondary border-danger text-right">
                                @auth
                                    <form action="{{route('frontend.packages_user.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{$package->id}}">
                                        <button type="submit" class="btn btn-info btn-lg text-white">اشتراك</button>
                                    </form>
                                @else
                                    <a href="{{ route('frontend.login')}}" class="btn btn-info btn-lg text-white">اشتراك</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
