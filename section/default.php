<?php

include 'class/db/Insert.php';

use class\InsertLogic;
use class\func as Func;
use class\db as Db;

$var = new InsertLogic;
$fName = $var->getFirstName();
$lName = $var->getLastName();
$email = $var->getEmail();
$phone = $var->getPhone();
$note = $var->getNote();

if ($fName->stop != true and $lName->stop != true and $email->stop != true and $phone->stop != true) {
    $instInsert = new Db\Insert;
    $instCode = new Func\Code;
    $instInsert->fceInsert($fName->firstName, $lName->lastName, $phone->phone, $email->email, $note->note, $instCode->fceCode());
    $fName->firstName = '';
    $lName->lastName = '';
    $email->email = '';
    $phone->phone = '';
    $note->note = '';
    echo '<div class="statusOk">Odesláno do databáze...</div>';
} elseif (isset($_POST['firstName'])) {
    echo '<div class="statusNo">Neuloženo...</div>';
}
?>
<section>
    <div class="border">
        <h1>Kontakty</h1>
        <p>
            <strong>Kontakty</strong> můžete ukládat do databáze na této stránce. Vložte nebo editujte záznam v databázi
            pomocí <em>kontaktního formuláře</em>.
        </p>
    </div>
</section>
<section>
    <div class="boxIndexProfil">
        <div class="boxIndexProfilCenter">
            <form method="post" action="">
                <input id="fName" name="firstName" type="text" value="<?php echo $fName->firstName ?>"
                    placeholder="Jméno" maxlength="40" />
                <?php echo $fName->msg ?>
                <br />
                <label for="fName">&uarr;&uarr; Křestní jméno: &uarr;&uarr;</label>
                <br />
                <input id="lName" name="lastName" type="text" value="<?php echo $lName->lastName ?>"
                    placeholder="Příjmení" maxlength="40" />
                <?php echo $lName->msg ?>
                <br />
                <label for="lName">&uarr;&uarr; Příjmení: &uarr;&uarr;</label>
                <br />
                <input id="tel" name="phone" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{3}"
                    value="<?php echo $phone->phone ?>" placeholder="formát: 777123456" />
                <?php echo $phone->msg ?>
                <br />
                <label for="tel">&uarr;&uarr; Telefon: &uarr;&uarr;</label>
                <br />
                <input id="email" name="mail" type="email" value="<?php echo $email->email ?>"
                    placeholder="example@example.cz" />
                <?php echo $email->msg ?>
                <br />
                <label for="email">&uarr;&uarr; E-mail: &uarr;&uarr;</label>
                <br />
                <textarea id="text" rows="10" cols="38" name="note" maxlength="2000"
                    placeholder="Poznámka..."><?php echo $note->note ?></textarea>
                <br />
                <label for="text">&uarr;&uarr; Poznámka: &uarr;&uarr;</label>
                <br />
                <input type="submit" value="Uložit" />
            </form>
        </div>
    </div>
</section>