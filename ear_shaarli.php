<?php

//~ Listen to Shaarli @Nico KraZhtest | krazhtest@ya.ru | ponyhacks.com

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 14 Jul 2116 05:00:00 GMT');
$wiki = $_REQUEST['shaarli'];
$search = $_REQUEST['search'];
//~ $listenP = $_REQUEST['paragraphe'];
$lang = $_REQUEST['lang'];
if (empty($lang)) {
	$lang = "fr-FR";
};
if(isset($_REQUEST['search']) != null)
{   
	$wiki = "?wiki=https://fr.wikipedia.org/wiki/".urlencode($search);
	header('Location:'.$wiki);
}
$curl = curl_init();
curl_setopt_array($curl, Array(
	CURLOPT_URL            => $wiki,
	CURLOPT_USERAGENT      => 'earWiki',
	CURLOPT_TIMEOUT        => 120,
	CURLOPT_CONNECTTIMEOUT => 30,
	CURLOPT_RETURNTRANSFER => TRUE,
	CURLOPT_ENCODING       => 'UTF-8'
));
$data = curl_exec($curl);
curl_close($curl);
$dom=new DOMDocument;
$dom->loadXML($data);
$xml = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);
$shaarli = $xml->channel->title;
$baseCount = "";

echo "
<!-- Salut!! @Nico KraZhtest krazhtest@ya.ru -->

	<html lang=".$lang.">	
	<body>
	<style>
	a {
	color:black
	}
	.link > p:nth-child {height:0px;max-height:0px}
	img {max-width:20px}
	.links {font-size:0.6em}
	.link > p:nth-child {
	height:115px;
	}
	input select{cursor:pointer}
	</style>
";
echo  '<strong>
	<form style="position:absolute" action="http://ponyhacks.com/open/apps/earwiki/ear_shaarli.php?">
	<input type="submit" value="📰 earShaarli">
	</form>
	<form style="position:absolute;left:110px" action="http://ponyhacks.com/open/apps/earwiki/?">
	<input type="submit" value="💡 earWiki">
	</form>
	<form style="position:absolute;left:200px" action="http://ponyhacks.com/?">
	<input type="submit" value="🐴 ponyhacks.com">
	</form>
	&nbsp;</strong>
';        
echo "<hr />";

echo '<base href="http://ponyhacks.com/open/apps/earwiki/ear_shaarli.php">

<select style="float:right;" onchange="if (this.value) window.location.href=window.location.href+this.value">

    <option data-lang="en-UK" value="&lang=en" data-name="english" selected>english (en-UK)</option>
    <option data-lang="fr-FR" value="&lang=fr" data-name="french" selected>french (fr-FR)</option>    
	</select>

	<h6 style="margin:0px 0 0 0"><label for="rate">Vitesse:&nbsp;&nbsp;</label>
	<input type="range" min="0.5" max="2.5" value="1.2" step="0.1" id="rate">
	<div style="position:absolute;left:290px;top:80px"  class="rate-value"><div class="pitch-value"></div>
	<div class="clearfix"></div>
	</div>
	<div>
	<h6 style="margin:-0px 0 0 0"><label for="pitch">Ton de la voix:</label>
	<input type="range" min="0" max="2" value="1.3" step="0.1" id="pitch"></h6></h6>

	<h3>Listen to the Shaarli Network (278 peoples) or <a id="river"  href="http://shaarli-api.ecirtam.net/latest?format=rss">the river</a></h3>
	
	<div class="links">
	
	<hr />
	<a href="http://genma.free.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=51">Le Shaarli de Genma</a> 
	<a href="http://ziirish.info/bm/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=132">Ziirishs cave</a> 
	<a href="https://shaarli.fr/my/carterphoenix/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=233">Carter Phoenix à la rescousse</a> 
	<a href="https://www.shaarli.fr/my/tsyr2ko/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=296">Links from tsyr2kos wandering</a> 
	<a href="http://liens.mohja.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=52">Les liens de Mohja</a> 
	<a href="https://shaarli.fr/my/mayaj/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=226">Les Internets de MayaJ</a> 
	<a href="http://www.simonlefort.be/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=195">Liens en vrac de SimonLefort</a> 
	<a href="https://www.tribuleblanc.com/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=87">BastLiens</a> 
	<a href="https://my.shaarli.fr/mayaj/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=169">Les Internets de MayaJ</a> 
	<a href="https://biniou.shost.ca/Shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=205">Messages &amp; liens de Biniou</a> 
	<a href="https://links.alwaysdata.net/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=36">Les liens que je découvre au fil du Web</a> 
	<a href="http://www.apprenti-polyglotte.net/liens/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=252">Liens de Mut</a> 
	<a href="https://www.lagilb.fr/Shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=202">Les hypertextes du barbu digressif</a> 
	<a href="https://www.tolima.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=94">liens de tolima</a> 
	<a href="https://jeekajoo.eu/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=63">@jeekajoo links</a> 
	<a href="https://my.shaarli.fr/shaarli.de.charly/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=174">shaarli 2 charly</a> 
	<a href="https://www.shaarli.fr/my/Moinot/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=308">Moinot</a> 
	<a href="https://shaarli.m0le.net/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=149">Nonos Links</a> 
	<a href="https://www.lacaryatide.fr/liens/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=9">Les liens de Nagumo</a> 
	<a href="http://jcfrog.com/shaarli41/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=203">Jcfrogs shaarli</a> 
	<a href="http://patlinks.cvidal.org/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=119">Les liens de Patrick</a> 
	<a href="https://my.shaarli.fr/gezar/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=171">Gezars links</a> 
	<a href="https://bleu-pale.fr/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=73">GF | Transformation sociale, etc...</a> 
	<a href="http://liens.howtommy.net/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=38">HowTommy | Liens et actu en vrac</a> 
	<a href="https://www.margaux-perrin.com/serendipity/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=91">Serendipity</a> 
	<a href="http://sebsauvage.net/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=1">Liens en vrac de sebsauvage</a> 
	<a href="http://shaarli.sbgodin.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=58">sbgodin.fr</a> 
	<a href="https://lafouinebox.fr/Shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=139">FouineShaar</a> 
	<a href="http://2038.net/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=25">2038 - Links</a> 
	<a href="https://www.shaarli.fr/my/4urelienjo/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=302">liberté de jouer</a> 
	<a href="http://_/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=237">Vracaliens</a> 
	<a href="https://shaarli.sbgodin.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=134">sbgodin.fr</a> 
	<a href="https://my.shaarli.fr/Celeano/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=274">Celeanos Bookmarks</a> 
	<a href="http://horyax.fr/news/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=69">Horyax News</a> 
	<a href="http://share.ohax.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=23">Liste de partage dOhax</a> 
	<a href="https://url.bidouille.info/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=61">Shared links on https://url.bidouille.info/</a> 
	<a href="https://qosgof.fr/fosteb/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=77">Best of the best links</a> 
	<a href="https://famille-michon.fr/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=32">Liens</a> 
	<a href="https://www.korezian.net/liens/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=99">Les liens du JEEK</a> 
	<a href="https://barbrousse.net/Notes/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=327">Notes de Barbrousse</a> 
	<a href="http://shaarli.sebw.info/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=275">sebw.info</a> 
	<a href="http://tools.exppad.com/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=144">Élie</a> 
	<a href="https://tviblindi.legtux.org/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=8">Escales internautiques</a> 
	<a href="http://shaarli.warriordudimanche.net/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=110">Bookmark Bronco</a> 
	<a href="https://www.olissea.com/mb/links/1/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=81">Liens en vrac de JeromeJ</a> 
	<a href="https://my.shaarli.fr/elgrosp/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=177">Liens dElgrosp</a> 
	<a href="https://macahute.net/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=160">Alexs shaarli</a> 
	<a href="https://mayaweb.fr/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=324">Les Internets de MayaJ</a> 
	<a href="https://chabotsi.fr/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=65">some links&nbsp;−&nbsp;chabotsi</a> 
	<a href="https://my.shaarli.fr/tinu/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=200">tinu</a> 
	<a href="http://www.forum-des-oranges.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=59">Shaarli des OrAnGeS</a> 
	<a href="http://naxos.fr.free.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=27">De tout et de rien...</a> 
	<a href="https://www.la-pub-dans-les-films.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=90">bookmarks</a> 
	<a href="https://tools.aldarone.fr/share/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=120">Les petits liens dAlda</a> 
	<a href="http://peacecopathe.free.fr/peacecoLiens/index.php5"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=164">peacecoLiens</a> 
	<a href="https://shaarli.fr/my/gezar/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=228">Gezars links</a> 
	<a href="http://links.neros.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=106">Liens de Neros</a> 
	<a href="https://www.ecirtam.net/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=151">Oros links</a> 
	<a href="http://liens.vader.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=7">Les piti liens de Vader</a> 
	<a href="https://la-vache-libre.org/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=165">La vache libre</a> 
	<a href="http://www.dotmana.com/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=49">Dotmana interesting links</a> 
	<a href="https://my.shaarli.fr/aceawan/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=141">Aceawans links</a> 
	<a href="https://www.shaarli.fr/my/Apmez/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=281">Apmez</a> 
	<a href="https://id-libre.org/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=76">shaarliGor</a> 
	<a href="http://ws.rofl.lan:8094/links/pogo/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=5">PoGos Links</a> 
	<a href="http://shaarli.base-jump.info/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=64">BASE Jump et mauvaise humeur</a> 
	<a href="https://shaarli.fr/my/TD/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=223">Liens de TD (ancien shaarli)</a> 
	<a href="http://lamecarlate.net/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=28">Liste de liens dAkaiKen : tech, miam, art, sociologie</a> 
	<a href="http://porneia.free.fr/pub/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=57">Porneia delights shaarli</a> 
	<a href="https://links.qth.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=157">Les liens de Fanch</a> 
	<a href="https://my.shaarli.fr/carterphoenix/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=178">Carter Phoenix à la rescousse</a> 
	<a href="http://abel.antunes.free.fr/shaarli/index.php5"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=219">Mes liens - Abel</a> 
	<a href="https://orangina-rouge.org/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=260">Shaarli | Orangina Rouge</a> 
	<a href="https://liens.quaternum.net/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=89">Liens [quaternum]</a> 
	<a href="http://www.petitetremalfaisant.eu/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=14">Les Petits Liens Malfaisants</a> 
	<a href="http://shaarli.chassegnouf.net/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=238">Favoris de Chassegnouf</a> 
	<a href="http://ponyhacks.com/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=325">KraZhtest - Pony links - Fresh hacks - Cest le bordel</a> 
	<a href="http://redbeard.free.fr/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=126">Red Beard</a> 
	<a href="https://cesselin.eu/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=111">Celias links - professional or more informal</a> 
	<a href="https://www.shaarli.fr/my/lolol/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=224">Hello</a> 
	<a href="https://shaarli.mydjey.eu/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=107">Le bazar de mydjey</a> 
	<a href="https://www.shaarli.fr/my/oOo.Manu.oOo/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=295">Mind Sticky</a> 
	<a href="https://links.kalvn.net/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=288">Kalvns links</a> 
	<a href="https://jeekajoo.eu/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=303">@jeekajoo links</a> 
	<a href="http://bookmarks.ecyseo.net/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=44">Liens Ecyseo</a> 
	<a href="https://viperr.org/shaarli/index.php"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=270">Viperrs Shaarli</a> 
	<a href="https://my.shaarli.fr/pastan/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=168">Passe-Temps</a> 
	<a href="https://sh.ack.red/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=214">Liens des pleutres</a> 
	<a href="https://planetexpress.fr/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=300">The Artist Links</a> 
	<a href="https://eyes-of-universe.eu/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=312">Shaarli Eyes of Universe</a> 
	<a href="http://geekandtips.com/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=196">Geek and Tips links</a> 
	<a href="http://shaarli.plop.me/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=313">Plop Links</a> 
	<a href="https://shaarli.pandouillaroux.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=118">Le petit bazar du Panda Roux</a> 
	<a href="https://my.shaarli.fr/raphael/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=262">◄ Raphaels shaarlinks ►</a> 
	<a href="http://www.lochot.com/flux/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=282">Mon GN - News Gnistes</a> 
	<a href="https://web.devenet.eu/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=319">Links · Devenet</a> 
	<a href="http://li.sajous.net/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=13">li.sajous.net</a> 
	<a href="http://nabella.digital-engine.info/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=2">Nabellaleen - Links</a> 
	<a href="https://www.shaarli.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=88">Shaarlo</a> 
	<a href="http://liens.planet-libre.org/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=98">Brèves du Planet Libre</a> 
	<a href="http://crashweb.org/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=192">Favoris</a> 
	<a href="https://eric.bugnet.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=221">Liens et humeurs</a> 
	<a href="https://my.shaarli.fr/spl33n/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=166">spl33n</a> 
	<a href="https://my.shaarli.fr/Funvrac/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=176">Freedom Comments</a> 
	<a href="https://shaarli.fr/my/grywald/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=231">Grywalds Shaarli</a> 
	<a href="http://refok.fr/4/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=215">actualités et liens du Net, booster le ref avec Shaarli</a> 
	<a href="https://nas.eownis.me/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=156">eownis</a> 
	<a href="http://links.bill2-software.com/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=39">Bill2s Links</a> 
	<a href="http://b.xuv.be/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=102">xuvs bookmarks</a> 
	<a href="https://lzko.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=210">TIENS !?</a> 
	<a href="https://ayoglife.net/gathered/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=256">gathered</a> 
	<a href="http://"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=22">Vivis Links</a> 
	<a href="https://fabienm.eu/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=138">yakmoijebrille</a> 
	<a href="https://my.shaarli.fr/wagabow/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=269">wagabow</a> 
	<a href="https://www.shaarli.fr/my/georgesa/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=218">liens</a> 
	<a href="http://www.nicolargo.com:8080/links/index.php"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=68">NicoLinks</a> 
	<a href="https://my.shaarli.fr/bdv89/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=170">Necture</a> 
	<a href="https://hoab.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=115">Hoab - Shaarli</a> 
	<a href="https://ithake.eu/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=82">Shaarlithake | Maxs links</a> 
	<a href="https://links.aurem.org/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=273">aurem:liens</a> 
	<a href="https://links.yosko.net/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=37">Yoskos shaarli</a> 
	<a href="https://shaarli.fr/my/shaarli.de.charly/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=232">shaarli 2 charly</a> 
	<a href="https://shaarli.fr/my/uNouss/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=328">mon surf en partage</a> 
	<a href="https://www.shaarli.fr/my/BTSSIO/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=284">BTS-SIO</a> 
	<a href="https://shaarli.tech-blog.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=146">Shaarli de Tech-Blog.fr</a> 
	<a href="https://shaarli.dimtion.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=244">Dans la poche de Dimtion</a> 
	<a href="http://shaarli.nemocorp.info/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=142">Les liens de Nemocorp</a> 
	<a href="http://bahadour.fr/link/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=41">maniakteam</a> 
	<a href="https://shaarli.fr/my/titerin/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=230">Wheres Waldo</a> 
	<a href="http://www.ladmasma.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=201">Shaarli ladmasmien</a> 
	<a href="http://www.seven-ash-street.fr/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=17">Riffs Links</a> 
	<a href="http://vermot.net/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=193">Liens en vrac de Clem</a> 
	<a href="https://www.ecirtam.net/opennews/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=143">OpenNews</a> 
	<a href="http://france.besson.free.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=184">biblio.chine.corée.japon.infos</a> 
	<a href="https://j-mad.com/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=30">Les liens de Mr Jmad</a> 
	<a href="https://www.f.0x2501.org/s/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=113">f.0x2501.org</a> 
	<a href="https://shaarli.fr/my/toto/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=234">toto</a> 
	<a href="https://www.shaarli.fr/my/Killiox/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=206">Larchive du renard</a> 
	<a href="https://links.hoa.ro/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=75">Arthur HOARO</a> 
	<a href="http://lien.shazen.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=103">Marquetapages Shazen</a> 
	<a href="http://spynaej.eu/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=264">L!NKS</a> 
	<a href="https://my.shaarli.fr/LoicGDL/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=280">LoicGDL</a> 
	<a href="https://shaarli.bananium.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=152">Nos liens débiles</a> 
	<a href="https://www.shaarli.fr/my/puzobo/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=321">Puzobo</a> 
	<a href="http://shaarli.matronix.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=283">Mes petits liens à sauvegarder</a> 
	<a href="https://www.nothing-is-3d.com/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=80">Vinc3rs links</a> 
	<a href="https://links.nekoblog.org/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=163">Nekoblog.org :: Marque-pages</a> 
	<a href="http://lehollandaisvolant.net/?mode=links"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=182">le hollandais volant</a> 
	<a href="https://links.yome.ch/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=96">/Yome/links</a> 
	<a href="http://lepingouin.info/bookmark/index.php"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=47">bookmark pingouin</a> 
	<a href="https://links.imirhil.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=287">Shared links on https://links.imirhil.fr/</a> 
	<a href="https://geekz0ne.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=254">Shaarli Geekz0ne</a> 
	<a href="https://shaarli.zertrin.org/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=62">Zertrins links</a> 
	<a href="https://www.shaarli.fr/my/crounch/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=301">Crounchez la vie</a> 
	<a href="https://mublog.fiat-tux.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=50">Fiat tux microblogging</a> 
	<a href="https://www.morgangeek.be/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=123">Morgangeek - Liens</a> 
	<a href="https://www.shaarli.fr/my/fhosatte/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=322">Fbien</a> 
	<a href="https://perso.ens-lyon.fr/guillaume.aupy/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=11">Gopis Links</a> 
	<a href="https://www.shaarli.fr/my/JaySnyper/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=286">Les lien de Jay Snyper</a> 
	<a href="https://toutetrien.lithio.fr/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=294">ToutEtRien | Codeur Impulsif</a> 
	<a href="http://lalleau.com.free.fr/index.php5"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=187">Une cascade de liens</a> 
	<a href="http://aloco.free.fr/info/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=66">Veille technique</a> 
	<a href="https://my.shaarli.fr/Kumquat/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=253">Zestes didées // Ideas zests</a> 
	<a href="https://shaarli.muges.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=255">Muges</a> 
	<a href="http://lafrite.poneyworld.net/liens/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=276">Liens de poneyworld</a> 
	<a href="http://links.tomcanac.com/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=212">Les liens de Tom</a> 
	<a href="http://sameganegie.biz/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=250">Shaarli de Sam Ganegie</a> 
	<a href="http://dhoko.me/liens/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=318">Dhoko/liens</a> 
	<a href="https://daniel.gorgones.net/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=263">Lespace... Cifiste</a> 
	<a href="http://www.ademcan.net/index.php"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=72">Ademcans links</a> 
	<a href="https://www.shaarli.fr/my/duke/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=299">brace yourself, links are coming...</a> 
	<a href="https://thomasd.eu/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=292">Liens de TD</a> 
	<a href="https://mescanefeux.com/link/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=86">Link (The Legend of Zelda)</a> 
	<a href="https://stuper.info/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=85">stuper</a> 
	<a href="https://shaar.libox.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=271">Liandris Links.</a> 
	<a href="https://fspot.org/lnk/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=84">fspot</a> 
	<a href="https://my.shaarli.fr/aguy/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=247">Shared links on http://my.shaarli.fr/aguy/</a> 
	<a href="http://www.angeraph.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=216">Les petits liens de Angeraph</a> 
	<a href="https://dinask.eu/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=83">dinask.eu Links</a> 
	<a href="https://www.rakforgeron.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=101">www.rakforgeron.fr - Actualité de la généalogie</a> 
	<a href="http://links.nicolas-constant.com/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=204">Nicolas Constant Links</a> 
	<a href="http://links.rom1v.com/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=137">®oms shaarli</a> 
	<a href="https://www.shaarli.fr/my/capabilities/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=305">Capabilities</a> 
	<a href="https://suumitsu.eu/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=148">Mitsuliens</a> 
	<a href="https://my.shaarli.fr/tsyr2ko/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=167">Links from tsyr2kos wandering</a> 
	<a href="https://www.mygaia.org/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=46">Binerfs links</a> 
	<a href="https://shaarli.fr/my/aceawan/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=109">Aceawans links</a> 
	<a href="http://www.gerardmenvussa.ch/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=159">grolimurs shared links</a> 
	<a href="https://book.knah-tsaeb.org/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=19">Les liens de Knah Tsaeb</a> 
	<a href="https://www.ouahouah.eu/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=190">Chez OuahOuah - des liens et du hack !</a> 
	<a href="https://my.shaarli.fr/Jadiquertz/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=309">Du Quertz</a> 
	<a href="http://inicoop.org/revuedepresse/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=298">iniCOOP : La coopération au quotidien</a> 
	<a href="https://links.sirc.at/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=162">Les liens de Sanctuary</a> 
	<a href="https://liens.nonymous.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=124">partage de liens - nonymous</a> 
	<a href="https://www.shaarli.fr/my/tinu/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=217">tinu</a> 
	<a href="https://shaarli.memiks.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=33">Les Liens de Memiks</a> 
	<a href="https://rdmz.lockhart.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=317">Roy’s Pilofshiet</a> 
	<a href="http://angeraph.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=211">Les petits liens de Angeraph</a> 
	<a href="https://my.shaarli.fr/Killiox/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=179">Larchive du renard</a> 
	<a href="http://links.la-bnbox.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=20">Links Lounge</a> 
	<a href="https://my.shaarli.fr/wdavidoff/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=222">wdavidoff</a> 
	<a href="https://adrian.gaudebert.fr/feed/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=79">Links | Adrian Gaudebert</a> 
	<a href="http://anadrark.com/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=45">Anadrark - Liens en bordel</a> 
	<a href="https://pierreghz.legtux.org/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=6">Liens divers, pierreghz</a> 
	<a href="https://powerjpm.info/liens/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=121">Liens de WebManiaK</a> 
	<a href="https://shaarli.wackou.com/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=181">Shared links on shaarli.wackou.com</a> 
	<a href="http://shaarli.aceawan.eu/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=277">Les liens daceawan</a> 
	<a href="https://links.phyks.me/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=108">find ~phyks -type l</a> 
	<a href="https://my.shaarli.fr/titerin/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=172">Wheres Waldo</a> 
	<a href="https://shaarli.aegirs.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=194">Des ptits liens</a> 
	<a href="https://my.shaarli.fr/grywald/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=175">Grywalds Shaarli</a> 
	<a href="https://links.kevinvuilleumier.net/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=71">Liens en bazar</a> 
	<a href="https://my.shaarli.fr/dave_idem/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=220">Pas de pierre, pas de palais... Pas de palais... Pas de palais !</a> 
	<a href="https://links.purexo.eu/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=266">Les Petits Liens de Purexo</a> 
	<a href="https://shaarli.guiguishow.info/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=40">GuiGuis Show</a> 
	<a href="http://nicolas-delsaux.hd.free.fr:8080/Shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=267">de Riduidel</a> 
	<a href="http://shaarli.galsungen.net/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=34">Liens vrac de Galsungen</a> 
	<a href="https://my.shaarli.fr/regishamann/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=173">Vous reprendrez bien quelques liens</a> 
	<a href="http://manuel.flury.free.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=29">Mind sticky</a> 
	<a href="https://foualier.gregory-thibault.com/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=78">Fou à lier</a> 
	<a href="https://www.shaarli.fr/my/t0m/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=285">les liens de Thomas</a> 
	<a href="https://olivier.dossmann.net/liens/index.php"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=10">Olivier DOSSMANN</a> 
	<a href="https://shaarli.fr/my/pastan/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=225">Passe-Temps</a> 
	<a href="http://bookmarks.ecyseo.net/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=147">Liens Ecyseo</a> 
	<a href="http://"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=145">JMLRTs Shaarli</a> 
	<a href="https://links.cochi.se/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=306">Liens de Cochise</a> 
	<a href="https://www.shaarli.fr/my/maxsowilli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=320">Les Liens de Maxsowilli</a> 
	<a href="http://links.belfalas.eu/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=249">Belfäläs</a> 
	<a href="http://arzhura.dsv.re/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=259">shaarli de disanv pareañ</a> 
	<a href="http://jdxlabs.com/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=117">links@jdxlabs</a> 
	<a href="https://shaarli.amaury.carrade.eu/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=239">Les divers liens dAmaury</a> 
	<a href="http://links.gatitac.eu/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=248">Les liens de Gatitac</a> 
	<a href="https://shaarli.fr/my/bdv89/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=227">Necture</a> 
	<a href="http://yggz.org/Shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=316">Kourais Bookmarks and Saves</a> 
	<a href="https://liens.effingo.be/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=4">alexis j : : web</a> 
	<a href="http://cochi.se/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=16">Liens de Cochise</a> 
	<a href="https://www.shaarli.fr/my/dididi/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=307">glanaged2de</a> 
	<a href="http://www.viggor.eu/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=67">Vigor Links</a> 
	<a href="https://www.endepitdubonsens.fr/vrac/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=213">Vrac En Depit Du Bon Sens</a> 
	<a href="http://links.gardouille.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=114">Gardouilles Links</a> 
	<a href="http://www.ascadia.net/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=258">Shaarli de Marc</a> 
	<a href="https://e-loquens.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=35">Un catalogue hétéroclite (shaarli de-loquens.fr)</a> 
	<a href="http://azikan.free.fr/bookmarks/index.php"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=31">Les liens de kita59</a> 
	<a href="https://gilles.wittezaele.fr/liens/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=235">Liens dun Parigot-Manchot</a> 
	<a href="https://links.maih.eu/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=122">Maih.eu - Links</a> 
	<a href="https://shaarli.youm.org/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=150">Les Post-It de la MerMouY</a> 
	<a href="http://pittux.ovh/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=272">Les liens de Pittux</a> 
	<a href="https://shaarli.cafai.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=245">CAFAI Liens en Vrac</a> 
	<a href="https://eownis.myds.me/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=155">eownis</a> 
	<a href="https://sykius.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=24">Sykius - Shaarli</a> 
	<a href="http://costumescrime.net/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=135">Dream</a> 
	<a href="https://bookmarks.xavierbarbot.com/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=180">Mes Bookmarks / Favoris</a> 
	<a href="https://gilles.wittezaele.fr/pro/liens/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=154">BiblioManchot</a> 
	<a href="https://dial.contestataire.net/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=240">Les tout petits liens de Zouzou</a> 
	<a href="http://sensini42.free.fr/shaarli/index.php"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=42">Intéressant&nbsp;?</a> 
	<a href="https://dooby.fr/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=183">Doos links</a> 
	<a href="https://r2dd2.org/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=323">☠☣☠⚡☠ Liens en vrac de nW44b ☠☣☠⚡☠</a> 
	<a href="http://www.aredje.net/shaarli/index.php"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=293">shaarli@aredje</a> 
	<a href="http://herveleblouch.free.fr/liens/index.php5"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=12">liens de http://herveleblouch.free.fr</a> 
	<a href="http://lepaille.fr/bookmark/index.php"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=15">mes liens</a> 
	<a href="https://shaarli.ithake.eu/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=188">Shaarlithake | Maxs links</a> 
	<a href="https://shaarli.zeseb.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=136">ZeShaarli</a> 
	<a href="https://ginkobox.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=329">Ginkos Link Dump</a> 
	<a href="https://www.dumaine.me/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=236">Aurels Shaarli</a> 
	<a href="https://liens.strak.ch/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=129">Strak.ch | Actu et liens en vrac</a> 
	<a href="https://shaarli.fr/my/AlphaZeta/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=242">Partager de Alpha à Zeta et bien plus...</a> 
	<a href="https://www.ventredudiplodocus.fr/liens/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=100">Liens "A lire ailleurs" du diplodocus</a> 
	<a href="https://www.disparaitre-ici.fr/services/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=209">SADMANs Shaarli</a> 
	<a href="http://links.green-effect.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=104">Shaarli de Erase</a> 
	<a href="http://links.e-jambon.com/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=199">Rocking links</a> 
	<a href="https://sammyfisherjr.net/Shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=93">Choses vues, sur le web et ailleurs</a> 
	<a href="http://"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=26">palkeo - liens</a> 
	<a href="https://shaarli.fr/my/spl33n/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=229">spl33n</a> 
	<a href="https://www.e-jim.be/liens/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=197">Les liens de Jim</a> 
	<a href="https://bajazet.fr/shaarli/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=289">Liens éclairs</a> 
	<a href="https://arnaudb.net/links/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=191">Doos links</a> 
	<a href="https://shaarli.brihx.fr/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=326">Les liens de Brihx</a> 
	<a href="https://www.shaarli.fr/my/mac551me/"><img class="favicon" src="http://shaarli-api.ecirtam.net/getfavicon?id=278">dans mes oreilles</a>
	
	</div><hr />	
	<div id="descShaarli">	
';


foreach ($xml->channel->item as $item) {

    $stampDate = $item->pubDate;
    $euDate = date("U", strtotime($stampDate));

  $bank = array();
  $bank[sHaaRLiD] = $baseCount;
  $bank['unixTime'] = $euDate;
  $bank['title'] = $item->title;
  $bank['link'] = $item->link;
  $bank['description'] = $item->description;
  $bank['pubDate'] = $item->pubDate;
  $bank['guid'] = $item->guid;
  // echo json_encode($bank,JSON_UNESCAPED_SLASHES);
  // echo json_encode($bank);
  echo "<p><a href='".$item->link."'>".$item->title. "</a>&nbsp;|&nbsp;<small></small></p>";
  echo '<p>' . $item->description . '</p>';

  echo "<hr />";
  // echo json_encode( $item->pubDate, JSON_UNESCAPED_SLASHES);

}

$shTitle = $item->title;
$earList=$dom->getElementsByTagName('p');
$titleList=$dom->getElementsByTagName('title');
$imgList=$dom->getElementsByTagName('img');

echo '
	<style>
	body {font-size:1.6em}
	a:hover {cursor:pointer;color:green}
	textarea {font-size:1.1em;min-width:100%;height:50%;min-height:66%}
	</style>
	<form>
';
   
echo '
	<i><strong><a style="margin:-45 2% 0 0;float:right" href="'.$wiki.'">'.$titleList->item(0)->nodeValue.'</a></strong></i>
';
echo $imgList->item(2)->src;
echo '
	</strong><div class="clearfix"></div>        
	<br><input type="text" data-name="french" id="earInput" value="fucked"  class="txt">
    ';

for($p=0;$p<$earList->length;++$p)
		{
	$dd=explode("(",$earList->item($p)->nodeValue);
	$cc=  trim($dd[0]);	
	$keta = earWiki.++$p;
	echo '<div>
	<input type="text" data-name="french" id="earInput"  class="txt">YO';
	
	$listenP; 
	for($p=$listenP;$p<$earList->length;++$p) {
	$dd=explode("(",$earList->item($p)->nodeValue);
	$cc=  trim($dd[0]);	
	$filpwn = str_replace("Array", "lol", $earList->item($p)->nodeValue);
}; 
echo '</textarea>
       </form>
      <div>
    </div>
  </div>
</div>';
}; 
echo '
<script>
	var getDom = document.getElementById("descShaarli").innerText;
	var readShaarli = getDom.replace("Permalink", readShaarli);
	document.getElementById("earInput").value = readShaarli;
	var pitch = document.querySelector("#pitch"); 
	var rate = document.querySelector("#rate");	
	var synth = window.speechSynthesis;
	var bonneMine = document.getElementById("earInput").value;
	var utterThis = new SpeechSynthesisUtterance(bonneMine);
	var selectedOption = "french";
	utterThis.pitch = pitch.value;
	utterThis.rate = rate.value;
	synth.speak(utterThis);
	var pitchValue = document.querySelector(".pitch-value");
	var rateValue = document.querySelector(".rate-value");
	pitch.onchange = function() {
	pitchValue.textContent = pitch.value;
	utterThis.pitch = pitch.value;
	location.reload(); 
	}
	rate.onchange = function() {
	rateValue.textContent = rate.value;
	location.reload(); 
	}
	//~ if ("speechSynthesis" in window) {
	//~ // Ok!
	//~ } else {
	//~ // You need Firefox dev 49+.
	//~ }
	
	var anchors = document.getElementsByTagName("a");
	
	for (var i = 0; i < anchors.length; i++) {
	anchors[i].href = "http://ponyhacks.com/open/apps/earwiki/ear_shaarli.php?shaarli=" + anchors[i].href + "?do=rss";
	}
	document.getElementById("river").href = "http://ponyhacks.com/open/apps/earwiki/ear_shaarli.php?shaarli=http://shaarli-api.ecirtam.net/latest?format=rss";	
</script>

</body>';

if ($listen != null) {
   //
	}
else if ($wiki != null && $listen == null) {
   // 
}
if  ($wiki == null && $listen == null) {
	echo "<br>Bienvenue.<br> Et si vous pourriez <i>écouter</i> shaarli?<br>  <i>Voici venu la <a href=&prime;https://developer.mozilla.org/en-US/docs/Web/API/Web_Speech_API&prime;></a>web speech api.</a></i><br>
	Firefox 47+, passer les clés:<br>
	<i>media.webspeech.recognition.enable</i><br>
	<i>media.webspeech.synth.enabled</i><br>  
	à true dans <a href=https://support.mozilla.org/fr/kb/editeur-de-configuration-pour-firefox>about:config</a>          	
	";};
    
 
