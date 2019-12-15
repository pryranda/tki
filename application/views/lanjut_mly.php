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
            <li class="active">Proses Lanjut</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Proses Lanjut</h1>
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
                            <input type="text" name="nationality" id="nationality" class="form-control"
                                   placeholder="nationality"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->nationality;
                                   } ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group input-group-sm">
                            <label>Airport</label>
                            <input type="text" name="airport" id="airport" class="form-control" placeholder="Airport"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->airport;
                                   } ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <hr>
                        INPUT DATA PASPOR
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal Pembuatan Paspor</label>
                            <input type="date" name="tgl_paspor" id="tgl_paspor" class="form-control"
                                   value="<?php if ($values) {
                                       echo $values->tgl_paspor;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal Expired Paspor</label>
                            <input type="date" name="exp_paspor" id="exp_paspor" class="form-control"
                                   value="<?php if ($values) {
                                       echo $values->tgl_exp_paspor;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>No Paspor</label>
                            <input type="text" name="no_paspor" id="no_paspor" class="form-control" placeholder="No Paspor"
                                   value="<?php if ($values) {
                                       echo $values->no_paspor;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Daerah Pengeluaran Paspor</label>
                            <input type="text" name="daerah_paspor" id="daerah_paspor" class="form-control" placeholder="Daerah"
                                   value="<?php if ($values) {
                                       echo $values->daerah_paspor;
                                   } ?>">
                        </div>
                    </div>

                    <div class="search-result-item col-md-12">
                        <table id="tableRekom" class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Jenis File</th>
                                <th>Download</th>
                            </tr>
                            </thead>
                        </table>
                    </div><!--/.search-result-item-->
                    <div class="col-md-12 col-sm-12">
                        ASURANSI PRA
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>No Asuransi</label>
                            <input type="text" name="no_asuransi" id="no_asuransi" class="form-control"
                                   placeholder="No Asuransi"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->pra_no_asur;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal Asuransi</label>
                            <input type="date" name="tgl_asuransi" id="tgl_asuransi" class="form-control"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->pra_tgl_asur;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <hr>
                        ISC
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal ISC</label>
                            <input type="date" name="tgl_isc" id="tgl_isc" class="form-control"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->isc_tgl;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal ISC exp</label>
                            <input type="date" name="tgl_isc_exp" id="tgl_isc_exp" class="form-control"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->isc_tgl_exp;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Scan</label>
                            <button id="addISC" class="btn btn-default btn-sm form-control" type="button"
                                    data-toggle="modal" data-target="#addModalISC"><span class="fa fa-plus"></span> &nbsp;Upload ISC
                            </button>
                        </div>
                    </div>
                    <div class="search-result-item col-md-12">
                        <table id="tableISC" class="table table-striped table-sm">
                            <thead>
                            <tr>
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
                        FINGER BLK
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal Buka</label>
                            <input type="date" name="tgl_buka_finger" id="tgl_buka_finger" class="form-control"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->finger_tgl_buka;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal Tutup</label>
                            <input type="date" name="tgl_tutup_finger" id="tgl_tutup_finger" class="form-control"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->finger_tgl_tutup;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tempat BLK</label>
                            <input type="text" name="tempat_blk" id="tempat_blk" class="form-control"
                                   placeholder="Tempat BLK"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->finger_tempat;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <hr>
                        Ujian BLK
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal Ujian</label>
                            <input type="date" name="tgl_ujian" id="tgl_ujian" class="form-control"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->ujian_tgl;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Sertifikat</label>
                            <button id="addSertifikat" class="btn btn-default btn-sm form-control" type="button"
                                    data-toggle="modal" data-target="#addModalSertifikat"><span class="fa fa-plus"></span> &nbsp;Upload Hasil
                            </button>
                        </div>
                    </div>
                    <div class="search-result-item col-md-12">
                        <table id="tableSertifikat" class="table table-striped table-sm">
                            <thead>
                            <tr>
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
                        BESTINET
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal Bestinet</label>
                            <input type="date" name="tgl_bestinet" id="tgl_bestinet" class="form-control"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->bestinet_tgl;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal Bestinet exp</label>
                            <input type="date" name="tgl_bestinet_exp" id="tgl_bestinet_exp" class="form-control"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->bestinet_tgl_exp;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Scan</label>
                            <button id="addBestinet" class="btn btn-default btn-sm form-control" type="button"
                                    data-toggle="modal" data-target="#addModalBestinet"><span class="fa fa-plus"></span> &nbsp;Upload Bestinet
                            </button>
                        </div>
                    </div>
                    <div class="search-result-item col-md-12">
                        <table id="tableBestinet" class="table table-striped table-sm">
                            <thead>
                            <tr>
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
                        CHOP VISA
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal Chop Visa</label>
                            <input type="date" name="tgl_chop_visa" id="tgl_chop_visa" class="form-control"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->chop_visa_tgl;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Scan</label>
                            <button id="addChopvisa" class="btn btn-default btn-sm form-control" type="button"
                                    data-toggle="modal" data-target="#addModalChopvisa"><span class="fa fa-plus"></span> &nbsp;Upload Chop Visa
                            </button>
                        </div>
                    </div>
                    <div class="search-result-item col-md-12">
                        <table id="tableChopvisa" class="table table-striped table-sm">
                            <thead>
                            <tr>
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
                        ASURANSI PURNA
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal Asuransi Purna</label>
                            <input type="date" name="tgl_pur" id="tgl_pur" class="form-control"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->purna_tgl_asur;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>No Asuransi Purna</label>
                            <input type="text" name="no_asuransi_pur" id="no_asuransi_pur" class="form-control"
                                   placeholder="No Asuransi Purna"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->purna_no_asur;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Scan</label>
                            <button id="addAsurpra" class="btn btn-default btn-sm form-control" type="button"
                                    data-toggle="modal" data-target="#addModalAsurpra"><span class="fa fa-plus"></span> &nbsp;Upload Asuransi
                            </button>
                        </div>
                    </div>
                    <div class="search-result-item col-md-12">
                        <table id="tableAsurpra" class="table table-striped table-sm">
                            <thead>
                            <tr>
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
                        DAFTAR PAP
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tanggal PAP</label>
                            <input type="date" name="tgl_pap" id="tgl_pap" class="form-control"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->pap_tgl;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <div class="form-group input-group-sm">
                            <label>Tempat PAP</label>
                            <input type="text" name="tempat_pap" id="tempat_pap" class="form-control"
                                   placeholder="Tempat Fnance"
                                   value="<?php if ($bio_mly) {
                                       echo $bio_mly->pap_tempat;
                                   } ?>">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <hr>
                        HASIL PAP
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <br>
                        <select name="hsl_pap" id="hsl_pap" class="form-control input-sm">
                            <option value=<?php if ($bio_mly) {
                                echo $bio_mly->pap_hasil;
                            } ?>><?php if ($bio_mly->pap_hasil == 1) { echo 'Berhasil';}else{ echo 'Tidak'; } ?></option>
                            <option value="1">Berhasil</option>
                            <option value="2">Tidak</option>
                        </select>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <hr>
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

    <!-- Modal ISC-->
    <div class="modal fade" id="addModalISC" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah ISC</h4>
                </div>
                <div class="modal-body">
                    <form id="submit_isc" class="panel-body" enctype="multipart/form-data">
                        <div class="form-group input-group-sm">
                            <label class="btn btn-default">
                                <input type="file" name="file" id="file_u_isc">
                            </label>
                        </div>
                        <button id="submit-btn-isc" class="btn btn-default margin" type="button" data-dismiss="modal"><span
                                    class="fa fa-check"></span> &nbsp;Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  Sertifikat-->
    <div class="modal fade" id="addModalSertifikat" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Sertifikat</h4>
                </div>
                <div class="modal-body">
                    <form id="submit_sertifikat" class="panel-body" enctype="multipart/form-data">
                        <div class="form-group input-group-sm">
                            <label class="btn btn-default">
                                <input type="file" name="file" id="file_u_sertifikat">
                            </label>
                        </div>
                        <button id="submit-btn-sertifikat" class="btn btn-default margin" type="button" data-dismiss="modal"><span
                                    class="fa fa-check"></span> &nbsp;Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bestinet-->
    <div class="modal fade" id="addModalBestinet" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Bestinet</h4>
                </div>
                <div class="modal-body">
                    <form id="submit_bestinet" class="panel-body" enctype="multipart/form-data">
                        <div class="form-group input-group-sm">
                            <label class="btn btn-default">
                                <input type="file" name="file" id="file_u_bestinet">
                            </label>
                        </div>
                        <button id="submit-btn-bestinet" class="btn btn-default margin" type="button" data-dismiss="modal"><span
                                    class="fa fa-check"></span> &nbsp;Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Chop Visa-->
    <div class="modal fade" id="addModalChopvisa" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Chop Visa</h4>
                </div>
                <div class="modal-body">
                    <form id="submit_chopvisa" class="panel-body" enctype="multipart/form-data">
                        <div class="form-group input-group-sm">
                            <label class="btn btn-default">
                                <input type="file" name="file" id="file_u_chopvisa">
                            </label>
                        </div>
                        <button id="submit-btn-chopvisa" class="btn btn-default margin" type="button" data-dismiss="modal"><span
                                    class="fa fa-check"></span> &nbsp;Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Asuransi Pra-->
    <div class="modal fade" id="addModalAsurpra" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Asuransi Pra</h4>
                </div>
                <div class="modal-body">
                    <form id="submit_asurpra" class="panel-body" enctype="multipart/form-data">
                        <div class="form-group input-group-sm">
                            <label class="btn btn-default">
                                <input type="file" name="file" id="file_u_asurpra">
                            </label>
                        </div>
                        <button id="submit-btn-asurpra" class="btn btn-default margin" type="button" data-dismiss="modal"><span
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
                url: ROOT + '/lanjut_ajax/lanjut_mly_update',
                dataType: 'json',
                type: 'post',
                data: {
                    no_asuransi: $('#no_asuransi').val(),
                    tgl_asuransi: $('#tgl_asuransi').val(),
                    tgl_isc: $('#tgl_isc').val(),
                    tgl_isc_exp: $('#tgl_isc_exp').val(),
                    tgl_buka_finger: $('#tgl_buka_finger').val(),
                    tgl_tutup_finger: $('#tgl_tutup_finger').val(),
                    tempat_blk: $('#tempat_blk').val(),
                    tgl_ujian: $('#tgl_ujian').val(),
                    tgl_bestinet: $('#tgl_bestinet').val(),
                    tgl_bestinet_exp: $('#tgl_bestinet_exp').val(),
                    tgl_chop_visa: $('#tgl_chop_visa').val(),
                    tgl_pur: $('#tgl_pur').val(),
                    no_asuransi_pur: $('#no_asuransi_pur').val(),
                    tgl_pap: $('#tgl_pap').val(),
                    tempat_pap: $('#tempat_pap').val(),
                    hsl_pap: $('#hsl_pap').val(),
                    id: user_id
                }
            })
                .done(function (data) {
                    if (data.is_error) {
                        alert(data.error_message);
                        return false;
                    }
                    window.location = ROOT + 'data_lanjut';
                })
        }

        $('#submit-btn-isc').click(function () {
            var file = $("#file_u_isc")[0].files[0]; // get file
            var filename = file.name;
            var user_id = $("#user_id").val();
            var group = 13;
            var formData = new FormData();
            formData.append('file', $("#file_u_isc")[0].files[0]);
            formData.append('user_id', user_id);
            formData.append('filename', filename);
            formData.append('group', group);
            $.ajax({
                url: ROOT + 'lanjut_ajax/do_upload/', //URL submit
                type: "post", //method Submit
                data: formData, //penggunaan FormData
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    alert("Upload Berhasil."); //alert jika upload berhasil
                    $('#file_u_isc').val("");
                    $('#tableISC').DataTable().ajax.reload();
                }
            });
        });

        $('#submit-btn-sertifikat').click(function () {
            var file = $("#file_u_sertifikat")[0].files[0]; // get file
            var filename = file.name;
            var user_id = $("#user_id").val();
            var group = 9;
            var formData = new FormData();
            formData.append('file', $("#file_u_sertifikat")[0].files[0]);
            formData.append('user_id', user_id);
            formData.append('filename', filename);
            formData.append('group', group);
            $.ajax({
                url: ROOT + 'lanjut_ajax/do_upload/', //URL submit
                type: "post", //method Submit
                data: formData, //penggunaan FormData
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    alert("Upload Berhasil."); //alert jika upload berhasil
                    $('#file_u_sertifikat').val("");
                    $('#tableSertifikat').DataTable().ajax.reload();
                }
            });
        });

        $('#submit-btn-bestinet').click(function () {
            var file = $("#file_u_bestinet")[0].files[0]; // get file
            var filename = file.name;
            var user_id = $("#user_id").val();
            var group = 14;
            var formData = new FormData();
            formData.append('file', $("#file_u_bestinet")[0].files[0]);
            formData.append('user_id', user_id);
            formData.append('filename', filename);
            formData.append('group', group);
            $.ajax({
                url: ROOT + 'lanjut_ajax/do_upload/', //URL submit
                type: "post", //method Submit
                data: formData, //penggunaan FormData
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    alert("Upload Berhasil."); //alert jika upload berhasil
                    $('#file_u_bestinet').val("");
                    $('#tableBestinet').DataTable().ajax.reload();
                }
            });
        });

        $('#submit-btn-chopvisa').click(function () {
            var file = $("#file_u_chopvisa")[0].files[0]; // get file
            var filename = file.name;
            var user_id = $("#user_id").val();
            var group = 15;
            var formData = new FormData();
            formData.append('file', $("#file_u_chopvisa")[0].files[0]);
            formData.append('user_id', user_id);
            formData.append('filename', filename);
            formData.append('group', group);
            $.ajax({
                url: ROOT + 'lanjut_ajax/do_upload/', //URL submit
                type: "post", //method Submit
                data: formData, //penggunaan FormData
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    alert("Upload Berhasil."); //alert jika upload berhasil
                    $('#file_u_chopvisa').val("");
                    $('#tableChopvisa').DataTable().ajax.reload();
                }
            });
        });

        $('#submit-btn-asurpra').click(function () {
            var file = $("#file_u_asurpra")[0].files[0]; // get file
            var filename = file.name;
            var user_id = $("#user_id").val();
            var group = 10;
            var formData = new FormData();
            formData.append('file', $("#file_u_asurpra")[0].files[0]);
            formData.append('user_id', user_id);
            formData.append('filename', filename);
            formData.append('group', group);
            $.ajax({
                url: ROOT + 'lanjut_ajax/do_upload/', //URL submit
                type: "post", //method Submit
                data: formData, //penggunaan FormData
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    alert("Upload Berhasil."); //alert jika upload berhasil
                    $('#file_u_asurpra').val("");
                    $('#tableAsurpra').DataTable().ajax.reload();
                }
            });
        });

        $('#tableRekom').DataTable({
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
                "url": ROOT + "/rekom_ajax/rekom_get/" + user_id,
                "dataSrc": function (json) {
                    var data = [];
                    var no = 1;
                    for (var i = 0, ien = json.data.length; i < ien; i++) {
                        var value = [];
                        value[0] = no++;
                        value[1] = json.data[i]['name'];
                        value[2] = json.data[i]['group'];
                        value[3] = '<a href="' + ROOT + 'assets/images/rekom/' + json.data[i]['file'] + '" target="_blank" class="btn btn-default btn-sm"><span class="fa fa-download"></span>&nbsp;Downloads</a>';
                        // value[4] = '<button class="btn btn-sm btn-danger" type="submit" onclick="delete_rekom(' + json.data[i]['id'] + ')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                        data[i] = value;
                    }
                    console.log(data);
                    return data;
                }
            }
        });

        $('#tableISC').DataTable({
            responsive: true,
            sDom: 'lrtip',
            searching: false,
            paging: false,
            info: false,
            ajax: {
                "url": ROOT + "/lanjut_ajax/isc_get/" + user_id,
                "dataSrc": function (json) {
                    var data = [];
                    var no = 1;
                    for (var i = 0, ien = json.data.length; i < ien; i++) {
                        var value = [];
                        value[0] = no++;
                        value[1] = json.data[i]['name'];
                        value[2] = json.data[i]['group'];
                        value[3] = '<a href="' + ROOT + 'assets/images/lanjut/' + json.data[i]['file'] + '" target="_blank" class="btn btn-default btn-sm"><span class="fa fa-download"></span>&nbsp;Downloads</a>';
                        value[4] = '<button class="btn btn-sm btn-danger" type="submit" onclick="delete_lanjut(' + json.data[i]['id'] + ')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                        data[i] = value;
                    }
                    console.log(data);
                    return data;
                }
            }
        });

        $('#tableSertifikat').DataTable({
            responsive: true,
            sDom: 'lrtip',
            searching: false,
            paging: false,
            info: false,
            ajax: {
                "url": ROOT + "/lanjut_ajax/sertifikat_get/" + user_id,
                "dataSrc": function (json) {
                    var data = [];
                    var no = 1;
                    for (var i = 0, ien = json.data.length; i < ien; i++) {
                        var value = [];
                        value[0] = no++;
                        value[1] = json.data[i]['name'];
                        value[2] = json.data[i]['group'];
                        value[3] = '<a href="' + ROOT + 'assets/images/lanjut/' + json.data[i]['file'] + '" target="_blank" class="btn btn-default btn-sm"><span class="fa fa-download"></span>&nbsp;Downloads</a>';
                        value[4] = '<button class="btn btn-sm btn-danger" type="submit" onclick="delete_lanjut(' + json.data[i]['id'] + ')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                        data[i] = value;
                    }
                    console.log(data);
                    return data;
                }
            }
        });

        $('#tableBestinet').DataTable({
            responsive: true,
            sDom: 'lrtip',
            searching: false,
            paging: false,
            info: false,
            ajax: {
                "url": ROOT + "/lanjut_ajax/bestinet_get/" + user_id,
                "dataSrc": function (json) {
                    var data = [];
                    var no = 1;
                    for (var i = 0, ien = json.data.length; i < ien; i++) {
                        var value = [];
                        value[0] = no++;
                        value[1] = json.data[i]['name'];
                        value[2] = json.data[i]['group'];
                        value[3] = '<a href="' + ROOT + 'assets/images/lanjut/' + json.data[i]['file'] + '" target="_blank" class="btn btn-default btn-sm"><span class="fa fa-download"></span>&nbsp;Downloads</a>';
                        value[4] = '<button class="btn btn-sm btn-danger" type="submit" onclick="delete_lanjut(' + json.data[i]['id'] + ')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                        data[i] = value;
                    }
                    console.log(data);
                    return data;
                }
            }
        });

        $('#tableChopvisa').DataTable({
            responsive: true,
            sDom: 'lrtip',
            searching: false,
            paging: false,
            info: false,
            ajax: {
                "url": ROOT + "/lanjut_ajax/chopvisa_get/" + user_id,
                "dataSrc": function (json) {
                    var data = [];
                    var no = 1;
                    for (var i = 0, ien = json.data.length; i < ien; i++) {
                        var value = [];
                        value[0] = no++;
                        value[1] = json.data[i]['name'];
                        value[2] = json.data[i]['group'];
                        value[3] = '<a href="' + ROOT + 'assets/images/lanjut/' + json.data[i]['file'] + '" target="_blank" class="btn btn-default btn-sm"><span class="fa fa-download"></span>&nbsp;Downloads</a>';
                        value[4] = '<button class="btn btn-sm btn-danger" type="submit" onclick="delete_lanjut(' + json.data[i]['id'] + ')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                        data[i] = value;
                    }
                    console.log(data);
                    return data;
                }
            }
        });

        $('#tableAsurpra').DataTable({
            responsive: true,
            sDom: 'lrtip',
            searching: false,
            paging: false,
            info: false,
            ajax: {
                "url": ROOT + "/lanjut_ajax/asurpra_get/" + user_id,
                "dataSrc": function (json) {
                    var data = [];
                    var no = 1;
                    for (var i = 0, ien = json.data.length; i < ien; i++) {
                        var value = [];
                        value[0] = no++;
                        value[1] = json.data[i]['name'];
                        value[2] = json.data[i]['group'];
                        value[3] = '<a href="' + ROOT + 'assets/images/lanjut/' + json.data[i]['file'] + '" target="_blank" class="btn btn-default btn-sm"><span class="fa fa-download"></span>&nbsp;Downloads</a>';
                        value[4] = '<button class="btn btn-sm btn-danger" type="submit" onclick="delete_lanjut(' + json.data[i]['id'] + ')"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                        data[i] = value;
                    }
                    console.log(data);
                    return data;
                }
            }
        });

        function delete_lanjut(id) {
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
                        $('#tableSertifikat').DataTable().ajax.reload();
                        $('#tableAsurpra').DataTable().ajax.reload();
                        $('#tableISC').DataTable().ajax.reload();
                        $('#tableBestinet').DataTable().ajax.reload();
                        $('#tableChopvisa').DataTable().ajax.reload();
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
