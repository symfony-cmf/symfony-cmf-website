<?php

use Symfony\Components\DependencyInjection\Container;
use Symfony\Components\DependencyInjection\Reference;
use Symfony\Components\DependencyInjection\Parameter;


class helloProdProjectContainer extends Container
{
    protected $shared = array();

    
    public function __construct()
    {
        parent::__construct();

        $this->parameters = $this->getDefaultParameters();
    }

    
    protected function getEventDispatcherService()
    {
        if (isset($this->shared['event_dispatcher'])) return $this->shared['event_dispatcher'];

        $instance = new Symfony\Foundation\EventDispatcher($this);
        $this->shared['event_dispatcher'] = $instance;

        return $instance;
    }

    
    protected function getErrorHandlerService()
    {
        if (isset($this->shared['error_handler'])) return $this->shared['error_handler'];

        $instance = new Symfony\Foundation\Debug\ErrorHandler($this->getParameter('error_handler.level'));
        $this->shared['error_handler'] = $instance;
        $instance->register();

        return $instance;
    }

    
    protected function getHttpKernelService()
    {
        if (isset($this->shared['http_kernel'])) return $this->shared['http_kernel'];

        $instance = new Symfony\Components\HttpKernel\HttpKernel($this->getEventDispatcherService());
        $this->shared['http_kernel'] = $instance;

        return $instance;
    }

    
    protected function getRequestService()
    {
        if (isset($this->shared['request'])) return $this->shared['request'];

        $instance = new Symfony\Components\HttpKernel\Request();
        $this->shared['request'] = $instance;

        return $instance;
    }

    
    protected function getResponseService()
    {
        $instance = new Symfony\Components\HttpKernel\Response();

        return $instance;
    }

    
    protected function getControllerManagerService()
    {
        if (isset($this->shared['controller_manager'])) return $this->shared['controller_manager'];

        $instance = new Symfony\Framework\FoundationBundle\Controller\ControllerManager($this, $this->getService('logger', Container::NULL_ON_INVALID_REFERENCE));
        $this->shared['controller_manager'] = $instance;

        return $instance;
    }

    
    protected function getControllerLoaderService()
    {
        if (isset($this->shared['controller_loader'])) return $this->shared['controller_loader'];

        $instance = new Symfony\Framework\FoundationBundle\Listener\ControllerLoader($this->getControllerManagerService(), $this->getService('logger', Container::NULL_ON_INVALID_REFERENCE));
        $this->shared['controller_loader'] = $instance;

        return $instance;
    }

    
    protected function getRequestParserService()
    {
        if (isset($this->shared['request_parser'])) return $this->shared['request_parser'];

        $instance = new Symfony\Framework\FoundationBundle\Listener\RequestParser($this, $this->getRouterService(), $this->getService('logger', Container::NULL_ON_INVALID_REFERENCE));
        $this->shared['request_parser'] = $instance;

        return $instance;
    }

    
    protected function getRouterService()
    {
        if (isset($this->shared['router'])) return $this->shared['router'];

        $instance = new Symfony\Components\Routing\Router(array(0 => $this->getService('kernel'), 1 => 'registerRoutes'), array('cache_dir' => $this->getParameter('kernel.cache_dir'), 'debug' => $this->getParameter('kernel.debug'), 'matcher_cache_class' => $this->getParameter('kernel.name').'UrlMatcher', 'generator_cache_class' => $this->getParameter('kernel.name').'UrlGenerator'));
        $this->shared['router'] = $instance;

        return $instance;
    }

    
    protected function getEsiService()
    {
        if (isset($this->shared['esi'])) return $this->shared['esi'];

        $instance = new Symfony\Components\HttpKernel\Cache\Esi();
        $this->shared['esi'] = $instance;

        return $instance;
    }

    
    protected function getEsiFilterService()
    {
        if (isset($this->shared['esi_filter'])) return $this->shared['esi_filter'];

        $instance = new Symfony\Components\HttpKernel\Listener\EsiFilter($this->getService('esi', Container::NULL_ON_INVALID_REFERENCE));
        $this->shared['esi_filter'] = $instance;

        return $instance;
    }

    
    protected function getResponseFilterService()
    {
        if (isset($this->shared['response_filter'])) return $this->shared['response_filter'];

        $instance = new Symfony\Components\HttpKernel\Listener\ResponseFilter();
        $this->shared['response_filter'] = $instance;

        return $instance;
    }

    
    protected function getExceptionHandlerService()
    {
        if (isset($this->shared['exception_handler'])) return $this->shared['exception_handler'];

        $instance = new Symfony\Framework\FoundationBundle\Listener\ExceptionHandler($this, $this->getService('logger', Container::NULL_ON_INVALID_REFERENCE), $this->getParameter('exception_handler.controller'));
        $this->shared['exception_handler'] = $instance;

        return $instance;
    }

    
    protected function getTemplating_EngineService()
    {
        if (isset($this->shared['templating.engine'])) return $this->shared['templating.engine'];

        $instance = new Symfony\Framework\FoundationBundle\Templating\Engine($this, $this->getTemplating_Loader_FilesystemService(), array(), $this->getParameter('templating.output_escaper'));
        $this->shared['templating.engine'] = $instance;
        $instance->setCharset($this->getParameter('kernel.charset'));

        return $instance;
    }

    
    protected function getTemplating_Loader_FilesystemService()
    {
        if (isset($this->shared['templating.loader.filesystem'])) return $this->shared['templating.loader.filesystem'];

        $instance = new Symfony\Components\Templating\Loader\FilesystemLoader($this->getParameter('templating.loader.filesystem.path'));
        $this->shared['templating.loader.filesystem'] = $instance;
        if ($this->hasService('templating.debugger')) {
            $instance->setDebugger($this->getService('templating.debugger', Container::NULL_ON_INVALID_REFERENCE));
        }

        return $instance;
    }

    
    protected function getTemplating_Loader_CacheService()
    {
        if (isset($this->shared['templating.loader.cache'])) return $this->shared['templating.loader.cache'];

        $instance = new Symfony\Components\Templating\Loader\CacheLoader($this->getService('templating.loader.wrapped'), $this->getParameter('templating.loader.cache.path'));
        $this->shared['templating.loader.cache'] = $instance;
        if ($this->hasService('templating.debugger')) {
            $instance->setDebugger($this->getService('templating.debugger', Container::NULL_ON_INVALID_REFERENCE));
        }

        return $instance;
    }

    
    protected function getTemplating_Loader_ChainService()
    {
        if (isset($this->shared['templating.loader.chain'])) return $this->shared['templating.loader.chain'];

        $instance = new Symfony\Components\Templating\Loader\ChainLoader();
        $this->shared['templating.loader.chain'] = $instance;
        if ($this->hasService('templating.debugger')) {
            $instance->setDebugger($this->getService('templating.debugger', Container::NULL_ON_INVALID_REFERENCE));
        }

        return $instance;
    }

    
    protected function getTemplating_Helper_JavascriptsService()
    {
        if (isset($this->shared['templating.helper.javascripts'])) return $this->shared['templating.helper.javascripts'];

        $instance = new Symfony\Components\Templating\Helper\JavascriptsHelper($this->getTemplating_Helper_AssetsService());
        $this->shared['templating.helper.javascripts'] = $instance;

        return $instance;
    }

    
    protected function getTemplating_Helper_StylesheetsService()
    {
        if (isset($this->shared['templating.helper.stylesheets'])) return $this->shared['templating.helper.stylesheets'];

        $instance = new Symfony\Components\Templating\Helper\StylesheetsHelper($this->getTemplating_Helper_AssetsService());
        $this->shared['templating.helper.stylesheets'] = $instance;

        return $instance;
    }

    
    protected function getTemplating_Helper_SlotsService()
    {
        if (isset($this->shared['templating.helper.slots'])) return $this->shared['templating.helper.slots'];

        $instance = new Symfony\Components\Templating\Helper\SlotsHelper();
        $this->shared['templating.helper.slots'] = $instance;

        return $instance;
    }

    
    protected function getTemplating_Helper_AssetsService()
    {
        if (isset($this->shared['templating.helper.assets'])) return $this->shared['templating.helper.assets'];

        $instance = new Symfony\Components\Templating\Helper\AssetsHelper($this->getParameter('request.base_path'), '', $this->getParameter('templating.assets.version'));
        $this->shared['templating.helper.assets'] = $instance;

        return $instance;
    }

    
    protected function getTemplating_Helper_RequestService()
    {
        if (isset($this->shared['templating.helper.request'])) return $this->shared['templating.helper.request'];

        $instance = new Symfony\Framework\FoundationBundle\Helper\RequestHelper($this->getRequestService());
        $this->shared['templating.helper.request'] = $instance;

        return $instance;
    }

    
    protected function getTemplating_Helper_UserService()
    {
        if (isset($this->shared['templating.helper.user'])) return $this->shared['templating.helper.user'];

        $instance = new Symfony\Framework\FoundationBundle\Helper\UserHelper($this->getService('user'));
        $this->shared['templating.helper.user'] = $instance;

        return $instance;
    }

    
    protected function getTemplating_Helper_RouterService()
    {
        if (isset($this->shared['templating.helper.router'])) return $this->shared['templating.helper.router'];

        $instance = new Symfony\Framework\FoundationBundle\Helper\RouterHelper($this->getRouterService());
        $this->shared['templating.helper.router'] = $instance;

        return $instance;
    }

    
    protected function getTemplating_Helper_ActionsService()
    {
        if (isset($this->shared['templating.helper.actions'])) return $this->shared['templating.helper.actions'];

        $instance = new Symfony\Framework\FoundationBundle\Helper\ActionsHelper($this->getControllerManagerService());
        $this->shared['templating.helper.actions'] = $instance;

        return $instance;
    }

    
    protected function getTemplating_LoaderService()
    {
        return $this->getTemplating_Loader_FilesystemService();
    }

    
    protected function getTemplatingService()
    {
        return $this->getTemplating_EngineService();
    }

    
    public function findAnnotatedServiceIds($name)
    {
        static $annotations = array (
  'kernel.listener' => 
  array (
    'controller_loader' => 
    array (
      0 => 
      array (
      ),
    ),
    'request_parser' => 
    array (
      0 => 
      array (
      ),
    ),
    'esi_filter' => 
    array (
      0 => 
      array (
      ),
    ),
    'response_filter' => 
    array (
      0 => 
      array (
      ),
    ),
    'exception_handler' => 
    array (
      0 => 
      array (
      ),
    ),
  ),
  'templating.helper' => 
  array (
    'templating.helper.javascripts' => 
    array (
      0 => 
      array (
        'alias' => 'javascripts',
      ),
    ),
    'templating.helper.stylesheets' => 
    array (
      0 => 
      array (
        'alias' => 'stylesheets',
      ),
    ),
    'templating.helper.slots' => 
    array (
      0 => 
      array (
        'alias' => 'slots',
      ),
    ),
    'templating.helper.assets' => 
    array (
      0 => 
      array (
        'alias' => 'assets',
      ),
    ),
    'templating.helper.request' => 
    array (
      0 => 
      array (
        'alias' => 'request',
      ),
    ),
    'templating.helper.user' => 
    array (
      0 => 
      array (
        'alias' => 'user',
      ),
    ),
    'templating.helper.router' => 
    array (
      0 => 
      array (
        'alias' => 'router',
      ),
    ),
    'templating.helper.actions' => 
    array (
      0 => 
      array (
        'alias' => 'actions',
      ),
    ),
  ),
);

        return isset($annotations[$name]) ? $annotations[$name] : array();
    }

    
    protected function getDefaultParameters()
    {
        return array(
            'kernel.root_dir' => '/Users/jwage/Sites/symfony-sandbox/hello',
            'kernel.environment' => 'prod',
            'kernel.debug' => false,
            'kernel.name' => 'hello',
            'kernel.cache_dir' => '/Users/jwage/Sites/symfony-sandbox/hello/cache/prod',
            'kernel.logs_dir' => '/Users/jwage/Sites/symfony-sandbox/hello/logs',
            'kernel.bundle_dirs' => array(
                'Application' => '/Users/jwage/Sites/symfony-sandbox/hello/../src/Application',
                'Bundle' => '/Users/jwage/Sites/symfony-sandbox/hello/../src/Bundle',
                'Symfony\\Framework' => '/Users/jwage/Sites/symfony-sandbox/hello/../src/vendor/symfony/src/Symfony/Framework',
            ),
            'kernel.bundles' => array(
                0 => 'Symfony\\Foundation\\Bundle\\KernelBundle',
                1 => 'Symfony\\Framework\\FoundationBundle\\FoundationBundle',
                2 => 'Symfony\\Framework\\ZendBundle\\ZendBundle',
                3 => 'Symfony\\Framework\\SwiftmailerBundle\\SwiftmailerBundle',
                4 => 'Symfony\\Framework\\DoctrineBundle\\DoctrineBundle',
                5 => 'Application\\HelloBundle\\HelloBundle',
            ),
            'kernel.charset' => 'UTF-8',
            'templating.loader.filesystem.path' => array(
                0 => '/Users/jwage/Sites/symfony-sandbox/hello/views/%bundle%/%controller%/%name%%format%.%renderer%',
                1 => '/Users/jwage/Sites/symfony-sandbox/hello/../src/Application/%bundle%/Resources/views/%controller%/%name%%format%.%renderer%',
                2 => '/Users/jwage/Sites/symfony-sandbox/hello/../src/Bundle/%bundle%/Resources/views/%controller%/%name%%format%.%renderer%',
                3 => '/Users/jwage/Sites/symfony-sandbox/hello/../src/vendor/symfony/src/Symfony/Framework/%bundle%/Resources/views/%controller%/%name%%format%.%renderer%',
            ),
            'doctrine.orm.metadata_driver.mapping_dirs' => array(

            ),
            'doctrine.orm.entity_dirs' => array(

            ),
            'event_dispatcher.class' => 'Symfony\\Foundation\\EventDispatcher',
            'http_kernel.class' => 'Symfony\\Components\\HttpKernel\\HttpKernel',
            'request.class' => 'Symfony\\Components\\HttpKernel\\Request',
            'response.class' => 'Symfony\\Components\\HttpKernel\\Response',
            'error_handler.class' => 'Symfony\\Foundation\\Debug\\ErrorHandler',
            'error_handler.level' => NULL,
            'kernel.include_core_classes' => false,
            'kernel.compiled_classes' => array(
                0 => 'Symfony\\Components\\Routing\\Router',
                1 => 'Symfony\\Components\\Routing\\RouterInterface',
                2 => 'Symfony\\Components\\EventDispatcher\\Event',
                3 => 'Symfony\\Components\\Routing\\Matcher\\UrlMatcherInterface',
                4 => 'Symfony\\Components\\Routing\\Matcher\\UrlMatcher',
                5 => 'Symfony\\Components\\HttpKernel\\HttpKernel',
                6 => 'Symfony\\Components\\HttpKernel\\Request',
                7 => 'Symfony\\Components\\HttpKernel\\Response',
                8 => 'Symfony\\Components\\HttpKernel\\Listener\\ResponseFilter',
                9 => 'Symfony\\Components\\Templating\\Loader\\LoaderInterface',
                10 => 'Symfony\\Components\\Templating\\Loader\\Loader',
                11 => 'Symfony\\Components\\Templating\\Loader\\FilesystemLoader',
                12 => 'Symfony\\Components\\Templating\\Engine',
                13 => 'Symfony\\Components\\Templating\\Renderer\\RendererInterface',
                14 => 'Symfony\\Components\\Templating\\Renderer\\Renderer',
                15 => 'Symfony\\Components\\Templating\\Renderer\\PhpRenderer',
                16 => 'Symfony\\Components\\Templating\\Storage\\Storage',
                17 => 'Symfony\\Components\\Templating\\Storage\\FileStorage',
                18 => 'Symfony\\Framework\\FoundationBundle\\Controller',
                19 => 'Symfony\\Framework\\FoundationBundle\\Listener\\RequestParser',
                20 => 'Symfony\\Framework\\FoundationBundle\\Listener\\ControllerLoader',
                21 => 'Symfony\\Framework\\FoundationBundle\\Templating\\Engine',
            ),
            'request_parser.class' => 'Symfony\\Framework\\FoundationBundle\\Listener\\RequestParser',
            'controller_manager.class' => 'Symfony\\Framework\\FoundationBundle\\Controller\\ControllerManager',
            'controller_loader.class' => 'Symfony\\Framework\\FoundationBundle\\Listener\\ControllerLoader',
            'router.class' => 'Symfony\\Components\\Routing\\Router',
            'response_filter.class' => 'Symfony\\Components\\HttpKernel\\Listener\\ResponseFilter',
            'exception_handler.class' => 'Symfony\\Framework\\FoundationBundle\\Listener\\ExceptionHandler',
            'exception_handler.controller' => 'FoundationBundle:Exception:exception',
            'esi.class' => 'Symfony\\Components\\HttpKernel\\Cache\\Esi',
            'esi_filter.class' => 'Symfony\\Components\\HttpKernel\\Listener\\EsiFilter',
            'templating.engine.class' => 'Symfony\\Framework\\FoundationBundle\\Templating\\Engine',
            'templating.loader.filesystem.class' => 'Symfony\\Components\\Templating\\Loader\\FilesystemLoader',
            'templating.loader.cache.class' => 'Symfony\\Components\\Templating\\Loader\\CacheLoader',
            'templating.loader.chain.class' => 'Symfony\\Components\\Templating\\Loader\\ChainLoader',
            'templating.helper.javascripts.class' => 'Symfony\\Components\\Templating\\Helper\\JavascriptsHelper',
            'templating.helper.stylesheets.class' => 'Symfony\\Components\\Templating\\Helper\\StylesheetsHelper',
            'templating.helper.slots.class' => 'Symfony\\Components\\Templating\\Helper\\SlotsHelper',
            'templating.helper.assets.class' => 'Symfony\\Components\\Templating\\Helper\\AssetsHelper',
            'templating.helper.actions.class' => 'Symfony\\Framework\\FoundationBundle\\Helper\\ActionsHelper',
            'templating.helper.router.class' => 'Symfony\\Framework\\FoundationBundle\\Helper\\RouterHelper',
            'templating.helper.request.class' => 'Symfony\\Framework\\FoundationBundle\\Helper\\RequestHelper',
            'templating.helper.user.class' => 'Symfony\\Framework\\FoundationBundle\\Helper\\UserHelper',
            'templating.output_escaper' => false,
            'templating.assets.version' => NULL,
        );
    }
}
