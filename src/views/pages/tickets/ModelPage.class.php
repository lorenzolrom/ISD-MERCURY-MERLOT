<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 6/03/2019
 * Time: 8:18 AM
 */


namespace views\pages\tickets;


use exceptions\EntryNotFoundException;
use utilities\InfoCentralConnection;

class ModelPage extends TicketDocument
{
    protected $response;

    /**
     * ModelPage constructor.
     * @param string $path
     * @param string|null $permission
     * @throws EntryNotFoundException
     * @throws \exceptions\InfoCentralException
     * @throws \exceptions\SecurityException
     * @throws \exceptions\ViewException
     */
    public function __construct(string $path, ?string $permission = NULL)
    {
        parent::__construct($permission);

        $this->response = InfoCentralConnection::getResponse(InfoCentralConnection::GET, $path);

        if($this->response->getResponseCode() != '200')
            throw new EntryNotFoundException(EntryNotFoundException::MESSAGES[EntryNotFoundException::PRIMARY_KEY_NOT_FOUND], EntryNotFoundException::PRIMARY_KEY_NOT_FOUND);
    }
}