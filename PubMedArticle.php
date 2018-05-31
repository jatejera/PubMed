<?php

class PubMedArticle extends DataFetch{

    var $SearchParameter;
//    var $BruteResult;
    var $ArticleTitle;
    var $ArticleID;
    var $Volume;
    var $Year;
    var $Issue;
    var $Month;
    var $Pages;
    var $JournalTitle;
    var $AllAuthors = array();
    var $AuthorsCount;
    var $AbstractText = array();

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


    // FUNCTION TO GET ARTICLE BY ID
    private function GetArticleByID($Parameter){

        $article = $this::file_get_contents_curl('https://eutils.ncbi.nlm.nih.gov/entrez/eutils/efetch.fcgi?db=pubmed&id='.$Parameter.'&retmode=xml');


//        $article =  new SimpleXMLElement($article);
        
        $article =  simplexml_load_string($article);    // CONVERT XML TO PHP READABLE XML
//        $this->BruteResult = $article;  // SAVE ALL INFORMATION TO BruteResult FOR LATER USE, IF ANY

        $this->GetAllData($article);





    }

    // FUNCTION TO GET ARTICLE BY AUTHOR - NOT IMPLEMENTED
    private function GetArticleByAuthor($Parameter){

        echo "Getting Article By Author ". $this->SearchParameter ." <br>";

    }



    // FUNCTION TO GET ARTICLE BY AUTHOR - NOT IMPLEMENTED
    private function GetArticleByTitle($Parameter){

        echo "Getting Article By Author ". $this->SearchParameter ." <br>";

    }


    private function GetAllData($xmlInput){

        $this->GetArticleTitle($xmlInput);
        $this->GetArticleID($xmlInput);
        $this->GetVolume($xmlInput);
        $this->GetYear($xmlInput);
        $this->GetIssue($xmlInput);
        $this->GetMonth($xmlInput);
        $this->GetPages($xmlInput);
        $this->GetJournalTitle($xmlInput);
        $this->GetAllAuthors($xmlInput);
        $this->GetAbstractText($xmlInput);

        

    }



    function GetPubTitle($input){


    }

    function GetArticleTitle($input){


        //        $location = '/PubmedArticle/MedlineCitation/Article/ArticleTitle'; $location = str_replace("/", "->", $location); echo $location;

        $input = $input ->PubmedArticle->MedlineCitation->Article->ArticleTitle;
        //        echo $input;

        if($input){
            $this->ArticleTitle = $input;
        }else{
            $this->ArticleTitle = "";
        }
        //        echo $this->ArticleTitle;

    }

    function GetArticleID($input){


        //        $location = '/PubmedArticle/MedlineCitation/PMID'; $location = str_replace("/", "->", $location); echo $location;

        $input = $input ->PubmedArticle->MedlineCitation->PMID;
        //        echo $input;

        if($input){
            $this->ArticleID = $input;
        }else{
            $this->ArticleID = "";
        }
        //        echo $this->ArticleID;

    }

    function GetVolume($input){


        //        $location = '/PubmedArticle/MedlineCitation/Article/Journal/JournalIssue/Volume'; $location = str_replace("/", "->", $location); echo $location;

        $input = $input ->PubmedArticle->MedlineCitation->Article->Journal->JournalIssue->Volume;
        //        echo $input;

        if($input){
            $this->Volume = $input;
        }else{
            $this->Volume = "";
        }
        //        echo $this->Volume;

    }

    function GetYear($input){


        //        $location = '/PubmedArticle/MedlineCitation/Article/Journal/JournalIssue/PubDate/Year'; $location = str_replace("/", "->", $location); echo $location;

        $input = $input ->PubmedArticle->MedlineCitation->Article->Journal->JournalIssue->PubDate->Year;
        //        echo $input;

        if($input){
            $this->Year = $input;
        }else{
            $this->Year = "";
        }
        //        echo $this->Year;

    }


    function GetIssue($input){


        //        $location = '/PubmedArticle/MedlineCitation/Article/Journal/JournalIssue/Issue'; $location = str_replace("/", "->", $location); echo $location;

        $input = $input ->PubmedArticle->MedlineCitation->Article->Journal->JournalIssue->Issue;
        //        echo $input;

        if($input){
            $this->Issue = $input;
        }else{
            $this->Issue = "";
        }
        //        echo $this->Issue;

    }


    function GetMonth($input){


        //        $location = '/PubmedArticle/MedlineCitation/Article/Journal/JournalIssue/PubDate/Month'; $location = str_replace("/", "->", $location); echo $location;

        $input = $input ->PubmedArticle->MedlineCitation->Article->Journal->JournalIssue->PubDate->Month;
        //        echo $input;

        if($input){
            $this->Month = $input;
        }else{
            $this->Month = "";
        }
        //        echo $this->Month;

    }


    function GetPages($input){


        //        $location = '/PubmedArticle/MedlineCitation/Article/Pagination/MedlinePgn'; $location = str_replace("/", "->", $location); echo $location;

        $input = $input ->PubmedArticle->MedlineCitation->Article->Pagination->MedlinePgn;
        //        echo $input;

        if($input){
            $this->Pages = $input;
        }else{
            $this->Pages = "";
        }
        //        echo $this->Pages;

    }


    function GetJournalTitle($input){


        //        $location = '/PubmedArticle/MedlineCitation/Article/Journal/Title'; $location = str_replace("/", "->", $location); echo $location;

        $input = $input ->PubmedArticle->MedlineCitation->Article->Journal->Title;
        //        echo $input;

        if($input){
            $this->JournalTitle = $input;
        }else{
            $this->JournalTitle = "";
        }
        //        echo $this->JournalTitle;

    }


    function GetAllAuthors($input){


        //        $location = '/PubmedArticle/MedlineCitation/Article/AuthorList/Author'; $location = str_replace("/", "->", $location); echo $location;

        $input = $input ->PubmedArticle->MedlineCitation->Article->AuthorList;
        $this->AuthorsCount = count($input->Author);
        foreach($input->Author as $key => $value){
            //            var_dump($value);
            $LastName = $value->LastName;
            $Initials = $value->Initials;
            $authorName = $LastName.", ".$Initials;
            array_push($this->AllAuthors, $authorName);

        }

//        var_dump($this->AllAuthors);
//        echo $this->AuthorsCount;

    }
    
    
    function GetAbstractText($input){


//                $location = '/PubmedArticle/MedlineCitation/Article/Abstract'; $location = str_replace("/", "->", $location); echo $location;

        $input = $input ->PubmedArticle->MedlineCitation->Article->Abstract;
        
//        echo $this->AuthorsCount = count($input->AbstractText);
        foreach($input->AbstractText as $key => $value){
          
            array_push($this->AbstractText, $value);

        }

//        var_dump($this->AbstractText);
//        echo $this->AbstractText[0];

    }






}


?>
