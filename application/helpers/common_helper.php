<?php

function get_from_sess($val){
    if(isset($_SESSION[$val])) {
        return $_SESSION[$val];
    }
    return "";
}

function get_text_gender($id=0){
    $data=array(
        0 => 'Pilih',
        1 => 'Laki-Laki',
        2 => 'Perempuan',
    );
    if($id<1 || $id>2){
        $id=0;
    }
    return $data[$id];
}

function get_text_pendidikan($id=0){
    $data=array(
        0 => 'Pilih',
        1 => 'SD',
        2 => 'SMP',
        3 => 'SMA',
        4 => 'D3',
        5 => 'S1',
    );
    if($id<1 || $id>5){
        $id=0;
    }
    return $data[$id];
}

function get_text_status($id=0){
    $data=array(
        0 => 'Pilih',
        1 => 'Belum Menikah',
        2 => 'Menikah',
    );
    if($id<1 || $id>2){
        $id=0;
    }
    return $data[$id];
}

function get_text_agama($id=0){
    $data=array(
        0 => 'Pilih',
        1 => 'Islam',
        2 => 'Kristen',
        3 => 'Khatolik',
        4 => 'Hindu',
        5 => 'Budha',
    );
    if($id<1 || $id>5){
        $id=0;
    }
    return $data[$id];
}

function get_text_medical($id=0){
    $data=array(
        0 => 'Pilih',
        1 => 'FIT',
        2 => 'UNFIT',
        3 => 'PENDING',
    );
    if($id<1 || $id>3){
        $id=0;
    }
    return $data[$id];
}