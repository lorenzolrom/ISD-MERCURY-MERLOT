<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 4/30/2019
 * Time: 8:09 PM
 */


namespace controllers\web;


use controllers\Controller;
use views\pages\web\RegistrarCreatePage;
use views\pages\web\RegistrarEditPage;
use views\pages\web\RegistrarListPage;
use views\View;

class RegistrarController extends Controller
{

    /**
     * @return View
     * @throws \exceptions\InfoCentralException
     * @throws \exceptions\SecurityException
     * @throws \exceptions\ViewException
     * @throws \exceptions\EntryNotFoundException
     */
    public function getPage(): View
    {
        $param = $this->request->next();

        switch($param)
        {
            case null:
                return new RegistrarListPage();
            case 'new':
                return new RegistrarCreatePage();
            default:
                return new RegistrarEditPage($param);
        }
    }
}