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
	'STOKER_HM_GUIDE_INTRO'			=> 'Le présent guide expose le mode de fonctionnement de l’Extension Health Monitor, ses paramétrages et le traitement de ses constatations. Chacune des pages expose les paramètres individuels et le guide décrit la logique du processus.',
	'STOKER_HM_GUIDE_CONTENTS'		=> 'Table des matières',

	// What it does
	'STOKER_HM_GUIDE_ABOUT_TITLE'	=> 'Rôle de l’Extension Health Monitor',
	'STOKER_HM_GUIDE_ABOUT_TEXT'	=> '<p>Extension Health Monitor examine les extensions installées et détermine leurs coûts. On distingue deux parties :</p>
<ul>
	<li>Le <strong>scanneur</strong> contrôle six aspects : composer.json, migrations, données orphelines, routes, intégrité des fichiers et syntaxe PHP. Les constatations sont affichées sur la page <strong>Problèmes</strong>. Voir ci-dessous les <em>Points de contrôle</em>.</li>
	<li>Le <strong>profileur</strong> mesure, sur certaines pages, les requêtes en base de données de l’extension, la durée d’exécution du listener, la durée d’exécution des pages et de ses tâches cron.</li>
</ul>
<p>L’extension comprend cinq pages sous <strong>ACP → Extensions → Extension Health Monitor</strong>:</p>
<ul>
	<li><strong>Problèmes</strong>: résultats du scanneur, lancement d’un scan, classement, téléchargement et purge des problèmes.</li>
	<li><strong>Signature des fichiers</strong> : création des signatures pour les contrôles d’intégrité des fichiers.</li>
	<li><strong>Profileur</strong> : requêtes et temps d’exécution de chaque extension.</li>
	<li><strong>Paramètres</strong> : intervalle de scan, temps écoulé, purge, notifications, bannière des fondateurs et seuils des requêtes répétées ou lentes.</li>
	<li><strong>Guide de l’utilisateur</strong> : la présente page.</li>
</ul>
<p>Accéder suppose de disposer de la permission d’administrateur <em>peut gérer les extensions</em>. L’en-tête de chaque page indique la version installée et signale une éventuelle nouvelle version.</p>
<p><strong>Limitations :</strong></p>
<ul>
	<li>La signature des fichiers est stockée dans la base de données. Elle permet de détecter les infections de fichiers, mais ne protège pas contre un attaquant ayant accès à la base de données.</li>
	<li>Le contrôle de la syntaxe PHP trouve seulement les erreurs syntaxiques. Les erreurs signalées au moment du chargement d’une classe, comme les signatures incompatibles et les classes parentes absentes, ne sont pas identifiées.</li>
	<li>Les routes portant le même <em>nom</em> sont fusionnées par phpBB avant qu’elles puissent être contrôlées, si bien que les collisions ne peuvent pas être détectées.</li>
	<li>L’extension ne recherche pas les codes malveillants. Elle détecte une modification du fichier,mais non pas si le changement est dangereux.</li>
</ul>',

	// First setup
	'STOKER_HM_GUIDE_SETUP_TITLE'	=> 'Premier paramétrage',
	'STOKER_HM_GUIDE_SETUP_TEXT'	=> '<ol>
	<li><strong>Contrôle de l’installation.</strong> Conservez le dossier <code>vendor/</code> de l’extension, la bibliothèque <code>composer/semver</code> est nécessaire sous phpBB 3.3. phpBB 4.0 la fournit.</li>
	<li><strong>Supprimez les sauvegardes.</strong> Ne conservez pas de copies de sécurité de l’extension sous l’arborescence <code>ext/</code>, par exemple <code>ext/stoker/healthmonitor_old/</code>. phpBB va charger tous les dossiers sous <code>ext/</code>, y compris les extensions non installées, et une copie peut provoquer une erreur “Cannot redeclare class” ou une erreur de lancement du profileur. Stockez les copies de sécurité en dehors du forum.</li>
	<li><strong>Créez les signatures des fichiers</strong> sur la page <strong>Signature des fichiers</strong>. Attendez que les fichiers soient propres : tous les fichiers ayant une signature sont considérés comme fiables à partir de ce moment. Tant que la signature n’existe pas, le contrtôle d’intégrité n’est pas exécuté.</li>
	<li><strong>Lancez un scan</strong> depuis la page <strong>Problèmes</strong> et examinez toutes les erreurs.</li>
	<li><strong>Contrôlez les paramètres.</strong> À partir de cet instant, la tâche cron est lancée aux intervalles sélectionnés sur la page <strong>Paramètres</strong>.</li>
</ol>',

	// Issues page
	'STOKER_HM_GUIDE_ISSUES_TITLE'	=> 'The Issues page',
	'STOKER_HM_GUIDE_ISSUES_TEXT'	=> '<p><strong>Status</strong></p>
<ul>
	<li><strong>Last completed scan</strong>: the time of the last scan that ran all checks. <em>(scan in progress)</em> is shown while a scan is unfinished.</li>
	<li><strong>Next scheduled scan</strong>: when cron starts the next automatic scan, set by <em>Scan interval</em>. It can also say that automatic scans are switched off, that the next scan follows the baseline being taken, that the scan in progress continues on the next cron call, or that it is waiting for a cron task or batch that is running or was interrupted. phpBB cron only runs when someone opens a board page, or when a system cron is set up, so a scan can start later. ACP pages do not trigger cron.</li>
	<li><strong>Open issues</strong>: the number of open, not ignored issues per severity.
		<ul>
			<li><strong>Error</strong>: something is broken or will break, such as a failed migration, a missing class, a PHP syntax error or a wrong PHP version.</li>
			<li><strong>Warning</strong>: something is wrong but the board keeps working, such as leftover data, a changed file or a phpBB version outside the supported range.</li>
			<li><strong>Info</strong>: for your information, such as an extension without a file baseline.</li>
		</ul>
	</li>
	<li><strong>File baseline</strong>: shown when no baseline exists yet. The file integrity check is skipped until you create one.</li>
</ul>
<p><strong>Run scan now</strong></p>
<p>The scan runs in short batches. The page reloads by itself after each batch and shows which check and extension it is working on, until <em>The scan is complete</em> appears. If a scan was interrupted, for example because the browser was closed or a cron batch is running, the button reads <em>Continue scan</em> and continues where the scan stopped. If cron or another administrator is running a batch at that moment, the page waits and retries up to 10 times, 3 seconds apart, before it reports that a batch is running.</p>
<p><strong>The issue list</strong></p>
<ul>
	<li>Filter with the two link rows above the list: the state (Open, Ignored or Resolved) and the severity (All severities, Error, Warning or Info).</li>
	<li>Each row shows the severity, the extension (<em>Board</em> for board-wide issues), the check, the message, and when the issue was first and last seen. The Resolved list also shows when it was resolved. The list shows 25 issues per page.</li>
	<li><strong>Download this list</strong> exports every issue of the current filter, not only the shown page. <em>CSV</em> gives a UTF-8 file for spreadsheet software, values a spreadsheet would run as a formula are prefixed with <code>&#39;</code>. <em>PDF</em> gives a landscape A4 report with the status and the list. The PDF uses the standard PDF fonts, which cover Western European languages, other characters are shown as a question mark.</li>
</ul>
<p><strong>How an issue moves between states</strong></p>
<ul>
	<li><strong>Open</strong>: found in a scan.</li>
	<li><strong>Resolved</strong>: a completed scan did not find it again. Issues of a check that could not run, for example the integrity check without a baseline, stay open.</li>
	<li><strong>Reopened</strong>: a resolved issue that is found again becomes open again. It keeps its first seen time and its ignored setting.</li>
	<li><strong>Ignored</strong>: click the toggle in the <em>Ignore</em> column. The issue moves to the Ignored list and no longer counts in the open totals or in new error alerts. Click the toggle again to bring it back. Use this for issues you know about and accept.</li>
</ul>
<p><strong>Purge resolved issues</strong></p>
<p>Enter a number of days in <em>Resolved more than</em>, 0 for all resolved issues, click <em>Purge resolved issues</em> and confirm. Ignored issues are never purged, so your choice is not lost. Resolved issues are also purged automatically after each scan, see <em>Purge resolved issues after</em> in the settings.</p>',

	// The checks
	'STOKER_HM_GUIDE_CHECKS_TITLE'	=> 'The checks',
	'STOKER_HM_GUIDE_CHECKS_TEXT'	=> '<p>Every scan runs all six checks. Checks that run per extension run for every <code>vendor/name</code> directory in <code>ext/</code> that has a <code>composer.json</code>, enabled or not, and for every installed extension, also when its <code>composer.json</code> is missing. A directory whose name cannot be stored in the database is skipped and reported by the leftover data check.</p>
<p><strong>composer.json</strong> (per extension)</p>
<ul>
	<li><strong>Error</strong>: composer.json is missing, unreadable or invalid JSON, a required field is missing, or the directory name does not match the <code>name</code> field.</li>
	<li><strong>Error</strong>: the server’s PHP version does not satisfy <code>require.php</code>.</li>
	<li><strong>Warning</strong>: the board’s phpBB version is outside <code>extra.soft-require.phpbb/phpbb</code>.</li>
	<li><strong>Warning</strong>: a version constraint cannot be parsed.</li>
</ul>
<p><strong>Migrations</strong> (per extension, installed extensions only)</p>
<ul>
	<li><strong>Error</strong>: a migration started but did not finish.</li>
	<li><strong>Error</strong>: a migration file of an enabled extension has never run. Disable and enable the extension to run it. A file that could use up PHP’s <code>memory_limit</code> during the check is not looked at, see <em>PHP syntax</em> below.</li>
</ul>
<p><strong>Leftover data</strong> (board-wide)</p>
<ul>
	<li><strong>Error</strong>: the extension is registered in the database but its files are missing, and it is enabled.</li>
	<li><strong>Warning</strong>: the same, but the extension is disabled. Its data can only be deleted after uploading the files again.</li>
	<li><strong>Warning</strong>: a directory in <code>ext/</code> whose name has characters that cannot be stored in the database, such as an emoji. The checks per extension skip it.</li>
	<li><strong>Warning</strong>: migration rows of an extension that is not installed.</li>
	<li><strong>Warning</strong>: an ACP, MCP or UCP module of an extension that is not installed.</li>
	<li><strong>Error</strong>: a module that points to a class that does not exist.</li>
	<li><strong>Error</strong>: an enabled notification type that no installed extension provides, with stored notifications. It can break the notification list for those users.</li>
	<li><strong>Warning</strong>: a notification type that no installed extension provides, without stored notifications, or disabled.</li>
</ul>
<p><strong>Routes</strong> (board-wide)</p>
<ul>
	<li><strong>Warning</strong>: two or more routes of enabled extensions or core use the same path with an overlapping HTTP method.</li>
	<li><strong>Error</strong>: the routes could not be loaded at all. Route conflicts found before stay open until the routes can be read again.</li>
</ul>
<p><strong>File integrity</strong> (per extension)</p>
<p>Compares every file with the file baseline. The check is skipped while no full baseline exists and while a baseline build is running.</p>
<ul>
	<li><strong>Warning</strong>: a file was added, changed or removed since the baseline.</li>
	<li><strong>Info</strong>: the extension has no baseline, it was installed after the last full build.</li>
</ul>
<p><strong>PHP syntax</strong> (per extension)</p>
<p>Checks whether the running PHP version can parse every <code>.php</code> file. The <code>vendor/</code> directory, files larger than 1 MB and files that could use up PHP’s <code>memory_limit</code> during the check are skipped, at 128 MB that is from about 350 KB. The files are never loaded.</p>
<ul>
	<li><strong>Error</strong>: a parse error in an enabled extension.</li>
	<li><strong>Warning</strong>: a parse error in a disabled extension.</li>
</ul>',

	// File baseline
	'STOKER_HM_GUIDE_BASELINE_TITLE'	=> 'The file baseline',
	'STOKER_HM_GUIDE_BASELINE_TEXT'		=> '<p>The baseline stores a SHA-256 hash of every file of every extension. The file integrity check reports files that were added, changed or removed since then.</p>
<p><strong>Create the baseline only when you know the files are clean.</strong> Rebuild an extension after you update it, otherwise every updated file is reported as changed.</p>
<ul>
	<li><strong>Create baseline for all extensions</strong> replaces the existing baseline. Click it and confirm, the page reloads until <em>The baseline has been created</em> appears. <em>Baseline created</em> shows the time of the last full build. The file integrity check only runs after a full build.</li>
	<li>If the build was interrupted, the button reads <em>Continue building</em>. An unfinished build is also completed by cron.</li>
	<li><strong>Rebuild one extension</strong>: the table lists every extension directory with its status, the number of files in the baseline and when they were hashed. Click <em>Rebuild</em> in the row and confirm. Do this after you update or install an extension. A single rebuild does not change <em>Baseline created</em>.</li>
</ul>',

	// Profiler
	'STOKER_HM_GUIDE_PROFILER_TITLE'	=> 'The profiler',
	'STOKER_HM_GUIDE_PROFILER_TEXT'		=> '<p>A query belongs to the innermost extension in the call stack. <em>Direct</em> means the extension ran the query itself. <em>Via a core function</em> means core ran the query because the extension called that function, the function is shown. ACP pages and command line requests are never measured.</p>
<p><strong>Start measuring</strong></p>
<ol>
	<li><strong>Measure for</strong>: 1 to 168 hours, 24 by default. Measuring stops by itself after this time.</li>
	<li><strong>Sample rate</strong>: measure 1 of this many page views, 1 to 1000. At 1 every page view is measured and all counts are exact, use this on test boards and quiet boards. A higher value lowers the load on a busy board: averages stay reliable, but counts only include measured page views, and rarely visited pages may not be measured at all. Each measured page view stores one extra database row and adds some processing time, so do not leave 1 running on a busy live board for long.</li>
	<li>Click <em>Start measuring</em>.</li>
</ol>
<p><strong>Delete the measurements before you change the sample rate</strong>, otherwise counts taken at different rates are added together. The start button is disabled when another extension has already replaced the database service, see <em>Troubleshooting</em>.</p>
<p><strong>While measuring</strong></p>
<ul>
	<li><strong>Status</strong>: <em>Measuring until</em> the end time, or <em>Not measuring</em>.</li>
	<li><strong>First measurement</strong>: when the current measurements began.</li>
	<li><strong>Measured page views</strong>: sampled web requests, AJAX calls included. <em>waiting to be counted</em> shows rows not processed yet.</li>
	<li><strong>Cron runs</strong>: sampled cron requests on which a task actually ran.</li>
	<li><strong>Attribution self-check</strong>: confirms that the files of the enabled extensions are attributed to the right extension. Extensions with no class loaded on the page are not checked and are named. If it fails, the error box at the top lists the extensions whose queries are counted as core.</li>
</ul>
<p>Measurements are counted by cron, every 10 minutes while measuring and up to one hour after, every minute while rows are waiting, and each time you open the Profiler page. Click <em>Stop measuring</em> to end early. Click <em>Delete measurements</em> and confirm to start over.</p>
<p><strong>Per extension table</strong></p>
<ul>
	<li><strong>Hits</strong>: measured page views on which the extension ran at least one query, out of all measured page views.</li>
	<li><strong>Queries per hit</strong>, <strong>Direct per hit</strong>, <strong>Via core functions per hit</strong> and <strong>Cached per hit</strong>: database queries per hit, those the extension ran itself, those core ran for the extension, and those served from the cache.</li>
	<li><strong>SQL ms per hit</strong>: query time per hit.</li>
	<li><strong>Listener ms per page view</strong>: event listener time per measured page view. Listeners run whether the extension queries or not.</li>
	<li><strong>Own page views</strong> and <strong>ms per own page</strong>: pages served by the extension’s own routes through app.php, and their average time.</li>
	<li><strong>Cron runs</strong>, <strong>ms per cron run</strong> and <strong>Cron queries</strong>: the extension’s cron tasks. Cron queries are those run inside a task’s run() call.</li>
</ul>
<p>Extensions are sorted by queries, then time. Two extra rows follow: <em>phpBB core</em>, queries with no extension in the call stack, and <em>Not attributed</em>, queries before the profiler starts on a request (1 per page view) or code that uses <code>dbal.conn.driver</code> directly.</p>
<p>Click an extension name to open a page with only that extension: its row of the per extension table and its detail tables, up to 500 rows each. Click <em>Show all extensions</em> at the top to go back. Without a filter the detail tables show the top 100 rows over all extensions.</p>
<p><strong>Download the measurements shown</strong> above the table exports the status, the per extension table and every detail table, with the current extension filter. <em>CSV</em> gives one file with a title row above each table, <em>PDF</em> a landscape A4 report.</p>
<p><strong>Detail tables</strong></p>
<ul>
	<li><strong>Query sources</strong>: extension, event, the extension code that caused the query, via (Direct or the core function), queries, queries per hit, cached and SQL ms per query.</li>
	<li><strong>Slow queries</strong>: single queries that took at least <em>Slow query threshold</em> ms, on page views and cron runs, values replaced by <code>?</code>, with the event or cron task, how often it was slow, the average and the slowest time. phpBB core queries are included, because a core query can be slow because of data an extension added.</li>
	<li><strong>Repeated queries</strong>: statements an extension ran at least <em>Repeated query threshold</em> times on one page view, values replaced by <code>?</code>. This usually means a query inside a loop. <em>Page views</em> shows on how many of the extension’s hits it happened.</li>
	<li><strong>Event listeners</strong>: event, listener method, calls per page view, ms per call, ms per page view and KB kept per call. Memory is what the listener still holds when it returns. It is negative when the listener freed more than it kept.</li>
	<li><strong>Own pages</strong>: each controller with its views and ms per call. The time is the whole controller call, including queries, listeners of other extensions and template rendering.</li>
	<li><strong>Cron tasks</strong>: the time of each task’s run() call, credited to the extension that owns the task.</li>
	<li><strong>Cron query sources</strong>: the queries run inside each task’s run() call.</li>
	<li><strong>Cron request overhead</strong>: queries of a cron request outside the task’s run() call, such as session setup and the listeners that run on it, with queries per cron run over all cron runs. They are not counted as cron queries of any extension.</li>
</ul>',

	// Settings
	'STOKER_HM_GUIDE_SETTINGS_TITLE'	=> 'Settings',
	'STOKER_HM_GUIDE_SETTINGS_TEXT'		=> '<ul>
	<li><strong>Scan interval</strong>: 0 to 720 hours, 24 by default. Hours between automatic scans, 0 disables automatic scans.</li>
	<li><strong>Time per batch</strong>: 1 to 25 seconds, 5 by default. The maximum time one request spends scanning, building the baseline or counting profiler measurements. Keep it well below PHP’s <code>max_execution_time</code>.</li>
	<li><strong>Purge resolved issues after</strong>: 0 to 3650 days, 90 by default. Resolved issues older than this are deleted after each scan, 0 keeps them.</li>
	<li><strong>Notify founders of new errors</strong>: Yes by default. A board notification to founders when an automatic scan finds new or reopened errors.</li>
	<li><strong>Show a banner to founders</strong>: On by default. A banner on all board pages and the ACP index while errors are open and not ignored.</li>
	<li><strong>Allow dismissing the banner</strong>: On by default. A founder can dismiss the banner for all founders until a scan finds new or reopened errors.</li>
	<li><strong>Repeated query threshold</strong>: 2 to 100, 5 by default. How often the same statement must run on one page view to be listed as repeated.</li>
	<li><strong>Slow query threshold</strong>: 1 to 10000 milliseconds, 20 by default. How long a single query must take to be listed as slow.</li>
</ul>',

	// Automatic scans and alerts
	'STOKER_HM_GUIDE_ALERTS_TITLE'	=> 'Automatic scans and new error alerts',
	'STOKER_HM_GUIDE_ALERTS_TEXT'	=> '<p>Automatic scans run through phpBB cron. Every cron request runs one batch of at most <em>Time per batch</em> seconds, and the next cron requests continue the scan until it is finished. A new scan starts when <em>Scan interval</em> has passed since the last completed scan. An unfinished baseline build is completed first. phpBB cron is triggered by board visits, or by a system cron job if you set one up.</p>
<p>When a scan <strong>finished by cron</strong> finds errors that are new, or that were resolved and came back, and are not ignored:</p>
<ul>
	<li>An entry is always written to the <strong>admin log</strong>: <em>Extension Health Monitor scan found new errors</em>.</li>
	<li>If <em>Notify founders of new errors</em> is Yes, every board founder gets a <strong>board notification</strong> that links to the Issues page. There is no email.</li>
</ul>
<p>Founders can switch the notification off in <strong>UCP → Board preferences → Edit notification options</strong>, group <em>Administration</em>. Scans you run or finish in the ACP never send alerts, you see the results on the page.</p>
<p>While errors are open and not ignored, board founders also see a <strong>banner</strong> on all board pages and on the ACP index, whoever ran the scan. Unlike a notification it cannot be pushed away by newer notifications. If <em>Allow dismissing the banner</em> is on, a founder can dismiss it for all founders until a scan finds errors that are new or have come back. A board style not based on prosilver may not show it on the board pages.</p>',

	// Uninstall
	'STOKER_HM_GUIDE_UNINSTALL_TITLE'	=> 'Uninstall',
	'STOKER_HM_GUIDE_UNINSTALL_TEXT'	=> '<ol>
	<li><strong>ACP → Customise → Manage extensions → Disable</strong> next to <em>Extension Health Monitor</em>. The notifications are hidden while disabled.</li>
	<li>To remove all data, click <strong>Delete data</strong>. This removes the extension’s tables (issues, baseline and profiler data), its settings, its ACP module and its notifications.</li>
	<li>Delete <code>ext/stoker/healthmonitor/</code>.</li>
</ol>',

	// Troubleshooting
	'STOKER_HM_GUIDE_TROUBLE_TITLE'	=> 'Troubleshooting',
	'STOKER_HM_GUIDE_TROUBLE_TEXT'	=> '<ul>
	<li><strong>Next scheduled scan stays on Due now</strong>: cron has not run. It needs a visit to a board page or a system cron, ACP pages do not trigger it. On a board with few visitors, such as a test board, open a board page a few times, or click <em>Run scan now</em>.</li>
	<li><strong>Next scheduled scan says it is waiting for a cron task or batch</strong>: a cron request holds a lock, its own or the one all cron tasks share. If it died, for example on a fatal error in any extension, no cron task runs until the lock frees itself after one hour. The PHP error log names the cause.</li>
	<li><strong>A scan or baseline batch is running right now</strong>: another request, usually cron, holds the lock. Wait a moment and try again. If a batch was killed, for example by a fatal error or the execution time limit, the lock frees itself after one hour. Lower <em>Time per batch</em> if batches hit <code>max_execution_time</code>.</li>
	<li><strong>The profiler is not active</strong>: purge the board cache (ACP → General → Purge the cache) and reload the Profiler page. If it stays, check that no old copy of this extension is inside <code>ext/</code>, see <em>First setup</em>.</li>
	<li><strong>Another extension has already replaced the database service, event dispatcher or cron runner</strong>: another extension replaced the same core service. A database conflict means queries cannot be measured and the profiler cannot start. A dispatcher conflict means listener times and event names are missing, queries are still measured. A cron runner conflict means cron task times are missing and cron requests are left out.</li>
	<li><strong>The profiler shows few or no page views</strong>: with a high sample rate most page views are not measured. Use sample rate 1 for testing.</li>
	<li><strong>Every file of an extension is reported as changed</strong>: the extension was updated after the baseline was built. Check the files, then click <em>Rebuild</em> for that extension on the File baseline page.</li>
	<li><strong>Migration has not been run</strong>: disable and enable the extension in <strong>Manage extensions</strong> to run its new migrations.</li>
	<li><strong>A new check or page does not appear after an update</strong>: purge the board cache.</li>
</ul>',
]);
