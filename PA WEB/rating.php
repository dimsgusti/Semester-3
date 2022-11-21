<?php
  include 'admin/functions.php';
  $pdo = pdo_connect_mysql();
  $msg = '';
  if (!empty($_POST)) {
      $id = htmlspecialchars(isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL);
      $rating = htmlspecialchars(isset($_POST['rating']) ? $_POST['rating'] : '');
      $ulasan = htmlspecialchars(isset($_POST['ulasan']) ? $_POST['ulasan'] : '');

      $stmt = $pdo->prepare('INSERT INTO rating VALUES (?, ?, ?)');
      $stmt->execute([$id, $rating, $ulasan]);
      $msg = 'Created Successfully!';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link href="rating.css" rel="stylesheet" type="text/css">
	<title>Form Reviews</title>
</head>
<body>
		<form action="rating.php" method="post">
      <div class="wrapper">
        <h1>Rating & Ulasan </h1>
          <fieldset class="rating">
              <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
              <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
              <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
              <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
              <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
              <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
              <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
              <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
              <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
              <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label><br>
          </fieldset><br><br>
          <div class="ulasan">
            <textarea name="ulasan" id="ulasan" placeholder="Ulasan..."></textarea><br>
          </div>
          <div class="btn-group">
            <button type="submit" class="btn submit">Submit</button>
			      <a class="btn cancel" href="index.php">Cancel</a>
          </div>
      </div>
    </form>
    <?php if ($msg): header('Location: index.php'); ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</body>
</html>