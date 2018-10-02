<div class="container" id="Statistical">
<div class="row">
<div class="col-xs-12 col-md-6">
<div  id="containerr" style="vertical-align: top; display: inline-block; width: 93%; height: 400px; margin: 10% auto auto auto; border:10px solid black; ">
<script language="JavaScript">
$(document).ready(function() {  
   var chart = {
       plotBackgroundColor: null,
       plotBorderWidth: null,
       plotShadow: false
   };
   var title = {
      text: "Le pourcentage d'absence de l'etudiant <?php echo $this->session->userdata('Etudiant')[0]->PrenomEtudiant." ". $this->session->userdata('Etudiant')[0]->NomEtudiant ;?>"  
   };      
   var tooltip = {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
   };
   var plotOptions = {
      pie: {
         allowPointSelect: true,
         cursor: 'pointer',
         dataLabels: {
            enabled: true,
            format: '<b>{point.name}%</b>: {point.percentage:.1f} %',
            style: {
               color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
            }
         }
      }
   };
   var series= [{
      type: 'pie',
      name: 'Pourcentage d\'absence',
      data: [
		<?php
		 for($i=0;$i<count($module);$i++){
			echo "['".$module[$i].".',".$pourcentage[$i]."],"; 
		 }
		?>
      ]
   }];     
        var credits = {
      enabled: false
   }; 
   var json = {};   
   json.chart = chart; 
   json.title = title;     
   json.tooltip = tooltip;  
   json.series = series;
   json.plotOptions = plotOptions;
   json.credits = credits;
   $('#containerr').highcharts(json);  
});
</script>
</div>
</div>
<div class="col-xs-12 col-md-6">
<div id="containerrr" style="vertical-align: top;display: inline-block; width: 93%; height: 400px; margin: 10% auto auto auto; border:10px solid black;">
<script language="JavaScript">
$(document).ready(function() {  
   var chart = {
      type: 'column'
   };
   var title = {
      text: "Nombre d'absences de l'etudiant <?php echo $this->session->userdata('Etudiant')[0]->PrenomEtudiant." ". $this->session->userdata('Etudiant')[0]->NomEtudiant ;?>"   
   };
   var subtitle = {
      text: ''  
   };
   var xAxis = {
      categories: <?php echo json_encode($module);?>,
      crosshair: true
   };
   var yAxis = {
      min: 0,
      max: <?php echo $max;?>,
	  title: {
         text: "Nombe d'absence(h)"         
      }      
   };
   var tooltip = {
      headerFormat: '<span style="font-size:10px">{point.key}</span>',
      pointFormat: '<p style="color:white;padding:auto">{series.name}{point.y:.1f} h </p>',
      footerFormat: '',
      shared: true,
      useHTML: true
   };
   var plotOptions = {
      column: {
         pointPadding: 0.2, borderWidth: 0
      }
   };  
   var credits = {
      enabled: false
   };
   var series= [{
		 name: "Nombre d'absences : ", data: <?php echo json_encode($pourcentage);?>
   }];     
   var json = {};   
   json.chart = chart; 
   json.title = title;   
   json.subtitle = subtitle; 
   json.tooltip = tooltip;
   json.xAxis = xAxis;
   json.yAxis = yAxis;  
   json.series = series;
   json.plotOptions = plotOptions;  
   json.credits = credits;
   $('#containerrr').highcharts(json);
});
</script>
</div>
</div>
</div>
</div>