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


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Calon TKI</div>

                    <div class="panel-body">

                        <table id="tableSgp" class="table display nowrap responsive table-striped table-bordered"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>Noo</th>
                                <th>No Kode</th>
                                <th>Negara tujuan</th>
                                <th>Tanggal Masuk</th>
                                <th>Sponsor</th>
                                <th>Numpang Proses</th>
                                <th>Nama Lengkap</th>
                                <th>No KTP</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            // var negara_id = $("#negara_bio").val();

            $(function () {
                'use strict';
                $('#tableSgp').DataTable({
                    responsive: true,
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    },
                    "scrollX": true,
                    ajax: {
                        "url": ROOT + "/biodata_ajax/bio_get",
                        "dataSrc": function (json) {
                            var data = [];
                            var no = 1;
                            for (var i = 0, ien = json.data.length; i < ien; i++) {
                                var value = [];
                                value[0] = no++;
                                value[1] = json.data[i]['no_kode'];
                                value[2] = json.data[i]['negara'];
                                value[3] = json.data[i]['tgl_masuk'];
                                value[4] = json.data[i]['sponsor'];
                                value[5] = json.data[i]['nama_np'];
                                value[6] = json.data[i]['nama_lengkap'];
                                value[7] = json.data[i]['no_ktp'];
                                value[8] = '<button class="btn btn-sm btn-primary" title="Edit" onclick="negara_id('+json.data[i]['negara_id']+','+json.data[i]['id']+')"><i class="glyphicon glyphicon-pencil"></i> Edit</button>';
                                // value[12] += '&nbsp;<a class="btn btn-sm btn-danger" href="" title="Hapus" onclick="delete_probono('+json.data[i]['id']+')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                                data[i] = value;
                            }
                            console.log(data);
                            return data;
                        }
                    }
                });
            });
            function negara_id(negara_id,id){
                if (negara_id==1){
                    singapura(negara_id,id);
                } else if (negara_id==2){
                    // alert('malaysia');
                    malaysia(negara_id,id);
                } else{
                    // alert('hongkong');
                    hongkong(negara_id,id);
                }
            }

            function singapura(negara_id,id) {
                // location.replace("dashboard/lanjut/"+id);
                window.location = ROOT + 'dashboard/lanjut/'+id;
            }

            function malaysia(negara_id,id) {
                window.location = ROOT + 'dashboard/lanjut_mly/'+id;
            }

            function hongkong(negara_id,id) {
                window.location = ROOT + 'dashboard/lanjut_hkg/'+id;
            }

        </script>
<?php
$this->load->view('layout/footer');
?>