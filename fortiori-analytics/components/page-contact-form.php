<form method="post">
	<div class="page-contact__form-details">
		<div class="page-contact__input-name">
			<label class="label-bold" for="name">Name</label>
			<input type="text" name="name-contact" id="name" class="input-field">
		</div>
		<div class="page-contact__input-email">
			<label class="label-bold" for="email">Email
				<span class="page-contact__field-required">*</span>
			</label>
			<input type="email" name="email-contact" id="email" class="input-field" required>
			<p class="page-contact__error">This is a required field.</p>
		</div>
		<div class="page-contact__input-states">
			<label class="label-bold" for="states">US States</label>
			<select name="states" id="states" class="input-field">
				<option value="Alabama">Alabama</option>
				<option value="Alaska">Alaska</option>
				<option value="Arizona">Arizona</option>
				<option value="Arkansas">Arkansas</option>
				<option value="California">California</option>
				<option value="Colorado">Colorado</option>
				<option value="Connecticut">Connecticut</option>
				<option value="Delaware">Delaware</option>
				<option value="Florida">Florida</option>
				<option value="Georgia">Georgia</option>
				<option value="Hawaii">Hawaii</option>
				<option value="Idaho">Idaho</option>
				<option value="Illinois">Illinois</option>
				<option value="Indiana">Indiana</option>
				<option value="Iowa">Iowa</option>
				<option value="Kansas">Kansas</option>
				<option value="Kentucky">Kentucky</option>
				<option value="Louisiana">Louisiana</option>
				<option value="Maine">Maine</option>
				<option value="Maryland" selected="selected">Maryland</option>
				<option value="Massachusetts">Massachusetts</option>
				<option value="Michigan">Michigan</option>
				<option value="Minnesota">Minnesota</option>
				<option value="Mississippi">Mississippi</option>
				<option value="Missouri">Missouri</option>
				<option value="Montana">Montana</option>
				<option value="Nebraska">Nebraska</option>
				<option value="Nevada">Nevada</option>
				<option value="New Hampshire">New Hampshire</option>
				<option value="New Jersey">New Jersey</option>
				<option value="New Mexico">New Mexico</option>
				<option value="New York">New York</option>
				<option value="North Carolina">North Carolina</option>
				<option value="North Dakota">North Dakota</option>
				<option value="Ohio">Ohio</option>
				<option value="Oklahoma">Oklahoma</option>
				<option value="Oregon">Oregon</option>
				<option value="Pennsylvania">Pennsylvania</option>
				<option value="Rhode Island">Rhode Island</option>
				<option value="South Carolina">South Carolina</option>
				<option value="South Dakota">South Dakota</option>
				<option value="Tennessee">Tennessee</option>
				<option value="Texas">Texas</option>
				<option value="Utah">Utah</option>
				<option value="Vermont">Vermont</option>
				<option value="Virginia">Virginia</option>
				<option value="Washington">Washington</option>
				<option value="West Virginia">West Virginia</option>
				<option value="Wisconsin">Wisconsin</option>
				<option value="Wyoming">Wyoming</option>
				<option value="Washington DC">Washington DC</option>
				<option value="ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST">ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST</option>
				<option value="ARMED FORCES AMERICA (EXCEPT CANADA)">ARMED FORCES AMERICA (EXCEPT CANADA)</option>
				<option value="ARMED FORCES PACIFIC">ARMED FORCES PACIFIC</option>
			</select>
		</div>
		<div class="page-contact__input-zip">
			<label class="label-bold" for="zipCode">Zip</label>
			<input type="text" name="zip-code" id="zipCode" class="input-field">
		</div>
		<div class="page-contact__input-phone">
			<label class="label-bold" for="phone">Phone</label>
			<input type="tel" name="phone-contact" id="phone" class="input-field">
		</div>
		<div class="page-contact__email-phone-choices">
			<p class="label-bold">How would you like to be contacted?</p>
			<p class="check-apply">Check all that apply.</p>
			<div class="input-checkbox">
				<div class="email">
					<input type="checkbox" name="checkbox[]" value="Email" id="email-checkbox">
					<label for="email-checkbox">
						Email
					</label>
				</div>
				<div class="phone">
					<input type="checkbox" name="checkbox[]" value="Phone" id="phone-checkbox">
					<label for="phone-checkbox">
						Phone
					</label>
				</div>
			</div>
		</div>
		<div class="page-contact__issue-description">
			<label for="issueDescription" class="label-bold">Brief description of your legal issue</label>
			<textarea name="issue-description" id="issueDescription" rows="10" class="input-field"></textarea>
		</div>
		<div class="page-contact__disclaimer-privacy">
			<a href="/disclaimer/" id="showDisclaimer">Disclaimer</a>&nbsp;|&nbsp;<a href="/privacy/">Privacy Policy</a>
		</div>
		<div class="disclaimer">
			<span class="disclaimer__icon dashicons-info" aria-hidden="true"></span>
			Disclaimer: The use of the internet or this form for communication with the firm or any individual member of the firm does not establish an attorney-client relationship. Confidential or time-sensitive information should not be sent through this form. <span id="disclaimer__close" class="disclaimer__close dashicons-no-alt">&times;</span>
		</div>
		<div class="page-contact__read-disclaimer">
			<div class="label-bold">
				<input type="checkbox" name="read-disclaimer" id="readDisclaimer" required>
				<label for="readDisclaimer">
					I have read the disclaimer.
				</label>
				<span class="page-contact__field-required">*</span>
			</div>
			<p class="page-contact__error">This is a required field.</p>
		</div>
		<div class="page-contact__form-submit">
			<button type="submit" class="button" name="submit">Send this message</button>
		</div>
	</div>
	<div class="invalidate page-contact__message-form">
		<p class="page-contact__error">Please correct errors before submitting this form.</p>
	</div>
</form>

<?php

if (isset($_POST['submit'])) {
	$name = $_POST['name-contact'];
	$email = $_POST['email-contact'];
	$state = $_POST['states'];
	$zip = $_POST['zip-code'];
	$phone = $_POST['phone-contact'];
	$contactThrough = '';
	$legalIssue = $_POST['issue-description'];

	if (!empty($_POST['checkbox'])) {
		$selectedCheckboxes = $_POST['checkbox'];
		$contactThrough = implode(', ', $selectedCheckboxes);
	}

	$to = SMTP_FROM;
	$subject = 'Eleff Law Clone Contact Form Submission';
	$message = "Name: $name";
	$message .= "\nEmail: $email";
	$message .= "\nState: $state";
	$message .= "\nZip Code: $zip";
	$message .= "\nPhone: $phone";
	$message .= "\nContact me through: $contactThrough";
	$message .= "\nLegal Issue: $legalIssue";
	$headers[] = 'Content-type: text/plain; charset=utf-8';

	// send test message using wp_mail function.
	$sent = wp_mail($to, $subject, $message, $headers);

	//display message based on the result.
	if ($sent) {
?>
		<script>
			window.location.assign(`${window.location.origin}/${window.location.pathname}?sent=true`);
		</script>
<?php
	} else {
		echo '<span>The message was not sent! Please try again.</span>';
	}
}
?>