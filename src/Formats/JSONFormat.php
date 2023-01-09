<?php

namespace Batuhan\EpttavmCase\Formats;
use Exception;

class JSONFormat implements ExportFormat
{
    /**
     * @throws Exception
     */

    public function doTransform($data)
    {
        try{
            if(is_array($data) && count($data)>0) {
                return json_encode($data);
            }
            throw new Exception("Invalid data!");
        }catch (\Exception){
            throw new Exception("Not found data!");
        }
    }

    public function getExtension()
    {
        return "json";
    }
}