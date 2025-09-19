@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold">Profile</h2>
    <div class="row">
        <div class="col-md-6">
            @include('profile.partials.update-profile-information-form')
            @include('profile.partials.update-password-form')
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection