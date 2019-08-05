<?php
use Joomla\CMS\Helper\ModuleHelper;

defined('_JEXEC') or die;
require_once JPATH_ADMINISTRATOR . '/components/com_rw/helpers/rw.php';

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

$db =& JFactory::getDbo();
$query = $db->getQuery(true);
$query
    ->select("id, title")
    ->from("`#__rw_directions`")
    ->where("is_cocon = 1")
    ->where("published = 1");
$items = $db->setQuery($query)->loadAssocList();
$itemID = RwHelper::getMenuItemId('direction', 'com_rw');
$directions = array();
foreach ($items as $item) {
    $arr = array();
    $url = JRoute::_("index.php?option=com_rw&amp;view=direction&amp;id={$item['id']}&amp;Itemid={$itemID}");
    $arr['title'] = JHtml::link($url, $item['title']);
    $directions[] = $arr;
}

require ModuleHelper::getLayoutPath('mod_cocondirs', $params->get('layout', 'default'));
