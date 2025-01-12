<?php

namespace App\Http\Controllers;

use App\Services\Contracts\GitHubOAuthConfigInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    protected GitHubOAuthConfigInterface $config;

    public function __construct(GitHubOAuthConfigInterface $config)
    {
        $this->config = $config;
    }

    public function redirectToGitHub()
    {
        $url = "https://github.com/login/oauth/authorize?" . http_build_query([
            'client_id' =>  $this->config->getClientId(),
            'redirect_uri' =>  $this->config->getRedirectUri(),
            'scope' => 'read:user user:email',
            'allow_signup' => 'true',
        ]);

        return redirect($url);
    }

    public function handleGitHubCallback(Request $request)
    {
        $code = $request->get('code');

        if (!$code) {
            return redirect('/')->with('error', 'GitHub login failed.');
        }

        // Exchange the authorization code for an access token
        $response = Http::post('https://github.com/login/oauth/access_token', [
            'client_id' => $this->config->getClientId(),
            'client_secret' => $this->config->getClientSecret(),
            'code' => $code,
            'redirect_uri' => $this->config->getRedirectUri(),
        ]);

        $accessToken = collect(explode('&', $response->body()))
            ->mapWithKeys(function ($pair) {
                [$key, $value] = explode('=', $pair);
                return [$key => $value];
            })->get('access_token');

        // Use the access token to fetch the user's details
        $userResponse = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ])->get('https://api.github.com/user');

        $githubUser = $userResponse->json();

        // Fetch the user's email
        $emailsResponse = Http::withHeaders([
            'Authorization' => "Bearer {$accessToken}",
        ])->get('https://api.github.com/user/emails');

        $emails = collect($emailsResponse->json());
        $primaryEmail = $emails->where('primary', true)->first()['email'] ?? null;

        // Find or create a user in your database
        $user = User::updateOrCreate(
            ['github_id' => $githubUser['id']],
            [
                'name' => $githubUser['name'] ?? $githubUser['login'],
                'email' => $primaryEmail,
                'avatar' => $githubUser['avatar_url'],
                'github_token' => $accessToken,
            ]
        );

        // Log the user in
        Auth::login($user);

        return redirect('/dashboard'); // Redirect to a secure page
    }
}

