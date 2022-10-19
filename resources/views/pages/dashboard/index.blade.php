@extends('layouts.v_template')

@section('content')
<section class="section">
    {{-- <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-dark bg-dark">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total </h4>
                    </div>
                    <div class="card-body">
                        59
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-dark bg-dark">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Hari dan tanggal sekarang</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-small mt-3">{{ date('l, d M Y H:i:s') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-dark bg-dark">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Waktu sekarang</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-small mt-3">{{ date('H:i:s') }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}




    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Anda berada di halaman dashboard</h4>
                </div>
                <div class="card-body">
                    <style>.embed-container {position: relative; padding-bottom: 80%; height: 0; max-width: 100%;} .embed-container iframe, .embed-container object, .embed-container iframe{position: absolute; top: 0; left: 0; width: 100%; height: 100%;} small{position: absolute; z-index: 40; bottom: 0; margin-bottom: -15px;}</style><div class="embed-container"><iframe width="500" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" title="pangkep" src="//www.arcgis.com/apps/Embed/index.html?webmap=e9069b28eda34726909a9e72323b2051&extent=119.3777,-4.9018,119.7368,-4.7016&zoom=true&previewImage=false&scale=true&disable_scroll=true&theme=dark"></iframe></div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('script')
<script>
    $('#liDashboard').addClass('active');

</script>
@endsection
