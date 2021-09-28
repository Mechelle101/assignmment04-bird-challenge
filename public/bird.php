<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <div id="page">
    <div class="intro">
      <img class="inset" src="<?php echo url_for('images/tufted-titmouse.jpg') ?>" />
      <h2>A list of WNC birds and their information</h2>
      <p>For PHP OOP practice</p>
    </div>

    <table id="inventory">
      <tr>
        <th>Common Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Nest Placement</th>
        <th>Behavior</th>
        <th>Conservation ID</th>
        <th>Backyard Tips</th>
      </tr>

      <?php

      $parser = new ParseCSV(PRIVATE_PATH . '/wnc-birds.csv');
      $bird_array = $parser->parse();

      ?>

      <!-- Loop through the table data -->
      <?php foreach($bird_array as $args) { ?>
      <?php $bird = new Bird($args); ?>
      <tr>
        <td><?php echo h($bird->common_name); ?></td>
        <td><?php echo h($bird->habitat); ?></td>
        <td><?php echo h($bird->food); ?></td>
        <td><?php echo h($bird->nest_placement); ?></td>
        <td><?php echo h($bird->behavior); ?></td>
        <td><?php echo h($bird->conservation_level()); ?></td>
        <td><?php echo h($bird->food); ?></td>
      </tr>
      <?php } ?>
    </table>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
