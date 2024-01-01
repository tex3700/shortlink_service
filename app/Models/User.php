<?php

namespace Models;

class User
{
    private string $username;
    private int $id;

    public function __construct(string $username = "")
    {
        $this->username = $username;
    }
    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}