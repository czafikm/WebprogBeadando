<div class="progress">
  <div id="prgbar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" ></div>
</div>

<script type="text/javascript">	 
var i = 0;

var counterBack = setInterval(function () {
  i++;
  if (i <= 10) {
    $('.progress-bar').css('width', (i*10)+'%');
    document.getElementById("prgbar").innerHTML = i*10+"%";
  } else {
    clearInterval(counterBack);
    $.ajax({
    	url: 'index.php?P=missionDone',
         type: 'get',
		});
  }

}, 1000);



</script> 