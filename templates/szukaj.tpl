{include file="header.tpl"}
{if $log == "1"}
{if $info !=""}
{$info}
<br>
{/if}
{if $lista !="1"}
    <h3>Szukaj książki:</h3>
    <form method="POST" action="/szukaj/">
        <div id="formularz">
            <label>Autor:</label><input name="autor">
        </div>
        <div id="formularz">
            <label>Tutuł:</label><input name="tytul">
        </div>
        <div id="formularz">
            <label>ISBN:</label><input name="isbn">
        </div>
        <div id="formularz">
            <input name="submit" type="submit" value="Szukaj">
        </div>
    </form>
{else}
Znalezione książki:<br><br>
<table>
<thead>
<tr><th>Imię</th><th>Nazwisko</th><th>Tytuł</th><th>ISBN</th><th></th></tr>
</thead>
{foreach from=$szukane item=s}
<tr>
<td>{$s.name}</td><td>{$s.surname}</td><td><b>{$s.book}</b></td><td>{$s.isbn}</td><td><a href="/szukaj/rezerwacja/{$s.id_book}/">Rezerwuj</a></td>
</tr>
{/foreach}
</table>
{/if}
{else}
<p>Nu, Nu, Nu - tylko dla zalogowanych :)</p>
{/if}
{include file="footer.tpl" }
