<?php
/**
 *
 * File Checker extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2026 stoker - https://phpbb3bbcodes.com/
 * @license GNU General Public License, version 2 (GPL-2.0)
 * Version française par Pierre Duhem
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, [
	'NOTIFICATION_TYPE_STOKER_FC_NEW_FINDINGS'	=> 'File Checker a trouvé de nouvelles erreurs ou a besoin d’un nouveau manifeste du cœur',

	'STOKER_FC_NOTIFICATION_NEW_ERRORS'			=> [
		1	=> '<strong>File Checker</strong> a trouvé %d nouvelle erreur.',
		2	=> '<strong>File Checker</strong> a trouvé %d nouvelles erreurs.',
	],
	'STOKER_FC_NOTIFICATION_MANIFEST_OUTDATED'	=> '<strong>File Checker</strong> : le manifeste du cœur est pour phpBB %1$s, mais le forum exécute phpBB %2$s. Les fichiers du cœur ne seront pas contrôlés taznt qu’un manifeste pour %2$s n’aura pas été importé.',
]);
