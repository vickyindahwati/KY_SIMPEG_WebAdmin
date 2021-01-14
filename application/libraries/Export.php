<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');  

class Export {

    public function __construct() {


        $this->ci =& get_instance();

        $this->ci->load->library('Pdf');

    }


    public function exportPutusan( $id ){

    	$pdf 			= new Pdf("L", 'mm', 'A4', true, 'UTF-8', false);

    	$pdf->SetHeaderData("", 0, "LAMPIRAN PUTUSAN", "PUTUSAN KOMISI YUDISIAL");
		$pdf->SetTitle('PUTUSAN KOMISI YUDISIAL');
		$pdf->SetHeaderMargin(10);
		$pdf->SetTopMargin(30);
		$pdf->setFooterMargin(20);
		$pdf->SetAutoPageBreak(true);
		$pdf->SetAuthor('Author');  
		$pdf->SetDisplayMode('real', 'default');

		$pdf->SetFont('dejavusans', '', 10);


		$pdf->AddPage("L");

		$id_putusan 	= $this->ci->converter->decode( $id );

		$rs_putusan 	= $this->ci->mquery_export->getDetailPutusan( $id_putusan );

		$rs_hakim 		= $this->ci->mquery_export->getMajelisHakimPutusan( $id_putusan );

		if( count( $rs_putusan ) > 0 ){

			$html 		.= '<table border="1" cellpadding="4" >
								<tr style="background-color:#CCCCCC;">
									<td style="text-align:center;font-weight:bold;font-size:10px;" width="5%">No.</td>
									<td style="text-align:center;font-weight:bold;font-size:10px;" width="35%">Identitas Putusan</td>
									<td style="text-align:center;font-weight:bold;font-size:10px;" width="60%"></td>
								</tr>
								<tr style="font-size:8px;">
									<td style="text-align:right;font-weight:bold;" width="5%">1.</td>
									<td style="text-align:left;font-weight:bold;" width="35%">Jenis Perkara</td>
									<td style="text-align:left;" width="60%">' . $rs_putusan[0]->jenis_perkara . '</td>
								</tr>
								<tr style="font-size:8px;">
									<td style="text-align:right;font-weight:bold;" width="5%">2.</td>
									<td style="text-align:left;font-weight:bold;" width="35%">Kaidah Yurisprudensi</td>
									<td style="text-align:left;" width="60%">' . $rs_putusan[0]->kaidah_yurisprudensi . '</td>
								</tr>
								<tr style="font-size:8px;">
									<td style="text-align:right;font-weight:bold;" width="5%">3.</td>
									<td style="text-align:left;font-weight:bold;" width="35%">No. Register Perkara Kasasi / PK</td>
									<td style="text-align:left;" width="60%">' . $rs_putusan[0]->no_register_perkara . '</td>
								</tr>
								<tr style="font-size:8px;">
									<td style="text-align:right;font-weight:bold;" width="5%">4.</td>
									<td style="text-align:left;font-weight:bold;" width="35%">Tanggal Musyawarah Majelis</td>
									<td style="text-align:left;" width="60%">' . $this->ci->converter->tgl_indo( $rs_putusan[0]->tgl_musyawarah_majelis ) . '</td>
								</tr>
								<tr style="font-size:8px;">
									<td style="text-align:right;font-weight:bold;" width="5%">5.</td>
									<td style="text-align:left;font-weight:bold;" width="35%">Tanggal Dibacakan Putusan</td>
									<td style="text-align:left;" width="60%">' . $this->ci->converter->tgl_indo( $rs_putusan[0]->tgl_dibacakan_putusan ) . '</td>
								</tr>
								<tr style="font-size:8px;">
									<td style="text-align:right;font-weight:bold;" width="5%">6.</td>
									<td style="text-align:left;font-weight:bold;" width="35%">Nama Terdakwa</td>
									<td style="text-align:left;" width="60%">' . $rs_putusan[0]->nama_terdakwa . '</td>
								</tr>
								<tr style="font-size:8px;">
									<td style="text-align:right;font-weight:bold;" width="5%">7.</td>
									<td style="text-align:left;font-weight:bold;" width="35%">Nama & Susunan Majelis Hakim</td>
									<td style="text-align:left;" width="60%">
										<table border="0" cellpadding="3">
											<tr style="text-align:left;">
												<td width="20%" style="font-weight:bold;">Hakim Ketua</td>
												<td width="3%">:</td>
												<td width="50%">' . $rs_hakim[0]->nama_hakim . '</td>
											</tr>
											<tr style="text-align:left;">
												<td width="20%" style="font-weight:bold;">Hakim Anggota 1</td>
												<td width="3%">:</td>
												<td width="50%">' . $rs_hakim[1]->nama_hakim . '</td>
											</tr>
											<tr style="text-align:left;">
												<td width="20%" style="font-weight:bold;">Hakim Anggota 2</td>
												<td width="3%">:</td>
												<td width="50%">' . $rs_hakim[2]->nama_hakim . '</td>
											</tr>
											<tr style="text-align:left;">
												<td width="20%" style="font-weight:bold;">Hakim Anggota 3</td>
												<td width="3%">:</td>
												<td width="50%">' . $rs_hakim[3]->nama_hakim . '</td>
											</tr>
											<tr style="text-align:left;">
												<td width="20%" style="font-weight:bold;">Hakim Anggota 4</td>
												<td width="3%">:</td>
												<td width="50%">' . $rs_hakim[4]->nama_hakim . '</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>

							<table border="1" cellpadding="4">
								<tr style="background-color:#CCCCCC;">
									<td style="width:34%;text-align:center;font-weight:bold;">Kasus Posisi</td>
									<td style="width:33%;text-align:center;font-weight:bold;">Amar Putusan, Dasar Hukum, Norma</td>
									<td style="width:33%;text-align:center;font-weight:bold;">Pertimbangan Hukum</td>
								</tr>
								<tr>
									<td style="width:34%;text-align:left;">' . $rs_putusan[0]->kasus_posisi . '</td>
									<td style="width:33%;text-align:left;">' . $rs_putusan[0]->amar_putusan . '</td>
									<td style="width:33%;text-align:left;">' . $rs_putusan[0]->pertimbangan_hukum . '</td>
								</tr>								
							</table>'; 
			$pdf->writeHTML($html, true, false, true, false, '');

			$pdf->AddPage("L");

			$html  		= ' <table border="1" cellpadding="4">
								<tr style="background-color:#CCCCCC;">
									<td colspan="3" style="width:100%;text-align:left;font-weight:bold;">Anotasi</td>
								</tr>
								<tr>
									<td colspan="3" style="width:100%;text-align:left;">' . $rs_putusan[0]->anotasi . '</td>
								</tr>

								<tr style="background-color:#CCCCCC;">
									<td colspan="3" style="width:100%;text-align:left;font-weight:bold;">Rangkuman Anotasi</td>
								</tr>
								<tr>
									<td colspan="3">
										<table border="1"cellpadding="3">
			                              <tr style="background-color:#EDEBEB;">
			                              	<td rowspan="2" width="20%" style="text-align:center;">Uraian</td>
			                              	<td colspan="2" width="80%" style="text-align:center;">Ket</td>
			                              </tr>
			                              <tr style="background-color:#EDEBEB;">
			                              	<td width="40%" style="text-align:center;">Ada</td>
			                              	<td width="40%" style="text-align:center;">Tidak Ada</td>
			                              </tr>
			                              <tr>
			                              	<td width="20%" style="text-align:center;background-color:#EDEBEB;">Penemuan Hukum</td>
			                              	<td width="40%" style="text-align:center;font-weight:bold;"> ' . 
			                              		( $rs_putusan[0]->rk_anotasi_penemuan_hukum_1 == 1 ? 'V' : '' ) . '
	                    					</td>
			                              	<td width="40%" style="text-align:center;font-weight:bold;">                                  
			                              		' . ( $rs_putusan[0]->rk_anotasi_penemuan_hukum_1 == 0 ? 'V' : '' ) . '
			                              	</td>
			                              </tr>
			                            </table>
									</td>
								</tr>

								<tr>
									<td colspan="3">
										<table border="1"cellpadding="3">
			                              <tr style="background-color:#EDEBEB;">
			                              	<td rowspan="2" width="20%" style="text-align:center;">Uraian</td>
			                              	<td colspan="2" width="80%" style="text-align:center;">Ket</td>
			                              </tr>
			                              <tr style="background-color:#EDEBEB;">
			                              	<td width="40%" style="text-align:center;">Memperluas</td>
			                              	<td width="40%" style="text-align:center;">Mempersempit</td>
			                              </tr>
			                              <tr>
			                              	<td width="20%" style="text-align:center;background-color:#EDEBEB;">Penemuan Hukum</td>
			                              	<td width="40%" style="text-align:center;font-weight:bold;"> ' . 
			                              		( $rs_putusan[0]->rk_anotasi_penemuan_hukum_2 == 1 ? 'V' : '' ) . '
	                    					</td>
			                              	<td width="40%" style="text-align:center;font-weight:bold;">                                  
			                              		' . ( $rs_putusan[0]->rk_anotasi_penemuan_hukum_2 == 0 ? 'V' : '' ) . '
			                              	</td>
			                              </tr>
			                            </table>

			                            <table border="1" cellpadding="4">
			                              <tr style="background-color:#EDEBEB;">
			                              	<td rowspan="2" width="20%" style="text-align:center;">Uraian</td>
			                              	<td colspan="2" width="80%" style="text-align:center;">Metode Interpretasi</td>
			                              </tr>
			                              <tr style="background-color:#EDEBEB;">
			                              	<td width="10%" style="text-align:center;">Gramatikal/Bahasa</td>
			                              	<td width="10%" style="text-align:center;">Teologis/Sosiologis</td>
			                              	<td width="10%" style="text-align:center;">Sistematis/Logis</td>
			                              	<td width="10%" style="text-align:center;">Historis</td>
			                              	<td width="10%" style="text-align:center;">Komparatif/Perbandingan</td>
			                              	<td width="10%" style="text-align:center;">Futuristis</td>
			                              	<td width="10%" style="text-align:center;">Restriktif</td>
			                              	<td width="10%" style="text-align:center;">Ekstensif</td>
			                              </tr>
			                              <tr>
			                              	<td width="20%" style="text-align:center;background-color:#EDEBEB;" >Metode Interpretasi yang Digunakan oleh hakim dalam Memutus</td>
			                              	<td width="10%" style="text-align:center;font-weight:bold;">
												' . ( $rs_putusan[0]->rk_anotasi_metode_bahasa == 1 ? 'V' : '' ) . '
											</td>
			                              	<td width="10%" style="text-align:center;font-weight:bold;">
												' . ( $rs_putusan[0]->rk_anotasi_metode_teologis == 1 ? 'V' : '' ) . '
											</td>

			                              	<td width="10%" style="text-align:center;font-weight:bold;">
												' . ( $rs_putusan[0]->rk_anotasi_metode_sistematis == 1 ? 'V' : '' ) . '
											</td>
			                              	<td width="10%" style="text-align:center;font-weight:bold;">
												' . ( $rs_putusan[0]->rk_anotasi_metode_historis == 1 ? 'V' : '' ) . '
											</td>

			                              	<td width="10%" style="text-align:center;font-weight:bold;">
												' . ( $rs_putusan[0]->rk_anotasi_metode_komperatif == 1 ? 'V' : '' ) . '
											</td>
			                              	<td width="10%" style="text-align:center;font-weight:bold;">
												' . ( $rs_putusan[0]->rk_anotasi_metode_futuristis == 1 ? 'V' : '' ) . '
											</td>

			                              	<td width="10%" style="text-align:center;font-weight:bold;">
												' . ( $rs_putusan[0]->rk_anotasi_metode_restriktif == 1 ? 'V' : '' ) . '
											</td>
			                              	<td width="10%" style="text-align:center;font-weight:bold;">
												' . ( $rs_putusan[0]->rk_anotasi_metode_ekstensif == 1 ? 'V' : '' ) . '
											</td>
			                              </tr>
			                            </table>

									</td>
								</tr>

								<tr style="background-color:#CCCCCC;">
									<td colspan="3" style="width:100%;text-align:left;font-weight:bold;">Kesimpulan</td>
								</tr>
								<tr>
									<td colspan="3" style="width:100%;text-align:left;">' . $rs_putusan[0]->kesimpulan . '</td>
								</tr>

							</table>';
			$pdf->writeHTML($html, true, false, true, false, '');				

			$pdf->lastPage();
			$pdf->Output('My-File-Name.pdf', 'I');

		}		

    }    

}

?>