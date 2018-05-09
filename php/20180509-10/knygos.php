<?php

libxml_use_internal_errors(true);
$dokumentas = new DOMDocument();
$dokumentas->load('knygos.xml');

if ($dokumentas->schemaValidate('knygos.xsd')) {
	echo "OK";
} else {
	foreach (libxml_get_errors() as $error) {
	echo '<br>' . $error->message;
	}
}