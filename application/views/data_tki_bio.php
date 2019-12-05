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
                                <th>No</th>
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
                    malaysia(negara_id,id);
                } else{
                    hongkong(negara_id,id);
                }
            }

            function singapura(negara_id,id) {
                location.replace("dashboard/biodata/"+id);
            }

            function malaysia() {
                alert('malaysia');
            }

            function hongkong() {
                alert('hongkong');
            }


            //
            // function update() {
            //     $.ajax({
            //         url: ROOT + '/dashboard_ajax/register_update',
            //         dataType: 'json',
            //         type: 'post',
            //         data: {
            //             negara: $('#negara').val(),
            //             tgl_msk: $('#tgl_msk').val(),
            //             sponsor: $('#sponsor').val(),
            //             np: $('#np').val(),
            //             nama: $('#nama').val(),
            //             tmp_lahir: $('#tmp_lahir').val(),
            //             tgl_lahir: $('#tgl_lahir').val(),
            //             jk: $('#jk').val(),
            //             alamat: $('#alamat').val(),
            //             no_ktp: $('#no_ktp').val(),
            //             no_kk: $('#no_kk').val(),
            //             kakak: $('#kakak').val(),
            //             adik: $('#adik').val(),
            //             pendidikan: $('#pendidikan').val(),
            //             ijasah: $('#ijasah').val(),
            //             status: $('#status').val(),
            //             agama: $('#agama').val(),
            //             no_tlp: $('#no_tlp').val(),
            //             tinggi: $('#tinggi').val(),
            //             berat: $('#berat').val(),
            //             no_kode: $('#no_kode').val(),
            //             hasil_medical: $('#hasil_medical').val(),
            //             tgl_medical: $('#tgl_medical').val(),
            //             id: user_id
            //         }
            //     })
            //         .done(function (data) {
            //             if (data.is_error) {
            //                 alert(data.error_message);
            //                 return false;
            //             }
            //             window.location = ROOT + 'dashboard/data_tki';
            //         })
            //     // .always(function(){
            //     //     // $('#buy_button_loading').addClass('d-none');
            //     //     // $('#buy_button').removeClass('d-none');
            //     // })
            //     // .error(function(data){
            //     //     }
            //     // );
            // }

        </script>
<?php
$this->load->view('layout/footer');
?>