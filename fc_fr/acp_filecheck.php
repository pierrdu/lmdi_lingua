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
	// Header
	'ACP_STOKER_BADGE'				=> 'File Checker',
	'ACP_STOKER_SETTINGS_EXPLAIN'	=> 'Si vous appréciez cette extension, vous pouvez :',
	'ACP_STOKER_DONATION'			=> 'Faire un don',
	'ACP_STOKER_MEMBER'				=> 'Devenir un membre actif de ma communauté',
	'ACP_STOKER_SUPPORT'			=> 'Fournir une assistance sur l’extension',
	'ACP_STOKER_TOGGLE_ERROR'		=> 'La demande a échoué. Veuillez réessayer.',

	// Version check
	'ACP_STOKER_FC_VC_OK'			=> 'Vous exécutez la dernière version (%s)',
	'ACP_STOKER_FC_VC_OUTDATED'		=> 'Une nouvelle version existe : %2$s (%1$s chez vous). Cliquez pour la télécharger.',
	'ACP_STOKER_FC_VC_UNAVAILABLE'	=> 'Contrôle de version inaccessible',

	// General
	'STOKER_FC_NEVER'				=> 'Jamais',
	'STOKER_FC_BUSY'				=> 'Un scan, un calcul de signature ou une importation est en cours. Veuillez réessayer dans un instant.',
	'STOKER_FC_ALL_SCOPES'			=> 'Tous les domaines',
	'STOKER_FC_STATUS'				=> 'Situation',
	'STOKER_FC_FILES'				=> 'Fichiers',
	'STOKER_FC_VERSION'				=> 'Version',

	// Scopes
	'STOKER_FC_SCOPE'				=> 'Domaines',
	'STOKER_FC_SCOPE_BOARD'			=> 'Forum',
	'STOKER_FC_SCOPE_CORE'			=> 'Cœur de phpBB',
	'STOKER_FC_SCOPE_OTHER'			=> 'Autres fichiers',
	'STOKER_FC_SCOPE_LANG'			=> 'Pack de langue %s',
	'STOKER_FC_SCOPE_STYLE'			=> 'Style %s',

	// Severity
	'STOKER_FC_SEVERITY'			=> 'Gravité',
	'STOKER_FC_SEVERITY_ALL'			=> 'Tout',
	'STOKER_FC_SEVERITY_0'			=> 'Infos',
	'STOKER_FC_SEVERITY_1'			=> 'Avertissements',
	'STOKER_FC_SEVERITY_2'			=> 'Erreurs',

	// States
	'STOKER_FC_STATE_ACTIVE'		=> 'En attente',
	'STOKER_FC_STATE_IGNORED'		=> 'Ignoré',
	'STOKER_FC_STATE_RESOLVED'		=> 'Résolu',

	// Checks
	'STOKER_FC_CHECK'				=> 'Contrôle',
	'STOKER_FC_CHECK_CONTENT'		=> 'Code suspect',
	'STOKER_FC_CHECK_INTEGRITY'		=> 'Intégrité du fichier',
	'STOKER_FC_CHECK_PERMISSION'	=> 'Permissions',
	'STOKER_FC_CHECK_WRITABLE_PHP'	=> 'Dossiers en écriture',

	// Scan phases
	'STOKER_FC_PHASE_FILES'			=> 'Comparaison des fichiers',
	'STOKER_FC_PHASE_DIRS'			=> 'Contrôle des droits sur les dossiers',
	'STOKER_FC_PHASE_WRITABLE'		=> 'Recherche dans les dossiers en écriture',
	'STOKER_FC_PHASE_FINISH'		=> 'Recherche de fichiers manquants',

	// Overview page
	'STOKER_FC_LAST_RUN'			=> 'Dernier scan achevé',
	'STOKER_FC_LAST_RUN_EXPLAIN'	=> 'Les scans sont lancés par petits paquets gérés par le cron de phpBB, ou en cliquant sur le bouton ci-dessous.',
	'STOKER_FC_RUNNING'				=> 'Scan en cours',
	'STOKER_FC_NEXT_RUN'			=> 'Prochain scan prévu',
	'STOKER_FC_NEXT_RUN_EXPLAIN'	=> 'Le cron de phpBB s’exécute lorsque le forum a des visiteurs, ou lorsque le cron system est paramétré, si bien que le scan peut se dérouler plus tard.',
	'STOKER_FC_NEXT_RUN_OFF'		=> 'Les scans automatiques sont inhibés',
	'STOKER_FC_NEXT_RUN_BUILDING'	=> 'Après achèvement des calculs de signature',
	'STOKER_FC_NEXT_RUN_CONTINUE'	=> 'Le scan en cours sera poursuivi au prochain appel du cron',
	'STOKER_FC_NEXT_RUN_DUE'		=> 'Due now, starts on the next cron call',
	'STOKER_FC_OPEN_FINDINGS'		=> 'Résultats en attente',
	'STOKER_FC_MANIFEST_LABEL'		=> 'Manifeste du cœur',
	'STOKER_FC_MANIFEST_STATE_NONE'		=> 'Pas d’importation. Les fichiers du cœur sont comparés aux signatures locales.',
	'STOKER_FC_MANIFEST_STATE_CURRENT'	=> 'phpBB %s correspond au forum',
	'STOKER_FC_MANIFEST_STATE_OUTDATED'	=> '<strong>phpBB %1$s, le forum exécute %2$s.</strong> Les fichiers du cœur ne seront contrôlés qu’après importation d’un manifeste pour %2$s.',
	'STOKER_FC_BUILDING_NOTICE'		=> 'Signatures en cours de calcul. Les scans attendent leur achèvement.',
	'STOKER_FC_RUN_NOW'				=> 'Lancer le scan maintenant',
	'STOKER_FC_RUN_NOW_EXPLAIN'		=> 'La page se recharge jusqu’à la fin du traitement de tous les fichiers.',
	'STOKER_FC_CONTINUE_SCAN'		=> 'Poursuite du scan',
	'STOKER_FC_FINDINGS'			=> 'Résultats',
	'STOKER_FC_MESSAGE'				=> 'Message',
	'STOKER_FC_SEEN'				=> 'Première/dernière occurence',
	'STOKER_FC_RESOLVED'			=> 'Résolu',
	'STOKER_FC_IGNORE'				=> 'Ignoré',
	'STOKER_FC_NO_FINDINGS'			=> 'Pas de résultats.',
	'STOKER_FC_FINDING_NOT_FOUND'	=> 'Pas de résultats trouvés.',
	'STOKER_FC_SCAN_DONE'			=> 'Scan achevé.',
	'STOKER_FC_SCAN_NOT_RUNNING'	=> 'Pas de scan en cours. Le scan s’est achevé ou il a été annulé par une autre instruction entre temps, par exemple un batch automatique, un onglet dans un autre navigateur, l’importation ou la suppression d’un manifeste ou de signatures. Vérifiez les résultats ou relancez un scan.',
	'STOKER_FC_SCAN_PROGRESS'		=> 'Scan en cours, patientez…<br>%1$s<br>%2$s',
	'STOKER_FC_SCAN_FILES'			=> '%1$d sur %2$d fichiers',
	'STOKER_FC_SCAN_WAIT_BASELINE'	=> 'Des signatures sont en cours de calcul. Achevez d’abord ces opérations sur la page correspondante.',

	// Purge
	'STOKER_FC_PURGE'				=> 'Purger les résultats résolus',
	'STOKER_FC_PURGE_OLDER'			=> 'Résolus depuis plus de ',
	'STOKER_FC_PURGE_EXPLAIN'		=> 'Suppression des résultats résolus après le nombre de jours. La valeur 0 supprime toutes les résultats résolus. Les résultats ignorés ne sont jamais purgés.',
	'STOKER_FC_PURGE_CONFIRM_DAYS'	=> [
		1	=> 'Êtes-vous certain de vouloir supprimer les résultats résolus de plus de %d jour ?',
		2	=> 'Êtes-vous certain de vouloir supprimer les résultats résolus de plus de %d jours ?',
	],
	'STOKER_FC_PURGE_CONFIRM_ALL'	=> 'Êtes-vous certain de vouloir supprimer tous les résultats résolus ?',
	'STOKER_FC_PURGE_DONE'			=> [
		0	=> 'Aucun résultat résolun’a été supprimé.',
		1	=> '%d résultat résolu a été supprimé.',
		2	=> '%d résultats résolus ont été supprimés.',
	],

	// Accept a change
	'STOKER_FC_ACCEPT'					=> 'Valider les changements',
	'STOKER_FC_ACCEPT_CONFIRM_FILE'		=> 'Accepter le fichier tel quel comme nouvelle référence ? N’acceptez que les changements volontaires.<br><code>%1$s</code><br>SHA-256: <code>%2$s</code>',
	'STOKER_FC_ACCEPT_CONFIRM_MISSING'	=> 'Accepter que le <code>%s</code> n’existe plus ? Sa référence est supprimée et le fichier ne doit plus être attendu.',
	'STOKER_FC_ACCEPT_DONE'				=> 'Le changement a été accepté et le résultat a été résolu. Un changement ultérieur du fichier sera signalé à nouveau.',
	'STOKER_FC_ACCEPT_NOT_POSSIBLE'		=> 'Ce résultat ne peut pas être accepté. Seuls les résultats en attente pour des fichiers modifiés, nouveaux ou manquants peuvent être acceptés et, dans le cas d’un fichier modifié ou nouveau, à la condition que le domaine possède une signature. Les fichiers modifiés ou nouveaux dans une extension avec manifeste, comme VigLink du pack phpBB, sont définis dans ce manifeste.',
	'STOKER_FC_ACCEPT_CHANGED'			=> 'Le fichier a été modifié depuis que le résultat a été produit ou depuis la confirmation. Relancez un scan pour obtenir un nouveau résultat.',
	'STOKER_FC_ACCEPT_UNREADABLE'		=> 'Le fichier ne peut être lu, ses modifications ne peuvent pas être acceptées.',

	// Manifest page
	'STOKER_FC_MANIFEST_EXPLAIN'	=> 'Un manifeste contient le hachage SHA-256 de tous les fichiers d’un pack officiel : le pack phpBB (manifeste du cœur), pack de langue, style ou extension. Les fichiers sont comparés sur cette base, si bien qu’un fichier modifié avant l’installation de la présente extension est détecté. Tous les manifestes sont importés, remplaés et supprimés indépendamment. Le manifeste du cœur doit correspondre à la vesion phpBB du forum. Vous devez en importer un nouveau à chaque mise à jour. Les manifestes des packs de langue, de style ou d’extensions ne dépendent pas de la version de phpBB. Importez un nouveau manifeste après la mise à jour du pack.',
	'STOKER_FC_MANIFESTS'			=> 'Manifestes importés',
	'STOKER_FC_MANIFEST'				=> 'Manifeste',
	'STOKER_FC_MANIFEST_NONE_YET'	=> 'Aucun manifeste n’a été importé.',
	'STOKER_FC_MANIFEST_OUTDATED_NOTICE'	=> 'Le manifeste du cœur ne correspond pas à la versdion du forum. Les fichiers du cœurne seront pas contrôlés avant importation d’un manifeste du cœur pour phpBB %s.',
	'STOKER_FC_MANIFEST_IMPORTED_AT'	=> 'Importé',
	'STOKER_FC_MANIFEST_SOURCE'		=> 'Produit par',
	'STOKER_FC_MANIFEST_DELETE_EXPLAIN'	=> 'Les fichiers d’un manifeste supprimé conservent leur hachage officiel dans la signature. Ils sont comparés lorsqu’il existe une signature pour leur domaine. Les fichiers d’une extension supprimée deviennent la signature de l’extension.',
	'STOKER_FC_MANIFEST_EXT_REMOVED'	=> 'Dossier de l’extension supprimé',
	'STOKER_FC_MANIFEST_EXT_INSTALLED'	=> 'Installé : %s',
	'STOKER_FC_EXT_MANIFESTS'			=> 'Extensions (%d)',
	'STOKER_FC_EXT_MANIFESTS_OUTDATED'	=> '%d périmé',
	'STOKER_FC_EXT_MANIFESTS_REMOVED'	=> '%d supprimé',
	'STOKER_FC_MANIFEST_DELETE_REMOVED'	=> 'Suppression des manifestes de toutes les extensions supprimées',
	'STOKER_FC_MANIFEST_DELETE_REMOVED_CONFIRM'	=> [
		1	=> 'Êtes-vous certain de vouloir supprimer le manifeste pour %d extension supprimée ?',
		2	=> 'Êtes-vous certain de vouloir supprimer les manifestes pour %d extensions supprimées ?',
	],
	'STOKER_FC_MANIFEST_DELETED_REMOVED'	=> [
		1	=> 'Le manifeste pour %d extension supprimée a été supprimé.',
		2	=> 'Les manifestes pour %d extensions supprimées ont été supprimés.',
	],
	'STOKER_FC_MANIFEST_DELETE_CONFIRM'	=> 'Êtes-vous certain de vouloir supprimer le manifeste pour %s?',
	'STOKER_FC_MANIFEST_DELETED'	=> 'Le manifeste a été supprimé.',

	'STOKER_FC_IMPORT'				=> 'Importation de manifestes',
	'STOKER_FC_MANIFEST_FILE'		=> 'Fichiers de manifeste',
	'STOKER_FC_IMPORT_EXPLAIN'		=> 'Téléchargez un ou plusieurs fichiers de manifeste (.sha256.json) ou une archive zippée de manifestes (voir ci-dessous). Le manifeste du cœur doit être produit pourla version du forum, un manifeste d’extension pour la version installée de l’extension. Ne téléchargez que des manifestes provenant d’une source de confiance, ou produisez-les vous-même. Les manifestes des packs de langue, des styles et des extensions qui ne sont pas installés sur le forum sont ignorés. Un manifeste importé remplace le précédent pour le même pack. Un manifeste d’extension remplace la signature de l’extension : les fichiers qu’il ne mentionne pas sont signalés comme nouveaux, hormis les traductions qu’il ne fournit pas, qui sont traités comme « Autres fichiers ».',
	'STOKER_FC_IMPORT_BUTTON'		=> 'Importer',
	'STOKER_FC_MANIFEST_IMPORTED'	=> [
		1	=> '%1$s: manifeste %2$s importé avec %3$d fichier.',
		2	=> '%1$s: manifestes %2$s importés avec %3$d fichiers.',
	],
	'STOKER_FC_MANIFEST_IMPORTED_MANY'	=> '%1$d manifestes importé avec %2$d fichiers. Chacun d’entre eux est mentionné dans le journal d’administration.',
	'STOKER_FC_IMPORT_PROGRESS'		=> 'Importation de manifestes, patientez…<br>%1$d sur %2$d manifestes',
	'STOKER_FC_IMPORT_PROGRESS_WAIT'	=> 'Importation de manifestes, patientez…',
	'STOKER_FC_IMPORT_RESUME'		=> 'Les manifestes sont conservés un jour. Après calcul des signatures, <a href="%s">continuez l’importation</a>.',
	'STOKER_FC_IMPORT_RESUME_BUSY'	=> 'Les manifestes sont conservés un jour. Lorsque le batch en cours sera achevé, <a href="%s">continuez l’importation</a>.',
	'STOKER_FC_IMPORT_PENDING'		=> 'L’importation de manifestes n’a pas été achevée, %1$d sur %2$d manifestes ont été importés. <a href="%3$s">Continuez l’importation</a>. Une importation inachevée est supprimée après un jour.',
	'STOKER_FC_IMPORT_GONE'			=> 'Cette importation n’est plus en cours d’exécution. Elle a été achevée ou abandonnée plus d’un jour durant. Contrôlez les manifestes importés et importez les fichiers manquants.',
	'STOKER_FC_MANIFEST_SKIPPED'	=> 'Ignoré, non installé sur ce forum : %s',
	'STOKER_FC_MANIFEST_COVERED'	=> 'Non importé, tous les fichiers appartiennent au manifeste du cœur ou à un manifeste de langue : %s',
	'STOKER_FC_MANIFEST_EXT_MISMATCH'	=> '%1$s : non importé, le manifeste est pour la version %2$s, mais la version %3$s est installée. Produisez un manifeste pour la version installée.',
	'STOKER_FC_MANIFEST_RUN_SCAN'	=> 'Lancez un scan pour comparer les fichiers.',

	'STOKER_FC_GENERATE'			=> 'Production de manifestes',
	'STOKER_FC_GENERATE_EXPLAIN'	=> 'Téléchargez le pack phpBB officiel, les packs de langue, les styles et le extensions, en les combinant à volonté. Le hachage se fait directement sur les archives zippées brutes. Les archives ne sont pas sauvegardées, les manifestes produits sont placés dans le dossier store jusqu’à ce qu’ils soient téléchargés. Chaque archive donne son propre manifeste, le téléchargement porte sur un manifeste unique ou sur une archive de manifestes. Vous pouvez les importer sur n’importe quel forum, mais sur un forum exécutant la même verison dans le cas d’un manifeste du cœur. Téléchargez vous-même les archives de phpbb.com. Un pack modifié donne un manifeste qui dissimule la modification.',
	'STOKER_FC_BASE_ZIP'			=> 'Pack phpBB',
	'STOKER_FC_BASE_ZIP_EXPLAIN'	=> 'Optionnel. pack complet de phpbb.com, par exemple phpBB-3.3.19.zip. Le dossier d’installation et le fichier config.php ne font pas partie du manifeste.',
	'STOKER_FC_LANG_ZIP'			=> 'Packs de langue',
	'STOKER_FC_LANG_ZIP_EXPLAIN'	=> 'Optionnel. Choisissez un ou plusieurs packs de langue, par exemple danish_3_3_13.zip. Le pack peut être conçu pour une autre version de phpBB. La version est conservée.',
	'STOKER_FC_STYLE_ZIP'			=> 'Styles',
	'STOKER_FC_STYLE_ZIP_EXPLAIN'	=> 'Optionnel. Choisissez une ou plusieurs archives de style depuis phpbb.com, à raison d’un style par archive. La version est conservée. Les styles du pack phpBB, comme prosilver, font partie du pack.',
	'STOKER_FC_EXT_ZIP'				=> 'Extensions',
	'STOKER_FC_EXT_ZIP_EXPLAIN'		=> 'Optionnel. Choisissez une ou plusieurs extensions, à raison d’une extension par archive. La version est conservée. Le hachage se fait sur tous les fichiers de l’archive. Utilisez donc l’archive de distribution, comme celle de la base de personnalisation phpBB. Une archive provenant d’un dépôt de développement contient des fichiers de développement (essais) qui ne sont pas installés sur le forum et sont donc signalés comme manquants.',
	'STOKER_FC_UPLOAD_LIMITS'		=> 'Le serveur accepte jusqu’à %1$s par fichier, %2$s par formulaire et %3$d fichiers par formulaire.',
	'STOKER_FC_UPLOAD_QUEUE_NOTE'	=> 'Les archives sont envoyées une à la fois, il est donc possible d’en sélectionner un nombre quelconque. Seule la taille maximale par fichier s’applique, chaque archive doit donc être inférieure à %s.',
	'STOKER_FC_GENERATE_BUTTON'		=> 'Production des manifestes',
	'STOKER_FC_QUEUE_PROGRESS'		=> 'Production du manifeste %1$d sur %2$d : %3$s',
	'STOKER_FC_QUEUE_DONE'			=> 'Un manifeste a été produit pour chaque archive. Lancement du téléchargement.',
	'STOKER_FC_QUEUE_PARTLY'		=> '%1$d sur %2$d manifestes ont été produits, les archives ci-dessous ont échoué. Téléchargez les manifestes produits ou réparez les archives et recommencez.',
	'STOKER_FC_QUEUE_NONE'			=> 'Aucun manifeste n’a été produit, les archives ci-dessous ont échoué.',
	'STOKER_FC_QUEUE_DOWNLOAD'		=> 'Téléchargez les manifestes produits',
	'STOKER_FC_QUEUE_TOO_LARGE'		=> 'est supérieur à la taille acceptée par fichier par le serveur (%s).',
	'STOKER_FC_QUEUE_FAILED'		=> 'Le téléchargement a échoué. Vérifiez la connexion et consultez le journal d’erreurs PHP du serveur.',
	'STOKER_FC_ZIP_MISSING'			=> 'L’extension PHP (ZipArchive) n’est pas installée sur ce serveur, les manifestes n’ont pas pu être produits. Il reste possible d’en importer.',

	// Manifest errors
	'STOKER_FC_NO_MANIFEST_FILE'	=> 'Aucun manifeste n’a été téléchargé.',
	'STOKER_FC_NO_ZIP'				=> 'Aucune archive n’a été téléchargée.',
	'STOKER_FC_UPLOAD_TOO_LARGE'	=> '%s est supérieur à ce que le serveur accepte.',
	'STOKER_FC_UPLOAD_FAILED'		=> 'Le téléchargement de %s a échoué.',
	'STOKER_FC_POST_TOO_LARGE'		=> 'Les fichiers téléchargés sont supérieurs à ce que le serveur accepte par formulaire (%s). Rien n’a été reçu. Téléchargez des fichiers plus petits ou moins nombreux à la fois.',
	'STOKER_FC_MANIFEST_INVALID'	=> '%s n’est pas un manifeste valide pour File Checker.',
	'STOKER_FC_MANIFEST_TOO_LARGE'	=> '%s est trop grand pour un manifeste.',
	'STOKER_FC_MANIFEST_WRONG_VERSION'	=> '%1$s est pour %2$s, le forum exécute phpBB %3$s.',
	'STOKER_FC_MANIFEST_DUPLICATE'	=> '%1$s et %2$s sont des manifestes pour le même pack. N’en téléchargez qu’un seul.',
	'STOKER_FC_MANIFEST_ENCODE'		=> 'Le manifeste n’a pas pu être enregistré.',
	'STOKER_FC_ZIP_INVALID'			=> '%s n’est pas une archive zippée valide.',
	'STOKER_FC_ZIP_NOT_PHPBB'		=> '%s n’est pas un pack phpBB.',
	'STOKER_FC_ZIP_NO_VERSION'		=> 'Impossible de lire la version phpBB dans %s.',
	'STOKER_FC_ZIP_READ'			=> 'Impossible de lire %2$s dans %1$s.',
	'STOKER_FC_ZIP_NOT_LANGUAGE'	=> '%s n’est pas un pack de langue phpBB.',
	'STOKER_FC_ZIP_MULTIPLE_LANGUAGES'	=> '%s contient plusieurs langues. Téléchargez une langue par archive.',
	'STOKER_FC_LANGUAGE_IN_CORE'	=> '%s est le pack anglais, contenu dans le pack phpBB.',
	'STOKER_FC_LANGUAGE_DUPLICATE'	=> 'Le pack de langue %s a été téléchargé plusieurs fois.',
	'STOKER_FC_ZIP_NOT_STYLE'		=> '%s n’est pas un style phpBB.',
	'STOKER_FC_ZIP_MULTIPLE_STYLES'	=> '%s contient plusieurs styles. Téléchargez un style par archive.',
	'STOKER_FC_ZIP_STYLE_NAME'		=> 'Le dossier de style contenu dans %s ne peut pas être utilisé.',
	'STOKER_FC_STYLE_IN_CORE'		=> '%1$s contient le style %2$s, contenu dans le pack phpBB.',
	'STOKER_FC_STYLE_DUPLICATE'		=> 'Style %s was uploaded more than once.',
	'STOKER_FC_ZIP_NOT_EXTENSION'	=> '%s n’est pas une extension phpBB.',
	'STOKER_FC_ZIP_MULTIPLE_EXTENSIONS'	=> '%s contient plusieurs extensions. Téléchargez une extension par archive.',
	'STOKER_FC_ZIP_EXT_NAME'		=> 'Le nom d’extension contenu dans %s ne peut pas être utilisé.',
	'STOKER_FC_EXT_IN_CORE'			=> '%1$s contient l’extension %2$s, contenue dans le pack phpBB.',
	'STOKER_FC_EXT_DUPLICATE'		=> 'L’extension %s a été téléchargée plusieurs fois.',
	'STOKER_FC_MANIFEST_ZIP_EMPTY'	=> '%s ne contient pas de manifestes.',
	'STOKER_FC_CORE_DUPLICATE'		=> 'Le pack phpBB a été téléchargé plusieurs fois.',
	'STOKER_FC_QUEUE_WRITE'			=> 'Les manifestes produits n’ont pas pu être stockés dans le dossier store. Vérifiez que PHP peut y écrire.',
	'STOKER_FC_QUEUE_EMPTY'			=> 'Il n’y a pas de manifestes à télécharger. Ils ne sont téléchargés qu’une fois et ne sont conservés qu’un jour. Recommencez.',

	// Baseline page
	'STOKER_FC_BASELINE_EXPLAIN'	=> 'La signature contient un hachage SHA-256 pour tous les fichiers non couverts par un manifest : extensions, autres styles et packs de langue, et tout ce qui peut se trouver dans le dossier du forum. De cette manière, les fichiers modifiés, ajoutés ou supprimés peuvent être signalés. Ne calculez la signature que si vous savez que les fichiers sont propres, et recommencez pour les extensions après une mise à jour. <br><strong>Nota bene :</strong> les signatures sont stockées dans la base de données. Elles permettent de détecter les infections e fichiers, mais non pas les attaques qui parviennent à modifier la base de données.',
	'STOKER_FC_BASELINE_MANIFEST_NOTE'		=> 'Lorsque le manifeste du cœur valide est importé, les fichiers du cœur de phpBB sont identifiés et retirés de la signature. Les fichiers de tous les manifestes importés n’entrent pas dans les signatures.',
	'STOKER_FC_BASELINE_NO_MANIFEST_NOTE'	=> 'Aucun manifeste du cœur n’a été importé, si bien que les fichiers du cœur sont traités parmi les « Autres fichiers ». Importez un manifeste du cœur si vous le pouvez, cela permet de détecter les fichiers modifiés avant le calcul de la signature.',
	'STOKER_FC_BUILDING'			=> 'Calcul d’une signature.',
	'STOKER_FC_BUILD_ALL'			=> 'Calcul des signatures pour tous les domaines',
	'STOKER_FC_BUILD_ALL_EXPLAIN'	=> 'Remplacement des signatures pour tous les domaines.',
	'STOKER_FC_BUILD_CONTINUE'		=> 'Continuer',
	'STOKER_FC_SCOPES'				=> 'Domaines',
	'STOKER_FC_BASELINE_TIME'		=> 'Date de calcul',
	'STOKER_FC_BUILD'				=> 'Calculer',
	'STOKER_FC_DELETE'				=> 'Supprimer',
	'STOKER_FC_BASELINE_STATUS_OK'		=> 'Vérifié',
	'STOKER_FC_BASELINE_STATUS_MANIFEST'	=> 'Vérifié d’après le manifeste',
	'STOKER_FC_BASELINE_STATUS_MANIFEST_UPDATED'	=> 'Vérifié d’après le manifeste, mis à jour entre temps',
	'STOKER_FC_BASELINE_STATUS_UPDATED'	=> 'Vérifié, mise à jour après la signature',
	'STOKER_FC_BASELINE_STATUS_NONE'	=> 'Pas de signature, pas de vérification',
	'STOKER_FC_BASELINE_STATUS_REMOVED'	=> 'Extension supprimée',
	'STOKER_FC_BASELINE_STATUS_NO_COMPOSER'	=> 'Vérifié, composer.json manque',
	'STOKER_FC_BASELINE_CONFIRM_ALL'	=> 'Remplacer la signature pour tous les domaines à partir des fichiers courants ?',
	'STOKER_FC_BASELINE_CONFIRM_SCOPE'	=> 'Remplacer la signature de %s à partir des fichiers courants ?',
	'STOKER_FC_BASELINE_PROGRESS'		=> 'Calcul des signatures, patientez…<br>%1$d sur %2$d fichiers',
	'STOKER_FC_BASELINE_PROGRESS_WAIT'	=> 'Calcul des signatures, patientez…',
	'STOKER_FC_BASELINE_DONE'			=> 'Les signatures ont été calculées. Lancez un scan pour comparer les fichiers.',
	'STOKER_FC_BASELINE_DELETE_CONFIRM'	=> 'Supprimer la signature de %s ?',
	'STOKER_FC_BASELINE_DELETED'		=> 'La signature a été supprimée.',

	// Settings page
	'STOKER_FC_CRON'				=> 'Scans automatiques',
	'STOKER_FC_CRON_EXPLAIN'		=> 'Scan du forum par le cron phpBB. Chaque appel lance un batch d’environ 10 secondes.',
	'STOKER_FC_INTERVAL'			=> 'Intervalle entre scans',
	'STOKER_FC_INTERVAL_EXPLAIN'	=> 'Heures écoulées entre la fin d’un scan et le début du scan automatique suivant.',
	'STOKER_FC_CHUNK'				=> 'Nombre de fichiers par batch',
	'STOKER_FC_CHUNK_EXPLAIN'		=> 'Nombre de fichiers par batch pour le scan et le calcul des signatures. Abaissez le nombre si vous atteignez le paramètre max_execution_time de votre serveur. Une valeur inférieure à 500 réduit jusqu’à 4 fois le nombre de fichiers lus dans les dossiers et les scans.',
	'STOKER_FC_PURGE_DAYS'			=> 'Purge des résultats résolus après',
	'STOKER_FC_PURGE_DAYS_EXPLAIN'	=> 'Les résultats résolus plus anciens sont supprimés à la fin de chaque scan. La valeur 0 les conserve.',
	'STOKER_FC_NOTIFY'				=> 'Informer les fondateurs des nouvelles erreurs',
	'STOKER_FC_NOTIFY_EXPLAIN'		=> 'Lorsqu’un scan automatique détecte des erreurs nouvelles ou réapparues, les fondateurs reçoivent un avis et un courriel. Le courriel suppose que la fonction soit vlidée à l’échelle du forum. L’inscription dans le journal d’administration se produit toujours. Les fondateurs peuvent inhiber ces informations dans leur panneau d’utilisateur. Les fondateurs créés après l’installation de l’extension doivent paramétrer le courriel dans leur panneau d’utilisateur.',
	'STOKER_FC_BANNER'				=> 'Afficher une bannière aux fondateurs',
	'STOKER_FC_BANNER_EXPLAIN'		=> 'Tant que des erreurs sont en cours et n’ont pas été ignorées, les fondateurs ont une bannière affichée sur toutes les pages du forum et sur l’index du panneau d’administration. Contrairement aux notifications, elle reste affichée tant que les erreurs n’ont pas été traitées. Les autres utilisateur ne voient rien.',
	'STOKER_FC_BANNER_DISMISS'		=> 'Inhibition de la bannière',
	'STOKER_FC_BANNER_DISMISS_EXPLAIN'	=> 'Les fondateurs peuvent inhiber la bannière pour tous les fondateurs. Celle-ci revient lorsqu’un scan détecte des erreurs nouvelles ou réapparues. Laissez la fonction pour conserver la bannière tant que les erreurs n’ont pas été résolues ou ignorées. Cela réaffiche également une bannière précédemment inhibée.',

	// Findings, parameters are escaped before they are inserted
	'STOKER_FC_FINDING_MODIFIED'			=> 'Fichier modifié : <code>%s</code>',
	'STOKER_FC_FINDING_NEW'					=> 'Nouveau fichier : <code>%s</code>',
	'STOKER_FC_FINDING_MISSING'				=> 'Fichier manquant : <code>%s</code>',
	'STOKER_FC_FINDING_UNREADABLE'			=> 'Fichier non lu : <code>%s</code>',
	'STOKER_FC_FINDING_UNREADABLE_BASELINE'	=> 'Le fichier n’a pas pu être lu lorsque la signature a été calculée, il ne peut pas être comparé. Recalculez la signature pour son domaine lorsqu’il pourra être lu : <code>%s</code>',
	'STOKER_FC_FINDING_WORLD_WRITABLE_FILE'	=> 'Fichier pouvant être lu par tous (%2$s) : <code>%1$s</code>',
	'STOKER_FC_FINDING_WORLD_WRITABLE_DIR'	=> 'Dossier pouvent être écrit par tous (%2$s) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONFIG_WRITABLE'		=> '<code>config.php</code> peut être écrit par tous (%s). Réglez 644 ou plus.',
	'STOKER_FC_FINDING_WRITABLE_SCRIPT'		=> 'Script ou fichier de configuration du serveur dans un dossier permettant l’écriture : <code>%s</code>',
	'STOKER_FC_FINDING_NO_MANIFEST'			=> 'Aucun manifeste du cœur importé. Les fichiers du cœur de phpBB sont seulement vérifiés d’après les signatures locales.',
	'STOKER_FC_FINDING_MANIFEST_OUTDATED'	=> 'Le manifeste du cœur est pour phpBB %1$s, mais le forum exécute %2$s. Les fichiers du cœur ne seront contrôlés qu’après importation d’un manifeste pour phpBB %2$s.',
	'STOKER_FC_FINDING_LANG_NOT_COVERED'	=> 'Le pack de langue <code>%s</code> est installé mais ne possède pas de manifeste. Ses fichiers sont contrôlés à partir des signatures.',
	'STOKER_FC_FINDING_INSTALL_DIR'			=> 'Le dossier <code>install</code> existe. Supprimez-le.',
	'STOKER_FC_FINDING_NO_BASELINE_OTHER'	=> 'Les fichiers extérieurs au manifeste et les extensions n’ont pas de signature. Ils ne sont donc pas contrôlés.',
	'STOKER_FC_FINDING_NO_BASELINE_EXT'		=> '%s ne possède pas de signature. Ses fichiers ne sont pas contrôlés.',
	'STOKER_FC_FINDING_EXT_UNKNOWN'			=> 'Le dossier <code>ext/%s/</code> comprend des scripts, ne possède pas de signature et n’est pas installé sur le forum. Ses fichiers ne sont pas contrôlés. Si ce n’est pas vous qui les avez téléchargés, considérez que c’est un indice d’une attaque. Sinon, activez l’extension et calculez sa signature.',
	'STOKER_FC_FINDING_EXT_UPDATED'			=> '%1$s a changé de version depuis sa signature (%2$s » %3$s). Ses fichiers continuent d’être comparés avec la signature et les changements sont signalés. Si ce n’est pas vous qui l’avez téléchargé, considérez que c’est un indice d’une attaque. Sinon, recalculez sa signature.',
	'STOKER_FC_FINDING_EXT_MANIFEST_UPDATED'	=> '%1$s a changé de version depuis le manifeste (%2$s » %3$s). Ses fichiers continuent d’être comparés avec le manifeste et les changements sont signalés. Sinon, importez un manifeste produit avec la nouvelle version.',
	'STOKER_FC_FINDING_LANG_UPDATED'		=> 'Le pack de langue <code>%1$s</code> a changé de version depuis le manifeste (%2$s » %3$s). Ses fichiers continuent d’être comparés avec le manifeste et les changements sont signalés. Si ce n’est pas vous qui l’avez téléchargé, considérez que c’est un indice d’une attaque. Sinon, importez un manifeste produit avec la nouvelle version.',
	'STOKER_FC_FINDING_STYLE_UPDATED'		=> 'Le style <code>%1$s</code> a changé de version depuis le manifeste (%2$s » %3$s). Ses fichiers continuent d’être comparés avec le manifeste et les changements sont signalés. Si ce n’est pas vous qui l’avez téléchargé, considérez que c’est un indice d’une attaque. Sinon, importez un manifeste produit avec le nouveau style.',
	'STOKER_FC_FINDING_EXT_MANIFEST_REMOVED'	=> 'Le dossier de l’extension n’existe plus. Supprimez son manifeste.',
	'STOKER_FC_FINDING_EXT_REMOVED'			=> 'Le dossier de %s n’existe plus. Supprimez sa signature.',
	'STOKER_FC_FINDING_EXT_NO_COMPOSER'		=> 'Le dossier <code>ext/%s/</code> possède une référence mais n’a plus de fichier <code>composer.json</code>. phpBB peut exécuter une extension en son absence. Ses fichiers avec référence restent comparés, les nouveaux fichiers sont traités comme des autres fichiers. Si ce n’est pas vous qui l’avez supprimé, considérez que c’est un indice d’une attaque. Sinon, réinstallez le fichier ou supprimez le dossier.',
	'STOKER_FC_FINDING_SYMLINK_DIR'			=> 'Le dossier est un lien symbolique ou une jonction avec <code>%2$s</code>, son contenu n’est pas contrôlé : <code>%1$s</code>',
	'STOKER_FC_FINDING_DIR_UNLISTABLE'		=> 'Le dossier ne peut pas être lu, son contenu n’est pas vérifié. Le serveur web peut toujours exécuter un script par l’intermédiaire de son adresse : <code>%s</code>',

	// Suspicious code findings, %1$s is the file, %2$d the line
	'STOKER_FC_FINDING_CONTENT_EVAL_DECODE'		=> 'Exécution de code dissimulé par son codage, caractéristique d’une porte dérobée (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_RUN_REQUEST'		=> 'Exécution de code ou d’instructions du shell envoyés avec la requête, caractéristique d’un web shell (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_SHELL_REQUEST'	=> 'Exécution d’une instruction du shell entre backticks sur des données envoyées avec la requête, caractéristique d’un web shell (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_CALL_REQUEST'	=>'Appel d’une fonction nommée dans la requête, caractéristique d’un web shell (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_CALLBACK_REQUEST'	=> 'Utilisation d’une fonction de rappel nommée dans la requête, caractéristique d’un web shell (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_INCLUDE_REMOTE'	=> 'Inclusion de code provenant d’un autre serveur ou du corps de la requête (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_INCLUDE_REQUEST'	=> 'Inclusion d’un fichier choisi dans la requête (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_SHELL_SIGNATURE'	=> 'Contient le nom d’un web shell bien connu (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_PHP_IN_MEDIA'	=> 'Présence de code PHP dans un fichier qui n’est pas un script, par exemple une image. Caractéristique d’une porte dérobée : <code>%s</code>',
	'STOKER_FC_FINDING_CONTENT_PHP_IN_ARCHIVE'	=> 'Archive contenant du code PHP qui n’est pas comprimé. Généralement un script partagé comme pièce jointe, vérifiez le message correspondant : <code>%s</code>',
	'STOKER_FC_FINDING_CONTENT_PHP_UPLOADED'	=> 'Téléchargement d’un fichier qui est un script PHP, généralement un script partagé comme pièce jointe. Vérifiez le message correspondant : <code>%s</code>',
	'STOKER_FC_FINDING_CONTENT_PHP_IN_TEXT'		=> 'Fichier de texte contenant du code PHP. Généralement une rustine ou un tutoriel partagé comme pièce jointe ; PHP ne l’exécute pas. Vérifiez son origine : <code>%s</code>',
	'STOKER_FC_FINDING_CONTENT_INCOMPLETE'		=> 'Recherche incomplète dans le fichier, une règle de recherche a abandonné en fonction du contenu. Des lignes conçues pour tromper la recherche peuvent dissimuler du code. Vérifiez le fichier manuellement : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_UNREADABLE'		=> 'Un fichier dans un dossier en écriture ne peut pas être lu. Pas de recherche de code PHP. Faites que PHP puisse le lire, ou vérifiez manuellement : <code>%s</code>',

	// Attachment of a file in the attachment directory
	'STOKER_FC_ATTACHMENT_POST'		=> 'Pièce jointe <strong>%1$s</strong> dans le message <a href="%2$s">%3$s</a> par %4$s',
	'STOKER_FC_ATTACHMENT_PM'		=> 'Pièce jointe <strong>%1$s</strong> dans un message privé de  %2$s',
	'STOKER_FC_ATTACHMENT_ORPHAN'	=> 'Pièce jointe <strong>%1$s</strong> téléchargée par %2$s mais jamais publiée, voir les <a href="%3$s">Pièces jointes orphelines</a>',
	'STOKER_FC_ATTACHMENT_NONE'		=> 'Aucune pièce jointe n’utilise ce fichier. Il n’a pas été téléchargé avec phpBB.',

	'STOKER_FC_FINDING_CONTENT_CONFIG_PREPEND'	=> 'La configuration du serveur exécute un script avant ou après tous les autres scripts (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_CONFIG_HANDLER'	=> 'La configuration du serveur exécute des fichiers d’image ou de texte comme du PHP (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_RUN_FUNCTION'	=> 'Un fichier modifié ou nouveau exécute du code ou des instructions du shell (ligne %2$d). Vérifiez que c’est voulu : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_DECODE_NESTED'	=> 'Un fichier modifié ou nouveau décode deux fois des données, souvent pour dissimuler du code (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_ENCODED_BLOB'	=> 'Un fichier modifié ou nouveau contient de longues données codées,  souvent pour dissimuler du code (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_UPLOAD_REQUEST'	=> 'Un fichier modifié ou nouveau enregistre des fichiezrs téléchargés sans les contrôles de téléchargement de phpBB (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_MINER'			=> 'Un fichier modifié ou nouveau renomme un navigateur comme cryptomineur (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_HIDDEN_IFRAME'	=> 'Un fichier modifié ou nouveau possède un frame que les visiteurs ne peuvent pas voir (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_JS_EVAL'			=> 'Un fichier modifié ou nouveau décompresse et exécute un script dans le navigateur (ligne %2$d) : <code>%1$s</code>',
	'STOKER_FC_FINDING_CONTENT_TOO_LARGE'		=> 'Fichier de plus de 2 Mo, non analysé à la recherche de code suspect : <code>%s</code>',
	'STOKER_FC_FINDING_CONTENT_BACKLOG'			=> [
		1	=> '%2$d fichier modifié dans <code>%1$s</code> n’a pas été analysé à la recherche de code PHP au cours du scan. Le prochain scan continuera.',
		2	=> '%2$d fichiers modifiés dans <code>%1$s</code> n’ont pas été analysés à la recherche de code PHP au cours du scan. Le prochain scan continuera..',
	],

	// Diff page
	'STOKER_FC_DIFF_VIEW'			=> 'Affichage des changements',
	'STOKER_FC_DIFF_TITLE'			=> 'Changements dans les fichiers du cœur de phpBB',
	'STOKER_FC_DIFF_EXPLAIN'		=> 'Le fichier du forum est comparé ligne par ligne à l’original %s sur phpBB, téléchargé depuis le dépôt sur GitHub.<br>L’original n’est utilisé que si le hachage SHA-256 correspond au manifeste. Les espaces, les tabulations et les fins de ligne ne comptent pas comme changement.',
	'STOKER_FC_DIFF_BACK'			=> 'Retour aux résultats',
	'STOKER_FC_DIFF_FILE'			=> 'Fichier',
	'STOKER_FC_DIFF_GITHUB'			=> 'Original',
	'STOKER_FC_DIFF_GITHUB_OPEN'	=> 'Ouvrir le fichier phpBB %s sur GitHub',
	'STOKER_FC_DIFF_CHANGES'		=> 'Changements',
	'STOKER_FC_DIFF_ADDED'			=> [
		1	=> '%d ligne ajoutée',
		2	=> '%d lignes ajoutées',
	],
	'STOKER_FC_DIFF_REMOVED'		=> [
		1	=> '%d ligne supprimée',
		2	=> '%d lignes supprimées',
	],
	'STOKER_FC_DIFF_MISSING'		=> 'Le fichier manque sur le forum, la totalité de l’original est considérée comme supprimée.',
	'STOKER_FC_DIFF_TRUNCATED'		=> [
		1	=> 'Les changements sont trop importants pour être affichés en totalité. %d ligne changée de plus n’est pas affichée. Cliquez sur le lien pour comparer le reste.',
		2	=> 'Les changements sont trop importants pour être affichés en totalité. %d lignes changées de plus ne sont pas affichées. Cliquez sur le lien pour comparer le reste..',
	],
	'STOKER_FC_DIFF_UNAVAILABLE'	=> 'Aucun original vérifié n’est disponible pour ce résultat. Les changements doivent concerner des résultats en attente dans les fichiers du cœur lorsque le manifeste correspond à la version du forum. Les fichiers dans les dossiers vendor/ et ext/phpbb/viglink/ ne sont pas compris dans le dépôt phpBB repository, le fichier config.php n’est jamais affiché.',
	'STOKER_FC_DIFF_STATUS_UNCHANGED'		=> 'Le fichier correspond à nouveau à l’original. Le prochain scan résoudra le résultat.',
	'STOKER_FC_DIFF_STATUS_NOT_FOUND'		=> 'Le fichier n’existe pas dans le dépôt phpBB de cette version. Il ne peut pas être comparé.',
	'STOKER_FC_DIFF_STATUS_FETCH_FAILED'	=> 'L’original n’a pas pu être téléchargé depuis GitHub : %s',
	'STOKER_FC_DIFF_STATUS_UNVERIFIED'		=> 'Le fichier téléchargé depuis GitHub ne correspond pas au hachage dans le manifeste et ne sera pas utilisé. Pour les versions de phpBB antérieures à 3.3.14, cela peut également être une erreur de page de GitHub, veuillez réessayer ultérieurement.',
	'STOKER_FC_DIFF_STATUS_UNREADABLE'		=> 'Le fichier du forum ne peut pas être lu.',
	'STOKER_FC_DIFF_STATUS_TOO_LARGE'		=> 'Le fichier est supérieur à 2 Mo ou comporte trop de lignes, ce qui empêche la comparaison.',
	'STOKER_FC_DIFF_STATUS_BINARY'		=> 'Le fichier n’est pas un fichier de texte et ne peut pas être comparé line après line.',
	'STOKER_FC_DIFF_STATUS_LINE_ENDINGS'	=> 'Seules les fins de ligne diffèrent par rapport à l’original, le contenu est le même. Le fichier a probablement été sauvegardé ou téléchargé avec les fins de ligne de Windows (CR LF). Retéléchargez en mode binaire, ou avec les fins de ligne Unix (LF).',
	'STOKER_FC_DIFF_STATUS_MINIFIED'		=> 'Le fichier possède des lignes très longues, comme un script minimifié. La comparaison ligne par ligne n’a pas de sens.',
	'STOKER_FC_DIFF_STATUS_LINKED'		=> 'Le fichier, ou un dossier de son chemin d’accès, est un lien symbolique ou une jonction. Son contenu n’est pas affiché, car un lien peut pointer sur n’importe quel fichier que le serveur peut lire. Remplace le lie pear le fichier original.',
	'STOKER_FC_DIFF_HTTP_STATUS'	=> 'HTTP code %d',
	'STOKER_FC_DIFF_MARKS'			=> 'Marques',
	'STOKER_FC_DIFF_MARK_CRLF'		=> 'Fin de ligne Windows',
	'STOKER_FC_DIFF_MARK_CR'		=> 'Fin de ligne avec CR',
	'STOKER_FC_DIFF_MARK_NO_EOL'	=> 'Pas de fin de ligne à la fin du fichier',
	'STOKER_FC_DIFF_MARK_BOM'		=> 'Marque d’ordre des octets',
	'STOKER_FC_DIFF_MARK_TRAILING'	=> 'Espaces ou tabulations à la fin de la ligne',
	'STOKER_FC_DIFF_LABEL_BOM'		=> 'BOM',
	'STOKER_FC_DIFF_LABEL_CRLF'		=> 'CRLF',
	'STOKER_FC_DIFF_LABEL_CR'		=> 'CR',
	'STOKER_FC_DIFF_LABEL_EOF'		=> 'EOF',
]);
