<?php
/**
  * LLR Technologies
 * part of LLR Enterprises - www.llrweb.com/technologies
 *
 * Mercury Application Platform
 * InfoScape
 *
 * User: lromero
 * Date: 4/13/2019
 * Time: 12:57 PM
 */


namespace extensions\netcenter\views\forms\inventory;


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
        $this->setTemplateFromHTML("inventory/AssetTypeForm", self::TEMPLATE_FORM, 'netcenter');

        if($details !== NULL)
        {
            $this->setVariable("code", $details['code']);
            $this->setVariable("name", $details['name']);
        }
    }
}
