<?php
header("Access-Control-Allow-Origin: *");
include('DataFetch.php');
include('PubMedArticle.php');
include('PubMedCentralArticle.php');



$IDSearch = $_POST['ArticleID'] ? $_POST['ArticleID'] : null;

// FETCH BY "IDSearch" or "UserSearch"

// PubMed Sample Article 27181790

//PubMed Central Article 212403

if(isset($IDSearch)){
$article = new PubMedArticle("IDSearch", $IDSearch);


$arr = json_encode($article, true);
echo $arr;
}else{
    echo "No valid ID was entered";
}
    
    
//echo (json_encode($arr));

//print_r($article->BruteResult);


//$article = new PubMedCentralArticle("IDSearch", 212403);
//print_r($article->BruteResult);

?>
