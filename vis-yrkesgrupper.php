<?php /* Vis yrkesgrupper */

include("start.html");

?>


<?php

	$filnavn="../filer/yrkesgruppe.txt";

	$filoperasjon="r"; /* Filoperasjonen "r" blir brukt (lesing av fila). */

	print("Følgende yrkesgrupper er registrert: <br /> <br />");

	$fil=fopen($filnavn, $filoperasjon); /* Filen åpnes og leses vha. $filoperasjon definert lik "r". */

	while ($linje = fgets($fil)) /* En loop som går helt til den siste linja er tom. */
	{
		if ($linje!="") /* Loopen stopper, når neste linje er tom. */
		{
			$del=explode (";" , $linje);
			$yrkesgruppe=trim($del[0]);
			print("$yrkesgruppe <br />");
		}
	}

	fclose($fil); /* Lukker fila. */

?>


<?php

include("slutt.html");

?>