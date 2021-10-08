<?php
require_once __DIR__ . '/vendor/autoload.php';
use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\NaiveBayes; 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SENTIMENT</title>
</head>
<body>
	<h1>INPUT KOMENTAR</h1>
	<a href="Crawling.php">Crawling</a>
    <form action="" action="GET">

    KOMENTAR: <input type="text" name="comment"><br><br>
    <input type="submit" name="submit" value="Check">
    </form>

	<?php 
	$conn = new mysqli("localhost", "root", "", "twitter");
	 if ($conn->connect_error)
	 {
	    die("koneksi gagal: " . $conn->connect_error);
	 }
	 if(isset($_GET['submit']))
	 {
	    $labels = array();
	    $samples = array();

	    $newComment = $_GET['comment'];

	    $i = 0;
	    $sql = "SELECT * FROM komentar";
	    $result = mysqli_query($conn,$sql);
	    if(mysqli_num_rows($result)>0)
	    {
	        while ($row = mysqli_fetch_assoc($result)) 
	        {
	            $comment = $row["komentar"];
	            $labels[$i] = $row["sentiment"];
	            $samples[$i] = [$comment];
	            $i++;
	        }
	    }
	    echo "</table><br>";
	    
	    $newdata = [$newComment];
	    $hasil = "";
        $classifier = new NaiveBayes();
        $classifier->train($samples,$labels);
        $hasil = $classifier->predict($newdata);

        echo "KOMENTAR : " .$newComment;
	    echo "<h3>Hasil prediksi komentar , JENIS : ".$hasil. "</h3>"; 
	}
	?>
</body>
</html>