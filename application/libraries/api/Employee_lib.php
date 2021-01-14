<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee_lib
{
    protected $ci;
    private $_xToken;

    public function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->library('curl');

        $this->apiUrl = $this->ci->config->item("API_URL");
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
    }

    public function getEmployeeList( $pUserId, $pKeyword, $pLimit, $pOffset, $pDraw, $pType ){
        $xURLAPI = $this->apiUrl . "/user?keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&type=" . $pType;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',       
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        //echo $xURLAPI;
        return $xAPIResult;
    }


    /*Job Experience History*/
    public function getJobExperienceHistory( $pAdminId, $pUserId, $pKeyword, $pLimit, $pOffset, $pDraw, $pType ){
        $xURLAPI = $this->apiUrl . "/user/job_experience?id=" . $pUserId . "&keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&type=" . $pType;
        //echo ">>> API : " . $xURLAPI;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return $xAPIResult;
    }

    public function addJobExperienceHistory( $pAdminId, $pId, $pUserId, $pInstansi, $pJabatan, $pTglMulaiThn, $pTglMulaiBln, $pFilePengalaman ){
        $xURLAPI = $this->apiUrl . "/user/job_experience/add";
        $xParam = array( "user_id" => $pUserId, 
                         "id" => $pId,
                         "instansi" => $pInstansi,
                         "jabatan" => $pJabatan,
                         "tahun" => $pTglMulaiThn,
                         "bulan" => $pTglMulaiBln,
                         "pengalaman" =>$pFilePengalaman );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    public function confirmJobExperienceHistory( $pAdminId, $pId, $pUserId, $pType ){
        $xURLAPI = $this->apiUrl . "/user/job_experience/confirm";
        $xParam = array( "id" => $pId,
                         "user_id" => $pUserId,
                         "type" => $pType );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    /*SK-CPNS*/
    public function saveSKCPNS( $pAdminId,
                                $pUserId,
                                $pMulaiTanggal,
                                $pNIPPejabat,
                                $pNamaPejabat,
                                $pNoSuratKeputusan,
                                $pTglKeputusan,
                                $pNoSuratDiklat,
                                $pTglDiklat,
                                $pNoSuratUjiKesehatan,
                                $pTglSuratUjiKesehatan,
                                $pNoSKCK,
                                $pTglSKCK,
                                $pGolongan,
                                $pPengambilanSumpah,
                                $pFileSKCPNS,
                                $pFileSKCK ){

        $xURLAPI = $this->apiUrl . "/user/skcpns/add";
        $xParam = array( "user_id" => $pUserId,
                         "nama_pejabat_penetapan" => $pNamaPejabat,
                         "nip_pejabat_penetapan" => $pNIPPejabat,
                         "no_surat_keputusan" => $pNoSuratKeputusan,
                         "tgl_surat_keputusan" => $pTglKeputusan,
                         "terhitung_mulai_tanggal" => $pMulaiTanggal,
                         "no_diklat_prajabatan" => $pNoSuratDiklat,
                         "tgl_diklat_prajabatan" => $pTglDiklat,
                         "no_surat_uji_kesehatan" => $pNoSuratUjiKesehatan,
                         "tgl_surat_uji_kesehatan" => $pTglSuratUjiKesehatan,
                         "nomor_skck" => $pNoSKCK,
                         "tanggal_terbit_skck" => $pTglSKCK,
                         "golongan_ruang_id" => $pGolongan,
                         "pengambilan_sumpah" => $pPengambilanSumpah,
                         "sk_cpns" => $pFileSKCPNS,
                         "skck" => $pFileSKCK );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;

    }

    public function getSKCPNS( $pAdminId, $pUserId ){
        $xURLAPI = $this->apiUrl . "/user/skcpns?id=" . $pUserId;
        //echo ">>> API : " . $xURLAPI;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return json_decode($xAPIResult);
    }


    /*SK-PNS*/
    public function saveSKPNS( $pAdminId,
                                $pUserId,
                                $pMulaiTanggal,
                                $pNIPPejabat,
                                $pNamaPejabat,
                                $pNoSuratKeputusan,
                                $pTglKeputusan,
                                $pNoSuratDiklat,
                                $pTglDiklat,
                                $pNoSuratUjiKesehatan,
                                $pTglSuratUjiKesehatan,
                                $pGolongan,
                                $pPengambilanSumpah,
                                $pFileSKPNS ){

        $xURLAPI = $this->apiUrl . "/user/skpns/add";
        $xParam = array( "user_id" => $pUserId,
                         "nama_pejabat_penetapan" => $pNamaPejabat,
                         "nip_pejabat_penetapan" => $pNIPPejabat,
                         "no_surat_keputusan" => $pNoSuratKeputusan,
                         "tgl_surat_keputusan" => $pTglKeputusan,
                         "terhitung_mulai_tanggal" => $pMulaiTanggal,
                         "no_diklat_prajabatan" => $pNoSuratDiklat,
                         "tgl_diklat_prajabatan" => $pTglDiklat,
                         "no_surat_uji_kesehatan" => $pNoSuratUjiKesehatan,
                         "tgl_surat_uji_kesehatan" => $pTglSuratUjiKesehatan,
                         "golongan_ruang_id" => $pGolongan,
                         "pengambilan_sumpah" => $pPengambilanSumpah,
                         "sk_pns" => $pFileSKPNS );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;

    }

    public function getSKPNS( $pAdminId, $pUserId ){
        $xURLAPI = $this->apiUrl . "/user/skpns?id=" . $pUserId;
        //echo ">>> API : " . $xURLAPI;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return json_decode($xAPIResult);
    }

    /*SK-PNS*/
    public function saveSKPensiun( $pAdminId,
                                    $pUserId,
                                    $pNomorBKN,
                                    $pTglBKN,
                                    $pNoSKPensiun,
                                    $pTglPensiun,
                                    $pTmtPensiun,
                                    $pGolongId,
                                    $pMasaKerjaThn,
                                    $pMasaKerjaBln,
                                    $pUnitKerjaId ){

        $xURLAPI = $this->apiUrl . "/user/skpensiun/add";
        $xParam = array( "user_id" => $pUserId,
                         "no_bkn" => $pNomorBKN,
                         "tgl_bkn" => $pTglBKN,
                         "no_sk_pensiun" => $pNoSKPensiun,
                         "tgl_pensiun" => $pTglPensiun,
                         "tmt_pensiun" => $pTmtPensiun,
                         "golongan_id" => $pGolongId,
                         "masa_kerja_thn" => $pMasaKerjaThn,
                         "masa_kerja_bln" => $pMasaKerjaBln,
                         "unit_kerja_id" => $pUnitKerjaId );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;

    }

    public function getSKPensiun( $pAdminId, $pUserId ){
        $xURLAPI = $this->apiUrl . "/user/skpensiun?id=" . $pUserId;
        //echo ">>> API : " . $xURLAPI;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return json_decode($xAPIResult);
    }

    /*Employee History*/
    public function getRiwayatPangkat( $pAdminId, $pUserId, $pKeyword, $pLimit, $pOffset, $pDraw, $pType ){
        $xURLAPI = $this->apiUrl . "/user/riwayat_pangkat?id=" . $pUserId . "&keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&type=" . $pType;
        //echo ">>> API : " . $xURLAPI;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return $xAPIResult;
    }

    public function getRiwayatPendidikanUmum( $pAdminId, $pUserId, $pKeyword, $pLimit, $pOffset, $pDraw, $pType ){
        $xURLAPI = $this->apiUrl . "/user/riwayat_pendidikan_umum?id=" . $pUserId . "&keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&type=" . $pType;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return $xAPIResult;
    }

    public function getRiwayatPendidikanDiklat( $pAdminId, $pUserId, $pKeyword, $pLimit, $pOffset, $pDraw, $pType ){
        $xURLAPI = $this->apiUrl . "/user/riwayat_pendidikan_diklat?id=" . $pUserId . "&keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&type=" . $pType;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return $xAPIResult;
    }

    public function getRiwayatJabatan( $pAdminId, $pUserId, $pKeyword, $pLimit, $pOffset, $pDraw, $pType ){
        $xURLAPI = $this->apiUrl . "/user/riwayat_jabatan?id=" . $pUserId . "&keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&type=" . $pType;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return $xAPIResult;
    }

    /*KELUARGA*/
    public function getKeluarga( $pAdminId, $pUserId, $pParentUserFamilyId, $pKeyword, $pLimit, $pOffset, $pDraw, $pType ){
        $xURLAPI = $this->apiUrl . "/user/family?id=" . $pUserId . "&parent_user_family_id=" . $pParentUserFamilyId . "&keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&type=" . $pType;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return $xAPIResult;
    }

    public function getDropdownSuamiIstri( $pAdminId, $pUserId, $pKeyword, $pLimit, $pOffset, $pDraw, $pType ){
        $xURLAPI = $this->apiUrl . "/user/family/dropdown_suami_istri?id=" . $pUserId . "&keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&type=" . $pType;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return json_decode($xAPIResult);
    }

    public function saveUserFamily( $pAdminId,
                                    $pNama,
                                    $pGelarDepan,
                                    $pGelarBelakang,
                                    $pTempatLahir,
                                    $pTanggalLahir,
                                    $pJenisKelamin,
                                    $pAgama,
                                    $pEmail,
                                    $pNIK,
                                    $pAlamat,
                                    $pNoHp,
                                    $pNoTelp,
                                    $pStatusNikah,
                                    $pAkteLahir,
                                    $pStatusHidup,
                                    $pTglMeninggal,
                                    $pAkteMeninggal,
                                    $pTglNPWP,
                                    $pNoNPWP,
                                    $pAct,
                                    $pId ){

        $xURLAPI = $this->apiUrl . "/user/family/add_user";
        $xParam = array( "nik" => $pNIK,
                         "nama" => $pNama,
                         "gelar_depan" => $pGelarDepan,
                         "gelar_belakang" => $pGelarBelakang,
                         "tempat_lahir" => $pTempatLahir,
                         "tanggal_lahir" => $pTanggalLahir,
                         "jenis_kelamin_id" => $pJenisKelamin,
                         "agama_id" => $pAgama,
                         "email" => $pEmail,
                         "alamat" => $pAlamat,
                         "no_hp" => $pNoHp,
                         "telepon" => $pNoTelp,
                         "status_pernikahan_id" => $pStatusNikah,
                         "akte_kelahiran" => $pAkteLahir,
                         "status_hidup" => $pStatusHidup,
                         "akte_meninggal" => $pAkteMeninggal,
                         "tgl_meninggal" => $pTglMeninggal,
                         "no_npwp" => $pNoNPWP,
                         "tgl_npwp" => $pTglNPWP,
                         "act" => $pAct,
                         "id" => $pId );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;

    }

    public function saveFamily( $pAdminId,
                                $pUserId,
                                $pAct,
                                $pId,
                                $pUserFamilyId,
                                $pRelasiId,
                                $pTglMenikah,
                                $pAkteMenikah,
                                $pTglCerai,
                                $pAkteCerai,
                                $pIsPNS ){

        $xURLAPI = $this->apiUrl . "/user/family/add_user_family";
        $xParam = array( "id" => $pId,
                         "user_id" => $pUserId,
                         "user_family_id" => $pUserFamilyId,
                         "relasi_id" => $pRelasiId,
                         "tgl_menikah" => $pTglMenikah,
                         "akte_menikah" => $pAkteMenikah,
                         "tgl_cerai" => $pTglCerai,
                         "akte_cerai" => $pAkteCerai,
                         "is_pns" => $pIsPNS,
                         "act" => $pAct );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;

    }

    public function saveAnak( $pAdminId,
                                $pUserId,
                                $pAct,
                                $pId,
                                $pUserFamilyId,
                                $pParentUserFamilyId,
                                $pRelasiId,
                                $pStatusAnak ){

        $xURLAPI = $this->apiUrl . "/user/family/add_user_anak";
        $xParam = array( "id" => $pId,
                         "user_id" => $pUserId,
                         "user_family_id" => $pUserFamilyId,
                         "parent_user_family_id" => $pParentUserFamilyId,
                         "relasi_id" => $pRelasiId,
                         "status_anak" => $pStatusAnak,
                         "act" => $pAct );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;

    }

    /*PMK*/
    public function getPMK( $pAdminId, $pUserId, $pKeyword, $pLimit, $pOffset, $pDraw ){
        $xURLAPI = $this->apiUrl . "/user/pmk?id=" . $pUserId . "&keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&type=" . $pType;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return $xAPIResult;
    }

    /*Kursus*/
    public function getKursus( $pAdminId, $pUserId, $pKeyword, $pLimit, $pOffset, $pDraw ){
        $xURLAPI = $this->apiUrl . "/user/kursus?id=" . $pUserId . "&keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&type=" . $pType;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return $xAPIResult;
    }

    /*PENGHARGAAN*/
    public function getPenghargaan( $pAdminId, $pUserId, $pKeyword, $pLimit, $pOffset, $pDraw ){
        $xURLAPI = $this->apiUrl . "/user/penghargaan?id=" . $pUserId . "&keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&type=" . $pType;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return $xAPIResult;
    }

    /*DP3*/
    public function getDP3( $pAdminId, $pUserId, $pKeyword, $pLimit, $pOffset, $pDraw ){
        $xURLAPI = $this->apiUrl . "/user/dp3?id=" . $pUserId . "&keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&type=" . $pType;
        //echo ">>> API : " . $xURLAPI;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return $xAPIResult;
    }

    /*DP3*/
    public function addDP3( $pAdminId, $pUserId, $pJenisJabatanId, $pTahun, 
                            $pKesetiaan, 
                            $pTanggungJawab,
                            $pKejujuran,
                            $pPrakarsa,
                            $pPrestasiKerja,
                            $pKetaatan,
                            $pKerjasama,
                            $pKepemimpinan,
                            $pJumlah,
                            $pNilaiRata,
                            $pPejabatPenilaiId,
                            $pDP3Id,
                            $pAct){
        $xURLAPI = $this->apiUrl . "/user/dp3/add";
        $xParam = array( "user_id" => $pUserId, 
                         "pangkat_id" => $pJenisJabatanId,
                         "tahun" => $pTahun,
                         "kesetiaan" => $pKesetiaan,
                         "tanggung_jawab" => $pTanggungJawab,
                         "kejujuran" => $pKejujuran,
                         "prakarsa" => $pPrakarsa,
                         "prestasi_kerja" => $pPrestasiKerja,
                         "ketaatan" => $pKetaatan,
                         "kerjasama" => $pKerjasama,
                         "kepemimpinan" => $pKepemimpinan,
                         "jumlah" => $pJumlah,
                         "nilai_rata_rata" => $pNilaiRata,
                         "pejabat_penilai_id" => $pPejabatPenilaiId,
                         "dp3_id" => $pDP3Id,
                         "act" => $pAct );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    public function deleteDP3( $pAdminId, $pId ){
        $xURLAPI = $this->apiUrl . "/user/dp3/delete";
        $xParam = array( "id" => $pId );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    /*HUKUMAN DINAS*/
    public function addHukdis(  $pAdminId, $pUserId, 
                                $pJenisHukumanId, 
                                $pNoSkHd,
                                $pTglSkHd,
                                $pTmtHd,
                                $pMasaHukumanTahun,
                                $pMasaHukumanBulan,
                                $pNoPp,
                                $pAlasanHukuman,
                                $pKeterangan,
                                $pHukDisId,
                                $pAct){
        $xURLAPI = $this->apiUrl . "/user/hukdis/add";
        $xParam = array( "user_id" => $pUserId, 
                         "jenis_hukuman_id" => $pJenisHukumanId,
                         "no_sk_hd" => $pNoSkHd,
                         "tgl_sk_hd" => $pTglSkHd,
                         "tmt_hd" => $pTmtHd,
                         "masa_hukuman_tahun" => $pMasaHukumanTahun,
                         "masa_hukuman_bulan" => $pMasaHukumanBulan,
                         "no_pp" => $pNoPp,
                         "alasan_hukuman" => $pAlasanHukuman,
                         "keterangan" => $pKeterangan,
                         "hukdis_id" => $pHukDisId,
                         "act" => $pAct );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    /*PINDAH WILAYAH KERJA (PWK)*/
    public function addPwk(  $pAdminId, $pUserId, 
                                $pKppn, 
                                $pSatuanKerja,
                                $pLokasi,
                                $pUnor,
                                $pNoSK,
                                $pTglSK,
                                $pTmtPemindahan,
                                $pPwkId,
                                $pAct){
        $xURLAPI = $this->apiUrl . "/user/pwk/add";
        $xParam = array( "user_id" => $pUserId, 
                         "kppn_id" => $pKppn,
                         "satuan_kerja_id" => $pSatuanKerja,
                         "lokasi_id" => $pLokasi,
                         "unor_id" => $pUnor,
                         "no_sk" => $pNoSK,
                         "tgl_sk" => $pTglSK,
                         "tgl_sk" => $pTglSK,
                         "tmt_pemindahan" => $pTmtPemindahan,
                         "pwk_id" => $pPwkId,
                         "act" => $pAct );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    /*PINDAH INSTANSI*/
    public function addPindahInstansi( $pAdminId, $pUserId, 
                                        $pJenisPemindahan,
                                        $pJenisPegawai,
                                        $pJenisJabatanLama,
                                        $pJenisJabatanBaru,
                                        $pInstansiKerjaLama,
                                        $pInstansiKerjaBaru,
                                        $pSatuanKerjaLama,
                                        $pSatuanKerjaBaru,
                                        $pUnorLama,
                                        $pUnorBaru,
                                        $pJabatanFungsionalLama,
                                        $pJabatanFungsionalBaru,
                                        $pInstansiIndukLama,
                                        $pInstansiIndukBaru,
                                        $pSatuanKerjaIndukLama,
                                        $pSatuanKerjaIndukBaru,
                                        $pLokasiKerjaLama,
                                        $pLokasiKerjaBaru,
                                        $pKPPNBaru,
                                        $pJabatanFungsionalUmumBaru,
                                        $pNoSuratInstansiAsal,
                                        $pTglSK1,
                                        $pNoSuratInstansiAsalProv,
                                        $pTglSK2,
                                        $pNoSuratInstansiTujuan,
                                        $pTglSK3,
                                        $pNoSuratInstansiTujuanProv,
                                        $pTglSK4,
                                        $pNoSK,
                                        $pTglSK,
                                        $pTmtPi,
                                        $pPindahInstansiId,                                        
                                        $pAct){
        $xURLAPI = $this->apiUrl . "/user/pindah_instansi/add";
        $xParam = array( "user_id" => $pUserId, 
                         "jenis_pemindahan_id" => $pJenisPemindahan ,
                        "jenis_pegawai_id" => $pJenisPegawai ,
                        "pangkat_id_lama" => $pJenisJabatanLama ,
                        "pangkat_id_baru" => $pJenisJabatanBaru ,
                        "insker_lama_id" => $pInstansiKerjaLama ,
                        "insker_baru_id" => $pInstansiKerjaBaru ,
                        "satker_lama_id" => $pSatuanKerjaLama ,
                        "satker_baru_id" => $pSatuanKerjaBaru ,
                        "unor_lama_id" => $pUnorLama ,
                        "unor_baru_id" => $pUnorBaru ,
                        "jabfus_lama_id" => $pJabatanFungsionalLama ,
                        "jabfus_baru_id" => $pJabatanFungsionalBaru ,
                        "insduk_lama_id" => $pInstansiIndukLama ,
                        "insduk_baru_id" => $pInstansiIndukBaru ,
                        "satker_induk_lama_id" => $pSatuanKerjaIndukLama ,
                        "satker_induk_baru_id" => $pSatuanKerjaIndukBaru ,
                        "lokker_lama_id" => $pLokasiKerjaLama ,
                        "lokker_baru_id" => $pLokasiKerjaBaru ,
                        "kppn_baru_id" => $pKPPNBaru ,
                        "jabfusum_baru_id" => $pJabatanFungsionalUmumBaru ,
                        "no_surat_instansi_asal" => $pNoSuratInstansiAsal ,
                        "tgl_surat_instansi_asal" => $pTglSK1 ,
                        "no_surat_instansi_asal_prov" => $pNoSuratInstansiAsalProv ,
                        "tgl_surat_instansi_asal_prov" => $pTglSK2 ,
                        "no_surat_instansi_tujuan" => $pNoSuratInstansiTujuan ,
                        "tgl_surat_instansi_tujuan" => $pTglSK3 ,
                        "no_surat_instansi_tujuan_prov" => $pNoSuratInstansiTujuanProv ,
                        "tgl_surat_instansi_tujuan_prov" => $pTglSK4 ,
                        "pindah_instansi_id" => $pPindahInstansiId,
                        "no_sk" => $pNoSK,
                        "tgl_sk" => $pTglSK,
                        "tmt_pi" => $pTmtPi,
                        "act" => $pAct );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    /*CLTN*/
    public function addCLTN(  $pAdminId, $pUserId, 
                              $pJenisCLTN,
                              $pNoSK,
                              $pTglSK,
                              $pTglAwal,
                              $pTglAkhir,
                              $pTglAktif,
                              $pNoBKN,
                              $pTglBKN,
                              $pCLTNId,
                              $pAct){
        $xURLAPI = $this->apiUrl . "/user/cltn/add";
        $xParam = array( "user_id" => $pUserId, 
                         "jenis_cltn_id" => $pJenisCLTN,
                         "no_sk_cltn" => $pNoSK,
                         "tgl_skep" => $pTglSK,
                         "tgl_awal" => $pTglAwal,
                         "tgl_akhir" => $pTglAkhir,
                         "tgl_aktif" => $pTglAktif,
                         "no_bkn" => $pNoBKN,
                         "tgl_bkn" => $pTglBKN,
                         "cltn_id" => $pCLTNId,
                         "act" => $pAct );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    /* PROFESI */
    public function addProfesi(  $pAdminId, $pUserId, 
                                 $pJenisProfesi,
                                 $pPenyelenggara,
                                 $pTahunLulus,
                                 $pProfesiId,
                                 $pAct){
        $xURLAPI = $this->apiUrl . "/user/profesi/add";
        $xParam = array( "user_id" => $pUserId, 
                         "jenis_profesi_id" => $pJenisProfesi,
                         "penyelenggara" => $pPenyelenggara,
                         "tahun_lulus" => $pTahunLulus,
                         "profesi_id" => $pProfesiId,
                         "act" => $pAct );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    } 

    /* PROFESI */
    public function nonActiveEmployee(  $pAdminId, $pUserId, 
                                        $pTypeId,
                                        $pNoSk,
                                        $pTglSk,
                                        $pFileSk,
                                        $pTglEfektif){
        $xURLAPI = $this->apiUrl . "/user/non_active";
        $xParam = array( "user_id" => $pUserId, 
                         "type_id" => $pTypeId,
                         "no_sk" => $pNoSk,
                         "tgl_sk" => $pTglSk,
                         "file_sk" => $pFileSk  ,
                         "tgl_efektif" => $pTglEfektif );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    /*DOSIER*/
    public function saveDosier( $pAdminId,
                                $pUserId,
                                $pTypeId,
                                $pFileName ){

        $xURLAPI = $this->apiUrl . "/user/dosier/save";
        $xParam = array( "type_id" => $pTypeId,
                         "file_name" => $pFileName,
                         "user_id" => $pUserId );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;

    }

    /*NEWS*/
    public function saveNews( $pAdminId,
                              $pRoleId,
                              $pId,
                              $pTitle,
                              $pContent,
                              $pEffectiveDate,
                              $pExpireAt,
                              $pStatus,
                              $pAct ){

        $xURLAPI = $this->apiUrl . "/news/add";
        $xParam = array( "id" => $pId,
                         "created_by" => $pUserId,
                         "title" => $pTitle,
                         "content" => $pContent,
                         "effective_date" => $pEffectiveDate,
                         "expire_at" => $pExpireAt,
                         "status" => $pStatus,
                         "role_id" => $pRoleId,
                         "act" => $pAct );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;

    }


    /*LEAVE*/
    public function adjustAnualLeave( $pAdminId,
                                      $pUserId,
                                      $pN,
                                      $pN_1,
                                      $pN_2,
                                      $pNTangguhan ){

        $xURLAPI = $this->apiUrl . "/user/adjust_anual_leave";
        $xParam = array( "user_id" => $pUserId,
                         "cuti_tahunan_n" => $pN,
                         "cuti_tahunan_n_1" => $pN_1,
                         "cuti_tahunan_n_2" => $pN_2,
                         "cuti_ditangguhkan_n_plus_1" => $pNTangguhan );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    public function getLeaveTableData( $pModule, $pUserId, $pRoleId, $pKeyword, $pStatus, $pTglMulai, $pTglBerakhir, $pJenisCuti, $pLimit, $pOffset, $pDraw, $pOrderColumn, $pOrderDir ){
        $xURLAPI = $this->apiUrl . $pModule . "?id=" . $pUserId . "&role_id=" . $pRoleId . "&jenis_cuti=" . $pJenisCuti . "&keyword=" . $pKeyword . "&status=" . $pStatus . "&tgl_mulai=" . $pTglMulai . "&tgl_berakhir=" . $pTglBerakhir . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&order_col=" . $pOrderColumn . "&order_dir=" . $pOrderDir;
        //echo ">>> API : " . $xURLAPI;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return $xAPIResult;
    }

    public function getAnualLeaveInfo( $pUserId ){
        $xURLAPI = $this->apiUrl . "/user/leave/anual_leave_info?id=" . $pUserId;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($param),
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        //echo $xURLAPI;
        return json_decode($xAPIResult,true);

    }

    public function addLeave(  $pEncUserId,
                               $pUserId, 
                               $pTujuanJabatan,
                               $pJenisCuti,
                               $pCatatanCuti,
                               $pAlasanCuti,
                               $pTglMulai,
                               $pTglBerakhir,
                               $pLamaCuti,
                               $pAlamatCuti,
                               $pTelp,
                               $pNamaPegawai,
                               $pNIP,
                               $pJabatan,
                               $pMasaKerja,
                               $pUnitKerja ){

        $xURLAPI = $this->apiUrl . "/user/leave/save";
        $xParam = array( "user_id" => $pUserId,
                         "tujuan_jabatan_id" => $pTujuanJabatan,
                         "nama_pegawai" => $pNamaPegawai,
                         "nip" => $pNIP,
                         "jenis_cuti_id" => $pJenisCuti,
                         "catatan_cuti" => $pCatatanCuti,
                         "alasan_cuti" => $pAlasanCuti,
                         "lama_cuti" => $pLamaCuti,
                         "tgl_mulai" => $pTglMulai,
                         "tgl_berakhir" => $pTglBerakhir,
                         "alamat_cuti" => $pAlamatCuti,
                         "telp" => $pTelp,
                         "jabatan" => $pJabatan,
                         "masa_kerja" => $pMasaKerja,
                         "unit_kerja" => $pUnitKerja );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pEncUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;

    }

    public function updateStatusLeave( $pId,
                                       $pAdminId, 

                                       $pTglMulai,
                                       $pTglBerakhir,
                                       $pLamaCuti,

                                       $pPertimbanganAtasanLangsung,
                                       $pKeputusanPejabat,
                                       $pCatatanCuti ){

        $xURLAPI = $this->apiUrl . "/user/leave/update_status_leave";
        $xParam = array( "id" => $pId,
                         "admin_id" => $pAdminId,
                         "nama_pegawai" => $pNamaPegawai,
                         "pertimbangan_atasan_langsung" => $pPertimbanganAtasanLangsung,
                         "keputusan_pejabat" => $pKeputusanPejabat,
                         "catatan_cuti" => $pCatatanCuti,
                         "tgl_mulai" => $pTglMulai,
                         "tgl_berakhir" => $pTglBerakhir,
                         "lama_cuti" => $pLamaCuti );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;

    }

    public function cancelLeave($pId,
                                $pAdminId){
        $xURLAPI = $this->apiUrl . "/user/leave/cancel";
        $xParam = array( "id" => $pId,
                         "admin_id" => $pAdminId );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    public function changeLeave($pId,
                                $pAdminId,
                                $pTglMulai,
                                $pTglBerakhir,
                                $pLamaCuti){
        $xURLAPI = $this->apiUrl . "/user/leave/change";
        $xParam = array( "id" => $pId,
                         "admin_id" => $pAdminId,
                         "tgl_mulai" => $pTglMulai,
                         "tgl_berakhir" => $pTglBerakhir,
                         "lama_cuti" => $pLamaCuti );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    public function getLeaveDetail( $pId ){
        $xURLAPI = $this->apiUrl . "/user/leave/detail?id=" . $pId;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($param),
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        //echo $xURLAPI;
        return json_decode($xAPIResult,true);

    }

    public function getLastLeaveNote( $pId, $pUserId, $pJenisCuti ){
        $xURLAPI = $this->apiUrl . "/user/leave/last_leave_note?id=" . $pId . '&user_id=' . $pUserId . '&jenis_cuti=' . $pJenisCuti;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($param),
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        //echo $xURLAPI;
        return json_decode($xAPIResult,true);

    }

    public function doChangePassword( $pId, $pOldPassword, $pNewPassword ){

        $xURLAPI = $this->apiUrl . "/changePassword";
        $xParam = array( "id" => $pId,
                         "old_password" => $pOldPassword,
                         "new_password" => $pNewPassword );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        //echo $xURLAPI;
        return json_decode($xAPIResult,true);

    }

    /*GENERAL FUNCTION*/
    public function getTableData( $pModule, $pAdminId, $pUserId, $pKeyword, $pLimit, $pOffset, $pDraw ){
        $xURLAPI = $this->apiUrl . $pModule . "?id=" . $pUserId . "&keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&type=" . $pType;
        //echo ">>> API : " . $xURLAPI;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return $xAPIResult;
    }

    public function getDetailData( $pModule, $pRoleId, $pId ){
        $xURLAPI = $this->apiUrl . $pModule . "?id=" . $pId . "&role_id=" . $pRoleId;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return $xAPIResult;
    }

    public function deleteData( $pModule, $pAdminId, $pId ){
        $xURLAPI = $this->apiUrl . $pModule . "/delete";
        $xParam = array( "id" => $pId );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    public function getDosierTableData( $pUserId, $pRoleId, $pKeyword, $pFileTypeId, $pLimit, $pOffset, $pDraw, $pOrderColumn, $pOrderDir ){
        $xURLAPI = $this->apiUrl . "/user/dosier?id=" . $pUserId . "&role_id=" . $pRoleId . "&file_type=" . $pFileTypeId . "&keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&order_col=" . $pOrderColumn . "&order_dir=" . $pOrderDir;
        //echo ">>> API : " . $xURLAPI;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return $xAPIResult;
    }

}
?>