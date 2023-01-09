<?php
require_once 'vendor/autoload.php';

$provider = new \Batuhan\EpttavmCase\ServiceProviders\DataProvider();
$products= $provider->fetchData();

$platform_facebook = new \Batuhan\EpttavmCase\Platforms\Platform();
$platform_facebook->name = "Facebook";
$platform_facebook->format=new \Batuhan\EpttavmCase\Formats\JSONFormat();
$platform_facebook->export($products);

$platform_cimri= new \Batuhan\EpttavmCase\Platforms\Platform();
$platform_cimri->name = "Cimri";
$platform_cimri->format=new \Batuhan\EpttavmCase\Formats\XMLFormat();
$platform_cimri->export($products);