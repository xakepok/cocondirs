<?php
defined('_JEXEC') or die;

// Access to module parameters
$domain = $params->get('domain', 'https://www.joomla.org');
?>
<?php echo JText::sprintf('MOD_COCONDIRS_TEXT'), ":";?>
<ul class="list-group list-group-flush">
<?php foreach ($directions as $direction): ?>
    <li class="list-group-item"><?php echo $direction['title'];?></li>
<?php endforeach;?>
</ul>
