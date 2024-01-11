<?php
/**
 * ---------------------------------------------------------------------
 *  catsurvey is a plugin to manage inquests by ITIL categories
 *  ---------------------------------------------------------------------
 *  LICENSE
 *
 *  This file is part of catsurvey.
 *
 *  catsurvey is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  catsurvey is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with Formcreator. If not, see <http://www.gnu.org/licenses/>.
 *  ---------------------------------------------------------------------
 *  @copyright Copyright © 2022-2024 probeSys'
 *  @license   http://www.gnu.org/licenses/agpl.txt AGPLv3+
 *  @link      https://github.com/Probesys/glpi-plugins-catsurvey
 *  @link      https://plugins.glpi-project.org/#/plugin/catsurvey
 *  ---------------------------------------------------------------------
 */
// Version of the plugin
define('PLUGIN_CATSURVEY_VERSION', "1.0.0");
// Minimal GLPI version, inclusive
define("PLUGIN_CATSURVEY_GLPI_MIN_VERSION", "9.4");
// Maximum GLPI version, exclusive
define("PLUGIN_CATSURVEY_GLPI_MAX_VERSION", "11.0");

function plugin_version_catsurvey() {
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

function plugin_catsurvey_check_prerequisites() {
   try {
      if (version_compare(GLPI_VERSION, PLUGIN_CATSURVEY_GLPI_MIN_VERSION, '<')) {
          throw new \Exception('This plugin requires GLPI >= ' . PLUGIN_CATSURVEY_GLPI_MIN_VERSION);
      }

       $prerequisites_check_ok = true;
   } catch (\Exception $e) {
       echo $e->getMessage();
   }

    return $prerequisites_check_ok;
}

function plugin_catsurvey_check_config($verbose = false) {
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
    Plugin::registerClass('PluginCatsurveyCatsurvey', ['addtabon' => ['ITILCategory']]);
}
