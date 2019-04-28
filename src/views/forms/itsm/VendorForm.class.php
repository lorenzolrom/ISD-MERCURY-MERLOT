<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 4/25/2019
 * Time: 3:10 PM
 */


namespace views\forms\itsm;


use views\forms\Form;

class VendorForm extends Form
{
    /**
     * VendorForm constructor.
     * @param array|null $details
     * @throws \exceptions\ViewException
     */
    public function __construct(?array $details = NULL)
    {
        $this->setTemplateFromHTML("itsm/VendorForm", self::TEMPLATE_FORM);

        if($details !== NULL)
        {
            $this->setVariable('code', $details['code']);
            $this->setVariable('name', htmlentities($details['name']));
            $this->setVariable('streetAddress', htmlentities($details['streetAddress']));
            $this->setVariable('city', htmlentities($details['city']));
            $this->setVariable('state', htmlentities($details['state']));
            $this->setVariable('zipCode', htmlentities($details['zipCode']));
            $this->setVariable('phone', htmlentities($details['phone']));
            $this->setVariable('fax', htmlentities($details['fax']));
        }
    }
}