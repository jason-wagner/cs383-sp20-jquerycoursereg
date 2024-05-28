<?php
require_once('mysql.php');
$conn = new mysqli($host, $user, $pass, $name);
$query = $conn->query("SELECT * FROM `courses` ORDER BY `sub`, `num`, `sec`");
?><!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<title>Course Registration</title>
	</head>
	<body>
		<div class="container">
			<h1>Course Registration</h1>
			<div class="row mb-4">
				<div class="col-6">
					<div class="card border-primary">
						<div class="card-header bg-primary text-white">My Courses</div>
						<div class="card-body" style="height: 180px;">
							<form action="submit.php" method="post">
								<div id="currentCourses">
									
								</div>
								<button type="submit" class="btn btn-primary">Register!</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="card border-primary">
						<div class="card-header bg-primary text-white">Filter by Delivery Mode</div>
						<div class="card-body" style="height: 180px;">
							<form>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="delivery" value="all" id="showDelAll" checked>
									<label class="form-check-label" for="showDelAll">Show delivery modes</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="delivery" value="F2F" id="showDelF2F">
									<label class="form-check-label" for="showDelF2F">Face-to-face</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="delivery" value="WEB" id="showDelWEB">
									<label class="form-check-label" for="showDelWEB">Online</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="delivery" value="HYB" id="showDelHYB">
									<label class="form-check-label" for="showDelHYB">Hybrid</label>
								</div>								
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive" style="max-height: 400px;">
				<table class="table table-sm table-bordered table-dark table-bordered table-striped table-hover">
					<thead>
						<tr class="bg-primary text-white">
							<th>CRN</th>
							<th>Course</th>
							<th>Sec.</th>
							<th>Title</th>
							<th>Delivery</th>
							<th>Credits</th>
							<th>ACTION</th>
						</tr>
					</thead>
					<tbody>
	<?php while($course = $query->fetch_assoc()): ?>				
						<tr class="delivery-<?= $course['delivery'] ?>" id="course-<?= $course['crn'] ?>">
							<td><?= $course['crn'] ?></td>
							<td><?= $course['sub'] ?> <?= $course['num'] ?></td>
							<td><?= $course['sec'] ?></td>
							<td><?= $course['title'] ?></td>
							<td><?= $course['delivery'] ?></td>
							<td><?= $course['credits'] ?></td>
							<td><a class="btn p-0 btn-link add-class" id="add-button-<?= $course['crn'] ?>" data-course="<?= $course['sub'] ?> <?= $course['num'] ?> <?= $course['sec'] ?>" data-crn="<?= $course['crn'] ?>">Add</a><a class="btn p-0 btn-link remove-class d-none" id="remove-button-<?= $course['crn'] ?>" data-course="<?= $course['sub'] ?> <?= $course['num'] ?> <?= $course['sec'] ?>" data-crn="<?= $course['crn'] ?>">Remove</a></td>
						</tr>
	<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script src="courses.js"></script>
	</body>
</html>