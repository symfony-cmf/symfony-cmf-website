<?php

use Symfony\Components\DependencyInjection\Container;
use Symfony\Components\DependencyInjection\Reference;
use Symfony\Components\DependencyInjection\Parameter;

/**
 * frontendDevDebugProjectContainer
 *
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @property Symfony\Foundation\Debug\EventDispatcher $event_dispatcher
 * @property Symfony\Foundation\Debug\ErrorHandler $error_handler
 * @property Symfony\Components\HttpKernel\HttpKernel $http_kernel
 * @property Symfony\Components\HttpKernel\Request $request
 * @property Symfony\Components\HttpKernel\Response $response
 * @property Symfony\Foundation\Debug\EventDispatcher $debug.event_dispatcher
 * @property Symfony\Framework\FoundationBundle\Templating\Debugger $templating.debugger
 * @property Symfony\Framework\FoundationBundle\Controller\ControllerManager $controller_manager
 * @property Symfony\Framework\FoundationBundle\Listener\ControllerLoader $controller_loader
 * @property Symfony\Framework\FoundationBundle\Listener\RequestParser $request_parser
 * @property Symfony\Components\Routing\Router $router
 * @property Symfony\Components\HttpKernel\Cache\Esi $esi
 * @property Symfony\Components\HttpKernel\Listener\EsiFilter $esi_filter
 * @property Symfony\Components\HttpKernel\Listener\ResponseFilter $response_filter
 * @property Symfony\Framework\FoundationBundle\Listener\ExceptionHandler $exception_handler
 * @property Symfony\Framework\FoundationBundle\Templating\Engine $templating.engine
 * @property Symfony\Components\Templating\Loader\FilesystemLoader $templating.loader.filesystem
 * @property Symfony\Components\Templating\Loader\CacheLoader $templating.loader.cache
 * @property Symfony\Components\Templating\Loader\ChainLoader $templating.loader.chain
 * @property Symfony\Components\Templating\Helper\JavascriptsHelper $templating.helper.javascripts
 * @property Symfony\Components\Templating\Helper\StylesheetsHelper $templating.helper.stylesheets
 * @property Symfony\Components\Templating\Helper\SlotsHelper $templating.helper.slots
 * @property Symfony\Components\Templating\Helper\AssetsHelper $templating.helper.assets
 * @property Symfony\Framework\FoundationBundle\Helper\RequestHelper $templating.helper.request
 * @property Symfony\Framework\FoundationBundle\Helper\UserHelper $templating.helper.user
 * @property Symfony\Framework\FoundationBundle\Helper\RouterHelper $templating.helper.router
 * @property Symfony\Framework\FoundationBundle\Helper\ActionsHelper $templating.helper.actions
 * @property Symfony\Framework\FoundationBundle\Profiler $profiler
 * @property Symfony\Components\HttpKernel\Profiler\ProfilerStorage $profiler.storage
 * @property Symfony\Components\HttpKernel\Listener\Profiling $profiling
 * @property Symfony\Framework\FoundationBundle\DataCollector\ConfigDataCollector $data_collector.config
 * @property Symfony\Framework\FoundationBundle\DataCollector\AppDataCollector $data_collector.app
 * @property Symfony\Framework\FoundationBundle\DataCollector\TimerDataCollector $data_collector.timer
 * @property Symfony\Components\HttpKernel\Profiler\DataCollector\MemoryDataCollector $data_collector.memory
 * @property Symfony\Components\HttpKernel\Listener\WebDebugToolbar $debug.toolbar
 * @property Symfony\Framework\ZendBundle\Logger\Logger $zend.logger
 * @property Zend\Log\Writer\Stream $zend.logger.writer.filesystem
 * @property Zend\Log\Formatter\Simple $zend.formatter.filesystem
 * @property Symfony\Framework\ZendBundle\Logger\DebugLogger $zend.logger.writer.debug
 * @property Zend\Log\Filter\Priority $zend.logger.filter
 * @property Symfony\Components\Templating\Loader\FilesystemLoader $templating.loader
 * @property Symfony\Framework\FoundationBundle\Templating\Engine $templating
 * @property Symfony\Framework\ZendBundle\Logger\Logger $logger
 */
class frontendDevDebugProjectContainer extends Container
{
    protected $shared = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->parameters = $this->getDefaultParameters();
    }

    /**
     * Gets the 'event_dispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Foundation\Debug\EventDispatcher A Symfony\Foundation\Debug\EventDispatcher instance.
     */
    protected function getEventDispatcherService()
    {
        if (isset($this->shared['event_dispatcher'])) return $this->shared['event_dispatcher'];

        $instance = new Symfony\Foundation\Debug\EventDispatcher($this, $this->getService('logger', Container::NULL_ON_INVALID_REFERENCE));
        $this->shared['event_dispatcher'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'error_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Foundation\Debug\ErrorHandler A Symfony\Foundation\Debug\ErrorHandler instance.
     */
    protected function getErrorHandlerService()
    {
        if (isset($this->shared['error_handler'])) return $this->shared['error_handler'];

        $instance = new Symfony\Foundation\Debug\ErrorHandler($this->getParameter('error_handler.level'));
        $this->shared['error_handler'] = $instance;
        $instance->register();

        return $instance;
    }

    /**
     * Gets the 'http_kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\HttpKernel\HttpKernel A Symfony\Components\HttpKernel\HttpKernel instance.
     */
    protected function getHttpKernelService()
    {
        if (isset($this->shared['http_kernel'])) return $this->shared['http_kernel'];

        $instance = new Symfony\Components\HttpKernel\HttpKernel($this->getEventDispatcherService());
        $this->shared['http_kernel'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\HttpKernel\Request A Symfony\Components\HttpKernel\Request instance.
     */
    protected function getRequestService()
    {
        if (isset($this->shared['request'])) return $this->shared['request'];

        $instance = new Symfony\Components\HttpKernel\Request();
        $this->shared['request'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'response' service.
     *
     * @return Symfony\Components\HttpKernel\Response A Symfony\Components\HttpKernel\Response instance.
     */
    protected function getResponseService()
    {
        $instance = new Symfony\Components\HttpKernel\Response();

        return $instance;
    }

    /**
     * Gets the 'debug.event_dispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Foundation\Debug\EventDispatcher A Symfony\Foundation\Debug\EventDispatcher instance.
     */
    protected function getDebug_EventDispatcherService()
    {
        if (isset($this->shared['debug.event_dispatcher'])) return $this->shared['debug.event_dispatcher'];

        $instance = new Symfony\Foundation\Debug\EventDispatcher($this, $this->getService('logger', Container::NULL_ON_INVALID_REFERENCE));
        $this->shared['debug.event_dispatcher'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.debugger' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\FoundationBundle\Templating\Debugger A Symfony\Framework\FoundationBundle\Templating\Debugger instance.
     */
    protected function getTemplating_DebuggerService()
    {
        if (isset($this->shared['templating.debugger'])) return $this->shared['templating.debugger'];

        $instance = new Symfony\Framework\FoundationBundle\Templating\Debugger($this->getService('logger', Container::NULL_ON_INVALID_REFERENCE));
        $this->shared['templating.debugger'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'controller_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\FoundationBundle\Controller\ControllerManager A Symfony\Framework\FoundationBundle\Controller\ControllerManager instance.
     */
    protected function getControllerManagerService()
    {
        if (isset($this->shared['controller_manager'])) return $this->shared['controller_manager'];

        $instance = new Symfony\Framework\FoundationBundle\Controller\ControllerManager($this, $this->getService('logger', Container::NULL_ON_INVALID_REFERENCE));
        $this->shared['controller_manager'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'controller_loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\FoundationBundle\Listener\ControllerLoader A Symfony\Framework\FoundationBundle\Listener\ControllerLoader instance.
     */
    protected function getControllerLoaderService()
    {
        if (isset($this->shared['controller_loader'])) return $this->shared['controller_loader'];

        $instance = new Symfony\Framework\FoundationBundle\Listener\ControllerLoader($this->getControllerManagerService(), $this->getService('logger', Container::NULL_ON_INVALID_REFERENCE));
        $this->shared['controller_loader'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'request_parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\FoundationBundle\Listener\RequestParser A Symfony\Framework\FoundationBundle\Listener\RequestParser instance.
     */
    protected function getRequestParserService()
    {
        if (isset($this->shared['request_parser'])) return $this->shared['request_parser'];

        $instance = new Symfony\Framework\FoundationBundle\Listener\RequestParser($this, $this->getRouterService(), $this->getService('logger', Container::NULL_ON_INVALID_REFERENCE));
        $this->shared['request_parser'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\Routing\Router A Symfony\Components\Routing\Router instance.
     */
    protected function getRouterService()
    {
        if (isset($this->shared['router'])) return $this->shared['router'];

        $instance = new Symfony\Components\Routing\Router(array(0 => $this->getService('kernel'), 1 => 'registerRoutes'), array('cache_dir' => $this->getParameter('kernel.cache_dir'), 'debug' => $this->getParameter('kernel.debug'), 'matcher_cache_class' => $this->getParameter('kernel.name').'UrlMatcher', 'generator_cache_class' => $this->getParameter('kernel.name').'UrlGenerator'));
        $this->shared['router'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'esi' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\HttpKernel\Cache\Esi A Symfony\Components\HttpKernel\Cache\Esi instance.
     */
    protected function getEsiService()
    {
        if (isset($this->shared['esi'])) return $this->shared['esi'];

        $instance = new Symfony\Components\HttpKernel\Cache\Esi();
        $this->shared['esi'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'esi_filter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\HttpKernel\Listener\EsiFilter A Symfony\Components\HttpKernel\Listener\EsiFilter instance.
     */
    protected function getEsiFilterService()
    {
        if (isset($this->shared['esi_filter'])) return $this->shared['esi_filter'];

        $instance = new Symfony\Components\HttpKernel\Listener\EsiFilter($this->getService('esi', Container::NULL_ON_INVALID_REFERENCE));
        $this->shared['esi_filter'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'response_filter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\HttpKernel\Listener\ResponseFilter A Symfony\Components\HttpKernel\Listener\ResponseFilter instance.
     */
    protected function getResponseFilterService()
    {
        if (isset($this->shared['response_filter'])) return $this->shared['response_filter'];

        $instance = new Symfony\Components\HttpKernel\Listener\ResponseFilter();
        $this->shared['response_filter'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'exception_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\FoundationBundle\Listener\ExceptionHandler A Symfony\Framework\FoundationBundle\Listener\ExceptionHandler instance.
     */
    protected function getExceptionHandlerService()
    {
        if (isset($this->shared['exception_handler'])) return $this->shared['exception_handler'];

        $instance = new Symfony\Framework\FoundationBundle\Listener\ExceptionHandler($this, $this->getService('logger', Container::NULL_ON_INVALID_REFERENCE), $this->getParameter('exception_handler.controller'));
        $this->shared['exception_handler'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.engine' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\FoundationBundle\Templating\Engine A Symfony\Framework\FoundationBundle\Templating\Engine instance.
     */
    protected function getTemplating_EngineService()
    {
        if (isset($this->shared['templating.engine'])) return $this->shared['templating.engine'];

        $instance = new Symfony\Framework\FoundationBundle\Templating\Engine($this, $this->getTemplating_Loader_FilesystemService(), array(), $this->getParameter('templating.output_escaper'));
        $this->shared['templating.engine'] = $instance;
        $instance->setCharset($this->getParameter('kernel.charset'));

        return $instance;
    }

    /**
     * Gets the 'templating.loader.filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\Templating\Loader\FilesystemLoader A Symfony\Components\Templating\Loader\FilesystemLoader instance.
     */
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

    /**
     * Gets the 'templating.loader.cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\Templating\Loader\CacheLoader A Symfony\Components\Templating\Loader\CacheLoader instance.
     */
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

    /**
     * Gets the 'templating.loader.chain' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\Templating\Loader\ChainLoader A Symfony\Components\Templating\Loader\ChainLoader instance.
     */
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

    /**
     * Gets the 'templating.helper.javascripts' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\Templating\Helper\JavascriptsHelper A Symfony\Components\Templating\Helper\JavascriptsHelper instance.
     */
    protected function getTemplating_Helper_JavascriptsService()
    {
        if (isset($this->shared['templating.helper.javascripts'])) return $this->shared['templating.helper.javascripts'];

        $instance = new Symfony\Components\Templating\Helper\JavascriptsHelper($this->getTemplating_Helper_AssetsService());
        $this->shared['templating.helper.javascripts'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.helper.stylesheets' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\Templating\Helper\StylesheetsHelper A Symfony\Components\Templating\Helper\StylesheetsHelper instance.
     */
    protected function getTemplating_Helper_StylesheetsService()
    {
        if (isset($this->shared['templating.helper.stylesheets'])) return $this->shared['templating.helper.stylesheets'];

        $instance = new Symfony\Components\Templating\Helper\StylesheetsHelper($this->getTemplating_Helper_AssetsService());
        $this->shared['templating.helper.stylesheets'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.helper.slots' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\Templating\Helper\SlotsHelper A Symfony\Components\Templating\Helper\SlotsHelper instance.
     */
    protected function getTemplating_Helper_SlotsService()
    {
        if (isset($this->shared['templating.helper.slots'])) return $this->shared['templating.helper.slots'];

        $instance = new Symfony\Components\Templating\Helper\SlotsHelper();
        $this->shared['templating.helper.slots'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.helper.assets' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\Templating\Helper\AssetsHelper A Symfony\Components\Templating\Helper\AssetsHelper instance.
     */
    protected function getTemplating_Helper_AssetsService()
    {
        if (isset($this->shared['templating.helper.assets'])) return $this->shared['templating.helper.assets'];

        $instance = new Symfony\Components\Templating\Helper\AssetsHelper($this->getParameter('request.base_path'), '', $this->getParameter('templating.assets.version'));
        $this->shared['templating.helper.assets'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.helper.request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\FoundationBundle\Helper\RequestHelper A Symfony\Framework\FoundationBundle\Helper\RequestHelper instance.
     */
    protected function getTemplating_Helper_RequestService()
    {
        if (isset($this->shared['templating.helper.request'])) return $this->shared['templating.helper.request'];

        $instance = new Symfony\Framework\FoundationBundle\Helper\RequestHelper($this->getRequestService());
        $this->shared['templating.helper.request'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.helper.user' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\FoundationBundle\Helper\UserHelper A Symfony\Framework\FoundationBundle\Helper\UserHelper instance.
     */
    protected function getTemplating_Helper_UserService()
    {
        if (isset($this->shared['templating.helper.user'])) return $this->shared['templating.helper.user'];

        $instance = new Symfony\Framework\FoundationBundle\Helper\UserHelper($this->getService('user'));
        $this->shared['templating.helper.user'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.helper.router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\FoundationBundle\Helper\RouterHelper A Symfony\Framework\FoundationBundle\Helper\RouterHelper instance.
     */
    protected function getTemplating_Helper_RouterService()
    {
        if (isset($this->shared['templating.helper.router'])) return $this->shared['templating.helper.router'];

        $instance = new Symfony\Framework\FoundationBundle\Helper\RouterHelper($this->getRouterService());
        $this->shared['templating.helper.router'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.helper.actions' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\FoundationBundle\Helper\ActionsHelper A Symfony\Framework\FoundationBundle\Helper\ActionsHelper instance.
     */
    protected function getTemplating_Helper_ActionsService()
    {
        if (isset($this->shared['templating.helper.actions'])) return $this->shared['templating.helper.actions'];

        $instance = new Symfony\Framework\FoundationBundle\Helper\ActionsHelper($this->getControllerManagerService());
        $this->shared['templating.helper.actions'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'profiler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\FoundationBundle\Profiler A Symfony\Framework\FoundationBundle\Profiler instance.
     */
    protected function getProfilerService()
    {
        if (isset($this->shared['profiler'])) return $this->shared['profiler'];

        $instance = new Symfony\Framework\FoundationBundle\Profiler($this, $this->getProfiler_StorageService(), $this->getService('logger', Container::NULL_ON_INVALID_REFERENCE));
        $this->shared['profiler'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'profiler.storage' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\HttpKernel\Profiler\ProfilerStorage A Symfony\Components\HttpKernel\Profiler\ProfilerStorage instance.
     */
    protected function getProfiler_StorageService()
    {
        if (isset($this->shared['profiler.storage'])) return $this->shared['profiler.storage'];

        $instance = new Symfony\Components\HttpKernel\Profiler\ProfilerStorage($this->getParameter('profiler.storage.file'), NULL, $this->getParameter('profiler.storage.lifetime'));
        $this->shared['profiler.storage'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'profiling' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\HttpKernel\Listener\Profiling A Symfony\Components\HttpKernel\Listener\Profiling instance.
     */
    protected function getProfilingService()
    {
        if (isset($this->shared['profiling'])) return $this->shared['profiling'];

        $instance = new Symfony\Components\HttpKernel\Listener\Profiling($this->getProfilerService());
        $this->shared['profiling'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'data_collector.config' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\FoundationBundle\DataCollector\ConfigDataCollector A Symfony\Framework\FoundationBundle\DataCollector\ConfigDataCollector instance.
     */
    protected function getDataCollector_ConfigService()
    {
        if (isset($this->shared['data_collector.config'])) return $this->shared['data_collector.config'];

        $instance = new Symfony\Framework\FoundationBundle\DataCollector\ConfigDataCollector($this);
        $this->shared['data_collector.config'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'data_collector.app' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\FoundationBundle\DataCollector\AppDataCollector A Symfony\Framework\FoundationBundle\DataCollector\AppDataCollector instance.
     */
    protected function getDataCollector_AppService()
    {
        if (isset($this->shared['data_collector.app'])) return $this->shared['data_collector.app'];

        $instance = new Symfony\Framework\FoundationBundle\DataCollector\AppDataCollector($this);
        $this->shared['data_collector.app'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'data_collector.timer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\FoundationBundle\DataCollector\TimerDataCollector A Symfony\Framework\FoundationBundle\DataCollector\TimerDataCollector instance.
     */
    protected function getDataCollector_TimerService()
    {
        if (isset($this->shared['data_collector.timer'])) return $this->shared['data_collector.timer'];

        $instance = new Symfony\Framework\FoundationBundle\DataCollector\TimerDataCollector($this);
        $this->shared['data_collector.timer'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'data_collector.memory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\HttpKernel\Profiler\DataCollector\MemoryDataCollector A Symfony\Components\HttpKernel\Profiler\DataCollector\MemoryDataCollector instance.
     */
    protected function getDataCollector_MemoryService()
    {
        if (isset($this->shared['data_collector.memory'])) return $this->shared['data_collector.memory'];

        $instance = new Symfony\Components\HttpKernel\Profiler\DataCollector\MemoryDataCollector();
        $this->shared['data_collector.memory'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'debug.toolbar' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\HttpKernel\Listener\WebDebugToolbar A Symfony\Components\HttpKernel\Listener\WebDebugToolbar instance.
     */
    protected function getDebug_ToolbarService()
    {
        if (isset($this->shared['debug.toolbar'])) return $this->shared['debug.toolbar'];

        $instance = new Symfony\Components\HttpKernel\Listener\WebDebugToolbar($this->getProfilerService());
        $this->shared['debug.toolbar'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'zend.logger' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\ZendBundle\Logger\Logger A Symfony\Framework\ZendBundle\Logger\Logger instance.
     */
    protected function getZend_LoggerService()
    {
        if (isset($this->shared['zend.logger'])) return $this->shared['zend.logger'];

        $instance = new Symfony\Framework\ZendBundle\Logger\Logger();
        $this->shared['zend.logger'] = $instance;
        $instance->addWriter($this->getZend_Logger_Writer_FilesystemService());
        $instance->addWriter($this->getZend_Logger_Writer_DebugService());

        return $instance;
    }

    /**
     * Gets the 'zend.logger.writer.filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Zend\Log\Writer\Stream A Zend\Log\Writer\Stream instance.
     */
    protected function getZend_Logger_Writer_FilesystemService()
    {
        if (isset($this->shared['zend.logger.writer.filesystem'])) return $this->shared['zend.logger.writer.filesystem'];

        $instance = new Zend\Log\Writer\Stream($this->getParameter('zend.logger.path'));
        $this->shared['zend.logger.writer.filesystem'] = $instance;
        $instance->addFilter($this->getZend_Logger_FilterService());
        $instance->setFormatter($this->getZend_Formatter_FilesystemService());

        return $instance;
    }

    /**
     * Gets the 'zend.formatter.filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Zend\Log\Formatter\Simple A Zend\Log\Formatter\Simple instance.
     */
    protected function getZend_Formatter_FilesystemService()
    {
        if (isset($this->shared['zend.formatter.filesystem'])) return $this->shared['zend.formatter.filesystem'];

        $instance = new Zend\Log\Formatter\Simple($this->getParameter('zend.formatter.filesystem.format'));
        $this->shared['zend.formatter.filesystem'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'zend.logger.writer.debug' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Framework\ZendBundle\Logger\DebugLogger A Symfony\Framework\ZendBundle\Logger\DebugLogger instance.
     */
    protected function getZend_Logger_Writer_DebugService()
    {
        if (isset($this->shared['zend.logger.writer.debug'])) return $this->shared['zend.logger.writer.debug'];

        $instance = new Symfony\Framework\ZendBundle\Logger\DebugLogger();
        $this->shared['zend.logger.writer.debug'] = $instance;
        $instance->addFilter($this->getZend_Logger_FilterService());

        return $instance;
    }

    /**
     * Gets the 'zend.logger.filter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Zend\Log\Filter\Priority A Zend\Log\Filter\Priority instance.
     */
    protected function getZend_Logger_FilterService()
    {
        if (isset($this->shared['zend.logger.filter'])) return $this->shared['zend.logger.filter'];

        $instance = new Zend\Log\Filter\Priority($this->getParameter('zend.logger.priority'));
        $this->shared['zend.logger.filter'] = $instance;

        return $instance;
    }

    /**
     * Gets the templating.loader service alias.
     *
     * @return Symfony\Components\Templating\Loader\FilesystemLoader An instance of the templating.loader.filesystem service
     */
    protected function getTemplating_LoaderService()
    {
        return $this->getTemplating_Loader_FilesystemService();
    }

    /**
     * Gets the templating service alias.
     *
     * @return Symfony\Framework\FoundationBundle\Templating\Engine An instance of the templating.engine service
     */
    protected function getTemplatingService()
    {
        return $this->getTemplating_EngineService();
    }

    /**
     * Gets the logger service alias.
     *
     * @return Symfony\Framework\ZendBundle\Logger\Logger An instance of the zend.logger service
     */
    protected function getLoggerService()
    {
        return $this->getZend_LoggerService();
    }

    /**
     * Returns service ids for a given annotation.
     *
     * @param string $name The annotation name
     *
     * @return array An array of annotations
     */
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
    'profiling' => 
    array (
      0 => 
      array (
      ),
    ),
    'debug.toolbar' => 
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
  'data_collector' => 
  array (
    'data_collector.config' => 
    array (
      0 => 
      array (
        'core' => true,
      ),
    ),
    'data_collector.app' => 
    array (
      0 => 
      array (
        'core' => true,
      ),
    ),
    'data_collector.timer' => 
    array (
      0 => 
      array (
        'core' => true,
      ),
    ),
    'data_collector.memory' => 
    array (
      0 => 
      array (
        'core' => true,
      ),
    ),
  ),
);

        return isset($annotations[$name]) ? $annotations[$name] : array();
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return array(
            'kernel.root_dir' => '/Users/jwage/Sites/symfony-sandbox/frontend',
            'kernel.environment' => 'dev',
            'kernel.debug' => true,
            'kernel.name' => 'frontend',
            'kernel.cache_dir' => '/Users/jwage/Sites/symfony-sandbox/frontend/cache/dev',
            'kernel.logs_dir' => '/Users/jwage/Sites/symfony-sandbox/frontend/logs',
            'kernel.bundle_dirs' => array(
                'Application' => '/Users/jwage/Sites/symfony-sandbox/frontend/../src/Application',
                'Bundle' => '/Users/jwage/Sites/symfony-sandbox/frontend/../src/Bundle',
                'Symfony\\Framework' => '/Users/jwage/Sites/symfony-sandbox/frontend/../src/vendor/symfony/src/Symfony/Framework',
            ),
            'kernel.bundles' => array(
                0 => 'Symfony\\Foundation\\Bundle\\KernelBundle',
                1 => 'Symfony\\Framework\\FoundationBundle\\FoundationBundle',
                2 => 'Symfony\\Framework\\ZendBundle\\ZendBundle',
                3 => 'Symfony\\Framework\\SwiftmailerBundle\\SwiftmailerBundle',
                4 => 'Symfony\\Framework\\DoctrineBundle\\DoctrineBundle',
                5 => 'Application\\FrontendBundle\\FrontendBundle',
            ),
            'kernel.charset' => 'UTF-8',
            'templating.loader.filesystem.path' => array(
                0 => '/Users/jwage/Sites/symfony-sandbox/frontend/views/%bundle%/%controller%/%name%%format%.%renderer%',
                1 => '/Users/jwage/Sites/symfony-sandbox/frontend/../src/Application/%bundle%/Resources/views/%controller%/%name%%format%.%renderer%',
                2 => '/Users/jwage/Sites/symfony-sandbox/frontend/../src/Bundle/%bundle%/Resources/views/%controller%/%name%%format%.%renderer%',
                3 => '/Users/jwage/Sites/symfony-sandbox/frontend/../src/vendor/symfony/src/Symfony/Framework/%bundle%/Resources/views/%controller%/%name%%format%.%renderer%',
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
            'debug.event_dispatcher.class' => 'Symfony\\Foundation\\Debug\\EventDispatcher',
            'templating.debugger.class' => 'Symfony\\Framework\\FoundationBundle\\Templating\\Debugger',
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
            'profiler.class' => 'Symfony\\Framework\\FoundationBundle\\Profiler',
            'profiler.storage.class' => 'Symfony\\Components\\HttpKernel\\Profiler\\ProfilerStorage',
            'profiler.storage.file' => '/Users/jwage/Sites/symfony-sandbox/frontend/cache/dev/profiler.db',
            'profiler.storage.lifetime' => 86400,
            'profiling.class' => 'Symfony\\Components\\HttpKernel\\Listener\\Profiling',
            'data_collector.config.class' => 'Symfony\\Framework\\FoundationBundle\\DataCollector\\ConfigDataCollector',
            'data_collector.app.class' => 'Symfony\\Framework\\FoundationBundle\\DataCollector\\AppDataCollector',
            'data_collector.timer.class' => 'Symfony\\Framework\\FoundationBundle\\DataCollector\\TimerDataCollector',
            'data_collector.memory.class' => 'Symfony\\Components\\HttpKernel\\Profiler\\DataCollector\\MemoryDataCollector',
            'debug.toolbar.class' => 'Symfony\\Components\\HttpKernel\\Listener\\WebDebugToolbar',
            'zend.logger.class' => 'Symfony\\Framework\\ZendBundle\\Logger\\Logger',
            'zend.logger.priority' => 6,
            'zend.logger.writer.debug.class' => 'Symfony\\Framework\\ZendBundle\\Logger\\DebugLogger',
            'zend.logger.writer.filesystem.class' => 'Zend\\Log\\Writer\\Stream',
            'zend.formatter.filesystem.class' => 'Zend\\Log\\Formatter\\Simple',
            'zend.formatter.filesystem.format' => '%timestamp% %priorityName%: %message%
',
            'zend.logger.path' => '/Users/jwage/Sites/symfony-sandbox/frontend/logs/dev.log',
        );
    }
}
