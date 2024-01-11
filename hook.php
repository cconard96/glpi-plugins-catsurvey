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
function plugin_catsurvey_install() {
    global $DB;

   if (!$DB->tableExists("glpi_plugin_catsurvey_catsurveys")) {

       // Création de la table
       $query = "CREATE TABLE glpi_plugin_catsurvey_catsurveys (
                    id INT UNSIGNED NOT NULL default '0' COMMENT 'RELATION to glpi_itilcategories (id)',
                    max_closedate TIMESTAMP default NULL,
                    inquest_config int(11) NOT NULL default '1',
                    inquest_rate int(11) NOT NULL default '0',
                    inquest_delay int(11) NOT NULL default '-10',
                    inquest_URL varchar(255) default NULL,
                    PRIMARY KEY (id)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

       $DB->queryOrDie($query, $DB->error());
   }

    CronTask::Register('PluginCatsurveyCatsurvey', 'createinquestbycat', '86400');
    return true;
}

function plugin_catsurvey_uninstall() {
    global $DB;

    $tables = ["glpi_plugin_catsurvey_catsurveys"];

   foreach ($tables as $table) {
       $DB->query("DROP TABLE IF EXISTS `$table`;");
   }
    return true;
}
