<?php 

function titlecase($word) {
  $word = ucwords($word);
  return $word;
}

function capfirst($word) {
  $word = ucfirst($word);
  return $word;
}

function makeBeer($theName, $theDrinks, $theBeer, $theQuantity) {
  if ($theBeer != 'nothing' && $theQuantity > 0) {
    $valid = true;
    $price = $theDrinks[$theBeer];
    $total = $price * $theQuantity;
    if ($theQuantity < 2) {
      $title = titlecase($theBeer).' for '.$theName;
      $theTotal = 'Total: $'.number_format($total, 2);
      $description = $theName.' ordered '.$theQuantity.' '.$theBeer.'.';
    } elseif ($theQuantity > 50) {
      $title = 'No '.titlecase($theBeer).' for '.$theName;
      $theBeer = 'rediculous';
      $description = 'Don&rsquo;t be a dingus, '.$theName.', that&rsquo;s more beer than you need! Also, you don&rsquo;t have $'.number_format($total, 2).'!';
    } else {
      $title = titlecase($theBeer).' for '.$theName;
      $theTotal = 'Total: $'.number_format($total, 2);
      $description = $theName.' ordered '.number_format($theQuantity).' '.$theBeer.'s.';
    }
  } else {
    $valid = false;
  };

  if ($valid == true) {
    return('
      <div class="card my-4 mx-auto" style="width: 20rem;">
        <img class="img-fluid" src="images/'.$theBeer.'.jpg" alt="Card image cap">
        <div class="card-block">
          <h2 class="h4 card-title">'.$title.'</h2>
          <p class="card-text">'.$description.'</p>
          <p class="h5">'.$theTotal.'</p>
        </div>
      </div>
    ');
  } else {
    return('
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <p class="m-0"><strong>Oops!</strong> Pick a drink.</p>
      </div>
    ');
  }
}
