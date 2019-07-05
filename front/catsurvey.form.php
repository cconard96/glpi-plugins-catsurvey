<?php
include ("../../../inc/includes.php");

Session::haveRight("entity", UPDATE);

$cat = new PluginCatsurveyCatsurvey();

if (isset($_POST['update'])) {
   $cat->update($_POST);
   Html::back();
}

