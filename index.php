<?php require("./curl.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="twitter,Facebook,ソーシャルブックマーク,はてなブックマーク,Yahoo!ブックマーク,livedoorクリップ,Buzzurl,delicious,2ちゃんねる,ブログ" />
<meta name="description" content="ウェブサイトがtwitter,Facebook,ソーシャルブックマークなどでシェアされている数をまとめてチェックできます。" />
<meta http-equiv="content-Style-type" content="text/css" />
<meta http-equiv="content-Script-type" content="text/javascript" />
<title>social checker</title>
<link rel="stylesheet" type="text/css" href="./style.css" />
<link rel="shortcut icon" href="./image/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="icon" href="./image/favicon.ico" type="image/vnd.microsoft.icon" />
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20423739-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
&nbsp;<a href="http://tiger4th.com/"><span class="link">TOP</span></a>

<div class="centerMiddle" align="center">
<h1>social checker</h1>

<form>
URL : <input type="test" name="url" size=50 value=<?php echo $url; ?>>
<input type="submit" value="check">
<br /><br />
</form>



<?php if($url!=""){ ?>
<table align="center">

<tr align="center" valign="top">
<td><a href="https://twitter.com/" target="_brank">twitter</a><br />
<a href="http://topsy.com/<?php echo $url2; ?>" target="_brank"><span class="tw"><?php echo $tw; ?> tweet<?php if($tw>1){echo "s";} ?></span></a>
</td>

<td>&nbsp;</td>

<td><a href="http://b.hatena.ne.jp/" target="_brank">Hatena</a><br />
<a href="http://b.hatena.ne.jp/entry/<?php echo $url; ?>" target="_brank"><img src="http://b.hatena.ne.jp/entry/image/large/<?php echo $url; ?>"></a>
</td>

<td>&nbsp;</td>

<td><a href="http://bookmarks.yahoo.co.jp/all" target="_brank">Yahoo!</a><br />
<a href="http://bookmarks.yahoo.co.jp/url?url=<?php echo $url; ?>" target="_brank"><img src='http://num.bookmarks.yahoo.co.jp/image/small/<?php echo $url; ?>' /></a>
</td>

<td>&nbsp;</td>

<td><a href="http://clip.livedoor.com/" target="_brank">livedoor</a><br />
<a href="http://clip.livedoor.com/page/<?php echo $url; ?>" target="_brank"><img src="http://image.clip.livedoor.com/counter/medium/<?php echo $url; ?>"></a>
</td>

<td>&nbsp;</td>

<td><a href="http://buzzurl.jp/" target="_brank">Buzzurl</a><br />
<a href="http://buzzurl.jp/entry/<?php echo $url; ?>" target="_brank"><img src='http://api.buzzurl.jp/api/counter/<?php echo $url; ?>' alt='Buzzurlにブックマーク'></a>
</td>

<td>&nbsp;</td>

<td><a href="http://www.delicious.com/" target="_brank">delicious</a><br />
<a href="http://delicious.com/url?url=<?php echo $url; ?>" target="_brank"><span class="de">&nbsp;<?php echo $de; ?> <?php if($de>1){echo "PEOPLE";}else{echo "PERSON";} ?>&nbsp;</span></a>
</td>

</tr>
</table>

<br />

<table align="center">
<tr align="center" valign="top">

<td><a href="http://www.facebook.com/" target="_brank">Facebook</a><br />
<a href="http://www.google.co.jp/search?q=site%3Afacebook.com+%22<?php echo $url2; ?>%22" target="_brank"><span class="fb"><?php echo $fb["like"]; ?> like<?php if($fb["like"]>1){echo "s";} ?></span></a>
</td>

<td>&nbsp;</td>

<td><a href="http://www.facebook.com/" target="_brank">Facebook</a><br />
<a href="http://www.google.co.jp/search?q=site%3Afacebook.com+%22<?php echo $url2; ?>%22" target="_brank"><span class="fb"><?php echo $fb["share"]; ?> share<?php if($fb["share"]>1){echo "s";} ?></span></a>
</td>

<td>&nbsp;</td>

<td><a href="http://www.facebook.com/" target="_brank">Facebook</a><br />
<a href="http://www.google.co.jp/search?q=site%3Afacebook.com+%22<?php echo $url2; ?>%22" target="_brank"><span class="fb"><?php echo $fb["comment"]; ?> comment<?php if($fb["comment"]>1){echo "s";} ?></span></a>
</td>

<td>&nbsp;</td>

<td><a href="http://www.2ch.net/" target="_brank">2ch</a><br />
<a href="http://www.google.co.jp/search?q=site%3A%222ch.net%22+%22<?php echo $url2; ?>%22" target="_brank"><span class="ni"><?php echo $ni; ?> res</span></a>
</td>

<td>&nbsp;</td>

<td><a href="http://blog-search.yahoo.co.jp/" target="_brank">Blog</a><br />
<a href="http://blog.search.yahoo.co.jp/search?p=<?php echo $url2; ?>" target="_brank"><span class="bl"><?php echo $blog; ?> article<?php if($blog>1){echo "s";} ?></span></a>
</td>
<td><br />

</td>

</tr>
</table>

<?php }else{ ?>
<span class="er">Invalid URL specified</span>
<?php } ?>

<br />

<!-- admax -->
<script type="text/javascript" src="http://adm.shinobi.jp/s/a117e231dd88f320d7777a27242eea01"></script>
<!-- admax -->
<br /><br />

<div class="addthis">
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_twitter"></a>
<a class="addthis_button_facebook"></a>
<a class="addthis_button_hatena"></a>
<a class="addthis_button_bookmarks.yahoo.co.jp"></a>
<a class="addthis_button_clip.livedoor.com"></a>
<a class="addthis_button_buzzurl.jp"></a>
<a class="addthis_button_delicious"></a>
<a class="addthis_button_google_plusone" g:plusone:size="small" g:plusone:count="false"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e3ab77310f2fc55"></script>
<!-- AddThis Button END -->
<?php require("./js/addthis.js"); ?>
</div>


</div>

</body>
</html>