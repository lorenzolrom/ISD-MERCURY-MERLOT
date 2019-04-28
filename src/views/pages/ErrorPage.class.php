<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 4/07/2019
 * Time: 8:52 PM
 */


namespace views\pages;

class ErrorPage extends ApplicationPage
{
    public function __construct(\Exception $e)
    {
        parent::__construct();

        $this->setVariable("content", self::templateFileContents("Error", self::TEMPLATE_CONTENT));
        $this->setVariable("tabTitle", "Error");
        $this->setVariable("errorMessage", $e->getMessage());
    }
}