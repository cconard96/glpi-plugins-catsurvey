<?php
// Version of the plugin
define('PLUGIN_CATSURVEY_VERSION', "9.4.2");
// Minimal GLPI version, inclusive
define ("PLUGIN_CATSURVEY_GLPI_MIN_VERSION", "9.4");
// Maximum GLPI version, exclusive
define ("PLUGIN_CATSURVEY_GLPI_MAX_VERSION", "9.5");

function plugin_version_catsurvey() {

    return array('name'           => "Catsurvey",
                 'version'        => PLUGIN_CATSURVEY_VERSION,
                 'author'         => 'Maxime Bonillo, Philippe GODOT',
                 'license'        => 'GPLv2+',
                 'homepage'       => 'http://www.probesys.com',
                 'minGlpiVersion' => PLUGIN_CATSURVEY_GLPI_MIN_VERSION);// For compatibility / no install in version < 0.80

}

function plugin_catsurvey_check_prerequisites() {

    $success = true;
    if (version_compare(GLPI_VERSION, PLUGIN_FORMCREATOR_GLPI_MIN_VERSION, 'lt')) {
       echo 'This plugin requires GLPI >= ' . PLUGIN_FORMCREATOR_GLPI_MIN_VERSION . '<br>';
       $success = false;
    }
    return $success;
}

function plugin_catsurvey_check_config($verbose=false) {

    if (true) { // No configuration check
        return true;
    }

    if ($verbose) {
        echo 'Installed / not configured';
    }
    return false;
}

function plugin_init_catsurvey() {
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['catsurvey'] = true;

    Plugin::registerClass('PluginCatsurveyCatsurvey');
    Plugin::registerClass('PluginCatsurveyCatsurvey', array('addtabon' => array('ITILCategory')));

}

