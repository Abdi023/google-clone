<?php
class ImageResultsProvider {

	private $con;

	public function __construct($con) {
		$this->con = $con;
	}

	public function getNumResults($term) {

		$query = $this->con->prepare("SELECT COUNT(*) as total 
										 FROM images 
										 WHERE (title LIKE :term 
										 OR alt LIKE :term)
										 AND broken=0");

		$searchTerm = "%". $term . "%";
		$query->bindParam(":term", $searchTerm);
		$query->execute();

		$row = $query->fetch(PDO::FETCH_ASSOC);
		return $row["total"];

	}

	public function getResultsHtml($page, $pageSize, $term) {

		$fromLimit = ($page - 1) * $pageSize;

		$query = $this->con->prepare("SELECT * 
										 FROM images 
										 WHERE (title LIKE :term 
										 OR alt LIKE :term)
										 AND broken=0
										 ORDER BY clicks DESC
										 LIMIT :fromLimit, :pageSize");

		$searchTerm = "%". $term . "%";
		$query->bindParam(":term", $searchTerm);
		$query->bindParam(":fromLimit", $fromLimit, PDO::PARAM_INT);
		$query->bindParam(":pageSize", $pageSize, PDO::PARAM_INT);
		$query->execute();


		$resultsHtml = "<div class='imageResults'>";

		$count = 0;
		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$count++;
			$id = $row["id"];
			$imageUrl = $row["imageUrl"];
			$siteUrl = $row["siteUrl"];
			$title = $row["title"];
			$alt = $row["alt"];

			if($title) {
				$displayText = $title;
			}
			else if($alt) {
				$displayText = $alt;
			}
			else {
				$displayText = $imageUrl;
			}
			
			$resultsHtml .= "<div class='gridItem image$count'>
								<a href='$imageUrl' data-fancybox data-caption='$displayText'
									data-siteurl='$siteUrl'>
									
									<script>
									$(document).ready(function() {
										loadImage(\"$imageUrl\", \"image$count\");
									});
									</script>

									<span class='details'>$displayText</span>
								</a>

							</div>";


		}


		$resultsHtml .= "</div>";

		return $resultsHtml;
	}

/*
    De class ImageResultsProvider heeft een constructor die een databaseverbinding (vermoedelijk een PDO-verbinding) verwacht.

    De methode getNumResults($term) retourneert het totale aantal resultaten dat overeenkomt met de zoekterm $term in de database. Het gebruikt een SQL-query om het aantal resultaten op te halen waarvan de titel of alt-tekst overeenkomt met de zoekterm en waarvan de broken-status gelijk is aan 0.

    De methode getResultsHtml($page, $pageSize, $term) haalt afbeeldingsresultaten op voor een bepaalde pagina en retourneert deze als een HTML-tekst. Het gebruikt een SQL-query om resultaten op te halen op basis van de zoekterm, pagina en paginagrootte. Vervolgens bouwt het HTML-opmaak voor elk resultaat, inclusief een link naar de afbeelding, een bijschrift en een stuk JavaScript om afbeeldingen dynamisch te laden.
*/ 


}
?>
