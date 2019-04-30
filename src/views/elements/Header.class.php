<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 4/07/2019
 * Time: 7:39 PM
 */


namespace views\elements;

use views\View;

class Header extends View
{
    /**
     * Header constructor.
     * @throws \exceptions\ViewException
     */
    public function __construct()
    {
        $this->setTemplateFromHTML("Header", self::TEMPLATE_ELEMENT);
    }
}