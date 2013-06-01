{include file="header.tpl"}
{if $log == "1" AND $dane.status == '2'}
{if $info_box !=""}
{$info_box}
<br><br>
{/if}
    <form method="POST" action="/dodaj_zasob/">
        <div id="formularz">
            <label>Autor:</label><select name="author">
{foreach from=$authors item=a}
<option value="{$a.id_author}">{$a.surname} {$a.name}</option>
{/foreach}
</select>
        </div>
        <div id="formularz">
            <label>Nazwa:</label><input name="nazwa">
        </div>
        <div id="formularz">
            <label>ISBN:</label><input name="isbn">
        </div>
        <div id="formularz">
            <input name="submit" type="submit" value="Dodaj">
        </div>
    </form>

{else}
{include file="niezalogowany.tpl"}
{/if}
{include file="footer.tpl"}
