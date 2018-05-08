<?php

class PubMedArticle extends DataFetch{

    var $SearchParameter;

    function __construct($type, $SearchParam){

        switch($type){
            case "IDSearch":
                $this->$SearchParameter = $SearchParam;
                $this->GetArticleByID($SearchParam);
                break;

            case "AuthorSearch":
                $this->$SearchParameter = $SearchParam;
                $this->GetArticleByAuthor($SearchParam);
                break;

            default:
                echo "Invalid Search Param";
        } 
    }

    private function GetArticleByID($Parameter){

        $article = $this::file_get_contents_curl('https://eutils.ncbi.nlm.nih.gov/entrez/eutils/efetch.fcgi?db=pubmed&id=29719135&retmode=xml');
        
        echo $article;
        

    }

    private function GetArticleByAuthor($Parameter){

        echo "Getting Article By Author ". $this->$SearchParameter ." <br>";

    }
    
    
    

}


?>