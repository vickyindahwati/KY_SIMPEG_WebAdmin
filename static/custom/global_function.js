$('#btn-close-modal-msg').click(function(){
    $('#modal-message').modal('hide');
});

$('.modal').on('hide.bs.modal', function (e) {
    e.stopPropagation();
    $('body').css('padding-right','');
});

function showUserTableList(){
    $.ajax({

        type        : 'POST',
        url         : indexURL + '/employee/showUserTableList',
        beforeSend  : function(){},
        success     : function(html){                                
                        
                        $('#container-user-list').html(html);                    

                    }

    });
}

function clearInsideContainer(){
	$('#pegawai_skp').html('');
	$('#pegawai_pengalaman_kerja').html('');
	$('#pegawai_sk_cpns').html('');
	$('#pegawai_sk_pns').html('');
	$('#pegawai_sk_pensiun').html('');
	$('#pegawai_pmk').html('');
	$('#pegawai_dp3').html('');
	$('#pegawai_hukdis').html('');
	$('#pegawai_pwk').html('');
	$('#pegawai_pindahinstansi').html('');
	$('#pegawai_cltn').html('');
	$('#pegawai_profesi').html('');

	$('#riwayat_pangkat').html('');
	$('#riwayat_jabatan').html('');
	$('#riwayat_gaji').html('');
	$('#riwayat_penugasan').html('');
	$('#riwayat_penghargaan').html('');

	$('#keluarga_orang_tua').html('');
	$('#keluarga_istri').html('');
	$('#keluarga_anak').html('');

	$('#riwayat_pendidikan_umum').html('');
	$('#riwayat_pendidikan_diklat').html('');
	$('#riwayat_pendidikan_non_formal').html('');


}

function clearForm( pFormId ){
    $('#' + pFormId).trigger('reset');
}

//Format: dd-mm-YYYY
function parseDate1(str){
	var dmy = str.split("-");
	return new Date( dmy[2], dmy[1]-1, dmy[0] );
}

//Format: YYYY-mm-dd
function parseDate2(str){
	var dmy = str.split("-");
	return new Date( dmy[0], dmy[1]-1, dmy[2] );
}

function dateDiff(first, second) {
    // Take the difference between the dates and divide by milliseconds per day.
    // Round to nearest whole number to deal with DST.
    return Math.round((second-first)/(1000*60*60*24));
}

Date.prototype.addDays = function(days) {
    var date = new Date(this.valueOf())
    date.setDate(date.getDate() + days);
    return date;
}

parseDate3 = function date2str(x, y) {
    var z = {
        M: x.getMonth() + 1,
        d: x.getDate(),
        h: x.getHours(),
        m: x.getMinutes(),
        s: x.getSeconds()
    };
    y = y.replace(/(M+|d+|h+|m+|s+)/g, function(v) {
        return ((v.length > 1 ? "0" : "") + z[v.slice(-1)]).slice(-2)
    });

    return y.replace(/(y+)/g, function(v) {
        return x.getFullYear().toString().slice(-v.length)
    });
}

function getBusinessDatesCount(startDate, endDate, arrHolidayDate) {
    var count = 0;
    var curDate = startDate;
    while (curDate <= endDate) {
		var dayOfWeek = curDate.getDay();
		// console.log(">>> Day Of Week : " + dayOfWeek + "|" + curDate);

		// Check if date weekend or not
		var isWeekend = (dayOfWeek == 6) || (dayOfWeek == 0); 
		// Check if date not in holiday date
		var isHoliday = false;
		// console.log(JSON.stringify(arrHolidayDate));
		if( JSON.parse(arrHolidayDate).some(holiday => holiday.start === parseDate3(curDate, 'yyyy-MM-dd')) ){
			isHoliday = true;
		}

        if(!isWeekend && !isHoliday)
           count++;
        curDate = curDate.addDays(1);
    }
    return count;
}

function displayLocation(latitude,longitude){
	var request = new XMLHttpRequest();

	var method = 'GET';
	var url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='+latitude+','+longitude+'&sensor=true';
	var async = true;

	alert(url);

	request.open(method, url, async);
	request.onreadystatechange = function(){
	  if(request.readyState == 4 && request.status == 200){
	    var data = JSON.parse(request.responseText);
	    var address = data.results[0];
	    alert(address)
	    alert(address.formatted_address);
	  }
	};
	request.send();
};

function getHolidayDate(pUrl){
	$.ajax({
		type        : 'GET',
		url         : pUrl + '/calendar/getHolidayDate',
		crossDomain : true,
		dataType    : 'json',
		beforeSend  : function(){ $('#container-loader-list').show(); },
		success     : function(data){ 
						$('#x_holiday_date').val(JSON.stringify(data.data));
					  }        
	});
}

var successCallback = function(position){
	var x = position.coords.latitude;
	var y = position.coords.longitude;
	displayLocation(x,y);
};

var errorCallback = function(error){
    var errorMessage = 'Unknown error';
    switch(error.code) {
      case 1:
        errorMessage = 'Permission denied';
        break;
      case 2:
        errorMessage = 'Position unavailable';
        break;
      case 3:
        errorMessage = 'Timeout';
        break;
    }
    alert(errorMessage);
};

