@extends('layouts.dash')
@section('title', 'Edit User')
@section('content')
    @push('after-styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
            integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('/backsite/assets/extensions/choices.js/public/assets/styles/choices.css') }}" />
        \
        <link rel="icon" type="image/png" href="https://c.cksource.com/a/1/logos/ckeditor5.png">
        <style>
            .ck-editor__editable {
                min-height: 200px;
                margin-bottom: 10px;
            }
        </style>
    @endpush
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last mb-5">
                    <h3>Edit User</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit User
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit User</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <form class="form form-horizontal" action="{{ route('UpdateSettingAccount')}}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                              <div class="row mb-4">
                                <div class="col-md-2">
                                    @if ($user->profile_photo_path != null)
                                    <img class="img-preview" src="{{url(Storage::url($user->profile_photo_path))}}" alt="Photo User" style="max-width: 100px; max-height:100px;">
                                    @else
                                    <img class="img-preview" src="{{asset('/backsite/assets/images/profile.webp')  }}" alt="Photo User" style="max-width: 100px; max-height:100px;">
                                    @endif
                                </div>
                                <div class="col-md-10">
                                      <label for="upload" class="form-label">Upload Photo</label>
                                      <input type="file" class="form-control" id="upload"
                                                                name="profile_photo_path" onchange="previewImage()">
                                </div>
                              </div>
                              
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label">Name</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <input type="text" id="name" class="form-control" name="name"
                                            placeholder="Name" value="{{ $user->name ?? old('name') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label">Email</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <input type="text" id="email" class="form-control" name="email"
                                            placeholder="example@gmail.com" value="{{ $user->email ?? old('email') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label">Current Password</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <input type="password" class="form-control"
                                                            placeholder="New Password" 
                                                            name="current_password" id="current_password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label">New Password</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <input type="password" class="form-control"
                                                            placeholder="New Password" 
                                                            name="new_password" id="new_password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label">Confirmation New Password</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <input type="password" class="form-control"
                                                            placeholder="Confirmation New Password" 
                                                            name="confirmation_password" id="confirmation_password">
                                    </div>
                                </div>
                            </div>




                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    Submit
                                </button>
                                <a href="{{ route('post.index') }}" class="btn btn-light-secondary me-1 mb-1">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
@push('after-scripts')
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        const oFReader = new FileReader();
        oFReader.readAsDataURL(photo.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
    <script src="{{ asset('/backsite/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('/backsite/assets/js/pages/form-element-select.js') }}"></script>
@endpush
