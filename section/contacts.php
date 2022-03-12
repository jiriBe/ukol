<?php

include 'class/db/Select.php';
include 'class/db/Update.php';

use class\db as Db;

$instInsert = new Db\Select;

if (isset($_GET['delete'])) {
    $instUpdate = new Db\Update;
    $instUpdate->fceDelete();
}

?>
<section>
    <div class="border">
        <h1>Seznam kontaktů</h1>
        <p>
            <strong>Seznam kontaktů</strong> k zobrazení. <em>Kontakty</em> se zobrazují podle času, od nejnovějšího.
        </p>
    </div>
</section>
<section>
    <div class="boxIndexProfil">
        <div class="boxIndexProfilCenter">
            <?php echo $instInsert->fceSelect() ?>
        </div>
    </div>
</section>