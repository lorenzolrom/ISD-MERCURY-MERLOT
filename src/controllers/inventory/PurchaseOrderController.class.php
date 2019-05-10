<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 5/10/2019
 * Time: 2:12 PM
 */


namespace controllers\inventory;


use controllers\Controller;
use views\pages\inventory\PurchaseOrderSearchPage;
use views\View;

class PurchaseOrderController extends Controller
{

    /**
     * @return View
     * @throws \exceptions\InfoCentralException
     * @throws \exceptions\SecurityException
     * @throws \exceptions\ViewException
     */
    public function getPage(): View
    {
        $param = $this->request->next();

        switch($param)
        {
            case null:
                return new PurchaseOrderSearchPage();
            case 'new':
                die('new');
            default:
                die('edit');
        }
    }
}