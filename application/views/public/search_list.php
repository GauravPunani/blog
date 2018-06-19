<?php include 'public_header.php';?>

<div class="container">
  <h1>Search Result</h1>
  <hr>
  <table class="table">
    <thead>
      <tr>
        <td>Sr.No.</td>
        <td>Title</td>
        <td>Published on</td>
      </tr>
    </thead>
    <tbody>

        <?php if(count($articles)): ?>
          <?php $count=$this->uri->segment(4,0); ?>
          <?php foreach ($articles as $article): ?>
      <tr>
        <td><?= ++$count; ?></td>
        <td><?= anchor("users/article/{$article->id}",$article->title);  ?></td>
        <td><?= date('d M-y h:i',strtotime($article->created_at));  ?></td>
      </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="3">No Record Found</td>
      </tr>
    <?php endif; ?>
    </tbody>
  </table>
  <?= $this->pagination->create_links(); ?>
</div>

<?php include 'public_footer.php'; ?>