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
	// Header
	'ACP_STOKER_BADGE'				=> 'Extension Health Monitor',
	'ACP_STOKER_SETTINGS_EXPLAIN'		=> 'Si vous appréciez cette extension, vous pouvez :',
	'ACP_STOKER_DONATION'			=> 'Faire un don',
	'ACP_STOKER_MEMBER'				=> 'Devenir membre actif de ma communauté',
	'ACP_STOKER_SUPPORT'			=> 'Fournir une assistance sur l’extension',
	'ACP_STOKER_TOGGLE_ERROR'		=> 'Erreur de la bascule. Veuillez réessayer.',

	// Version check
	'ACP_STOKER_HM_VC_OK'			=> 'Vous exécutez la dernière version (%s)',
	'ACP_STOKER_HM_VC_OUTDATED'		=> 'Une nouvelle version existe : %2$s (%1$s chez vous). Cliquez pour la télécharger.',
	'ACP_STOKER_HM_VC_UNAVAILABLE'	=> 'Contrôle de version inaccessible',

	// General
	'STOKER_HM_NEVER'				=> 'Jamais',
	'STOKER_HM_GLOBAL'				=> 'Forum',
	'STOKER_HM_EXTENSION'			=> 'Extension',
	'STOKER_HM_EXTENSIONS'			=> 'Extensions',
	'STOKER_HM_STATUS'				=> 'État',
	'STOKER_HM_ENABLED'				=> 'Activée',
	'STOKER_HM_NOT_ENABLED'			=> 'Non activée',
	'STOKER_HM_SECONDS'				=> 'secondes',
	'STOKER_HM_MILLISECONDS'		=> 'millisecondes',

	// Severity
	'STOKER_HM_SEVERITY'			=> 'Gravité',
	'STOKER_HM_SEVERITY_ALL'			=> 'Tout',
	'STOKER_HM_SEVERITY_0'			=> 'Infos',
	'STOKER_HM_SEVERITY_1'			=> 'Avertissements',
	'STOKER_HM_SEVERITY_2'			=> 'Erreurs',

	// States
	'STOKER_HM_STATE_ACTIVE'		=> 'En attente',
	'STOKER_HM_STATE_IGNORED'		=> 'Ignoré',
	'STOKER_HM_STATE_RESOLVED'		=> 'Résolu',

	// Checks
	'STOKER_HM_CHECK'					=> 'Contrôle',
	'STOKER_HM_CHECK_COMPOSER'			=> 'composer.json',
	'STOKER_HM_CHECK_MIGRATION_STATE'	=> 'Migrations',
	'STOKER_HM_CHECK_ORPHAN'			=> 'Données orphelines',
	'STOKER_HM_CHECK_ROUTE_CONFLICT'	=> 'Conflits de routes',
	'STOKER_HM_CHECK_INTEGRITY'			=> 'Intégrité des fichiers',
	'STOKER_HM_CHECK_PARSE'				=> 'Syntaxe PHP',
	'STOKER_HM_CHECK_ENABLEABLE'		=> 'Exigences de validation',
	'STOKER_HM_CHECK_FOLDERS'			=> 'Dossiers des extensions',

	// Issues page
	'STOKER_HM_LAST_RUN'			=> 'Dernier scan achevé',
	'STOKER_HM_LAST_RUN_EXPLAIN'	=> 'Les scans sont lancés par petits paquets gérés par le cron de phpBB, ou en cliquant sur le bouton ci-dessous.',
	'STOKER_HM_NEXT_RUN'			=> 'Prochain scan prévu',
	'STOKER_HM_NEXT_RUN_EXPLAIN'	=> 'Défini par l’intervalle de scan dans les paramètres. Le cron de phpBB s’exécute lorsque le forum a des visiteurs, ou lorsque le cron system est paramétré, si bien que le scan peut se dérouler plus tard que ce qui est indiqué. Les pages du panneau d’administration ne déclenchent pas le cron.',
	'STOKER_HM_NEXT_RUN_OFF'		=> 'Les scans automatiques sont inhibés',
	'STOKER_HM_NEXT_RUN_BUILDING'	=> 'Lorsque le calcul des signatures sera achév',
	'STOKER_HM_NEXT_RUN_CONTINUE'	=> 'Le scan en cours se poursuit avec le cron suivant, ce qui suppose une visite du forum ou le cron système',
	'STOKER_HM_NEXT_RUN_DUE'		=> 'En attente, lancement par le prochain cron, ce qui suppose une visite du forum ou le cron système',
	'STOKER_HM_NEXT_RUN_LOCKED'		=> 'En attente d’un cron ou d’un batch en cours ou interrmpu, au plus tard à %s',
	'STOKER_HM_RUNNING'				=> 'Scan en cours',
	'STOKER_HM_OPEN_ISSUES'			=> 'Résultats en attente',
	'STOKER_HM_NO_BASELINE_NOTICE'	=> 'Aucune signature n’a été calculée, le contrôle d’intégrité des fichiers est ignoré.',
	'STOKER_HM_RUN_NOW'				=> 'Lancer le scan maintenant',
	'STOKER_HM_RUN_NOW_EXPLAIN'		=> 'La page se recharge jusqu’à la fin de tous les contrôles.',
	'STOKER_HM_CONTINUE_SCAN'		=> 'Poursuivre le scan',
	'STOKER_HM_ISSUES'				=> 'Résultats',
	'STOKER_HM_MESSAGE'				=> 'Message',
	'STOKER_HM_SEEN'				=> 'Première/dernière occurence',
	'STOKER_HM_RESOLVED'			=> 'Résolu',
	'STOKER_HM_IGNORE'				=> 'Ignorer',
	'STOKER_HM_NO_ISSUES'			=> 'Pas de résultats.',
	'STOKER_HM_ISSUE_NOT_FOUND'		=> 'Le résultat n’existe pas.',
	'STOKER_HM_SCAN_DONE'			=> 'Scan terminé.',
	'STOKER_HM_SCAN_PROGRESS'		=> 'Scan en cours, patientez…<br>Contrôle : %1$s<br>Extension: %2$s',

	// Export
	'STOKER_HM_EXPORT'				=> 'Télécharger la liste',
	'STOKER_HM_EXPORT_CSV'			=> 'CSV',
	'STOKER_HM_EXPORT_PDF'			=> 'PDF',
	'STOKER_HM_PROF_EXPORT'			=> 'Télécharger les mesures affichées',
	'STOKER_HM_FIRST_SEEN'			=> 'Première occurence',
	'STOKER_HM_LAST_SEEN'			=> 'Dernière occurence',
	'STOKER_HM_REPORT_ISSUES'		=> 'Extension health issues',
	'STOKER_HM_REPORT_PROFILER'		=> 'Profileur des extensions',
	'STOKER_HM_REPORT_GENERATED'	=> 'Produit',
	'STOKER_HM_REPORT_FILTER'		=> 'Liste',
	// Letters, digits, - and _ only, other characters are removed from the file name
	'STOKER_HM_REPORT_FILENAME'		=> 'extension-health',
	'STOKER_HM_PURGE'				=> 'Purger les résultats résolus',
	'STOKER_HM_REPORT_PRODUCER'		=> 'Extension Health Monitor',

	// Purge
	'STOKER_HM_PURGE_OLDER'			=> 'Résolution après ',
	'STOKER_HM_PURGE_EXPLAIN'		=> 'Suppression des résultats résolus après le nombre de jours. La valeur 0 supprime toutes les résultats résolus. Les résultats ignorés ne sont jamais purgés.',
	'STOKER_HM_PURGE_CONFIRM_DAYS'	=> [
		1	=> 'Êtes-vous certain de vouloir supprimer les résultats résolus de plus de %d jour ?',
		2	=> 'Êtes-vous certain de vouloir supprimer les résultats résolus de plus de %d jours ?',
	],
	'STOKER_HM_PURGE_CONFIRM_ALL'	=> 'Êtes-vous certain de vouloir supprimer tous les résultats résolus ?',
	'STOKER_HM_PURGE_DONE'			=> [
		0	=> 'Aucun résultat résolu n’a été supprimé.',
		1	=> '%d résultat résolu a été supprimé.',
		2	=> '%d résultats résolus ont été supprimés.',
	],

	// Baseline page
	'STOKER_HM_BASELINE_EXPLAIN'		=> 'La signature contient un hachage SHA-256 pour tous les fichiers des extensions. Le contrôle dintégrité des fichiers signale les fichiers ajoutés, modifiés ou supprimés par la suite. Ne calculez la signature que si vous savez que les fichiers sont propres, et recommencez pour les extensions après une mise à jour. <br><strong>Nota bene :</strong> les signatures sont stockées dans la base de données. Elles permettent de détecter les infections e fichiers, mais non pas les attaques qui parviennent à modifier la base de données.',
	'STOKER_HM_BASELINE_TIME'			=> 'Date de calcul',
	'STOKER_HM_BUILDING'				=> 'Calcul en cours',
	'STOKER_HM_BUILD_ALL'				=> 'Calcul des signatures pour toutes les extensions',
	'STOKER_HM_BUILD_ALL_EXPLAIN'		=> 'Remplacement de la signature existante.',
	'STOKER_HM_BUILD_CONTINUE'			=> 'Continuer',
	'STOKER_HM_FILES'					=> 'Fichiers',
	'STOKER_HM_BASELINE_VERSION'		=> 'Version',
	'STOKER_HM_BASELINE_VERSION_CHANGED'	=> 'L’extension a déclaré une nouvelle version, recalculez la signature après mise à jour',
	'STOKER_HM_REBUILD'					=> 'Recalculer',
	'STOKER_HM_BASELINE_CONFIRM_ALL'	=> 'Remplacer la signature pour tous les domaines à partir des fichiers courants ?',
	'STOKER_HM_BASELINE_CONFIRM_EXT'	=> 'Remplacer la signature de %s à partir des fichiers courants ?',
	'STOKER_HM_BASELINE_PROGRESS'		=> 'Calcul des signatures, patientez…',
	'STOKER_HM_BASELINE_DONE'			=> 'La signature a été calculée.',
	'STOKER_HM_BASELINE_BUSY'			=> 'Un scan ou un batch de signature est en cours. Veuillez réessayer dans un instant.',

	// Settings page
	'STOKER_HM_INTERVAL'				=> 'Intervalle entre scans',
	'STOKER_HM_INTERVAL_EXPLAIN'		=> 'Heures entre les scans automatiques. La valeur 0 inhibe le scan automatique.',
	'STOKER_HM_TIME_BUDGET'				=> 'Temps par batch',
	'STOKER_HM_TIME_BUDGET_EXPLAIN'		=> 'Nombre maximum de secondes pour une requête unique de scan, de calcul ou de profilage. Réglez bien au-dessous du aramètre max_execution_time.',
	'STOKER_HM_PURGE_DAYS'				=> 'Purge des résultats résolus après',
	'STOKER_HM_PURGE_DAYS_EXPLAIN'		=> 'Les résultats résolus plus anciens sont supprimés à la fin de chaque scan. La valeur 0 les conserve.',
	'STOKER_HM_NOTIFY'					=> 'Informer les fondateurs des nouvelles erreurs',
	'STOKER_HM_NOTIFY_EXPLAIN'			=> 'Lorsqu’un scan automatique détecte des erreurs nouvelles ou réapparues, les fondateurs reçoivent un avis. L’inscription dans le journal d’administration se produit toujours. Les fondateurs peuvent inhiber ces informations dans leur panneau d’utilisateur.',
	'STOKER_HM_BANNER'					=> 'Afficher une bannière aux fondateurs',
	'STOKER_HM_BANNER_EXPLAIN'			=> 'Tant que des erreurs sont en cours et n’ont pas été ignorées, les fondateurs ont une bannière affichée sur toutes les pages du forum et sur l’index du panneau d’administration. Contrairement aux notifications, elle reste affichée tant que les erreurs n’ont pas été traitées. Les autres utilisateur ne voient rien.',
	'STOKER_HM_BANNER_DISMISS'			=> 'Autoriser l’inhibition de la bannière',
	'STOKER_HM_BANNER_DISMISS_EXPLAIN'	=> 'Les fondateurs peuvent inhiber la bannière pour tous les fondateurs. Celle-ci revient lorsqu’un scan détecte des erreurs nouvelles ou réapparues. Laissez la fonction pour conserver la bannière tant que les erreurs n’ont pas été résolues ou ignorées. Cela réaffiche également une bannière précédemment inhibée.',
	'STOKER_HM_REPEAT_THRESHOLD'		=> 'Seuil de répétition des requêtes',
	'STOKER_HM_REPEAT_THRESHOLD_EXPLAIN'	=> 'Le prodileur signale qu’une requête est répétée lorqu’une extension répète ce nombre de fois la même instruction, avec des valeurs différentes, sur une page. Cela signalé généralement un boucle.',
	'STOKER_HM_SLOW_MS'					=> 'Seuil des requêtes lentes',
	'STOKER_HM_SLOW_MS_EXPLAIN'			=> 'Le profileur signale une requête lente lorsqu’elle exige ce temps d’exécution. S’applique aux mesures postérieures à la modification.',

	// Profiler
	'STOKER_HM_PROF_EXPLAIN'			=> 'Sur un échantillon de pages vues, on mesure quelles sont les extensions qui interrogent la base de données, la durée d’exécution de ces interrogations, la durée d’exécution des listeners et la durée d’exécution des pages de l’extension. Les demandes appartiennent à l’extension la plus basse dans la pile d’appels : les interrogations gérées par l’extension elle-même sont « directes », les appels passant par une fonction du cœur apparaissent au sein de cette fonction.',
	'STOKER_HM_PROF_ACTIVE_UNTIL'		=> 'Profilage jusqu’à %s',
	'STOKER_HM_PROF_INACTIVE'			=> 'Pas de profilage',
	'STOKER_HM_PROF_STARTED_AT'			=> 'Première mesure',
	'STOKER_HM_PROF_REQUESTS'			=> 'Pages vues et profilées',
	'STOKER_HM_PROF_REQUESTS_EXPLAIN'	=> 'Requêtes web échantillonnées, appels AJAX compris. Avec un taux d’échantillonnage supérieur à 1, il s’agit d’une partie des pages réellement vues, non pas du total. Les crons sont comptabilisés à part. Les pages de l’ACP et les lignes de commande ne sont jamais mesurées.',
	'STOKER_HM_PROF_CRON_RUNS'			=> 'Crons',
	'STOKER_HM_PROF_CRON_RUNS_EXPLAIN'	=> 'Requêtes cron échantillonnées pour lesquelles une tâche a effectivement été exécutée. Les crons n’exécutant rien parce que le lock a échoué ou parce que la tâche n’était pas prête ne sont pas comptés. Le temps et les requêtes des crons ne sont pas inclus dans les pages vues.',
	'STOKER_HM_PROF_CRON_MS'			=> 'ms par cron',
	'STOKER_HM_PROF_CRON_QUERIES'		=> 'Requêtes cron',
	'STOKER_HM_PROF_CRON_TASKS'			=> 'Tâches cron',
	'STOKER_HM_PROF_CRON_TASKS_EXPLAIN'	=> 'Partie de l’appel run() de la tâche qui est créditée au compte de l’extension qui possède la tâche. Le traitement du verrouillage des crons n’est pas inclus.',
	'STOKER_HM_PROF_CRON_QUERY_SOURCES'	=> 'Sources des requêtes cron',
	'STOKER_HM_PROF_CRON_QUERY_SOURCES_EXPLAIN'	=> 'Requêtes exécutées dans l’appel run() de la tâche, par la tâche elle-même ou par les listeners d’autres extensions déclenchées.',
	'STOKER_HM_PROF_CRON_OVERHEAD'		=> 'Overhead des requêtes cron',
	'STOKER_HM_PROF_CRON_OVERHEAD_EXPLAIN'	=> 'Appels d’une requête cron en dehors de l’appel run() de sa tâche, par exemple préparation de la session et listeners qui s’y exécutent. Cela se produit pour toutes les requêtes cron, quelle que soit la tâche, et se trouve réparti sur tous les crons et non pas comptabilisés comme des requêtes cron d’une extension particulière.',
	'STOKER_HM_PROF_QUERIES_RUN'		=> 'Requêtes par cron',
	'STOKER_HM_PROF_TASK'				=> 'Tâche',
	'STOKER_HM_PROF_CHECK'				=> 'Autocontrôle de l’attribution',
	'STOKER_HM_PROF_CHECK_EXPLAIN'		=> 'Tous les fichiers de toutes les extensions activées, en suivant le chemin d’accès PHP, sont bien attribués à cette extension. On utilise une des classes déjà chargée, si bien que rien n’est chargé pour ce contrôle. Les extensions sans classe chargée pour cette page ne sont pas contrôlées..',
	'STOKER_HM_PROF_CHECK_OK'			=> [
		0	=> 'Aucune des %2$d extensions activées n’a chargé un fichier à contrôler',
		1	=> '%1$d extension contrôlée sur %2$d activées, avec attribution correcte',
		2	=> '%1$d extensions contrôlées sur %2$d activées, toutes avec attribution correcte',
	],
	'STOKER_HM_PROF_DISABLED'			=> 'inhibé, mesure antérieure',
	'STOKER_HM_PROF_CHECK_SKIPPED'		=> 'Non contrôlé',
	'STOKER_HM_PROF_CHECK_SKIPPED_EXPLAIN'	=> 'Aucune de leurs classes n’est chargée sur cette page.',
	'STOKER_HM_PROF_CHECK_BAD'			=> 'Échec, voir le message en tête de la page',
	'STOKER_HM_PROF_CHECK_FAILED'		=> 'Les requêtes de ces extensions sont attribuées au cœur, parce que leurs fichiers ne sont pas reconnus :',
	'STOKER_HM_PROF_CHECK_ROW'			=> 'PHP rapporte <code>%1$s</code>, le dossier de l’extension est <code>%2$s</code>, attribué à : %3$s',
	'STOKER_HM_PROF_PENDING'			=> [
		1	=> '%d en attente d’être compté',
		2	=> '%d en attente d’être compté',
	],
	'STOKER_HM_PROF_HOURS'				=> 'Mesure pendant',
	'STOKER_HM_PROF_HOURS_EXPLAIN'		=> 'Les mesures s’arrêtent d’elles-mêmes après ce temps, maximum 168 heures.',
	'STOKER_HM_PROF_SAMPLE'				=> 'Échantillonnage',
	'STOKER_HM_PROF_SAMPLE_EXPLAIN'		=> 'Échantillonnage d’une page sur ce total de pages vues. Une valeur 1 signifie que toutes les pages sont mesurées et que toutes les valeurs sont exactes. Une valeur supérieure réduit la charge des forums très chargés : les moyennes restent exactes, mais les comptages ne comprennent que les pages mesurées et les pages rarement visitées peuvent ne pas être mesurées du tout. Chaque page mesurée représente une ligne. Supprimez les mesures avant de modifier l’échantillonnage, sinon vous additionnez des valeurs prises à des taux d’échantillonnage différents.',
	'STOKER_HM_PROF_START'				=> 'Lancement de la mesure',
	'STOKER_HM_PROF_STOP'				=> 'Arrêt de la mesure',
	'STOKER_HM_PROF_RESET'				=> 'Suppression des mesures',
	'STOKER_HM_PROF_RESET_CONFIRM'		=> 'Êtes-vous certain de vouloir supprimer toutes les mesures du profileur ?',
	'STOKER_HM_PROF_RESET_DONE'			=> 'Les mesures ont été supprimées.',
	'STOKER_HM_PROF_BUSY'				=> 'Les mesures sont en cours de comptage. Veuillez réessayer dans un instant.',
	'STOKER_HM_PROF_STARTED'			=> 'Le profileur a démarré.',
	'STOKER_HM_PROF_STOPPED'			=> 'Le prodileur est arrêté.',
	'STOKER_HM_PROF_DB_CONFLICT'		=> 'Les requêtes ne peuvent pas être mesurées, car une autre extension a déjà remplacé le service de la base de données avec <code>%s</code>.',
	'STOKER_HM_PROF_DISPATCHER_CONFLICT'	=> 'Les durées et événements des listeners ne peuvent pas être mesurés, car une autre extension a déjà remplace le service de la base de données avec  <code>%s</code>. Les requêtes continuent d’être mesurées.',
	'STOKER_HM_PROF_CRON_CONFLICT'		=> 'La durée des tâches cron ne peut pas être mesurée, car une autre extension a déjà remplacé le cron avec <code>%s</code>. Les requêtes cron sont ignorées dans les mesures.',
	'STOKER_HM_PROF_MISSING'			=> 'Le profileur n’est pas activé. Purgez le cache du forum et rechargez la page.',
	'STOKER_HM_PROF_PER_EXTENSION'		=> 'Par extension',
	'STOKER_HM_PROF_PER_EXTENSION_EXPLAIN'	=> 'Un hit est une vue de page mesurée sur laquelle l’extension a exécuté au moins une requête. Les chiffres s’entendent par hit, indiquent donc le coût des extensions sur les pages où elles interviennent et le nombre de hits indique la fréquence parmi les vues de pages mesurées. La durée du listener s’entend par vue de page mesurée, parce que le listener est exécuté qu’il y ait ou non des requêtes. Les requêtes directes sont lancées par l’extension elle-même, les interrogations via les fonctions du cœur sont exécutées par le cœur comme l’a demandé l’extension. Les chiffres des cron proviennent des crons uniquement, les interrogations des crons sont celles exécutées dans le run() du cron. Toutes les extensions activées sont listées. Celles qui n’affichent que des zéros n’utilisent rien de mesurable, par exemple en ajoutant seulement un script ou un gabarit. Cliquez sur chaque extension pour plus de détails..',
	'STOKER_HM_PROF_CORE'				=> 'Cœur de phpBB, pas d’extension dans la pile des appels',
	'STOKER_HM_PROF_UNMEASURED'			=> 'Non attribué : interrogations antérieures aux débuts du profileur sur une requête (phpBB charge ses valeurs dynamiques de configuration, 1 interrogation par page vue) ou code appelant dbal.conn.driver directement',
	'STOKER_HM_PROF_NO_DATA'			=> 'Pas encore de mesures.',
	'STOKER_HM_PROF_TOP'				=> 'Lignes avec maximum d’interrogations ou de temps, parmi toutes les extensions.',
	'STOKER_HM_PROF_FILTERED'			=> 'Details sur %s.',
	'STOKER_HM_PROF_SHOW_ALL'			=> 'Montrer toutes les extensions',
	'STOKER_HM_PROF_HITS'				=> 'Hits',
	'STOKER_HM_PROF_HITS_OF'			=> '%1$d sur %2$d',
	'STOKER_HM_PROF_QUERIES_HIT'		=> 'Interr. par hit',
	'STOKER_HM_PROF_DIRECT_HIT'			=> 'Direct par hit',
	'STOKER_HM_PROF_VIA_HIT'			=> 'Fonctions du cœur par hit',
	'STOKER_HM_PROF_CACHED_HIT'			=> 'Cache par hit',
	'STOKER_HM_PROF_SQL_MS_HIT'			=> 'SQL en ms par hit',
	'STOKER_HM_PROF_LISTENER_MS_PAGE'	=> 'Listener en ms par page vue',
	'STOKER_HM_PROF_OWN_PAGES'			=> 'Pages propres',
	'STOKER_HM_PROF_OWN_PAGE_MS'		=> 'ms par page propre',
	'STOKER_HM_PROF_QUERY_SOURCES'		=> 'Sources des interrogations',
	'STOKER_HM_PROF_EVENT'				=> 'Événement',
	'STOKER_HM_PROF_SOURCE'				=> 'Code de l’extension',
	'STOKER_HM_PROF_VIA'				=> 'Via',
	'STOKER_HM_PROF_DIRECT'				=> 'Direct',
	'STOKER_HM_PROF_QUERIES'			=> 'Interrogations',
	'STOKER_HM_PROF_CACHED'				=> 'Cachées',
	'STOKER_HM_PROF_SQL_MS_QUERY'		=> 'SQL en ms par interrogation',
	'STOKER_HM_PROF_REPEATS'			=> 'Interrogations répétées',
	'STOKER_HM_PROF_REPEATS_EXPLAIN'	=> 'Instructions exécutées au moins %d foir par page vue, valeurs remplacées par ?. La colonne des pages vues indique le nombre de hits concernés. Les interrogations traitées par le cache ne sont pas dénombrées.',
	'STOKER_HM_PROF_STATEMENT'			=> 'Instruction',
	'STOKER_HM_PROF_SLOW'				=> 'Interrogations lentes',
	'STOKER_HM_PROF_SLOW_EXPLAIN'		=> 'Interrogations individuelles ayant demandé au moins %d ms, sur les pages vues et les crons, valeurs remplacées par ?. Les interrogations du cœur sont incluses, car elles peuvent être lentes à cause de données ajoutées par une extension. La colonne événement indique l’événement du listener ou la tâche cron. Les temps sont mesurés par PHP et un serveur chargé ralentit toutes les interrogations.',
	'STOKER_HM_PROF_SLOW_NONE'			=> 'Pour le moment, aucune interrogation n’a pris %d ms ou plus dans les mesures.',
	'STOKER_HM_PROF_EVENT_TASK'			=> 'Événement ou tâche',
	'STOKER_HM_PROF_SLOW_RUNS'			=> 'Nombre',
	'STOKER_HM_PROF_MS_AVG'				=> 'Moyenne en ms',
	'STOKER_HM_PROF_MS_MAX'				=> 'Maximum en ms',
	'STOKER_HM_PROF_CORE_SHORT'			=> 'Cœur de phpBB',
	'STOKER_HM_PROF_REPEAT_PAGES'		=> 'Pages vues',
	'STOKER_HM_PROF_RUNS_PAGE'			=> 'Exécutions par page vue',
	'STOKER_HM_PROF_SQL_MS_PAGE'		=> 'SQL ms par page vue',
	'STOKER_HM_PROF_LISTENERS'			=> 'Listeners',
	'STOKER_HM_PROF_LISTENERS_EXPLAIN'	=> 'Cette valeur est la mémoire conservée par le listener quand il retourne, non compris les listeners imbriqués. Elle est négative lorsque le listener a libéré plus de mémoire qu’il n’en conserve. La mémoire utilisée et libérée dans l’appel est invisible.',
	'STOKER_HM_PROF_LISTENER'			=> 'Listener',
	'STOKER_HM_PROF_CALLS_PAGE'			=> 'Appels par page vue',
	'STOKER_HM_PROF_MS_CALL'			=> 'ms par appel',
	'STOKER_HM_PROF_MS_PAGE'			=> 'ms par page vue',
	'STOKER_HM_PROF_KB_CALL'			=> 'Ko conservé par appel',
	'STOKER_HM_PROF_CONTROLLERS'		=> 'Pages propres',
	'STOKER_HM_PROF_CONTROLLERS_EXPLAIN'	=> 'Pages servies par les routes de l’extension vis app.php. La durée est l’appel complet du contrôleur : son propre code, les interrogations, les listeners des autres extensions lancées et le rendu des gabarit.',
	'STOKER_HM_PROF_CONTROLLER'			=> 'Contrôleur',
	'STOKER_HM_PROF_VIEWS'				=> 'Vues',

	// Issue messages, parameters are escaped before they are inserted
	'STOKER_HM_ISSUE_METADATA'				=> 'composer.json ne peut être lu ou est invalide : %s',
	'STOKER_HM_ISSUE_CONSTRAINT_INVALID'	=> 'La contrainte <code>%2$s</code> sur <code>%1$s</code> ne peut pas être analysée.',
	'STOKER_HM_ISSUE_PHP_MISMATCH'			=> 'Nécessite PHP <code>%1$s</code>, serveur exécutant PHP %2$s.',
	'STOKER_HM_ISSUE_PHPBB_MISMATCH'		=> 'Supporte phpBB <code>%1$s</code>, le forum exécute phpBB %2$s.',
	'STOKER_HM_ISSUE_MIGRATION_INCOMPLETE'	=> 'La migration <code>%s</code> n’est pas achevée.',
	'STOKER_HM_ISSUE_MIGRATION_NOT_RUN'		=> 'La migration <code>%s</code> n’a pas été exécutée. Désactivez l’extension et réactivez-la pour lancer la migration.',
	'STOKER_HM_ISSUE_FILES_MISSING_ENABLED'	=> 'L’extension est activée, mais ses fichiers sont absents.',
	'STOKER_HM_ISSUE_FILES_MISSING_DISABLED'	=> 'L’extension est désactivée, mais ses fichiers sont absents. Les données ne pourront être supprimées qu’après un nouveau téléchargement des fichiers.',
	'STOKER_HM_ISSUE_INTERRUPTED_DISABLE'	=> 'La désactivation de l’extension s’est arrêtée avant la fin, si bien qu’elle continue de tourner. Cliquez à nouveau sur Désactiver dans Personnaliser  » Gérer les extensions.',
	'STOKER_HM_ISSUE_INTERRUPTED_DISABLE_NO_FILES'	=> 'La désactivation de l’extension s’est arrêtée avant la fin et les fichiers sont perdus. Téléchargez la même version à nouveau, puis cliquez sur Désactiver dans Personnaliser  » Gérer les extensions.',
	'STOKER_HM_ISSUE_INTERRUPTED_ENABLE_PURGE'	=> 'L’activation de l’extension ou la suppression de ses données s’est arrêtée avant la fin, si bien que les modifications ne sont pas complètes. Recommencez l’action dans Personnaliser  » Gérer les extensions : Activer ou Supprimer les données.',
	'STOKER_HM_ISSUE_INTERRUPTED_ENABLE_PURGE_NO_FILES'	=> 'L’activation de l’extension ou la suppression de ses données s’est arrêtée avant la fin, mais les fichiers sont perdus. Téléchargez la même version à nouveau, puis cliquez sur la même action dans Personnaliser  » Gérer les extensions : Activer ou Supprimer les données.',
	'STOKER_HM_ISSUE_NOT_ENABLEABLE'		=> 'L’extension est activée, mais la fonction <code>ext.php</code> déclare qu’elle ne peut plus être activée sur ce forum, par exemple après une mise à jour de phpBB ou de PHP. phpBB ne vérifie qu’au moment de l’activation. Vérifiez les exigences de l’extension.',
	'STOKER_HM_ISSUE_NOT_ENABLEABLE_REASONS'	=> 'L’extension est activée, mais la fonction <code>ext.php</code> déclare qu’elle ne peut plus être activée sur ce forum : %s',
	'STOKER_HM_ISSUE_ENABLEABLE_ERROR'		=> 'Échec dans l’exécution de la fonction <code>ext.php</code> pour vérifier qu ’extension peut être activée : %s',
	'STOKER_HM_ISSUE_ENABLEABLE_CRASH'		=> 'Le chargement de <code>ext.php</code> s’est arrêté avec une erreur fatale : %s. phpBB arrête de la même manière quand vous activez ou désactivez l’extension, ou quand vous supprimez ses données. Le scan ne rechargera pas le fichier avant qu’il soit modifié.',
	'STOKER_HM_ISSUE_FOLDER_MISPLACED'		=> 'Le dossier <code>ext/%1$s</code> abrite l’extension %2$s, mais phpBB ne peut charger les extensions que depuis <code>ext/vendor/name/</code>, si bien qu’il ne peut pas la voir. Déplacez le dossir vers <code>ext/%2$s/</code>.',
	'STOKER_HM_ISSUE_FOLDER_MISPLACED_NONAME'	=> 'Le dossier <code>ext/%1$s</code> abrite une extension phpBB, mais phpBB ne peut charger les extensions que depuis <code>ext/vendor/name/</code> et le fichier composer.json ne contient pas de nom valide pour savoir où elle devrait se trouver.',
	'STOKER_HM_ISSUE_FOLDER_COPY'			=> 'Le dossier <code>ext/%1$s</code> abrite un exemplaire de l’extension %2$s. phpBB charge cette extension depuis <code>ext/%2$s/</code> et ignore cet exemplaire. Si celui-ci est une nouvelle version que vous vouliez installer, déplacez-le vers <code>ext/%2$s/</code>. Sinon, supprimez-le.',
	'STOKER_HM_ISSUE_FOLDER_INVALID_NAME'	=> 'Le dossier <code>ext/%s</code> contient un fichier composer.json, mais le nom qu’il contient n’est pas un nom valide d’extension, si bien que phpBB doit l’ignorer. Le fournisseur et le nom ne doivent comporter que des lettres, des chiffres et le trait de soulignement, et avoir une longueur minimale de 2 caractères.',
	'STOKER_HM_ISSUE_FOLDER_NO_COMPOSER'	=> 'Le dossier <code>ext/%s</code> abrite des fichiers, mais sans composer.json, si bien que phpBB ne peut le traiter comme une extension. Téléchargez les fichiers manquants ou supprimez le dossier s’il s’agit d’un résidu d’une extension supprimée.',
	'STOKER_HM_ISSUE_EXT_NAME_UNSTORABLE'	=> 'Le dossier <code>ext/%s</code> comprend dans son nom des caractères qui ne peuvent pas être stockés dans la base de données, les contrôles par extension l’ignorent donc. Renommez ou supprimez le dossier.',
	'STOKER_HM_ISSUE_ORPHAN_MIGRATIONS'		=> [
		1	=> 'L’extension n’est pas installée, mais %d ligne de migration existe dans la base de données.',
		2	=> 'L’extension n’est pas installée, mais %d lignes de migration existent dans la base de données.',
	],
	'STOKER_HM_ISSUE_ORPHAN_MODULE'			=> 'L’extension n’est pas installée, mais son %1$s module <code>%2$s</code> (<code>%3$s</code>) est présent.',
	'STOKER_HM_ISSUE_MODULE_CLASS_MISSING'	=> 'Le %1$s module <code>%2$s</code> pointe sur une classe qui ne peut pas être chargée : <code>%3$s</code>.',
	'STOKER_HM_ISSUE_NOTIFY_TYPE_ENABLED'	=> [
		0	=> 'Le type de notification <code>%1$s</code> est activé, mais aucune extension installée ne le fournit. Aucune notification de ce type n’est enregistrée.',
		1	=> 'Le type de notification <code>%1$s</code> est activé, mais aucune extension installée ne le fournit. %2$d notification de ce type peut empêcher le chargement de la liste de notifications par son utilisateur.',
		2	=> 'Le type de notification <code>%1$s</code> est activé, mais aucune extension installée ne le fournit. %2$d notifications de ce type peuvent empêcher le chargement de la liste de notifications par leurs utilisateurs.',
	],
	'STOKER_HM_ISSUE_NOTIFY_TYPE_EXT_DISABLED'	=> [
		0	=> 'Le type de notification <code>%1$s</code> est activé, mais son extension est désactivée. Aucune notification de ce type n’est enregistrée..',
		1	=> 'Le type de notification <code>%1$s</code> est activé, mais son extension est désactivée. %2$d notification de ce type peut empêcher le chargement de la liste de notifications par son utilisateur.',
		2	=> 'Le type de notification <code>%1$s</code> est activé, mais son extension est désactivée. %2$d notifications de ce type peuvent empêcher le chargement de la liste de notifications par leurs utilisateurs.',
	],
	'STOKER_HM_ISSUE_NOTIFY_TYPE_DISABLED'	=> [
		0	=> 'Le type de notification <code>%1$s</code> existe dans la base de données, mais aucune extension installée ne le fournit.',
		1	=> 'Le type de notification <code>%1$s</code> existe dans la base de données avec %2$d notification stockée, mais aucune extension installée ne le fournit.',
		2	=> 'Le type de notification <code>%1$s</code> existe dans la base de données avec %2$d notifications stockées, mais aucune extension installée ne le fournit.',
	],
	'STOKER_HM_ISSUE_ROUTES_UNREADABLE'		=> 'Les routes n’ont pas pu être chargées : %s',
	'STOKER_HM_ISSUE_ROUTE_CONFLICT'		=> 'Le chemin <code>%1$s</code> est utilisé par plusieurs routes : %2$s',
	'STOKER_HM_ISSUE_NO_BASELINE'			=> 'Cette extension n’a pas de signature des fichiers.',
	'STOKER_HM_ISSUE_FILE_ADDED'			=> 'Fichier ajouté depuis la signature : <code>%s</code>',
	'STOKER_HM_ISSUE_FILE_MODIFIED'			=> 'Fichier modifié depuis la signature : <code>%s</code>',
	'STOKER_HM_ISSUE_FILE_REMOVED'			=> 'Fichier supprimé depuis la signature : <code>%s</code>',
	'STOKER_HM_ISSUE_VERSION_CHANGED'		=> 'L’extension est passée de la version %1$s à %2$s depuis lecalcul de sa signature (fichiers ajoutés : %3$d, supprimés : %4$d). Les fichiers n’ont pas été comparés. Si c’est vous qui avez installé cette mise à jour, recalculez la signature de l’extension sur la page des signatures.',	'STOKER_HM_ISSUE_PARSE_ERROR'			=> 'PHP %4$s ne peut pas analyser <code>%1$s</code>, ligne %2$d: %3$s',

	// Database leftovers
	'STOKER_HM_DB_EXPLAIN'			=> 'Lists what is in the database although neither phpBB nor an installed extension creates it: tables, columns, indexes, config keys, permissions, permission roles, modules and migration records. What phpBB and each extension create is read from their migrations on this board. This page only reports, it does not change or delete anything. Make a database backup before you remove anything by hand.',
	'STOKER_HM_DB_UNSUPPORTED'		=> 'This page is only available on phpBB 3.3.',
	'STOKER_HM_DB_SCAN'				=> 'Scan the database',
	'STOKER_HM_DB_SCAN_EXPLAIN'		=> 'Reads the migrations of phpBB and of every extension in the ext folder and compares them with the database. This can take a few seconds. The result is kept and shown here until the next scan.',
	'STOKER_HM_DB_NOT_READ'			=> 'Not everything could be read',
	'STOKER_HM_DB_SKIPPED_EXPLAIN'	=> 'An earlier scan stopped while reading the migrations of these extensions, so they were skipped. What they create may be listed as leftovers below.',
	'STOKER_HM_DB_RETRY'			=> 'Scan again with these extensions',
	'STOKER_HM_DB_BUSY'				=> 'A database scan is already running, or one stopped less than half a minute ago. Wait a moment, then open the page again to see the result or start a new scan.',
	'STOKER_HM_DB_UNREADABLE'		=> [
		1	=> '%1$d migration of %2$s could not be read. What it creates may be listed as leftovers below.',
		2	=> '%1$d migrations of %2$s could not be read. What they create may be listed as leftovers below.',
	],
	'STOKER_HM_DB_CORE'				=> 'phpBB',
	'STOKER_HM_DB_LEFTOVERS'		=> 'Leftovers',
	'STOKER_HM_DB_TOTAL'			=> [
		1	=> '%d leftover found',
		2	=> '%d leftovers found',
	],
	'STOKER_HM_DB_NONE'				=> 'No leftovers found.',
	'STOKER_HM_DB_TYPE'				=> 'Type',
	'STOKER_HM_DB_NAME'				=> 'Name',
	'STOKER_HM_DB_TABLE'			=> 'Table',
	'STOKER_HM_DB_BELONGS_TO'		=> 'Belongs to',
	'STOKER_HM_DB_TYPE_MIGRATION'	=> 'Migration records',
	'STOKER_HM_DB_TYPE_TABLE'		=> 'Table',
	'STOKER_HM_DB_TYPE_COLUMN'		=> 'Column',
	'STOKER_HM_DB_TYPE_INDEX'		=> 'Index',
	'STOKER_HM_DB_TYPE_CONFIG'		=> 'Config key',
	'STOKER_HM_DB_TYPE_CONFIG_TEXT'	=> 'Config text key',
	'STOKER_HM_DB_TYPE_PERMISSION'	=> 'Permission',
	'STOKER_HM_DB_TYPE_ROLE'		=> 'Permission role',
	'STOKER_HM_DB_TYPE_MODULE'		=> 'Module',
	'STOKER_HM_DB_MIGRATION_ROWS'	=> [
		1	=> '%d row in the migrations table',
		2	=> '%d rows in the migrations table',
	],
	'STOKER_HM_DB_STATUS_NOT_INSTALLED'	=> '%s, files present but not installed',
	'STOKER_HM_DB_STATUS_REMOVED'	=> '%s, files removed',
	'STOKER_HM_DB_STATUS_MISSING'	=> '%s, installed but the module file is missing',
	'STOKER_HM_DB_STATUS_GUESS'		=>'Possibly %s, files removed',
	'STOKER_HM_DB_STATUS_UNKNOWN'	=> 'Unknown',
	'STOKER_HM_DB_OUTSIDE'			=> 'Created outside migrations',
	'STOKER_HM_DB_OUTSIDE_EXPLAIN'	=> 'No migration creates these, but the files of an installed extension use the name, so they are most likely created by its code. They are not leftovers while the extension is installed.',
]);
