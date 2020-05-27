<?php

declare(strict_types=1);

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

    public static function getDependedComponentClasses(): array
    {
        return [
            \PoP\APIMirrorQuery\Component::class,
        ];
    }

    /**
     * Initialize services
     */
    protected static function doInitialize(array $configuration = [], bool $skipSchema = false): void
    {
        if (self::isEnabled()) {
            parent::doInitialize($configuration, $skipSchema);
            self::initYAMLServices(dirname(__DIR__));
            ServiceConfiguration::initialize();
        }
    }

    protected static function resolveEnabled()
    {
        return APIComponent::isEnabled() && !Environment::disableRESTAPI();
    }
}
