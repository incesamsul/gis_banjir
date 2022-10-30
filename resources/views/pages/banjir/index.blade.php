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
                        <select class="custom-select form-control mr-3" id="filter-data-banjir">
                            <option value="" selected>Filter</option>
                            <option value=""></option>
                        </select>
                        <button id="btn-tambah" type="button" class="btn bg-main text-white float-right" data-toggle="modal" data-target="#modalBanjir"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body ">
                    <table class="table table-striped table-hover table-user table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
                                <th>Tgl kejadian</th>
                                <th>Kecamatan</th>
                                {{-- <th>Kelurahan</th> --}}
                                {{-- <th>titk bencana</th> --}}
                                {{-- <th>terdampak(kk)</th> --}}
                                <th>terdampak(jiwa)</th>
                                <th>kerusakan berat</th>
                                <th>kerusakan sedang</th>
                                <th>kerusakan ringan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banjir as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->tgl_kejadian }}</td>
                                    <td>{{ $row->kecamatan }}</td>
                                    {{-- <td>{{ $row->kelurahan }}</td> --}}
                                    {{-- <td>{{ $row->titik_bencana }}</td> --}}
                                    {{-- <td>{{ $row->terdampak_kk }}</td> --}}
                                    <td>{{ $row->terdampak_jiwa }}</td>
                                    <td>{{ $row->kerusakan_berat }}</td>
                                    <td>{{ $row->kerusakan_sedang }}</td>
                                    <td>{{ $row->kerusakan_ringan }}</td>
                                    <td class="option">
                                        <div class="btn-group dropleft btn-option">
                                            <i type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </i>
                                            <div class="dropdown-menu">
                                                {{-- <a data-pengguna='@json($row)' data-toggle="modal" data-target="#modalPengguna" class="dropdown-item kaitkan" href="#"><i class="fas fa-link"> Kaitkan data</i></a> --}}
                                                <a data-edit='@json($row)' data-toggle="modal" data-target="#modalBanjir" class="dropdown-item edit" href="#"><i class="fas fa-pen"> Edit</i></a>
                                                <a data-id_hapus="{{ $row->id_banjir }}" class="dropdown-item hapus" href="#"><i class="fas fa-trash"> Hapus</i></a>
                                            </div>
                                        </div>
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



  <!-- Modal -->
  <div class="modal fade" id="modalBanjir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data banjir</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formBanjir" action="{{ URL::to('/admin/create_data_banjir') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tgl_kejadian">tgl_kejadian</label>
                <input type="hidden" name="id" id="id" class="form-control">
                <input required type="date" name="tgl_kejadian" id="tgl_kejadian" class="form-control">
            </div>
            <div class="form-group">
                <label for="kecamatan">kecamatan</label>
                <input required type="text" name="kecamatan" id="kecamatan" class="form-control">
            </div>
            {{-- <div class="form-group">
                <label for="kelurahan">kelurahan</label>
                <input required type="text" name="kelurahan" id="kelurahan" class="form-control">
            </div>
            <div class="form-group">
                <label for="titik_bencana">titik_bencana</label>
                <input required type="text" name="titik_bencana" id="titik_bencana" class="form-control">
            </div> --}}
            <div class="form-group">
                <label for="kerusakan_berat">kerusakan_berat</label>
                <input required type="text" name="kerusakan_berat" id="kerusakan_berat" class="form-control">
            </div>
            <div class="form-group">
                <label for="kerusakan_sedang">kerusakan_sedang</label>
                <input required type="text" name="kerusakan_sedang" id="kerusakan_sedang" class="form-control">
            </div>
            <div class="form-group">
                <label for="kerusakan_ringan">kerusakan_ringan</label>
                <input required type="text" name="kerusakan_ringan" id="kerusakan_ringan" class="form-control">
            </div>
            <div class="form-group">
                <label for="terdampak_jiwa">terdampak_jiwa</label>
                <input required type="text" name="terdampak_jiwa" id="terdampak_jiwa" class="form-control">
            </div>
            {{-- <div class="form-group">
                <label for="kerusakan">kerusakan</label>
                <select required name="kerusakan" id="kerusakan" class="form-control">
                    <option value=""> -- kerusakan --</option>
                    <option value="berat">berat</option>
                    <option value="sedang">sedang</option>
                    <option value="ringan">ringan</option>
                </select>
            </div> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn bg-main text-white">Simpan</button>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('script')
<script>
    $(document).ready(function() {

        $('.table').on('click', 'tr td a.edit', function() {
            let edit = $(this).data('edit');
            $('#id').val(edit.id_banjir);
            $('#tgl_kejadian').val(edit.tgl_kejadian);
            $('#kecamatan').val(edit.kecamatan);
                // $('#kelurahan').val(edit.kelurahan);
                // $('#titik_bencana').val(edit.titik_bencana);
            // $('#terdampak_kk').val(edit.terdampak_kk);
            $('#kerusakan_berat').val(edit.kerusakan_berat);
            $('#kerusakan_sedang').val(edit.kerusakan_sedang);
            $('#kerusakan_ringan').val(edit.kerusakan_ringan);
            $('#terdampak_jiwa').val(edit.terdampak_jiwa);
            $('#kerusakan').val(edit.kerusakan);
            $('#formBanjir').attr('action', '/admin/update_data_banjir');
        });

        $('#btn-tambah').on('click',function(){
            $('#formBanjir').attr('action', '/admin/create_data_banjir');
        });

        $('.table').on('click', 'tr td a.hapus', function() {
            let id = $(this).data('id_hapus');
            Swal.fire({
                title: 'Apakah yakin?'
                , text: "Data tidak bisa kembali lagi!"
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Ya, Konfirmasi'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        , url: '/admin/delete_data_banjir'
                        , method: 'post'
                        , dataType: 'json'
                        , data: {
                            id: id
                        }
                        , success: function(data) {
                            if (data == 1) {
                                Swal.fire('Berhasil', 'Data telah terhapus', 'success').then((result) => {
                                    location.reload();
                                });
                            }
                        }
                    })
                }
            })
        });

    });

    $('#liDataBanjir').addClass('active');

</script>
@endsection
