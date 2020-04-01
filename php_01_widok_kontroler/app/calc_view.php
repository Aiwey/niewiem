<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
<meta charset="utf-8" />
<title>Kalkulator VAT</title>
</head>
<body>
<div style="margin: 0; position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">
<form action="<?php print(_APP_URL);?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
	<legend> Kalkulator vat (brutto-netto, lub netto-brutto) </legend>
	<fieldset>
	<input type = "radio" id ="typPodatku" name="typPodatku" value="brutto-netto">
	<label for="brutto-netto">Brutto-netto</label>
	<input type = "radio" id ="typPodatku" name="typPodatku" value="netto-brutto">
	<label for="netto-brutto">netto-brutto</label><br />
	<label for="id_x">Kwota przed obliczeniami: </label>
	<input id="id_x" type="text" name="x"  /><br />
	<label for="id_op">Podatek: </label>
	<select name="procent">
		<option value="3">3%</option>
		<option value="5">5%</option>
		<option value="7">7%</option>
		<option value="8">8%</option>
		<option value="22">22%</option>
		<option value="23">23%</option>	
	</select><br />
	</fieldset>
	<input type="submit" value="Oblicz!">
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<p>Sposób obliczania: <?php echo $typ;?></p>
<p>Kwota przed konwersją: <?php echo $kwota;?> PLN</p>
<p>Stawka VAT: <?php echo $procent;?>%</p>
<p>Obliczona kwota VAT: <?php echo $kwotaVat;?> PLN</p>
<p>Obliczona kwota: <?php echo $result; ?> PLN</p>
</div>
<?php } ?>
</div>
</body>
</html>