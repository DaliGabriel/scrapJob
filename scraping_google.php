<?php

//codigo para trabajar html
require_once('simple_html_dom.php');


//url to scrap
$url = 'https://www.google.com/search?client=firefox-b-d&q=programador+morelia&ibp=htl;jobs&sa=X&ved=2ahUKEwjetrTXo4j3AhX-JUQIHa5lBX4QutcGKAB6BAgDEAQ#htivrt=jobs&htidocid=JyOE5stdakgAAAAAAAAAAA%3D%3D&fpstate=tldetail';



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

// para trabajar con el dom
$domResult = new simple_html_dom();
$domResult -> load($result);


//puesto de trabajo
foreach($domResult -> find('div.BjJfJf.PUpOsf') as $a){

    $rol[] = $a -> plaintext; 
    

    

}
//nueva variable para almacenar en la base de datos
    $roll = $rol;
    
    // //arreglo para insertar cada elemento en la base de datos
    // foreach($roll as $roles){
    //     //cadena sql para insertar en la tabla google de la base de datos empleo, los valores del arreglo declarado arriba
    //     //                                     |************| permite insertar cada posicion del arreglo por medio del ciclo, ya que sql no reconoce los tipos de datos de php, es necesario usar dobles comillas y unirlas 
    //     $query1="INSERT INTO google(rol) VALUES('".$roles."')";

    //     //comprueba si la cadena se inserto correctamente en la base de datos si no muestra el error 
    //     if ($conn->query($query1) === TRUE) {
    //     echo "New record created successfully";
    //     } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
    // }
    

    
    
    


//compañia de la oferta de empleo
foreach($domResult -> find('div.vNEEBe') as $e){
    
    $company[] = $e -> plaintext;
}

$companyy = $company;
    
    // foreach($companyy as $companys){

    //     $query2="INSERT INTO google(company) VALUES('".$companys."')";


    //     if ($conn->query($query2) === TRUE) {
    //     echo "New record created successfully";
    //     } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
        

    // }
    


//ciudad y web de donde se obtuvo esa propuesta
foreach($domResult -> find('div.Qk80Jf') as $i){
    
    $platform_city[] = $i -> plaintext;
}


//segmentar los datos de plataforma y ciudad
foreach($platform_city as $platform_citys){
    //separando los strings por patrones de inicio
    if (str_starts_with($platform_citys,'a través de')) {
        $platform[] = str_replace('a través de', '', $platform_citys);
    // obtener los demas resultados que son las ciudades
    }else {
        $city[] = $platform_citys;
    }
}

$platformm = $platform;
    
    // foreach($platformm as $platforms){

    //     $query3="INSERT INTO google(platform) VALUES('".$platforms."')";


    //     if ($conn->query($query3) === TRUE) {
    //     echo "New record created successfully";
    //     } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
        
    // }
    

$cityy = $city;
    
    // foreach($cityy as $citys){

    //     $query4="INSERT INTO google(city) VALUES('".$citys."')";


    //     if ($conn->query($query4) === TRUE) {
    //     echo "New record created successfully";
    //     } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //     }
        

    // }


// obtener el sueldo si lo muestra, la jornada y los dias que tiene esa postulacion
foreach($domResult -> find('div.KKh3md') as $o){
    
    $days_pay_time[] = $o -> plaintext;
}

$days_pay_timee = $days_pay_time;
    
// foreach($days_pay_timee as $days_pay_times){

//     $query5="INSERT INTO google(more_info) VALUES('".$days_pay_times."')";


//     if ($conn->query($query5) === TRUE) {
//     echo "New record created successfully";
//     } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//     }
    

// }

$a = array ('Rol' ,'Company', 'Platform', 'City', 'Day_Pay_Time');
$b = $roll;
$c = $companyy;
$d = $platformm;
$e = $cityy;
$f = $days_pay_timee;

$g = array_combine($a, array($b,$c,$d,$e,$f));

// $json = json_encode($g, JSON_UNESCAPED_UNICODE);
// echo $json;

?>
