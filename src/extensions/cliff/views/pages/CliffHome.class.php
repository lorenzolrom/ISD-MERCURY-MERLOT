<?php
/**
  * LLR Technologies
 * part of LLR Enterprises - www.llrweb.com/technologies
 *
 * Mercury Application Platform
 * InfoScape
 *
 * User: lromero
 * Date: 4/02/2020
 * Time: 9:52 AM
 */


namespace extensions\cliff\views\pages;


class CliffHome extends CliffDocument
{
    public function __construct()
    {
        parent::__construct('cliff-r');

        $this->setVariable('tabTitle', 'CLIFF');

        $this->setVariable('content', self::templateFileContents('CliffHome', self::TEMPLATE_PAGE, 'cliff'));
    }
}
