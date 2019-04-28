<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 4/13/2019
 * Time: 12:57 PM
 */


namespace views\forms\itsm;


use views\forms\Form;

class AssetTypeForm extends Form
{
    /**
     * AssetTypeForm constructor.
     * @param array|null $details
     * @throws \exceptions\ViewException
     */
    public function __construct(?array $details = NULL)
    {
        $this->setTemplateFromHTML("itsm/AssetTypeForm", self::TEMPLATE_FORM);

        if($details !== NULL)
        {
            $this->setVariable("code", $details['code']);
            $this->setVariable("name", $details['name']);
        }
    }
}