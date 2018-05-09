<?php

libxml_use_internal_errors(true);

$dokumentas = new DOMDocument();

$server = 'localhost';
$db = 'matavimai1';
$user = 'auto';
$password = '123';

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die('Prisijungti nepavyko: ' . $conn->connect_error);
}

$sql = "SELECT *, atstumas / laikas * 3.6 AS greitis FROM rezultatai ORDER BY numeris, data DESC";

$result = $conn->query($sql);

$root = $dokumentas->createElement('radars');
$dokumentas->appendChild($root);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $radar = $dokumentas->createElement('radar');
        $root->appendChild($radar);

        $radar->appendChild(addXMLNode($dokumentas, 'id', $row['id']));
        $radar->appendChild(addXMLNode($dokumentas, 'data', $row['data']));
        $radar->appendChild(addXMLNode($dokumentas, 'numeris', $row['numeris']));
        $radar->appendChild(addXMLNode($dokumentas, 'greitis', $row['greitis']));
    }
}

$xml = $dokumentas->saveXML();

header('Content-Type: text/xml');
echo $xml;

function addXMLNode(DOMDocument $document, string $name, string $value): DOMElement
{
    $element = $document->createElement($name);
    $elementText = $document->createTextNode($value);
    $element->appendChild($elementText);

    return $element;
}