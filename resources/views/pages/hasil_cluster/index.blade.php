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
                                <th>terdampak(kk) - X</th>
                                <th>terdampak(jiwa) - Y</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banjir as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->titik_bencana }}</td>
                                    <td>{{ $row->terdampak_kk }}</td>
                                    <td>{{ $row->terdampak_jiwa }}</td>
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
                                <th>X</th>
                                <TH>Y</TH>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($centeroid as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->terdampak_kk }}</td>
                                    <td>{{ $row->terdampak_jiwa }}</td>
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
                <div class="card-body ">
                    <table class="table table-striped table-hover table-user table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th>data ke</th>
                                <th>X</th>
                                <th>Y</th>
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
                            $c1 = sqrt(pow($row->terdampak_kk - $banjir[0]->terdampak_kk, 2) + pow($row->terdampak_jiwa - $banjir[0]->terdampak_jiwa, 2));
                            $c2 = sqrt(pow($row->terdampak_kk - $banjir[1]->terdampak_kk, 2) + pow($row->terdampak_jiwa - $banjir[1]->terdampak_jiwa, 2));
                            $c3 = sqrt(pow($row->terdampak_kk - $banjir[2]->terdampak_kk, 2) + pow($row->terdampak_jiwa - $banjir[2]->terdampak_jiwa, 2));
                            $min = min($c1,$c2,$c3);
                            ?>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->terdampak_kk }}</td>
                                    <td>{{ $row->terdampak_jiwa }}</td>
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
                            $c1 = sqrt(pow($row->terdampak_kk - $banjir[0]->terdampak_kk, 2) + pow($row->terdampak_jiwa - $banjir[0]->terdampak_jiwa, 2));
                            $c2 = sqrt(pow($row->terdampak_kk - $banjir[1]->terdampak_kk, 2) + pow($row->terdampak_jiwa - $banjir[1]->terdampak_jiwa, 2));
                            $c3 = sqrt(pow($row->terdampak_kk - $banjir[2]->terdampak_kk, 2) + pow($row->terdampak_jiwa - $banjir[2]->terdampak_jiwa, 2));
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


@endsection
@section('script')
<script>
    $(document).ready(function() {


    });

    $('#liHasilClustering').addClass('active');

</script>
@endsection
