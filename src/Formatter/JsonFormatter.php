<?php

namespace CyberDuck\PardotApi\Formatter;

use Exception;
use stdClass;

/**
 * JSON Formatter
 * 
 * @category   PardotApi
 * @package    PardotApi
 * @author     Andrew Mc Cormack <andy@cyber-duck.co.uk>
 * @copyright  Copyright (c) 2018, Andrew Mc Cormack
 * @license    https://github.com/cyber-duck/pardot-api/license
 * @version    1.0.0
 * @link       https://github.com/cyber-duck/pardot-api
 * @since      1.0.0
 */
class JsonFormatter
{
    /**
     * Input data
     *
     * @var string
     */
    private $data;

    /**
     * Required property name
     *
     * @var string
     */
    private $property;

    /**
     * Sets the required properties
     *
     * @param string $data
     * @param string $property
     */
    public function __construct(string $data, string $property)
    {
        $this->data = $data;
        $this->property = $property;
    }

    /**
     * Returns the formatted output data
     *
     * @return stdClass
     */
    public function getData(): stdClass
    {
        $data = json_decode($this->data);

        if(!is_object($data)) {
            $message = 'Pardot API error: invalid response';
            if($this->api->getDebug() === true) {
                echo $message;
                die;
            }
            throw new Exception($message);
        }
        if(property_exists($data, 'err')) {
            $message = sprintf('Pardot API error: %s', $data->err);
            if($this->api->getDebug() === true) {
                echo $message;
                die;
            }
            throw new Exception($message);
        }
        if(!property_exists($data, $this->property)) {
            $message = sprintf('Pardot API error: cannot find property %s in response', $this->property);
            if($this->api->getDebug() === true) {
                echo $message;
                die;
            }
            throw new Exception($message);
        }
        return $data;
    }
}