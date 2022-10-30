@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data banjir</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data banjir ..." id="cari-data-banjir">

                    </div>
                </div>
                <div class="card-body ">
                    <table class="table table-striped table-hover table-user table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
                                <th>titk bencana</th>
                                <th>terdampak</th>
                                <th>kerusakan berat</th>
                                <th>kerusakan sedang</th>
                                <th>kerusakan ringan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banjir as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->kecamatan }}</td>
                                    <td>{{ $row->terdampak_jiwa }}</td>
                                    <td>{{ $row->kerusakan_berat }}</td>
                                    <td>{{ $row->kerusakan_sedang }}</td>
                                    <td>{{ $row->kerusakan_ringan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Menentukan centeroid</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data banjir ..." id="cari-data-banjir">

                    </div>
                </div>
                <div class="card-body ">
                    <table class="table table-striped table-hover table-user table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th>data ke</th>
                                <th>centeroid</th>
                                <th>terdampak</th>
                                <th>kerusakan berat</th>
                                <th>kerusakan sedang</th>
                                <th>kerusakan ringan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($centeroid as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->terdampak_jiwa }}</td>
                                    <td>{{ $row->kerusakan_berat }}</td>
                                    <td>{{ $row->kerusakan_sedang }}</td>
                                    <td>{{ $row->kerusakan_ringan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Jarak data ke centeroid</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data banjir ..." id="cari-data-banjir">

                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover table-user table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th>data ke</th>
                                <th>terdampak</th>
                                <th>kerusakan berat</th>
                                <th>kerusakan sedang</th>
                                <th>kerusakan ringan</th>
                                <th>C1</th>
                                <th>C2</th>
                                <th>C3</th>
                                <th>Minimum</th>
                                <th>Cluster</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banjir as $i=>$row)
                            <?php
                            $c1 = sqrt(pow($row->terdampak_jiwa - $banjir[0]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[0]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[0]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[0]->kerusakan_sedang, 2));
                            $c2 = sqrt(pow($row->terdampak_jiwa - $banjir[1]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[1]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[1]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[1]->kerusakan_sedang, 2));
                            $c3 = sqrt(pow($row->terdampak_jiwa - $banjir[2]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[2]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[2]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[2]->kerusakan_sedang, 2));
                            $min = min($c1,$c2,$c3);
                            ?>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->terdampak_jiwa }}</td>
                                    <td>{{ $row->kerusakan_berat }}</td>
                                    <td>{{ $row->kerusakan_sedang }}</td>
                                    <td>{{ $row->kerusakan_ringan }}</td>
                                    <td>
                                        {{ $c1 }}
                                    </td>
                                    <td>
                                        {{ $c2 }}
                                    </td>
                                    <td>
                                        {{ $c3 }}
                                    </td>
                                    <td>
                                        {{ $min }}
                                    </td>
                                    <td>
                                        <?php
                                            if($c1 == $min){
                                                echo '1';
                                            }
                                            if($c2 == $min){
                                                echo '2';
                                            }
                                            if($c3 == $min){
                                                echo '3';
                                            }
                                            ?>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Pemetaan data</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data banjir ..." id="cari-data-banjir">

                    </div>
                </div>
                <div class="card-body ">
                    <table class="table table-striped table-hover table-user table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th>data ke</th>
                                <th>C1</th>
                                <th>C2</th>
                                <th>C3</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banjir as $i=>$row)
                            <?php
                            $c1 = sqrt(pow($row->terdampak_jiwa - $banjir[0]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[0]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[0]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[0]->kerusakan_sedang, 2));
                            $c2 = sqrt(pow($row->terdampak_jiwa - $banjir[1]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[1]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[1]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[1]->kerusakan_sedang, 2));
                            $c3 = sqrt(pow($row->terdampak_jiwa - $banjir[2]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[2]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[2]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[2]->kerusakan_sedang, 2));
                            $min = min($c1,$c2,$c3);

                            $cluster = 0;
                            if($c1 == $min){
                                $cluster = 1;
                            }
                            if($c2 == $min){
                                $cluster = 2;
                            }
                            if($c3 == $min){
                                $cluster = 3;
                            }
                            ?>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cluster == 1 ? '1' : '' }}</td>
                                    <td>{{ $cluster == 2 ? '1' : '' }}</td>
                                    <td>{{ $cluster == 3 ? '1' : '' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Persentase data hasil cluster</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data banjir ..." id="cari-data-banjir">

                    </div>
                </div>
                <div class="card-body ">
                    <?php
                        $jmlCluster1 = 0;
                            $jmlCluster2 = 0;
                            $jmlCluster3 = 0;
                             ?>
                    @foreach ($banjir as $i=>$row)
                            <?php

                            $c1 = sqrt(pow($row->terdampak_jiwa - $banjir[0]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[0]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[0]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[0]->kerusakan_sedang, 2));
                            $c2 = sqrt(pow($row->terdampak_jiwa - $banjir[1]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[1]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[1]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[1]->kerusakan_sedang, 2));
                            $c3 = sqrt(pow($row->terdampak_jiwa - $banjir[2]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[2]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[2]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[2]->kerusakan_sedang, 2));
                            $min = min($c1,$c2,$c3);
                            $cluster = 0;
                            if($c1 == $min){
                                $cluster = 1;
                                $jmlCluster1++;
                            }
                            if($c2 == $min){
                                $cluster = 2;
                                $jmlCluster2++;
                            }
                            if($c3 == $min){
                                $cluster = 3;
                                $jmlCluster3++;
                            }
                            ?>
                            @endforeach
                            <canvas height="150" id="myChart3"></canvas>
                            <div class="progress-wrapper">
                                <label for="">Cluster 1 (Rawan)</label>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $jmlCluster1 * 100 / count($banjir) }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $jmlCluster1 * 100 / count($banjir) }}%</div>
                                  </div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <label for="">Cluster 2 (Rawan sedang)</label>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{ $jmlCluster2 * 100 / count($banjir) }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $jmlCluster2 * 100 / count($banjir) }}%</div>
                                  </div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <label for="">Cluster 3 (Sangat rawan)</label>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $jmlCluster3 * 100 / count($banjir) }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $jmlCluster3 * 100 / count($banjir) }}%</div>
                                  </div>
                            </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Kategori data</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data banjir ..." id="cari-data-banjir">

                    </div>
                </div>
                <div class="card-body ">
                    <table class="table table-striped table-hover table-user table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th>Titik bencana</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banjir as $i=>$row)
                            <?php
                            $c1 = sqrt(pow($row->terdampak_jiwa - $banjir[0]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[0]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[0]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[0]->kerusakan_sedang, 2));
                            $c2 = sqrt(pow($row->terdampak_jiwa - $banjir[1]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[1]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[1]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[1]->kerusakan_sedang, 2));
                            $c3 = sqrt(pow($row->terdampak_jiwa - $banjir[2]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[2]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[2]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[2]->kerusakan_sedang, 2));
                            $min = min($c1,$c2,$c3);

                            $cluster = 0;
                            if($c1 == $min){
                                $cluster = 1;
                            }
                            if($c2 == $min){
                                $cluster = 2;
                            }
                            if($c3 == $min){
                                $cluster = 3;
                            }
                            ?>
                                <tr>
                                    <td>{{ $row->kecamatan }}</td>
                                    <td>
                                        @if ($cluster == 1)
                                            <span class="badge badge-success">Ringan</span>
                                            @elseif($cluster == 3)
                                            <span class="badge badge-info">Sedang</span>
                                            @else
                                            <span class="badge badge-danger">Berat</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Bar chart data banjir</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data banjir ..." id="cari-data-banjir">

                    </div>
                </div>
                <div class="card-body ">
                    <?php
                        $jmlCluster1 = 0;
                            $jmlCluster2 = 0;
                            $jmlCluster3 = 0;
                             ?>
                    @foreach ($banjir as $i=>$row)
                            <?php

                            $c1 = sqrt(pow($row->terdampak_jiwa - $banjir[0]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[0]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[0]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[0]->kerusakan_sedang, 2));
                            $c2 = sqrt(pow($row->terdampak_jiwa - $banjir[1]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[1]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[1]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[1]->kerusakan_sedang, 2));
                            $c3 = sqrt(pow($row->terdampak_jiwa - $banjir[2]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[2]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[2]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[2]->kerusakan_sedang, 2));
                            $min = min($c1,$c2,$c3);
                            $cluster = 0;
                            if($c1 == $min){
                                $cluster = 1;
                                $jmlCluster1++;
                            }
                            if($c2 == $min){
                                $cluster = 2;
                                $jmlCluster2++;
                            }
                            if($c3 == $min){
                                $cluster = 3;
                                $jmlCluster3++;
                            }
                            ?>
                            @endforeach
                            <canvas id="myChart2" width="1700" height="700"></canvas>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Line chart data banjir</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data banjir ..." id="cari-data-banjir">

                    </div>
                </div>
                <div class="card-body ">
                    <?php
                        $jmlCluster1 = 0;
                            $jmlCluster2 = 0;
                            $jmlCluster3 = 0;
                             ?>
                    @foreach ($banjir as $i=>$row)
                            <?php

                            $c1 = sqrt(pow($row->terdampak_jiwa - $banjir[0]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[0]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[0]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[0]->kerusakan_sedang, 2));
                            $c2 = sqrt(pow($row->terdampak_jiwa - $banjir[1]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[1]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[1]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[1]->kerusakan_sedang, 2));
                            $c3 = sqrt(pow($row->terdampak_jiwa - $banjir[2]->terdampak_jiwa, 2) + pow($row->kerusakan_berat - $banjir[2]->kerusakan_berat, 2) + pow($row->kerusakan_ringan - $banjir[2]->kerusakan_ringan, 2) + pow($row->kerusakan_sedang- $banjir[2]->kerusakan_sedang, 2));
                            $min = min($c1,$c2,$c3);
                            $cluster = 0;
                            if($c1 == $min){
                                $cluster = 1;
                                $jmlCluster1++;
                            }
                            if($c2 == $min){
                                $cluster = 2;
                                $jmlCluster2++;
                            }
                            if($c3 == $min){
                                $cluster = 3;
                                $jmlCluster3++;
                            }
                            ?>
                            @endforeach
                            <canvas id="myChart5" width="1700" height="700"></canvas>

                </div>
            </div>
        </div>
    </div>

</section>


@endsection
@section('script')
<script>
    $(document).ready(function() {

        var ctx = document.getElementById("myChart3");
    if (ctx) {
        ctx.getContext('2d');
        var myChart = new Chart(ctx, {
            aspectRatio: 1
            , type: 'doughnut'
            , data: {
                datasets: [{
                    data: [
                        {{ $jmlCluster1 * 100 / count($banjir) }}
                        ,{{ $jmlCluster2 * 100 / count($banjir) }}
                        ,{{ $jmlCluster3 * 100 / count($banjir) }}
                    , ]
                    , backgroundColor: [
                        '#6777ef'
                        , '#63ed7a'
                        , '#ffa426'
                    , ]
                    , label: 'Dataset 1'
                }]
                , labels: [
                    'Rawan'
                    , 'Sedang'
                    , 'Sangat rawan'

                ]
            , }
            , options: {
                responsive: true
                , legend: {
                    position: 'bottom'
                , }
            , }
        });

    }



    var ctx = document.getElementById('myChart2');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels: ['ringan','sedang','berat'],
    datasets: [
        {
        label: 'Jumlah Perkategori',
        data: [{{ $jmlCluster1}} , {{ $jmlCluster2 }}, {{ $jmlCluster3 }}],
        fill: false,
        borderColor: '#34c',
        backgroundColor: '#aae0a8',
        }
    ]
    },
    options: {
        responsive: true,
        scales: {
        x: {
            display: true,
            title: {
            display: true,
            text: 'Month',
            color: '#911',
            font: {
                family: 'Comic Sans MS',
                size: 20,
                weight: 'bold',
                lineHeight: 1.2,
            },
            padding: {top: 20, left: 0, right: 0, bottom: 0}
            }
        },
        y: {
            display: true,
            title: {
            display: true,
            text: 'Value',
            color: '#191',
            font: {
                family: 'Times',
                size: 20,
                style: 'normal',
                lineHeight: 1.2
            },
            padding: {top: 30, left: 0, right: 0, bottom: 0}
            }
        }
        }
    },
    });





    var ctx = document.getElementById('myChart5');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
    labels: ['ringan','sedang','berat'],
    datasets: [
        {
        label: 'Jumlah Perkategori',
        data: [{{ $jmlCluster1}} , {{ $jmlCluster2 }}, {{ $jmlCluster3 }}],
        fill: false,
        borderColor: '#aac',
        backgroundColor: '#0a8',
        }
    ]
    },
    options: {
        responsive: true,
        scales: {
        x: {
            display: true,
            title: {
            display: true,
            text: 'Month',
            color: '#911',
            font: {
                family: 'Comic Sans MS',
                size: 20,
                weight: 'bold',
                lineHeight: 1.2,
            },
            padding: {top: 20, left: 0, right: 0, bottom: 0}
            }
        },
        y: {
            display: true,
            title: {
            display: true,
            text: 'Value',
            color: '#191',
            font: {
                family: 'Times',
                size: 20,
                style: 'normal',
                lineHeight: 1.2
            },
            padding: {top: 30, left: 0, right: 0, bottom: 0}
            }
        }
        }
    },
    });





    });

    $('#liHasilClustering').addClass('active');

</script>
@endsection
