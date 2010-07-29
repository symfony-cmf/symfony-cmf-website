<?php

/**
 * helloUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class helloUrlMatcher extends Symfony\Components\Routing\Matcher\UrlMatcher
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
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'FoundationBundle:Default:index',)), array('_route' => 'homepage'));
        }

        if (0 === strpos($url, '/hello') && preg_match('#^/hello/(?P<name>[^/\.]+?)$#x', $url, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'HelloBundle:Hello:index',)), array('_route' => 'hello'));
        }

        return false;
    }
}
