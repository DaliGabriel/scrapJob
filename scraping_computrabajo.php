<?php


    //codigo para trabajar html
    require_once('simple_html_dom.php');

    //url to scrap
    $url = 'https://www.computrabajo.com.mx/trabajo-de-programador-en-morelia';



    $curl = curl_init();
    //headers
    $config['useragent'] = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127';



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
    foreach($domResult -> find('h1.fs18.fwB') as $a){
        
        
        $job_title_ct[] = $a -> plaintext;

    }

    //Empresa que realizo la oferta
    foreach($domResult -> find('a.fc_base.hover.it-blank') as $b){
        
        
        $companyName_ct[] = $b -> plaintext;

    }

    //info_extra
    foreach($domResult -> find('p.fc_aux.t_word_wrap.mb10.hide_m') as $d){
        
        
        $job_snippet_ct[] = $d -> plaintext;

    }

    //dias de publicacion
    foreach($domResult -> find('p.fs13.fc_aux') as $e){
        
        
        $date_ct[] = $e -> plaintext;

    }
    
    $a = array ('Title' ,'Company', 'info', 'Date');
    $b = $job_title_ct;
    $c = $companyName_ct;
    $d = $job_snippet_ct;
    $e = $date_ct;

    $ct = array_combine($a, array($b,$c,$d,$e));
    
    
?>