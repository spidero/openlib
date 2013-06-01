<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<title>Biblioteka v.01</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="/css/styl.css" type="text/css">
</head><body>
<div align="center">
<table  width="1000 px">
<tr>
<td colspan="2">
<img src="/gfx/logo.jpg" border="0">
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
{if $log == "1"}
{if $dane.status=='1'}
<p>Książki wypożyczone: <b>{$zasoby.ksiazki}</b> | Rezerwacje: <b>{$zasoby.rezerwacje}</b></p> 
{/if}
{else}
&nbsp;
{/if}
</td>
</tr>

<tr>
<td valign="top"  width="200 px">

{if $log!="1"}
	<h2>Login</h2>
	<div>
	<form action="/login/" method="POST">
	<label>Login</label>
	<input name="login">
	<label>Hasło</label>
	<input name="haslo" type="password">
	<input type="submit" name="submit" value="Loguj ...">
	</form>
	</div><br><br><br><br><div>
	<p><a href="/register/">Rejestracja</a><br><a href="">Zapomniałem hasła</a></p></div>
	
{else}
<p>Jestes zalogowany jako: <b> <a href="/ranking/{$klient_id}/">{$login}</a></b><br><br>
<a href="/panel/">Panel</a><br>
{if $dane.status=='1'}
<a href="/szukaj/">Szukaj ksiązki</a><br>
<a href="/rezerwacje/">Rezerwacje</a><br>
<a href="/wypozyczenia/">Wypożyczenia</a><br>
{/if}
{if $dane.status=='2'}
<a href="/dodaj_autora/">Dodaj autora [Globalnie]</a><br>
<a href="/dodaj_zasob/">Dodaj zasób [Globalnie]</a><br>
<a href="/przegladaj_zasoby/">Przeglądaj zasoby [Globalnie]</a><br>
<a href="/lokalne_zasoby/">Lokalne zasoby</a><br>
<a href="/przegladaj_czytelnikow/">Przeglądaj czytelników</a><br>
<a href="/przegladaj_rezerwacje/">Przeglądaj rezerwacje</a><br>
<!--<a href="/mapa/">Przeglądaj recencje</a><br>-->
<a href="/przetrzymania/">Przetrzymania</a><br>
{/if}
{if $dane.status=='3'}
<a href="/mapa/">Dodaj bibliotekę</a><br>
<a href="/mapa/">Przeglądaj biblioteki</a><br>
<a href="/mapa/">Ustawienia</a><br>
{/if}
<br>
<a href="/poczta/">Poczta</a>{if $poczta>=1} (<b>{$poczta}</b>){/if}<br>
<br>
<a href="/wyloguj/">Wyloguj</a></p>
{/if}

<td valign="top"  width="800 px">
