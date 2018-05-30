<?php

class PubMedArticle extends DataFetch{

    var $SearchParameter;
    var $BruteResult;
    var $Title;
    var $ID;
    var $Volume;
    var $Year;
    var $Issue;
    var $Month;
    var $Pages;
    var $JournalTitle;
    var $AllAuthors;

    function __construct($type, $SearchParam){

        switch($type){
            case "IDSearch":
                $this->$SearchParameter = $SearchParam;
                $this->GetArticleByID($SearchParam);
                break;
                
                // BETA - NOT IMPLEMENTED
            case "AuthorSearch":
                $this->$SearchParameter = $SearchParam;
                $this->GetArticleByAuthor($SearchParam);
                break;
                
                // BETA - NOT IMPLEMENTED
             case "ArticleTitle":
                $this->$SearchParameter = $SearchParam;
                $this->GetArticleByTitle($SearchParam);
                break;

            default:
                echo "Invalid Search Param";
        } 
    }
    
    
    // FUNCTION TO GET ARTICLE BY ID
    private function GetArticleByID($Parameter){

        $article = $this::file_get_contents_curl('https://eutils.ncbi.nlm.nih.gov/entrez/eutils/efetch.fcgi?db=pubmed&id='.$Parameter.'&retmode=xml');
        
        $article =  simplexml_load_string($article);    // CONVERT XML TO PHP READABLE XML
        $this->BruteResult = $article;  // SAVE ALL INFORMATION TO BruteResult FOR LATER USE, IF ANY
        
        
        $this->GetPages($article);

        
        

    }

    // FUNCTION TO GET ARTICLE BY AUTHOR - NOT IMPLEMENTED
    private function GetArticleByAuthor($Parameter){

        echo "Getting Article By Author ". $this->SearchParameter ." <br>";

    }
    
    
    
      // FUNCTION TO GET ARTICLE BY AUTHOR - NOT IMPLEMENTED
    private function GetArticleByTitle($Parameter){

        echo "Getting Article By Author ". $this->SearchParameter ." <br>";

    }
    
    
    private function BreakIntoElements($xmlInput){
        
        
    }
    
    
    
    function GetPubTitle($input){
        
    }
    
    function GetPages($input){
        
        $input = $input -> PubmedArticle->MedlineCitation->Article->Pagination->MedlinePgn;
        
        if($input){
            $this->Pages = $input;
        }else{
            $this->Pages = "";
        }
        
//        echo($this->Pages);
        
    }
    
    
    

}


?>