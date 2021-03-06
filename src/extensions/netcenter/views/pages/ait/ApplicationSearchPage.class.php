<?php
/**
  * LLR Technologies
 * part of LLR Enterprises - www.llrweb.com/technologies
 *
 * Mercury Application Platform
 * InfoScape
 *
 * User: lromero
 * Date: 5/03/2019
 * Time: 8:20 PM
 */


namespace extensions\netcenter\views\pages\ait;


use utilities\InfoCentralConnection;
use extensions\netcenter\views\pages\NetCenterDocument;

class ApplicationSearchPage extends NetCenterDocument
{
    public function __construct()
    {
        parent::__construct('itsm_ait-apps-r', 'ait');

        $this->setVariable('content', self::templateFileContents('ait/ApplicationSearchPage', self::TEMPLATE_PAGE, 'netcenter'));
        $this->setVariable('tabTitle', 'Applications');

        // Types
        $types = InfoCentralConnection::getResponse(InfoCentralConnection::GET, 'applications/types')->getBody();

        // Life Expectancies
        $lifeExpectancies = InfoCentralConnection::getResponse(InfoCentralConnection::GET, 'applications/lifeExpectancies')->getBody();

        // Data Volumes
        $dataVolumes = InfoCentralConnection::getResponse(InfoCentralConnection::GET, 'applications/dataVolumes')->getBody();

        // Auth Types
        $authTypes = InfoCentralConnection::getResponse(InfoCentralConnection::GET, 'applications/authTypes')->getBody();

        // Statuses
        $statuses = InfoCentralConnection::getResponse(InfoCentralConnection::GET, 'applications/statuses')->getBody();

        $this->setVariable('typeSelect', self::generateAttributeOptions($types, NULL, FALSE));
        $this->setVariable('lifeExpectancySelect', self::generateAttributeOptions($lifeExpectancies, NULL, FALSE));
        $this->setVariable('dataVolumeSelect', self::generateAttributeOptions($dataVolumes, NULL, FALSE));
        $this->setVariable('authTypeSelect', self::generateAttributeOptions($authTypes, NULL, FALSE));
        $this->setVariable('statusSelect', self::generateAttributeOptions($statuses, NULL, FALSE));
    }
}
