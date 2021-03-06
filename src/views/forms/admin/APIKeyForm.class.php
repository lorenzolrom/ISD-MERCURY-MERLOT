<?php
/**
  * LLR Technologies
 * part of LLR Enterprises - www.llrweb.com/technologies
 *
 * Mercury Application Platform
 * InfoScape
 *
 * User: lromero
 * Date: 5/05/2019
 * Time: 12:24 AM
 */


namespace views\forms\admin;


use utilities\InfoCentralConnection;
use views\forms\Form;

class APIKeyForm extends Form
{
    /**
     * APIKeyForm constructor.
     * @param array|null $details
     * @throws \exceptions\ViewException
     * @throws \exceptions\InfoCentralException
     */
    public function __construct(?array $details = NULL)
    {
        $this->setTemplateFromHTML('admin/APIKeyForm', self::TEMPLATE_FORM);

        if($details !== NULL)
            $this->setVariables($details);

        $permissions = InfoCentralConnection::getResponse(InfoCentralConnection::GET, 'permissions')->getBody();

        $permissionSelect = '';

        foreach($permissions as $permission)
        {
            $selected = '';

            if($details !== NULL AND is_array($details['permissions']))
            {
                foreach($details['permissions'] as $currentPermission)
                {
                    if($currentPermission == $permission['code'])
                        $selected = 'selected';
                }
            }

            $permissionSelect .= "<option value='{$permission['code']}' $selected>{$permission['code']}</option>";
        }

        $this->setVariable('permissionSelect', $permissionSelect);
    }
}
