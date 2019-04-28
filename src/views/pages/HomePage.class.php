<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 4/07/2019
 * Time: 6:11 PM
 */


namespace views\pages;


class HomePage extends ApplicationPage
{
    public function __construct()
    {
        parent::__construct();
        $this->setVariable("tabTitle", \Config::OPTIONS['appName'] . " Home");
    }
}