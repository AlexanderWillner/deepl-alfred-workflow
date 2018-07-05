<?php
require_once( __DIR__ . '/deepl.php' );

// DE, EN, FR, ES, IT, NL, PL are available
// or use > {LANG_CODE} to force the translation language
$default_language = 'DE'; 
$dl = new DeeplTranslate($default_language);
$nfdInput="du&#x308;se";
$input=html_entity_decode($nfdInput);
$result=$dl->translate($input);
$success=true;


echo "Input: $input\n";
echo "Output: $result\n";

echo "Unicode: ";
if (strpos($result, "#x308")) {
  echo "FAILED\n"; $success=false;
} else {
  echo "OK\n"; 
}

echo "Translation: ";
if (! strpos($result, "nozzle")) {
  echo "FAILED\n"; $success=false;
} else {
  echo "OK\n";
}

if ($success)
	exit (0);
else
	exit (1);

?>
