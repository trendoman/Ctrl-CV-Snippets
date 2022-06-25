<?php

    /**
    *   Print all registered listeners for single event
    *
    *   @link
    *   @author Antony aka Trendoman <tony.smirnov@gmail.com>
    *   @date   20.05.2020
    */

    error_log( print_r($FUNCS->get_event_listeners('override_renderables'), true) );


    /**
    *  <cms:call 'console_show' "<cms:php>global $FUNCS;print_r($FUNCS->get_event_listeners('init'), false);</cms:php>" />
    */
