<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Bilde</title>  
  </head>
<body>
          <form method="post" action="" id="registrer-klasse" name="registrer-klasse" onsubmit="return validateForm()">
              <h3>Bilde</h3>
              <label for="bildeNr"><p>Bildenummer:</p></label><span id="bildeNrOut"></span>
              <input required name="bildeNr"  id="bildeNr">
              
              <label for="opDato"><p>Opplastingsdato:</p></label><span id="opDatoOut"></span>
              <input required name="opDato" id="opDato"><br>
              
              <label for="filNavn"><p>Filnavn:</p></label><span id="filNavnOut"></span>
              <input required name="filNavn"  id="filNavn">
              
              <label for="beskrivelse"><p>Beskrivelse:</p></label><span id="beskrivelseOut"></span>
              <input required name="beskrivelse" id="beskrivelse"><br>

              <input  class="inputClass" type="submit" value="Registrer" id="registrer" name="registrer">
              <input  class="inputClass" type="reset" value="Nullstill" id="nullstill" name="nullstill">
            </form> 
    
            <script>
                function validateForm(){
                    var oppDato = document.getElementById("bildeNr").value;
                    var oppDatoArray = oppDato.split("-");
                    
                    var oppAr = parseInt(oppDatoArray[0]);
                    var oppMa = parseInt(oppDatoArray[1]);
                    var oppDa = parseInt(oppDatoArray[2]);
                                        
                    if(oppDatoArray.length != 3){
                        alert("Formatieringsfeil, du må gjøre som i instruksen"); //sjekker at det er 3 felter
                    } else {
                        
                        if(oppDatoArray[0].length > 4 || oppDatoArray[0].length < 1 || oppAr > 2017){
                            alert("Opplastingsår stemmer ikke");
                        } else {
                            alert("riktig 1");
                        }

                        if(oppDatoArray[1].length > 2 || oppDatoArray[1].length < 1 || oppMa > 12){
                            alert("Opplastingsmåned stemmer ikke");
                        } else {
                            alert("riktig 2");
                        }

                        if(oppDatoArray[2].length > 2 || oppDa < 1 || oppDatoArray[2].length < 1
                           || oppMa == 1  && oppDa > 31 //Januar
                           || oppMa == 2  && oppDa > 28 //Februar
                           || oppMa == 3  && oppDa > 31 //Mars
                           || oppMa == 4  && oppDa > 30 //April
                           || oppMa == 5  && oppDa > 31 //Mai
                           || oppMa == 6  && oppDa > 30 //Juni
                           || oppMa == 7  && oppDa > 31 //Juli
                           || oppMa == 8  && oppDa > 31 //August
                           || oppMa == 9  && oppDa > 30 //September
                           || oppMa == 10 && oppDa > 31 //Oktober
                           || oppMa == 11 && oppDa > 30 //November
                           || oppMa == 12 && oppDa > 31 //Desember
                          ){
                            alert("Opplastingsdag stemmer ikke");
                        } else {
                            alert("riktig 3");
                        }
                    }
                    
                    
                }
            </script>
          
            <?php
            if(isset($_POST['registrer'])){
                
                $filnavn     = "bildetest/bilde.txt";

                $bildeNr     = $_POST["bildeNr"];
                $opDato      = $_POST["opDato"];
                $filNavn     = $_POST["filNavn"];
                $beskrivelse = $_POST["beskrivelse"];

                $bildeNr     = trim($bildeNr);
                $opDato      = trim($opDato);
                $filNavn     = trim($filNavn);
                $beskrivelse = trim($beskrivelse);

                if(!$bildeNr){
                    print("Bildenummer mangeler <br>");
                    $bool1 = false;
                } else {
                    $bool1 = true;
                }
                
                if(!$opDato){
                    print("Opplastingsdato mangeler <br>");
                    $bool2 = false;
                } else {
                    $bool2 = true;
                }
                
                if(!$filNavn){
                    print("Filnavn mangeler <br>");
                    $bool3 = false;
                } else {
                    $bool3 = true;
                }
                
                if(!$beskrivelse){
                    print("Beskrivelse mangeler <br>");
                    $bool4 = false;
                } else {
                    $bool4 = true;
                }
                
                if($bool1 == true && $bool2 == true && $bool3 == true && $bool4 == true) {
                    
                    $filoperasjon = "a";

                    $linje = $bildeNr . ";" . $opDato . ";" . $filNavn . ";" . $beskrivelse . "\n";

                    $fil = fopen($filnavn, $filoperasjon); 

                    fwrite($fil,$linje);

                    fclose($fil);

                    echo("$bildeNr $opDato $filNavn $beskrivelse");
                }
            }
            ?>       
</body>
</html>
