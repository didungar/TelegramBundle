<?php
namespace DidUngar\TelegramBundle\Service;

// doc https://gist.github.com/zqsd/c273411c02d11bae364e
// doc https://core.telegram.org/methods

class TelegramBotService {
	protected $container;
	protected $telegram_bot_token = '';
	public function __construct($service_container) {
		$this->container = $service_container;
		if ($this->container->hasParameter('didungar_telegram.bot.token'))
			$this->setTelegramBotToken($this->container->getParameter('didungar_telegram.bot.token'));
		if ($this->container->hasParameter('didungar_telegram.bot.channel'))
			$this->setChannel($this->container->getParameter('didungar_telegram.bot.channel'));
	}
	
	public function getTelegramBotToken() :string {
		return $this->telegram_bot_token;
	}
	public function setTelegramBotToken(string $telegram_bot_token) {
		$this->telegram_bot_token = $telegram_bot_token;
		return $this;
	}

	public function getMe() {
		return $this->_get('getMe');
	}

	/**
	 * The API Caller
	 * @param string $method_name
	 * @param array $aDatas
	 * @thow Exception
	 * @return $result return from API
	**/
	public function _get($method_name, array $aDatas = []) {
		$postdata = http_build_query($aDatas);

		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $postdata
			)
		);

		$context  = stream_context_create($opts);
		$result = file_get_contents('https://api.telegram.org/bot'.$this->getTelegramBotToken().'/'.$method_name, false, $context);

		// Result analyse :
		if ( ! $result ) {
			throw new \Exception('return empty');
		}
		$result = json_decode($result);
		if ( ! $result->ok ) {
			throw new \Exception('return false');
		}
		$result = $result->result;
		return $result;
	}
	
	/**
	 * This function is for Bot_channel_entity->getChannelInstance() function
	 * @param array list of options
	 *	- sChannel for select the channel
	**/
	public function loadOptions(array $aOptions) {
		if ( @$aOptions['sChannel'] ) {
			$this->setChannel($aOptions['sChannel']);
		}
	}
	protected $_channel = 0;
	public function setChannel($id_channel) {
		$this->_channel = $id_channel;
	}
	public function getChannel() {
		return $this->_channel;
	}
	public function talk($sMessage, $aOptions=[]) {
		return $this->sendMessage($this->_channel, $sMessage, $aOptions);
	}
	public function sendMessage($iChannel, $sMessage, $aOptions=[]) {
		$aData = [
			'chat_id'	=> $iChannel,
			'text'		=> $sMessage,
		];
		if ( ! empty($aOptions['reply_markup']) ) {
			$aData['reply_markup'] = json_encode($aOptions['reply_markup']);
		}
		if ( ! empty($aOptions['parse_mode']) ) {
			switch($aOptions['parse_mode']) {
				case 'Markdown':
					$aData['parse_mode'] = 'Markdown';
					break;
				case 'HTML':
					$aData['parse_mode'] = 'HTML';
					break;
				default:
					throw new \Exception('parse_mode not valid');
			}
		}
		return $this->_get('sendMessage', $aData);
	}
	public function editMessageText(array $aData=[]) {
		if ( empty($aData['chat_id']) ) {
			$aData['chat_id'] = $this->_channel;
		}
		/*if ( empty($aData['message_id']) && !empty($aData['oMsg']) ) {
			$aData['message_id'] = $aData['oMsg']->message_id,
			unset($aData['oMsg']);
		}*/
		return $this->_get('editMessageText', $aData);
	}
	public function sendPhoto($photo) {
		if ( strlen($photo)>500 ) {
			$photo_ = @file_get_contents('http://tinyurl.com/api-create.php?url='.$photo);
			if ( ! empty($photo_) ) {
				$photo = $photo_;
			}
		}
		return $this->_get('sendPhoto', [
			'chat_id'       => $this->_channel,
			'photo'		=> $photo,
		]);
	}
	public function sendLocation($latitude, $longitude) {
		return $this->_get('sendLocation', [
			'chat_id'	=> $this->_channel,
			'latitude'	=> $latitude,
			'longitude'	=> $longitude,
		]);
	}
	public function setWebhook(array $aArgs = []) {
		if ( empty($aArgs['url']) ) {
			throw new \Exception('url required');
		}
		return $this->_get('setWebhook', $aArgs);
	}
	public function getWebhookInfo() {
		return $this->_get('getWebhookInfo');
	}
	public function getUpdates() {
		return $this->_get('getUpdates');
	}
	public function test($id_channel) {
		$this->setChannel($id_channel);
		var_export($this->talk(date('c')));
		echo "\n";
	}
	/**
	 * TODO :
	**/
	public function readHistory($iIdChat, $iMessageId) {
		return  $this->_get('readHistory', array(
                        'peer'		=> $iIdChat,
                        'max_id'	=> $iMessageId,
                ));
	}
}


