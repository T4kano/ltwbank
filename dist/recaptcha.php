<?php
	class Recaptcha{
		
		public function verifyResponse($recaptcha) {
			$remoteIp = $this->getIPAddress();

			// Discard empty solution submissions
			if (empty($recaptcha)) {
				return array(
					'success' => false,
					'error-codes' => 'missing-input',
				);
			}

			// INSERIR AQUI A [Secret key] do Painel do Google ReCaptcha https://www.google.com/recaptcha
			$getResponse = $this->getHTTP(
				array(
					'secret' => '6LeMYYsaAAAAANfIGMkuFNX_eyOeJ9F9qj0F4VAA',
					'remoteip' => $remoteIp,
					'response' => $recaptcha,
				)
			);

			// Get recaptcha server response
			$responses = json_decode($getResponse, true);

			if (isset($responses['success']) and $responses['success'] == true) {
				$status = true;
			} else {
				$status = false;
				$error = (isset($responses['error-codes'])) ? $responses['error-codes']
					: 'invalid-input-response';
			}

			return array(
				'success' => $status,
				'error-codes' => (isset($error)) ? $error : null,
			);
		}

		private function getIPAddress(){
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			return $ip;
		}

		private function getHTTP($data){
			$url = 'https://www.google.com/recaptcha/api/siteverify?'.http_build_query($data);
			$response = file_get_contents($url);
			return $response;
		}
	}
?>
