{include file="header.tpl"}
{if $send == "1"}
<h4>Użytkownik został zarejestrowany w naszym systemie, email aktywujacy został wysłany na podany email.</h4>
<br>
{elseif $back == "1"}
<h4>{$info}</h4>
<input type=button value="Wróć" onClick="history.go(-1)">
{else}
<form action="/register/" method="POST">
<div id="formularz">
  <label for="fNick"  id="form">Login <span id="red">(*)</span></label>
  <input id="fNick" name="nick" class="text" type="text" />
</div>
<div id="formularz">
  <label for="fNick"  id="form">Imię <span id="red">(*)</span></label>
  <input id="fNick" name="imie" class="text" type="text" />
</div>
<div id="formularz">
  <label for="fNick"  id="form">Nazwisko <span id="red">(*)</span></label>
  <input id="fNick" name="nazwisko" class="text" type="text" />
</div>
<div id="formularz">
  <label for="fname"  id="form">Haslo <span id="red">(*)</span></label>
  <input id="fname" name="pass" class="text" type="password" />
  <label for="fname_c"  id="form">Powtorz haslo <span id="red">(*)</span></label>
  <input id="fname_c" name="pass_c" class="text" type="password" />
</div>
<div  id="formularz">
  <label for="fMail" id="form">E-mail <span id="red">(*)</span></label>
  <input id="fMail" name="mail" class="text" type="text" />
</div>
<div id="formularz">
  <label for="reg" id="form">Czy akceptujesz warunki</label> <a href="">regulaminu</a> ? <span id="red">(*)</span>
  <input id="reg" name="reg" class="text" type="checkbox" value="1" />
</div>
<div id="formularz">
  <label for="news" id="form">Czy checsz byc informawany o nowosciach ? </label>
    <input id="news" name="news" class="text" type="checkbox" value="1" checked/>
    </div>
<div id="formularz">
  <input id="fSubmit" name="submit" class="submit" type="submit" value="Rejestruj" />
</div>
</form>
<span id="red">Pola wymagane oznaczone sa (*)</span>
{/if}
{include file="footer.tpl" }
