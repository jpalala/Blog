<?php

namespace App\Services\Contracts;

interface GitHubOAuthConfigInterface
{
    public function getClientId(): string;
    public function getClientSecret(): string;
    public function getRedirectUri(): string;
}
