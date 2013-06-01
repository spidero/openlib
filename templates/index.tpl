{include file="header.tpl"}<br>
{foreach from=$pytania item=pytanie}
<div class="box">
<h2>{$pytanie.temat}</h2>
<p>{$pytanie.tresc}</p>{if $pytanie.kom=="1"}
<p>[<a href="odpowiedz.php?id={$pytanie.idpy}">Dodaj komentarz</a>]&nbsp; [Komentarze: {$pytanie.odp_count}]&nbsp; [{$pytanie.data}] [Napisał: <b> {$pytanie.nick}</b>]
</p>
{else}
<p>[Komentarze zablokowane]</p>
{/if}
<br></div>
{/foreach}
<br>

{include file="footer.tpl" }
