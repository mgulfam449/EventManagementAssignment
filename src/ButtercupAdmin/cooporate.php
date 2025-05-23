<?php
session_start();

if (!isset($_SESSION['admin_username'])) {
    header("Location: ../adminlogin/adminlogin.php");
    exit();
}

// DB connection
$conn = new mysqli('db', 'eventuser', 'eventpass', 'eventdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cooperate events
$sql = "SELECT * FROM cop_event ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cooperate Events Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">ButterCup</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Wedding</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="party.php">Party</a></li>
                    <li class="nav-item"><a class="nav-link" href="cooporate.php">Cooperate</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Cooperate Events</h2>

        <button id="btnAddNew" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
            <span class="material-icons align-middle">add</span> Add New
        </button>

        <table class="table table-bordered" id="cooperateTable">
            <thead class="table-primary">
                <tr>
                    <th>Name</th>
                    <th>Contact#</th>
                    <th>Venue</th>
                    <th>Meal</th>
                    <th>Stage Decoration</th>
                    <th>No. of People</th>
                    <th>Meal Package</th>
                    <th>Date</th>
                    <th style="min-width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr data-id="<?php echo $row['id']; ?>">
                        <td class="cname"><?php echo htmlspecialchars($row['cname']); ?></td>
                        <td class="phoneno"><?php echo htmlspecialchars($row['phoneno']); ?></td>
                        <td class="venu_type"><?php echo htmlspecialchars($row['venu_type']); ?></td>
                        <td class="meal_type"><?php echo htmlspecialchars($row['meal_type']); ?></td>
                        <td class="stage_deco"><?php echo htmlspecialchars($row['stage_deco']); ?></td>
                        <td class="no_ppl"><?php echo (int)$row['no_ppl']; ?></td>
                        <td class="meal_pkg"><?php echo htmlspecialchars($row['meal_pkg']); ?></td>
                        <td class="date"><?php echo htmlspecialchars($row['date']); ?></td>
                        <td>
                            <a href="#" class="edit text-primary me-3" title="Edit">
                                <span class="material-icons" style="cursor:pointer;">edit</span>
                            </a>
                            <a href="#" class="delete text-danger" title="Delete">
                                <span class="material-icons" style="cursor:pointer;">delete</span>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form id="addForm">
          <div class="modal-content">
            <div class="modal-header bg-success text-white">
              <h5 class="modal-title" id="addModalLabel">Add New Cooperate Event</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="addCname" class="form-label">Name</label>
                    <input type="text" class="form-control" id="addCname" name="cname" required>
                </div>
                <div class="mb-3">
                    <label for="addPhoneno" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="addPhoneno" name="phoneno" required>
                </div>
                <div class="mb-3">
                    <label for="addVenuType" class="form-label">Venue Type</label>
                    <select name="venu_type" id="addVenuType" class="form-select" required>
                      <option value="">Select Venue</option>
                      <option value="Indoor">Indoor</option>
                      <option value="Outdoor">Outdoor</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="addMealType" class="form-label">Meal Type</label>
                    <select name="meal_type" id="addMealType" class="form-select" required>
                      <option value="">Select Meal Type</option>
                      <option value="Breakfast">Breakfast</option>
                      <option value="Lunch">Lunch</option>
                      <option value="Dinner">Dinner</option>
                      <option value="Break Fast">Break Fast</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="addStageDeco" class="form-label">Stage Decoration</label>
                    <select name="stage_deco" id="addStageDeco" class="form-select" required>
                      <option value="">Select Stage Decoration</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="addNoPpl" class="form-label">Number of People</label>
                    <input type="number" class="form-control" id="addNoPpl" name="no_ppl" required min="1">
                </div>
                <div class="mb-3">
                    <label for="addMealPkg" class="form-label">Meal Package</label>
                    <select name="meal_pkg" id="addMealPkg" class="form-select" required>
                      <option value="">Select Meal Package</option>
                      <option value="Standard">Standard</option>
                      <option value="Special">Special</option>
                      <option value="Premium">Premium</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="addDate" class="form-label">Date</label>
                    <input type="date" class="form-control" id="addDate" name="date" required>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success">Add Record</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form id="editForm">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <h5 class="modal-title" id="editModalLabel">Edit Cooperate Event</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="editId" name="id">

                <div class="mb-3">
                    <label for="editCname" class="form-label">Name</label>
                    <input type="text" class="form-control" id="editCname" name="cname" required>
                </div>
                <div class="mb-3">
                    <label for="editPhoneno" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="editPhoneno" name="phoneno" required>
                </div>
                <div class="mb-3">
                    <label for="editVenuType" class="form-label">Venue Type</label>
                    <select name="venu_type" id="editVenuType" class="form-select" required>
                      <option value="">Select Venue</option>
                      <option value="Indoor">Indoor</option>
                      <option value="Outdoor">Outdoor</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="editMealType" class="form-label">Meal Type</label>
                    <select name="meal_type" id="editMealType" class="form-select" required>
                      <option value="">Select Meal Type</option>
                      <option value="Breakfast">Breakfast</option>
                      <option value="Lunch">Lunch</option>
                      <option value="Dinner">Dinner</option>
                      <option value="Break Fast">Break Fast</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="editStageDeco" class="form-label">Stage Decoration</label>
                    <select name="stage_deco" id="editStageDeco" class="form-select" required>
                      <option value="">Select Stage Decoration</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="editNoPpl" class="form-label">Number of People</label>
                    <input type="number" class="form-control" id="editNoPpl" name="no_ppl" required min="1">
                </div>
                <div class="mb-3">
                    <label for="editMealPkg" class="form-label">Meal Package</label>
                    <select name="meal_pkg" id="editMealPkg" class="form-select" required>
                      <option value="">Select Meal Package</option>
                      <option value="Standard">Standard</option>
                      <option value="Special">Special</option>
                      <option value="Premium">Premium</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="editDate" class="form-label">Date</label>
                    <input type="date" class="form-control" id="editDate" name="date" required>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

            // Delete event
            $('.delete').click(function (e) {
                e.preventDefault();
                const row = $(this).closest('tr');
                const id = row.data('id');

                Swal.fire({
                    title: 'Are you sure you want to delete this record?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post('cooperate_delete.php', { id: id }, function (response) {
                            if (response.trim() === 'success') {
                                Swal.fire('Deleted!', 'Record deleted successfully.', 'success');
                                row.remove();
                            } else {
                                Swal.fire('Error!', 'Failed to delete record.', 'error');
                            }
                        }).fail(() => {
                            Swal.fire('Error!', 'Request failed.', 'error');
                        });
                    }
                });
            });

            // Add new record form submit
            $('#addForm').submit(function (e) {
                e.preventDefault();

                const formData = $(this).serialize();

                $.post('cooperate_insert.php', formData, function (response) {
                    if (response.trim() === 'success') {
                        Swal.fire('Added!', 'Record added successfully.', 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error!', 'Failed to add record.', 'error');
                    }
                }).fail(() => {
                    Swal.fire('Error!', 'Request failed.', 'error');
                });
            });

            // Open edit modal and populate form
            $('.edit').click(function (e) {
                e.preventDefault();
                const row = $(this).closest('tr');

                $('#editId').val(row.data('id'));
                $('#editCname').val(row.find('.cname').text());
                $('#editPhoneno').val(row.find('.phoneno').text());
                $('#editVenuType').val(row.find('.venu_type').text());
                $('#editMealType').val(row.find('.meal_type').text());
                $('#editStageDeco').val(row.find('.stage_deco').text());
                $('#editNoPpl').val(row.find('.no_ppl').text());
                $('#editMealPkg').val(row.find('.meal_pkg').text());
                $('#editDate').val(row.find('.date').text());

                $('#editModal').modal('show');
            });

            // Edit form submit
            $('#editForm').submit(function (e) {
                e.preventDefault();

                const formData = $(this).serialize();

                $.post('cooperate_update.php', formData, function (response) {
                    if (response.trim().startsWith('success')) {
                        Swal.fire('Success!', 'Record updated successfully.', 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error!', 'Failed to update record.', 'error');
                    }
                }).fail(() => {
                    Swal.fire('Error!', 'Request failed.', 'error');
                });
            });

        });
    </script>

</body>

</html>
