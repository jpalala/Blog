<?php

namespace App\Services;

use App\Services\Contracts\GitHubOAuthConfigInterface;

class GitHubOAuthConfig implements GitHubOAuthConfigInterface
{
    protected string $clientId;
    protected string $clientSecret;
    protected string $redirectUri;

    public function __construct(string $clientId, string $clientSecret, string $redirectUri)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUri = $redirectUri;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }
}

