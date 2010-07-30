<?php $view->stylesheets->add('css/style.css') ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php $view->slots->output('title', 'Home') ?> | Symfony2 CMF</title>
        <?php echo $view->stylesheets ?>
    </head>
    <body>
        <div id="wrap">
            <div id="header">
                <h1 id="logo-text"><a href="<?php echo $view->router->generate('homepage') ?>">Symfony2 CMF</a></h1>
                <p id="slogan">Symfony2 Content Management Framework</p>

                <div id="top-menu">
                    <p><a href="http://www.symfony-reloaded.org" target="_BLANK">Symfony2</a> + <a href="http://www.doctrine-project.org/projects/orm/2.0/docs/en" target="_BLANK">Doctrine2</a></p>
                </div>
            </div>
            <div  id="nav">
                <ul>
                    <?php
                    $menu = array(
                    'Home' => 'homepage',
                    'Get Involved' => 'get_involved',
                    'About' => 'about',
                    'Wiki' => 'http://wiki.github.com/symfony-cmf/symfony-cmf'
                    );
                    ?>
                    <?php foreach ($menu as $label => $route): ?>
                    <?php if (strpos($route, 'http://') === false): ?>
                    <li><a href="<?php echo $view->router->generate($route) ?>"><?php echo $label ?></a></li>
                    <?php else: ?>
                    <li><a href="<?php echo $route ?>"><?php echo $label ?></a></li>
                    <?php endif; ?>

                    <?php endforeach; ?>
                </ul>
            </div>
            <div id="content">
                <div id="main">
                    <?php $view->slots->output('_content') ?>
                </div>
            </div>

            <div id="footer">
                <p>
                </p>
            </div>
        </div>
        <?php echo $view->javascripts ?>
    </body>
</html>
