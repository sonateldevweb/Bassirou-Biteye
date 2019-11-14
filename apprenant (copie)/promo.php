	

	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse User</strong> <a href="add-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Users</a></div>

			<div class="card-body">

				
				<div class="col-sm-12">

					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find User</h5>

					<form method="get">

						<div class="row">

							<div class="col-sm-2">

								<div class="form-group">

									<label>User Name</label>

									<input type="text" name="username" id="username" class="form-control" value="" placeholder="Enter user name">

								</div>

							</div>

							<div class="col-sm-2">

								<div class="form-group">

									<label>User Email</label>

									<input type="email" name="useremail" id="useremail" class="form-control" value="" placeholder="Enter user email">

								</div>

							</div>

							<div class="col-sm-2">

								<div class="form-group">

									<label>User Phone</label>

									<input type="tel" class="tel form-control" name="userphone" id="userphone" x-autocompletetype="tel" value="" placeholder="Enter user phone">

								</div>

							</div>

							<div class="col-sm-4">

								<div class="form-group">

									<label>&nbsp;</label>

									<div>

										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>

										<a href="/demo/php/php-crud-in-bootstrap-4-with-search-functionality/browse-users.php" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>

									</div>

								</div>

							</div>

						</div>

					</form>

				</div>

			</div>

        </div>
        <div>

			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th>Sr#</th>
						<th>User Name</th>
						<th>User Email</th>
						<th>User Phone</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
										<tr>
						<td>1</td>
						<td>Daenerys Targaryen</td>
						<td>dracarys@kingslanding.com</td>
						<td>(092) 982-0113</td>
						<td align="center">
							<a href="edit-users.php?editId=282" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
							<a href="delete.php?delId=282" class="text-danger" onclick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
						</td>

					</tr>
									</tbody>
			</table>
        </div>
        <div class="container">

		<h1><a href="https://learncodeweb.com/php/php-crud-in-bootstrap-4-with-search-functionality/">PHP CRUD in Bootstrap 4 with search functionality</a></h1>

		
		<div class="card">

			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add User</strong> <a href="browse-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>

			<div class="card-body">

				

				<div class="col-sm-6">

					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>

					<form method="post">

						<div class="form-group">

							<label>User Name <span class="text-danger">*</span></label>

							<input type="text" name="username" id="username" class="form-control" placeholder="Enter user name" required="">

						</div>

						<div class="form-group">

							<label>User Email <span class="text-danger">*</span></label>

							<input type="email" name="useremail" id="useremail" class="form-control" placeholder="Enter user email" required="">

						</div>

						<div class="form-group">

							<label>User Phone <span class="text-danger">*</span></label>

							<input type="tel" pattern=".{14,14}" title="Accept US Number format (888) 888-8888" class="tel form-control" name="userphone" id="userphone" x-autocompletetype="tel" placeholder="Enter user phone" required="">

						</div>

						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add User</button>

						</div>

					</form>

				</div>

			</div>

		</div>

    </div>
    