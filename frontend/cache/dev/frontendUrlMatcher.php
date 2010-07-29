<?php

/**
 * frontendUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class frontendUrlMatcher extends Symfony\Components\Routing\Matcher\UrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(array $context = array(), array $defaults = array())
    {
        $this->context = $context;
        $this->defaults = $defaults;
    }

    public function match($url)
    {
        $url = $this->normalizeUrl($url);

        if (preg_match('#^/$#x', $url, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'FrontendBundle:Frontend:index',)), array('_route' => 'homepage'));
        }

        if (0 === strpos($url, '/get_involved') && preg_match('#^/get_involved$#x', $url, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'FrontendBundle:Frontend:get_involved',)), array('_route' => 'get_involved'));
        }

        if (0 === strpos($url, '/about') && preg_match('#^/about$#x', $url, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'FrontendBundle:Frontend:about',)), array('_route' => 'about'));
        }

        return false;
    }
}
