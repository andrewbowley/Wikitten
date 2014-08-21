<?php
// Sanitize html content:
function e($dirty) {
    return htmlspecialchars($dirty, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <?php if($page['title'] === false): ?>
            <title><?php echo e(APP_NAME) ?></title>
        <?php else: ?>
            <title><?php echo e($page['title']) ?> - <?php echo e(APP_NAME) ?></title>
        <?php endif ?>

        <base href="<?php echo BASE_URL; ?>/">

        <link rel="shortcut icon" href="static/img/favicon.ico">
        <link rel="stylesheet" href="static/css/bootstrap.min.css">
        <link rel="stylesheet" href="static/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" href="static/css/font-awesome.min.css">
        <link rel="stylesheet" href="static/css/prettify.css">
        <link rel="stylesheet" href="static/css/codemirror.css">
        <link rel="stylesheet" href="static/css/main.css">

        <meta name="description" content="<?php echo e($page['description']) ?>">
        <meta name="keywords" content="<?php echo e(join(',', $page['tags'])) ?>">

        <?php if(!empty($page['author'])): ?>
            <meta name="author" content="<?php echo e($page['author']) ?>">
        <?php endif; ?>

        <script src="static/js/jquery.min.js"></script>
        <script src="static/js/jasny-bootstrap.min.js"></script>
        <script src="static/js/prettify.js"></script>
        <script src="static/js/codemirror.min.js"></script>
    </head>
<body>
    <div id="main">
        <?php if(USE_WIKITTEN_LOGO): ?>
            <a href="http://wikitten.vizuina.com" id="logo" target="_blank" class="hidden-phone">
                <img src="static/img/logo.png" alt="">
                <div class="bubble">Remember to check for updates!</div>
            </a>
        <?php endif; ?>

        <div class="navmenu navmenu-default navmenu-fixed-left">
            <div id="sidebar">
                <div class="inner">
                    <h2><?php echo e(APP_NAME) ?></h2>
                    <?php include('tree.php') ?>
                </div>
            </div>
        </div>

        <div class="navbar navbar-default navbar-fixed-top hidden-lg hidden-md">
            <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h2 href="#" class="navbar-brand"><?php echo e(APP_NAME) ?></h2>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="content">
                        <div class="inner">
                            <?php echo $content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        <?php if(USE_WIKITTEN_LOGO): ?>
            $(document).ready(function () {
                $('#logo').delay(2000).animate({
                    left: '20px'
                }, 600);
            });
        <?php endif; ?>
    </script>
</body>
</html>
