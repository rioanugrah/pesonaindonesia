@extends('layouts.backend_new_2023.master')

@section('title')
    Profile - {{ $profile->name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <div>
                            <img src="{{ URL::asset('/assets/images/users/avatar-4.jpg') }}" alt="" class="avatar-lg rounded-circle img-thumbnail">
                        </div>
                        <h5 class="mt-3 mb-1">{{ $profile->name }}</h5>
                        <p class="text-muted">{{ $profile->roles->role }}</p>
                    </div>
                    <hr class="my-4">
                    <div class="text-muted">
                        <div class="table-responsive mt-4">
                            <div>
                                <p class="mb-1">Name :</p>
                                <h5 class="font-size-16"><input type="text" name="name" class="form-control" value="{{ $profile->name }}"></h5>
                            </div>
                            <div class="mt-4">
                                <p class="mb-1">E-mail :</p>
                                <h5 class="font-size-16">{{ $profile->email }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Devices</h4>
                    <ul class="activity-feed mb-0 ps-2">
                        <li class="feed-item">
                            <div class="feed-item-list">
                                <p class="text-muted mb-1">IP Address</p>
                                <h5 class="font-size-16">{{ $devices[0]['ip'] }}</h5>
                            </div>
                        </li>
                        <li class="feed-item">
                            <div class="feed-item-list">
                                <p class="text-muted mb-1">Devices</p>
                                <h5 class="font-size-16">{{ $devices[0]['device'] }}</h5>
                            </div>
                        </li>
                        <li class="feed-item">
                            <div class="feed-item-list">
                                <p class="text-muted mb-1">Useragent</p>
                                <h5 class="font-size-16">{{ $devices[0]['useragent'] }}</h5>
                            </div>
                        </li>
                        <li class="feed-item">
                            <div class="feed-item-list">
                                <p class="text-muted mb-1">Operating System</p>
                                <h5 class="font-size-16">{{ $devices[0]['platform'] }}</h5>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection