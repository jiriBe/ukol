<?php
session_start();
require 'loader.php';
?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/styleResponsive.css" />
    <?php echo $resultBrowserTestInst->fceBrowserTestIcon() ?>
    <meta name="theme-color" content="#0056C3" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#0056C3" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="robots" content="all, index, follow" />
    <script src="js/confirm.js"></script>
    <meta name="language" content="cs" />
    <meta charSet="utf-8" />
    <meta name="author" content="Jiří Beke, +420 776 03 06 02" />
    <meta name="description" content="<?php echo $switchVariable->fceSwitchMeta()->description ?>" />
    <meta name="keywords" content="<?php echo $switchVariable->fceSwitchMeta()->keywords ?>" />
    <title><?php echo $switchVariable->fceSwitchMeta()->title ?></title>
</head>

<body>
    <header>
        <nav>
            <div id="navBorder">
                <div class="borderHome">
                    <?php echo $navVariable->fceNavigationHome('.') ?>
                </div>
                <div class="borderLinks">
                    <?php echo $navVariable->fceNavigation('list', 'Výpis kontaktů') ?>
                    <?php echo $navVariable->fceNavigation('edit', 'Editace kontaktu') ?>
                </div>
            </div>
            <div class="navBorderMini">
                <?php echo $navVariable->fceNavigationMini('.', 'Vložít kontakt') ?>
                <?php echo $navVariable->fceNavigationMini('list', 'Seznam kontaktů') ?>
                <?php echo $navVariable->fceNavigationMini('edit', 'Editace kontaktu') ?>
            </div>
        </nav>
    </header>
    <main>
        <?php $switchIncludeVariable->fceSwitchInclude()->include?>
    </main>
    <footer>
        <?php include 'section/footer.php';?>
    </footer>
</body>

</html>