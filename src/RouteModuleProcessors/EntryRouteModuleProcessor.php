<?php
namespace PoP\RESTAPI\RouteModuleProcessors;

use PoP\ModuleRouting\AbstractEntryRouteModuleProcessor;
use PoP\ComponentModel\Server\Utils;
use PoP\ComponentModel\Engine_Vars;
use PoP\Hooks\Facades\HooksAPIFacade;
use PoP\API\Facades\FieldQueryConvertorFacade;
use PoP\Routing\RouteNatures;

class EntryRouteModuleProcessor extends AbstractEntryRouteModuleProcessor
{
    private static $restFieldsQuery;
    private static $restFields;
    public static function getRESTFields(): array
    {
        if (is_null(self::$restFields)) {
            self::$restFields = self::getRESTFieldsQuery();
            if (is_string(self::$restFields)) {
                self::$restFields = FieldQueryConvertorFacade::getInstance()->convertAPIQuery(self::$restFields);
            }
        }
        return self::$restFields;
    }
    public static function getRESTFieldsQuery(): string
    {
        if (is_null(self::$restFieldsQuery)) {
            self::$restFieldsQuery = (string) HooksAPIFacade::getInstance()->applyFilters(
                'Root:RESTFields',
                '__schema'
            );
        }
        return self::$restFieldsQuery;
    }
    public function getModulesVarsPropertiesByNature()
    {
        $ret = array();

        // API
        if (!Utils::disableAPI()) {

            $vars = Engine_Vars::getVars();

            // Single endpoint REST API
            $ret[RouteNatures::HOME][] = [
                'module' => [\PoP_API_Module_Processor_FieldDataloads::class, \PoP_API_Module_Processor_FieldDataloads::MODULE_DATALOAD_DATAQUERY_ROOT_FIELDS, ['fields' => isset($vars['query']) ? $vars['query'] : self::getRESTFields()]],
                'conditions' => [
                    'scheme' => POP_SCHEME_API,
                    'datastructure' => GD_DATALOAD_DATASTRUCTURE_REST,
                ],
            ];
        }

        return $ret;
    }
}
