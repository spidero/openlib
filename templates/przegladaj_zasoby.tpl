{include file="header.tpl"}
{if $log == "1"}
Zasoby:<br><br>
<table>
<thead>
<tr><th>Imię</th><th>Nazwisko</th><th>Tytuł</th><th>Opcje</th><th></th></tr>
</thead>
{foreach from=$books item=s}
<tr>
<td>{$s.name}</td><td>{$s.surname}</td><td><b>{$s.book}</b></td><td>
<a href="/przegladaj_zasoby/dodaj/{$s.id_book}/">Dodaj lokalnie</a>
</td>
</tr>
{/foreach}
</table>
{else}
{include file="niezalogowany.tpl"}
{/if}
{include file="footer.tpl" }
