<?php

include 'class/db/Update.php';
include 'class/db/Select.php';

use class\InsertLogic;
use class\db as Db;
use class\db\Select;
use class\func as Func;

$var = new InsertLogic;
$fName = $var->getFirstName();
$lName = $var->getLastName();
$email = $var->getEmail();
$phone = $var->getPhone();
$note = $var->getNote();
$token = $var->getCode();

$instToken = new Func\SessionToken;
$instToken->fceSessionToken('token', $token->myCode);

$instSelect = new Select;
$iString = $instSelect->fceSelectForUpdate($instToken->fceSessionToken('token', $token->myCode))->string;

if (isset($iString->myCode)) {
    if ($fName->stop != true and $lName->stop != true and $email->stop != true and $phone->stop != true and $token->stop != true) {
        $instInsert = new Db\Update;
        $instInsert->fceUpdate($fName->firstName, $lName->lastName, $phone->phone, $email->email, $note->note, $iString->myCode);
        $iString->firstName = '';
        $iString->lastName = '';
        $iString->email = '';
        $iString->phone = '';
        $iString->note = '';
        unset($_SESSION['token']);
        echo '<div class="statusOk">Odesláno do databáze...</div>';
    } elseif (isset($_POST['firstName'])) {
        echo '<div class="statusNo">Neuloženo...</div>';
    }
}
?>
<section>
    <div class="border">
        <h1>Editace kontaktu</h1>
        <p>
            Stránka, která vám umožní <em>editovat kontakt</em>. <strong>Editace kontaktu</strong> je díky PHP 8
            hračka.
        </p>
    </div>
</section>
<section>
    <div class="boxIndexProfil">
        <div class="boxIndexProfilCenter">
            <?php if ($iString->stop != true): ?>
            <form method="post" action="">
                <input id="fName" name="firstName" type="text" value="<?php echo $iString->firstName ?>"
                    placeholder="Jméno" maxlength="40" />
                <?php echo $fName->msg ?>
                <br />
                <label for="fName">&uarr;&uarr; Křestní jméno: &uarr;&uarr;</label>
                <br />
                <input id="lName" name="lastName" type="text" value="<?php echo $iString->lastName ?>"
                    placeholder="Příjmení" maxlength="40" />
                <?php echo $lName->msg ?>
                <br />
                <label for="lName">&uarr;&uarr; Příjmení: &uarr;&uarr;</label>
                <br />
                <input id="tel" name="phone" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{3}"
                    value="<?php echo $iString->phone ?>" placeholder="formát: 777123456" />
                <?php echo $phone->msg ?>
                <br />
                <label for="tel">&uarr;&uarr; Telefon: &uarr;&uarr;</label>
                <br />
                <input id="email" name="mail" type="email" value="<?php echo $iString->email ?>"
                    placeholder="example@example.cz" />
                <?php echo $email->msg ?>
                <br />
                <label for="email">&uarr;&uarr; E-mail: &uarr;&uarr;</label>
                <br />
                <textarea id="text" rows="10" cols="38" name="note" maxlength="2000"
                    placeholder="Poznámka..."><?php echo $iString->note ?></textarea>
                <br />
                <label for="text">&uarr;&uarr; Poznámka: &uarr;&uarr;</label>
                <br />
                <input type="submit" value="Uložit" />
            </form>
            <?php else: ?>
            <div class="statusNo">Data nepřichází...
                <br />
                Vraťte se na <a href="?section=list" title="Seznam kontaktů">seznam kontaktů</a> a klikněte na
                "Editovat"
            </div>
            <?php endif;?>
        </div>
    </div>
</section>