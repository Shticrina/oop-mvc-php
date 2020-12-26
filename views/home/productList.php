<?php
// var_dump($data['products']);
?>

<!-- HTML content -->
<?php include('./views/layouts/master.php'); ?>
<?php include('./views/layouts/header.php'); ?>

<section id="homepage" class="container mx-auto row py-5">
    <div class="col-lg-4 col-sm-8 mx-auto text-center mb-4">
	    <h3 class="text-center">All Products</h3>
	    <hr class="bg-info">
	</div>

	<div class="col-12 text-right mb-4">
		<a href="" class="btn btn-info">add new product</a>
	</div>

	<div class="col-12">
		<?php if (isset($data['products']) && count($data['products']) > 0) { ?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Description</th>
						<th>Price</th>
						<th>Category</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach($data['products'] as $product) { ?>
						<tr>
							<td><?php echo $product['id'] ?></td>
							<td><?php echo $product['name'] ?></td>
							<td><?php echo $product['description'] ?></td>
							<td class="text-center"><?php echo $product['price'] ?> &euro;</td>
							<td class="text-center"><?php echo $product['category_name'] ?></td>
							<td>
								<a href="product/show/<?php echo $product['id'] ?>" class="px-2">
									<i class="fa fa-eye text-darkred" aria-hidden="true"></i>
								</a>

								<a href="product/edit/<?php echo $product['id'] ?>" class="px-2">
									<i class="fa fa-pencil text-info" aria-hidden="true"></i>
								</a>

								<a href="product/delete/<?php echo $product['id'] ?>" class="px-2" onclick="confirm('Are you sure want to delete this record')">
									<i class="fa fa-trash text-danger" aria-hidden="true"></i>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } else { ?>
			<p>No products!</p>
		<?php } ?>
	</div>

	<div class="col-12">
		<?php include('./views/layouts/pagination.php'); ?>
	</div>
</section>

<?php include('./views/layouts/footer.php'); ?>
<!-- end HTML content -->