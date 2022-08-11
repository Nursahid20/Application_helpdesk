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

                                    <?php if (session('success')) {  ?>
                                        <div id="flash" data-flash="{{ session('success') }}" style="background-color:red"></div>
                                        <?php session()->forget('success'); ?>
                                    <?php } ?>
                                    <h4 class="card-title">Form Tambah Permintaan Hardware</h4><br>
                                    <form action="/user/request-hardware" method="post">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="subject" class="form-label">Jenis Aset</label>
                                            <select class="form-select form-select-sm @error('subject') is-invalid @enderror" name="subject" id="single-select-field" data-placeholder="Pilih..">
                                                <option></option>
                                                @foreach($jenis_aset as $jenis_aset)
                                                @if(old('jenis_aset') == $jenis_aset->nama)
                                                <option value="{{ $jenis_aset->nama }}" selected>{{ $jenis_aset->nama }} </option>
                                                @else
                                                <option value="{{ $jenis_aset->nama }}"> {{ $jenis_aset->nama }} </option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @error('subject')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <div>
                                                <label for="unit" class="form-label">Unit </label>
                                                <input type="number" class="form-control @error('unit') is-invalid @enderror" name="unit" placeholder="unit" id="unit" style="border-color: #ced4da" value="{{ old('unit') }}">
                                                <input type="hidden" class="form-control" id="slug" name="slug">
                                                @error('unit')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div>
                                                <label for="deskripsi" class="form-label">Deskripsi </label>
                                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" placeholder="deskripsi" value="{{ old('deskripsi') }}" style="height: 100px"></textarea>
                                                @error('deskripsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-success border-0" style="padding: 9px 22px 8px 22px;">
                                                <div class="col" style="padding: 0px 3px">
                                                    <div>Simpan</div>
                                                </div>
                                            </button>
                                        </div>
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

    // untuk membuat slug otomatis
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change', function() {
        fetch('/admin/karyawan/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImage() {
        const image = document.querySelector('#img_profile');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection