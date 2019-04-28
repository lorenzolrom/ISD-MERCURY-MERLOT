<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 4/10/2019
 * Time: 7:17 AM
 */


namespace controllers\facilities;


use controllers\Controller;
use views\pages\facilities\LocationEditPage;
use views\pages\facilities\LocationViewPage;
use views\View;

class LocationController extends Controller
{

    /**
     * @return View
     * @throws \exceptions\EntryNotFoundException
     * @throws \exceptions\InfoCentralException
     * @throws \exceptions\SecurityException
     * @throws \exceptions\ViewException
     */
    public function getPage(): View
    {
        $param = $this->request->next();

        switch($this->request->next())
        {
            case "edit":
                return new LocationEditPage((int)$param);
            default:
                return new LocationViewPage((int)$param);
        }
    }
}