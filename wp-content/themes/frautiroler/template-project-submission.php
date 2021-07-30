
<?php
/*
 * Template Name: Project-Submission-Form
 */

get_header(); 

?>	

	<div class="project-submission-form">
		<div class="container">
			<div class="w-960">
				<div class="head-block">
					<h2 class="section-title">Projekt <span class="underline">einreichen</span></h2>
					<p class="section-subtitle">Bitte fülle die vorgegebenen Felder aus um dein Projekt einzureichen. Wir prüfen deine Einreichung und schalten dein Projekt auf frautiroler.info für die Abstimmung frei.</p>
				</div>
				<div class="form-block">
					<form method="post" id="project-submission">
						<div class="form-block--text">
					    	<label for="fname">Mitgliedsnummer*</label>
							<input type="text" id="mitgliedsnummer" name="mitgliedsnummer" placeholder="Placeholder text" required>
						</div>
						<div class="form-block--text">
					    	<label for="fname">Vorname*</label>
							<input type="text" id="vorname" name="vorname" placeholder="Placeholder text" required>
						</div>
						<div class="form-block--text">
					    	<label for="fname">Nachname*</label>
							<input type="text" id="nachname" name="nachname" placeholder="z.B.: Musterfrau" required>
						</div>
						<div class="form-block--text">
					    	<label for="fname">Straße und Nummer*</label>
							<input type="text" id="nummer" name="nummer" placeholder="z.B.: Musterstraße 123" required>
						</div>
						<div class="form-block--text">
					    	<label for="fname">PLZ Ort*</label>
							<input type="text" id="plz-ort" name="plz-ort" placeholder="z.B.: 6020 Innsbruck" required>
						</div>
						<div class="form-block--text">
					    	<label for="fname">Telefonnummer*</label>
							<input type="tel" id="phone" name="phone" placeholder="z.B.: +43 512 123 456" required>
						</div>
						<div class="form-block--text">
					    	<label for="fname">E-Mail-Adresse*</label>
							<input type="email" id="email" name="email" placeholder="Your name.." required>
						</div>
						<div class="form-block--text">
					    	<label for="fname">Projekttitel*</label>
							<input type="text" id="project" name="project" placeholder="z.B.: Mustertitel" required>
						</div>
						<div class="form-block--text">
					    	<label for="detail">Projektbeschreibung*</label>
							<textarea rows="5" name="detail" required></textarea> 
						</div>
						<div class="form-block--text">
					    	<label for="fname">Projektkosten*</label>
							<input type="text" id="projektkosten" name="projektkosten" placeholder="z.B.: Mustertitel" required>
						</div>
						<div class="form-block--text">
							<label for="myfile" class="upload">Bilder zum Projekt (max. 5)</label>
							<input type="file" id="myfile" name="myfile" class="dashed" required>
							<p class="note">Bitte lade mindestens ein Bild hoch. Insgesamt kannst du 5 Bilder mit einer Dateigröße von jeweils max. 1,5 MB hochladen.</p>
						</div>

						<div class="checkbox">
							<input type="checkbox" id="legal" name="legal" required>
							<label for="legal">Ich erkläre mich mit den <a href="javascript:void(0)">Rechtlichen</a> Hinweisen einverstanden.*</label>

							<input type="checkbox" id="condition" name="condition" required>
							<label for="condition">Ich habe die <a href="javascript:void(0)">Teilnahmebedingungen</a> gelesen und verstanden und stimme diesen ausdrücklich zu.*</label>
						</div>

						<div class="info">Die im Zuge der Einreichung erfassten Daten werden ausschließlich für die Onlinekommunikation, Social Media-Berichterstattung, die PR-Beiträge sowie zur internen Verwendung i.Z. mit der Gelder-Vergabe und für keinen anderen Zweck verwendet. Weitere Informationen zum Datenschutz finden Sie unter <a href="javascript:void(0)">www.tiroler.at/datenschutz</a>.*</div>

						<div class="required-feilds">*Pflichtfelder</div>
						<div class="button-group">
							<input type="submit" name="" class="submit button-pink" value="Jetzt einreichen">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	

<?php

get_footer(); 

?>	