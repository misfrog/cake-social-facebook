<?php

/**
 * Facebook Component
 *
 * @property Session $Session
 * @property Social.Connection $Connection
 */
class FacebookComponent extends Component {

	public $components = array('Session', 'Social.Connection');
	
	public function api($name) {
		$config = Configure::read('Opauth.Strategy.Facebook');
		
		$facebook = new Facebook(array(
			'appId'  => $config['app_id'],
			'secret' => $config['app_secret'],
		));
		
		$facebook->setAccessToken($this->Session->read('Auth.Facebook.access_token'));
		
		// Get User ID
		$user = $facebook->getUser();
		
		if ($user) {
			try {
				// Proceed knowing you have a logged in user who's authenticated.
				return $facebook->api($name);
			} catch (FacebookApiException $e) {
				error_log($e);
			}
		}
		
		return null;
	}
}
