<?php

    //codigo para trabajar html
    require_once('simple_html_dom.php');

    //url to scrap
    $url = 'https://mx.indeed.com/trabajo?q=programador&l=Morelia,%20Mich.&from=search&vjk=bfbb6f425ed9af27';



    $curl = curl_init();
    //headers
    $config['useragent'] = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0';



    curl_setopt($curl, CURLOPT_USERAGENT, $config['useragent']);
    curl_setopt($curl, CURLOPT_REFERER, $url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);


    $result = curl_exec($curl);



    curl_close($curl);

    $domResult = new simple_html_dom();
    $domResult -> load($result);
 
    //Titulos de trabajo
    foreach($domResult -> find('h2.jobTitle') as $a){
        
        
        $job_title[] = $a -> plaintext;

    }

    //Limpia de datos de titulo de trabajo
    foreach($job_title as $job_titles){
        //separando los strings por patrones de inicio
        if (str_starts_with($job_titles,'nuevo empleo ')) {
            $job[] = str_replace('nuevo empleo ', '', $job_titles);
        // obtener los demas resultados que no contengan el patron de busqueda
        }else {
            $job[] = $job_titles;
        }
    }

    //Empresa que realizo la oferta
    foreach($domResult -> find('span.companyName') as $b){
        
        
        $companyName[] = $b -> plaintext;

    }

    
    //Localizacion de la compañia
    foreach($domResult -> find('div.companyLocation') as $c){
        
        
        $companyLocation[] = $c -> plaintext;

    }

    
    //info_extra
    foreach($domResult -> find('div.job-snippet') as $d){
        
        
        $job_snippet[] = $d -> plaintext;

    }
    
    //dias de publicacion
    foreach($domResult -> find('span.date') as $e){
        
        
        $date[] = $e -> plaintext;

    }
    //Limpia de fecha
    foreach($date as $dates){
        //separando los strings por patrones de inicio
        if (str_starts_with($dates,'Posted hace ')) {
            $datee[] = str_replace('Posted hace ', '', $dates);
        // obtener los demas resultados que no contengan el patron de busqueda
        }else if (str_starts_with($dates,'Employer Activo hace ')) {
            $datee[] = str_replace('Employer Activo hace ', '', $dates);
        }
        else {
            $datee[] = $dates;
        }
    }

    $a = array ('Title' ,'Company', 'City', 'info', 'Date');
    $b = $job;
    $c = $companyName;
    $d = $companyLocation;
    $e = $job_snippet;
    $f = $datee;

    $i = array_combine($a, array($b,$c,$d,$e,$f));


?>