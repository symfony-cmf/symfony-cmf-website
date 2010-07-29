<?php

use Symfony\Components\DependencyInjection\ContainerInterface;
use Symfony\Components\DependencyInjection\Container;
use Symfony\Components\DependencyInjection\Reference;
use Symfony\Components\DependencyInjection\Parameter;
use Symfony\Components\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * frontendDevDebugProjectContainer
 *
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 */
class frontendDevDebugProjectContainer extends Container
{
    protected $shared = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(new FrozenParameterBag($this->getDefaultParameters()));
    }

    /**
     * Gets the 'event_dispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %debug.event_dispatcher.class% instance.
     */
    protected function getEventDispatcherService()
    {
        if (isset($this->shared['event_dispatcher'])) return $this->shared['event_dispatcher'];

        $class = 'Symfony\\Framework\\Debug\\EventDispatcher';
        $instance = new $class($this, $this->get('logger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        $this->shared['event_dispatcher'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'error_handler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %error_handler.class% instance.
     */
    protected function getErrorHandlerService()
    {
        if (isset($this->shared['error_handler'])) return $this->shared['error_handler'];

        $class = 'Symfony\\Framework\\Debug\\ErrorHandler';
        $instance = new $class(NULL);
        $this->shared['error_handler'] = $instance;
        $instance->register(true);

        return $instance;
    }

    /**
     * Gets the 'http_kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %http_kernel.class% instance.
     */
    protected function getHttpKernelService()
    {
        if (isset($this->shared['http_kernel'])) return $this->shared['http_kernel'];

        $class = 'Symfony\\Components\\HttpKernel\\HttpKernel';
        $instance = new $class($this->getEventDispatcherService(), $this->getControllerResolverService());
        $this->shared['http_kernel'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %request.class% instance.
     */
    protected function getRequestService()
    {
        if (isset($this->shared['request'])) return $this->shared['request'];

        $class = 'Symfony\\Components\\HttpFoundation\\Request';
        $instance = new $class();
        $this->shared['request'] = $instance;
        if ($this->has('session')) {
            $instance->setSession($this->get('session', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        }

        return $instance;
    }

    /**
     * Gets the 'response' service.
     *
     * @return Object A %response.class% instance.
     */
    protected function getResponseService()
    {
        $class = 'Symfony\\Components\\HttpFoundation\\Response';
        $instance = new $class();

        return $instance;
    }

    /**
     * Gets the 'debug.event_dispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %debug.event_dispatcher.class% instance.
     */
    protected function getDebug_EventDispatcherService()
    {
        if (isset($this->shared['debug.event_dispatcher'])) return $this->shared['debug.event_dispatcher'];

        $class = 'Symfony\\Framework\\Debug\\EventDispatcher';
        $instance = new $class($this, $this->get('logger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        $this->shared['debug.event_dispatcher'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.debugger' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %templating.debugger.class% instance.
     */
    protected function getTemplating_DebuggerService()
    {
        if (isset($this->shared['templating.debugger'])) return $this->shared['templating.debugger'];

        $class = 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Debugger';
        $instance = new $class($this->get('logger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        $this->shared['templating.debugger'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'session' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %session.class% instance.
     */
    protected function getSessionService()
    {
        if (isset($this->shared['session'])) return $this->shared['session'];

        $class = 'Symfony\\Components\\HttpFoundation\\Session';
        $instance = new $class($this->getSession_Storage_NativeService(), array('default_locale' => 'en'));
        $this->shared['session'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'session.storage.native' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %session.storage.class% instance.
     */
    protected function getSession_Storage_NativeService()
    {
        if (isset($this->shared['session.storage.native'])) return $this->shared['session.storage.native'];

        $class = 'Symfony\\Components\\HttpFoundation\\SessionStorage\\NativeSessionStorage';
        $instance = new $class(array('session_name' => 'SYMFONY_SESSION', 'session_cookie_lifetime' => false, 'session_cookie_path' => '/', 'session_cookie_domain' => '', 'session_cookie_secure' => false, 'session_cookie_httponly' => false, 'session_cache_limiter' => 'none'));
        $this->shared['session.storage.native'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'session.storage.pdo' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %session.storage.pdo.class% instance.
     */
    protected function getSession_Storage_PdoService()
    {
        if (isset($this->shared['session.storage.pdo'])) return $this->shared['session.storage.pdo'];

        $class = 'Symfony\\Components\\HttpFoundation\\SessionStorage\\PdoSessionStorage';
        $instance = new $class($this->get('pdo_connection'), array('session_name' => 'SYMFONY_SESSION', 'session_cookie_lifetime' => false, 'session_cookie_path' => '/', 'session_cookie_domain' => '', 'session_cookie_secure' => false, 'session_cookie_httponly' => false, 'session_cache_limiter' => 'none', 'db_table' => 'session'));
        $this->shared['session.storage.pdo'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'controller_resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %controller_resolver.class% instance.
     */
    protected function getControllerResolverService()
    {
        if (isset($this->shared['controller_resolver'])) return $this->shared['controller_resolver'];

        $class = 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerResolver';
        $instance = new $class($this, $this->get('logger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        $this->shared['controller_resolver'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'request_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %request_listener.class% instance.
     */
    protected function getRequestListenerService()
    {
        if (isset($this->shared['request_listener'])) return $this->shared['request_listener'];

        $class = 'Symfony\\Bundle\\FrameworkBundle\\RequestListener';
        $instance = new $class($this, $this->getRouterService(), $this->get('logger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        $this->shared['request_listener'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'esi' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %esi.class% instance.
     */
    protected function getEsiService()
    {
        if (isset($this->shared['esi'])) return $this->shared['esi'];

        $class = 'Symfony\\Components\\HttpKernel\\Cache\\Esi';
        $instance = new $class();
        $this->shared['esi'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'esi_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %esi_listener.class% instance.
     */
    protected function getEsiListenerService()
    {
        if (isset($this->shared['esi_listener'])) return $this->shared['esi_listener'];

        $class = 'Symfony\\Components\\HttpKernel\\Cache\\EsiListener';
        $instance = new $class($this->get('esi', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        $this->shared['esi_listener'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'response_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %response_listener.class% instance.
     */
    protected function getResponseListenerService()
    {
        if (isset($this->shared['response_listener'])) return $this->shared['response_listener'];

        $class = 'Symfony\\Components\\HttpKernel\\ResponseListener';
        $instance = new $class();
        $this->shared['response_listener'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'exception_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %exception_listener.class% instance.
     */
    protected function getExceptionListenerService()
    {
        if (isset($this->shared['exception_listener'])) return $this->shared['exception_listener'];

        $class = 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ExceptionListener';
        $instance = new $class($this, $this->get('logger', ContainerInterface::NULL_ON_INVALID_REFERENCE), 'FrameworkBundle:Exception:exception');
        $this->shared['exception_listener'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'routing.resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %routing.resolver.class% instance.
     */
    protected function getRouting_ResolverService()
    {
        if (isset($this->shared['routing.resolver'])) return $this->shared['routing.resolver'];

        $class = 'Symfony\\Bundle\\FrameworkBundle\\Routing\\LoaderResolver';
        $instance = new $class($this);
        $this->shared['routing.resolver'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'routing.loader.xml' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %routing.loader.xml.class% instance.
     */
    protected function getRouting_Loader_XmlService()
    {
        if (isset($this->shared['routing.loader.xml'])) return $this->shared['routing.loader.xml'];

        $class = 'Symfony\\Components\\Routing\\Loader\\XmlFileLoader';
        $instance = new $class(array('Application' => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/Application', 'Bundle' => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/Bundle', 'Symfony\\Framework' => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/vendor/symfony/src/Symfony/Framework'));
        $this->shared['routing.loader.xml'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'routing.loader.yml' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %routing.loader.yml.class% instance.
     */
    protected function getRouting_Loader_YmlService()
    {
        if (isset($this->shared['routing.loader.yml'])) return $this->shared['routing.loader.yml'];

        $class = 'Symfony\\Components\\Routing\\Loader\\YamlFileLoader';
        $instance = new $class(array('Application' => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/Application', 'Bundle' => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/Bundle', 'Symfony\\Framework' => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/vendor/symfony/src/Symfony/Framework'));
        $this->shared['routing.loader.yml'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'routing.loader.php' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %routing.loader.php.class% instance.
     */
    protected function getRouting_Loader_PhpService()
    {
        if (isset($this->shared['routing.loader.php'])) return $this->shared['routing.loader.php'];

        $class = 'Symfony\\Components\\Routing\\Loader\\PhpFileLoader';
        $instance = new $class(array('Application' => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/Application', 'Bundle' => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/Bundle', 'Symfony\\Framework' => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/vendor/symfony/src/Symfony/Framework'));
        $this->shared['routing.loader.php'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'routing.loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %routing.loader.class% instance.
     */
    protected function getRouting_LoaderService()
    {
        if (isset($this->shared['routing.loader'])) return $this->shared['routing.loader'];

        $class = 'Symfony\\Components\\Routing\\Loader\\DelegatingLoader';
        $instance = new $class($this->getRouting_ResolverService());
        $this->shared['routing.loader'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %router.class% instance.
     */
    protected function getRouterService()
    {
        if (isset($this->shared['router'])) return $this->shared['router'];

        $class = 'Symfony\\Components\\Routing\\Router';
        $instance = new $class($this->getRouting_LoaderService(), '/Users/jwage/Sites/symfony-cmf-website/frontend/config/routing.yml', array('cache_dir' => '/Users/jwage/Sites/symfony-cmf-website/frontend/cache/dev', 'debug' => true, 'matcher_cache_class' => 'frontend'.'UrlMatcher', 'generator_cache_class' => 'frontend'.'UrlGenerator'));
        $this->shared['router'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %validator.class% instance.
     */
    protected function getValidatorService()
    {
        if (isset($this->shared['validator'])) return $this->shared['validator'];

        $class = 'Symfony\\Components\\Validator\\Validator';
        $instance = new $class($this->getValidator_Mapping_ClassMetadataFactoryService(), $this->getValidator_ValidatorFactoryService(), $this->getValidator_MessageInterpolatorService());
        $this->shared['validator'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'validator.mapping.class_metadata_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %validator.mapping.class_metadata_factory.class% instance.
     */
    protected function getValidator_Mapping_ClassMetadataFactoryService()
    {
        if (isset($this->shared['validator.mapping.class_metadata_factory'])) return $this->shared['validator.mapping.class_metadata_factory'];

        $class = 'Symfony\\Components\\Validator\\Mapping\\ClassMetadataFactory';
        $instance = new $class($this->getValidator_Mapping_Loader_LoaderChainService());
        $this->shared['validator.mapping.class_metadata_factory'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'validator.validator_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %validator.validator_factory.class% instance.
     */
    protected function getValidator_ValidatorFactoryService()
    {
        if (isset($this->shared['validator.validator_factory'])) return $this->shared['validator.validator_factory'];

        $class = 'Symfony\\Components\\Validator\\Extension\\DependencyInjectionValidatorFactory';
        $instance = new $class($this);
        $this->shared['validator.validator_factory'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'validator.message_interpolator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %validator.message_interpolator.class% instance.
     */
    protected function getValidator_MessageInterpolatorService()
    {
        if (isset($this->shared['validator.message_interpolator'])) return $this->shared['validator.message_interpolator'];

        $class = 'Symfony\\Components\\Validator\\MessageInterpolator\\XliffMessageInterpolator';
        $instance = new $class(array(0 => '/Users/jwage/Sites/symfony-cmf-website/src/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/DependencyInjection/../../../Components/Validator/Resources/i18n/messages.en.xml', 1 => '/Users/jwage/Sites/symfony-cmf-website/src/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/DependencyInjection/../../../Components/Form/Resources/i18n/messages.en.xml'));
        $this->shared['validator.message_interpolator'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'validator.mapping.loader.loader_chain' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %validator.mapping.loader.loader_chain.class% instance.
     */
    protected function getValidator_Mapping_Loader_LoaderChainService()
    {
        if (isset($this->shared['validator.mapping.loader.loader_chain'])) return $this->shared['validator.mapping.loader.loader_chain'];

        $class = 'Symfony\\Components\\Validator\\Mapping\\Loader\\LoaderChain';
        $instance = new $class(array(0 => $this->getValidator_Mapping_Loader_StaticMethodLoaderService(), 1 => $this->getValidator_Mapping_Loader_XmlFilesLoaderService(), 2 => $this->getValidator_Mapping_Loader_YamlFilesLoaderService()));
        $this->shared['validator.mapping.loader.loader_chain'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'validator.mapping.loader.static_method_loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %validator.mapping.loader.static_method_loader.class% instance.
     */
    protected function getValidator_Mapping_Loader_StaticMethodLoaderService()
    {
        if (isset($this->shared['validator.mapping.loader.static_method_loader'])) return $this->shared['validator.mapping.loader.static_method_loader'];

        $class = 'Symfony\\Components\\Validator\\Mapping\\Loader\\StaticMethodLoader';
        $instance = new $class('loadValidatorMetadata');
        $this->shared['validator.mapping.loader.static_method_loader'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'validator.mapping.loader.xml_files_loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\Validator\Mapping\Loader\XmlFilesLoader A Symfony\Components\Validator\Mapping\Loader\XmlFilesLoader instance.
     */
    protected function getValidator_Mapping_Loader_XmlFilesLoaderService()
    {
        if (isset($this->shared['validator.mapping.loader.xml_files_loader'])) return $this->shared['validator.mapping.loader.xml_files_loader'];

        $instance = new Symfony\Components\Validator\Mapping\Loader\XmlFilesLoader(array(0 => '/Users/jwage/Sites/symfony-cmf-website/src/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/DependencyInjection/../../../Components/Form/Resources/config/validation.xml'));
        $this->shared['validator.mapping.loader.xml_files_loader'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'validator.mapping.loader.yaml_files_loader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Symfony\Components\Validator\Mapping\Loader\YamlFilesLoader A Symfony\Components\Validator\Mapping\Loader\YamlFilesLoader instance.
     */
    protected function getValidator_Mapping_Loader_YamlFilesLoaderService()
    {
        if (isset($this->shared['validator.mapping.loader.yaml_files_loader'])) return $this->shared['validator.mapping.loader.yaml_files_loader'];

        $instance = new Symfony\Components\Validator\Mapping\Loader\YamlFilesLoader(array());
        $this->shared['validator.mapping.loader.yaml_files_loader'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.engine' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %templating.engine.class% instance.
     */
    protected function getTemplating_EngineService()
    {
        if (isset($this->shared['templating.engine'])) return $this->shared['templating.engine'];

        $class = 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Engine';
        $instance = new $class($this, $this->getTemplating_Loader_FilesystemService(), array(), 'htmlspecialchars');
        $this->shared['templating.engine'] = $instance;
        $instance->setCharset('UTF-8');

        return $instance;
    }

    /**
     * Gets the 'templating.loader.filesystem' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %templating.loader.filesystem.class% instance.
     */
    protected function getTemplating_Loader_FilesystemService()
    {
        if (isset($this->shared['templating.loader.filesystem'])) return $this->shared['templating.loader.filesystem'];

        $class = 'Symfony\\Components\\Templating\\Loader\\FilesystemLoader';
        $instance = new $class(array(0 => '/Users/jwage/Sites/symfony-cmf-website/frontend/views/%bundle%/%controller%/%name%%format%.%renderer%', 1 => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/Application/%bundle%/Resources/views/%controller%/%name%%format%.%renderer%', 2 => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/Bundle/%bundle%/Resources/views/%controller%/%name%%format%.%renderer%', 3 => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/vendor/symfony/src/Symfony/Framework/%bundle%/Resources/views/%controller%/%name%%format%.%renderer%'));
        $this->shared['templating.loader.filesystem'] = $instance;
        if ($this->has('templating.debugger')) {
            $instance->setDebugger($this->get('templating.debugger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        }

        return $instance;
    }

    /**
     * Gets the 'templating.loader.cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %templating.loader.cache.class% instance.
     */
    protected function getTemplating_Loader_CacheService()
    {
        if (isset($this->shared['templating.loader.cache'])) return $this->shared['templating.loader.cache'];

        $class = 'Symfony\\Components\\Templating\\Loader\\CacheLoader';
        $instance = new $class($this->get('templating.loader.wrapped'), NULL);
        $this->shared['templating.loader.cache'] = $instance;
        if ($this->has('templating.debugger')) {
            $instance->setDebugger($this->get('templating.debugger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        }

        return $instance;
    }

    /**
     * Gets the 'templating.loader.chain' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %templating.loader.chain.class% instance.
     */
    protected function getTemplating_Loader_ChainService()
    {
        if (isset($this->shared['templating.loader.chain'])) return $this->shared['templating.loader.chain'];

        $class = 'Symfony\\Components\\Templating\\Loader\\ChainLoader';
        $instance = new $class();
        $this->shared['templating.loader.chain'] = $instance;
        if ($this->has('templating.debugger')) {
            $instance->setDebugger($this->get('templating.debugger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        }

        return $instance;
    }

    /**
     * Gets the 'templating.helper.javascripts' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %templating.helper.javascripts.class% instance.
     */
    protected function getTemplating_Helper_JavascriptsService()
    {
        if (isset($this->shared['templating.helper.javascripts'])) return $this->shared['templating.helper.javascripts'];

        $class = 'Symfony\\Components\\Templating\\Helper\\JavascriptsHelper';
        $instance = new $class($this->getTemplating_Helper_AssetsService());
        $this->shared['templating.helper.javascripts'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.helper.stylesheets' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %templating.helper.stylesheets.class% instance.
     */
    protected function getTemplating_Helper_StylesheetsService()
    {
        if (isset($this->shared['templating.helper.stylesheets'])) return $this->shared['templating.helper.stylesheets'];

        $class = 'Symfony\\Components\\Templating\\Helper\\StylesheetsHelper';
        $instance = new $class($this->getTemplating_Helper_AssetsService());
        $this->shared['templating.helper.stylesheets'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.helper.slots' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %templating.helper.slots.class% instance.
     */
    protected function getTemplating_Helper_SlotsService()
    {
        if (isset($this->shared['templating.helper.slots'])) return $this->shared['templating.helper.slots'];

        $class = 'Symfony\\Components\\Templating\\Helper\\SlotsHelper';
        $instance = new $class();
        $this->shared['templating.helper.slots'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.helper.assets' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %templating.helper.assets.class% instance.
     */
    protected function getTemplating_Helper_AssetsService()
    {
        if (isset($this->shared['templating.helper.assets'])) return $this->shared['templating.helper.assets'];

        $class = 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\AssetsHelper';
        $instance = new $class($this->getRequestService(), '', NULL);
        $this->shared['templating.helper.assets'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.helper.request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %templating.helper.request.class% instance.
     */
    protected function getTemplating_Helper_RequestService()
    {
        if (isset($this->shared['templating.helper.request'])) return $this->shared['templating.helper.request'];

        $class = 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\RequestHelper';
        $instance = new $class($this->getRequestService());
        $this->shared['templating.helper.request'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.helper.session' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %templating.helper.session.class% instance.
     */
    protected function getTemplating_Helper_SessionService()
    {
        if (isset($this->shared['templating.helper.session'])) return $this->shared['templating.helper.session'];

        $class = 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\SessionHelper';
        $instance = new $class($this->getRequestService());
        $this->shared['templating.helper.session'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.helper.router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %templating.helper.router.class% instance.
     */
    protected function getTemplating_Helper_RouterService()
    {
        if (isset($this->shared['templating.helper.router'])) return $this->shared['templating.helper.router'];

        $class = 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\RouterHelper';
        $instance = new $class($this->getRouterService());
        $this->shared['templating.helper.router'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'templating.helper.actions' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %templating.helper.actions.class% instance.
     */
    protected function getTemplating_Helper_ActionsService()
    {
        if (isset($this->shared['templating.helper.actions'])) return $this->shared['templating.helper.actions'];

        $class = 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\ActionsHelper';
        $instance = new $class($this->getControllerResolverService());
        $this->shared['templating.helper.actions'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'profiler' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %profiler.class% instance.
     */
    protected function getProfilerService()
    {
        if (isset($this->shared['profiler'])) return $this->shared['profiler'];

        $class = 'Symfony\\Bundle\\FrameworkBundle\\Profiler';
        $instance = new $class($this, $this->getProfiler_StorageService(), $this->get('logger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        $this->shared['profiler'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'profiler.storage' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %profiler.storage.class% instance.
     */
    protected function getProfiler_StorageService()
    {
        if (isset($this->shared['profiler.storage'])) return $this->shared['profiler.storage'];

        $class = 'Symfony\\Components\\HttpKernel\\Profiler\\ProfilerStorage';
        $instance = new $class('/Users/jwage/Sites/symfony-cmf-website/frontend/cache/dev/profiler.db', NULL, 86400);
        $this->shared['profiler.storage'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'profiler_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %profiler_listener.class% instance.
     */
    protected function getProfilerListenerService()
    {
        if (isset($this->shared['profiler_listener'])) return $this->shared['profiler_listener'];

        $class = 'Symfony\\Components\\HttpKernel\\Profiler\\ProfilerListener';
        $instance = new $class($this->getProfilerService());
        $this->shared['profiler_listener'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'data_collector.config' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %data_collector.config.class% instance.
     */
    protected function getDataCollector_ConfigService()
    {
        if (isset($this->shared['data_collector.config'])) return $this->shared['data_collector.config'];

        $class = 'Symfony\\Bundle\\FrameworkBundle\\DataCollector\\ConfigDataCollector';
        $instance = new $class($this);
        $this->shared['data_collector.config'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'data_collector.app' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %data_collector.app.class% instance.
     */
    protected function getDataCollector_AppService()
    {
        if (isset($this->shared['data_collector.app'])) return $this->shared['data_collector.app'];

        $class = 'Symfony\\Bundle\\FrameworkBundle\\DataCollector\\AppDataCollector';
        $instance = new $class($this);
        $this->shared['data_collector.app'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'data_collector.timer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %data_collector.timer.class% instance.
     */
    protected function getDataCollector_TimerService()
    {
        if (isset($this->shared['data_collector.timer'])) return $this->shared['data_collector.timer'];

        $class = 'Symfony\\Bundle\\FrameworkBundle\\DataCollector\\TimerDataCollector';
        $instance = new $class($this);
        $this->shared['data_collector.timer'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'data_collector.memory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %data_collector.memory.class% instance.
     */
    protected function getDataCollector_MemoryService()
    {
        if (isset($this->shared['data_collector.memory'])) return $this->shared['data_collector.memory'];

        $class = 'Symfony\\Components\\HttpKernel\\Profiler\\DataCollector\\MemoryDataCollector';
        $instance = new $class();
        $this->shared['data_collector.memory'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'debug.toolbar' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %debug.toolbar.class% instance.
     */
    protected function getDebug_ToolbarService()
    {
        if (isset($this->shared['debug.toolbar'])) return $this->shared['debug.toolbar'];

        $class = 'Symfony\\Components\\HttpKernel\\Profiler\\WebDebugToolbarListener';
        $instance = new $class($this->getProfilerService());
        $this->shared['debug.toolbar'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'doctrine.orm.metadata_driver.annotation' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Doctrine\ORM\Mapping\Driver\AnnotationDriver A Doctrine\ORM\Mapping\Driver\AnnotationDriver instance.
     */
    protected function getDoctrine_Orm_MetadataDriver_AnnotationService()
    {
        if (isset($this->shared['doctrine.orm.metadata_driver.annotation'])) return $this->shared['doctrine.orm.metadata_driver.annotation'];

        $instance = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getDoctrine_Orm_MetadataDriver_Annotation_ReaderService(), array());
        $this->shared['doctrine.orm.metadata_driver.annotation'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'doctrine.orm.metadata_driver.annotation.reader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Doctrine\Common\Annotations\AnnotationReader A Doctrine\Common\Annotations\AnnotationReader instance.
     */
    protected function getDoctrine_Orm_MetadataDriver_Annotation_ReaderService()
    {
        if (isset($this->shared['doctrine.orm.metadata_driver.annotation.reader'])) return $this->shared['doctrine.orm.metadata_driver.annotation.reader'];

        $instance = new Doctrine\Common\Annotations\AnnotationReader();
        $this->shared['doctrine.orm.metadata_driver.annotation.reader'] = $instance;
        $instance->setDefaultAnnotationNamespace('Doctrine\\ORM\\Mapping\\');

        return $instance;
    }

    /**
     * Gets the 'doctrine.orm.metadata_driver.xml' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Doctrine\ORM\Mapping\Driver\XmlDriver A Doctrine\ORM\Mapping\Driver\XmlDriver instance.
     */
    protected function getDoctrine_Orm_MetadataDriver_XmlService()
    {
        if (isset($this->shared['doctrine.orm.metadata_driver.xml'])) return $this->shared['doctrine.orm.metadata_driver.xml'];

        $instance = new Doctrine\ORM\Mapping\Driver\XmlDriver($this->getParameter('doctrine.orm.metadata_driver.mapping_dirs'));
        $this->shared['doctrine.orm.metadata_driver.xml'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'doctrine.orm.metadata_driver.yml' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Doctrine\ORM\Mapping\Driver\YamlDriver A Doctrine\ORM\Mapping\Driver\YamlDriver instance.
     */
    protected function getDoctrine_Orm_MetadataDriver_YmlService()
    {
        if (isset($this->shared['doctrine.orm.metadata_driver.yml'])) return $this->shared['doctrine.orm.metadata_driver.yml'];

        $instance = new Doctrine\ORM\Mapping\Driver\YamlDriver($this->getParameter('doctrine.orm.metadata_driver.mapping_dirs'));
        $this->shared['doctrine.orm.metadata_driver.yml'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'doctrine.orm.default_configuration' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Doctrine\ORM\Configuration A Doctrine\ORM\Configuration instance.
     */
    protected function getDoctrine_Orm_DefaultConfigurationService()
    {
        if (isset($this->shared['doctrine.orm.default_configuration'])) return $this->shared['doctrine.orm.default_configuration'];

        $instance = new Doctrine\ORM\Configuration();
        $this->shared['doctrine.orm.default_configuration'] = $instance;
        $instance->setEntityNamespaces(array());
        $instance->setMetadataCacheImpl($this->getDoctrine_Orm_DefaultMetadataCacheService());
        $instance->setQueryCacheImpl($this->getDoctrine_Orm_DefaultQueryCacheService());
        $instance->setResultCacheImpl($this->getDoctrine_Orm_DefaultResultCacheService());
        $instance->setMetadataDriverImpl($this->getDoctrine_Orm_MetadataDriverService());
        $instance->setProxyDir('/Users/jwage/Sites/symfony-cmf-website/frontend/cache/dev/doctrine/orm/Proxies');
        $instance->setProxyNamespace('Proxies');
        $instance->setAutoGenerateProxyClasses(false);

        return $instance;
    }

    /**
     * Gets the 'doctrine.orm.metadata_driver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %doctrine.orm.metadata.driver_chain_class% instance.
     */
    protected function getDoctrine_Orm_MetadataDriverService()
    {
        if (isset($this->shared['doctrine.orm.metadata_driver'])) return $this->shared['doctrine.orm.metadata_driver'];

        $class = 'Doctrine\\ORM\\Mapping\\Driver\\DriverChain';
        $instance = new $class();
        $this->shared['doctrine.orm.metadata_driver'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'doctrine.orm.default_metadata_cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %doctrine.orm.cache.array_class% instance.
     */
    protected function getDoctrine_Orm_DefaultMetadataCacheService()
    {
        if (isset($this->shared['doctrine.orm.default_metadata_cache'])) return $this->shared['doctrine.orm.default_metadata_cache'];

        $class = 'Doctrine\\Common\\Cache\\ArrayCache';
        $instance = new $class();
        $this->shared['doctrine.orm.default_metadata_cache'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'doctrine.orm.default_query_cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %doctrine.orm.cache.array_class% instance.
     */
    protected function getDoctrine_Orm_DefaultQueryCacheService()
    {
        if (isset($this->shared['doctrine.orm.default_query_cache'])) return $this->shared['doctrine.orm.default_query_cache'];

        $class = 'Doctrine\\Common\\Cache\\ArrayCache';
        $instance = new $class();
        $this->shared['doctrine.orm.default_query_cache'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'doctrine.orm.default_result_cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %doctrine.orm.cache.array_class% instance.
     */
    protected function getDoctrine_Orm_DefaultResultCacheService()
    {
        if (isset($this->shared['doctrine.orm.default_result_cache'])) return $this->shared['doctrine.orm.default_result_cache'];

        $class = 'Doctrine\\Common\\Cache\\ArrayCache';
        $instance = new $class();
        $this->shared['doctrine.orm.default_result_cache'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'doctrine.orm.default_entity_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %doctrine.orm.entity_manager_class% instance.
     */
    protected function getDoctrine_Orm_DefaultEntityManagerService()
    {
        if (isset($this->shared['doctrine.orm.default_entity_manager'])) return $this->shared['doctrine.orm.default_entity_manager'];

        $instance = call_user_func(array('Doctrine\\ORM\\EntityManager', 'create'), $this->get('doctrine.dbal.default_connection'), $this->getDoctrine_Orm_DefaultConfigurationService());
        $this->shared['doctrine.orm.default_entity_manager'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'zend.logger' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %zend.logger.class% instance.
     */
    protected function getZend_LoggerService()
    {
        if (isset($this->shared['zend.logger'])) return $this->shared['zend.logger'];

        $class = 'Symfony\\Bundle\\ZendBundle\\Logger\\Logger';
        $instance = new $class();
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
     * @return Object A %zend.logger.writer.filesystem.class% instance.
     */
    protected function getZend_Logger_Writer_FilesystemService()
    {
        if (isset($this->shared['zend.logger.writer.filesystem'])) return $this->shared['zend.logger.writer.filesystem'];

        $class = 'Zend\\Log\\Writer\\Stream';
        $instance = new $class('/Users/jwage/Sites/symfony-cmf-website/frontend/logs/dev.log');
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
     * @return Object A %zend.formatter.filesystem.class% instance.
     */
    protected function getZend_Formatter_FilesystemService()
    {
        if (isset($this->shared['zend.formatter.filesystem'])) return $this->shared['zend.formatter.filesystem'];

        $class = 'Zend\\Log\\Formatter\\Simple';
        $instance = new $class('%timestamp% %priorityName%: %message%
');
        $this->shared['zend.formatter.filesystem'] = $instance;

        return $instance;
    }

    /**
     * Gets the 'zend.logger.writer.debug' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Object A %zend.logger.writer.debug.class% instance.
     */
    protected function getZend_Logger_Writer_DebugService()
    {
        if (isset($this->shared['zend.logger.writer.debug'])) return $this->shared['zend.logger.writer.debug'];

        $class = 'Symfony\\Bundle\\ZendBundle\\Logger\\DebugLogger';
        $instance = new $class();
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

        $instance = new Zend\Log\Filter\Priority(6);
        $this->shared['zend.logger.filter'] = $instance;

        return $instance;
    }

    /**
     * Gets the session.storage service alias.
     *
     * @return Object An instance of the session.storage.native service
     */
    protected function getSession_StorageService()
    {
        return $this->getSession_Storage_NativeService();
    }

    /**
     * Gets the templating.loader service alias.
     *
     * @return Object An instance of the templating.loader.filesystem service
     */
    protected function getTemplating_LoaderService()
    {
        return $this->getTemplating_Loader_FilesystemService();
    }

    /**
     * Gets the templating service alias.
     *
     * @return Object An instance of the templating.engine service
     */
    protected function getTemplatingService()
    {
        return $this->getTemplating_EngineService();
    }

    /**
     * Gets the doctrine.orm.entity_manager service alias.
     *
     * @return Object An instance of the doctrine.orm.default_entity_manager service
     */
    protected function getDoctrine_Orm_EntityManagerService()
    {
        return $this->getDoctrine_Orm_DefaultEntityManagerService();
    }

    /**
     * Gets the logger service alias.
     *
     * @return Object An instance of the zend.logger service
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
    'request_listener' => 
    array (
      0 => 
      array (
      ),
    ),
    'esi_listener' => 
    array (
      0 => 
      array (
      ),
    ),
    'response_listener' => 
    array (
      0 => 
      array (
      ),
    ),
    'exception_listener' => 
    array (
      0 => 
      array (
      ),
    ),
    'profiler_listener' => 
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
  'routing.loader' => 
  array (
    'routing.loader.xml' => 
    array (
      0 => 
      array (
      ),
    ),
    'routing.loader.yml' => 
    array (
      0 => 
      array (
      ),
    ),
    'routing.loader.php' => 
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
    'templating.helper.session' => 
    array (
      0 => 
      array (
        'alias' => 'session',
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
            'kernel.root_dir' => '/Users/jwage/Sites/symfony-cmf-website/frontend',
            'kernel.environment' => 'dev',
            'kernel.debug' => true,
            'kernel.name' => 'frontend',
            'kernel.cache_dir' => '/Users/jwage/Sites/symfony-cmf-website/frontend/cache/dev',
            'kernel.logs_dir' => '/Users/jwage/Sites/symfony-cmf-website/frontend/logs',
            'kernel.bundle_dirs' => array(
                'Application' => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/Application',
                'Bundle' => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/Bundle',
                'Symfony\\Framework' => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/vendor/symfony/src/Symfony/Framework',
            ),
            'kernel.bundles' => array(
                0 => 'Symfony\\Framework\\KernelBundle',
                1 => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                2 => 'Symfony\\Bundle\\ZendBundle\\ZendBundle',
                3 => 'Symfony\\Bundle\\DoctrineBundle\\DoctrineBundle',
                4 => 'Symfony\\Bundle\\DoctrineMigrationsBundle\\DoctrineMigrationsBundle',
                5 => 'Application\\FrontendBundle\\FrontendBundle',
            ),
            'kernel.charset' => 'UTF-8',
            'event_dispatcher.class' => 'Symfony\\Framework\\EventDispatcher',
            'http_kernel.class' => 'Symfony\\Components\\HttpKernel\\HttpKernel',
            'request.class' => 'Symfony\\Components\\HttpFoundation\\Request',
            'response.class' => 'Symfony\\Components\\HttpFoundation\\Response',
            'error_handler.class' => 'Symfony\\Framework\\Debug\\ErrorHandler',
            'error_handler.level' => NULL,
            'error_handler.enable' => true,
            'kernel.include_core_classes' => false,
            'debug.event_dispatcher.class' => 'Symfony\\Framework\\Debug\\EventDispatcher',
            'templating.loader.filesystem.path' => array(
                0 => '/Users/jwage/Sites/symfony-cmf-website/frontend/views/%bundle%/%controller%/%name%%format%.%renderer%',
                1 => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/Application/%bundle%/Resources/views/%controller%/%name%%format%.%renderer%',
                2 => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/Bundle/%bundle%/Resources/views/%controller%/%name%%format%.%renderer%',
                3 => '/Users/jwage/Sites/symfony-cmf-website/frontend/../src/vendor/symfony/src/Symfony/Framework/%bundle%/Resources/views/%controller%/%name%%format%.%renderer%',
            ),
            'templating.debugger.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Debugger',
            'kernel.compiled_classes' => array(
                0 => 'Symfony\\Components\\Routing\\RouterInterface',
                1 => 'Symfony\\Components\\Routing\\Router',
                2 => 'Symfony\\Components\\EventDispatcher\\Event',
                3 => 'Symfony\\Components\\Routing\\Matcher\\UrlMatcherInterface',
                4 => 'Symfony\\Components\\Routing\\Matcher\\UrlMatcher',
                5 => 'Symfony\\Components\\HttpKernel\\HttpKernel',
                6 => 'Symfony\\Components\\HttpFoundation\\Request',
                7 => 'Symfony\\Components\\HttpFoundation\\Response',
                8 => 'Symfony\\Components\\HttpKernel\\ResponseListener',
                9 => 'Symfony\\Components\\Templating\\Loader\\LoaderInterface',
                10 => 'Symfony\\Components\\Templating\\Loader\\Loader',
                11 => 'Symfony\\Components\\Templating\\Loader\\FilesystemLoader',
                12 => 'Symfony\\Components\\Templating\\Engine',
                13 => 'Symfony\\Components\\Templating\\Renderer\\RendererInterface',
                14 => 'Symfony\\Components\\Templating\\Renderer\\Renderer',
                15 => 'Symfony\\Components\\Templating\\Renderer\\PhpRenderer',
                16 => 'Symfony\\Components\\Templating\\Storage\\Storage',
                17 => 'Symfony\\Components\\Templating\\Storage\\FileStorage',
                18 => 'Symfony\\Bundle\\FrameworkBundle\\RequestListener',
                19 => 'Symfony\\Bundle\\FrameworkBundle\\Controller',
                20 => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Engine',
            ),
            'session.class' => 'Symfony\\Components\\HttpFoundation\\Session',
            'session.default_locale' => 'en',
            'session.storage.class' => 'Symfony\\Components\\HttpFoundation\\SessionStorage\\NativeSessionStorage',
            'session.storage.pdo.class' => 'Symfony\\Components\\HttpFoundation\\SessionStorage\\PdoSessionStorage',
            'session.options.name' => 'SYMFONY_SESSION',
            'session.options.auto_start' => true,
            'session.options.lifetime' => false,
            'session.options.path' => '/',
            'session.options.domain' => '',
            'session.options.secure' => false,
            'session.options.httponly' => false,
            'session.options.cache_limiter' => 'none',
            'session.options.pdo.db_table' => 'session',
            'request_listener.class' => 'Symfony\\Bundle\\FrameworkBundle\\RequestListener',
            'controller_resolver.class' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerResolver',
            'response_listener.class' => 'Symfony\\Components\\HttpKernel\\ResponseListener',
            'exception_listener.class' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ExceptionListener',
            'exception_listener.controller' => 'FrameworkBundle:Exception:exception',
            'esi.class' => 'Symfony\\Components\\HttpKernel\\Cache\\Esi',
            'esi_listener.class' => 'Symfony\\Components\\HttpKernel\\Cache\\EsiListener',
            'router.class' => 'Symfony\\Components\\Routing\\Router',
            'routing.loader.class' => 'Symfony\\Components\\Routing\\Loader\\DelegatingLoader',
            'routing.resolver.class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\LoaderResolver',
            'routing.loader.xml.class' => 'Symfony\\Components\\Routing\\Loader\\XmlFileLoader',
            'routing.loader.yml.class' => 'Symfony\\Components\\Routing\\Loader\\YamlFileLoader',
            'routing.loader.php.class' => 'Symfony\\Components\\Routing\\Loader\\PhpFileLoader',
            'routing.resource' => '/Users/jwage/Sites/symfony-cmf-website/frontend/config/routing.yml',
            'validator.class' => 'Symfony\\Components\\Validator\\Validator',
            'validator.validator_factory.class' => 'Symfony\\Components\\Validator\\Extension\\DependencyInjectionValidatorFactory',
            'validator.message_interpolator.class' => 'Symfony\\Components\\Validator\\MessageInterpolator\\XliffMessageInterpolator',
            'validator.mapping.class_metadata_factory.class' => 'Symfony\\Components\\Validator\\Mapping\\ClassMetadataFactory',
            'validator.mapping.loader.loader_chain.class' => 'Symfony\\Components\\Validator\\Mapping\\Loader\\LoaderChain',
            'validator.mapping.loader.static_method_loader.class' => 'Symfony\\Components\\Validator\\Mapping\\Loader\\StaticMethodLoader',
            'validator.mapping.loader.annotation_loader.class' => 'Symfony\\Components\\Validator\\Mapping\\Loader\\AnnotationLoader',
            'validator.mapping.loader.xml_file_loader.class' => 'Symfony\\Components\\Validator\\Mapping\\Loader\\XmlFileLoader',
            'validator.mapping.loader.yaml_file_loader.class' => 'Symfony\\Components\\Validator\\Mapping\\Loader\\YamlFileLoader',
            'validator.mapping.loader.xml_files_loader.class' => 'Symfony\\Components\\Validator\\Mapping\\Loader\\XmlFilesLoader',
            'validator.mapping.loader.yaml_files_loader.class' => 'Symfony\\Components\\Validator\\Mapping\\Loader\\YamlFilesLoader',
            'validator.mapping.loader.static_method_loader.method_name' => 'loadValidatorMetadata',
            'validator.message_interpolator.files' => array(
                0 => '/Users/jwage/Sites/symfony-cmf-website/src/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/DependencyInjection/../../../Components/Validator/Resources/i18n/messages.en.xml',
                1 => '/Users/jwage/Sites/symfony-cmf-website/src/vendor/symfony/src/Symfony/Bundle/FrameworkBundle/DependencyInjection/../../../Components/Form/Resources/i18n/messages.en.xml',
            ),
            'templating.engine.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Engine',
            'templating.loader.filesystem.class' => 'Symfony\\Components\\Templating\\Loader\\FilesystemLoader',
            'templating.loader.cache.class' => 'Symfony\\Components\\Templating\\Loader\\CacheLoader',
            'templating.loader.chain.class' => 'Symfony\\Components\\Templating\\Loader\\ChainLoader',
            'templating.helper.javascripts.class' => 'Symfony\\Components\\Templating\\Helper\\JavascriptsHelper',
            'templating.helper.stylesheets.class' => 'Symfony\\Components\\Templating\\Helper\\StylesheetsHelper',
            'templating.helper.slots.class' => 'Symfony\\Components\\Templating\\Helper\\SlotsHelper',
            'templating.helper.assets.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\AssetsHelper',
            'templating.helper.actions.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\ActionsHelper',
            'templating.helper.router.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\RouterHelper',
            'templating.helper.request.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\RequestHelper',
            'templating.helper.session.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\SessionHelper',
            'templating.output_escaper' => 'htmlspecialchars',
            'templating.assets.version' => NULL,
            'templating.loader.cache.path' => NULL,
            'doctrine.orm.default_entity_manager' => 'default',
            'doctrine.orm.metadata_cache_driver' => 'array',
            'doctrine.orm.query_cache_driver' => 'array',
            'doctrine.orm.result_cache_driver' => 'array',
            'doctrine.orm.configuration_class' => 'Doctrine\\ORM\\Configuration',
            'doctrine.orm.entity_manager_class' => 'Doctrine\\ORM\\EntityManager',
            'doctrine.orm.proxy_namespace' => 'Proxies',
            'doctrine.orm.auto_generate_proxy_classes' => false,
            'doctrine.orm.cache.array_class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine.orm.cache.apc_class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine.orm.cache.memcache_class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine.orm.cache.memcache_host' => 'localhost',
            'doctrine.orm.cache.memcache_port' => 11211,
            'doctrine.orm.cache.memcache_instance_class' => 'Memcache',
            'doctrine.orm.cache.xcache_class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine.orm.metadata.driver_chain_class' => 'Doctrine\\ORM\\Mapping\\Driver\\DriverChain',
            'doctrine.orm.metadata.annotation_class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
            'doctrine.orm.metadata.annotation_reader_class' => 'Doctrine\\Common\\Annotations\\AnnotationReader',
            'doctrine.orm.metadata.annotation_default_namespace' => 'Doctrine\\ORM\\Mapping\\',
            'doctrine.orm.metadata.xml_class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
            'doctrine.orm.metadata.yml_class' => 'Doctrine\\ORM\\Mapping\\Driver\\YamlDriver',
            'doctrine.orm.mapping_dirs' => array(

            ),
            'doctrine.orm.xml_mapping_dirs' => array(

            ),
            'doctrine.orm.yml_mapping_dirs' => array(

            ),
            'doctrine.orm.entity_dirs' => array(

            ),
            'miam.user.emails' => array(
                'laet' => 'laet.wagner@gmail.com',
                'mbontemps' => 'matthieu.bontemps@gmail.com',
                'thib' => 'thibault.duplessis@gmail.com',
                'anthony' => 'hamonanthony19@gmail.com',
            ),
            'profiler.class' => 'Symfony\\Bundle\\FrameworkBundle\\Profiler',
            'profiler.storage.class' => 'Symfony\\Components\\HttpKernel\\Profiler\\ProfilerStorage',
            'profiler.storage.file' => '/Users/jwage/Sites/symfony-cmf-website/frontend/cache/dev/profiler.db',
            'profiler.storage.lifetime' => 86400,
            'profiler_listener.class' => 'Symfony\\Components\\HttpKernel\\Profiler\\ProfilerListener',
            'data_collector.config.class' => 'Symfony\\Bundle\\FrameworkBundle\\DataCollector\\ConfigDataCollector',
            'data_collector.app.class' => 'Symfony\\Bundle\\FrameworkBundle\\DataCollector\\AppDataCollector',
            'data_collector.timer.class' => 'Symfony\\Bundle\\FrameworkBundle\\DataCollector\\TimerDataCollector',
            'data_collector.memory.class' => 'Symfony\\Components\\HttpKernel\\Profiler\\DataCollector\\MemoryDataCollector',
            'debug.toolbar.class' => 'Symfony\\Components\\HttpKernel\\Profiler\\WebDebugToolbarListener',
            'zend.logger.class' => 'Symfony\\Bundle\\ZendBundle\\Logger\\Logger',
            'zend.logger.priority' => 6,
            'zend.logger.writer.debug.class' => 'Symfony\\Bundle\\ZendBundle\\Logger\\DebugLogger',
            'zend.logger.writer.filesystem.class' => 'Zend\\Log\\Writer\\Stream',
            'zend.formatter.filesystem.class' => 'Zend\\Log\\Formatter\\Simple',
            'zend.formatter.filesystem.format' => '%timestamp% %priorityName%: %message%
',
            'zend.logger.path' => '/Users/jwage/Sites/symfony-cmf-website/frontend/logs/dev.log',
        );
    }
}
