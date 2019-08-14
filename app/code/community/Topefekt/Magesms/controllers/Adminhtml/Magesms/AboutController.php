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
 class Topefekt_Magesms_Adminhtml_Magesms_AboutController extends Mage_Adminhtml_Controller_Action { private $v3a81d7d700dc6d1b4279ed33db8d01cd2cae8ed9; protected function _construct() { } public function preDispatch() { return parent::preDispatch(); } public function indexAction() { $this->loadLayout(); $this->_setActiveMenu('magesms/about'); $i8ee45e0018a32fb1a855b82624506e35789cc4d2 = $this->getLayout()->createBlock( 'Mage_Core_Block_Template', 'my_block_name_here', array('template' => 'topefekt/magesms/about.phtml') ); $this->getLayout()->getBlock('content')->append($i8ee45e0018a32fb1a855b82624506e35789cc4d2); $this->renderLayout(); } } 