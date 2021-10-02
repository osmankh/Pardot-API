<?php

namespace CyberDuck\PardotApi\Query;

use CyberDuck\PardotApi\Traits\CanRead;

/**
 * List Query object representation
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
class ListsQuery extends Query
{
    use CanRead;

    /**
     * Object name
     *
     * @var string
     */
    protected $object = 'list';
}