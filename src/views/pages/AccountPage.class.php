<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 4/09/2019
 * Time: 11:00 AM
 */


namespace views\pages;


use utilities\InfoCentralConnection;

class AccountPage extends MainDocument
{
    public function __construct()
    {
        parent::__construct();

        $response = InfoCentralConnection::getResponse(InfoCentralConnection::GET, "currentUser");

        $this->setVariable("tabTitle", "My Account");
        $this->setVariable("content", self::templateFileContents("Account", self::TEMPLATE_PAGE));

        // Get user details
        $userDetails = $response->getBody();

        $this->setVariable("firstName", htmlentities($userDetails['firstName']));
        $this->setVariable("lastName", htmlentities($userDetails['lastName']));
        $this->setVariable("username", htmlentities($userDetails['username']));
        $this->setVariable("email", htmlentities($userDetails['email']));

        // Get user roles
        $response = InfoCentralConnection::getResponse(InfoCentralConnection::GET, "currentUser/roles");

        $roleList = "";

        foreach($response->getBody() as $role)
        {
            $roleList .= htmlentities($role['name']) . "\n";
        }

        $this->setVariable("roleList", $roleList);
    }
}