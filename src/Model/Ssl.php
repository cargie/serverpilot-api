<?php

namespace ServerPilot\Model;

use ServerPilot\Base\BaseModel;

class Ssl extends BaseModel
{
    protected $appId;
    protected $key;
    protected $auto;
    protected $csr;
    protected $cert;
    protected $cacerts;
    protected $force;

    public function __construct()
    {
        // Construct Parent:

        parent::__construct();

        // Construct Object:
    }

    public function getAppID()
    {
        return $this->appId;
    }

    public function setAppID($appId)
    {
        $this->appId = (string) $appId;

        return $this;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setKey($key)
    {
        $this->key = (string) $key;

        return $this;
    }

    public function getCert()
    {
        return $this->cert;
    }

    public function setCert($cert)
    {
        $this->cert = (string) $cert;

        return $this;
    }

    public function getCsr()
    {
        return $this->csr;
    }

    public function setCsr($csr)
    {
        $this->csr = (string) $csr;

        return $this;
    }

    public function getCacerts()
    {
        return $this->cacerts;
    }

    public function setCacerts($cacerts)
    {
        $this->cacerts = (string) $cacerts;

        return $this;
    }

    public function getAuto()
    {
        return (bool) $this->auto;
    }

    public function setAuto($auto)
    {
        $this->auto = (bool) $auto;

        return $this;
    }

    public function getForce()
    {
        return (bool) $this->force;
    }

    public function setForce($force)
    {
        $this->force = (bool) $force;

        return $this;
    }

    public function getApp()
    {
        return $this->command('App')->get($this->appId);
    }

    public function fromData($data = array())
    {
        $this->setAuto($data['auto']);
        $this->setForce($data['force']);
        $this->setCsr($data['csr']);
        $this->setCert($data['cert']);
        $this->setCacerts($data['cacerts']);
        $data['id'] = $this->getAppID();
        
        return parent::fromData($data);
    }
}
