<?php
namespace Batuhan\EpttavmCase\Platforms;

use Batuhan\EpttavmCase\Formats\ExportFormat;

class Platform
{
    public string $name;
    public ExportFormat $format;

    /**
     * @throws \Exception
     */
    public function export($data){
        $folder ="Output/".$this->name."/".date('Y')."/".date('M')."/".date('d')."/";
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        $file_name=$folder.time().".".$this->format->getExtension();
        $check = file_put_contents($file_name, $this->format->doTransform($data));
        if($check>1){
            echo $this->name . " export file success!".PHP_EOL;
            return true;
        }else{
            throw new \Exception("Data not writed in file");
        }
    }
}