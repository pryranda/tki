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
            <h1 class="page-header">Form <?php if ($negara_by) {
                    echo $negara_by->negara;
                } ?></h1>
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
                                   } ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Sponsor</label>
                            <input type="text" name="sponsor" id="sponsor" class="form-control"
                                   placeholder="Sponsor" value="<?php if ($values) {
                                echo $values->sponsor;
                            } ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group ">
                            <label>NP</label>
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
                    <div class="col-md-12 col-sm-12">
                        <hr>
                    </div>
                    <div class="search-result-item col-md-12">
                        <div class="col-sm-2">
                            <?php
                            $photo = !empty($values->photo) ? base_url() . 'assets/images/' . $values->file_photo : 'http://www.placehold.it/200x220/EFEFEF/AAAAAA&text=no+image';
                            ?>
                            <a href="#">
                                <img id="photo_u" class="search-result-image img-responsive" src="<?php echo $photo ?>">
                            </a>
                            <button id="addPhoto" class="btn btn-primary margin center-block" type="button"
                                    data-toggle="modal" data-target="#addModalPhoto">&nbsp;Upload
                            </button>
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
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Nationality</label>
                            <input type="text" name="nationality" id="nationality" class="form-control" placeholder="nationality"
                                   value="<?php if ($bio_sgp) {
                                       echo $bio_sgp->nationality;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Airport</label>
                            <input type="text" name="airport" id="airport" class="form-control" placeholder="Airport"
                                   value="<?php if ($bio_sgp) {
                                       echo $bio_sgp->airport;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <hr>
                        MEDICAL HISTORY
                    </div>
                        <div class="col-md-3 col-sm-3">
                            <br>
                            <div class="form-group input-group-sm">
                                <label>Alergies (If Any)</label>
                                <input type="text" name="alergies" id="alergies" class="form-control" placeholder="Alergies"
                                       value="<?php if ($bio_sgp) {
                                           echo $bio_sgp->alergies;
                                       } ?>">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <br>
                            <div class="form-group input-group-sm">
                                <label>Physical Disabilities</label>
                                <input type="text" name="physical_dis" id="physical_dis" class="form-control" placeholder="Disabilities"
                                       value="<?php if ($bio_sgp) {
                                           echo $bio_sgp->physical_dis;
                                       } ?>">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <br>
                            <div class="form-group input-group-sm">
                                <label>Dietary Restriction</label>
                                <input type="text" name="dietary" id="dietary" class="form-control" placeholder="Dietary"
                                       value="<?php if ($bio_sgp) {
                                           echo $bio_sgp->dietary;
                                       } ?>">
                            </div>
                        </div>
                    <div class="col-md-12 col-sm-12">
                        <hr>
                        <p>Foon handling Preference:</p>
                        <?php
                        foreach ($food as $row) {
                            $check = "";
                            if ($row->user_id) {
                                $check = "checked";
                            }
                            ?>
                            <div class="col-md-2 col-sm-2">
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $check ?> id="food<?= $row->id ?>"
                                           onclick="set_food(<?= $row->id ?>)"
                                           value="<?= $row->id ?>"> <?= $row->food ?>
                                </label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <hr>
                        <p>Past and existing illnesses (including chronic ailments and illnesses requiring medication):</p>
                        <?php
                        foreach ($illness as $row) {
                            $check = "";
                            if ($row->user_id) {
                                $check = "checked";
                            }
                            ?>
                            <div class="col-md-2 col-sm-2">
                                <label class="checkbox-inline">
                                    <input type="checkbox" <?= $check ?> id="illness<?= $row->id ?>"
                                           onclick="set_illness(<?= $row->id ?>)"
                                           value="<?= $row->id ?>"> <?= $row->illness ?>
                                </label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
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
                                           value="<?= $row->id ?>" disabled> <?= $row->keterampilan ?>
                                </label>
                            </div>
                            <?php
                        }
                        ?>
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
                                            disabled>Tidak Bisa
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
                                                } ?> disabled>Sedikit
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
                                                } ?> disabled>Bisa
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
                        PENGALAMAN KERJA
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <table id="tableKer" class="table table-striped table-sm">
                            <thead>
                            <tr>
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
                        FEED BACK
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <br>
                        <div class="form-group">
                            <label>Employer 1</label>
                            <textarea name="feedback1" id="feedback1" class="form-control" rows="2"><?php if ($bio_sgp) {
                                    echo $bio_sgp->feedback1;
                                } ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <br>
                        <div class="form-group">
                            <label>Employer 2</label>
                            <textarea name="feedback2" id="feedback2" class="form-control" rows="2"><?php if ($bio_sgp) {
                                    echo $bio_sgp->feedback2;
                                } ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <br>
                        <div class="form-group">
                            <label>Other Remarks</label>
                            <textarea name="other_remarks" id="other_remarks" class="form-control" rows="2"><?php if ($bio_sgp) {
                                    echo $bio_sgp->other_remarks;
                                } ?></textarea>
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


    <script>
        var set_illness = function (id) {
            var user_id = $("#user_id").val();
            $val = $('#illness' + id).is(":checked");
            var value = 0; //uncheck
            alert(user_id);
            alert(id);


            if ($val) {
                value = 1; //checked
            }
            alert(value);
            $.ajax({
                url: ROOT + 'biodata_ajax/ajax_set_illness',
                type: 'post',
                dataType: 'json',
                data: {
                    "value": value,
                    "illness": id,
                    "user_id": user_id
                }
            })
                .done(function (data) {
                    if (data.is_error == 1) {
                        alert_error(data.error_message);
                        return;
                    }
                    console.log(data);
                })
        }

        var set_food = function (id) {
            var user_id = $("#user_id").val();
            $val = $('#food' + id).is(":checked");
            var value = 0; //uncheck
            alert(user_id);
            alert(id);

            if ($val) {
                value = 1; //checked
            }
            alert(value);
            $.ajax({
                url: ROOT + 'biodata_ajax/ajax_set_food',
                type: 'post',
                dataType: 'json',
                data: {
                    "value": value,
                    "food": id,
                    "user_id": user_id
                }
            })
                .done(function (data) {
                    if (data.is_error == 1) {
                        alert_error(data.error_message);
                        return;
                    }
                    console.log(data);
                })
        }
    </script>
    <script type="text/javascript">
        var id = $("#aksi").val();
        var user_id = $("#user_id").val();

        $("#submit-btn").click(function () {
            update();
        });

        function update() {
            $.ajax({
                url: ROOT + '/biodata_ajax/bio_update',
                dataType: 'json',
                type: 'post',
                data: {
                    nationality: $('#nationality').val(),
                    airport: $('#airport').val(),
                    alergies: $('#alergies').val(),
                    physical_dis: $('#physical_dis').val(),
                    dietary: $('#dietary').val(),
                    feedback1: $('#feedback1').val(),
                    feedback2: $('#feedback2').val(),
                    other_remarks: $('#other_remarks').val(),
                    id: user_id
                }
            })
                .done(function (data) {
                    if (data.is_error) {
                        alert(data.error_message);
                        return false;
                    }
                    window.location = ROOT + 'data_tki_bio';
                })
            // .always(function(){
            //     // $('#buy_button_loading').addClass('d-none');
            //     // $('#buy_button').removeClass('d-none');
            // })
            // .error(function(data){
            //     }
            // );
        }

        $('#submit-btn-photo').click(function () {
            var file = $("#file_u_photo")[0].files[0]; // get file
            var filename = file.name;
            var user_id = $("#user_id").val();
            var formData = new FormData();
            formData.append('file', $("#file_u_photo")[0].files[0]);
            formData.append('user_id', user_id);
            formData.append('filename', filename);
            $.ajax({
                url: ROOT + 'biodata_ajax/do_upload/', //URL submit
                type: "post", //method Submit
                data: formData, //penggunaan FormData
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    alert("Upload Image Berhasil."); //alert jika upload berhasil
                }
            });
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
                "url": ROOT + "/dashboard_ajax/ker_get/" + user_id,
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
    </script>


    <!-- Modal -->
    <div class="modal fade" id="addModalPhoto" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Data Calon TKI</h4>
                </div>
                <div class="modal-body">
                    <form id="submit_photo" class="panel-body" enctype="multipart/form-data">
                        <div class="form-group input-group-sm">
                            <label class="btn btn-default">
                                <input type="file" name="file" id="file_u_photo">
                            </label>
                        </div>
                        <input id="submit-btn-photo" class="btn btn-default margin" type="button" data-dismiss="modal">
                        <span class="fa fa-check"></span> &nbsp;Submit
                        </input>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <?php
    $this->load->view('layout/footer');
    ?>
