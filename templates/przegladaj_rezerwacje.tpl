{include file="header.tpl"}
{if $log == "1"}
Rezerwacje:<br><br>
<table>
<thead>
<tr><th>Imię</th><th>Nazwisko</th><th>Tytuł</th><th>Data rezerwacji</th><th>Status</th><th>Opcje</th></tr>
</thead>
{foreach from=$rez item=s}
<tr>
<td>{$s.imie}</td><td>{$s.nazwisko}</td><td><b>{$s.book}</b></td><td>{$s.date}<td>
{if $s.status=="0"}
<p style="bgcolor: yellow">Czeka</p>
{elseif $s.status=="1"}
<p style="bgcolor: green">Do odbioru</p>
{/if}
</td>
<td><a href="/przegladaj_rezerwacje/wyp/{$s.id_book}/">Wypożycz</a></td>
</tr>
{/foreach}
</table>
{else}
{include file="niezalogowany.tpl"}
{/if}
{include file="footer.tpl" }
