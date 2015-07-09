<?php
$installer = $this;
$installer->startSetup();

// For creating for a store
//$store = Mage::app()->getStore('store_code');

// ===== CMS Static Blocks =====
$data = array(
    'title' => 'Hello World',
    'identifier' => 'hello-world-id',
    'stores' => array(0), // Array with store ID's
    'content' => '<p>Some HTML content for example</p>',
    'is_active' => 1
);

// Check if static block already exists:
$block = Mage::app()->getLayout()->createBlock('cms/block')->setBlockId($data['identifier']);

if ($block->getId() == false) {
    // Create static block:
    Mage::getModel('cms/block')->setData($data)->save();
}


// ==== Product Attributes =====

$model =  new Mage_Catalog_Model_Resource_Setup();
$model->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'my_custom_attribute_code', array(
    'group' => 'Prices',
    'type' => 'text',
    'attribute_set' =>  'Default', // Your custom Attribute set
    'backend' => '',
    'frontend' => '',
    'label' => 'My Custom Attribute',
    'input' => 'text',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'default' => '1',
    'searchable' => false,
    'filterable' => true,
    'comparable' => false,
    'visible_on_front' => true,
    'visible_in_advanced_search' => true,
    'used_in_product_listing' => true,
    'unique' => false,
    'apply_to' => 'simple',  // Apply to simple product type
));


$installer->endSetup();