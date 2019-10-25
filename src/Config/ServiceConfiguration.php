<?php
namespace PoP\RESTAPI\Config;

use PoP\ComponentModel\Container\ContainerBuilderUtils;
use PoP\Root\Component\PHPServiceConfigurationTrait;
use PoP\API\Component as APIComponent;

class ServiceConfiguration
{
    use PHPServiceConfigurationTrait;

    protected static function configure()
    {
        if (APIComponent::isEnabled()) {
            // Add RouteModuleProcessors to the Manager
            ContainerBuilderUtils::injectServicesIntoService(
                'route_module_processor_manager',
                'PoP\\RESTAPI\\RouteModuleProcessors',
                'add'
            );
        }
    }
}
