<? include('header.php');?>
<?php

function read_csv(){
    $ads = [];
    $handle = fopen('ads.csv', 'r');
    while(!feof($handle)){
        $row = fgetcsv($handle);
        if(is_array($row)){
            $ads[] = $row;
        }
    }
    fclose($handle);
    return $ads;
  }

  $ads = read_csv();
  $ads_id = $_GET['id'];
  $ad = $ads[$ads_id];

?>
<div class="container">
	<div class="col-md-9">
		<h2><?= htmlspecialchars($ad[1]); ?></h1>
		<p>Posted at: <?= htmlspecialchars($ad[5]); ?></p>
		<p><?= htmlspecialchars($ad[2]); ?></p>
		<h3>Contact Info:</h2>
		<p>
			<?= htmlspecialchars($ad[3]); ?><br>
			<a href="mailto:<?= htmlspecialchars($ad[4]); ?>"><?= htmlspecialchars($ad[4]); ?></a>
		</p>
	</div>
	<div class="col-md-3">
		
	</div>
</div>
<? include('footer.php');?>