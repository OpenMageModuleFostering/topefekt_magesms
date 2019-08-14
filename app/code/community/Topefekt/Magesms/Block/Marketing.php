<?php
/**
 * Mage SMS - SMS notification & SMS marketing
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the BSD 3-Clause License
 * It is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/BSD-3-Clause
 *
 * @category    TOPefekt
 * @package     TOPefekt_Magesms
 * @copyright   Copyright (c) 2012-2014 TOPefekt s.r.o. (http://www.mage-sms.com)
 * @license     http://opensource.org/licenses/BSD-3-Clause
 */
 class Topefekt_Magesms_Block_Marketing extends Mage_Adminhtml_Block_Widget_Grid_Container { public function __construct() { $this->_controller = 'marketing'; $this->_blockGroup = 'magesms'; $this->_headerText = $this->__('Marketing'); parent::__construct(); $this->_removeButton('add'); $this->addButton('filter_reset_form_submit', array( 'label' => Mage::helper('magesms')->__('Reset filter'), 'onclick' => 'filterResetFormSubmit()' )); $this->addButton('filter_form_submit', array( 'label' => Mage::helper('magesms')->__('Apply filter'), 'onclick' => 'filterFormSubmit()' )); } } 