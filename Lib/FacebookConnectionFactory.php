<?php
App::uses('ConnectionFactory', 'Social.Lib');

/**
 * Facebook Connection Factory
 */
class FacebookConnectionFactory implements ConnectionFactory {
	
	public function createConnection($data) {
		Debugger::log($data);
		$connection = array(
			'access_token' => $data['auth']['credentials']['token'],
			'display_name' => $data['auth']['info']['name'],
			'expire_time' => $data['auth']['credentials']['expires'],
			'image_url' => $data['auth']['info']['image'],
			'provider_id' => $data['auth']['provider'],
			'provider_user_id' => $data['auth']['uid'],
			'rank' => 'rank',			// TODO
			'refresh_token' => 'refresh_token',	// TODO
			'secret' => $data['auth']['credentials']['token'],
			'user_id' => ''
		);
		
		return $connection;
	}
}