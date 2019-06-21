<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury MAP Navigator
 *
 * User: lromero
 * Date: 5/24/2019
 * Time: 3:33 PM
 */


namespace views\pages\lockshop;


class LIMSHome extends LIMSDocument
{
    public function __construct()
    {
        parent::__construct('lockshop');
        $this->setVariable('tabTitle', 'Lock Management');

        $this->setVariable('content', self::templateFileContents('lockshop/LIMSHome', self::TEMPLATE_PAGE));
    }
}