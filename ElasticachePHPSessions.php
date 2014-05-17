<?php

use SessionHandlerInterface;

class ElasticachePHPSessions implements SessionHandlerInterface
{
    private $ch;
    private $timeout;

    function __construct($endpoint,$port,$timeout){
        $this->ch = new Memcached();
        $this->ch->setOption(Memcached::OPT_CLIENT_MODE, Memcached::STATIC_CLIENT_MODE);
        $this->ch->addServer($endpoint, $port);
        $this->timeout = $timeout;
    }

    public function open($savePath, $sessionName)
    {
        return true;
    }

    public function close()
    {
        return true;
    }

    public function read($id)
    {
        return $this->ch->get($id);
    }

    public function write($id, $data)
    {
        return $this->ch->set($id,$data,$this->timeout);
    }

    public function destroy($id)
    {
        return $this->ch->delete($id);
    }

    public function gc($maxlifetime)
    {
        # TODO: add garbage handling.  Or do we just let Elasticache handle it?
        return true;
    }
}
