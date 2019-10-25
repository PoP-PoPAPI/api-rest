<?php
namespace PoP\RESTAPI;

use PoP\Root\Component\AbstractComponent;
use PoP\RESTAPI\Config\ServiceConfiguration;
use PoP\Root\Component\YAMLServicesTrait;
use PoP\API\Component as APIComponent;

/**
 * Initialize component
 */
class Component extends AbstractComponent
{
    protected static $enabled;

    use YAMLServicesTrait;
    // const VERSION = '0.1.0';

    /**
     * Initialize services
     */
    public static function init()
    {
        if (self::isEnabled()) {
            parent::init();
            self::initYAMLServices(dirname(__DIR__));
            ServiceConfiguration::init();
        }
    }

    protected static function initEnabled()
    {
        self::$enabled = APIComponent::isEnabled() && !Environment::disableRESTAPI();
    }

    public static function isEnabled()
    {
        // This is needed for if asking if this component is enabled before it has been initialized
        if (is_null(self::$enabled)) {
            self::initEnabled();
        }
        return self::$enabled;
    }
}
