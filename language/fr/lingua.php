<?php
/**
*
* @package phpBB Extension - LMDI Lingua
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'HELP_FAQ_POSTING_UPLOAD_ANSWER' => 'Les photos doivent être téléchargées dans la galerie afin d’assurer leur pérennité. Cliquez sur le lien de la <a href="https://www.galerie-insecte.org/galerie ... .php">page de téléchargement</a>, qui est également présent sous la forme d’un gros bouton dans l’éditeur de messages. À la fin du téléchargement, copiez tout le code et rien que le code pour insérer la photo dans un message du forum.',
	'HELP_FAQ_POSTING_UPLOAD_QUESTION' => 'Comment télécharger une photo ?',
	'MODERATOR'			=> 'Animateur',
	'MODERATORS'			=> 'Animateurs',
	'TERMS_OF_USE_CONTENT'	=> 'En accédant au forum « %1$s » (également désigné ci-après par « nous »,
	« %1$s » ou « %2$s »), vous acceptez d’être tenu par les conditions suivantes. Si vous 
	n’acceptez pas d’être tenu par l’ensemble des conditions suivantes, vous êtes prié de ne pas accéder au
	forum « %1$s » et de ne pas l’utiliser. Nous pouvons modifier ces conditions à tout moment et nous ferons 
	tout pour que vous en soyez informé ; cependant, il est prudent de les vérifier régulièrement vous-même.
	Si vous continuez d’utiliser « %1$s » alors que des modifications ont été apportées, vous acceptez d’être
	tenu par les conditions résultant des mises à jour et/ou modifications.<br>
	<br>
	Nos forums sont développés par phpBB (également désigné ci-après par « ils », « logiciel phpBB », 
	« www.phpbb.com », « phpBB Limited », « Équipes phpBB ») qui est un logiciel de forum, placé sous la 
	licence « <a href="http://opensource.org/licenses/gpl-2.0.php">GNU General Public License v2</a> »
	(ci-après « GPL ») et qui peut être téléchargé depuis <a href="https://www.phpbb.com/">www.phpbb.com</a>.
	Le logiciel phpBB est uniquement destiné à faciliter les discussions sur Internet. phpBB Limited 
	n’est pas responsable de ce que nous acceptons ou n’acceptons pas comme contenu ou comme comportement.
	Pour de plus amples informations au sujet de phpBB, veuillez consulter : 
	<a href="https://www.phpbb.com/">https://www.phpbb.com/</a>.<br>
	<br>
	Vous vous engagez à ne pas publier de contenu abusif, obscène, vulgaire, diffamatoire, choquant, menaçant,
	à caractère sexuel ou tout autre contenu qui peut transgresser les lois de votre pays, du pays où « %1$s »
	est hébergé ou le droit international. Vous vous exposez sinon à un bannissement immédiat et permanent,
	avec une notification à votre fournisseur d’accès à Internet si nous le jugeons nécessaire. Les adresses 
	IP de tous les messages sont enregistrées pour permettre le respect de ces conditions. Vous acceptez 
	que « %1$s » supprime, modifie, déplace ou verrouille tout sujet dès lors que nous estimons que cela 
	est nécessaire. En tant que membre, vous acceptez que toutes les informations que vous avez saisies 
	soient stockées dans notre base de données. Ces informations ne seront pas communiquées à des tierces 
	parties sans votre consentement ; cependant, ni « %1$s », ni phpBB ne pourront être tenus responsables 
	en cas de tentative de piratage visant à compromettre les données.
	',
	'PRIVACY_POLICY'		=> 'Le présent document explique en détail comment « %1$s » et ses sociétés 
	affiliées (également désignés ci-après « nous », « %1$s », « %2$s ») et phpBB (également désigné ci-après 
	par « ils », « logiciel phpBB », « www.phpbb.com », « phpBB Limited », « Équipes phpBB ») utilisent 
	les informations collectées pendant toute session d’utilisation par vous-même (ci-après  « vos informations »).<br>
	<br>
	Vos informations sont collectées de deux manières. Premièrement, lorsque vous naviguez sur « %1$s », le 
	logiciel phpBB crée un certain nombre de cookies, qui sont des petits fichiers de texte téléchargés 
	dans les fichiers temporaires du navigateur Internet de votre ordinateur. Les deux premiers cookies ne 
	contiennent qu’un identifiant utilisateur (ci-après « user-id ») et un identifiant de session anonyme
	(ci-après « session-id »), qui vous sont automatiquement attribués par le logiciel phpBB. Un troisième 
	cookie est créé au fil de votre navigation dans les sujets de « %1$s » et est utilisé pour stocker 
	les informations sur les sujets que vous avez lus, ce qui améliore votre navigation sur le forum.<br>
	<br>
	Nous pouvons également créer des cookies externes au logiciel phpBB lorsque vous naviguez sur « %1$s »,
	mais ceux-ci sortent du champ du présent document, qui ne couvre que les pages créées par le logiciel 
	phpBB. Par ailleurs, nous collectons les informations que vous nous envoyez. Ceci concerne notamment 
	la publication de messages en tant qu’utilisateur invité (ci-après « messages invités »), l’enregistrement 
	sur « %1$s » (ci-après « votre compte ») et les messages que vous postez après l’enregistrement et 
	lors d’une connexion (ci-après « vos messages »).<br>
	<br>
	Votre compte contient au minimum un identifiant unique (ci-après par « votre nom d’utilisateur »), 
	un mot de passe personnel utilisé pour la connexion à votre compte (ci-après « votre mot de passe »), 
	et une adresse de courriel personnelle valide (ci-après « votre adresse de courriel »). Vos informations 
	pour votre compte sur « %1$s » sont protégées par le droit de protection des données applicable dans 
	le pays qui nous héberge. Toute information en-dehors de votre nom d’utilisateur, de votre mot de 
	passe et de votre adresse courriel requise par « %1$s » durant la procédure d’enregistrement, 
	qu’elle soit obligatoire ou non, reste à la discrétion de « %1$s ». Dans tous les cas, vous pouvez 
	choisir quelles sont les informations de votre compte qui seront affichées publiquement. De plus,
	dans votre profil, vous pouvez souscrire ou non à l’envoi automatique de courriel par le logiciel 
	phpBB.<br>
	<br>
	Votre mot de passe est crypté (hashage à sens unique) afin qu’il soit sécurisé. Cependant, il est 
	recommandé de ne pas utiliser le même mot de passe sur plusieurs sites Internet différents. Votre 
	mot de passe est le moyen d’accès à votre compte sur « %1$s », conservez-le soigneusement et 
	aucune personne affiliée à « %1$s », phpBB ou une tierce partie ne peut vous demander légitimement 
	votre mot de passe. Si vous oubliez votre mot de passe, vous pouvez utiliser la fonction 
	« J’ai oublié mon mot de passe » fournie par le logiciel phpBB. Il vous sera demandé de 
	fournir votre nom d’utilisateur et votre adresse de courriel, sur quoi le logiciel phpBB générera 
	un nouveau mot de passe qui vous permettra de vous reconnecter.<br>
	',
));
