<?php
$menu = array(
    'Home' => 'homepage',
    'Get Involved' => 'get_involved',
    'About' => 'about',
    'Wiki' => 'http://wiki.github.com/symfony-cmf/symfony-cmf'
);
?>
<div id="nav">
    <ul>
    <?php foreach ($menu as $label => $route): ?>
        <?php if (0 === strncmp($route, 'http://', 7)): //absolute url ?>
        <li><a href="<?php echo $route ?>"><?php echo $label ?></a></li>
        <?php elseif($route === $current): // current route ?>
        <li class="current"><a href="<?php echo $view['router']->generate($route) ?>"><?php echo $label ?></a></li>
        <?php else: ?>
        <li><a href="<?php echo $view['router']->generate($route) ?>"><?php echo $label ?></a></li>
        <?php endif; ?>
    <?php endforeach; ?>
    </ul>
</div>
