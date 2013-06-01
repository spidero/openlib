{include file="header.tpl"}
{if $log == "1"}
Czytalnicy:<br><br>
<table>
<thead>
<tr><th>Imię</th><th>Nazwisko</th><th>Login</th><th>E-mail</th><th>Opcje</th></tr>
</thead>
{foreach from=$users item=s}
<td>{$s.imie}</td><td>{$s.nazwisko}</td><td>{$s.login}</td><td>{$s.email}</td><td>

</td>
</tr>
{/foreach}
</table>


{else}
{include file="niezalogowany.tpl"}
{/if}
{include file="footer.tpl" }
