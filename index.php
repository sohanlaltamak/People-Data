<!doctype html>
<html lang="en">
  <head>
    <title>People Data</title>
	<link href="css/style.css" rel="stylesheet">
  </head>
  <body>
  <?php 
if (isset($_GET['pageno'])) {
	$pageno = $_GET['pageno'];
} else {
	$pageno = 1;
}
$no_of_records_per_page = 3;
$offset = ($pageno-1) * $no_of_records_per_page;
$filedata = file_get_contents('data.json');
$data = json_decode($filedata);
$details = array_slice($data, $offset, 3);
if (empty($details)) {
	?>
	<script>
		alert('No more people!');
	</script>
	<?php
}
?>
	<table align="center" class="main-table">
		<tr>
			<td class="heading">PEOPLE DATA</td>
			<td><a href="index.php?pageno=<?=$pageno+1?>" id="button">NEXT PERSON</a></td>
		</tr>
		<?php foreach($details as $key => $detail){ ?>
	   <tr>
		<table align="center" class="sub-table">
			<tr>
				<td class="count" rowspan= "2"><?= $key+1  ?></td>
				<td class="name">Name: <?= $detail->name ?></td>
			</tr>
			<tr>
				<td class="location">Location: <?= $detail->location ?></td>
			</tr>
		</table>
	   </tr>
	   <?php } ?>
	   <tr>
		<td><p class="footer">CURRENTLY 3 PEOPLE SHOWING</p></td>
	   </tr>
	</table>
  </body>
</html>