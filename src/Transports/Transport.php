<?php

declare(strict_types=1);

namespace EmailFramework\Transports;

use EmailFramework\Core\Email;

interface Transport
{
    public function send(Email $email): void;
}
