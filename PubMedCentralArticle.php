<?php

class PubMedCentralArticle extends DataFetch{
    
    var $SearchParameter;
    var $BruteResult;

    function __construct($type, $SearchParam){

        switch($type){
            case "IDSearch":
                $this->SearchParameter = $SearchParam;
                $this->GetArticleByID($SearchParam);
                break;
                
                // BETA - NOT IMPLEMENTED
            case "AuthorSearch":
                $this->SearchParameter = $SearchParam;
                $this->GetArticleByAuthor($SearchParam);
                break;
                
                // BETA - NOT IMPLEMENTED
             case "ArticleTitle":
                $this->SearchParameter = $SearchParam;
                $this->GetArticleByTitle($SearchParam);
                break;

            default:
                echo "Invalid Search Param";
        } 
    }
    private function GetArticleByID($Parameter){

        $article = $this::file_get_contents_curl('https://eutils.ncbi.nlm.nih.gov/entrez/eutils/efetch.fcgi?db=pmc&id='.$Parameter);
        
//        return $article;
        echo $article;
        

    }

    private function GetArticleByAuthor($Parameter){

        echo "Getting Article By Author ". $this->$SearchParameter ." <br>";

    }
    
    
    

}

?>