<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury MAP Navigator
 *
 * User: lromero
 * Date: 5/11/2020
 * Time: 6:22 PM
 */


namespace extensions\cliff\views\pages;


class XRefLocationsPage extends CliffDocument
{
    public function __construct()
    {
        parent::__construct('cliff-r', 'xref');

        $this->setVariable('tabTitle', 'X-Reference Locations');

        $this->setVariable('content', self::templateFileContents('XRefLocationsPage', self::TEMPLATE_PAGE, 'cliff'));
    }
}