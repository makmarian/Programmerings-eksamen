<?php

include("start.html");

?>

<h2> Vis alle klasser </h2>



<?php 


/* lese fil */ 

$filnavn="../../filer/klasse.txt";


$filoperasjon="r";    /* read = lesing */ 





$fil=fopen($filnavn,$filoperasjon);  /* åpne */ 

while ($klasselinje=fgets($fil)) /* fgets leser frem til linjeskift  */
{
		if ($klasselinje!="")            /*sjekker at linje ikke er tom */ 
	 		
	{
		$del=explode(";",$klasselinje);
		
		
		if($klasselinje==$klasselinje)
		{
			print("$klasselinje </br>");

		}	
	}
}	

fclose($fil); /* lukke */ 



?>

<?php

include ("slutt.html");
?>