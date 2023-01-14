<?php

namespace LibreNMS\Plugins;

class Tvm
{
    public static function menu()
    {
        echo '<li><a href="plugin/p=Tvm">Tvm</a></li>';
    }

    //end menu()

    public function device_overview_container($device)
    {
    }

    public function port_container($device, $port)
    {
    }
}
