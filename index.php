<?php

    include_once    '/home/test/public_html/vendor/facebook/php-sdk-v4/src/Facebook/facebook.php';
    require_once    'config/configApp.php';
    require_once    'config/functions.php';
    require         'config/configFB.php';
    require         'config/fb.php';
?>

<html>
<head>
    <title>FB API Test</title>
    <!-- <meta content="FB Test" property="og:title" /> -->
    <!-- <meta content="http://test.arcmls.com/projects/red_oak_projects/Outstanding/composerFB/" property="og:url" /> -->
    <!-- <script type="text/javascript" href="assets/js/fbSDK.js"></script> -->
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>assets/css/style.css" />

</head>    


<body>

<!-- <?php /* include_once 'assets/js/fbSDK.js'; */ ?> -->

<header>
    <nav>
        <?php 
            if(isset($session)){ include 'nav_private.php'; }
            else { include 'nav_public.php'; }
        ?>
    </nav>
</header>

<main>
    
    <?php

    if(isset($session)){ 

        if($url == NULL){ require $localPath.'pages/home.php'; }
        else { require pageExist($url); } 

    } else {

     require 'login.php';

    }
?>
</main>

<footer>
</footer>


</body>
</html>
