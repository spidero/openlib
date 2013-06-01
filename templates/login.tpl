{include file="header.tpl"}
{$info}
{if $log == "2"}
<form action="login.php" method="POST">

<div id="formularz">
  <label for="femail"  id="form2">Email / Login</label>
  <input id="fname" name="email" class="text" type="text" />
</div>
<div  id="formularz">
  <label for="fhaslo" id="form2">Hasło</label>
  <input id="fhaslo" name="haslo" class="text" type="password" />
</div>

<div id="formularz">
  <input id="fSubmit" name="submit" class="submit" type="submit" value="Zaloguj" />
</div>

</form>
{/if}
{include file="footer.tpl" }
