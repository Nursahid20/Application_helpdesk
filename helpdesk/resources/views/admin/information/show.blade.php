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
                                        <h4>Detail Hardware</h4>
                                        <hr>
                                        <div class="mb-3 pt-3">
                                            <div class="row">
                                                <div class="col-2">
                                                    <h6 class="mb-4">Tanggal </h6>
                                                </div>
                                                <div class="col-10">
                                                    <h6 class="mb-4">: {{ $informasi->tanggal }}</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <h6 class="mb-4">Dari </h6>
                                                </div>
                                                <div class="col-10">
                                                    <h6 class="mb-4">: {{ $informasi->dari }}</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <h6 class="mb-4">Subject </h6>
                                                </div>
                                                <div class="col-10">
                                                    <h6 class="mb-4">: {{ $informasi->subject }}</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <h6 class="mb-4">Pesan</h6>
                                                </div>
                                                <div class="col-10">
                                                    <h6 class="mb-4">: {{ $informasi->pesan }}</h6>
                                                </div>
                                            </div>

                                        </div>
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
</script>
@endsection