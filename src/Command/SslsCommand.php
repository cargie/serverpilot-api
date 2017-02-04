<?php

namespace ServerPilot\Command;

use ServerPilot\Model\Ssl;
use ServerPilot\Base\BaseCommand;

/**
 * An extension of the base command object for app-related operations.
 */
class SslsCommand extends BaseCommand
{
    /**
     * Constructs the object upon instantiation.
     */
    public function __construct($name = 'ssl', $method = 'apps')
    {
        // Construct Parent:

        parent::__construct($name, $method);

        // Construct Object:

        $this->setModel('Ssl');
    }

    public function get($appid)
    {
        return $this->api()->get($this, array(
            (string) $appid,
            'ssl',
        ));
    }

    /**
     * Creates a new app with the specified name and details.
     *
     * @param string $name
     * @param string $sysuserid
     * @param string $runtime
     * @param array $domains
     * @param array $wordpress
     * @return App
     */
    public function create($appid, $key, $cert, $cacerts)
    {
        return $this->api()->post(
            $this,
            array(
                $appid,
                'ssl',
            ),
            array(
                'key'     => (string) $key,
                'cert'    => (string) $cert,
                'cacerts' => (string) $cacerts,
            )
        );
    }

    public function auto($appid)
    {
        return $this->api()->post(
            $this,
            [
                $appid,
                'ssl',
            ],
            array(
                'auto' => true,
            )
        );
    }

    public function force($appid, $boolean)
    {
        return $this->api()->post(
            $this,
            [
                $appid,
                'ssl',
            ],
            array(
                'force' => (bool) $boolean,
            )
        );
    }

    /**
     * Deletes the app with the specified ID.
     *
     * @param string $id
     * @return boolean
     */
    public function delete($id)
    {
        return $this->api()->delete($this);
    }
}
