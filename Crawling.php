
<?php
	require_once __DIR__ .'/vendor/autoload.php';
	use DG\Twitter\Twitter;
	include("CleansingClass.php");
	$consumerKey = ;
	$consumerSecret = ;
	$accessToken = ;
	$accessTokenSecret = ;
	$twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
	
?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
	<title>Crawling Tweet</title>
</head>
<body>
	<h1>Crawling Data Twitter</h1>
	<a href="Sentiment.php">Sentiment</a>
<form method="POST" action="">
	<label>INPUT KEYWORD</label><br>
	<input type ="text" id="" name="kunci"></input><br><br>
	<label>JUMLAH CRAWLING</label><br>
	<input type ="number" id="" name="angka"></input><br>
	<input type="submit" name="submit" value="CRAWL">
</form>
<table>
</table>
<?php 
if(isset($_POST['submit'])){
	echo "<table border='2px'>
	<tr>
		<th>Username</th>
		<th>Tweet</th>
		<th>Posted At</th>
		<th>Created Acc</th>
		<th>Status</th>
		<th>Follower</th>
		<th>Following</th>
		<th>Buzzer</th>
		<th>DP</th>

	</tr>
  ";
	$jumlahT = $_POST['angka'];
	$search = $_POST['kunci'];
	$results = $twitter->search(['count' => $jumlahT, 'q' => $search, "
                        result_type" => "recent", 'tweet_mode' => 'extended', 
                        'locale' => 'id', 'filter' => 'replies']);
	foreach($results as $status){
		$stemmerFactory= new \Sastrawi\Stemmer\StemmerFactory();
		$stemmer=$stemmerFactory->createStemmer();
                    
    	$stopwordFactory= new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
    	$stopword=$stopwordFactory->createStopWordRemover();

		$tweet = $status->full_text;
		$text_clean = new Clean($tweet);
		$text_clean = $text_clean->toString();

		$text_stem = $stemmer->stem($text_clean);
		$text_stop = $stopword->remove($text_stem);

		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "twitter";
        $conn = new mysqli($servername, $username, $password, $dbname);
     
        if ($conn->connect_error) 
        {
         die("Connection failed: " . $conn->connect_error);
        }
     
        $sql = "INSERT INTO komentar (komentar, tanggal, sentiment)
        VALUES ('$text_stem', '$status->created_at', '')";

        if ($conn->query($sql) === TRUE) 
        {
        	
        } 
        else 
        {
        	echo "Error: " . $sql . "<br>" . $conn->error;
        }
        

		// echo "<pre>";
		// print_r($results);
		// echo "</pre>";

		$users = strval($status->user->created_at);
		echo "<tr>";
		echo "<td>".$status->user->screen_name."</td>";
		echo "<td>".$text_stem."</td>";
		echo "<td>".$status->created_at."</td>";
	    echo "<td>".$status->user->created_at."</td>";
	    echo "<td>".$status->user->statuses_count."</td>";
	    echo "<td>".$status->user->followers_count."</td>";
	    echo "<td>".$status->user->friends_count."</td>";

		if(substr($users,26) == "2021")
		{
			echo "<td> POSSIBLY SCAM </td>";
		}
		else
		{
			echo "<td> NOT SCAM </td>";
		}
	    echo "<td><img src='".$status->user->profile_image_url."'></td>";
	    echo "</tr>";
	}
	$conn->close();
	echo "</table>";
}
?>
</body>
</html>