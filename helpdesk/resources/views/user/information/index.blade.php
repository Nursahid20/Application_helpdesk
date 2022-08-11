@extends('layout.main')
@section('container')
@include('partials.navSidebar')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                            @foreach($informasi as $i)
                            <div class="card">
                                <div class="card-header" style="font-size: 14px;">
                                    {{ $i->tanggal }} - From : {{ $i->dari }}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $i->subject }}</h5>
                                    <p class="card-text">{{ $i->pesan }}</p>
                                </div>
                            </div>
                            <br>
                            @endforeach
                            <div class="">
                                {{ $informasi->links() }}
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
@endsection