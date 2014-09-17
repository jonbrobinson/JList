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

?>
  <div class="container theme-showcase" role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <h1>Welcome to J List</h1>
      <h3>***Disclaimer - Demo Site***</h3>
      <p>This is not a real website. This site was built to demonstra my skills using PHP HTML CSS and Twitter bootstrap.  Plese enjoy the site as an art piece. And if you are looking for a PHP programmer please feel to reach out to me.</p>
      <p>Also check out my porfolio page <a href="http://jonbrobinson.com">Jonbrobinson.com</a></p>
    </div>
    <div class="col-md-3">
      <h3><i class="fa fa-star"></i> Featured Ad</h3>
      <h5><?= $ads[2][1];?></h5>
      <h5><?= $ads[2][2];?></h5>
      <a href="ad_view.php?id=2">Visit</a>

    </div>
    <div class="col-md-9">
      <table class="table">
        <tr>
          <th>Category</th>
          <th>Title</th>
          <th>Created By</th>
          <th>Created Date</th>
          <th>Contat</th>
        </tr>
        <?php foreach($ads as $index => $ad):?>
        <tr>
          <td><?= $ad[0];?></td>
          <td><a href="ad_view.php?id=<?=$index;?>"><?= $ad[1];?></a></td>
          <td><?= $ad[3];?></td>
          <td><?= $ad[5];?></td>
          <td><?= $ad[4];?></td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>


  </div> <!-- /container -->

<? include('footer.php');?>