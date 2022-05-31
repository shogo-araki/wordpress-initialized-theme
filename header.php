<?php
$home_url = esc_url(home_url());
$theme_url = get_template_directory_uri();
?>

<!DOCTYPE html>
<html lang="ja">

<head>

    <!-- Information -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo $theme_url; ?>/favicon.ico" />

    <!-- fonts -->
    <style>
        @font-face {
            font-family: "satisfy";
            src: url("<?php echo $theme_url; ?>/fonts/Satisfy-Regular.ttf");
        }
    </style>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo $theme_url; ?>/css/style.css">

    <!-- js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo $theme_url; ?>/js/main.js"></script>

    <?php wp_head(); ?>
</head>

<body>
    <header class="l-header">
    </header>


    <?php get_sidebar(); ?>