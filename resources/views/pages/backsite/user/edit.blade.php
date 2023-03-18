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
                        <form class="form form-horizontal" action="{{ route('user.update',[$user->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
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
                                        <label class="col-form-label">Username</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <input type="text" id="username" class="form-control" name="username"
                                            placeholder="johnwick" value="{{ $user->username ?? old('username') }}" />
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
                                        <label class="col-form-label">Type User</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <select class="form-select" id="basicSelect" name="type_user_id">
                                            @foreach ($type_users as $type_user)
                                                <option value="{{ $type_user->id }}"  @if ($user->type_user_id == $type_user->id) selected @endif>{{ $type_user->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-2 col-3">
                                        <label class="col-form-label">Role</label>
                                    </div>
                                    <div class="col-lg-10 col-9">
                                        <select class="form-select" id="basicSelect" name="role[]">
                                            @foreach ($roles as $id => $roles)
                                            <option value="{{ $id }}"
                                            {{ in_array($id, old('role', [])) || (isset($user) && $user->role->contains($id)) ? 'selected' : '' }}>
                                            {{ $roles }}</option>
                                        @endforeach

                                        </select>

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
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js') }}"></script>
    <script script script src="{{ url('https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js') }}"></script>

    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Seret dan jatuhkan file di sini atau klik',
            }
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor5'), {
                licenseKey: '',
                toolbar: {
                    items: [
                        'heading', '|',
                        'alignment', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                        'link', '|',
                        'bulletedList', 'numberedList', 'todoList',
                        '-', // break point
                        'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
                        'code', 'codeBlock', '|',
                        'insertTable', '|',
                        'outdent', 'indent', '|',
                        'blockQuote', '|',
                        'undo', 'redo'
                    ],
                }
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error(
                    'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                );
                console.warn('Build id: t94173qfk3d4-jfha1cexgplv');
                console.error(error);
            });
    </script>
@endpush
