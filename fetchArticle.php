<?php

include('DataFetch.php');
include('PubMedArticle.php');
include('PubMedCentralArticle.php');



// FETCH BY "IDSearch" or "UserSearch"

// PubMed Sample Article 27181790

//PubMed Central Article 212403


$article = new PubMedArticle("IDSearch", 27181790);
//echo json_encode($article -> BruteResult);
//print_r($article->BruteResult);


//$article = new PubMedCentralArticle("IDSearch", 212403);
//print_r($article->BruteResult);

?>