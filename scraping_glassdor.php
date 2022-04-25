<?php

    //codigo para trabajar html
    require_once('simple_html_dom.php');

    //url to scrap
    $url = 'https://www.glassdoor.com.mx/Empleo/morelia-programador-empleos-SRCH_IL.0,7_IC3522622_KO8,19.htm';



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
    foreach($domResult -> find('a.jobLink.job-search-key-1rd3saf.eigr9kq1') as $a){
        
        
        $job_title_gd[] = $a -> plaintext;

    }
    
    //Empresa que realizo la oferta
    foreach($domResult -> find('a.job-search-key-l2wjgv.e1n63ojh0.jobLink') as $b){
        
        
        $companyName_gd[] = $b -> plaintext;

    }
    
    //dias de publicacion
    foreach($domResult -> find('div.d-flex.align-items-end.pl-std.css-17n8uzw') as $e){
        
        
        $date_gd[] = $e -> plaintext;

    }
    
    $a = array ('Title' ,'Company', 'Date');
    $b = $job_title_gd;
    $c = $companyName_gd;
    $d = $date_gd;

    $gd = array_combine($a, array($b,$c,$d));



?>