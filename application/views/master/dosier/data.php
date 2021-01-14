<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">

<form id="form-filter-dosier" name="form-filter-dosier" class="form-horizontal">
    <input type="hidden" name="x_dosier_user_id" id="x_dosier_user_id" value="<?php echo $xId ?>">
    <div class="box-body">
        <div class="form-group">
            <div class="col-sm-5"></div>
            <div class="col-sm-1"><strong>Filter :</strong></div>
            <div class="col-sm-4">
                <select id="x_search_file_type" name="x_search_file_type" class="form-control">
                    <option value="">- Semua File -</option>
                    <?php 
                            foreach( $rsFileType->data as $dtFileType ){
                        ?>
                                <option value="<?php echo $dtFileType->id ?>"><?php echo $dtFileType->name; ?></option>
                        <?php 
                            }
                        ?>
                </select>
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
    </div>
</form>
<div class="box-body">   

    <table id="dt-table-dosier" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Jenis File</th>
                <th>Tgl. Upload</th>
                <th>File</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Jenis File</th>
                <th>Tgl. Upload</th>
                <th>File</th>
            </tr>
        </tfoot>
    </table> 

</div>

<!-- Constanta -->
<script src="<?php echo base_url('static');?>/custom/global_constanta.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('static');?>/custom/dosier.js"></script>