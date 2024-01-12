<?php
$hotels = [
  [
    'name' => 'Hotel Belvedere',
    'description' => 'Hotel Belvedere Descrizione',
    'parking' => true,
    'vote' => 4,
    'distance_to_center' => 10.4
  ],
  [
    'name' => 'Hotel Futuro',
    'description' => 'Hotel Futuro Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 2
  ],
  [
    'name' => 'Hotel Rivamare',
    'description' => 'Hotel Rivamare Descrizione',
    'parking' => false,
    'vote' => 1,
    'distance_to_center' => 1
  ],
  [
    'name' => 'Hotel Bellavista',
    'description' => 'Hotel Bellavista Descrizione',
    'parking' => false,
    'vote' => 5,
    'distance_to_center' => 5.5
  ],
  [
    'name' => 'Hotel Milano',
    'description' => 'Hotel Milano Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 50
  ],
];

$filtered_hotels = $hotels;

// se la variabile e' data dalla checkbox e settata diamo a una variabile il valore true o false
$parking = !empty($_GET['parking']) ? true : false;

if ($parking) {
  $temp_hotels = [];
  foreach ($filtered_hotels as $hotel) {
    if ($hotel['parking']) {
      $temp_hotels[] = $hotel;
    }
  }
  $filtered_hotels = $temp_hotels;
};

var_dump($_GET);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Hotel</title>

  <!-- bootstrap -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- foglio di stile -->
  <link rel="stylesheet" href="style.css">
</head>

<body>


  <div class="container">
    <h1>Hotels</h1>
    <form action="index.php" method="GET">
      <div class="row align-items-center">
        <div class="form-check col-auto">
          <input class="form-check-input align-middle" type="checkbox" value="1" id="parking" name="parking" <?php if ($parking) : ?> checked <?php endif; ?>>
          <label class="form-check-label" for="parking">
            Default checkbox
          </label>
        </div>
        <button class="btn btn-primary col-auto">Primary</button>
      </div>


    </form>
  </div>



  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrizione</th>
        <th scope="col">Parcheggio</th>
        <th scope="col">Voto</th>
        <th scope="col">Distanza dal centro</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($filtered_hotels as $key => $hotel) : ?>
        <tr>
          <th scope="row"><?php echo $key; ?></th>
          <td><?php echo $hotel['name']; ?></td>
          <td><?php echo $hotel['description']; ?></td>
          <?php if ($hotel['parking']) : ?>
            <td>Si</td>
          <?php else : ?>
            <td>No</td>
          <?php endif; ?>
          <td><?php echo $hotel['vote']; ?></td>
          <td><?php echo $hotel['distance_to_center']; ?></td>
        </tr>
      <?php endforeach; ?>


    </tbody>
  </table>

</body>

</html>