@extends('layout.main')
@section('container')
@include('partials.navSidebar')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <?php if (session('success')) {  ?>
                                            <div id="flash" data-flash="{{ session('success') }}" style="background-color:red"></div>
                                            <?php session()->forget('success'); ?>
                                        <?php } ?>
                                        <h4>Progress Tiket</h4><br><br>
                                        <form action="/it-support/ticket/{{ $explode }}/progress" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="kode_tiket" id="kode_tiket" value="{{ $explode }}">
                                            <input type="hidden" name="tiket_id" id="tiket_id" value="{{ $tiket_id }}">
                                            <div class="row">
                                                <div class="col-2 mb-3">
                                                    <div>
                                                        <label for="number" class="form-label">Persentase</label>
                                                        <select class="form-select form-select-sm @error('number') is-invalid @enderror" name="number" id="single-select-field" data-placeholder="Pilih..">
                                                            <option selected disabled>Pilih..</option>
                                                            <?php for ($i = 1; $i <= 100; $i++) { ?>
                                                                <option value="{{ $i }}">{{ $i }}%</option>
                                                            <?php } ?>
                                                        </select>
                                                        @error('number')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col mb-3">
                                                    <div>
                                                        <label for="keterangan" class="form-label">Keterangan </label>
                                                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" placeholder="keterangan" id="keterangan">
                                                        @error('keterangan')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                @if($tiket[0]->kategori_id == 6)
                                                <div class="mb-3">
                                                    <div class="col-sm-2 mb-1">
                                                        <label for="file_baru" class="form-label">Upload File</label>
                                                        <img src="../../../file/default.jpg" style="width: 140px; height: 160px;" class="img-thumbnail img-preview">
                                                    </div>
                                                    <input class="form-control @error('file_baru') is-invalid @enderror" name="file_baru" aria-label="Upload" style="padding: 10px 5px;" type="file" id="file_baru" onchange="previewImage()">
                                                    @error('file_baru')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                @endif
                                            </div>
                                            <br>
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
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <h4>Progress Tiket</h4>
                                        <br><br>
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            No
                                                        </th>
                                                        <th>
                                                            Persentase
                                                        </th>
                                                        <th>
                                                            Keterangan
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($progress as $progress)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $progress->number }}%</td>
                                                        <td>{{ $progress->keterangan }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
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

        function previewImage() {
            const image = document.querySelector('#file_baru');
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