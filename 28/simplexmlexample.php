<?php
$theData = simplexml_load_File("books.xml");

foreach($theData->Book as $theBook) {
    $theBookTitle = $theBook->Title;
    $theBookAuthor = $theBook->Author;
    $theBookPublisher = $theBook->PublishingInfo->PublisherName;
    $theBookPublisherCity = $theBook->PublishingInfo->PublisherCity;
    $theBookPublishedYear = $theBook->PublishingInfo->PublishedYear;

	echo "<p><em>".$theBookTitle."</em> by ".$theBookAuthor."<br/>
	published by ".$theBookPublisher." (".$theBookPublisherCity.") in ".$theBookPublishedYear."</p>";

    unset($theBookTitle);
    unset($theBookAuthor);
    unset($theBookPublisher);
    unset($theBookPublishedYear);
}
?>