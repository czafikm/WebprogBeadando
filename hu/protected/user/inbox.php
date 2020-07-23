<script type="text/javascript">document.title = "Yasu - Bejövő üzenetek"</script>
<?php 
	$query = "SELECT sent_by, subject, message, sent_at FROM messages WHERE sent_to = :sent_to";
	$params = [':sent_to' => $_SESSION['username']];
	require_once DATABASE_CONTROLLER;
	$messages = getList($query,$params);
?>
<div class="container">
	<table class="table table-sm" id="dtBasicExample">
			<thead class="thead-dark">
				<tr>
					<th >&nbsp;&nbsp;</th>
					<th style="font-weight: bold;">Feladó</th>
					<th style="font-weight: bold;">Dátum</th>
					<th style="font-weight: bold; width: 50%;">Tárgy</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($messages as $m) : ?>
					 <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
					  aria-hidden="true">
					  <div  class="modal-dialog modal-lg" role="document">
					    <div  style="background-color: silver;" class="modal-content">
					      <div class="modal-header text-center">
					        <h4 id="messageTitle" class="modal-title w-100 font-weight-bold">Üzenet</h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  style="outline: none;">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body" style="border:1px solid; white-space: pre;">
					      	<div>
					          	<p id="asd"></p>			      		
					      	</div>

					      </div>
					    </div>
					  </div>
					</div>
					<?php $i++; ?>
					<tr>
						<td scope="row" align="center"><input style="transform: scale(1.5);" type="checkbox"></td>
						<td><?=$m['sent_by'] ?></td>
						<td><?=$m['sent_at'] ?></td>
						<td><a style="font-weight: normal;" href="" data-target="#modalContactForm" data-toggle="modal" data-val="<?=$m['message'] ?>"><?=$m['subject'] ?></a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
</div>
	<script type="text/javascript">
		$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
$('#dtBasicExample').DataTable({
"order": [[ 2, "desc" ]],
    "columnDefs": [ {
       "targets": [ 0 ],
       "orderable": false
    } ],
});
$('#modalContactForm').on('show.bs.modal', function (event) {
  var myVal = $(event.relatedTarget).data('val');
  $(this).find("#asd").text(myVal);
});
	</script>