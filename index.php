<?php
	
	 $origin = "*";
	header('content-type: application/json; charset=utf-8');
	header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
	header("Access-Control-Allow-Origin: " . $origin);
	
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if ($_GET['data'] == 'price') {
            $url = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=";
            $url .= $_GET["symbol"];
            $url .= "&outputsize=full&apikey=15SSOMJA1UEITCD7";
            echo file_get_contents($url);
        } else if ($_GET['data'] == 'SMA') {
            $url = "https://www.alphavantage.co/query?function=SMA&symbol=" . $_GET["symbol"] .  "&interval=daily&time_period=10&series_type=close&apikey=15SSOMJA1UEITCD7";
            echo file_get_contents($url);
        } else if ($_GET['data'] == 'EMA') {
            $url = "https://www.alphavantage.co/query?function=EMA&symbol=" . $_GET["symbol"] .  "&interval=daily&time_period=10&series_type=close&apikey=15SSOMJA1UEITCD7";
            echo file_get_contents($url);
        } else if ($_GET['data'] == 'RSI') {
            $url = "https://www.alphavantage.co/query?function=RSI&symbol=" . $_GET["symbol"] .  "&interval=daily&time_period=10&series_type=close&apikey=15SSOMJA1UEITCD7";
            echo file_get_contents($url);
        } else if ($_GET['data'] == 'ADX') {
            $url = "https://www.alphavantage.co/query?function=ADX&symbol=" . $_GET["symbol"] .  "&interval=daily&time_period=10&series_type=close&apikey=15SSOMJA1UEITCD7";
            echo file_get_contents($url);
        } else if ($_GET['data'] == 'CCI') {
            $url = "https://www.alphavantage.co/query?function=CCI&symbol=" . $_GET["symbol"] .  "&interval=daily&time_period=10&series_type=close&apikey=15SSOMJA1UEITCD7";
            echo file_get_contents($url);
        } else if ($_GET['data'] == 'STOCH') {
              $url = "https://www.alphavantage.co/query?function=STOCH&symbol=". $_GET["symbol"] . "&interval=daily&time_period=10&series_type=close&slowkmatype=1&slowdmatype=1&apikey=15SSOMJA1UEITCD7";
            echo file_get_contents($url);
        } else if ($_GET['data'] == 'BBANDS') {
             $url ="https://www.alphavantage.co/query?function=BBANDS&symbol=" . $_GET["symbol"] . "&interval=daily&time_period=5&series_type=close&nbdevup=3&nbdevdn=3&apikey=15SSOMJA1UEITCD7";
            echo file_get_contents($url);
        } else if ($_GET['data'] == 'MACD') {
              $url = "https://www.alphavantage.co/query?function=MACD&symbol=" . $_GET["symbol"] .  "&interval=daily&time_period=10&series_type=close&apikey=15SSOMJA1UEITCD7";
            echo file_get_contents($url);
        } else if ($_GET['data'] == 'NEWS') {
              $xmlurl =   "https://seekingalpha.com/api/sa/combined/" . $_GET["symbol"] . ".xml";
              $xmlContent = file_get_contents($xmlurl);
              $xml=simplexml_load_string($xmlContent) or die("Error: Cannot create object");
               $artnum = 0;
               $con = array();
                foreach ($xml->channel->item as $eachitem) {
                     if (strpos($eachitem->link,'article')) {
                        $eachar = array();
                        array_push($eachar, $eachitem->title);
                        array_push($eachar, $eachitem->link);
                        
                        array_push($eachar, $eachitem->pubDate);
                         
                         array_push($eachar, $eachitem->children('sa',true)->author_name);
                         array_push($eachar, $eachitem["sa:author_name"]);
                        array_push($con, $eachar);
                        
                         $artnum++;
                         if ($artnum == 5) {
                             break;
                         }

                     }
                 }
                echo json_encode($con);
            
        } else if ($_GET['data'] == 'fresh') {
             $res = array();
              $sybarray = $_GET['symbol'];
              foreach($sybarray as $each) {
                  $url = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=";
                  $url .= $each;
                  $url .= "&apikey=15SSOMJA1UEITCD7";
                  $res[$each] = json_decode(file_get_contents($url));
              }
              echo json_encode($res);
        } else if ($_GET['data'] == 'auto') {
             
           $url = "http://dev.markitondemand.com/MODApis/Api/v2/Lookup/json?input= ". $_GET['nei'];
            echo file_get_contents($url);
        } 
    }
	


?>