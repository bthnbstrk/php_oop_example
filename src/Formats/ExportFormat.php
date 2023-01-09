<?php

namespace Batuhan\EpttavmCase\Formats;

interface ExportFormat
{
    public function doTransform($data);
    public function getExtension();
}