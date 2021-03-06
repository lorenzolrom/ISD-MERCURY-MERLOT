<?php
/**
  * LLR Technologies
 * part of LLR Enterprises - www.llrweb.com/technologies
 *
 * Mercury Application Platform
 * InfoScape
 *
 * User: lromero
 * Date: 11/03/2019
 * Time: 1:26 PM
 */


namespace extensions\facilities\views\pages;


class FloorplanSearchPage extends FacilitiesDocument
{
    public function __construct()
    {
        parent::__construct("facilitiescore_floorplans-r", 'floorplans');

        $this->setVariable("tabTitle", "Floorplans");
        $this->setVariable("content", self::templateFileContents("FloorplanSearchPage", self::TEMPLATE_PAGE, 'facilities'));
    }
}
