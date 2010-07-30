<?php $view->extend('FrontendBundle::layout') ?>

<h2>Home</h2>

<p>
  Welcome to the home of the Symfony2 Content Management Framework. The project is organized
  by the Symfony community and has several sponsoring companies and prominent open source
  leaders. You can read learn more about the project on the <a href="<?php echo $view->router->generate('about') ?>">about</a> page.
</p>

<h2>Links</h2>
<ul>
    <li><a href="<?php echo $view->router->generate('about') ?>">About</a></li>
    <li><a href="<?php echo $view->router->generate('get_involved') ?>">Get Involved</a></li>
    <li><a href="http://wiki.github.com/symfony-cmf/symfony-cmf">Wiki</a></li>
</ul>