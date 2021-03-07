<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
<meta content="" name="author" />
<link rel="icon" href="favicon.ico" type="image/x-icon">
<?php
$lang = isset($_SESSION['sess_lang']) ? $_SESSION['sess_lang'] : "EN";
$lang_arr = array('AR', 'UR', 'HW', 'PS');
$lang_ltr = "";
if (in_array($lang, $lang_arr)) {
    $lang_ltr = 'yes';
}
?>
<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="../assets/css/sign-up.css" />
<link rel="stylesheet" href="../assets/plugins/magic/magic.css" />
<link rel="stylesheet" href="assets/css/bootstrap-front.css" />
<link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.css">
<link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<? if ($SITE_VERSION != 'v5') { ?> 
        <link rel="stylesheet" href="assets/css/style_v5_color.css">
    <link rel="stylesheet" href="assets/css/design_v5.css">
    <link rel="stylesheet" href="assets/css/style_v5.css">
<? } else { ?>
    <link rel="stylesheet" href="assets/css/design_v5.css">
    <link rel="stylesheet" href="assets/css/style_v5.css">  
    <link rel="stylesheet" href="assets/css/style_v5_color.css"> 
    <link href="assets/css/red.css" rel="alternate stylesheet" title="red" media="screen">
    <link href="assets/css/green.css" rel="alternate stylesheet" title="green" media="screen">
    <link href="assets/css/blue.css" rel="alternate stylesheet" title="blue" media="screen">
    <link href="assets/css/yellow.css" rel="alternate stylesheet" title="yellow" media="screen">
    <link href="assets/css/switcher.css" rel="stylesheet" media="screen">
    <div class="switcher hidden-xs toggled">
        <h3>Choose color</h3>
        <div class="color-panel clearfix">
            <a href="javascript:void(0)" data-map="#gmap" data-brand-img="img/brand.png" class="active color styleswitch" style="background-color:#D4B068;"> </a>
            <a href="javascript:void(0)" data-rel="yellow" data-brand-img="img/brand-yellow.png" data-map="#gmap-yellow" class="color styleswitch" style="background-color:#f3ca00;"> </a>
            <a href="javascript:void(0)" data-rel="green" data-brand-img="img/brand-green.png" data-map="#gmap-green" class="color styleswitch" style="background-color:#B1C26D;"> </a>
            <a href="javascript:void(0)" data-rel="red" data-brand-img="img/brand-red.png" data-map="#gmap-red" class="color styleswitch" style="background-color:#D99675;"> </a>
            <a href="javascript:void(0)" data-rel="blue" data-brand-img="img/brand-blue.png" data-map="#gmap-blue" class="color styleswitch" style="background-color:#5EB5BA;"> </a>
        </div>
        <div class="switcher-control"><img alt src="assets/img/gear.png"></div>
    </div>
    <script src="assets/js/interface.js"></script> 
    <script src="assets/js/styleswitch.js"></script>
    <script src="assets/js/styleswitch-demo.js"></script>
<? } ?>
<link rel="stylesheet" href="assets/css/fa-icon.css">
<link href="assets/css/initcarousel.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="assets/css/media.css">
<?php if (isset($_SESSION['eDirectionCode']) && $_SESSION['eDirectionCode'] != "" && $_SESSION['eDirectionCode']=='rtl') { ?>
    <link rel="stylesheet" href="assets/css/style_rtl.css">
<?php } ?>
<link href='//fonts.googleapis.com/css?family=Raleway:400,700,300,500,900,800,600,200,100' rel='stylesheet' type='text/css'>
<?php if (isset($_SESSION['sess_lang']) && $_SESSION['sess_lang'] != '') { ?>
    <link rel="stylesheet" href="assets/css/lang/<?= strtolower($_SESSION['sess_lang']); ?>.css"> 
<?php } ?>
<!-- Default js-->