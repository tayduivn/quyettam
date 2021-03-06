<?php
/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/


require_once('include/oauth2-php/lib/IOAuth2Storage.php');
require_once('include/oauth2-php/lib/IOAuth2GrantUser.php');
require_once('include/oauth2-php/lib/IOAuth2RefreshTokens.php');

require_once('modules/Administration/SessionManager.php');

require_once('include/api/SugarApiException.php');

require_once 'include/SugarOAuth2/SugarOAuth2StorageInterface.php';

/**
 * Sugar OAuth2.0 Storage system, allows the OAuth2 library we are using to
 * store and retrieve data.
 * This class should only be used by the OAuth2 library and cannot be relied
 * on as a stable API for any other sources.
 */
class SugarOAuth2Storage implements IOAuth2GrantUser, IOAuth2RefreshTokens, SugarOAuth2StorageInterface {
    /**
     * The client platform
     *
     * @var string
     */
    protected $platform = 'base';

    /**
     * The platform specific storage object
     *
     * @var SugarOAuth2StoragePlatform
     */
    protected $platformStore;

    /**
     * The SugarCRM User record for this user
     * @var User
     */
    protected $userBean;

    /**
     * The record of the OAuth Key based off of the user's supplide client_id
     * @var OAuthKeys
     */
    protected $oauthKeyRecord;

    /**
     * The user type for this client
     *
     * @var string
     */
    protected $userType;

    // BEING METHOD FROM SugarOAuth2StorageInterface
    /**
     * Get the user type for this user
     *
     * @return string
     */
    public function getUserType() {
        return $this->getPlatformStore()->getUserType();
    }


    /**
     * Gets a user bean
     *
     * @param  string $user_id The ID of the User to get
     * @return User
     */
    public function getUserBean($user_id) {
        return $this->getPlatformStore()->getUserBean($user_id);
    }

    /**
     * Small validator for child classes to use to determine whether a session can
     * be written to
     *
     * @return boolean
     */
    public function canStartSession() {
        return $this->getPlatformStore()->canStartSession();
    }

    /**
     * Fills in any added session data needed by this client type
     *
     * This method is used by child classes like portal
     */
    public function fillInAddedSessionData() {
        return $this->getPlatformStore()->fillInAddedSessionData();
    }

    /**
     * Gets the authentication bean for a given client
     * @param OAuthToken
     * @return mixed
     */
    public function getAuthBean(OAuthToken $token) {
        return $this->getPlatformStore()->getAuthBean($token);
    }

    /**
     * Gets contact and user ids for a user id. Most commonly different for clients
     * like portal
     *
     * @param string $client_id The client id for this check
     * @return array An array of contact_id and user_id
     */
    public function getIdsForUser($user_id, $client_id) {
        return $this->getPlatformStore()->getIdsForUser($user_id, $client_id);
    }

    /**
     * Sets up necessary visibility for a client. Not all clients will set this
     *
     * @return void
     */
    public function setupVisibility() {
        $this->getPlatformStore()->setupVisibility();
    }

    // END METHOD FROM SugarOAuth2StorageInterface

    /**
     * Sets the platform type. This should be called before any calls to platform
     * specific methods and as soon after instantiation of this object as possible.
     * This will create the platform store object as well, which, once set, cannot
     * be unset.
     *
     * @param string $platform
     */
    public function setPlatform($platform) {
        $this->platform = $platform;
        $this->setPlatformStore($platform);
    }

    /**
     * Gets the platform name of the given storage mechanism
     *
     * @return string
     */
    public function getPlatformName() {
        return $this->platform;
    }

    // BEGIN METHODS FROM IOAuth2Storage
	/**
	 * Make sure that the client credentials is valid.
	 *
	 * @param $client_id
	 * Client identifier to be check with.
	 * @param $client_secret
	 * (optional) If a secret is required, check that they've given the right one.
	 *
	 * @return
	 * TRUE if the client credentials are valid, and MUST return FALSE if it isn't.
	 * @endcode
	 *
	 * @see http://tools.ietf.org/html/draft-ietf-oauth-v2-20#section-3.1
	 *
	 * @ingroup oauth2_section_3
	 */
	public function checkClientCredentials($client_id, $client_secret = NULL)
    {
        $clientInfo = $this->getClientDetails($client_id);
        if ($clientInfo === false) {
            return false;
        }

        if ( ( !empty($clientInfo['client_secret']) && $client_secret == $clientInfo['client_secret'] )
             || (empty($clientInfo['client_secret']) && empty($client_secret)) ) {
            return true;
        } else {
            return false;
        }

    }

	/**
	 * Get client details corresponding client_id.
	 *
	 * OAuth says we should store request URIs for each registered client.
	 * Implement this function to grab the stored URI for a given client id.
	 *
	 * @param $client_id
	 * Client identifier to be check with.
	 *
	 * @return array
	 * Client details. Only mandatory item is the "registered redirect URI", and MUST
	 * return FALSE if the given client does not exist or is invalid.
	 *
	 * @ingroup oauth2_section_4
	 */
	public function getClientDetails($client_id)
    {
        // Get the client bean for this client id
        if ( isset($this->oauthKeyRecord) && $this->oauthKeyRecord->c_key == $client_id ) {
            $clientBean = $this->oauthKeyRecord;
        } else {
            $clientSeed = BeanFactory::newBean('OAuthKeys');
            $clientBean = $clientSeed->fetchKey($client_id,'oauth2');

            $this->oauthKeyRecord = $clientBean;
        }

        // Auto-create beans for "sugar" client only as it doesn't exist yet
        if ( $clientBean == null ) {
            if ($client_id != 'sugar') {
                return false;
            }

            $newKey = BeanFactory::newBean('OAuthKeys');
            $newKey->oauth_type = 'oauth2';
            $newKey->c_secret = '';
            $newKey->client_type = 'user';
            $newKey->c_key = 'sugar';
            $newKey->name = 'Standard OAuth Username & Password Key';
            $newKey->description = 'This OAuth key is automatically created by the OAuth2.0 system to enable username and password logins';
            $newKey->save();

            // Set the client bean/authkey record
            $clientBean = $newKey;
            $this->oauthKeyRecord = $clientBean;
        }

        // Add platform validation to this return. We have a bean and the bean
        // client key is either sugar OR the client type matches the named type
        // of the storage. For now this assumes a one-to-one mapping of oauthkey
        // client_type to the client type in an oauth2storage class
        $clientAllowed = $clientBean != null &&
                         (
                             $clientBean->client_type == 'user' ||
                             (($clientType = $this->getPlatformStore()->getClientType()) !== null && $clientBean->client_type == $clientType)
                         );
        if ($clientAllowed) {
            // Other than redirect_uri, there isn't a lot of docs on what else to return here
            $returnData = array('redirect_uri'=>'',
                                'client_id'=>$clientBean->c_key,
                                'client_secret'=>$clientBean->c_secret,
                                'client_type'=>$clientBean->client_type,
                                'record_id'=>$clientBean->id,
            );
            return $returnData;
        }

        // If we get here we didn't meet all the necessary checks
        return false;
    }

	/**
	 * Look up the supplied oauth_token from storage.
	 *
	 * We need to retrieve access token data as we create and verify tokens.
	 *
	 * @param $oauth_token
	 * oauth_token to be check with.
	 *
	 * @return
	 * An associative array as below, and return NULL if the supplied oauth_token
	 * is invalid:
	 * - client_id: Stored client identifier.
	 * - expires: Stored expiration in unix timestamp.
	 * - scope: (optional) Stored scope values in space-separated string.
	 *
	 * @ingroup oauth2_section_7
	 */
	public function getAccessToken($oauth_token)
    {
        if ( session_id() != '' ) {
            // There is already a session, let's see if it's the same one
            if ( session_id() != $oauth_token ) {
                // Oh, we are in trouble, we have a session and it's the wrong one.
                // Let's close this session and start a new one with the correct ID.
                session_write_close();
            }
        }
        session_id($oauth_token);
        // Disable cookies
        ini_set("session.use_cookies",false);
        session_start();

        // Set the platform store
        $this->setPlatformStore();

        if ( isset($_SESSION['oauth2']) ) {
            return $_SESSION['oauth2'];
        } else if ( !empty($_SESSION['authenticated_user_id']) ) {
            // It's not an oauth2 session, but a normal sugar session we will let them pass
            return array(
                'client_id'=>'sugar',
                'user_id'=>$_SESSION['authenticated_user_id'],
                'expires'=>(time()+7200), // Fake an expiration way off in the future
            );
        } else {
            return NULL;
        }
    }

	/**
	 * Store the supplied access token values to storage.
	 *
	 * We need to store access token data as we create and verify tokens.
	 *
	 * @param $oauth_token
	 * oauth_token to be stored.
	 * @param $client_id
	 * Client identifier to be stored.
	 * @param $user_id
	 * User identifier to be stored.
	 * @param $expires
	 * Expiration to be stored.
	 * @param $scope
	 * (optional) Scopes to be stored in space-separated string.
	 *
	 * @ingroup oauth2_section_4
	 */
	public function setAccessToken($oauth_token, $client_id, $user_id, $expires, $scope = NULL)
    {
        global $sugar_config;

        $clientInfo = $this->getClientDetails($client_id);
        if ( $clientInfo === false ) {
            return false;
        }

        // Get the user bean if there is one to be found
        $userBean = $this->getUserBean($user_id);

        if ( $userBean == null ) {
            return false;
        }
        $this->userBean = $userBean;
        $this->userType = $this->getUserType();

        // Handle the session now
        if ( session_id() != '' && session_id() != $oauth_token ) {
            // Oh, we are in trouble, we have a session and it's the wrong one.
            // Let's close this session and start a new one with the correct ID.
            session_write_close();
        }
        session_id($oauth_token);
        // Disable cookies
        ini_set("session.use_cookies",false);
        session_start();
        // Clear out the old session data
        $_SESSION = array();

        // Since we have to setup the session for oauth2 here, we might as well
        // set up the rest of the session, but only if we have what is needed
        if ($this->canStartSession()) {
            $GLOBALS['current_user'] = $this->userBean;
            $_SESSION['is_valid_session'] = true;
            $_SESSION['ip_address'] = query_client_ip();
            $_SESSION['user_id'] = $this->userBean->id;
            $_SESSION['type'] = 'user';
            $_SESSION['authenticated_user_id'] = $this->userBean->id;
            $_SESSION['unique_key'] = $sugar_config['unique_key'];
            $_SESSION['platform'] = $this->platform;
            //$this->setPlatformStore($_SESSION['platform']);

            $this->fillInAddedSessionData();
            $_SESSION['oauth2'] = array(
                'client_id'=>$client_id,
                'user_id'=>$user_id,
                'expires'=>$expires,
            );

            return true;
        }

        throw new SugarApiException('Could not start session because client type was not found');
    }

	/**
	 * Check restricted grant types of corresponding client identifier.
	 *
	 * If you want to restrict clients to certain grant types, override this
	 * function.
	 *
	 * @param $client_id
	 * Client identifier to be check with.
	 * @param $grant_type
	 * Grant type to be check with, would be one of the values contained in
	 * OAuth2::GRANT_TYPE_REGEXP.
	 *
	 * @return
	 * TRUE if the grant type is supported by this client identifier, and
	 * FALSE if it isn't.
	 *
	 * @ingroup oauth2_section_4
	 */
	public function checkRestrictedGrantType($client_id, $grant_type)
    {
        return true;
    }

    // END METHODS FROM IOAuth2Storage


    // BEGIN METHODS FROM IOAuth2GrantUser
	/**
	 * Grant access tokens for basic user credentials.
	 *
	 * Check the supplied username and password for validity.
	 *
	 * You can also use the $client_id param to do any checks required based
	 * on a client, if you need that.
	 *
	 * Required for OAuth2::GRANT_TYPE_USER_CREDENTIALS.
	 *
	 * @param $client_id
	 * Client identifier to be check with.
	 * @param $username
	 * Username to be check with.
	 * @param $password
	 * Password to be check with.
	 *
	 * @return
	 * TRUE if the username and password are valid, and FALSE if it isn't.
	 * Moreover, if the username and password are valid, and you want to
	 * verify the scope of a user's access, return an associative array
	 * with the scope values as below. We'll check the scope you provide
	 * against the requested scope before providing an access token:
	 * @code
	 * return array(
	 * 'scope' => <stored scope values (space-separated string)>,
	 * );
	 * @endcode
	 *
	 * @see http://tools.ietf.org/html/draft-ietf-oauth-v2-20#section-4.3
	 *
	 * @ingroup oauth2_section_4
	 */
	public function checkUserCredentials($client_id, $username, $password)
    {
        return $this->getPlatformStore()->checkUserCredentials($this, $client_id, $username, $password);
    }
    // END METHODS FROM IOAuth2GrantUser

    // BEGIN METHODS FROM IOAuth2RefreshTokens
	/**
	 * Grant refresh access tokens.
	 *
	 * Retrieve the stored data for the given refresh token.
	 *
	 * Required for OAuth2::GRANT_TYPE_REFRESH_TOKEN.
	 *
	 * @param $refresh_token
	 * Refresh token to be check with.
	 *
	 * @return
	 * An associative array as below, and NULL if the refresh_token is
	 * invalid:
	 * - client_id: Stored client identifier.
	 * - expires: Stored expiration unix timestamp.
	 * - scope: (optional) Stored scope values in space-separated string.
	 *
	 * @see http://tools.ietf.org/html/draft-ietf-oauth-v2-20#section-6
	 *
	 * @ingroup oauth2_section_6
	 */
	public function getRefreshToken($refresh_token)
    {
        $tokenSeed = BeanFactory::newBean('OAuthTokens');
        $token = $tokenSeed->load($refresh_token,'oauth2');
        if ( empty($token) ) {
            return null;
        }

        // Get the auth bean
        $authBean = $this->getAuthBean($token);

        if ( $token === FALSE || $token->consumer_obj === FALSE || $authBean === null ) {
            return null;
        }

        return array(
            'refresh_token'=>$token->id,
            'client_id'=>$token->consumer_obj->c_key,
            'expires'=>$token->expire_ts,
            'user_id'=>$authBean->id,
        );
    }

	/**
	 * Take the provided refresh token values and store them somewhere.
	 *
	 * This function should be the storage counterpart to getRefreshToken().
	 *
	 * If storage fails for some reason, we're not currently checking for
	 * any sort of success/failure, so you should bail out of the script
	 * and provide a descriptive fail message.
	 *
	 * Required for OAuth2::GRANT_TYPE_REFRESH_TOKEN.
	 *
	 * @param $refresh_token
	 * Refresh token to be stored.
	 * @param $client_id
	 * Client identifier to be stored.
	 * @param $expires
	 * expires to be stored.
	 * @param $scope
	 * (optional) Scopes to be stored in space-separated string.
	 *
	 * @ingroup oauth2_section_6
	 */
	public function setRefreshToken($refresh_token, $client_id, $user_id, $expires, $scope = NULL)
    {
        $keyInfo = $this->getClientDetails($client_id);

        $ids = $this->getIdsForUser($user_id, $client_id);
        $contact_id = $ids['contact_id'];
        $user_id = $ids['user_id'];

        // User ID should always be set. Contact may not always be set to something
        if (!$user_id) {
            return;
        }

        $token = BeanFactory::newBean('OAuthTokens');

        $token->id = $refresh_token;
        $token->new_with_id = true;
        $token->consumer = $keyInfo['record_id'];
        $token->assigned_user_id = $user_id;
        $token->contact_id = $contact_id;
        $token->expire_ts = $expires;
        $token->setState(OAuthToken::ACCESS);

        $token->save();

    }

	/**
	 * Expire a used refresh token.
	 *
	 * This is not explicitly required in the spec, but is almost implied.
	 * After granting a new refresh token, the old one is no longer useful and
	 * so should be forcibly expired in the data store so it can't be used again.
	 *
	 * If storage fails for some reason, we're not currently checking for
	 * any sort of success/failure, so you should bail out of the script
	 * and provide a descriptive fail message.
	 *
	 * @param $refresh_token
	 * Refresh token to be expirse.
	 *
	 * @ingroup oauth2_section_6
	 */
	public function unsetRefreshToken($refresh_token)
    {
        $token = BeanFactory::newBean('OAuthTokens');
        $token->mark_deleted($refresh_token);
    }
    // END METHODS FROM IOAuth2RefreshTokens

    /**
     * Sets the platform storage object into this object
     *
     * @param string $platform
     * @throws Exception
     */
    protected function setPlatformStore($platform = null) {
        if (empty($this->platformStore) || ($platform && ($store = $this->platformStore->getPlatformName()) != $platform)) {
            // Handle setting the platform storage object
            if (empty($platform)) {
                $platform = empty($_SESSION['platform']) ? 'base' : $_SESSION['platform'];
            }

            // Reset the platform if it doesn't match
            if ($this->platform != $platform) {
                $this->platform = $platform;
            }

            // Normalize the platform
            $platform_class = 'SugarOAuth2Storage' . ucfirst(strtolower($platform));

            if($platform != 'base' && SugarAutoLoader::requireWithCustom("include/SugarOAuth2/{$platform_class}.php")) {
                $oauthStorageName = SugarAutoLoader::customClass($platform_class);
            } else {
                SugarAutoLoader::requireWithCustom('include/SugarOAuth2/SugarOAuth2StorageBase.php');
                $oauthStorageName = SugarAutoLoader::customClass('SugarOAuth2StorageBase');
            }

            if (empty($oauthStorageName)) {
                throw new Exception('No OAuth storage handler found');
            }

            $this->platformStore = new $oauthStorageName;
        }
    }

    /**
     * Gets the current platform storage object
     *
     * @return SugarOAuth2StoragePlatform
     */
    protected function getPlatformStore() {
        if (empty($this->platformStore)) {
            $this->setPlatformStore();
        }

        return $this->platformStore;
    }
}
