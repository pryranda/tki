<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="<?= base_url() ?>assets/images/profile-pic-1.jpg" width="50" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?= $this->session->userdata('username'); ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <?php
        foreach ($group_menu as $group) {
            ?>
            <li class="<?php if ($menu == $group->controllers) echo 'active' ?>"><a
                        href="<?= base_url() . $group->controllers ?>"><em
                            class="<?= $group->icon; ?>">&nbsp;</em> <?= $group->menu; ?></a></li>
            <?php
        }
        ?>
        <li><a href="<?= base_url() ?>logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div><!--/.sidebar-->

<script src="<?= base_url() ?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/chart.min.js"></script>
<script src="<?= base_url() ?>assets/js/chart-data.js"></script>
<script src="<?= base_url() ?>assets/js/easypiechart.js"></script>
<script src="<?= base_url() ?>assets/js/easypiechart-data.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>assets/js/custom.js"></script>
<script src="<?= base_url() ?>assets/js/costum.js"></script>
<script src="<?= base_url() ?>assets/lib/datatables/jquery.dataTables.js"></script>


