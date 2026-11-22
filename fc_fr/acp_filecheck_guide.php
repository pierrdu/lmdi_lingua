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
	'STOKER_FC_GUIDE_INTRO'			=> 'This guide explains how File Checker works, how to set it up and what to do with its findings. The explanations on each page describe the single settings, this guide describes the workflow.',
	'STOKER_FC_GUIDE_CONTENTS'		=> 'Contents',

	// What File Checker does
	'STOKER_FC_GUIDE_ABOUT_TITLE'	=> 'What File Checker does',
	'STOKER_FC_GUIDE_ABOUT_TEXT'	=> '<p>File Checker compares every file of the board with a known good reference and reports what differs. It runs four checks:</p>
<ul>
	<li><strong>File integrity</strong> finds files that were changed, added or removed since the reference was taken.</li>
	<li><strong>Suspicious code</strong> searches the content of files for code that is typical for backdoors, web shells and injected scripts. File integrity tells you that a file changed, this check tells you whether the change looks malicious. See <em>Suspicious code</em> below.</li>
	<li><strong>Permissions</strong> finds files and directories that everyone on the server can write to, and a <code>config.php</code> that everyone can write to. This check does not run on Windows servers.</li>
	<li><strong>Writable directories</strong> finds scripts and server configuration files in the directories phpBB writes to: <code>files/</code>, <code>store/</code>, the avatar upload directory and <code>cache/</code>. A script in an upload directory is the typical trace of an attack. In <code>cache/</code> only scripts directly in it are reported, phpBB keeps its own compiled PHP files in its subdirectories such as <code>cache/production/</code>. Server configuration files are reported everywhere.</li>
</ul>
<p>There are two kinds of reference:</p>
<ul>
	<li>The <strong>manifests</strong> hold the hashes of official packages: one for the phpBB package, the core manifest, and one per language pack, per style and per extension. They are made from the official zips, so they also find files that were changed before File Checker was installed.</li>
	<li>The <strong>baseline</strong> holds the hashes of everything else on the board, taken from the files as they are now: extensions, styles and language packs without a manifest, and any file of your own.</li>
</ul>
<p><strong>Limits:</strong></p>
<ul>
	<li>The references are stored in the database. File Checker detects file infections, but not an attacker who can also change the database.</li>
	<li>The <code>install/</code> directory and the writable directories are not walked. Only the existence of <code>install/</code> is reported.</li>
	<li>Scripts in the subdirectories of <code>cache/</code> are not reported, phpBB writes its own there.</li>
	<li>The content of a directory that is a symbolic link or junction is not checked, the link itself is reported as a warning.</li>
	<li>The content of a directory PHP cannot list is not checked, the directory itself is reported as an error.</li>
	<li>A file that could not be read when the baseline was taken has no hash and is not compared. It is reported as a warning until the baseline is taken again.</li>
</ul>',

	// Suspicious code
	'STOKER_FC_GUIDE_CONTENT_TITLE'	=> 'Suspicious code',
	'STOKER_FC_GUIDE_CONTENT_TEXT'	=> '<p>The rules look for code patterns, they cannot prove that code is malicious or that it is clean. To keep false alarms rare, which rules a file gets depends on its reference:</p>
<ul>
	<li><strong>Files that match their manifest</strong> are the official release and are not searched. This leaves out phpBB core and its libraries, which hold code the rules would match.</li>
	<li><strong>Changed files, and new files of an area with a reference</strong>, are searched with every rule.</li>
	<li><strong>Files that match the baseline, and files no reference covers</strong>, are only searched with the error rules. A baseline taken after an attack holds the attack, so a file that matches the baseline is not taken as clean.</li>
</ul>
<p><strong>Errors</strong> match code that has no legitimate use in a phpBB board: code hidden by encoding and run at once, code, shell commands, functions or files chosen by the request, code included from another server, the names of known web shells, PHP code in images, fonts and media files, and server configuration that runs a script in front of every script or runs images as PHP.</p>
<p><strong>Warnings</strong> match code that also has a legitimate use, so they are only reported for changed and new files: functions that run code or shell commands, data decoded twice, long encoded data, uploads stored without the checks of phpBB, browser cryptominers, frames visitors do not see, and scripts unpacked and run in the browser.</p>
<ul>
	<li>Comments in scripts are not searched, and most rules leave out the text in quotes, so a language string or a comment that describes such code does not match. A very large script that PHP does not have the memory to split up is searched as it is, comments and quotes included.</li>
	<li>A file a rule gives up on is reported as a warning, the search may have missed something in it. Check that file by hand.</li>
	<li>Scripts, server configuration and web files larger than 2 MB are not searched, an informational finding names them. Of images and other media files, the first and last 32 KB are searched.</li>
	<li>The writable directories, except <code>cache/</code>, are searched for PHP code in files that are not scripts, such as an attachment that is really a PHP file. A zip, rar, 7z or tar archive with PHP code that is not compressed is a warning, not an error: it is usually a script shared as an attachment. So is a file that is a PHP script as a whole, and a text file that holds PHP code, such as a patch, unless it holds code the error rules match, then that error is reported. PHP code in an image or another binary file is always an error. Only files changed since the last completed scan are read, up to 2000 per directory and scan: the 1500 oldest and the 500 newest, so a new upload does not wait for the others. The rest are read in the next scans. A value under 500 for <em>Files per batch</em> lowers the limit to four times that value. Files reported before are read in every scan. A file that cannot be read is reported as a warning.</li>
	<li>Every finding holds the hash of the file. An ignored finding stays ignored only while the file stays the same, a later change is reported again.</li>
	<li>Code can be hidden in ways no pattern finds. No finding does not prove that a file is clean, the file integrity findings stay the main signal.</li>
</ul>',

	// First setup
	'STOKER_FC_GUIDE_SETUP_TITLE'	=> 'First setup',
	'STOKER_FC_GUIDE_SETUP_TEXT'	=> '<p>Do the steps in this order. The baseline leaves out every file a manifest covers, so the manifests must be there first.</p>
<ol>
	<li><strong>Get the manifests</strong>: a core manifest for the exact phpBB version of the board, and manifests of the language packs, styles and extensions you have installed. Make them on the <strong>Manifest</strong> page from the official zips, or import them from a source you trust. See <em>The manifests</em> below.</li>
	<li><strong>Check that the board is clean.</strong> Run a scan on the <strong>Scanner &amp; Findings</strong> page. With only manifests, it already reports changed and missing files of the packages they cover. Look at every error before you continue.</li>
	<li><strong>Take the baseline</strong> for all areas on the <strong>Baseline</strong> page. Do this only when you know the files are clean: everything in the baseline is trusted from then on.</li>
	<li><strong>Run a scan</strong> again. The open findings should now only show items you already know about. From here on, cron scans the board at the interval set on the <strong>Settings</strong> page.</li>
</ol>
<p>Without a core manifest, File Checker still works: phpBB core files are then part of the baseline area <em>Other files</em>. Files that were already changed before the baseline was taken are not found that way.</p>',

	// The manifests
	'STOKER_FC_GUIDE_MANIFEST_TITLE'	=> 'The manifests',
	'STOKER_FC_GUIDE_MANIFEST_TEXT'		=> '<p>There are four kinds of manifest. Each one is imported, replaced and deleted on its own:</p>
<ul>
	<li>The <strong>core manifest</strong> of the phpBB package. It must be made for exactly the phpBB version the board runs.</li>
	<li>One <strong>language pack manifest</strong> per language. It holds the <code>language/&lt;iso&gt;/</code> files of the pack, its style theme files and its translation of the VigLink extension that ships with phpBB.</li>
	<li>One <strong>style manifest</strong> per style. It holds the files of the style directory, <code>styles/&lt;name&gt;/</code>.</li>
	<li>One <strong>extension manifest</strong> per extension. It holds the files of the extension directory, <code>ext/&lt;vendor&gt;/&lt;name&gt;/</code>. VigLink is part of the phpBB package and has no manifest of its own.</li>
</ul>
<p>Language pack, style and extension manifests do not depend on the phpBB version. They stay valid after a phpBB update, until the pack, style or extension itself is updated.</p>
<p><strong>Making manifests</strong></p>
<ul>
	<li>Download the full phpBB package, your language packs and your styles from phpbb.com yourself, and your extensions from the phpBB Customisation Database or their author. A manifest made from a modified package hides the modification.</li>
	<li>Upload them on the <strong>Manifest</strong> page in any combination: the phpBB package, and any number of language pack, style and extension zips, one pack, style or extension per zip. The files are hashed straight from the zips, nothing is unpacked and the zips are not stored on the server.</li>
	<li>Every file in an extension zip is hashed. Use the release zip of the extension: a zip made from a source repository holds development files, such as <code>tests/</code>, that are not on the board and would be reported as missing.</li>
	<li>Each zip gives a manifest of its own. One manifest is offered as a download, for example <code>phpbb-3.3.19.sha256.json</code> or <code>phpbb-extension-vendor_name-1.0.0.sha256.json</code>, several as a zip of manifests. That zip can be imported as it is.</li>
	<li>The <code>install/</code> directory and <code>config.php</code> are left out of the core manifest. British English and the styles of the phpBB package, such as prosilver, are part of the phpBB package, they are not uploaded as a language pack or style.</li>
	<li>Making manifests needs the PHP zip extension (ZipArchive). Without it, make the manifests on another board and import them here.</li>
	<li>The browser sends the zips one at a time, with a progress line, so any number of them can be selected at once. Each manifest made is kept in <code>store/stoker_filecheck/</code> until all of them are offered as one download, an abandoned set is removed after a day. A zip that fails is listed with the reason, the manifests of the other zips can still be downloaded.</li>
	<li>The upload limits of the server are shown above the upload fields. Each zip must fit the size per file. Without JavaScript all zips are sent in one form, then upload fewer zips at a time if the limits are exceeded. The phpBB package is not needed to make the other manifests.</li>
</ul>
<p><strong>Importing manifests</strong></p>
<ul>
	<li>Select one or more manifest files, or zips of manifest files. An imported manifest replaces the earlier one of the same phpBB package, language pack, style or extension, the others stay as they are.</li>
	<li>Manifests of language packs, styles and extensions that are not installed on the board are skipped. Installed language packs without a manifest are checked against the baseline, an informational finding names them.</li>
	<li>An extension manifest is only imported when its version matches the version of the installed extension. The others in the same upload are still imported.</li>
	<li>An extension manifest replaces the baseline of the extension. Files it does not hold are reported as new. Translations of the extension it does not ship, such as a Danish translation downloaded on its own, count as <em>Other files</em> and keep their baseline there.</li>
	<li>A language pack, style or extension removed after the import is not expected on the board any more, its deleted files are not reported as missing.</li>
	<li>A path can be in only one manifest. The core manifest wins over a language pack manifest, which wins over a style manifest, which wins over an extension manifest, whatever order they are imported in.</li>
	<li>A manifest made on one board can be imported on every other board, a core manifest on boards running the same phpBB version.</li>
	<li>All manifests are checked first, then they are imported in batches while the page reloads, so any number of them can be imported at once. Each imported manifest is listed in the admin log. If you leave the page, the manifests imported so far stay imported, and the <strong>Manifest</strong> page offers to continue the import for a day.</li>
	<li>An import cancels a scan in progress. It is refused while a baseline is being taken.</li>
	<li>Files the replaced manifest held and the new one does not, that are still on the board, keep their last official hash as part of the baseline. They are not reported as new files. Files of an extension of the phpBB package, such as VigLink, are the exception: the core manifest defines which files it holds, so a file the new core manifest no longer holds is reported as new.</li>
</ul>
<p><strong>Deleting a manifest</strong> keeps the last official hash of its files as part of the baseline, in the area they belong to then, such as <em>Other files</em>. They are compared while that area has a baseline. The files of a deleted extension manifest become the baseline of the extension.</p>
<p><strong>Extension manifests</strong> are listed in a group of their own. Manifests of extensions whose directory is gone, and manifests older than the installed extension, are shown first. The manifests of all removed extensions can be deleted with one button.</p>',

	// The baseline
	'STOKER_FC_GUIDE_BASELINE_TITLE'	=> 'The baseline',
	'STOKER_FC_GUIDE_BASELINE_TEXT'		=> '<p>The baseline is kept per area:</p>
<ul>
	<li><strong>Other files</strong>: every file that is neither covered by a manifest nor part of an extension. While a current core manifest is imported, the translations of the VigLink extension from a language pack without a manifest count as other files too.</li>
	<li><strong>One area per extension</strong>: every directory <code>ext/vendor/name/</code> with a <code>composer.json</code>. Files in an extension directory without one count as other files, and so do files in an extension directory whose name is longer than 190 characters or holds characters the database cannot store, such as emoji.</li>
</ul>
<p>The status column on the <strong>Baseline</strong> page shows for each area:</p>
<ul>
	<li><strong>Checked</strong>: the baseline is current, the files are compared.</li>
	<li><strong>Checked against the manifest</strong>: the extension has a manifest of its own, or is part of the phpBB package, normally the VigLink extension, and is in the core manifest. Its files are compared with the manifest and files added to it are reported as new, it takes no baseline.</li>
	<li><strong>Checked against the manifest, updated since</strong>: the version in the extension’s <code>composer.json</code> differs from its manifest. Its files are still compared with the manifest, so the changes of the update are reported. Import a manifest made from the new release once you know the update is genuine.</li>
	<li><strong>Checked, updated since the baseline</strong>: the version in the extension’s <code>composer.json</code> changed. Its files are still compared, so the changes of the update are reported. Take its baseline again once you know the update is genuine.</li>
	<li><strong>No baseline, not checked</strong>: a new extension, or an area never baselined. An extension directory that holds scripts and is not installed in phpBB is reported as an error until it is installed or baselined.</li>
	<li><strong>Extension removed</strong>: the extension directory is gone. Delete its baseline.</li>
	<li><strong>Checked, composer.json is missing</strong>: the directory is still there without its <code>composer.json</code>. Its files stay compared and an error is reported. Restore the file, or delete the directory.</li>
</ul>
<p>Taking a baseline replaces the old one of that area. While it is being taken, scans wait. The page reloads until all files are hashed. If you leave the page, cron completes the baseline when automatic scans are switched on, otherwise press <em>Continue</em>. An extension updated while the baseline is being taken shows as updated since its baseline afterwards, take its baseline again.</p>',

	// Scans
	'STOKER_FC_GUIDE_SCANS_TITLE'	=> 'Scans',
	'STOKER_FC_GUIDE_SCANS_TEXT'	=> '<p>A scan runs in batches so it never hits the time limit of a request:</p>
<ol>
	<li>The files are hashed, compared and searched for suspicious code, as many per batch as set under <em>Files per batch</em>.</li>
	<li>The permissions of all directories are checked.</li>
	<li>The writable directories are searched for scripts and for PHP code in other files, one directory per batch.</li>
	<li>Missing files and the state of the references are checked, and the scan is closed.</li>
</ol>
<ul>
	<li><strong>Automatic scans</strong> run through phpBB cron. Each cron call runs batches one after the other for up to 10 seconds, or a third of max_execution_time when that is lower, and continues a baseline left unfinished first. A new scan starts when the interval has passed since the end of the last one. A scan in progress continues on the next cron call.</li>
	<li><strong>Run scan now</strong> on the <strong>Scanner &amp; Findings</strong> page runs the batches one after the other while the page reloads. It continues a scan cron has started.</li>
	<li>Taking a baseline, importing a manifest and deleting a manifest cancel a scan in progress. The next scan starts from the beginning.</li>
	<li>When a scan cron took part in finds errors that are new or have come back, an entry is written to the admin log. If <em>Notify founders of new errors</em> is on, board founders also get a board notification and an email. The email is switched on for the founders when the extension is enabled, a founder made later switches it on in the UCP. It needs board-wide emails to be enabled.</li>
	<li>While errors are open and not ignored, board founders see a <strong>banner</strong> on all board pages and on the ACP index, whoever ran the scan. Unlike a notification it cannot be pushed away by newer notifications. If <em>Allow dismissing the banner</em> is on, a founder can dismiss it for all founders until a scan finds errors that are new or have come back. A board style not based on prosilver may not show it on the board pages.</li>
</ul>',

	// Findings
	'STOKER_FC_GUIDE_FINDINGS_TITLE'	=> 'Reading the findings',
	'STOKER_FC_GUIDE_FINDINGS_TEXT'		=> '<p><strong>Severities</strong></p>
<ul>
	<li><strong>Error</strong>: a script or server configuration file (<code>.php</code>, <code>.php</code> followed by one digit such as <code>.php7</code>, <code>.phtml</code>, <code>.phar</code>, <code>.pht</code>, <code>.phps</code>, <code>.cgi</code>, <code>.pl</code>, <code>.py</code>, <code>.sh</code>, the IIS script types <code>.asp</code>, <code>.aspx</code>, <code>.ashx</code> and <code>.asmx</code>, also with a second extension such as <code>image.php.jpg</code>, and <code>.htaccess</code>, <code>.user.ini</code>, <code>php.ini</code>, <code>web.config</code>) that was changed or added, a script in a writable directory, a directory PHP cannot list, an extension directory with scripts that is not installed in phpBB and has no baseline, an extension directory with a reference that lost its <code>composer.json</code>, a <code>config.php</code> everyone can write to, an existing <code>install/</code> directory, or code that matches an error rule of the suspicious code check. Check every error.</li>
	<li><strong>Warning</strong>: another file that was changed or added, a missing server configuration file, a file that cannot be read, a file that could not be read when the baseline was taken, a directory that is a symbolic link or junction, a file or directory everyone can write to, or a reference that needs attention.</li>
	<li><strong>Info</strong>: a missing file, an area without a baseline, an installed language pack without a manifest, an extension, language pack or style whose version changed since its reference, or the baseline or manifest of a removed extension.</li>
</ul>
<p><strong>What to do</strong></p>
<ul>
	<li><strong>File changed</strong>: compare the file with the original from the phpBB package or the extension. If you changed it yourself on purpose, use <em>Accept change</em>: the file as it is now becomes its reference, and any later change is reported again. This also works for a file of a package with a manifest, the file is then compared with the baseline of its area until a new manifest of that package is imported.</li>
	<li><strong>New file</strong>: find out where it came from. Extensions that write files outside the writable directories, for example downloaded images, cause correct findings. Use <em>Accept change</em> once you know the file is wanted. A file added to an extension of the phpBB package, such as VigLink, is always reported, delete it if you did not put it there.</li>
	<li><strong>File missing</strong>: harmless if you removed it on purpose, for example <code>docs/</code>. Use <em>Accept change</em>, the file is then no longer expected. A missing <code>.htaccess</code> leaves a directory unprotected on Apache.</li>
	<li><strong>Suspicious code, error</strong>: treat it as a sign of an attack until you know otherwise. Open the file at the line given. If the code came from an extension you trust, ignore the finding, it is reported again when the file changes. Otherwise replace the file with the original, or delete it, and look for the way it got there.</li>
	<li><strong>Suspicious code, warning</strong>: the file changed or is new and holds code that is often used by attacks. Check that the change is one you made or expect from an update. Accepting the change also stops the warning, the file is then only searched with the error rules.</li>
	<li><strong>Script in a writable directory</strong>: phpBB never puts scripts there. Treat it as a sign of an attack unless an extension you trust documents it.</li>
	<li><strong>Directory cannot be listed</strong>: phpBB never creates such a directory. Find out who created it. Give it read permission (755) so it can be checked, then run a scan and check what is in it.</li>
	<li><strong>Directory is a symbolic link or junction</strong>: make sure you created the link yourself and know where it points. Its content is never checked.</li>
	<li><strong>File could not be read when the baseline was taken</strong>: make the file readable for PHP, then take the baseline of its area again.</li>
	<li><strong>Extension directory not installed in phpBB</strong>: an uploaded extension appears here until it is enabled. If you did not upload it, treat it as a sign of an attack and delete the directory. Otherwise enable the extension, or take its baseline.</li>
	<li><strong>Writable by everyone</strong>: set directories to 755 and files to 644 or stricter, unless your host requires otherwise.</li>
	<li><strong>Version changed</strong>: if you did not update the extension, language pack or style yourself, treat it as a sign of an attack. A version is only text in a file, a changed version never stops the comparison.</li>
	<li><strong>The core manifest is for another phpBB version</strong>: see <em>After updates</em> below.</li>
</ul>',

	// Ignore, resolve and purge
	'STOKER_FC_GUIDE_STATES_TITLE'	=> 'Ignore, resolved and purge',
	'STOKER_FC_GUIDE_STATES_TEXT'	=> '<ul>
	<li><strong>Open</strong> findings were seen in the last scan and are not ignored. The counters on the <strong>Scanner &amp; Findings</strong> page show these.</li>
	<li><strong>Ignored</strong>: switch on <em>Ignore</em> for a finding you have checked and accept. It no longer counts and never causes a notification. A file integrity finding stays ignored when the same file changes again later, so use this only for findings you understand. A suspicious code finding is reported again once the file changes. For a changed, new or missing file, <em>Accept change</em> is safer.</li>
	<li><strong>Accept change</strong>: shown for open findings of changed, new and missing files. The confirmation shows the SHA-256 hash of the file as it is then, and the change is only accepted while the file still has that hash. The file becomes part of the baseline of its area, so a changed or new file can only be accepted while its area has a baseline. The finding is resolved at once, and a later change of the file is reported again, even when the finding was ignored. Changed or new files of an extension with a manifest, such as VigLink of the phpBB package, cannot be accepted, the manifest defines them.</li>
	<li><strong>Resolved</strong>: a finding not seen again in a completed scan is resolved automatically. If it appears again later, it is reopened with its first seen date and counts as new for the notification. File findings of an area the scan could not check stay open: phpBB core files while no core manifest for the board version is imported, and the files of an area without a baseline. All file findings stay open after a scan in which the cache could not keep the file list and the files changed while the scan ran, such a scan may have skipped files.</li>
	<li><strong>Purge</strong>: resolved findings older than the days set under <em>Purge resolved findings after</em> are deleted after each scan, or by hand on the <strong>Scanner &amp; Findings</strong> page. Ignored findings are never purged, so the decision is not lost.</li>
</ul>',

	// Permissions and links
	'STOKER_FC_GUIDE_SPECIAL_TITLE'		=> 'Writable directories and symbolic links',
	'STOKER_FC_GUIDE_SPECIAL_TEXT'		=> '<ul>
	<li>The writable directories are <code>cache/</code>, <code>store/</code> and the attachment and avatar upload directories from the board settings. Their content changes all the time, so it is not compared, only searched for scripts and server configuration files. The <code>.htaccess</code> files phpBB ships in them are compared against the core manifest or the baseline.</li>
	<li>Permissions are only checked outside the writable directories, many hosts need those to be writable by everyone. Group write access is never reported, many hosts give every account its own group.</li>
	<li>A directory that is a symbolic link, or on Windows a junction, is reported as a warning, with its target. Its content is not walked and its files are not reported as missing. Use links only for directories you check by other means.</li>
	<li>A directory PHP cannot list is reported as an error. Its content is not walked and its files are not reported as missing. The web server can still run a script in it when the address is known, which makes such a directory a hiding place.</li>
	<li>Hidden directories are walked like any other directory, they are a common hiding place.</li>
</ul>',

	// After updates
	'STOKER_FC_GUIDE_UPDATES_TITLE'	=> 'After updates',
	'STOKER_FC_GUIDE_UPDATES_TEXT'	=> '<p><strong>After a phpBB update</strong></p>
<ol>
	<li>The core manifest no longer matches the board version. Until a new one is imported, phpBB core files are not checked and new files in <em>Other files</em> are not reported. Language pack and style manifests stay valid.</li>
	<li>Make or import the core manifest for the new version.</li>
	<li>Run a scan. Files the update removed from phpBB that are still on the board keep their last official hash and are not reported, except files of VigLink, which are reported as new. Delete them as the phpBB update instructions describe.</li>
</ol>
<p><strong>After an extension update</strong></p>
<ol>
	<li>The extension shows <em>Checked, updated since the baseline</em>, or its manifest shows the old version, and the files the update changed, added or removed are reported.</li>
	<li>Make sure the new files came from the extension author. Then make a manifest from the release zip of the new version and import it, or take the baseline of that extension again.</li>
</ol>
<p><strong>After installing or removing an extension</strong>, take the baseline of the new extension or import its manifest, or delete the baseline or manifest of the removed one.</p>
<p><strong>After a language pack or style update</strong>, the files the update changed are reported. Make a manifest of the updated pack or style and import it, it replaces the earlier one.</p>',

	// Troubleshooting
	'STOKER_FC_GUIDE_TROUBLE_TITLE'	=> 'Troubleshooting',
	'STOKER_FC_GUIDE_TROUBLE_TEXT'	=> '<ul>
	<li><strong>The upload is too large</strong>: the server limits are shown on the <strong>Manifest</strong> page. Upload fewer zips at a time, or ask your host to raise <code>upload_max_filesize</code>, <code>post_max_size</code> and <code>max_file_uploads</code>.</li>
	<li><strong>A scan, baseline or import batch is running right now</strong>: only one batch runs at a time. If a batch died, for example on the time limit, the lock is released after one hour at the latest. The page gives up after ten reloads, try again later.</li>
	<li><strong>Batches hit max_execution_time</strong>: lower <em>Files per batch</em> on the <strong>Settings</strong> page.</li>
	<li><strong>Scans never finish on their own</strong>: phpBB cron only runs when the board has visitors, or when the system cron is set up. Check that <em>Automatic scans</em> is switched on, or run the scan by hand.</li>
	<li><strong>The PHP zip extension is missing</strong>: make the manifests on another board and import them here.</li>
	<li><strong>Many new files after the baseline</strong>: an extension or a script of your own writes into a directory that is not one of the phpBB writable directories. Those findings are correct, decide per file.</li>
</ul>',
]);
