<?php

declare(strict_types=1);

namespace EmailFramework\Core;

class Address
{
    public function __construct(
        private string $email,
        private ?string $name = null
    ) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email address: {$email}");
        }
    }

    public function getEmail(): string { return $this->email; }
    public function getName(): ?string { return $this->name; }
    
    public function toString(): string
    {
        return $this->name ? "{$this->name} <{$this->email}>" : $this->email;
    }
    
    public function __toString(): string { return $this->toString(); }
}