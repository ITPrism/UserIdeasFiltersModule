<?php
/**
 * @package      Userideas
 * @subpackage   Modules
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2013 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      GNU General Public License version 3 or later; see LICENSE.txt
 */
 
// no direct access
defined('_JEXEC') or die; ?>
<div class="ui-modsearch<?php echo $moduleclassSfx; ?>">
    <?php if ($params->get('display_filter_categories', 1) or $params->get('display_filter_statuses', 1)) {?>
    <form action="<?php echo $url;?>" method="get">
        <div class="row">
            <?php if ($params->get('display_filter_categories', 1)) {
                $elementId = Prism\Utilities\StringHelper::generateRandomString();
                ?>
                <div class="col-md-4">
                    <label for="<?php echo $elementId;?>" class="hidden"><?php echo JText::_('MOD_USERIDEASFILTERS_CATEGORY'); ?></label>
                    <select name="filter_category" class="js-userideas-modsearch-filter" id="<?php echo $elementId;?>">
                        <?php echo JHtml::_('select.options', $categories, 'value', 'text', $filterCategory);?>
                    </select>
                </div>
            <?php }?>
            <?php if ($params->get('display_filter_statuses', 1)) {
                $elementId = Prism\Utilities\StringHelper::generateRandomString();
                ?>
                <div class="col-md-4">
                    <label for="<?php echo $elementId;?>" class="hidden"><?php echo JText::_('MOD_USERIDEASFILTERS_STATUS'); ?></label>
                    <select name="filter_status" class="js-userideas-modsearch-filter" id="<?php echo $elementId;?>">
                        <?php echo JHtml::_('select.options', $statuses, 'value', 'text', $filterStatus);?>
                    </select>
                </div>
            <?php }?>
            <div class="col-md-4">
                <button class="btn btn-primary" type="submit">
                    <span class="fa fa-filter"></span>
                    <?php echo JText::_('MOD_USERIDEASFILTERS_FILTER');?>
                </button>
            </div>
        </div>
    </form>
    <?php }?>
    <?php if ($displaySortingFilters) {?>
        <nav class="navbar navbar-default ui-modfilters-sorting mt-20">
            <div class="navbar-header">
                <a class="navbar-brand" href="javascript: void(0);"><?php echo JText::_('MOD_USERIDEASFILTERS_SORT_BY'); ?>:</a>
            </div>
            <ul class="nav navbar-nav">
                <?php
                if ($params->get('display_sort_title', 1)) {
                    echo UserideasHelper::sortByLink(JText::_('MOD_USERIDEASFILTERS_TITLE'), 'alpha', $orderOptions, 'ui-order-alphabet');
                }
                if ($params->get('display_sort_mostvoted', 1)) {
                    echo UserideasHelper::sortByLink(JText::_('MOD_USERIDEASFILTERS_VOTES'), 'votes', $orderOptions, 'ui-order-funding');
                }
                if ($params->get('display_sort_latest', 1)) {
                    echo UserideasHelper::sortByLink(JText::_('MOD_USERIDEASFILTERS_RECENT'), 'date', $orderOptions, 'ui-order-latest');
                }
                if ($params->get('display_sort_popular', 1)) {
                    echo UserideasHelper::sortByLink(JText::_('MOD_USERIDEASFILTERS_POPULAR'), 'hits', $orderOptions, 'ui-order-popular');
                }
                ?>
            </ul>
        </nav>
    <?php } ?>
</div>