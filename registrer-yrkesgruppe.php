<?php /* Registrer yrkesgruppe. */
	
include("start.html");

?>


<h3>Registrer yrkesgruppe</h3>
	<form method="post" action="registrer-yrkesgruppe.php" id="regyrkesgruppe" name="regyrkesgruppe" onSubmit="return validering()">
		Tast inn yrkesgruppens navn: <input type="text" id="yrkesgruppe" name="yrkesgruppe" onFocus="fokus(this)" onBlur="mistetfokus(this)" onMouseOver="musinn(this)" onMouseOut="musut()" onChange="endretilstorebokstaver(this)" required /> <br />
		<input type="submit" value="Registrer" id="fortsett" name="fortsett" />
		<input type="reset" value="Nullstill feltet" id="nullstill" name="nullstill" onClick="fjernmelding()" />
	</form>

<div id="melding"></div>
<br>
<div id="javavalidering"></div>
<br>
<div id="javamelding"></div>


<?php

	$fil="../filer/yrkesgruppe.txt"; /* Kontroller mappestruktur. */

if (isset($_POST["fortsett"])) /* Knappen for å skrive til fil er trykket. */
{
	$yrkesgruppe=$_POST["yrkesgruppe"];

	if (!$yrkesgruppe) /* Hvis feltet er tomt, kommer denne beskjeden opp. */
	{
		print ("Feltet må fylles ut.");
	}
	else
	{
		$filoperasjon="a"; /* Filoperasjonen "a" blir brukt (tilføying ved slutten av fila, ikke overskriving).  */

		$linje=trim($yrkesgruppe) . "\n"; /* Linjen som skal skrives til blir opprettet. */

		$fil=fopen($fil,$filoperasjon); /* Filen åpnes, og "a" operasjonen (tilføying på slutten av filen) blir brukt.  */

		fwrite($fil,$linje); /* Første parameter inneholder navnet til fila som blir skrevet i, men ikke over. Andre parameter er strengen som blir tilføyd i fila. */

		fclose($fil); /* Fila lukkes. */

		print("Yrkesgruppen '$yrkesgruppe' ble registrert.");
	}
}

?>

<?php

include("slutt.html");

?>