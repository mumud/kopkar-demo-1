<?php 
include '/../../system/function.php';
include '/../../system/config.php';
include '/../../system/helper.php';

$connect = new Connection();
$query = new CrudKopkar();
$helper = new html();

echo $helper->html5();
?>

<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Atlant - Responsive Bootstrap Admin Template</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <?php echo $helper->linkCss(BASE_URL.'plugin/css/theme-default.css') ?>
        <!-- EOF CSS INCLUDE -->
    </head>