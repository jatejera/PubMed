<?php

include('DataFetch.php');
include('PubMedArticle.php');
include('PubMedCentralArticle.php');



// FETCH BY "IDSearch" or "UserSearch"

// PubMed Sample Article 27181790

//PubMed Central Article 212403


$article = new PubMedArticle("IDSearch", 27181790);

//echo $some = html_entity_decode(json_encode($article, JSON_NUMERIC_CHECK));


$arr = json_decode(json_encode($article),true);
echo (json_encode($arr));
//print_r($article->BruteResult);


//$article = new PubMedCentralArticle("IDSearch", 212403);
//print_r($article->BruteResult);

?>