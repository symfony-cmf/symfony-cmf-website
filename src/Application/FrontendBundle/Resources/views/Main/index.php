<?php $view->extend('FrontendBundle::layout') ?>

<h2>Home</h2>

<p>
Welcome to the home of the <a href="http://symfony.com/">Symfony2</a> Content Management Framework. The project is organized
by the Symfony community and has several sponsoring companies and prominent open source
leaders. You can read learn more about the project on the <a href="<?php echo $view['router']->generate('about') ?>">about</a> page.
</p>

<h2>Mission Statement</h2>
<p>
    The Symfony CMF project makes it easier for <strong>developers</strong> to add <strong>CMS functionality</strong> to 
    applications built with the <strong>Symfony2 PHP</strong> framework. Key development principles for the provided 
    <strong>set of bundles</strong> are <strong>scalability</strong>, <strong>usability</strong>, 
    <strong>documentation</strong> and <strong>testing</strong>
</p>

<h2>Links</h2>
<ul>
    <li><a href="<?php echo $view['router']->generate('about') ?>">About</a></li>
    <li><a href="./slides.html">Slides</a></li>
    <li><a href="<?php echo $view['router']->generate('get_involved') ?>">Get Involved</a></li>
    <li><a href="http://wiki.github.com/symfony-cmf/symfony-cmf">Wiki</a></li>
</ul>
