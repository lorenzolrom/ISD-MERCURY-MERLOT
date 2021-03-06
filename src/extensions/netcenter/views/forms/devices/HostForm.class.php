<?php
/**
  * LLR Technologies
 * part of LLR Enterprises - www.llrweb.com/technologies
 *
 * Mercury Application Platform
 * InfoScape
 *
 * User: lromero
 * Date: 4/27/2019
 * Time: 9:19 PM
 */


namespace extensions\netcenter\views\forms\devices;


use views\forms\Form;

class HostForm extends Form
{
    /**
     * HostForm constructor.
     * @param array|null $details
     * @throws \exceptions\ViewException
     */
    public function __construct(?array $details = NULL)
    {
        $this->setTemplateFromHTML('devices/HostForm', self::TEMPLATE_FORM, 'netcenter');

        if($details !== NULL)
        {
            $this->setVariable('ipAddress', $details['ipAddress']);
            $this->setVariable('macAddress', $details['macAddress']);
            $this->setVariable('assetTag', $details['assetTag']);

            $this->setVariable('systemName', htmlentities($details['systemName']));
            $this->setVariable('systemCPU', htmlentities($details['systemCPU']));
            $this->setVariable('systemRAM', htmlentities($details['systemRAM']));
            $this->setVariable('systemOS', htmlentities($details['systemOS']));
            $this->setVariable('systemDomain', htmlentities($details['systemDomain']));
        }
    }
}
