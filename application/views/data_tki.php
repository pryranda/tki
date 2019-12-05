<?php
$this->load->view('layout/header');
$this->load->view('layout/sidebar');
?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Tables</li>
        </ol>
    </div><!--/.row-->

<!--    <div class="row">-->
<!--        <div class="col-lg-12">-->
<!--            <h1 class="page-header">Tables</h1>-->
<!--        </div>-->
<!--    </div><!--/.row-->

    <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Daftar Calon TKI</div>
            <div class="panel-body">
                <div class="panel-body">
                    <button id="addKer" class="btn btn-success margin center-block" type="button" data-toggle="modal" data-target="#addModal"><span
                                class="fa fa-plus"></span> &nbsp;Tambah
                        Data Baru
                    </button>
                </div>
<!--                <table data-toggle="table" data-url="--><?//= base_url() ?><!--assets/tables/data1.json" data-show-refresh="true"-->
<!--                       data-show-toggle="true" data-show-columns="true" data-search="true"-->
<!--                       data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"-->
<!--                       data-sort-order="desc">-->
                <table id="tableRegis" class="table display nowrap responsive table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>No Kode</th>
                        <th>Negara tujuan</th>
                        <th>Tanggal Masuk</th>
                        <th>Sponsor</th>
                        <th>Numpang Proses</th>
                        <th>Nama Lengkap</th>
                        <th>No KTP</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>Agama</th>
                        <th>No HP</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Data Calon TKI</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group ">
                        <label>Negara Tujuan </label>
                        <select name="negara_aw" id="negara_aw" class="form-control input-sm">
                            <option value="0">Pilih</option>
                            <option value="1">Singapura</option>
                            <option value="2">Malaysia</option>
                            <option value="3">Hongkong</option>
                        </select>
                    </div>
                    <div class="form-group input-group-sm">
                        <label>No Ktp</label>
                        <input type="number" name="no_ktp_aw" id="no_ktp_aw" class="form-control"
                               placeholder="Nomor KTP">
                    </div>
                    <div class="form-group input-group-sm">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_aw" id="nama_aw" class="form-control"
                               placeholder="Nama Lengkap">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="submit-btn-aw" class="btn btn-default margin" type="button" data-dismiss="modal"><span class="fa fa-check"></span> &nbsp;Submit
                    </button>
<!--                    <button type="button" class="btn btn-default" data-dismiss="modal">S</button>-->
                </div>
            </div>

        </div>
    </div>
    <script>
        $(function(){
            'use strict';

            $('#tableRegis').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                },
                "scrollX": true,
                ajax:{
                    "url": ROOT+"/dashboard_ajax/register_get",
                    "dataSrc": function ( json ) {
                        var data=[];
                        var no=1;
                        for ( var i=0, ien=json.data.length ; i<ien ; i++ ) {
                            var value=[];
                            value[0] = no++;
                            value[1] = json.data[i]['no_kode'];
                            value[2] = json.data[i]['negara'];
                            value[3] = json.data[i]['tgl_masuk'];
                            value[4] = json.data[i]['sponsor'];
                            value[5] = json.data[i]['nama_np'];
                            value[6] = json.data[i]['nama_lengkap'];
                            value[7] = json.data[i]['no_ktp'];
                            value[8] = json.data[i]['jenis_kelamin'];
                            value[9] = json.data[i]['status'];
                            value[10] = json.data[i]['agama'];
                            value[11] = json.data[i]['no_telp'];
                            value[12] = '<a class="btn btn-sm btn-primary" href="dashboard/pendaftaran/'+json.data[i]['id']+'" title="Edit" onclick=""><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
                            // value[12] += '&nbsp;<a class="btn btn-sm btn-danger" href="" title="Hapus" onclick="delete_probono('+json.data[i]['id']+')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                            data[i]=value;
                        }
                        console.log(data);
                        return data;
                    }
                }
            });


        });
    </script>
    <script type="text/javascript">

        $("#submit-btn-aw").click(function () {
            // alert('imam');
            var negara = $('#negara_aw').val();
            var nama = $('#nama_aw').val();
            var no_ktp = $('#no_ktp_aw').val();
            // alert(negara);
            // alert(no_ktp);
            // alert(nama);
            $.ajax({
                url: ROOT+'/dashboard_ajax/register_insert',
                dataType: 'json',
                type: 'post',
                data: {
                    negara: negara,
                    nama: nama,
                    no_ktp: no_ktp,
                }
            })
            .done(function(data) {
                if(data.is_error){
                    alert(data.error_message);
                    return;
                }
                alert(data.id);
                window.location = ROOT+'dashboard/pendaftaran/'+data.id;
            })
            .always(function(){
                // $('#buy_button_loading').addClass('d-none');
                // $('#buy_button').removeClass('d-none');
            })
            .error(function(data){

            })
        });
    </script>

<?php
$this->load->view('layout/footer');
?>