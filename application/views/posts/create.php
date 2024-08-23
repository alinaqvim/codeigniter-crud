<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/create'); ?>
	<div class="form-group">
		<label for="exampleFormControlInput1">Title</label>
		<input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Add Title">
	</div>
	<div class="form-group">
		<label for="exampleFormControlTextarea1">Enter Description</label>
		<textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3">Description...</textarea>
	</div>
	<button type="submit" class="btn btn-primary m-3">Submit</button>
</form>
