<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');  

class Export_lib {

    public function __construct() {


        $this->ci =& get_instance();
        $this->ci->load->library('Pdf');
        $this->ci->load->library('global_lib');

    }

    public function exportLeaveForm( $pLeaveDetail, $pUserAnualLeaveDetail, $pCatatanCuti, $pPathQRCode ){

    	//var_dump($pLeaveDetail);

    	$xBackgroundColor = '';
    	$xLabelStatus = '';

    	$pdf 			= new Pdf("P", 'cm', 'A4', true, 'UTF-8', false);
    	$pdf->SetHeaderData("", 0, "FORM PENGAJUAN CUTI", "SIMPEG KOMISI YUDISIAL");
		$pdf->SetTitle('SIMPEG KOMISI YUDISIAL');
		$pdf->SetHeaderMargin(10);
		$pdf->SetTopMargin(10);
		$pdf->setFooterMargin(10);
		$pdf->SetAutoPageBreak(true);
		$pdf->SetAuthor('Author');  
		$pdf->SetDisplayMode('real', 'default');

		//$pdf->SetFont('dejavusans', '', 10);

		$pdf->AddPage("P");

		if( $pLeaveDetail['status_admin_kepegawaian'] == 1 ){
			$xBackgroundColor = 'color:black;';
			$xLabelStatus = '<strong>DITERIMA</strong>';
		}else if( $pLeaveDetail['status_admin_kepegawaian'] == 2 ){
			$xBackgroundColor = 'color:black;';
			$xLabelStatus = '<strong>DIBATALKAN</strong>';
		}else if( $pLeaveDetail['status_admin_kepegawaian'] == 0 ){
			$xBackgroundColor = 'color:black;';
			$xLabelStatus = '<strong>MENUNGGU</strong>';
		}

		$html .= '<table border="0" width="100%" style="font-size:11px;">
					<tr>
						<td>Jakarta, ' . date('d') . '-' . $this->ci->global_lib->monthNameIndonesia( date('m')-1 ) . '-' . date('Y') . '</td>
					</tr>
					<tr>
						<td>Yth. ' . $pLeaveDetail['tujuan_jabatan']['name'] . '</td>
					</tr>
					<tr>
						<td>Di Tempat</td>
					</tr>
				  </table><br><br>';

	    $html .= '<table border="0" width="100%" style="font-size:10px;">	    			
					<tr>
						<td style="text-align:center;"><strong>FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</strong></td>
					</tr>
				  </table><br><br>';

		$html .= '<table border="1" width="100%" cellpadding="1" style="font-size:9px; border-collapse: collapse;">
					<tr>
						<td style="text-align:center;' . $xBackgroundColor . '" colspan="4">' . $xLabelStatus . '</td>
					</tr>
					<tr>
						<td style="text-align:left;" colspan="4">I. DATA PEGAWAI</td>
					</tr>

					<tr>
						<td style="text-align:left;" width="10%">Nama</td>
						<td style="text-align:left;" width="40%">' . $pLeaveDetail['nama_pegawai'] . '</td>
						<td style="text-align:left;" width="10%">NIP</td>
						<td style="text-align:left;" width="40%">' . $pLeaveDetail['nip'] . '</td>
					</tr>
					<tr>
						<td style="text-align:left;" width="10%">Jabatan</td>
						<td style="text-align:left;" width="40%">' . $pLeaveDetail['jabatan'] . '</td>
						<td style="text-align:left;" width="10%">Masa Kerja</td>
						<td style="text-align:left;" width="40%">' . $pLeaveDetail['masa_kerja'] . '</td>
					</tr>
					<tr>
						<td style="text-align:left;" width="10%">Unit Kerja</td>
						<td style="text-align:left;" colspan="3" width="90%">' . $pLeaveDetail['unit_kerja'] . '</td>
					</tr>

					<tr>
						<td style="text-align:left;" colspan="4">II. JENIS CUTI YANG DIAMBIL</td>
					</tr>
					<tr>
						<td style="text-align:left;" width="30%">Cuti Tahunan</td>
						<td style="text-align:center;" width="20%">' . ( $pLeaveDetail['jenis_cuti']['id'] == 1 ? '<img src="' . base_url('static') . '/dist/img/check_list.png" width="10"/>' : '' ) . '</td>
						<td style="text-align:left;" width="30%">Cuti Besar</td>
						<td style="text-align:center;" width="20%">' . ( $pLeaveDetail['jenis_cuti']['id'] == 2 ? '<img src="' . base_url('static') . '/dist/img/check_list.png" width="10"/>' : '' ) . '</td>
					</tr>
					<tr>
						<td style="text-align:left;" width="30%">Cuti Sakit</td>
						<td style="text-align:center;" width="20%">' . ( $pLeaveDetail['jenis_cuti']['id'] == 3 ? '<img src="' . base_url('static') . '/dist/img/check_list.png" width="10"/>' : '' ) . '</td>
						<td style="text-align:left;" width="30%">Cuti Melahirkan</td>
						<td style="text-align:center;" width="20%">' . ( $pLeaveDetail['jenis_cuti']['id'] == 4 ? '<img src="' . base_url('static') . '/dist/img/check_list.png" width="10"/>' : '' ) . '</td>
					</tr>
					<tr>
						<td style="text-align:left;" width="30%">Cuti Karena Alasan Penting</td>
						<td style="text-align:center;" width="20%">' . ( $pLeaveDetail['jenis_cuti']['id'] == 5 ? '<img src="' . base_url('static') . '/dist/img/check_list.png" width="10"/>' : '' ) . '</td>
						<td style="text-align:left;" width="30%">Cuti Di Luar Tanggungan Negara</td>
						<td style="text-align:center;" width="20%">' . ( $pLeaveDetail['jenis_cuti']['id'] == 6 ? '<img src="' . base_url('static') . '/dist/img/check_list.png" width="10"/>' : '' ) . '</td>
					</tr>
				  </table><br><br>';

		$html .= '<table border="1" width="100%" cellpadding="1" style="font-size:9px; border-collapse: collapse;">
					<tr>
						<td style="text-align:left;" colspan="6">III. ALASAN CUTI</td>
					</tr>
					<tr>
						<td style="text-align:left;" colspan="6">' . $pLeaveDetail['alasan_cuti'] . '</td>
					</tr>
					<tr>
						<td style="text-align:left;" colspan="6">IV. LAMANYA CUTI</td>
					</tr>
					<tr>
						<td style="text-align:left;" width="10%">Selama</td>
						<td style="text-align:right;" width="20%">' . $pLeaveDetail['lama_cuti'] . ' Hari</td>
						<td style="text-align:left;" width="20%">Tgl. Mulai</td>
						<td style="text-align:center;" width="20%">' . $pLeaveDetail['tgl_mulai'] . '</td>
						<td style="text-align:center;" width="10%">s/d</td>
						<td style="text-align:center;" width="20%">' . $pLeaveDetail['tgl_berakhir'] . '</td>
					</tr>
				  </table>';	

		$html .= '<table border="1" width="100%" cellpadding="1" style="font-size:9px; border-collapse: collapse;">
					<tr>
						<td style="text-align:left;" colspan="5">V. CATATAN CUTI</td>
					</tr>
					<tr>
						<td style="text-align:left;" colspan="3" width="30%">1. CUTI TAHUNAN</td>
						<td style="text-align:left;" width="40%">2. CUTI BESAR</td>
						<td width="30%">' . ( $pLeaveDetail['jenis_cuti']['id'] == 2 ? $pCatatanCuti : '' ) . '</td>
					</tr>
					<tr>
						<td style="text-align:center;" width="10%">Tahun</td>
						<td style="text-align:center;" width="10%">Sisa</td>
						<td style="text-align:center;" width="10%">Keterangan</td>
						<td style="text-align:left;" width="40%">3. CUTI SAKIT</td>
						<td width="30%">' . ( $pLeaveDetail['jenis_cuti']['id'] == 3 ? $pCatatanCuti : '' ) . '</td>
					</tr>
					<tr>
						<td style="text-align:center;" width="10%">N-2</td>
						<td style="text-align:center;" width="10%">' . $pUserAnualLeaveDetail['cuti_tahunan_n_2'] . '</td>
						<td style="text-align:center;" width="10%"></td>
						<td style="text-align:left;" width="40%">4. CUTI MELAHIRKAN</td>
						<td width="30%">' . ( $pLeaveDetail['jenis_cuti']['id'] == 4 ? $pCatatanCuti : '' ) . '</td>
					</tr>
					<tr>
						<td style="text-align:center;" width="10%">N-1</td>
						<td style="text-align:center;" width="10%">' . $pUserAnualLeaveDetail['cuti_tahunan_n_1'] . '</td>
						<td style="text-align:center;" width="10%"></td>
						<td style="text-align:left;" width="40%">5. CUTI KARENA ALASAN PENTING</td>
						<td width="30%">' . ( $pLeaveDetail['jenis_cuti']['id'] == 5 ? $pCatatanCuti : '' ) . '</td>
					</tr>
					<tr>
						<td style="text-align:center;" width="10%">N</td>
						<td style="text-align:center;" width="10%">' . $pUserAnualLeaveDetail['cuti_tahunan_n'] . '</td>
						<td style="text-align:center;" width="10%"></td>
						<td style="text-align:left;" width="40%">4. CUTI DILUAR TANGGUNGAN NEGARA</td>
						<td width="30%">' . ( $pLeaveDetail['jenis_cuti']['id'] == 6 ? $pCatatanCuti : '' ) . '</td>
					</tr>
				  </table>';

		$html .= '<table border="1" width="100%" cellpadding="1" style="font-size:9px; border-collapse: collapse;">
					<tr>
						<td style="text-align:left;" colspan="3">VI. ALAMAT SELAMA MENJALANKAN CUTI</td>
					</tr>
					<tr>
						<td style="text-align:left;" width="50%"></td>
						<td style="text-align:left;" width="20%">TELP</td>
						<td style="text-align:left;" width="30%">' . $pLeaveDetail['telp'] . '</td>
					</tr>
					<tr>
						<td style="text-align:left;" width="50%">' . $pLeaveDetail['alamat_cuti'] . '</td>
						<td style="text-align:center;" width="50%">
							Hormat Saya<br><br><br><br>

							' . $pLeaveDetail['nama_pegawai'] . '<br>
							NIP ' . $pLeaveDetail['nip'] . '
						</td>
					</tr>
				  </table>';

		$html .= '<table border="1" width="100%" cellpadding="1" style="font-size:9px; border-collapse: collapse;">
					<tr>
						<td style="text-align:left;" colspan="4">VII. PERTIMBANGAN ATASAN LANGSUNG**</td>
					</tr>
					<tr>
						<td style="text-align:center;">DISETUJUI</td>
						<td style="text-align:center;">PERUBAHAN****</td>
						<td style="text-align:center;">DITANGGUHKAN****</td>
						<td style="text-align:center;">TIDAK DISETUJUI****</td>
					</tr>
					<tr>
						<td style="text-align:center;">' . ( $pLeaveDetail['pertimbangan_atasan_langsung'] == 1 ? '<img src="' . base_url('static') . '/dist/img/check_list.png" width="10"/>' : '' ) . '</td>
						<td style="text-align:center;">' . ( $pLeaveDetail['pertimbangan_atasan_langsung'] == 2 ? '<img src="' . base_url('static') . '/dist/img/check_list.png" width="10"/>' : '' ) . '</td>
						<td style="text-align:center;">' . ( $pLeaveDetail['pertimbangan_atasan_langsung'] == 3 ? '<img src="' . base_url('static') . '/dist/img/check_list.png" width="10"/>' : '' ) . '</td>
						<td style="text-align:center;">' . ( $pLeaveDetail['pertimbangan_atasan_langsung'] == 4 ? '<img src="' . base_url('static') . '/dist/img/check_list.png" width="10"/>' : '' ) . '</td>
					</tr>
				  </table><br>';

		$html .= '<table border="0" width="100%" cellpadding="1" style="font-size:9px;">
					<tr>
						<td style="text-align:left;" width="50%"></td>
						<td style="text-align:left;" width="50%">
							<table border="1">
								<tr>
									<td colspan="2" style="text-align:center;"><strong>TANDA TANGAN</strong></td>
								</tr>
								<tr>
									<td style="height:50px"></td>
									<td></td>
								</tr>
							</table>
						</td>
					</tr>
				  </table>';

		$html .= '<table border="1" width="100%" cellpadding="1" style="font-size:9px; border-collapse: collapse;">
					<tr>
						<td style="text-align:left;" colspan="4">KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI**</td>
					</tr>
					<tr>
						<td style="text-align:center;">DISETUJUI</td>
						<td style="text-align:center;">PERUBAHAN****</td>
						<td style="text-align:center;">DITANGGUHKAN****</td>
						<td style="text-align:center;">TIDAK DISETUJUI****</td>
					</tr>
					<tr>
						<td style="text-align:center;">' . ( $pLeaveDetail['keputusan_pejabat'] == 1 ? '<img src="' . base_url('static') . '/dist/img/check_list.png" width="10"/>' : '' ) . '</td>
						<td style="text-align:center;">' . ( $pLeaveDetail['keputusan_pejabat'] == 2 ? '<img src="' . base_url('static') . '/dist/img/check_list.png" width="10"/>' : '' ) . '</td>
						<td style="text-align:center;">' . ( $pLeaveDetail['keputusan_pejabat'] == 3 ? '<img src="' . base_url('static') . '/dist/img/check_list.png" width="10"/>' : '' ) . '</td>
						<td style="text-align:center;">' . ( $pLeaveDetail['keputusan_pejabat'] == 4 ? '<img src="' . base_url('static') . '/dist/img/check_list.png" width="10"/>' : '' ) . '</td>
					</tr>
				  </table><br>';

		$html .= '<table border="0" width="100%" cellpadding="1" style="font-size:9px;">
					<tr>
						<td style="text-align:left;" width="50%"></td>
						<td style="text-align:left;" width="20%"></td>
						<td style="text-align:left;" width="30%">
							<table border="1">
								<tr>
									<td style="text-align:center;"><strong>TANDA TANGAN</strong></td>
								</tr>
								<tr>
									<td style="height:50px"></td>
								</tr>
							</table>
						</td>
					</tr>
				  </table><br>';

		$html .= '<table border="0" width="100%" style="font-size:8px;">
					<tr>
						<td style="text-align:left;" colspan="3">Catatan</td>
					</tr>
					<tr>
						<td style="text-align:left;"  width="10%">*</td>
						<td style="text-align:left;" width="50%">Coret yang tidak perlu</td>
						<td rowspan="7" width="40%" style="text-align:center;">
							<img src="' . $pPathQRCode . '" width="60"><br>
							<strong style="font-size:10px;">#' . $pLeaveDetail['no_reference'] . '</strong>
						</td>
					</tr>
					<tr>
						<td style="text-align:left;"  width="10%">**</td>
						<td style="text-align:left;">Pilih salah satu dengan memberi centang </td>
					</tr>
					<tr>
						<td style="text-align:left;"  width="10%">***</td>
						<td style="text-align:left;">Diisi oleh pejabat yang menandatangani bidang kepegawaian sebelum PNS mengajukan cuti</td>
					</tr>
					<tr>
						<td style="text-align:left;"  width="10%">****</td>
						<td style="text-align:left;">Diberi tanda centang dan alasannya</td>
					</tr>
					<tr>
						<td style="text-align:left;"  width="10%">N</td>
						<td style="text-align:left;">Cuti Tahun Berjalan</td>
					</tr>
					<tr>
						<td style="text-align:left;"  width="10%">N-1</td>
						<td style="text-align:left;">Sisa Cuti 1 Tahun sebelumnya</td>
					</tr>
					<tr>
						<td style="text-align:left;"  width="10%">N-2</td>
						<td style="text-align:left;">Sisa Cuti 2 Tahun sebelumnya</td>
					</tr>
				  </table>';

		$pdf->setX(140);
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output('Form_Cuti_' . $pLeaveDetail['no_reference'] . '.pdf', 'I');

    }

}   