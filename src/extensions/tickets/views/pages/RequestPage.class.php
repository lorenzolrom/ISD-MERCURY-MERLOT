<?php
/**
  * LLR Technologies
 * part of LLR Enterprises - www.llrweb.com/technologies
 *
 * Mercury Application Platform
 * InfoScape
 *
 * User: lromero
 * Date: 9/15/2019
 * Time: 8:30 AM
 */


namespace extensions\tickets\views\pages;


class RequestPage extends TicketDocument
{
    public function __construct()
    {
        parent::__construct('tickets-customer', 'requests');

        $this->setVariable('content', self::templateFileContents('RequestPage', self::TEMPLATE_PAGE, 'tickets'));
        $this->setVariable('tabTitle', 'Requests');
    }
}
