<?php

/**
 * @package filesystem-factory
 * @link https://github.com/bayfrontmedia/filesystem-factory
 * @author John Robinson <john@bayfrontmedia.com>
 * @copyright 2020 Bayfront Media
 */

namespace Bayfront\Filesystem\Adapters;

use Bayfront\ArrayHelpers\Arr;
use Bayfront\Filesystem\AdapterInterface;
use Bayfront\Filesystem\Exceptions\ConfigurationException;
use League\Flysystem\Sftp\SftpAdapter as Adapter;

/*
 * SFTP adapter
 *
 * See: https://flysystem.thephpleague.com/v1/docs/adapter/sftp/
 */

class Sftp implements AdapterInterface
{

    private static $required_config_keys = [ // Required config keys in "dot" notation
        'host',
        'username',
        'password'
    ];

    /**
     * Create Adapter object.
     *
     * @param array $config
     *
     * @return Adapter
     *
     * @throws ConfigurationException
     *
     */

    public static function create(array $config): Adapter
    {

        if (Arr::isMissing(Arr::dot($config), self::$required_config_keys)) {

            throw new ConfigurationException('Invalid storage adapter configuration');
        }

        return new Adapter($config);

    }

}