<?php
/**
 * Configuration
 * PHP version 7.3
 *
 * @category Class
 * @package  Pipedrive
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Pipedrive API v1
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 1.0.0
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.3.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Pipedrive;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Utils;
use InvalidArgumentException;
use Pipedrive\Exceptions\OAuthProviderException;

/**
 * Configuration Class Doc Comment
 * PHP version 7.3
 *
 * @category Class
 * @package  Pipedrive
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class Configuration
{
    /**
     * @var Configuration
     */
    private static Configuration $defaultConfiguration;
    /**
     * Callback function to be called on token update
     *
     * @var callable
     */
    protected $oAuthTokenUpdateCallback;
    /**
     * App authorization page to redirect the user to
     *
     * @var string
     */
    protected string $authorizationPageUrl = '';
    /**
     * Client ID for OAuth/Bearer authentication
     *
     * @var string
     */
    protected string $clientId = '';
    /**
     * Client secret for OAuth/Bearer authentication
     *
     * @var string
     */
    protected string $clientSecret = '';
    /**
     * Oauth redirect URI for OAuth/Bearer authentication
     *
     * @var string
     */
    protected string $oauthRedirectUri = '';
    /**
     * Associate array to store API key(s)
     *
     * @var string[]
     */
    protected array $apiKeys = [];
    /**
     * Associate array to store API prefix (e.g. Bearer)
     *
     * @var string[]
     */
    protected array $apiKeyPrefixes = [];
    /**
     * Access token for OAuth/Bearer authentication
     *
     * @var string
     */
    protected string $accessToken = '';
    /**
     * The host of the OAuth flow
     *
     * @var string
     */
    protected string $oAuthHost = 'https://oauth.pipedrive.com';
    /**
     * The host, to access the company DC without rerouting, use the api_domain gotten from oauth token response
     *
     * @var string
     */
    protected string $host = 'https://api.pipedrive.com/v1';
    /**
     * User agent of the HTTP request, set to "OpenAPI-Generator/{version}/PHP" by default
     *
     * @var string
     */
    protected string $userAgent = 'OpenAPI-Generator/1.0.0/PHP';

    /**
     * Debug switch (default set to false)
     *
     * @var bool
     */
    protected bool $debug = false;
    /**
     * Timestamp of when the access token expires at
     *
     * @var int
     */
    protected int $expiresAt = -1;
    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected string $debugFile = 'php://output';
    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected string $tempFolderPath;
    /**
     * Time in seconds in which the access token expires in
     *
     * @var int
     */
    protected int $expiresIn = -1;
    /**
     * OAuth2 refresh token with which to get new access tokens with
     *
     * @var string
     */
    protected string $refreshToken = '';
    /**
     * Scopes available to the access token.
     *
     * @var string
     * @example "base,deals:full,mail:full,activities:read,contacts:read,products:read,users:read,recents:read,search:read,leads:read"
     */
    protected string $scope = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tempFolderPath = sys_get_temp_dir();
    }

    /**
     * Gets the default configuration instance
     *
     * @return Configuration
     */
    public static function getDefaultConfiguration(): Configuration
    {
        if (!isset(self::$defaultConfiguration)) {
            self::$defaultConfiguration = new Configuration();
        }

        return self::$defaultConfiguration;
    }

    /**
     * Sets the default configuration instance
     *
     * @param Configuration $config An instance of the Configuration Object
     *
     * @return void
     */
    public static function setDefaultConfiguration(Configuration $config)
    {
        self::$defaultConfiguration = $config;
    }

    /**
     * @return callable
     */
    public function getOAuthTokenUpdateCallback(): callable
    {
        return $this->oAuthTokenUpdateCallback;
    }

    /**
     * @param callable $oAuthTokenUpdateCallback
     * @return Configuration
     */
    public function setOAuthTokenUpdateCallback(callable $oAuthTokenUpdateCallback): Configuration
    {
        $this->oAuthTokenUpdateCallback = $oAuthTokenUpdateCallback;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorizationPageUrl(): string
    {
        $oauthHost = $this->getOAuthHost();
        $clientId = $this->getClientId();
        $oauthRedirectUri = $this->getOauthRedirectUri();

        return "{$oauthHost}/oauth/authorize?client_id={$clientId}&redirect_uri={$oauthRedirectUri}";
    }

    /**
     * @param string $authorizationPageUrl
     * @return Configuration
     */
    public function setAuthorizationPageUrl(string $authorizationPageUrl): Configuration
    {
        $this->authorizationPageUrl = $authorizationPageUrl;
        return $this;
    }

    /**
     * Gets the client ID for OAuth
     *
     * @return string client ID for OAuth
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * Sets the client ID for OAuth
     *
     * @param string $clientId for OAuth
     *
     * @return Configuration
     */
    public function setClientId(string $clientId): Configuration
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * Gets the client secret for OAuth
     *
     * @return string client secret for OAuth
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * Sets the client secret for OAuth
     *
     * @param string $clientSecret for OAuth
     *
     * @return Configuration
     */
    public function setClientSecret(string $clientSecret): Configuration
    {
        $this->clientSecret = $clientSecret;
        return $this;
    }

    /**
     * @return string
     */
    public function getOauthRedirectUri(): string
    {
        return $this->oauthRedirectUri;
    }

    /**
     * @param string $oauthRedirectUri
     * @return Configuration
     */
    public function setOauthRedirectUri(string $oauthRedirectUri): Configuration
    {
        $this->oauthRedirectUri = $oauthRedirectUri;
        return $this;
    }

    /**
     * Gets API key
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     *
     * @return null|string API key or token
     */
    public function getApiKey(string $apiKeyIdentifier): ?string
    {
        return $this->apiKeys[$apiKeyIdentifier] ?? null;
    }

    /**
     * Sets API key
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $key API key or token
     *
     * @return Configuration
     */
    public function setApiKey(string $apiKeyIdentifier, string $key): Configuration
    {
        $this->apiKeys[$apiKeyIdentifier] = $key;
        return $this;
    }

    /**
     * Gets API key prefix
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     *
     * @return null|string
     */
    public function getApiKeyPrefix(string $apiKeyIdentifier): ?string
    {
        return $this->apiKeyPrefixes[$apiKeyIdentifier] ?? null;
    }

    /**
     * Sets the prefix for API key (e.g. Bearer)
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $prefix API key prefix, e.g. Bearer
     *
     * @return Configuration
     */
    public function setApiKeyPrefix(string $apiKeyIdentifier, string $prefix): Configuration
    {
        $this->apiKeyPrefixes[$apiKeyIdentifier] = $prefix;
        return $this;
    }

    /**
     * Gets the access token for OAuth
     *
     * @return string Access token for OAuth
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * Sets the access token for OAuth
     *
     * @param string $accessToken Token for OAuth
     *
     * @return Configuration
     */
    public function setAccessToken(string $accessToken): Configuration
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getOAuthHost(): string
    {
        return $this->oAuthHost;
    }

    /**
     * @param string $oAuthHost
     *
     * @return Configuration
     */
    public function setOAuthHost(string $oAuthHost): Configuration
    {
        $this->oAuthHost = $oAuthHost;
        return $this;
    }

    /**
     * Gets the host
     *
     * @return string Host
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * Sets the host
     *
     * @param string $host Host
     *
     * @return Configuration
     */
    public function setHost(string $host): Configuration
    {
        $this->host = $host;
        return $this;
    }

    /**
     * Gets the user agent of the api client
     *
     * @return string user agent
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * Sets the user agent of the api client
     *
     * @param string $userAgent the user agent of the api client
     *
     * @throws InvalidArgumentException
     * @return Configuration
     */
    public function setUserAgent(string $userAgent): Configuration
    {
        if (!is_string($userAgent)) {
            throw new InvalidArgumentException('User-agent must be a string.');
        }

        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * Gets the debug flag
     *
     * @return bool
     */
    public function getDebug(): bool
    {
        return $this->debug;
    }

    /**
     * Sets debug flag
     *
     * @param bool $debug Debug flag
     *
     * @return Configuration
     */
    public function setDebug(bool $debug): Configuration
    {
        $this->debug = $debug;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpiresAt(): int
    {
        return $this->expiresAt;
    }

    /**
     * @param int $expiresAt
     *
     * @return Configuration
     */
    public function setExpiresAt(int $expiresAt): Configuration
    {
        $this->expiresAt = $expiresAt;
        return $this;
    }

    /**
     * Gets the debug file
     *
     * @return string
     */
    public function getDebugFile(): string
    {
        return $this->debugFile;
    }

     /**
      * Sets the debug file
      *
      * @param string $debugFile Debug file
      *
      * @return Configuration
      */
    public function setDebugFile(string $debugFile): Configuration
    {
        $this->debugFile = $debugFile;
        return $this;
    }

    /**
     * Gets the temp folder path
     *
     * @return string Temp folder path
     */
    public function getTempFolderPath(): string
    {
        return $this->tempFolderPath;
    }

    /**
     * Sets the temp folder path
     *
     * @param string $tempFolderPath Temp folder path
     *
     * @return Configuration
     */
    public function setTempFolderPath(string $tempFolderPath): Configuration
    {
        $this->tempFolderPath = $tempFolderPath;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpiresIn(): int
    {
        return $this->expiresIn;
    }

    /**
     * @param int $expiresIn
     * @return Configuration
     */
    public function setExpiresIn(int $expiresIn): Configuration
    {
        $this->expiresIn = $expiresIn;
        return $this;
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    /**
     * @param string $refreshToken
     * @return Configuration
     */
    public function setRefreshToken(string $refreshToken): Configuration
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getScope(): string
    {
        return $this->scope;
    }

    /**
     * @param string $scope
     * @return Configuration
     */
    public function setScope(string $scope): Configuration
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRefreshPossible(): bool
    {
        if ($this->getClientId() === '' ||
            $this->getClientSecret() === '' ||
            $this->getOauthRedirectUri() === '' ||
            $this->getRefreshToken() === '') {
            return false;
        }
        return true;
    }

    /**
     * Refreshes the OAuth 2 access token
     * @return object The OAuth 2 token
     * @throws OAuthProviderException
     */
    public function refreshToken(): object
    {
        $client = new Client();

        try {
            $response = $client->request('POST', $this->getOAuthHost().'/oauth/token', [
                'form_params' => [
                    'client_id' => $this->getClientId(),
                    'client_secret' => $this->getClientSecret(),
                    'redirect_uri' => $this->getOauthRedirectUri(),
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $this->getRefreshToken(),
                ]
            ]);

            $oauthToken = (object) Utils::jsonDecode($response->getBody()->getContents());

            $this->updateOAuthRelatedFields($oauthToken);

            return $oauthToken;
        } catch (RequestException $e) {
            throw new OAuthProviderException(
                "[{$e->getCode()}] {$e->getMessage()}",
                (int) $e->getCode(),
                $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                $e->getResponse() ? (string) $e->getResponse()->getBody() : null
            );
        } catch (GuzzleException | Exception $e) {
            throw new OAuthProviderException($e->getMessage(), (int) $e->getCode());
        }
    }

    /**
     * A utility function to set the OAuth2 relevant fields using data from the response of the token endpoint
     * The fields set in $this of they exist in the passed in object:
     *      $this->expiresIn, $this->expiresAt, $this->accessToken, $this->refreshToken, $this->scope, $this->host
     *
     * The passed in oAuthToken should have the following structure
     * <code>
     * $access_token
     * $expires_in
     * $refresh_token
     * $scope
     * $api_domain
     * </code>
     *
     * @param object $oAuthToken The token returned by the /token endpoint (See above)
     * @return Configuration
     */
    public function updateOAuthRelatedFields(object $oAuthToken): Configuration
    {
        if (property_exists($oAuthToken, 'expires_in') && $oAuthToken->expires_in !== null && $oAuthToken->expires_in != 0) {
            $this->setExpiresAt(time() + $oAuthToken->expires_in);
            $this->setExpiresIn($oAuthToken->expires_in);
        }

        if (property_exists($oAuthToken, 'access_token') && $oAuthToken->access_token !== null) {
            $this->setAccessToken($oAuthToken->access_token);
        }

        if (property_exists($oAuthToken, 'refresh_token') && $oAuthToken->refresh_token !== null) {
            $this->setRefreshToken($oAuthToken->refresh_token);
        }

        if (property_exists($oAuthToken, 'scope') && $oAuthToken->scope !== null) {
            $this->setScope($oAuthToken->scope);
        }

        if (property_exists($oAuthToken, 'api_domain') && $oAuthToken->api_domain !== null) {
            $this->setHost($oAuthToken->api_domain.'/v1');
        }

        if (is_callable($this->getOAuthTokenUpdateCallback())) {
            call_user_func($this->getOAuthTokenUpdateCallback(), $oAuthToken);
        }

        return $this;
    }

    /**
     * Authorizes the authorization code sent by the server and returns OAuth 2 token
     * @param string $code Authorization code for the OAuth token
     * @return object
     * @throws OAuthProviderException
     */
    public function authorize(string $code): object
    {
        $client = new Client();

        try {
            $response = $client->request('POST', $this->getOAuthHost() . '/oauth/token', [
                'form_params' => [
                    'code' => $code,
                    'client_id' => $this->getClientId(),
                    'client_secret' => $this->getClientSecret(),
                    'redirect_uri' => $this->getOauthRedirectUri(),
                    'grant_type' => 'authorization_code'
                ]
            ]);

            $oAuthToken = (object) Utils::jsonDecode($response->getBody()->getContents());

            $this->updateOAuthRelatedFields($oAuthToken);

            return $oAuthToken;
        } catch (RequestException $e) {
            throw new OAuthProviderException(
                "[{$e->getCode()}] {$e->getMessage()}",
                (int) $e->getCode(),
                $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                $e->getResponse() ? (string) $e->getResponse()->getBody() : null
            );
        } catch (GuzzleException | Exception $e) {
            throw new OAuthProviderException($e->getMessage(), (int) $e->getCode());
        }
    }

    /**
     * Revoke the Refresh Token aka marking an app as uninstalled, or revoke the Access Token
     * @param string $tokenTypeHint optional token type to be revoked, values can be 'access_token' or 'refresh_token'
     * @return void
     * @throws OAuthProviderException
     */
    public function revokeToken(string $tokenTypeHint = 'access_token'): void
    {
        $token = $tokenTypeHint === 'refresh_token' ? $this->getRefreshToken() : $this->getAccessToken();

        $client = new Client();

        try {
            $client->request('POST', $this->getOAuthHost() . '/oauth/revoke', [
                'form_params' => [
                    'client_id' => $this->getClientId(),
                    'client_secret' => $this->getClientSecret(),
                    'token_type_hint' => $tokenTypeHint,
                    'token' => $token
                ]
            ]);
        } catch (RequestException $e) {
            throw new OAuthProviderException(
                "[{$e->getCode()}] {$e->getMessage()}",
                (int) $e->getCode(),
                $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                $e->getResponse() ? (string) $e->getResponse()->getBody() : null
            );
        } catch (GuzzleException | Exception $e) {
            throw new OAuthProviderException($e->getMessage(), (int) $e->getCode());
        }
    }

    /**
     * Gets the essential information for debugging
     *
     * @return string The report for debugging
     */
    public static function toDebugReport(): string
    {
        $report  = 'PHP SDK (Pipedrive) Debug Report:' . PHP_EOL;
        $report .= '    OS: ' . php_uname() . PHP_EOL;
        $report .= '    PHP Version: ' . PHP_VERSION . PHP_EOL;
        $report .= '    The version of the OpenAPI document: 1.0.0' . PHP_EOL;
        $report .= '    Temp Folder Path: ' . self::getDefaultConfiguration()->getTempFolderPath() . PHP_EOL;

        return $report;
    }

    /**
     * Get API key (with prefix if set)
     *
     * @param string $apiKeyIdentifier name of apikey
     *
     * @return null|string API key with the prefix
     */
    public function getApiKeyWithPrefix(string $apiKeyIdentifier): ?string
    {
        $prefix = $this->getApiKeyPrefix($apiKeyIdentifier);
        $apiKey = $this->getApiKey($apiKeyIdentifier);

        if ($apiKey === null) {
            return null;
        }

        if ($prefix === null) {
            $keyWithPrefix = $apiKey;
        } else {
            $keyWithPrefix = $prefix . ' ' . $apiKey;
        }

        return $keyWithPrefix;
    }

    /**
     * Returns URL based on the index and variables
     *
     * @param int $index index of the host settings
     * @param array<string, mixed>|null $variables hash of variable and the corresponding value (optional)
     * @return string URL based on host settings
     */
    public function getHostFromSettings(int $index, ?array $variables = null): string
    {
        if (null === $variables) {
            $variables = [];
        }

        $hosts = $this->getHostSettings();

        // check array index out of bound
        if ($index < 0 || $index >= sizeof($hosts)) {
            throw new \InvalidArgumentException("Invalid index $index when selecting the host. Must be less than ".sizeof($hosts));
        }

        $host = $hosts[$index];
        $url = $host["url"];

        if (is_array($host["variables"])) {
            // go through variable and assign a value
            foreach ($host["variables"] as $name => $variable) {
                if (array_key_exists($name, $variables)) { // check to see if it's in the variables provided by the user
                    if (in_array($variables[$name], $variable["enum_values"], true)) { // check to see if the value is in the enum
                        $url = str_replace("{" . $name . "}", $variables[$name], $url);
                    } else {
                        throw new \InvalidArgumentException("The variable `$name` in the host URL has invalid value ".$variables[$name].". Must be ".join(',', $variable["enum_values"]).".");
                    }
                } else {
                    // use default value
                    $url = str_replace("{" . $name . "}", $variable["default_value"], $url);
                }
            }
        }

        return $url;
    }

    /**
    * Returns an array of host settings
    *
    * @return array<array<string>> of host settings
    */
    public function getHostSettings(): array
    {
        return [
            [
                "url" => "https://api.pipedrive.com/v1",
                "description" => "No description provided",
            ]
        ];
    }
}