{include file="header.tpl"}
{if $log == "1"}
Twoje rezerwacje:<br><br>
<table>
<thead>
<tr><th>Imię</th><th>Nazwisko</th><th>Tytuł</th><th>Status</th><th></th></tr>
</thead>
{foreach from=$rez item=s}
<tr>
<td>{$s.name}</td><td>{$s.surname}</td><td><b>{$s.book}</b></td><td>
{if $s.status=="0"}
<p style="bgcolor: yellow">Czeka</p>
{elseif $s.status=="1"}
<p style="bgcolor: green">Do odbioru</p>
{/if}
</td>
</tr>
{/foreach}
</table>
{else}
{include file="niezalogowany.tpl"}
{/if}
{include file="footer.tpl" }
