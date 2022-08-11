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
                                    <h4 class="card-title">Form Permintaan Ubah Dokumen / File</h4><br>
                                    <form action="/user/document-modification" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="../../../../file/default.jpg" style="width: 140px; height: 160px;" class="img-thumbnail file_img">
                                                </div>
                                                <div class="col">
                                                    <div>
                                                        <label for="lampiran_id" class="form-label">Lampiran</label>
                                                        <select class="form-select form-select-sm @error('lampiran_id') is-invalid @enderror" name="lampiran_id" id="single-select-field" data-placeholder="Pilih..">
                                                            <option></option>
                                                            @foreach($lampiran as $lampiran)
                                                            @if(old('lampiran_id') == $lampiran->id)
                                                            <option value="{{ $lampiran->id }}" selected>{{ $lampiran->lampiran }} </option>
                                                            @else
                                                            <option value="{{ $lampiran->id }}"> {{ $lampiran->lampiran }} </option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        @error('lampiran_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="pt-4">

                                                        <input class="form-control @error('file') is-invalid @enderror" name="file" aria-label="Upload" style="padding: 10px 5px;" type="file" id="file" onchange="previewImage()">
                                                        @error('file')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
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
    function previewImage() {
        const image = document.querySelector('#file');
        const imgPreview = document.querySelector('.file_img');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection