<?php

include('DataFetch.php');
include('PubMedArticle.php');
include('PubMedCentralArticle.php');



// FETCH BY "IDSearch" or "UserSearch"

// PubMed Sample Article 29719135

//PubMed Central Article 212403


$article = new PubMedArticle("IDSearch", 27916205);
//print_r($article->BruteResult);


//$article = new PubMedCentralArticle("IDSearch", 212403);
//print_r($article->BruteResult);

?>