function upload_data($url,$name_input,$nameput){
    var myFormData = new FormData();
    myFormData.append('userfile',$($name_input).prop('files')[0]);

    $.ajax({
        url: $url,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        dataType : 'json',
        data: myFormData
    }).done(function(data) {

    if(data.is_error==1){ 
        alert_error(data.error);
        return; 
    }
    $($nameput).val(data.filename);

    })
    .fail(function() {
        if(tmp){
            alert_error( "Server tidak merespon. Mohon cek koneksi internet anda.\nServer not responding. Please check your internet connection." );
            tmp = false;
        }
    })
    .always(function() {
        
    }) ;
}