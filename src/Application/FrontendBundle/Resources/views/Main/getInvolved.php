<?php $view->extend('FrontendBundle::layout') ?>
<?php $view['slots']->set('title', 'Get involved') ?>

<h2>Get Involved</h2>

<p>Want to get involved with the project? Here are some simple things you can do to get started:</p>

<ol>
    <li>Join the <a href="http://groups.google.com/group/symfony-cmf-devs">developers</a> mailing list and introduce yourself to the group.</li>
    <li>Idle in our <a href="irc://freenode/#symfony-cmf">IRC channel</a> and introduce yourself there as well.</li>
    <li>Read the <a href="<?php echo $view['router']->generate('about') ?>">about</a> page.</li>
    <li>Read through the <a href="http://wiki.github.com/symfony-cmf/symfony-cmf">Github Wiki</a></li>
</ol>
