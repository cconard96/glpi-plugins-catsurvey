<?php
// Version of the plugin
define('PLUGIN_CATSURVEY_VERSION', "9.5.0");
// Minimal GLPI version, inclusive
define("PLUGIN_CATSURVEY_GLPI_MIN_VERSION", "9.4");
// Maximum GLPI version, exclusive
define("PLUGIN_CATSURVEY_GLPI_MAX_VERSION", "9.6");

function plugin_version_catsurvey()
{
    return [
        'name' => 'Catsurvey',
        'version' => PLUGIN_CATSURVEY_VERSION,
        'author' => '<a href="http://www.probesys.com">Probesys</a>',
        'license' => 'GLPv3',
        'homepage'       => 'http://www.probesys.com',
        'requirements'   => [
         'glpi'   => [
            'min' => PLUGIN_CATSURVEY_GLPI_MIN_VERSION,
            'max' => PLUGIN_CATSURVEY_GLPI_MAX_VERSION,
         ],
         'php'    => [
            'min' => '7.0'
         ]
        ]
    ];
}

function plugin_catsurvey_check_prerequisites()
{
    try {
        if (version_compare(GLPI_VERSION, PLUGIN_CATSURVEY_GLPI_MIN_VERSION, '<')) {
            throw new Exception('This plugin requires GLPI >= ' . PLUGIN_CATSURVEY_GLPI_MIN_VERSION);
        }

        $prerequisites_check_ok = true;
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    return $prerequisites_check_ok;
}

function plugin_catsurvey_check_config($verbose=false)
{
    if (true) { // No configuration check
        return true;
    }

    if ($verbose) {
        echo 'Installed / not configured';
    }
    return false;
}

function plugin_init_catsurvey()
{
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['catsurvey'] = true;

    Plugin::registerClass('PluginCatsurveyCatsurvey');
    Plugin::registerClass('PluginCatsurveyCatsurvey', array('addtabon' => array('ITILCategory')));
}
