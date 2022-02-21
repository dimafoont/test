<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                    <?php the_custom_logo(); ?>
            </div>
            <?php wp_nav_menu(array(
			'menu' => 'top-menu'
			)); ?>
            <button class="mobile-menu">
                <span></span>
            </button>
        </div>
		<div class="mobile-menu-overlay"></div>
    </header>