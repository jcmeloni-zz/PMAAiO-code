<?php
$dom = new DomDocument;
$dom->load("books.xml");

foreach ($dom->documentElement->childNodes as $books) {
    if (($books->nodeType == 1) && ($books->nodeName == "Book")) {

        foreach ($books->childNodes  as $theBook) {
            if (($theBook->nodeType == 1) && ($theBook->nodeName == "Title")) {
               $theBookTitle = $theBook->textContent;
            }

            if (($theBook->nodeType == 1) && ($theBook->nodeName == "Author")) {
               $theBookAuthor = $theBook->textContent;
            }

            if (($theBook->nodeType == 1) && ($theBook->nodeName == "PublishingInfo")) {

               foreach ($theBook->childNodes as $thePublishingInfo) {
                   if (($thePublishingInfo->nodeType == 1) && ($thePublishingInfo->nodeName == "PublisherName")) {
                        $theBookPublisher = $thePublishingInfo->textContent;
           	       }

                   if (($thePublishingInfo->nodeType == 1) && ($thePublishingInfo->nodeName == "PublishedYear")) {
                        $theBookPublishedYear = $thePublishingInfo->textContent;
           	       }
               }
            }
        }

		echo "<p><em>".$theBookTitle."</em>
		by ".$theBookAuthor."<br/>
		published by ".$theBookPublisher." in ".$theBookPublishedYear."</p>";

        unset($theBookTitle);
        unset($theBookAuthor);
        unset($theBookPublisher);
        unset($theBookPublishedYear);
    }
}
?>