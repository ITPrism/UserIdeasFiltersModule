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
<div class="ui-modfilters<?php echo $moduleclassSfx; ?>">
    <form action="<?php echo $url; ?>" method="get">
        <?php if ($params->get('display_filter_categories', 0)) {
            $elementId = Prism\Utilities\StringHelper::generateRandomString();
            ?>
            <div class="form-group">
                <label for="<?php echo $elementId; ?>" class="hidden"><?php echo JText::_('MOD_USERIDEASFILTERS_CATEGORY'); ?></label>
                <select name="filter_category" class="js-userideas-modfilters-filter" id="<?php echo $elementId; ?>">
                    <?php echo JHtml::_('select.options', $categories, 'value', 'text', $filterCategory); ?>
                </select>
            </div>
        <?php } ?>

        <?php if ($params->get('display_filter_statuses', 0)) {
            $elementId = Prism\Utilities\StringHelper::generateRandomString();
            ?>
            <div class="form-group">
                <label for="<?php echo $elementId; ?>"
                       class="hidden"><?php echo JText::_('MOD_USERIDEASFILTERS_STATUS'); ?></label>
                <select name="filter_status" class="js-userideas-modfilters-filter" id="<?php echo $elementId; ?>">
                    <?php echo JHtml::_('select.options', $statuses, 'value', 'text', $filterStatus); ?>
                </select>
            </div>
        <?php } ?>

        <button type="submit" class="btn btn-primary">
            <span class="fa fa-filter"></span>
            <?php echo JText::_('MOD_USERIDEASFILTERS_FILTER'); ?>
        </button>
    </form>

    <?php if ($displaySortingFilters) { ?>
    <div class="ui-modfilters-sorting clearfix mt-20">
        <div><?php echo JText::_('MOD_USERIDEASFILTERS_SORT_BY'); ?></div>
        <ul class="ui-mod-filters">
            <?php if ($params->get('show_sort_title', 1)) {
                echo UserideasHelper::sortByLink(JText::_('MOD_USERIDEASFILTERS_TITLE'), 'alpha', $orderOptions, 'ui-order-alphabet');
            }
            if ($params->get('show_sort_votes', 1)) {
                echo UserideasHelper::sortByLink(JText::_('MOD_USERIDEASFILTERS_VOTES'), 'votes', $orderOptions, 'ui-order-funding');
            }
            if ($params->get('show_sort_recent', 1)) {
                echo UserideasHelper::sortByLink(JText::_('MOD_USERIDEASFILTERS_RECENT'), 'date', $orderOptions, 'ui-order-latest');
            }
            if ($params->get('show_sort_popular', 1)) {
                echo UserideasHelper::sortByLink(JText::_('MOD_USERIDEASFILTERS_POPULAR'), 'hits', $orderOptions, 'ui-order-popular');
            } ?>
        </ul>
    </div>
    <?php } ?>
</div>