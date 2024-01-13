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


// quindi sel a varibile e true
if ($parking) {
  // ci creaiamo un array temporaneo
  $temp_hotels = [];
  foreach ($filtered_hotels as $hotel) {
    // ciclando l'array con tutti gli hotel, andiamo ad inserire nell'array temporaneo solo gli hotel con il parcheggio che quindi rispettano la condizione
    if ($hotel['parking']) {
      $temp_hotels[] = $hotel;
    }
  }
  // e in fine andiamo ad sostituire gli hotel con i parcheggio nell'array iniziale con tutti hgli hotel
  $filtered_hotels = $temp_hotels;
};

// data che la varibile dataci dalla select sia selezionata e che non sia vuota "" 
$vote = !empty($_GET['vote']) ? intval($_GET['vote']) : false;

// se quindi vote ha dato true e quindi ha assunto il valore del voto passato dalla select
if ($vote) {
  // ci creaiamo un array temporaneo
  $temp_hotels = [];
  foreach ($filtered_hotels as $hotel) {
    // se il valore dei voti dato all'hotel e maggiroe del voto selezionato nella select allora aggiungiamo quell'hotel all'array temporaneo
    if ($hotel['vote'] >= $vote) {
      $temp_hotels[] = $hotel;
    }
  }
  // per poi copiarlo nell'array di partenza con tutti gli hotel
  $filtered_hotels = $temp_hotels;
};




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
        <div class="col-auto">
          <div class="form-check ">
            <input class="form-check-input align-middle" type="checkbox" value="1" id="parking" name="parking" <?php if ($parking) : ?> checked <?php endif; ?>>
            <label class="form-check-label" for="parking">
              Parcheggio
            </label>
          </div>
        </div>

        <div class="col-auto">
          <select class="form-select col-auto" aria-label="Default select example" name="vote">
            <option selected value="">Vote: all</option>
            <?php for ($i = 1; $i <= 5; $i++) : ?>
              <option value="<?php echo $i; ?>" <?php if ($vote === $i) : ?> selected <?php endif; ?>> Vote <?php echo $i; ?></option>
            <?php endfor; ?>
          </select>

        </div>

        <div class="col">
          <button class="btn btn-primary ">Cerca</button>
        </div>

      </div>


    </form>
  </div>

  <!-- se l'array filtere hotel non e vuoto restituira true -->
  <?php if (count($filtered_hotels)) : ?>
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
  <?php else : ?>
    <div class="alert alert-warning container my-2" role="alert">
      Nessun hotel trovato
    </div>
  <?php endif; ?>
</body>

</html>