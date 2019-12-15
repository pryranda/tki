<?php
$this->load->view('layout/header');
$this->load->view('layout/sidebar');
?>
<?php
if (!empty($values)) {
    ?>
    <input type="hidden" id="aksi" value="1">
    <?php
} else {
    ?>
    <input type="hidden" id="aksi" value="0">
    <?php
}
?>
<input type="hidden" id="user_id" class="form-control" value="<?php if ($values) {
    echo $values->id;
} ?>">
<input type="hidden" id="no_kode" class="form-control" value="<?php if ($values) {
    echo $values->no_kode;
} ?>">
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Market</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Market</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Form</div>
                <div class="panel-body">
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group ">
                            <label>Negara Tujuan</label>
                            <select name="negara" id="negara" class="form-control input-sm">
                                <option value="0"></option>
                                <?php
                                foreach ($negara as $row) {
                                    $a = $row->id;
                                    $b = $values->negara_id;
                                    $c = "";
                                    if ($a == $b) {
                                        $c = "selected";
                                    }
                                    echo '
                                        <option value="' . $row->id . '"' . "$c" . '>' . $row->negara . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Tanggal Masuk</label>
                            <input type="date" name="tgl_msk" id="tgl_msk" class="form-control"
                                   value="<?php if ($values) {
                                       echo $values->tgl_masuk;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <div class="form-group input-group-sm">
                            <label>Sponsor</label>
                            <input type="text" name="sponsor" id="sponsor" class="form-control"
                                   placeholder="Sponsor" value="<?php if ($values) {
                                echo $values->sponsor;
                            } ?>">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <div class="form-group ">
                            <label>Proses</label>
                            <select name="np" id="np" class="form-control input-sm">
                                <option></option>
                                <?php
                                foreach ($np as $row) {
                                    $a = $row->id;
                                    $b = $values->np_id;
                                    $c = "";
                                    if ($a == $b) {
                                        $c = "selected";
                                    }
                                    echo '
                                        <option value="' . $row->id . '"' . "$c" . '>' . $row->nama . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <div class="form-group input-group-sm">
                            <label>PL</label>
                            <input type="text" name="pl" id="pl" class="form-control"
                                   placeholder="Petugal Lapangan" value="<?php if ($values) {
                                echo $values->pl;
                            } ?>">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <hr>
                    </div>
                    <div class="search-result-item col-md-12">
                        <div class="col-sm-2">
                            <?php
                            $photo = !empty($values->photo) ? base_url() . 'assets/images/photo/' . $values->file_photo : 'http://www.placehold.it/200x220/EFEFEF/AAAAAA&text=no+image';
                            ?>
                            <a href="#">
                                <img id="photo_u" class="search-result-image img-responsive" src="<?php echo $photo ?>">
                            </a>
<!--                            <button id="addPhoto" class="btn btn-primary margin center-block" type="button"-->
<!--                                    data-toggle="modal" data-target="#addModalPhoto">&nbsp;Upload-->
<!--                            </button>-->
                        </div>
                    </div><!--/.search-result-item-->
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                   placeholder="Nama Lengkap" value="<?php if ($values) {
                                echo $values->nama_lengkap;
                            } ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control"
                                   placeholder="Tempat Lahir" value="<?php if ($values) {
                                echo $values->tempat_lahir;
                            } ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <div class="form-group input-group-sm">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
                                   placeholder="Tanggal Lahir" value="<?php if ($values) {
                                echo $values->tgl_lahir;
                            } ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <div class="form-group input-group-sm">
                            <label>Tinggi (cm)</label>
                            <input type="number" name="tinggi" id="tinggi" class="form-control"
                                   placeholder="Tinggi Badan" value="<?php if ($values) {
                                echo $values->tinggi;
                            } ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <div class="form-group input-group-sm">
                            <label>Berat (kg)</label>
                            <input type="number" name="berat" id="berat" class="form-control"
                                   placeholder="Berat Badan" value="<?php if ($values) {
                                echo $values->berat;
                            } ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="2"><?php if ($values) {
                                    echo $values->alamat;
                                } ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>No Telp</label>
                            <input type="number" name="no_tlp" id="no_tlp" class="form-control"
                                   placeholder="No Telp" value="<?php if ($values) {
                                echo $values->no_telp;
                            } ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group ">
                            <label>Agama</label>
                            <select name="agama" id="agama" class="form-control input-sm">
                                <option value=<?php if ($values) {
                                    echo $values->agama;
                                } ?>><?php if ($values) { ?><?= get_text_agama($values->agama) ?><?php } ?></option>
                                <option value="1">Islam</option>
                                <option value="2">Kristen</option>
                                <option value="3">Khatolik</option>
                                <option value="4">Hindu</option>
                                <option value="5">Budha</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group ">
                            <label>Pendidikan</label>
                            <select name="pendidikan" id="pendidikan" class="form-control input-sm">
                                <option value=<?php if ($values) {
                                    echo $values->pendidikan;
                                } ?>><?php if ($values) { ?><?= get_text_pendidikan($values->pendidikan) ?><?php } ?></option>
                                <option value="1">SD</option>
                                <option value="2">SMP</option>
                                <option value="3">SMA</option>
                                <option value="4">D3</option>
                                <option value="5">S1</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Jumlah Kakak</label>
                            <input type="text" name="kakak" id="kakak" class="form-control" placeholder="Jumlah Kakak"
                                   value="<?php if ($values) {
                                       echo $values->jml_kakak;
                                   } ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Jumlah Adik</label>
                            <input type="text" name="adik" id="adik" class="form-control" placeholder="Jumlah Adik"
                                   value="<?php if ($values) {
                                       echo $values->jml_adik;
                                   } ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group ">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control input-sm">
                                <option value=<?php if ($values) {
                                    echo $values->status;
                                } ?>><?php if ($values) { ?><?= get_text_status($values->status) ?><?php } ?></option>
                                <option value="1">Belum Menikah</option>
                                <option value="2">Menikah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <hr>
                        INPUT JO
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal Turun JO</label>
                            <input type="date" name="tgl_jo" id="tgl_jo" class="form-control"
                                   value="<?php if ($values) {
                                       echo $values->tgl_jo;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Scan</label>
                            <button id="addJo" class="btn btn-default btn-sm form-control" type="button"
                                    data-toggle="modal" data-target="#addModalJo"><span class="fa fa-plus"></span> &nbsp;Upload JO
                            </button>
                        </div>
                    </div>
                    <div class="search-result-item col-md-12">
                        <table id="tableJo" class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <!--                                <th><input type="checkbox" id="checkedAll"/></th>-->
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Jenis File</th>
                                <th>Download</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div><!--/.search-result-item-->
                    <div class="col-md-12 col-sm-12">
                        INPUT VISA
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal Turun VISA</label>
                            <input type="date" name="tgl_visa" id="tgl_visa" class="form-control"
                                   value="<?php if ($values) {
                                       echo $values->tgl_visa;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Scan</label>
                            <button id="addVisa" class="btn btn-default btn-sm form-control" type="button"
                                    data-toggle="modal" data-target="#addModalVisa"><span class="fa fa-plus"></span> &nbsp;Upload Visa
                            </button>
                        </div>
                    </div>
                    <div class="search-result-item col-md-12">
                        <table id="tableVisa" class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <!--                                <th><input type="checkbox" id="checkedAll"/></th>-->
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Jenis File</th>
                                <th>Download</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div><!--/.search-result-item-->
                    <div class="col-md-12 col-sm-12">
                        INPUT DATA PENERBANGAN
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal Penerbangan</label>
                            <input type="date" name="tgl_terbang" id="tgl_terbang" class="form-control"
                                   value="<?php if ($values) {
                                       echo $values->tgl_terbang;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Nomor Pesawat</label>
                            <input type="text" name="no_pesawat" id="no_pesawat" class="form-control"
                                   value="<?php if ($values) {
                                       echo $values->no_pesawat;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Jam Penerbangan</label>
                            <input type="number" name="jam_terbang" id="jam_terbang" class="form-control"
                                   value="<?php if ($values) {
                                       echo $values->jam_terbang;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Scan</label>
                            <button id="addTiket" class="btn btn-default btn-sm form-control" type="button"
                                    data-toggle="modal" data-target="#addModalTiket"><span class="fa fa-plus"></span> &nbsp;Upload Tiket
                            </button>
                        </div>
                    </div>
                    <div class="search-result-item col-md-12">
                        <table id="tableTiket" class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <!--                                <th><input type="checkbox" id="checkedAll"/></th>-->
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Jenis File</th>
                                <th>Download</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div><!--/.search-result-item-->
                    <div class="col-md-12 col-sm-12">
                        INPUT DATA PERMASALAHAN
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <br>
                            <label>Permasalahan (Jika Ada)</label>
                            <textarea name="masalah" id="masalah" class="form-control" rows="3"><?php if ($values) {
                                    echo $values->masalah;
                                } ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button id="submit-btn" class="btn btn-lg btn-primary pull-left">Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal JO-->
    <div class="modal fade" id="addModalJo" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload File JO</h4>
                </div>
                <div class="modal-body">
                    <form id="submit_jo" class="panel-body" enctype="multipart/form-data">
                        <div class="form-group input-group-sm">
                            <label class="btn btn-default">
                                <input type="file" name="file" id="file_u_jo">
                            </label>
                        </div>
                        <button id="submit-btn-jo" class="btn btn-default margin" type="button" data-dismiss="modal"><span
                                    class="fa fa-check"></span> &nbsp;Submit
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal VISA-->
    <div class="modal fade" id="addModalVisa" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload File Visa</h4>
                </div>
                <div class="modal-body">
                    <form id="submit_visa" class="panel-body" enctype="multipart/form-data">
                        <div class="form-group input-group-sm">
                            <label class="btn btn-default">
                                <input type="file" name="file" id="file_u_visa">
                            </label>
                        </div>
                        <button id="submit-btn-visa" class="btn btn-default margin" type="button" data-dismiss="modal"><span
                                    class="fa fa-check"></span> &nbsp;Submit
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Tiket-->
    <div class="modal fade" id="addModalTiket" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload File Tiket</h4>
                </div>
                <div class="modal-body">
                    <form id="submit_tiket" class="panel-body" enctype="multipart/form-data">
                        <div class="form-group input-group-sm">
                            <label class="btn btn-default">
                                <input type="file" name="file" id="file_u_tiket">
                            </label>
                        </div>
                        <button id="submit-btn-tiket" class="btn btn-default margin" type="button" data-dismiss="modal"><span
                                    class="fa fa-check"></span> &nbsp;Submit
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        var id = $("#aksi").val();
        var user_id = $("#user_id").val();

        $("#submit-btn").click(function () {
            update();
        });

        function update() {
            $.ajax({
                url: ROOT + '/market_ajax/market_update',
                dataType: 'json',
                type: 'post',
                data: {
                    tgl_jo : $('#tgl_jo').val(),
                    tgl_visa: $('#tgl_visa').val(),
                    tgl_terbang: $('#tgl_terbang').val(),
                    no_pesawat: $('#no_pesawat').val(),
                    jam_terbang: $('#jam_terbang').val(),
                    masalah: $('#masalah').val(),
                    id: user_id
                }
            })
            .done(function (data) {
                if (data.is_error) {
                    alert(data.error_message);
                    return false;
                }
                window.location = ROOT + 'data_market';
            })
        }

        $('#submit-btn-jo').click(function () {
            var file = $("#file_u_jo")[0].files[0]; // get file
            var filename = file.name;
            var user_id = $("#user_id").val();
            var group = 11;
            var formData = new FormData();
            formData.append('file', $("#file_u_jo")[0].files[0]);
            formData.append('user_id', user_id);
            formData.append('filename', filename);
            formData.append('group', group);
            $.ajax({
                url: ROOT + 'market_ajax/do_upload/', //URL submit
                type: "post", //method Submit
                data: formData, //penggunaan FormData
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    alert("Upload Berhasil."); //alert jika upload berhasil
                    $('#file_u_jo').val("");
                    $('#tableJo').DataTable().ajax.reload();
                }
            });
        });

        $('#submit-btn-visa').click(function () {
            var file = $("#file_u_visa")[0].files[0]; // get file
            var filename = file.name;
            var user_id = $("#user_id").val();
            var group = 12;
            var formData = new FormData();
            formData.append('file', $("#file_u_visa")[0].files[0]);
            formData.append('user_id', user_id);
            formData.append('filename', filename);
            formData.append('group', group);
            $.ajax({
                url: ROOT + 'market_ajax/do_upload/', //URL submit
                type: "post", //method Submit
                data: formData, //penggunaan FormData
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    alert("Upload Berhasil."); //alert jika upload berhasil
                    $('#file_u_visa').val("");
                    $('#tableVisa').DataTable().ajax.reload();
                }
            });
        });

        $('#submit-btn-tiket').click(function () {
            var file = $("#file_u_tiket")[0].files[0]; // get file
            var filename = file.name;
            var user_id = $("#user_id").val();
            var group = 13;
            var formData = new FormData();
            formData.append('file', $("#file_u_tiket")[0].files[0]);
            formData.append('user_id', user_id);
            formData.append('filename', filename);
            formData.append('group', group);
            $.ajax({
                url: ROOT + 'market_ajax/do_upload/', //URL submit
                type: "post", //method Submit
                data: formData, //penggunaan FormData
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    alert("Upload Berhasil."); //alert jika upload berhasil
                    $('#file_u_tiket').val("");
                    $('#tableTiket').DataTable().ajax.reload();
                }
            });
        });

        $('#tableJo').DataTable({
            responsive: true,
            sDom: 'lrtip',
            searching: false,
            paging: false,
            info: false,
            ajax: {
                "url": ROOT + "/market_ajax/jo_get/" + user_id,
                "dataSrc": function (json) {
                    var data = [];
                    var no = 1;
                    for (var i = 0, ien = json.data.length; i < ien; i++) {
                        var value = [];
                        value[0] = no++;
                        value[1] = json.data[i]['name'];
                        value[2] = json.data[i]['group'];
                        value[3] = '<a href="' + ROOT + 'assets/images/market/' + json.data[i]['file'] + '" target="_blank" class="btn btn-default btn-sm"><span class="fa fa-download"></span>&nbsp;Downloads</a>';
                        value[4] = '<button class="btn btn-sm btn-danger" type="submit" onclick="delete_market(' + json.data[i]['id'] + ')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                        data[i] = value;
                    }
                    console.log(data);
                    return data;
                }
            }
        });

        $('#tableVisa').DataTable({
            responsive: true,
            sDom: 'lrtip',
            searching: false,
            paging: false,
            info: false,
            ajax: {
                "url": ROOT + "/market_ajax/visa_get/" + user_id,
                "dataSrc": function (json) {
                    var data = [];
                    var no = 1;
                    for (var i = 0, ien = json.data.length; i < ien; i++) {
                        var value = [];
                        value[0] = no++;
                        value[1] = json.data[i]['name'];
                        value[2] = json.data[i]['group'];
                        value[3] = '<a href="' + ROOT + 'assets/images/market/' + json.data[i]['file'] + '" target="_blank" class="btn btn-default btn-sm"><span class="fa fa-download"></span>&nbsp;Downloads</a>';
                        value[4] = '<button class="btn btn-sm btn-danger" type="submit" onclick="delete_market(' + json.data[i]['id'] + ')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                        data[i] = value;
                    }
                    console.log(data);
                    return data;
                }
            }
        });

        $('#tableTiket').DataTable({
            responsive: true,
            sDom: 'lrtip',
            searching: false,
            paging: false,
            info: false,
            ajax: {
                "url": ROOT + "/market_ajax/tiket_get/" + user_id,
                "dataSrc": function (json) {
                    var data = [];
                    var no = 1;
                    for (var i = 0, ien = json.data.length; i < ien; i++) {
                        var value = [];
                        value[0] = no++;
                        value[1] = json.data[i]['name'];
                        value[2] = json.data[i]['group'];
                        value[3] = '<a href="' + ROOT + 'assets/images/market/' + json.data[i]['file'] + '" target="_blank" class="btn btn-default btn-sm"><span class="fa fa-download"></span>&nbsp;Downloads</a>';
                        value[4] = '<button class="btn btn-sm btn-danger" type="submit" onclick="delete_market(' + json.data[i]['id'] + ')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                        data[i] = value;
                    }
                    console.log(data);
                    return data;
                }
            }
        });

        function delete_market(id) {
            if (confirm('Are you sure to delete..?')) {
                $.ajax({
                    url: ROOT + 'dashboard_ajax/upload_delete/',
                    dataType: 'json',
                    type: 'post',
                    data: {
                        id: id
                    }
                })
                    .done(function (data) {
                        if (data.is_error) {
                            alert(data.error_message);
                            return;
                        }
                        $('#tableJo').DataTable().ajax.reload();
                        $('#tableVisa').DataTable().ajax.reload();
                        $('#tableTiket').DataTable().ajax.reload();
                    })
                    .always(function () {
                        // $('#buy_button_loading').addClass('d-none');
                        // $('#buy_button').removeClass('d-none');
                    })
                    .error(function (data) {

                    })
            }
        }

    </script>




    <?php
    $this->load->view('layout/footer');
    ?>
