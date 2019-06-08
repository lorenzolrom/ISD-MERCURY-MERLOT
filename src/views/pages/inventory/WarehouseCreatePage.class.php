<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 4/14/2019
 * Time: 11:59 AM
 */


namespace views\pages\inventory;


use views\forms\inventory\WarehouseForm;
use views\pages\MainDocument;

class WarehouseCreatePage extends MainDocument
{
    public function __construct()
    {
        parent::__construct('itsm_inventory-warehouses-w', 'inventory');

        $this->setVariable("tabTitle", "Warehouse (New)");

        $form = new WarehouseForm();

        $this->setVariable("content", $form->getTemplate());
        $this->setVariable("cancelLink", "{{@baseURI}}inventory/warehouses");
        $this->setVariable("formScript", "return createWarehouse()");
    }
}