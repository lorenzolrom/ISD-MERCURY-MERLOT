<?php
/**
  * LLR Technologies
 * part of LLR Enterprises - www.llrweb.com/technologies
 *
 * Mercury Application Platform
 * InfoScape
 *
 * User: lromero
 * Date: 5/02/2019
 * Time: 4:43 PM
 */


namespace extensions\netcenter\views\forms\web;


use utilities\InfoCentralConnection;
use views\forms\Form;

class VHostForm extends Form
{
    /**
     * VHostForm constructor.
     * @param array|null $details
     * @throws \exceptions\ViewException
     * @throws \exceptions\InfoCentralException
     */
    public function __construct(?array $details = NULL)
    {
        $this->setTemplateFromHTML('web/VHostForm', self::TEMPLATE_FORM, 'netcenter');

        $statuses = InfoCentralConnection::getResponse(InfoCentralConnection::GET, 'vhosts/statuses')->getBody();
        $statusSelect = "";

        foreach($statuses as $status)
        {

            $selected = ($details['status'] == $status['code']) ? 'selected' : '';

            $statusSelect .= "<option value='{$status['code']}' $selected>{$status['name']}</option>\n";
        }

        $this->setVariable('statusSelect', $statusSelect);

        if($details !== NULL)
            $this->setVariables($details);
    }
}
