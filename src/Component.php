<?php
namespace PoP\RESTAPI;

use PoP\Root\Component\AbstractComponent;
use PoP\Root\Component\CanDisableComponentTrait;
use PoP\RESTAPI\Config\ServiceConfiguration;
use PoP\Root\Component\YAMLServicesTrait;
use PoP\API\Component as APIComponent;

/**
 * Initialize component
 */
class Component extends AbstractComponent
{
    use YAMLServicesTrait, CanDisableComponentTrait;
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

    protected static function resolveEnabled()
    {
        return APIComponent::isEnabled() && !Environment::disableRESTAPI();
    }
}
