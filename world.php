<?php
//http://localhost/info2180-lab5/index.html

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country=$_GET['country'];
$city=$_GET['city'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

//did an if because when done separately, received error message
//used like instead of = to accomadate for only similar letters being inputted and not the whole country name

if ($city=='none'){
  $stmt = $conn->query("SELECT * FROM countries WHERE NAME LIKE '%$country%'");
}else if($city=='cities'){
  $stmt = $conn->query("SELECT cities.name,cities.district,cities.population FROM countries JOIN cities ON countries.code=cities.country_code WHERE countries.name LIKE '%$country%'");

}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php $country = trim(filter_var($country, FILTER_SANITIZE_STRING)); ?>

<?php if($city=='none'){ ?>
  <table >
      <tr>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence</th>
        <th>Head Of State</th>
      </tr>

  <?php foreach ($results as $row): ?>
<!-- input in the data -->
      <tr>
        <td> <?= $row['name'];?></td>
        <td> <?= $row['continent']?></td>
        <td> <?= $row['independence_year']?></td>
        <td> <?= $row['head_of_state']?></td>
      </tr>

  <?php endforeach; ?>

<?php }
else if ($city=='cities'){ ?>
    <table>
      <tr>
        <th>Name</th>
        <th>District</th>
        <th>Population</th>
      </tr>

  <?php foreach ($results as $row): ?>
<!-- input in the data -->
      <tr>
        <td> <?= $row['name']?></td>
        <td> <?= $row['district']?></td>
        <td> <?= $row['population']?></td>
      </tr>

  <?php endforeach; ?>

<?php }?>
  </table>