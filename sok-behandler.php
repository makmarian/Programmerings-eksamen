<?php

include("start.html");

?>

<h3> Søk i yrkesgruppe </h3>

	<form method="post" action="sok-behandler.php" id="sokbehandler" name="sokbehandler" onSubmit="return validering()">
		Yrkesgruppe:<input type="text" id="sok" name="sok" onKeyUp="vis(this.value)" onFocus="fokus(this)" onBlur="mistetfokus(this)" onMouseOver="musinn(this)" onMouseOut="musut()" onChange="endretilstorebokstaver(this)" required /> <br>
		<input type="submit" value="Søk" id="fortsett" name="fortsett" /> 
		<input type="reset" value="Nullstill feltene" id="nullstill" name="nullstill" onClick="fjernmelding()"/>
	</form>
	
	
<div id="melding"></div>
<br>
<div id="javavalidering"></div>
<br>

<div id="javamelding"></div>




<?php 
if (isset($_POST ["fortsett"]))
 {

/* lese fil */ 

$filnavn="../../filer/behandler.txt";

$sok=$_POST ["sok"];
$sok=trim($sok);

if (!$sok) 
	{
		Print ("Søkefeltet må fylles ut <br>");
	}
	
else	

{	
$filoperasjon="r";    /* read = lesing */ 
  

print ("Følgende personer hører til yrkesgruppen $sok <br> <br>"); 

$fil=fopen($filnavn,$filoperasjon); /* åpne */ 

while ($behandlerlinje=fgets($fil)) /* lest en linje fra fil */ 
	{	
		if ($behandlerlinje !="") /* ikke tom linje */ 
		{
			$del=explode(",",$behandlerlinje); /* linjen blir delt opp */ 
			$behandlerID=trim($del[0]);
			$fornavn=trim($del[1]);
			$etternavn=trim($del[2]);
			$yrkesgruppe=trim($del[3]);
			$bildenr=trim($del[4]);
			$maksAntall=trim($del[5]); 
			
		if ($yrkesgruppe==$sok)
			{
				print ("$etternavn $fornavn <br>");
			}
		}
	}


fclose($fil); /* lukke */ 

}
}
?>

<?php

include ("slutt.html");
?>