<!-- DataTables -->
<?php /* <link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css"> */?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

<div class="box-body">

    <table id="dt-table-attendance" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Biro</th>
                <th>Tgl. Absen</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Kondisi Masuk</th>
                <th>Desk. Masuk</th>
                <th>Kondisi Keluar</th>
                <th>Desk. Keluar</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Biro</th>
                <th>Tgl. Absen</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Kondisi Masuk</th>
                <th>Desk. Masuk</th>
                <th>Kondisi Keluar</th>
                <th>Desk. Keluar</th>
            </tr>
        </tfoot>
    </table> 

</div>

<!-- Constanta -->
<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>

<?php /*
<script src="<?php echo base_url('static')?>/plugins/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/jszip/3.1.3/jszip.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="<?php echo base_url('static')?>/plugins/buttons/buttons.html5.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/buttons/buttons.print.min.js"></script>
*/?>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>


<script src="<?php echo base_url('static');?>/custom/attendance.js"></script>