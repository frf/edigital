<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion('2.0.0-dev');
$serviceContainer->setAdapterClass('edigital', 'pgsql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
$manager->setConfiguration(array (
  'classname' => 'Propel\\Runtime\\Connection\\DebugPDO',
  'dsn' => 'pgsql:host=localhost;dbname=edigital',
  'user' => 'edigital',
  'password' => 'edigital',
));
$manager->setName('edigital');
$serviceContainer->setConnectionManager('edigital', $manager);
$serviceContainer->setDefaultDatasource('edigital');