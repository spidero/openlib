{include file="header.tpl"}
{if $log == "1"}
<p>
Witaj: <b> {$dane.imie} {$dane.nazwisko}</b><br><br>Status: <b>
{if $dane.status=='1'}
Czytelnik
{elseif $dane.status=='2'}
Administrator bibioteki
{elseif $dane.status=='3'}
Administrator główny
{/if}
</b>
</p>
{else}
<p>Nu, Nu, Nu - tylko dla zalogowanych :)</p>
{/if}
{include file="footer.tpl" }
