<?php

declare(strict_types=1);

namespace yp;

use Nyg\Holiday;

class Ypdate
{
    public function index()
    {
        $time = time();
        return $time;
    }
}
