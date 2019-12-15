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
            <li class="active">Register</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Form Registration</h1>
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
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                   placeholder="Nama Lengkap" value="<?php if ($values) {
                                echo $values->nama_lengkap;
                            } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control"
                                   placeholder="Tempat Lahir" value="<?php if ($values) {
                                echo $values->tempat_lahir;
                            } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control"
                                   placeholder="Tanggal Lahir" value="<?php if ($values) {
                                echo $values->tgl_lahir;
                            } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group ">
                            <label>Jenis Kelamin </label>
                            <select name="jk" id="jk" class="form-control input-sm">
                                <option value=<?php if ($values) {
                                    echo $values->jenis_kelamin;
                                } ?>><?php if ($values) { ?><?= get_text_gender($values->jenis_kelamin) ?><?php } ?></option>
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
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
                            <label>No Ktp</label>
                            <input type="number" name="no_ktp" id="no_ktp" class="form-control"
                                   placeholder="Nomor KTP" value="<?php if ($values) {
                                echo $values->no_ktp;
                            } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>No KK</label>
                            <input type="number" name="no_kk" id="no_kk" class="form-control" placeholder="Nomor KK"
                                   value="<?php if ($values) {
                                       echo $values->no_kk;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Jumlah Kakak</label>
                            <input type="text" name="kakak" id="kakak" class="form-control" placeholder="Jumlah Kakak"
                                   value="<?php if ($values) {
                                       echo $values->jml_kakak;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Jumlah Adik</label>
                            <input type="text" name="adik" id="adik" class="form-control" placeholder="Jumlah Adik"
                                   value="<?php if ($values) {
                                       echo $values->jml_adik;
                                   } ?>">
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
                            <label>No Ijasah</label>
                            <input type="text" name="ijasah" id="ijasah" class="form-control"
                                   placeholder="Nomor Ijasah" value="<?php if ($values) {
                                echo $values->no_ijasah;
                            } ?>">
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
                        <div class="form-group input-group-sm">
                            <label>No Telp</label>
                            <input type="number" name="no_tlp" id="no_tlp" class="form-control"
                                   placeholder="No Telp" value="<?php if ($values) {
                                echo $values->no_telp;
                            } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Tinggi (cm)</label>
                            <input type="number" name="tinggi" id="tinggi" class="form-control"
                                   placeholder="Tinggi Badan" value="<?php if ($values) {
                                echo $values->tinggi;
                            } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Berat (kg)</label>
                            <input type="number" name="berat" id="berat" class="form-control"
                                   placeholder="Berat Badan" value="<?php if ($values) {
                                echo $values->berat;
                            } ?>">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <hr>
                        PENGETAHUAN BAHASA
                    </div>
                    <?php
                    foreach ($bahasa_val as $bhs) {
                        ?>
                        <div class="bahasaio" id="bahasa<?= $bhs->id ?>">
                            <div class="col-md-12 col-sm-12">
                                <br>
                                <div class="col-md-3 col-sm-3">
                                    <label><?= $bhs->bahasa ?></label>
                                </div>
                                <div class="col-md-3 col-md-3">
                                    <p class="p-v-xs col m2">
                                        <label class="radio-inline">
                                            <input class="with-gap" name="bahasa<?= $bhs->id ?>" type="radio"
                                                   id="<?= $bhs->id ?>" value="1"
                                                <?php if ($bhs->kemampuan_val == 1) {
                                                    echo "checked";
                                                } ?>
                                            >Tidak Bisa
                                        </label>
                                    </>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <p class="p-v-xs col m2">
                                        <label class="radio-inline">
                                            <input class="with-gap" name="bahasa<?= $bhs->id ?>" type="radio"
                                                   id="<?= $bhs->id ?>" value="2"
                                                <?php if ($bhs->kemampuan_val == 2) {
                                                    echo "checked";
                                                } ?>>Sedikit
                                        </label>
                                    </p>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <p class="p-v-xs col m2">
                                        <label class="radio-inline">
                                            <input class="with-gap" name="bahasa<?= $bhs->id ?>" type="radio"
                                                   id="<?= $bhs->id ?>" value="3"
                                                <?php if ($bhs->kemampuan_val == 3) {
                                                    echo "checked";
                                                } ?>>Bisa
                                        </label>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="col-md-12 col-sm-12">
                        <hr>
                        KETERAMPILAN
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <br>
                        <?php
                        foreach ($keterampilan as $row) {
                            $check = "";
                            if ($row->user_id) {
                                $check = "checked";
                            }
                            ?>
                            <div class="col-md-2 col-sm-2">
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $check ?> id="keterampilan<?= $row->id ?>"
                                           onclick="set_keterampilan(<?= $row->id ?>)"
                                           value="<?= $row->id ?>"> <?= $row->keterampilan ?>
                                </label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <hr>
                        DATA KELUARGA
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <br>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group input-group-sm">
                                <select name="status_kk" id="status_kk" class="form-control input-sm">
                                    <option value="0">Pilih Status</option>
                                    <option value="1">Ayah</option>
                                    <option value="2">Ibu</option>
                                    <option value="3">Suami</option>
                                    <option value="4">Istri</option>
                                    <option value="5">Anak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group input-group-sm">
                                <input type="text" name="nama_kk" id="nama_kk" class="form-control"
                                       placeholder="Nama Lengkap">
                            </div>

                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group input-group-sm">
                                <input type="number" name="umur_kk" id="umur_kk" class="form-control"
                                       placeholder="Umur">
                            </div>
                        </div>
                        <div class="form-group input-group-sm">
                            <button id="add_kk" class="btn btn-default margin btn-sm" type="button"><span
                                        class="fa fa-plus"></span> &nbsp;Add
                            </button>
                        </div>

                        <table id="tableKK" class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <!--                                <th><input type="checkbox" id="checkedAll"/></th>-->
                                <th>No</th>
                                <th>Status</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <hr>
                        PENGALAMAN KERJA
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <br>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group input-group-sm">
                                <select name="peng_negara" id="peng_negara" class="form-control input-sm">
                                    <option value="0">Pilih Negara</option>
                                    <option value="1">Arab Saudi</option>
                                    <option value="2">Singapura</option>
                                    <option value="3">Malaysia</option>
                                    <option value="4">Taiwan</option>
                                    <option value="5">Hongkong</option>
                                    <option value="6">Jakarta</option>
                                    <option value="7">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <div class="form-group input-group-sm">
                                <input type="number" name="dari" id="dari" class="form-control"
                                       placeholder="Dari Tahun">
                            </div>

                        </div>
                        <div class="col-md-2 col-sm-2">
                            <div class="form-group input-group-sm">
                                <input type="number" name="sampai" id="sampai" class="form-control"
                                       placeholder="Sampai Tahun">
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <div class="form-group input-group-sm">
                                <input type="text" name="peng_kota" id="peng_kota" class="form-control"
                                       placeholder="Kota">
                            </div>
                        </div>
                        <div class="form-group input-group-sm">
                            <button id="add_ker" class="btn btn-default margin btn-sm" type="button"><span
                                        class="fa fa-plus"></span> &nbsp;Add
                            </button>
                        </div>

                        <table id="tableKer" class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <!--                                <th><input type="checkbox" id="checkedAll"/></th>-->
                                <th>No</th>
                                <th>Negara</th>
                                <th>Dari (thn)</th>
                                <th>Sampai (thn)</th>
                                <th>Kota</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <hr>
                        Data Medical
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <br>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group ">
                                <label>Hasil</label>
                                <select name="hasil_medical" id="hasil_medical" class="form-control input-sm">
                                    <option value=<?php if ($values) {
                                        echo $values->medical_status;
                                    } ?>><?php if ($values) { ?><?= get_text_medical($values->medical_status) ?><?php } ?></option>

                                    <option value="1">FIT</option>
                                    <option value="2">UNFIT</option>
                                    <option value="3">PENDING</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group input-group-sm">
                                <label>Tanggal Finger Medical</label>
                                <input type="date" name="tgl_medical" id="tgl_medical"
                                       class="form-control" value="<?php if ($values) {
                                    echo $values->tgl_finger_medical;
                                } ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <hr>
                            <button id="submit-btn" class="btn btn-lg btn-primary pull-left">Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">Lampiran</div>
                <form id="submit" class="panel-body">
                    <div class="col-md-12 col-sm-12">
                        <br>
                        <form id="submit" class="panel-body" enctype="multipart/form-data">
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group input-group-sm">
                                <select name="jenis_file" id="jenis_file" class="form-control input-sm">
                                    <option value="0">Pilih Jenis</option>
                                    <option value="1">KTP</option>
                                    <option value="2">KK</option>
                                    <option value="3">IJASAH</option>
                                    <option value="4">AKTE</option>
                                    <option value="5">SURAT IZIN</option>
                                    <option value="6">BUKU NIKAH</option>
                                    <option value="7">MEDICAL</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group input-group-sm">
                                <label class="btn btn-default">
                                    <input type="file" name="file" id="file_u">
                                </label>
                            </div>
                        </div>
                        <div class="form-group input-group-sm">
                            <button id="btn-upload" class="btn btn-default margin btn-sm" type="button"><span
                                        class="fa fa-plus"></span> &nbsp;Add
                            </button>
                        </div>
                        </form>
                        <table id="tableUpload" class="table table-striped table-sm">
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
                    </div>
            </div>
        </div>
    </div>

    <script>
        var set_keterampilan = function (id) {
            var user_id = $("#user_id").val();
            // alert(id); // id keterampilan
            $val = $('#keterampilan' + id).is(":checked");
            // console.log($val);
            // alert($val); // true or false
            var value = 0; //uncheck
            if ($val) {
                value = 1; //checked
            }
            $.ajax({
                url: ROOT + 'dashboard_ajax/ajax_set_keterampilan',
                type: 'post',
                dataType: 'json',
                data: {
                    "value": value,
                    "keterampilan": id,
                    "user_id": user_id
                }
            })
                .done(function (data) {
                    if (data.is_error == 1) {
                        alert_error(data.error_message);
                        return;
                    }
                    console.log(data);
                    // alert('okkkk');
                })
            // alert('ada salah 2');
        }
    </script>
    <script>
        $(function () {
            $('#bahasa1').on('change', function () {
                var bahasa1_val = $('input[name=bahasa1]:checked', '#bahasa1').val();
                var user_id = $("#user_id").val();
                var bahasa_id = 1;
                $.ajax({
                    url: ROOT + 'dashboard_ajax/ajax_set_bahasa',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "bahasa1_val": bahasa1_val,
                        "user_id": user_id,
                        "bahasa_id": bahasa_id
                    }
                })
                    .done(function (data) {
                        if (data.is_error == 1) {
                            alert_error(data.error_message);
                            return;
                        }
                        console.log(data);
                        // alert('okkkk');
                    })
            });

            $('#bahasa2').on('change', function () {
                var bahasa1_val = $('input[name=bahasa2]:checked', '#bahasa2').val();
                var user_id = $("#user_id").val();
                var bahasa_id = 2;
                $.ajax({
                    url: ROOT + 'dashboard_ajax/ajax_set_bahasa',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "bahasa1_val": bahasa1_val,
                        "user_id": user_id,
                        "bahasa_id": bahasa_id
                    }
                })
                    .done(function (data) {
                        if (data.is_error == 1) {
                            alert_error(data.error_message);
                            return;
                        }
                        console.log(data);
                        alert('okkkk');
                    })
            });

            $('#bahasa3').on('change', function () {
                var bahasa1_val = $('input[name=bahasa3]:checked', '#bahasa3').val();
                var user_id = $("#user_id").val();
                var bahasa_id = 3;
                $.ajax({
                    url: ROOT + 'dashboard_ajax/ajax_set_bahasa',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "bahasa1_val": bahasa1_val,
                        "user_id": user_id,
                        "bahasa_id": bahasa_id
                    }
                })
                    .done(function (data) {
                        if (data.is_error == 1) {
                            alert_error(data.error_message);
                            return;
                        }
                        console.log(data);
                        alert('okkkk');
                    })
            });

            $('#bahasa4').on('change', function () {
                var bahasa1_val = $('input[name=bahasa4]:checked', '#bahasa4').val();
                var user_id = $("#user_id").val();
                var bahasa_id = 4;
                $.ajax({
                    url: ROOT + 'dashboard_ajax/ajax_set_bahasa',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "bahasa1_val": bahasa1_val,
                        "user_id": user_id,
                        "bahasa_id": bahasa_id
                    }
                })
                    .done(function (data) {
                        if (data.is_error == 1) {
                            alert_error(data.error_message);
                            return;
                        }
                        console.log(data);
                        alert('okkkk');
                    })
            });
        });
    </script>

    <script type="text/javascript">

        $("#add_kk").click(function () {
            var status = $('#status_kk').val();
            var nama = $('#nama_kk').val();
            var umur = $('#umur_kk').val();
            var user_id = $("#user_id").val();
            $.ajax({
                url: ROOT + '/dashboard_ajax/ajax_addkk',
                dataType: 'json',
                type: 'post',
                data: {
                    status: status,
                    nama: nama,
                    umur: umur,
                    user_id: user_id,
                }
            })
                .done(function (data) {
                    if (data.is_error) {
                        alert(data.error_message);
                        return;
                    }
                    // alert(data.id);
                    // alert('yyyyy');
                    // window.location = ROOT+'dashboard/pendaftaran';
                    // #("#add_kk").hidefocus = true ;
                    $("#status_kk").val(0);
                    $("#nama_kk").val("");
                    $("#umur_kk").val("");
                    $('#tableKK').DataTable().ajax.reload();
                })
                .always(function () {
                    // $('#buy_button_loading').addClass('d-none');
                    // $('#buy_button').removeClass('d-none');
                })
                .error(function (data) {

                })
        });

        function delete_kk(id) {
            if (confirm('Are you sure to delete..?')) {
                $.ajax({
                    url: ROOT + 'dashboard_ajax/kk_delete/',
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
                        $('#tableKK').DataTable().ajax.reload();
                    })
                    .always(function () {
                        // $('#buy_button_loading').addClass('d-none');
                        // $('#buy_button').removeClass('d-none');
                    })
                    .error(function (data) {

                    })
            }
        }

        $("#add_ker").click(function () {
            alert('imam');
            var negara = $('#peng_negara').val();
            var dari = $('#dari').val();
            var sampai = $('#sampai').val();
            var kota = $("#peng_kota").val();
            var user_id = $("#user_id").val();
            $.ajax({
                url: ROOT + '/dashboard_ajax/ajax_addker',
                dataType: 'json',
                type: 'post',
                data: {
                    negara: negara,
                    dari: dari,
                    sampai: sampai,
                    kota: kota,
                    user_id: user_id,
                }
            })
                .done(function (data) {
                    if (data.is_error) {
                        alert(data.error_message);
                        return;
                    }
                    $("#peng_negara").val(0);
                    $("#dari").val("");
                    $("#sampai").val("");
                    $("#peng_kota").val("");
                    $('#tableKer').DataTable().ajax.reload();
                })
                .always(function () {
                    // $('#buy_button_loading').addClass('d-none');
                    // $('#buy_button').removeClass('d-none');
                })
                .error(function (data) {

                })
        });

        $('#btn-upload').click(function(){
            var file = $("#file_u")[0].files[0]; // get file
            var filename = file.name;
            var user_id = $("#user_id").val();
            var jenis_file = $("#jenis_file").val();
            var formData = new FormData();
            formData.append('file', $("#file_u")[0].files[0]);
            formData.append('user_id', user_id);
            formData.append('jenis_file', jenis_file);
            formData.append('filename', filename);
            $.ajax({
                url:ROOT + 'dashboard_ajax/do_upload/', //URL submit
                type:"post", //method Submit
                data:formData, //penggunaan FormData
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(data){
                    alert("Upload Image Berhasil."); //alert jika upload berhasil
                    $("#file_u").val("");
                    $("#jenis_file").val("");
                    $('#tableUpload').DataTable().ajax.reload();
                }
            });
        });

        // $("#file_u").on("change", function(){
        //     var file = this.files[0],
        //         fileName = file.name,
        //         fileSize = file.size;
        //     alert("Uploading: "+fileName+" @ "+fileSize+"bytes");
        //     CustomFileHandlingFunction(file);
        // });

        function delete_ker(id) {
            if (confirm('Are you sure to delete..?')) {
                $.ajax({
                    url: ROOT + 'dashboard_ajax/ker_delete/',
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
                        $('#tableKer').DataTable().ajax.reload();
                    })
                    .always(function () {
                        // $('#buy_button_loading').addClass('d-none');
                        // $('#buy_button').removeClass('d-none');
                    })
                    .error(function (data) {

                    })
            }
        }

        function delete_upload(id) {
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
                        $('#tableUpload').DataTable().ajax.reload();
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
    <script>
        $(function () {
            'use strict';
            var id = $('#user_id').val();
            $('#tableKK').DataTable({
                responsive: true,
                sDom: 'lrtip',
                searching: false,
                paging: false,
                info: false,
                // language: {
                //     searchPlaceholder: 'Search...',
                //     sSearch: '',
                //     lengthMenu: '_MENU_ items/page',
                // },
                // "scrollX": true,
                ajax: {
                    "url": ROOT + "/dashboard_ajax/kk_get/" + id,
                    "dataSrc": function (json) {
                        var data = [];
                        var no = 1;
                        for (var i = 0, ien = json.data.length; i < ien; i++) {
                            var value = [];
                            value[0] = no++;
                            value[1] = json.data[i]['status'];
                            value[2] = json.data[i]['nama'];
                            value[3] = json.data[i]['umur'];
                            value[4] = '<button class="btn btn-sm btn-danger" type="submit" onclick="delete_kk(' + json.data[i]['id'] + ')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                            // <button id="submit-btn" type="submit" class="btn btn-lg btn-primary pull-left">Submit</button>
                            data[i] = value;
                        }
                        console.log(data);
                        return data;
                    }
                }
            });

            $('#tableKer').DataTable({
                responsive: true,
                sDom: 'lrtip',
                searching: false,
                paging: false,
                info: false,
                // language: {
                //     searchPlaceholder: 'Search...',
                //     sSearch: '',
                //     lengthMenu: '_MENU_ items/page',
                // },
                // "scrollX": true,
                ajax: {
                    "url": ROOT + "/dashboard_ajax/ker_get/" + id,
                    "dataSrc": function (json) {
                        var data = [];
                        var no = 1;
                        for (var i = 0, ien = json.data.length; i < ien; i++) {
                            var value = [];
                            value[0] = no++;
                            value[1] = json.data[i]['peng_negara'];
                            value[2] = json.data[i]['dari'];
                            value[3] = json.data[i]['sampai'];
                            value[4] = json.data[i]['kota'];
                            value[5] = '<button class="btn btn-sm btn-danger" type="submit" onclick="delete_ker(' + json.data[i]['id'] + ')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                            // <button id="submit-btn" type="submit" class="btn btn-lg btn-primary pull-left">Submit</button>
                            data[i] = value;
                        }
                        console.log(data);
                        return data;
                    }
                }
            });

            $('#tableUpload').DataTable({
                responsive: true,
                sDom: 'lrtip',
                searching: false,
                paging: false,
                info: false,
                // language: {
                //     searchPlaceholder: 'Search...',
                //     sSearch: '',
                //     lengthMenu: '_MENU_ items/page',
                // },
                // "scrollX": true,
                ajax: {
                    "url": ROOT + "/dashboard_ajax/upload_get/" + id,
                    "dataSrc": function (json) {
                        var data = [];
                        var no = 1;
                        for (var i = 0, ien = json.data.length; i < ien; i++) {
                            var value = [];
                            value[0] = no++;
                            value[1] = json.data[i]['name'];
                            value[2] = json.data[i]['group'];
                            value[3] = '<a href="' + ROOT + 'assets/images/lampiran/' + json.data[i]['file'] + '" target="_blank" class="btn btn-default btn-sm"><span class="fa fa-download"></span>&nbsp;Downloads</a>';
                            value[4] = '<button class="btn btn-sm btn-danger" type="submit" onclick="delete_upload(' + json.data[i]['id'] + ')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                            data[i] = value;
                        }
                        console.log(data);
                        return data;
                    }
                }
            });

        });

    </script>


    <script type="text/javascript">
        var id = $("#aksi").val();
        var user_id = $("#user_id").val();

        $("#submit-btn").click(function () {
            if (id != 0) {
                update();
            } else {
                insert();
            }
        });

        function insert() {
            $.ajax({
                url: ROOT + '/dashboard_ajax/register_insert',
                dataType: 'json',
                type: 'post',
                data: {
                    negara: $('#negara').val(),
                    tgl_msk: $('#tgl_msk').val(),
                    sponsor: $('#sponsor').val(),
                    np: $('#np').val(),
                    nama: $('#nama').val(),
                    tmp_lahir: $('#tmp_lahir').val(),
                    tgl_lahir: $('#tgl_lahir').val(),
                    jk: $('#jk').val(),
                    alamat: $('#alamat').val(),
                    no_ktp: $('#no_ktp').val(),
                    no_kk: $('#no_kk').val(),
                    kakak: $('#kakak').val(),
                    adik: $('#adik').val(),
                    pendidikan: $('#pendidikan').val(),
                    ijasah: $('#ijasah').val(),
                    status: $('#status').val(),
                    agama: $('#agama').val(),
                    no_tlp: $('#no_tlp').val(),
                    tinggi: $('#tinggi').val(),
                    berat: $('#berat').val(),
                }
            })
                .done(function (data) {
                    if (data.is_error) {
                        alert(data.error_message);
                        return;
                    }
                    window.location = ROOT + 'pendaftaran';
                })
                .always(function () {
                    // $('#buy_button_loading').addClass('d-none');
                    // $('#buy_button').removeClass('d-none');
                })
                .error(function (data) {

                });
        }

        function update() {
            $.ajax({
                url: ROOT + '/dashboard_ajax/register_update',
                dataType: 'json',
                type: 'post',
                data: {
                    negara: $('#negara').val(),
                    tgl_msk: $('#tgl_msk').val(),
                    sponsor: $('#sponsor').val(),
                    np: $('#np').val(),
                    nama: $('#nama').val(),
                    tmp_lahir: $('#tmp_lahir').val(),
                    tgl_lahir: $('#tgl_lahir').val(),
                    jk: $('#jk').val(),
                    alamat: $('#alamat').val(),
                    no_ktp: $('#no_ktp').val(),
                    no_kk: $('#no_kk').val(),
                    kakak: $('#kakak').val(),
                    adik: $('#adik').val(),
                    pendidikan: $('#pendidikan').val(),
                    ijasah: $('#ijasah').val(),
                    status: $('#status').val(),
                    agama: $('#agama').val(),
                    no_tlp: $('#no_tlp').val(),
                    tinggi: $('#tinggi').val(),
                    berat: $('#berat').val(),
                    no_kode: $('#no_kode').val(),
                    hasil_medical: $('#hasil_medical').val(),
                    tgl_medical: $('#tgl_medical').val(),
                    pl: $('#pl').val(),
                    id: user_id
                }
            })
            .done(function (data) {
                if (data.is_error) {
                    alert(data.error_message);
                    return false;
                }
                window.location = ROOT + 'data_tki';
            })
            // .always(function(){
            //     // $('#buy_button_loading').addClass('d-none');
            //     // $('#buy_button').removeClass('d-none');
            // })
            // .error(function(data){
            //     }
            // );
        }

    </script>

    <?php
    $this->load->view('layout/footer');
    ?>
