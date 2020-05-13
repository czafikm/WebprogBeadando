<?php 
if(isset($_POST['s']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = $_POST['s'];
      if ($data=="cash") {
        Mission($_SESSION['username']);
      }
    }

?>

<h4 align="center">Ha a küldetés véget ért pénzt és szintet kapsz.</h4>
<div class="progress">
  <div id="prgbar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" >
    
  </div>
</div>
  <hr id="vonal" style="height: 0px;">
  <h3 class="text-center" id="missioncomplete"></h3>

<script type="text/javascript">	 
var i = 0;

var counterBack = setInterval(function () {
  i++;
  if (i <= 10) {
    $('.progress-bar').css('width', (i*10)+'%');
    document.getElementById("prgbar").innerHTML = i*10+"%";
  } else {
    document.getElementById("prgbar").innerHTML = "KÉSZ!";
    document.getElementById("missioncomplete").innerHTML = "Léptél egy szintet és kaptál 50 money -t!";
    //document.getElementById("vonal").setAttribute("style", "height: 2px;");
    clearInterval(counterBack);
    var s = 'cash';
    $.ajax({
    	type: 'POST',
      data: 's='+'cash',
      success:function(response) {
         console.log(s)
       },
      }); 
  }

}, 1000);



</script> 