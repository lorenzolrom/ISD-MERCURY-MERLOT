<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 5/02/2019
 * Time: 10:26 AM
 */


namespace controllers\devices;


use controllers\Controller;
use exceptions\PageNotFoundException;
use views\View;

class DevicesController extends Controller
{

    /**
     * @return View
     * @throws PageNotFoundException
     * @throws \exceptions\EntryNotFoundException
     * @throws \exceptions\InfoCentralException
     * @throws \exceptions\SecurityException
     * @throws \exceptions\ViewException
     */
    public function getPage(): View
    {
        switch($this->request->next())
        {
            case 'hosts':
                $hosts = new HostController($this->request);
                return $hosts->getPage();
        }

        throw new PageNotFoundException(PageNotFoundException::MESSAGES[PageNotFoundException::PAGE_NOT_FOUND], PageNotFoundException::PAGE_NOT_FOUND);
    }
}