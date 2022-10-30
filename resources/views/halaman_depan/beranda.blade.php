@extends('layouts.front.frontend')

@section('content')
<!-- slider section -->
<section class="slider_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container ">
            <div class="row">
              <div class="col-md-6">
                <div class="detail-box">
                  <h5>
                    Sistem informasi geografis
                  </h5>
                  <h1>
                    Data banjir <br>
                    Wilayah pangkajene
                  </h1>
                  <p>
                      Dapatkan infrmasi banjir, dan daerah rawan, sedang dan sangat dengan mudah kapanpun dan dimanapun
                  </p>
                  <a href="">
                    Lebih lanjut
                  </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="img-box">
                  <img src="{{ asset('bostorek/images/slider-img.svg') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
  </section>
  <!-- end slider section -->
</div>


<!-- catagory section -->



<!-- end catagory section -->


<!-- catagory section -->

<section class="banjir_section layout_padding" id="data">
    <div class="catagory_container">
    <div class="container ">
        <div class="heading_container heading_center">
        <div class="serach_and_title mb-4 pb-3 d-flex align-items-start">
            <h2 id="pencarian-title">Data Banjir</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 table-responsive">
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
</section>
<!-- catagory section -->

<section class="banjir_section layout_padding" id="data">
    <div class="catagory_container">
    <div class="container ">
        <div class="heading_container heading_center">
        <div class="serach_and_title mb-4 pb-3 d-flex align-items-start">
            <h2 id="pencarian-title">Centeroid data</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 table-responsive">
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
</section>
<section class="banjir_section layout_padding" id="data">
    <div class="catagory_container">
    <div class="container ">
        <div class="heading_container heading_center">
        <div class="serach_and_title mb-4 pb-3 d-flex align-items-start">
            <h2 id="pencarian-title">Jarak data ke centeroid</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 table-responsive">
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
</section>
<section class="banjir_section layout_padding" id="data">
    <div class="catagory_container">
    <div class="container ">
        <div class="heading_container heading_center">
        <div class="serach_and_title mb-4 pb-3 d-flex align-items-start">
            <h2 id="pencarian-title">Pemetaan data</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 table-responsive">
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
</section>


<section class="banjir_section layout_padding" id="data">
    <div class="catagory_container">
    <div class="container ">
        <div class="heading_container heading_center">
        <div class="serach_and_title mb-4 pb-3 d-flex align-items-start">
            <h2 id="pencarian-title">Persentase hasil cluster</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 table-responsive">
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
</section>


<section class="banjir_section layout_padding" id="cluster">
    <div class="catagory_container">
    <div class="container ">
        <div class="heading_container heading_center">
        <div class="serach_and_title mb-4 pb-3 d-flex align-items-start">
            <h2 id="pencarian-title">Kecamatan berdasarakan kategori</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 table-responsive">
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


<section class="banjir_section layout_padding" id="cluster">
    <div class="catagory_container">
    <div class="container ">
        <div class="heading_container heading_center">
        <div class="serach_and_title mb-4 pb-3 d-flex align-items-start">
            <h2 id="pencarian-title">Pemetaan</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 table-responsive">
            <style>.embed-container {position: relative; padding-bottom: 80%; height: 0; max-width: 100%;} .embed-container iframe, .embed-container object, .embed-container iframe{position: absolute; top: 0; left: 0; width: 100%; height: 100%;} small{position: absolute; z-index: 40; bottom: 0; margin-bottom: -15px;}</style><div class="embed-container"><iframe width="500" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" title="pangkep" src="//www.arcgis.com/apps/Embed/index.html?webmap=e9069b28eda34726909a9e72323b2051&extent=119.3777,-4.9018,119.7368,-4.7016&zoom=true&previewImage=false&scale=true&disable_scroll=true&theme=dark"></iframe></div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end catagory section -->

@include('components.info')
<!-- end info section -->

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

