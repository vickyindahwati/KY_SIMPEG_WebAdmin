<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Model{

	protected $elementOption;


	function __construct(){

		parent::__construct();

	}


	public function getBloodType(){

		$rs		= $this->mgeneral->getWhere( array('bloodtypestatus' => 1),
											 'bloodtypes' );
		return $rs;

	}

	public function getPositionInFamily(){

		$rs		= $this->mgeneral->getWhere( array( 'status' => 1 ),
											 'positionsinfamily' );

		return $rs;

	}

	public function getSchoolTitle(){

		$rs 	= $this->mgeneral->getWhere( array( 'status' => 1 ), 
											 'schooltitle' );

		return $rs;

	}

	public function getSchool(){

		$rs 	= $this->mgeneral->getWhere( array( 'status' => 1 ), 
											 'schools' );

		return $rs;

	}

	public function getOccupation(){

		$rs 	= $this->mgeneral->getWhere( array( 'status' => 1 ), 
											 'occupations' );

		return $rs;

	}

	public function getOccupationStatus(){

		$rs 	= $this->mgeneral->getWhere( array( 'status' => 1 ), 
											 'occupationstatuses' );

		return $rs;

	}

	public function getIndustrySector(){

		$rs 	= $this->mgeneral->getWhere( array( 'status' => 1 ), 
											 'industrysectors' );

		return $rs;

	}

	public function getProvince(){

		$rs 	= $this->mgeneral->getWhere( array(), 
											 'provinces' );

		return $rs;

	}

	public function getCityByProvinceId( $id ){

		$element 		= '';		

		$rs 			= $this->mgeneral->getWhere( array('province_id' => $id), 
											 		 'cities' );

		$element 		.= '<select name="x_city" id="x_city" class="form-control">';
		$element 		.= '	<option value="">-Silahkan Pilih-</option>';

		if( count( $rs ) > 0 ){

			foreach( $rs as $dt ){

				$element .= '	<option value="' . $dt->city_id . '">' . $dt->name . '</option>';

			}

		}else{

			$element 	.= '</select>';

		}	

		echo $element;

	}

	public function getKecamatanByCityId( $id ){

		$element 		= '';		

		$rs 			= $this->mgeneral->getWhere( array('city_id' => $id), 
											 		 'subdistricts' );

		$element 		.= '<select name="x_kecamatan" id="x_kecamatan" class="form-control">';
		$element 		.= '	<option value="">-Silahkan Pilih-</option>';

		if( count( $rs ) > 0 ){

			foreach( $rs as $dt ){

				$element .= '	<option value="' . $dt->subdistrict_id . '">' . $dt->subdistrict_name . '</option>';

			}

		}else{

			$element 	.= '</select>';

		}	

		echo $element;

	}

	public function getKelurahanByKecamatanId( $id ){

		$element 		= '';		

		$rs 			= $this->mgeneral->getWhere( array('subdistrict_id' => $id), 
											 		 'villages' );

		$element 		.= '<select name="x_kelurahan" id="x_kelurahan" class="form-control">';
		$element 		.= '	<option value="">-Silahkan Pilih-</option>';

		if( count( $rs ) > 0 ){

			foreach( $rs as $dt ){

				$element .= '	<option value="' . $dt->village_id . '">' . $dt->village_name . '</option>';

			}

		}else{

			$element 	.= '</select>';

		}	

		echo $element;

	}

	public function getZipCodeByKelurahan( $id ){

		$element 		 = '';		

		$rs 			 = $this->mgeneral->getWhere( array('village_id' => $id), 
											 		  'villages' );

		
		echo '<input type="text" name="x_zipcode" id="x_zipcode" class="form-control" value="' . $rs[0]->zip_code . '">';

	}

	public function getMilestone(){

		$rs 	= $this->mgeneral->getWhere( array('status' => 1, 'is_delete' => 0), 
											 'milestones' );

		return $rs;

	}
	

}

?>

<script type="text/javascript">
$(document).ready(function(){

	$('#x_city').change(function(event){

      $.ajax({

        type        : 'POST',
        url         : '<?php echo base_url();?>index.php/family/getKecamatanByCityId',
        data        : {id: $(this).val()},
        beforeSend  : function(){ $('#dd-loader-kecamatan').show(); },
        success     : function(html){ 
                        $('#dd-loader-kecamatan').hide();
                        $('#container-dd-kecamatan').html(html); 
                      }

      });

    });

    $('#x_kecamatan').change(function(event){

      $.ajax({

        type        : 'POST',
        url         : '<?php echo base_url();?>index.php/family/getKelurahanByKecamatanId',
        data        : {id: $(this).val()},
        beforeSend  : function(){ $('#dd-loader-kelurahan').show(); },
        success     : function(html){ 
                        $('#dd-loader-kelurahan').hide();
                        $('#container-dd-kelurahan').html(html); 
                      }

      });

    });

    $('#x_kelurahan').change(function(event){

      $.ajax({

        type        : 'POST',
        url         : '<?php echo base_url();?>index.php/family/getZipCodeByKelurahan',
        data        : {id: $(this).val()},
        beforeSend  : function(){ $('#loader-zipcode').show(); },
        success     : function(html){ 
                        $('#loader-zipcode').hide();
                        $('#container-zipcode').html(html); 
                      }

      });

    });

});
</script>