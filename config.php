<?php
    $config = Config::singleton();

    // Base de Datos
    $config->set('dbhost', 'localhost');
    $config->set('dbname', 'liquidacionJudicial');
    $config->set('user', 'root');
    $config->set('pass', 'root');
    $config->set('charset', 'utf8');

    // Directorios Globales
    $config->set('appName','Liquidación Judicial');
    $config->set('folderApp','liquidacionJudicial');
    $config->set('http',"http://{$_SERVER['HTTP_HOST']}/{$config->get('folderApp')}/");
    $config->set('root',"{$_SERVER['DOCUMENT_ROOT']}/{$config->get('folderApp')}/");

    // Directorios del Servidor
    $config->set('class',"{$config->get('root')}/appserver/_class/");
    $config->set('controllers',"{$config->get('root')}/appserver/controllers/");
    $config->set('entities',"{$config->get('root')}/appserver/entities/");
    $config->set('libs',"{$config->get('root')}/appserver/libs/");
    $config->set('models',"{$config->get('root')}/appserver/models/");
    $config->set('views',"{$config->get('root')}/appserver/views/");

    $config->set('assetsServer',"{$config->get('root')}/appclient/assets/");
    $config->set('fonts',"{$config->get('assetsServer')}fonts/");
    $config->set('imgServer',"{$config->get('assetsServer')}img/");
    
    // Directorios del Cliente
    $config->set('assetsClient',"{$config->get('http')}/appclient/assets/");
    $config->set('imgClient',"{$config->get('assetsClient')}img/");
    $config->set('css',"{$config->get('http')}/appclient/css/");
    $config->set('js',"{$config->get('http')}/appclient/js/");
?>