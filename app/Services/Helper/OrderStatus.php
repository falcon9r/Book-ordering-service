<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 31.01.2023
 * Time: 11:04
 */

namespace  App\Services\Helper;

class OrderStatus
{
    const REQUESTED = 1;
    const ACCEPTED = 2;
    const SERVED = 3;
    const CANCELLED = 4;
}