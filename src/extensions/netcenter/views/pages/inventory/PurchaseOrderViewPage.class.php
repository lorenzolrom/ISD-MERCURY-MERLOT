<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury MAP InfoScape
 *
 * User: lromero
 * Date: 5/10/2019
 * Time: 2:48 PM
 */


namespace extensions\netcenter\views\pages\inventory;


use extensions\netcenter\views\pages\ModelPage;

class PurchaseOrderViewPage extends ModelPage
{
    public function __construct(string $param)
    {
        parent::__construct("purchaseorders/$param", 'itsm_inventory-purchaseorders-r', 'inventory');

        $details = $this->response->getBody();

        $this->setVariable('tabTitle', "Purchase Order - $param");
        $this->setVariable('content', self::templateFileContents('inventory/PurchaseOrderViewPage', self::TEMPLATE_PAGE, 'netcenter'));

        $this->setVariable('sent', $details['sent'] ? 'Yes' : 'No');
        $this->setVariable('received', $details['received'] ? 'Yes' : 'No');
        $this->setVariable('canceled', $details['canceled'] ? 'Yes' : 'No');

        $this->setVariables($details);
    }
}