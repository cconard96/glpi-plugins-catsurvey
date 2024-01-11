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
include ("../../../inc/includes.php");

Session::haveRight("entity", UPDATE);

$cat = new PluginCatsurveyCatsurvey();

if (isset($_POST['update'])) {
   $cat->update($_POST);
   Html::back();
}
