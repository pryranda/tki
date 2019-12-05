<?php

function upload_file($name="userfile"){
        $CI =& get_instance();
        
        $config['upload_path']          = "./assets/uploads/";
        $config['allowed_types']        = 'gif|jpg|png|psd|jpeg|jpg2|jpe|j2k|jpf|jpm|pdf|svg|csv|pdf|xls|ppt|pptx|doc|docx|dot|dotx|xlsx|word|xl|3gp|mp4|m4a|f4v|flv|webm|srt|svg';
        $config['encrypt_name']         = TRUE;
        $config['max_size']             = 5000;
        // $config['max_width']            = 10240;
        // $config['max_height']           = 7680;
    
        $CI->load->library('upload', $config);
    
        if ( ! $CI->upload->do_upload($name))
        {
                
                return array("is_error"=>true,"error"=>$CI->upload->display_errors());
        }
        else
        {
                $data = $CI->upload->data();
                return array("is_error"=>0,"filename"=>$data["file_name"],"raw_name"=>$_FILES[$name]['name']);
        }
}

?>
    