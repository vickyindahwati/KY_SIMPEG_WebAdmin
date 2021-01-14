<link href="<?php echo base_url('static');?>/plugins/org-chart/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url('static');?>/plugins/org-chart/css/jquery.orgchart.css" rel="stylesheet">
<style type="text/css">
    #chart-container { height:  620px; }
    .orgchart { background: white; }
</style>

<div id="container-list"></div>
<script src="<?php echo base_url('static');?>/plugins/org-chart/js/jquery.orgchart.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
       var datascource = {
            "id": 2,
            "parentid": 15,
            "name": "KMS A RONI",
            "title": "Kepala Biro Pengawasan Perilaku Hakim",
            "children": [
                {
                    "id": 73,
                    "parentid": 2,
                    "name": "SUHAILA",
                    "title": "Kepala Bagian Persidangan dan Pemeriksaan",
                    "children": [
                        {
                            "id": 58,
                            "parentid": 73,
                            "name": "DEDDY ISNIYANTO",
                            "title": "Kepala Subbagian Pemeriksaan II",
                            "children": []
                        },
                        {
                            "id": 77,
                            "parentid": 73,
                            "name": "JONSI AFRIANTARA",
                            "title": "Kepala Subbagian Pemeriksaan I",
                            "children": []
                        },
                        {
                            "id": 85,
                            "parentid": 73,
                            "name": "ARUM KUSUMAWARDHANI",
                            "title": "Kepala Subbagian Persidangan",
                            "children": []
                        }
                    ]
                },
                {
                    "id": 74,
                    "parentid": 2,
                    "name": "SUHAILA",
                    "title": "Kepala Bagian Pengolahan Laporan Masyarakat",
                    "children": [
                        {
                            "id": 60,
                            "parentid": 74,
                            "name": "LINA MARYANI",
                            "title": "Kepala Subbagian Administrasi Pelaporan Masyarakat",
                            "children": []
                        },
                        {
                            "id": 66,
                            "parentid": 74,
                            "name": "ELZA FAIZ",
                            "title": "Kepala Subbagian Verifikasi dan Anotasi",
                            "children": []
                        }
                    ]
                },
                {
                    "id": 91,
                    "parentid": 2,
                    "name": "NINIEK ARIYANI",
                    "title": "Kepala Bagian Pemantauan Perilaku Hakim",
                    "children": [
                        {
                            "id": 65,
                            "parentid": 91,
                            "name": "NARWANTO",
                            "title": "Kepala Subbagian Pemantauan I",
                            "children": []
                        },
                        {
                            "id": 68,
                            "parentid": 91,
                            "name": "SYUKRI QADRI",
                            "title": "Kepala Subbagian Pemantauan II",
                            "children": []
                        }
                    ]
                }
            ]
        };

    $('#container-list').orgchart({
      'data' : datascource,
      'nodeContent': 'title'
    });

    });
</script>