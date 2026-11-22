<?php
/**
 *
 * Extension Health Monitor extension for the phpBB Forum Software package.
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
	'ACP_STOKER_HM_TITLE'	=> 'Extension Health Monitor',
	'ACP_STOKER_HM_ISSUES'	=> 'Résultats',
	'ACP_STOKER_HM_BASELINE'	=> 'Signatures',
	'ACP_STOKER_HM_PROFILER'	=> 'Profileur',
	'ACP_STOKER_HM_DATABASE'	=> 'Vestiges de la base de données',
	'ACP_STOKER_HM_SETTINGS'	=> 'Paramètres',
	'ACP_STOKER_HM_GUIDE'	=> 'Guide de l’utilisateur',

	'LOG_STOKER_HM_SETTINGS'	=> '<strong>Mise à jour des paramètres d’Extension Health Monitor</strong>',
	'LOG_STOKER_HM_SCAN'	=> '<strong>Lancement manuel d’une passe d’Extension Health Monitor</strong>',
	'LOG_STOKER_HM_DB_SCAN'		=> '<strong>Lancement d’une recherche des vestiges de la base de données</strong>',
	'LOG_STOKER_HM_BANNER_DISMISS'	=> '<strong>Bannière d’Extension Health Monitor supprimée pour tous les fondateurs</strong>',
	'LOG_STOKER_HM_NEW_ERRORS'	=> [
		1	=> '<strong>Extension Health Monitor a détecté de nouvelles erreurs</strong><br>» %d erreur nouvelle ou réapparue',
		2	=> '<strong>Extension Health Monitor a détecté de nouvelles erreurs</strong><br>» %d erreurs nouvelles ou réapparues',
	],
	'LOG_STOKER_HM_PURGE'		=> [
		0	=> '<strong>Extension Health Monitor - Problèmes résolus et purgés</strong><br>» aucune suppression',
		1	=> '<strong>Extension Health Monitor  - Problèmes résolus et purgés</strong><br>» %d problème supprimé',
		2	=> '<strong>Extension Health Monitor  - Problèmes résolus et purgés</strong><br>» %d problèmes supprimés',
	],
	'LOG_STOKER_HM_PROF_START'	=> '<strong>Lancement du profileur d’Extension Health Monitor</strong><br>» %1$s heures, 1 of %2$s pages',
	'LOG_STOKER_HM_PROF_STOP'	=> '<strong>Arrêt du profileur d’Extension Health Monitor</strong>',
	'LOG_STOKER_HM_PROF_RESET'	=> '<strong>Suppression des données du prodileur d’Extension Health Monitor</strong>',
	'LOG_STOKER_HM_BASELINE'	=> '<strong>Lancement du calcul des signatures par l’Extension Health Monitor</strong><br>» %s',
	'LOG_STOKER_HM_BASELINE_ALL'	=> '<strong>Lancement du calcul des signatures par l’Extension Health Monitor</strong><br>» Toutes les extensions',
]);
