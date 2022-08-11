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

                                    <h4 class="card-title">Form Edit Informasi</h4>
                                    <br>
                                    <form action="/admin/information/update/{{ $informasi->slug }}" method="post">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" class="form-control" name="slug" id="slug">
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <label for="Dari" class="form-label">Dari</label>
                                                <input type="text" class="form-control " name="Dari" id="Dari" style="border-color: #ced4da" value="admin" disabled>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="tanggal" class="form-label">tanggal</label>
                                                <input type="text" class="form-control " name="tanggal" id="tanggal" style="border-color: #ced4da" value="{{ $informasi->tanggal }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="text" class="form-control  @error('subject') is-invalid @enderror" name="subject" id="subject" style="border-color: #ced4da" value="{{ old('subject', $informasi->subject) }}" placeholder="subject">
                                            @error('subject')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="pesan" class="form-label">Pesan</label>
                                            <input type="text" class="form-control  @error('pesan') is-invalid @enderror" name="pesan" id="pesan" style="border-color: #ced4da" value="{{ old('pesan', $informasi->pesan) }}" placeholder="pesan">
                                            @error('pesan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
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

    const subject = document.querySelector('#subject');
    const slug = document.querySelector('#slug');

    subject.addEventListener('change', function() {
        fetch('/admin/information/checkSlug?subject=' + subject.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })
</script>
@endsection