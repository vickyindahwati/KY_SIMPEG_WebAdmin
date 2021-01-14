<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.css">

<div class="box box-PRIMARY">
	<div class="box-header with-border">
    	<h3 class="box-title">PENILAIAN KINERJA <?php echo ( (int)date('Y') - 1 ); ?></h3>
  	</div>
  	<!-- /.box-header -->
  	<div class="box-body">
      <?php
      if( $rsSKP->nilai_skp == 0 || $rsSKP->nilai_skp == '' ){
      ?>
        <div><h2 style="text-align: center;color:#fa0f17;"><strong>KINERJA ANDA <br>BELUM DINILAI!</strong></h2></div>
      <?php
      }else{
      ?>
        <div id="gauge"></div>
      <?php  
      }
      ?>
  		
  	</div>
</div>

<!-- DataTables -->
<script src="<?php echo base_url('static')?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('static')?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	function loadChart(){
      ZC.LICENSE=["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
      window.feed = function(callback) {
        var tick = {};
        tick.plot0 = Math.ceil(350 + (Math.random() * 1));
        callback(JSON.stringify(tick));
      };

      var myConfig = {
        type: "gauge",
        globals: {
          fontSize: 12
        },
        plotarea:{
          marginTop:80
        },
        plot:{
          size:'100%',
          valueBox: {
            placement: 'center',
            text:'%v', //default
            fontSize:16,
            rules:[
              {
                rule:'%v >= 0 && %v < 1',
                text: ''
              },
              {
                rule:'%v >= 1 && %v < 2 ',
                text: ''
              },
              {
                rule:'%v >= 2 && %v < 3',
                text: ''
              },
              {
                rule:'%v >= 3',
                text: ''
              }   
            ]
          }
        },
        tooltip:{
          borderRadius:130
        },
        scaleR:{
          aperture:180,
          minValue:0,
          maxValue:100,
          step:1,
          center:{
            visible:false
          },
          tick:{
            visible:false
          },
          item:{
            offsetR:0,
            rules:[
              {
                rule:'%i == 9',
                offsetX:15
              }
            ]
          },
          labels:['BURUK','SANKSI RINGAN','SANKSI SEDANG','SANKSI BERAT'],
          ring:{
            size:50,
            rules:[
              {
                rule:'%v >= 0 && %v < 50',
                backgroundColor:'#EF5350'
              },
              {
                rule:'%v >= 50 && %v < 100 ',
                backgroundColor:'#49fc03'
              }/*,
              {
                rule:'%v >= 2 && %v < 3',
                backgroundColor:'#E53935'
              },
              {
                rule:'%v >= 3',
                backgroundColor:'#29B6F6'
              }      */
            ]
          }
        },
        /*refresh:{  
            type:"feed",
            transport:"js",
            url:"feed()",
            interval:1500,
            resetTimeout:1000
        },*/
        series : [
          {
            values : [parseInt('<?php echo $rsSKP->nilai_skp; ?>')], // starting value
            backgroundColor:'black',
            indicator:[],
            animation:{  
              effect:2,
              method:3,
              sequence:4,
              speed: 900
           },
          }
        ]
      };

      zingchart.render({ 
        id : 'gauge', 
        data : myConfig, 
        height: 250, 
        width: '95%'
      });
    }

	$(document).ready(function(){
		//loadChart();
	});
</script>