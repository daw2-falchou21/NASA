<?php
    require_once("class.pdofactory.php");
    require_once("abstract.databoundobject.php");
    require_once("class.nasa.php");

    
    print "Running....<br />";
    
    $strDSN = "pgsql:dbname=nasa;host=localhost;port=5432";
    $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", array());
    $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $url = curl_init("https://api.nasa.gov/techtransfer/patent/?engine&api_key=gCETfcbIki4egHxavkhtjFa7eMR4QrMLSXWKOUDd");
   

    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($url, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($url);
    $code = curl_getinfo($url, CURLINFO_HTTP_CODE);
    echo '<h1>NASA Test API Maysa</h1></p><br>';
    curl_close($url);
    $json = json_decode($data);

    //$results = $json->results[0];
    $count = $json->count;
    $total = $json->total;
    $perpage = $json->perpage;
    $page = $json->page;

    $objPro = new techtransfer($objPDO);
    $objPro->setCount($count)->setTotal($total)->setPerpage($perpage)->setPage($page);
    $objPro->Save();

    print " Count: " . $objPro->getCount() . "<br />";
    print " Total: " . $objPro->getTotal() . "<br />";
    print " Perpage: " . $objPro->getPerpage() . "<br />";
    print " Page: " . $objPro->getPage() . "<br />";


    
    // $id1 = $json->results[1];
    // print_r ($id);
    // echo "<br />";
    // print_r ($id2);
    // echo "<br />";
    // print_r ($id3);
    // echo "<br />";
    // print_r ($id4);
    // print_r ($id1);



















    //READ JSON FILE
    // $url_data = file_get_contents($url);

    //DECODE JSON data INTO PHP ARRAY
//    $reponse_url = json_decode($url_data);

   //ALL USER DATA EXISTS IN 'data' OBJECT
    // $data_url = $response_url;
    
    //print data if need to debug
    //print_r($user_data):

    // Traverse array and display user data
    // echo "<br />";

    // echo "<br />";
    // $id = $json->results[0];

    // echo $id;


            // echo "<br />";
            // $objPro->setresults($data_url->results)->setcount($data_url->count)->settotal($data_url->total)->setperpage($data_url->perpage)->setpage($data_url->page);
            // $objPro->Save();
            
            // echo "<br /> <br />";
    
    

    

            // print "Results: " . $objPro->getresults() . "<br />";
            // print "Count: " . $objPro->getcount() . "<br />";
            // print "Total: " . $objPro->gettotal() . "<br />";
            // print "Perpage:  " . $objPro->getperpage() . "<br />";  
            // print "Page: " . $objPro->getpage() . "<br />";  
        
    // echo"<br>";


    
    

    


?>