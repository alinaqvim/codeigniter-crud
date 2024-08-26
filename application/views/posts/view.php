<h2><?php echo $post['title'] ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at'];?></small>
<div class="post-body">
	<?php echo $post['body'] ?>
</div>
<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
<hr>
<?php echo form_open('/posts/delete/'.$post['id']); ?>
	<input type="submit" value="Delete" class="btn btn-danger">
</form>
<a href="/posts/edit/<?php echo $post['slug'] ?>" class="btn btn-warning">Edit</a>
<?php endif; ?>