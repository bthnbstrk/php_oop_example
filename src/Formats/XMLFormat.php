<?php

namespace Batuhan\EpttavmCase\Formats;
use Exception;
use SimpleXMLElement;

class XMLFormat implements ExportFormat
{

    /**
     * @throws Exception
     */

    public function doTransform($data)
    {
        try{
            if (is_array($data) && count($data) > 0) {
                return $this->arrayToXml($data);
            }
            throw new Exception("Invalid data!");
        }catch (\Exception){
            throw new Exception("Converted error!");
        }
    }

    private function arrayToXml($array, $rootElement = null, $xml = null)
    {
        $_xml = $xml;

        // If there is no Root Element then insert root
        if ($_xml === null) {
            $_xml = new SimpleXMLElement($rootElement !== null ? $rootElement : '<root/>');
        }

        // Visit all key value pair
        foreach ($array as $k => $v) {

            // If there is nested array then
            if (is_array($v)) {

                // Call function for nested array
                $this->arrayToXml($v, $k, $_xml->addChild($k));
            } else {

                // Simply add child element.
                $_xml->addChild($k, $v);
            }
        }

        return $_xml->asXML();
    }

    public function getExtension()
    {
        return "xml";
    }
}