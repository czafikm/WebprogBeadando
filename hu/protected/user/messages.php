<script type="text/javascript">document.title = "Yasu - Üzenetek"</script>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sendMessage'])) {
    $query = "SELECT username FROM users WHERE username = :username";
    $params = [':username' => $_POST['sent_to']];
    require_once DATABASE_CONTROLLER;
    $user = getRecord($query, $params);
    $date = date("Y-m-d H:i:s", time());
    $message=$_POST['message'];
    $postData = [
        'subject' => $_POST['subject'],
        'message' => $_POST['message'],
        'sent_at' => $date,
        'sent_to' => $_POST['sent_to']

    ];
        $query = "INSERT INTO messages (subject, message, sent_by, sent_to, sent_at) VALUES ( :subject, :message, :sent_by, :sent_to ,:sent_at)";
        $params = [
            ':subject' => $postData['subject'],
            ':message' => $postData['message'],
            ':sent_by' => $_SESSION['username'],
            ':sent_to' => $postData['sent_to'],
            ':sent_at' => $postData['sent_at']

        ];
    if (!isset($user['username'])) {
            if($_COOKIE['language']=="HU") echo "<div class='text-center' style='font-weight:bold;color:red;'>Nincs ilyen nevű felhasználó!</div>";
            else echo "<div class='text-center' style='font-weight:bold;color:red;'>There is no user with that name!</div>";
    }
    else{
        require_once DATABASE_CONTROLLER;
        if(!executeDML($query, $params)) {
            if($_COOKIE['language']=="HU") echo "<div class='text-center' style='font-weight:bold;color:red;'>Váratlan hiba törtnént!</div>";
            else echo "<div class='text-center' style='font-weight:bold;color:red;'>An unexpected error occurred!</div>";

        }
        else{
            if($_COOKIE['language']=="HU") echo "<div class='text-center' style='font-weight:bold;color:green;'>Az üzenet elküldve!</div>";
            else echo "<div class='text-center' style='font-weight:bold;color:green;'>The message was sent!</div>";
        }
    }
}
?>

<form method="post">
        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 id="messageTitle" class="modal-title w-100 font-weight-bold">Üzenet</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input name="sent_to" type="text" id="form34" class="form-control validate" value="<?=isset($postData) ? $postData['sent_to'] : "";?>">
          <label id="messageRecipient"  data-error="wrong" data-success="right" for="form34">Címzett</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-tag prefix grey-text"></i>
          <input type="text" id="form32" class="form-control validate" name="subject" value="<?=isset($postData) ? $postData['subject'] : "";?>">
          <label id="messageSubject" data-error="wrong" data-success="right" for="form32">Tárgy</label>
        </div>

        <div class="md-form">
          <i class="fas fa-pencil prefix grey-text"></i>
          <textarea type="text" id="form8" class="md-textarea form-control" rows="5" name="message"><?=isset($message) ? $message : "";?></textarea>
          <label id="messageContent" data-error="wrong" data-success="right" for="form8">Üzeneted</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" name="sendMessage" id="messageBtn" class="btn btn-unique"><i class="fas fa-paper-plane-o ml-1">Küldés</i></button>
      </div>
    </div>
  </div>
</div>

</form>
<div class="container" style="border: 2px solid;">
  <div class="row justify-content-md-center" style="border-bottom: 2px solid;">

<div class="text-center">
  <a id="newMessage" href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Új üzenet</a>
</div>
  </div>
<table id="messageTable">
<tbody>
  <tr>
    <th class="tg-0lax"><a id="messageIncome" href="index.php?P=inbox">Bejövő üzenetek</a></th>
  </tr>
  <tr>
    <th class="tg-0lax"><a id="messageOutcome" href="index.php?P=outbox">Kimenő üzenetek</a></th>
  </tr>
</tbody>
</table>
</div>
