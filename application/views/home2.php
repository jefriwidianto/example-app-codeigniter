<style>
 #chart{
   z-index:-10;} 
</style>
 
 
 <div id="chart">
</div>
<script src="<?php echo base_url();?>asset/highcharts/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>asset/highcharts/highcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>asset/highcharts/modules/exporting.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>asset/highcharts/modules/offline-exporting.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function(){
 new Highcharts.Chart({
  chart: {
   renderTo: 'chart',
   type: 'line',
  },
  title: {
   text: 'Grafik Statistik pengunjung',
   x: -20
  },
  subtitle: {
   text: 'Count visitor',
   x: -20
  },
  xAxis: {
   categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                    'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des']
  },
  yAxis: {
   title: {
    text: 'Total pengunjung'
   }
  },
  series: [{
   name: 'Data dalam Bulan',
   data: <?php echo json_encode($grafik); ?>
  }]
 });
}); 
</script>