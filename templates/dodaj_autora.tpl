{include file="header.tpl"}
{if $log == "1" AND $dane.status == '2'}
{if $info_box !=""}
{$info_box}
<br><br>
{/if}

    <form method="POST" action="/dodaj_autora/">
        <div id="formularz">
            <label>Autor imię:</label><input name="imie">
        </div>
        <div id="formularz">
            <label>Autor Nazwisko:</label><input name="nazwisko">
        </div>
        <div id="formularz">
            <input name="submit" type="submit" value="Dodaj">
        </div>
    </form>

{else}
{include file="niezalogowany.tpl"}
{/if}
{include file="footer.tpl"}
