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
 * @copyright   Copyright (c) 2012-2017 TOPefekt s.r.o. (http://www.mage-sms.com)
 * @license     http://opensource.org/licenses/BSD-3-Clause
 */
class Topefekt_Magesms_Model_Marketing_Filter_Sale extends Varien_Object { public $filter; public function _construct() { $this->filter = array( 'title' => Mage::helper('magesms')->__('Sales from: '), 'type' => 'datetime', 'name' => 'sale', 'color' => '#886543', 'glue' => ' / '.Mage::helper('magesms')->__('to: '), ); } public function getFilter($iff7e46827cbb6547116c592bf800f4687428abf9, $i2d8fb6b6f17ec9aa17899ea311cc26bc493cd9a2) { $i62074d2d0e606cbe67bd6b024f6c2eaac2029c2e = array(); $ie2a167ef859b6a69d0dc6803ded0a2a49f59ce69 = array(); foreach($i2d8fb6b6f17ec9aa17899ea311cc26bc493cd9a2 as $iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a) { if ($iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a instanceof $this) { $i3ca4aff6918962dee4a8054ca52f13ef3b6bab08 = $iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a->getValue(); if (!empty($i3ca4aff6918962dee4a8054ca52f13ef3b6bab08[0])) $i62074d2d0e606cbe67bd6b024f6c2eaac2029c2e[] = date('Y-m-d H:i:s', strtotime($i3ca4aff6918962dee4a8054ca52f13ef3b6bab08[0])); if (!empty($i3ca4aff6918962dee4a8054ca52f13ef3b6bab08[1])) $ie2a167ef859b6a69d0dc6803ded0a2a49f59ce69[] = date('Y-m-d H:i:s', strtotime($i3ca4aff6918962dee4a8054ca52f13ef3b6bab08[1])); } } if (count($i62074d2d0e606cbe67bd6b024f6c2eaac2029c2e) || count($ie2a167ef859b6a69d0dc6803ded0a2a49f59ce69)) { if (strpos($iff7e46827cbb6547116c592bf800f4687428abf9->getSelect(), $iff7e46827cbb6547116c592bf800f4687428abf9->getTable('sales/order_grid')) === false) $iff7e46827cbb6547116c592bf800f4687428abf9->joinTable('sales/order_grid', 'customer_id=entity_id', array('entity_id')); $iff7e46827cbb6547116c592bf800f4687428abf9->getSelect() ->columns($iff7e46827cbb6547116c592bf800f4687428abf9->getTable('sales/order_grid').'.created_at AS created_at_sale') ->group('e.entity_id'); if (count($i62074d2d0e606cbe67bd6b024f6c2eaac2029c2e)) $iff7e46827cbb6547116c592bf800f4687428abf9->getSelect()->having('`created_at_sale` >= "'.implode('" AND `created_at_sale` => "', $i62074d2d0e606cbe67bd6b024f6c2eaac2029c2e).'"'); if (count($ie2a167ef859b6a69d0dc6803ded0a2a49f59ce69)) $iff7e46827cbb6547116c592bf800f4687428abf9->getSelect()->having('`created_at_sale` <= "'.implode('" AND `created_at_sale` <= "', $ie2a167ef859b6a69d0dc6803ded0a2a49f59ce69).'"'); } return $iff7e46827cbb6547116c592bf800f4687428abf9; } } 