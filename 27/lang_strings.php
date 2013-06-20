<?php
function defineStrings() {
	switch($_SESSION['lang']) {
		case "en":
			define("WELCOME_TXT","Welcome!");
			define("CHOOSE_TXT","Choose Language");
		break;

		case "de":
			define("WELCOME_TXT","Willkommen!");
			define("CHOOSE_TXT","Sprache ausw�hlen");
		break;

		case "ja":
			define("WELCOME_TXT","歓迎");
			define("CHOOSE_TXT","言語選択");
		break;

		default:
			define("WELCOME_TXT","Welcome!");
			define("CHOOSE_TXT","Choose Language");
		break;
	}
}
?>