@extends('layout.main')
@section('container')
@include('partials.navSidebar')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Form Edit User</h4>
                                    <form action="/admin/user/{{ $user->slug }}" method="post" id="EditUser">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="key_input" value="edit_user">
                                        <div class="col-12 mb-3">
                                            <label for="nik_name" class="form-label">NIK & Nama Karyawan</label>
                                            <input type="text" class="form-control" name="nik_name" value="{{ $user->karyawan->nik }} - {{ $user->karyawan->nama }}" disabled id="nik_name" style="border-color: #ced4da">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" id="username" style="border-color: #ced4da" value="{{ old('username', $user->username) }}" placeholder="Username">
                                            <input type="hidden" name="slug" id="slug">
                                            @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-4">
                                            <label for="level_user" class="form-label">Level user</label>
                                            <select class="form-select form-select-sm" id="single-select-field_1" name="level_user" data-placeholder="Pilih..">
                                                <option disabled>Pilih..</option>
                                                @if(old('level_user') == 'Admin' || $user->level_user == 'Admin')
                                                <option value="Admin" selected>Admin</option>
                                                <option value="Karyawan">Karyawan</option>
                                                <option value="IT Support">IT Support</option>
                                                <option value="Kepala IT">Kepala IT</option>
                                                @elseif(old('level_user') == 'Karyawan' || $user->level_user == 'Karyawan')
                                                <option value="Karyawan" selected>Karyawan</option>
                                                <option value="Admin">Admin</option>
                                                <option value="IT Support">IT Support</option>
                                                <option value="Kepala IT">Kepala IT</option>
                                                @elseif(old('level_user') == 'IT Support' || $user->level_user == 'IT Support')
                                                <option value="IT Support" selected>IT Support</option>
                                                <option value="Admin">Admin</optiozn>
                                                <option value="Karyawan">Karyawan</option>
                                                <option value="Kepala IT">Kepala IT</option>
                                                @elseif(old('level_user') == 'Kepala IT' || $user->level_user == 'Kepala IT')
                                                <option value="Kepala IT" selected>Kepala IT</option>
                                                <option value="IT Support">IT Support</option>
                                                <option value="Admin">Admin</optiozn>
                                                <option value="Karyawan">Karyawan</option>
                                                @else
                                                <option value="Admin">Admin</option>
                                                <option value="Karyawan">Karyawan</option>
                                                <option value="IT Support">IT Support</option>
                                                <option value="Kepala IT">Kepala IT</option>
                                                @endif
                                            </select>
                                        </div>
                                        <p style="color: grey;">* biarkan password tetap kosong jika tidak ingin di ubah</p>

                                        <div class="col-12 mb-3">
                                            <label for="password" class="form-label">password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" id="password" style="border-color: #ced4da;" placeholder="password">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-4">
                                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" value="" id="password_confirmation" style="border-color: #ced4da;" placeholder="Konfirmasi Password" disabled>
                                            @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-success border-0" style="padding: 9px 22px 8px 22px;">
                                            <div class="col" style="padding: 0px 3px">
                                                <div>Simpan</div>
                                            </div>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
<script>
    $('#single-select-field').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
    });
    $('#single-select-field_1').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
    });

    $("#password").on('keyup', function() {
        $passwords = $('#password').val();
        if ($passwords.length == 0) {
            $("#password_confirmation").attr('disabled', 'disabled');
        } else {
            $("#password_confirmation").removeAttr('disabled');
        }
    });

    // untuk membuat slug otomatis
    const username = document.querySelector('#username');
    const slug = document.querySelector('#slug');

    username.addEventListener('change', function() {
        fetch('/admin/user/checkSlug?username=' + username.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })
</script>
@endsection