<?php
    if ( !defined('K_COUCH_DIR') ) define( 'K_COUCH_DIR', str_replace('database/', '', str_replace( '\\', '/', dirname(realpath(__FILE__) ).'/')) );
    require_once( K_COUCH_DIR.'header.php' );
    require( 'config.php' );

    // Restore default database
    $path .= K_DB_NAME.'_' . 'default_db.sql';
    $command = escapeshellcmd( K_MYSQL_PATH . 'mysql' );
    $command .= ' --user=' . escapeshellarg( K_DB_USER ) . ' --password=' . escapeshellarg( K_DB_PASSWORD );
    $db_host = array_map( "trim", explode(':', K_DB_HOST) );
    $command .= ' --host=' . escapeshellarg( $db_host[0] );
    if( strlen($db_host[1]) ){
        $command .= ' --port=' . escapeshellarg( $db_host[1] );
    }
    $command .= ' ' . escapeshellarg( K_DB_NAME );
    $command .= ' < ' . $path;

    exec($command);
