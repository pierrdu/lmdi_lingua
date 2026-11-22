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
	'ACP_STOKER_FC_TITLE'	=> 'File Checker',
	'ACP_STOKER_FC_OVERVIEW'	=> 'Scans et résultats',
	'ACP_STOKER_FC_MANIFEST'	=> 'Manifestes',
	'ACP_STOKER_FC_BASELINE'	=> 'Signatures',
	'ACP_STOKER_FC_SETTINGS'	=> 'Paramètres',
	'ACP_STOKER_FC_GUIDE'		=> 'Guide de l’utilisateur',

	'LOG_STOKER_FC_SETTINGS'	=> '<strong>File Checker settings updated</strong>',
	'LOG_STOKER_FC_SCAN'		=> '<strong>File Checker scan run manually</strong>',
	'LOG_STOKER_FC_BANNER_DISMISS'	=> '<strong>Bannière de File Checker inhibée pour tous les fondateurs</strong>',
	'LOG_STOKER_FC_NEW_ERRORS'	=> [
		1	=> '<strong>Le scan de File Checker a trouvé de nouvelles erreurs</strong><br>» %d erreur nouvelle ou réapparue',
		2	=> '<strong>Le scan de File Checker a trouvé de nouvelles erreurs</strong><br>» %d erreurs nouvelles ou réapparues',
	],
	'LOG_STOKER_FC_PURGE'		=> [
		0	=> '<strong>Purge des résultats résolus de File Checker</strong><br>» Aucune suppression',
		1	=> '<strong>Purge des résultats résolus de </strong><br>» %d résultat supprimé',
		2	=> '<strong>Purge des résultats résolus de </strong><br>» %d résultats supprimés',
	],
	'LOG_STOKER_FC_MANIFEST_IMPORT'	=> [
		1	=> '<strong>Manifeste de File Checker importé</strong><br>» %1$s %2$s, %3$d fichier',
		2	=> '<strong>Manifeste de File Checker importé</strong><br>» %1$s %2$s, %3$d fichiers',
	],
	'LOG_STOKER_FC_MANIFEST_DELETE'	=> '<strong>Manifeste de File Checker supprimé</strong><br>» %s',
	'LOG_STOKER_FC_BASELINE'		=> '<strong>Signature de File Checker calculée</strong><br>» %s',
	'LOG_STOKER_FC_BASELINE_DELETE'	=> '<strong>Signature de File Checker supprimée</strong><br>» %s',
	'LOG_STOKER_FC_ACCEPT'			=> '<strong>Modification de File Checker acceptée</strong><br>» %s',
]);
