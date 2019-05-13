<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 5/10/2019
 * Time: 6:30 PM
 */


namespace views\pages\inventory;


use views\forms\inventory\PurchaseOrderForm;
use views\pages\UserDocument;

class PurchaseOrderCreatePage extends UserDocument
{
    public function __construct()
    {
        parent::__construct('itsm_inventory-purchaseorders-w', 'inventory');

        $form = new PurchaseOrderForm();

        $this->setVariable('tabTitle', 'Purchase Order (New)');
        $this->setVariable('content', $form->getTemplate());
        $this->setVariable('formScript', 'return create()');
        $this->setVariable('cancelLink', '{{@baseURI}}inventory/purchaseorders');
    }
}