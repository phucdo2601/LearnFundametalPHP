<?php include 'inc/header.php'; ?>

<?php
$sqlQuery = 'SELECT * FROM feedback';
$result = mysqli_query($conn, $sqlQuery);
$feedbacks = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<h2>Feedback</h2>

<!-- <div class="card my-3">
  <div class="card-body">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta molestias animi earum eos dolorem repellat a quibusdam, aperiam vero repellendus voluptatibus natus deserunt sed doloribus inventore, totam labore maxime perferendis!
  </div>
</div>

<div class="card my-3">
  <div class="card-body">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta molestias animi earum eos dolorem repellat a quibusdam, aperiam vero repellendus voluptatibus natus deserunt sed doloribus inventore, totam labore maxime perferendis!
  </div>
</div>

<div class="card my-3">
  <div class="card-body">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta molestias animi earum eos dolorem repellat a quibusdam, aperiam vero repellendus voluptatibus natus deserunt sed doloribus inventore, totam labore maxime perferendis!
  </div>
</div> -->

<?php if (empty($feedbacks)) : ?>
  <p class="lead mt-3">There is no feedback</p>
<?php endif; ?>

<?php foreach ($feedbacks as $key => $item) : ?>
  <div class="card my-3 w-75">
    <div class="card-body text-center">
      <?php echo $item['body']; ?>
      <div class="text-secondary mt-2">
        By <?php echo $item['name']; ?> on <?php echo date_format(date_create($item['date']),  'g:ia \o\n l jS F Y') ;?>
      </div>
    </div>
  </div>

<?php endforeach; ?>

<?php include 'inc/footer.php'; ?>