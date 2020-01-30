<?php
function plugin_catsurvey_install() {
    global $DB;

    if (!$DB->tableExists("glpi_plugin_catsurvey_catsurveys")) {

        // Création de la table
        $query = "CREATE TABLE glpi_plugin_catsurvey_catsurveys (
                    id int(11) NOT NULL default '0' COMMENT 'RELATION to glpi_itilcategories (id)',
                    max_closedate datetime default NULL,
                    inquest_config int(11) NOT NULL default '1',
                    inquest_rate int(11) NOT NULL default '0',
                    inquest_delay int(11) NOT NULL default '-10',
                    inquest_URL varchar(255) default NULL,
                    PRIMARY KEY (id)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

        $DB->queryOrDie($query, $DB->error());
    }

    CronTask::Register('PluginCatsurveyCatsurvey', 'createinquestbycat', '86400');
    return true;
}

function plugin_catsurvey_uninstall() {
    global $DB;

    $tables = array("glpi_plugin_catsurvey_catsurveys");

    foreach($tables as $table) {
        $DB->query("DROP TABLE IF EXISTS `$table`;");
    }
    return true;
}
