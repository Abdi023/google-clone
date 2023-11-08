<?php
class DomDocumentParser {

	private $doc;

	public function __construct($url) {

		$options = array(
			'http'=>array('method'=>"GET", 'header'=>"User-Agent: googleBot/0.1\n")
			);
		$context = stream_context_create($options);

		$this->doc = new DomDocument();
		@$this->doc->loadHTML(file_get_contents($url, false, $context));
	}

	public function getlinks() {
		return $this->doc->getElementsByTagName("a");
	}

	public function getTitleTags() {
		return $this->doc->getElementsByTagName("title");
	}

	public function getMetaTags() {
		return $this->doc->getElementsByTagName("meta");
	}

	public function getImages() {
		return $this->doc->getElementsByTagName("img");
	}

}

/*
Het doel van deze klasse is het parsen en analyseren van HTML-documenten die zijn geladen van een opgegeven URL. Hier is een korte samenvatting van de belangrijkste functies van deze klasse:

    Constructor (__construct($url)): De constructor accepteert een URL als parameter. Het maakt een HTTP-verzoek naar die URL met een aangepaste "User-Agent" header die aangeeft dat het een "googleBot/0.1" is. Vervolgens laadt het de inhoud van de URL als een HTML-document in een nieuw DOMDocument-object.

    getlinks(): Deze methode retourneert alle hyperlinks (anchor tags) die zijn gevonden in het geladen HTML-document. Het gebruikt de DOMDocument-methode getElementsByTagName("a") om alle anchor-elementen te selecteren.

    getTitleTags(): Deze methode retourneert alle titel-tags in het geladen HTML-document. Het gebruikt de DOMDocument-methode getElementsByTagName("title") om alle titel-elementen te selecteren.

    getMetaTags(): Deze methode retourneert alle meta-tags in het geladen HTML-document. Het gebruikt de DOMDocument-methode getElementsByTagName("meta") om alle meta-elementen te selecteren.

    getImages(): Deze methode retourneert alle afbeeldingselementen (img-tags) in het geladen HTML-document. Het gebruikt de DOMDocument-methode getElementsByTagName("img") om alle img-elementen te selecteren.

*/

?>
