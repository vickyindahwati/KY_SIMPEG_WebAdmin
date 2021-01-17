$(document).ready(function(){ 

    $('#btn_go_to_2').click(function(){
        $('form#form-submit-box-1').hide();
        $('#box_identitas_2').show();
    });

    $('#btn_back_to_1').click(function(){
        $('#box_identitas_2').hide();
        $('form#form-submit-box-1').show();
    });        

    $('#btn_go_to_3').click(function(){
        $('#box_identitas_2').hide();
        $('#box_identitas_3').show();
    });

    $('#btn_back_to_2').click(function(){
        $('#box_identitas_2').show();
        $('#box_identitas_3').hide();
    });

    $('#btn_back_to_3').click(function(){
        $('#box_identitas_3').show();
        $('#box_identitas_4').hide();
    });

    $('#btn_go_to_4').click(function(){
        $('#box_identitas_4').show();
        $('#box_identitas_3').hide();
    });

    $("form#form-submit-box-1").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/profile/updateProfile',
                    data        : $('#form-submit-box-1').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                    success     : function(data){                             
                                    
                                    $('#modal-loader').modal('hide');                                      

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }                                

                                }

                });

            }

        }

    });  

    $("form#form-confirm-user").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/profile/confirmUpdateProfile',
                    data        : $('#form-confirm-user').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                    success     : function(data){                             
                                    
                                    $('#modal-loader').modal('hide');                                      

                                    if( data.status_code == '00' ){   
                                        $('#modal-confirm-user, #modal-update-data-pending').modal('hide');
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }else{
                                        $('#modal-confirm-user, #modal-update-data-pending').modal('hide');
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }  
                                    
                                    getInAppNotification();

                                }

                });

            }

        }

    });

    $("form#form-upload-photo").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {
                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/profile/uploadPhoto',
                    data        : $('#form-upload-photo').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                    success     : function(data){                             
                                    
                                    $('#modal-loader').modal('hide');
                                    $('#modal-upload-photo').modal('hide');                                       

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }                                

                                }

                });

            }

        }

    });  


    $("form#form-upload-dosier").validationEngine('attach',{
        onValidationComplete: function(form,status) {
            if (status === true) {

                $.ajax({

                    type        : 'POST',
                    url         : indexURL + '/employee/saveDosier',
                    data        : $('#form-upload-dosier').serialize(),
                    dataType    : 'json',
                    beforeSend  : function(){ /*disabledForm('form-submit-payment');*/$('#modal-loader').modal('show'); },
                    success     : function(data){                             
                                    
                                    $('#modal-loader').modal('hide');                                      

                                    if( data.status_code == '00' ){   
                                        $('#modal-message').modal('show');                                    
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-check-circle fa-5x" style="color:green"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }else{
                                        $('#modal-message').modal('show');
                                        $('#container-popup-message').html('<div class="text-center"><i class="fa fa-times-circle fa-5x" style="color:red"></i><br><h3>' + data.status_msg  + '</h3></div>');
                                    }                                

                                }

                });

            }

        }

    });


    $('#btn-close').click(function(){
        $('#modal-message').modal('hide');
    });

    $('a[name=link-open-updated-data]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/profile/getPendingData',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){                                
                            
                            $('#container-update-data-pending').html(html);                    

                        }

        });
    });


    /** Upload File */
    var uploadSettingFileKartuPegawai = {
        url: indexURL + "/profile/uploadKartuPegawai",
        dragDrop:true,
        fileName: "x_file_kartu_pegawai",
        allowedTypes:"png,jpg,jpeg,zip,rar", 
        returnType:"json",
        onSuccess:function(files,data,xhr)
        {            
            $('#x_file_kartu_pegawai').val(data.file_name);
            
            $('a[name="link-download-kartupegawai"]').attr('href',data.path_file);
            $('a[name="link-download-kartupegawai"]').text(data.file_name);
        },
        showDelete:true,
        deleteCallback: function(data,pd)
        {
            for(var i=0;i<data.length;i++)
            {
                $.post(indexURL + "/profile/cancelUploadKartuPegawai",{op:"delete",name:data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");      
                });
            }      
            pd.statusbar.hide(); //You choice to hide/not.

            $('#x_file_kartu_pegawai').val('');
            // $('#container-file-excel').html('');

        }
    }
    var uploadObjKartuPegawai = $("#mulitplefileuploader_kartuPegawai").uploadFile(uploadSettingFileKartuPegawai);

    var uploadSettingFileKTP = {
        url: indexURL + "/profile/uploadKTP",
        dragDrop:true,
        fileName: "x_file_ktp",
        allowedTypes:"png,jpg,jpeg,zip,rar", 
        returnType:"json",
        onSuccess:function(files,data,xhr)
        {
            $('#x_file_ktp').val(data.file_name);

            $('a[name="link-download-ktp"]').attr('href',data.path_file);
            $('a[name="link-download-ktp"]').text(data.file_name);

        },
        showDelete:true,
        deleteCallback: function(data,pd)
        {
            for(var i=0;i<data.length;i++)
            {
                $.post(indexURL + "/profile/cancelUploadKTP",{op:"delete",name:data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");      
                });
            }      
            pd.statusbar.hide(); //You choice to hide/not.

            $('#x_file_ktp').val('');
            // $('#container-file-excel').html('');

        }
    }
    var uploadObjKTP = $("#mulitplefileuploader_ktp").uploadFile(uploadSettingFileKTP);

    var uploadSettingFileKK = {
        url: indexURL + "/profile/uploadKK",
        dragDrop:true,
        fileName: "x_file_kartu_keluarga",
        allowedTypes:"png,jpg,jpeg,zip,rar", 
        returnType:"json",
        onSuccess:function(files,data,xhr)
        {
            $('#x_file_kartu_keluarga').val(data.file_name);

            $('a[name="link-download-kk"]').attr('href',data.path_file);
            $('a[name="link-download-kk"]').text(data.file_name);

        },
        showDelete:true,
        deleteCallback: function(data,pd)
        {
            for(var i=0;i<data.length;i++)
            {
                $.post(indexURL + "/profile/cancelUploadKK",{op:"delete",name:data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");      
                });
            }      
            pd.statusbar.hide(); //You choice to hide/not.

            $('#x_file_kartu_keluarga').val('');
            // $('#container-file-excel').html('');

        }
    }
    var uploadObjKK = $("#mulitplefileuploader_kartu_keluarga").uploadFile(uploadSettingFileKK);

    var uploadSettingFileBukuTabungan = {
        url: indexURL + "/profile/uploadBukuTabungan",
        dragDrop:true,
        fileName: "x_file_buku_tabungan",
        allowedTypes:"png,jpg,jpeg,zip,rar", 
        returnType:"json",
        onSuccess:function(files,data,xhr)
        {
            $('#x_file_buku_tabungan').val(data.file_name);

            $('a[name="link-download-bukutabungan"]').attr('href',data.path_file);
            $('a[name="link-download-bukutabungan"]').text(data.file_name);

        },
        showDelete:true,
        deleteCallback: function(data,pd)
        {
            for(var i=0;i<data.length;i++)
            {
                $.post(indexURL + "/profile/cancelUploadBukuTabungan",{op:"delete",name:data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");      
                });
            }      
            pd.statusbar.hide(); //You choice to hide/not.

            $('#x_file_buku_tabungan').val('');
            // $('#container-file-excel').html('');

        }
    }
    var uploadObjBukuTabungan = $("#mulitplefileuploader_buku_tabungan").uploadFile(uploadSettingFileBukuTabungan);

    var uploadSettingFileNPWP = {
        url: indexURL + "/profile/uploadNPWP",
        dragDrop:true,
        fileName: "x_file_npwp",
        allowedTypes:"png,jpg,jpeg,zip,rar", 
        returnType:"json",
        onSuccess:function(files,data,xhr)
        {
            $('#x_file_npwp').val(data.file_name);

            $('a[name="link-download-npwp"]').attr('href',data.path_file);
            $('a[name="link-download-npwp"]').text(data.file_name);

        },
        showDelete:true,
        deleteCallback: function(data,pd)
        {
            for(var i=0;i<data.length;i++)
            {
                $.post(indexURL + "/profile/cancelUploadNPWP",{op:"delete",name:data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");      
                });
            }      
            pd.statusbar.hide(); //You choice to hide/not.

            $('#x_file_npwp').val('');
            // $('#container-file-excel').html('');

        }
    }
    var uploadObjNPWP = $("#mulitplefileuploader_npwp").uploadFile(uploadSettingFileNPWP);

    var uploadSettingFileLHKPN = {
        url: indexURL + "/profile/uploadLHKPN",
        dragDrop:true,
        fileName: "x_file_lhkpn",
        allowedTypes:"png,jpg,jpeg,zip,rar", 
        returnType:"json",
        onSuccess:function(files,data,xhr)
        {
            $('#x_file_lhkpn').val(data.file_name);

            $('a[name="link-download-lhkpn"]').attr('href',data.path_file);
            $('a[name="link-download-lhkpn"]').text(data.file_name);

        },
        showDelete:true,
        deleteCallback: function(data,pd)
        {
            for(var i=0;i<data.length;i++)
            {
                $.post(indexURL + "/profile/cancelUploadLHKPN",{op:"delete",name:data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");      
                });
            }      
            pd.statusbar.hide(); //You choice to hide/not.

            $('#x_file_lhkpn').val('');
            // $('#container-file-excel').html('');

        }
    }
    var uploadObjLHKPN = $("#mulitplefileuploader_lhkpn").uploadFile(uploadSettingFileLHKPN);

    var uploadSettingFileASKES = {
        url: indexURL + "/profile/uploadASKES",
        dragDrop:true,
        fileName: "x_file_askes_bpjs",
        allowedTypes:"png,jpg,jpeg,zip,rar", 
        returnType:"json",
        onSuccess:function(files,data,xhr)
        {
            $('#x_file_askes_bpjs').val(data.file_name);

            $('a[name="link-download-askesbpjs"]').attr('href',data.path_file);
            $('a[name="link-download-askesbpjs"]').text(data.file_name);

        },
        showDelete:true,
        deleteCallback: function(data,pd)
        {
            for(var i=0;i<data.length;i++)
            {
                $.post(indexURL + "/profile/cancelUploadASKES",{op:"delete",name:data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");      
                });
            }      
            pd.statusbar.hide(); //You choice to hide/not.

            $('#x_file_askes_bpjs').val('');
            // $('#container-file-excel').html('');

        }
    }
    var uploadObjASKES = $("#mulitplefileuploader_askesbpjs").uploadFile(uploadSettingFileASKES);

    var uploadSettingFileTASPEN = {
        url: indexURL + "/profile/uploadTASPEN",
        dragDrop:true,
        fileName: "x_file_taspen",
        allowedTypes:"png,jpg,jpeg,zip,rar", 
        returnType:"json",
        onSuccess:function(files,data,xhr)
        {
            $('#x_file_taspen').val(data.file_name);

            $('a[name="link-download-taspen"]').attr('href',data.path_file);
            $('a[name="link-download-taspen"]').text(data.file_name);

        },
        showDelete:true,
        deleteCallback: function(data,pd)
        {
            for(var i=0;i<data.length;i++)
            {
                $.post(indexURL + "/profile/cancelUploadTASPEN",{op:"delete",name:data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");      
                });
            }      
            pd.statusbar.hide(); //You choice to hide/not.

            $('#x_file_taspen').val('');
            // $('#container-file-excel').html('');

        }
    }
    var uploadObjTASPEN = $("#mulitplefileuploader_taspen").uploadFile(uploadSettingFileTASPEN);

    var uploadProfilePhoto = {
        url: indexURL + "/profile/uploadProfilePhoto",
        dragDrop:true,
        fileName: "x_photo_profile",
        allowedTypes:"png,jpg,jpeg,zip,rar", 
        returnType:"json",
        onSuccess:function(files,data,xhr)
        {
            $('#x_photo_profile').val(data);
            $('#x_img_photo_profile').attr('src',pathPhotoProfile + data);
        },
        showDelete:true,
        deleteCallback: function(data,pd)
        {
            for(var i=0;i<data.length;i++)
            {
                $.post(indexURL + "/profile/cancelUploadProfilePhoto",{op:"delete",name:data[i]},
                function(resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");      
                });
            }      
            pd.statusbar.hide(); //You choice to hide/not.

            $('#x_photo_profile').val('');
            // $('#container-file-excel').html('');

        }
    }
    var uploadObjProfilePhoto = $("#mulitplefileuploader_photoProfile").uploadFile(uploadProfilePhoto);

    /*Link Tab*/
    $('a[name="link-pengalaman-kerja"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showJobExperienceTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){                                
                            
                            $('#pegawai_pengalaman_kerja').html(html);                    

                        }

        });
    });

    $('a[name="link-sk-cpns"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showSKCPNS',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){    
                            $('#pegawai_sk_cpns').html(html);                    

                        }

        });
    });

    $('a[name="link-sk-pns"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showSKPNS',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){    
                            $('#pegawai_sk_pns').html(html);                    

                        }

        });
    });

    $('a[name="link-sk-pensiun"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showSKPensiun',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){    
                            $('#pegawai_sk_pensiun').html(html);                   

                        }

        });
    });

    $('a[name="link-pmk"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showPMKTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){    

                            clearInsideContainer();
                            $('#pegawai_pmk').html(html);                    

                        }

        });
    });

    $('a[name="link-dp3"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showDP3TableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){    

                            clearInsideContainer();
                            $('#pegawai_dp3').html(html);                    

                        }

        });
    });

    $('a[name="link-hukdis"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showHukdisTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){    

                            clearInsideContainer();
                            $('#pegawai_hukdis').html(html);                    

                        }

        });
    });

    $('a[name="link-pwk"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showPWKTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){    

                            clearInsideContainer();
                            $('#pegawai_pwk').html(html);                    

                        }

        });
    });

    $('a[name="link-profesi"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showProfesiTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){    
                            clearInsideContainer();
                            $('#pegawai_profesi').html(html);                    

                        }

        });
    });

    $('a[name="link-pindahinstansi"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showPindahInstansiTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){    

                            clearInsideContainer();
                            $('#pegawai_pindahinstansi').html(html);                    

                        }

        });
    });

    $('a[name="link-historyunor"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showHistoryUnorTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){    
                            clearInsideContainer();
                            $('#pegawai_historyunor').html(html);                    

                        }

        });
    });

    $('a[name="link-historypemberhentian"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showHistoryPemberhentianTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){    
                            clearInsideContainer();
                            $('#pegawai_historypemberhentian').html(html);                    

                        }

        });
    });

    $('a[name="link-historyangkakredit"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showHistoryAngkaKreditTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){    
                            clearInsideContainer();
                            $('#pegawai_historyangkakredit').html(html);                    

                        }

        });
    });

    $('a[name="link-skp"]').click(function(){
        var id = $('a[name="link-skp"]').attr('data');
        //alert(id);
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showSKP',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){    
                            clearInsideContainer();
                            $('#pegawai_skp').html(html);                    

                        }

        });
    });

   /* $('a[name="link-cpnspns"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showCPNSPNS',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){    

                            clearInsideContainer();
                            $('#pegawai_cpnspns').html(html);                    

                        }

        });
    });*/

    $('a[name="link-cltn"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showCLTNTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){    

                            clearInsideContainer();
                            $('#pegawai_cltn').html(html);                    

                        }

        });
    });

    $('a[name="link-riwayat-pangkat"], a[name="link-riwayat-pegawai"]').click(function(){
        var id = $(this).attr('data');
        
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showRiwayatPangkatTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){                                
                            
                            $('#riwayat_pangkat').html(html);                    

                        }

        });
    });

    $('a[name="link-riwayat-jabatan"]').click(function(){
        var id = $(this).attr('data');
        
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showRiwayatJabatanTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){                                
                            
                            $('#riwayat_jabatan').html(html);                    

                        }

        });
    });

    $('a[name="link-riwayat-penghargaan"]').click(function(){
        var id = $(this).attr('data');
        
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showPenghargaanTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){                                
                            
                            $('#riwayat_penghargaan').html(html);                    

                        }

        });
    });

    $('a[name="link-riwayat-pendidikan"], a[name="link-riwayat-pendidikan-umum"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showRiwayatPendidikanUmumTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){                                
                            
                            $('#riwayat_pendidikan_umum').html(html);                    

                        }

        });
    });

    
    $('a[name="link-riwayat-pendidikan-nonformal"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showKursusTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){                                
                            
                            $('#riwayat_pendidikan_non_formal').html(html);                    

                        }

        });
    });


    $('a[name="link-riwayat-pendidikan-diklat"]').click(function(){
        var id = $(this).attr('data');
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/showRiwayatPendidikanDiklatTableList',
            data        : {id:id},
            beforeSend  : function(){},
            success     : function(html){                                
                            
                            $('#riwayat_pendidikan_diklat').html(html);                    

                        }

        });
    });

    $('a[name="link-keluarga"], a[name="link-keluarga-orangtua"]').click(function(){
        var id = $(this).attr('data');   
        var dataType = $(this).attr('data-type');  
        var pathModule = "showKeluargaTableList";       
        //alert(id);
        //alert(dataType);
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/' + pathModule,
            data        : {id:id, type:dataType},
            beforeSend  : function(){},
            success     : function(html){                                
                            
                            $('#keluarga_orang_tua').html(html);                    

                        }

        });
    });

    $('a[name="link-keluarga-orangtua"], a[name="link-keluarga-istri"], a[name="link-keluarga-anak"]').click(function(){
        var id = $(this).attr('data');
        var dataType = $(this).attr('data-type');
        var pathModule = "showKeluargaTableList";
        $.ajax({

            type        : 'POST',
            url         : indexURL + '/employee/' + pathModule,
            data        : {id:id, type:dataType},
            beforeSend  : function(){},
            success     : function(html){                                
                            
                            clearInsideContainer();
                            if( dataType == 1 ){
                                $('#keluarga_orang_tua').html(html);  
                                $('#keluarga_istri').html('');
                                $('#keluarga_anak').html('');  
                            }else if( dataType == 2 ){
                                $('#keluarga_orang_tua').html('');  
                                $('#keluarga_istri').html(html);
                                $('#keluarga_anak').html('');  
                            }else if( dataType == 3 ){
                                $('#keluarga_orang_tua').html('');  
                                $('#keluarga_istri').html('');
                                $('#keluarga_anak').html(html);   
                            }
                                              

                        }

        });
    });

    

    
});