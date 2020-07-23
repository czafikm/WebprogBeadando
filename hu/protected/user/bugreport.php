<script type="text/javascript">document.title = "Yasu - Hibajelentés"</script>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reportBug'])) {
    $message = nl2br($_POST['message']);
    $postData = [
        'subject' => $_POST['subject'],
        'message' => $message,
        'bugDangerLevel' => $_POST['bugDangerLevel']
    ];

    if(empty($postData['subject']) || empty($postData['message'] || $postData['bugDangerLevel']<0 || $postData['bugDangerLevel']>3)) {
        echo "<div class='text-center' style='font-weight:bold;color:red;'>Hiányzó adat(ok)!</div>";
    } else if(!BugReport( $_SESSION['username'], $postData['subject'], $postData['message'], $postData['bugDangerLevel'])) {
        echo "<div class='text-center' style='font-weight:bold;color:red;'>Sikertelen hibajelentés!</div>";
    }
}
?>


<!--Section: Contact v.2-->
<section class="mb-4 container">
    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Hibajelentés</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Ez az űrlap csak hibajelentésre használható. Ha segítségre van szükséged, keresd fel az oldal egyik <a href="index.php" style="color: black;">munkatársát</a>!</p>

    <div class="row ">

        <!--Grid column-->
        <div class="col mb-md-0">
            <form id="contact-form" name="contact-form" method="POST">
<div class="z-depth-5" style="padding: 10px; margin-bottom: 30px;">
                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control md-textarea" maxlength="64">
                            <label for="subject" class="" style="color: black;">Tárgy</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea  type="text" id="message" name="message" rows="5" class="form-control md-textarea " maxlength="800" ></textarea>
                            <label for="message" style="color: black;" >Hiba részletes leírása <span style="color: gray; font-size: 80%;"> (max. 800 karakter)</span></label>
                        </div>

                    </div>
                </div>
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                <label for="bugDangerLevel">Mennyire érzed súlyosnak a hibát?</label>
                <select class="form-control" id="bugDangerLevel" name="bugDangerLevel">
                    <option value="1">Nem zavarja a játékmenetet</option>
                    <option value="2">Kissé zavarja a játémenetet</option>
                    <option value="3">Nagyban zavarja a játékmenetet</option>
                </select>

                    </div>
                </div>
</div>
                <!--Grid row-->
            <div class="text-center text-md-center">
                <button type="submit" class="btn btn-primary btn btn-primary col-md-3" name="reportBug">Küldés</button>
            </div>
            </form>


        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->
