<?php
	$Page = 5;
	include_once("includes/first.php");
	include_once("includes/recaptchalib.php");

	$siteKey = "6LegXAITAAAAAPi9ma_fpTu2VbLRpTzrbdynxEOB";
	$secret = "6LegXAITAAAAAGeVCF180Djfn64T7PNMMIyPE36a";
	$lang = "bg";
	$resp = null;
	$error = null;

	$reCaptcha = new ReCaptcha($secret);

		if ($_POST["g-recaptcha-response"]) {
		$resp = $reCaptcha->verifyResponse(
			$_SERVER["REMOTE_ADDR"],
			$_POST["g-recaptcha-response"]
		);
	}

	$SeoTitle = "Контакти - д-р Юлия Дончева PhD";

	include_once("includes/head.php");
	include_once("includes/header.php");

	function checkEmail($email)
	{
		if(strlen($email) < 3){
			return false;
		}
		return
		(bool)preg_match("`^[a-z0-9!#$%&'*+\/=?^_\`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_\`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$`i", $email);
	}

	$msg = "";
	if($_POST['Send'])
	{
		if($resp != null && $resp->success)
		{
			if(!empty($_POST['Name']))
			{
				if(checkEmail($_POST['Email']))
				{
					if(!empty($_POST['Message']))
					{
						if(is_numeric($_POST['Phone']) || empty($_POST['Phone']))
						{
							//message
							$message = "<html><head>\n";
							$message .= "<title>Message from juliadoncheva.com</title>\n";
							$message .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\n";
							$message .= '</head><body style="font-family: Verdana; font-size: 13px; color: black;">Съобщение от контактната форма на <a href="http://www.juliadoncheva.com" target="_blank">juliadoncheva.com</a>:<br /><br /> <table style="width: 100%; font-family: Verdana; font-size: 11px;">';
							$message .= "<tr><td style='width: 120px; text-align: right;  background-color:#F2F2F2;'>Имена: </td><td style='border: 1px solid #f4f4f4; font-weight: bold;'>" . $_POST['Name'] . "</td></tr>";
							$message .= "<tr><td style='width: 120px; text-align: right; background-color:#F2F2F2;'>Е-поща: </td><td style='border: 1px solid #f4f4f4; font-weight: bold;'>" . $_POST['Email'] . "</td></tr>";
							$message .= "<tr><td style='width: 120px; text-align: right; background-color:#F2F2F2;'>Телефон: </td><td style='border: 1px solid #f4f4f4; font-weight: bold;'>" . $_POST['Phone'] . "</td></tr>";
							$message .= "<tr><td style='width: 120px; text-align: right; background-color:#F2F2F2;'>Съобщение: </td><td style='border: 1px solid #f4f4f4; '>" . nl2br($_POST['Message']) . "</td></tr>";
							$message .= "</table><hr style='height: 1px;'>";

							$headers  = "MIME-Version: 1.0\r\n";
							$headers .= "Content-type: text/html; charset=utf-8\r\n";

							$headers .= "From: JuliaDoncheva "."\r\n";
							$headers .= "Reply-To: ".$_POST['Email']." "."\r\n";
							$headers .= "Bcc: trayan.ivanov@gmail.com, traian_ivanov@abv.bg \r\n";

							$to  = "juliadoncheva13@yahoo.com";
							mail($to, 'Julia Doncheva - Contact form: ' . $_POST['Email'] , $message, $headers);

							$msg = "<p class='green'>Съобщението е изпратено успешно.</p>";

							unset($_POST);
						}
						else
							$msg = "<p class='red'>Невалиден телефонен номер.</p>";
					}
					else
						$msg = "<p class='red'>Моля, попълнете съобщение.</p>";
				}
				else
					$msg = "<p class='red'>Невалидна е-поща.</p>";
			}
			else
				$msg = "<p class='red'>Моля, попълнете име.</p>";
		}
		else
			$msg = "<p class='red'>Маркирайте отметката за да докажете, че не сте робот.</p>";
	}
?>
	<section id="left">
		<h1>Контакт с мен</h1>

		<?=$msg?>

		<form method="post" action="contacts.php">
			<table class="contactForm">
				<tr>
					<td class="title">Вашето име <span class="red">*</span></td>
					<td><input type="text" name="Name" value="<?=$_POST['Name']?>" class="standart" /></td>
				</tr>
				<tr>
					<td class="title">Вашата е-поща <span class="red">*</span></td>
					<td><input type="text" name="Email" value="<?=$_POST['Email']?>" class="standart" /></td>
				</tr>
				<tr>
					<td class="title">Вашият телефон</td>
					<td><input type="text" name="Phone" value="<?=$_POST['Phone']?>" class="standart" /></td>
				</tr>
				<tr>
					<td class="title">Съобщение <span class="red">*</span></td>
					<td><textarea name="Message" rows="4" cols="20"><?=$_POST['Message']?></textarea></td>
				</tr>
				<!--<tr>
					<td class="title">Въведете кода <span class="red">*</span></td>
					<td>
						<img src="code.php" width="80" height="30" title="Julia Doncheva" alt="Julia Doncheva" class="code" />
						<input type="text" name="Code" class="short" />
						<div class="cc"></div>
					</td>
				</tr>-->				
				<tr>
					<td class="title">Валидация <span class="red">*</span></td>
					<td>
						<div class="g-recaptcha" data-sitekey="<?php echo $siteKey;?>"></div>
						<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>"></script>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="Send" value="Изпрати" class="submitBtn" /></td>
				</tr>
			</table>
		</form>
		
	</section>
			
<?php
	include_once("includes/right.php");
	include_once("includes/footer.php");
?>
			