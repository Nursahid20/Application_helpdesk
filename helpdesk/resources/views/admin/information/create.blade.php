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

                                    <h4 class="card-title">Form Tambah Informasi</h4>
                                    <br>
                                    <form action="/admin/information" method="post">
                                        @csrf
                                        <input type="hidden" class="form-control" name="slug" id="slug">
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <label for="Dari" class="form-label">Dari</label>
                                                <input type="text" class="form-control " name="Dari" id="Dari" style="border-color: #ced4da" value="admin" disabled>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="tanggal" class="form-label">tanggal</label>
                                                <input type="text" class="form-control " name="tanggal" id="tanggal" style="border-color: #ced4da" value="<?= date('Y-m-d'); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="text" class="form-control  @error('subject') is-invalid @enderror" name="subject" id="subject" style="border-color: #ced4da" value="{{ old('subject') }}" placeholder="subject">
                                            @error('subject')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="pesan" class="form-label">Pesan</label>
                                            <input type="text" class="form-control  @error('pesan') is-invalid @enderror" name="pesan" id="pesan" style="border-color: #ced4da" value="{{ old('pesan') }}" placeholder="pesan">
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
    // $("#subject").on('keyup', function() {
    //     var Text = $(this).val();
    //     var today = new Date();
    //     var dd = String(today.getDate()).padStart(2, '0');
    //     var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    //     var yy = today.getFullYear('yy').toString().slice(-2);
    //     Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
    //     $("#slug").val(Text);
    // });

    // untuk membuat slug otomatis
    const subject = document.querySelector('#subject');
    const slug = document.querySelector('#slug');

    subject.addEventListener('change', function() {
        fetch('/admin/information/checkSlug?subject=' + subject.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })
</script>
@endsection