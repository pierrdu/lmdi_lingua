<?php
/*
*
* @package LMDI Lingua
* @copyright (c) Pierre Duhem - LMDI — 2023
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* 
*/

namespace lmdi\lingua\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{

	protected $template;
	protected $language;
	protected $config;



	public function __construct(
		\phpbb\language\language $language,
		\phpbb\config\config $config,
		\phpbb\template\template $template)
	{
		$this->language = $language;
		$this->config = $config;
		$this->template = $template;
	}

	static public function getSubscribedEvents ()
	{
		return array(
			'core.user_setup_after'	=> 'load_language',
		);
	}

	public function load_language ()
	{
		$this->language->add_lang ('lingua', 'lmdi/lingua');
	} 
	
}
