<?php
ini_set('display_errors', 0);

$url = "http://example.com/";

if(isset($_GET['url']) && $_GET['url'] != ""){
	if (preg_match('/^(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/', $_GET['url'])) {
		$url = $_GET['url'];
	} else {
		$url = "";
		return;
	}
}

$url2 = str_replace("http://", "", $url);

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);

//twitter
$req = "http://urls.api.twitter.com/1/urls/count.json?url=".$url;
curl_setopt($ch, CURLOPT_URL, $req);
$res = curl_exec($ch);
$res = json_decode($res, true);
$tw = $res["count"];

//delicious
$req = "http://feeds.delicious.com/v2/json/urlinfo/data?hash=".md5($url);
curl_setopt($ch, CURLOPT_URL, $req);
$res = curl_exec($ch);
$res = json_decode($res, true);
if(isset($res[0]["total_posts"])){
	$de = $res[0]["total_posts"];
}else{
	$de = 0;
}

//facebook
$req = "http://api.facebook.com/method/fql.query?query=select%20like_count,%20share_count,%20comment_count%20from%20link_stat%20where%20url=%22".$url."%22";
curl_setopt($ch, CURLOPT_URL, $req);
$res = curl_exec($ch);
$xml = new SimpleXMLElement($res);
$fb["like"]  = (string)$xml->link_stat[0]->like_count;
$fb["share"] = (string)$xml->link_stat[0]->share_count;
$fb["comment"] = (string)$xml->link_stat[0]->comment_count;
foreach($fb as $key => $value){
	if($value == ""){$fb[$key] = 0;}
}

//2ch
$req = "http://search.yahoo.co.jp/search?p=site%3A%222ch.net%22+%22".$url2."%22";
curl_setopt($ch, CURLOPT_URL, $req);
$res = curl_exec($ch);
$res = explode("件目 / 約", $res);
if(isset($res[1])){
	$res = explode("件 - ", $res[1]);
	$ni = str_replace(",", "", $res[0]);
}else{
	$ni = 0;
}

//blog
$req = "http://blog.search.yahoo.co.jp/search?p=".$url2;
curl_setopt($ch, CURLOPT_URL, $req);
$res = curl_exec($ch);
$res = explode("件目 / 約<span class=\"bo\">", $res);
if(isset($res[1])){
	$res = explode("</span>件", $res[1]);
	$blog = str_replace(",", "", $res[0]);
}else{
	$blog = 0;
}

curl_close($ch);
?>