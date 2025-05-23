<?php
session_start();

if (!isset($_SESSION['admin_username'])) {
    header("Location: ../adminlogin/adminlogin.php");
    exit();
}

$conn = new mysqli('db', 'eventuser', 'eventpass', 'eventdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Add New Record
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addRecord'])) {
    $name = trim($_POST['name'] ?? '');
    $phone_no = trim($_POST['phone_no'] ?? '');
    $venu_type = trim($_POST['venu_type'] ?? '');
    $meal_type = trim($_POST['meal_type'] ?? '');
    $select_deco = trim($_POST['select_deco'] ?? '');
    $people_no = intval($_POST['people_no'] ?? 0);
    $meal_pkg = trim($_POST['meal_pkg'] ?? '');
    $time = trim($_POST['time'] ?? '');
    $date = trim($_POST['date'] ?? '');
    $status = 'pending';
    $username = $_SESSION['username'] ?? 'unknown';

    $stmt = $conn->prepare("INSERT INTO party_type (name, phone_no, venu_type, meal_type, select_deco, people_no, meal_pkg, time, date, status, username) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssisssss", $name, $phone_no, $venu_type, $meal_type, $select_deco, $people_no, $meal_pkg, $time, $date, $status, $username);
    $stmt->execute();
    $stmt->close();

    $_SESSION['success_message'] = "Record added successfully.";
    header("Location: party.php");
    exit();
}

// Handle Update Record
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateRecord'])) {
    $id = intval($_POST['id'] ?? 0);
    $name = trim($_POST['name'] ?? '');
    $phone_no = trim($_POST['phone_no'] ?? '');
    $venu_type = trim($_POST['venu_type'] ?? '');
    $meal_type = trim($_POST['meal_type'] ?? '');
    $select_deco = trim($_POST['select_deco'] ?? '');
    $people_no = intval($_POST['people_no'] ?? 0);
    $meal_pkg = trim($_POST['meal_pkg'] ?? '');
    $time = trim($_POST['time'] ?? '');
    $date = trim($_POST['date'] ?? '');

    $stmt = $conn->prepare("UPDATE party_type SET name=?, phone_no=?, venu_type=?, meal_type=?, select_deco=?, people_no=?, meal_pkg=?, time=?, date=? WHERE id=?");
    $stmt->bind_param("sssssisssi", $name, $phone_no, $venu_type, $meal_type, $select_deco, $people_no, $meal_pkg, $time, $date, $id);
    $stmt->execute();
    $stmt->close();

    $_SESSION['success_message'] = "Record updated successfully.";
    header("Location: party.php");
    exit();
}

$sql = "SELECT * FROM party_type ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Party Events Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
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
    <h2>Party Events</h2>

    <!-- Add Button -->
    <button id="btnAddNew" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal" style="font-weight: 600;">
      <span class="material-icons align-middle">add</span> Add New
    </button>

    <table class="table table-bordered" id="partyTable">
      <thead class="table-primary">
        <tr>
          <th>Name</th>
          <th>Contact#</th>
          <th>Party Type</th>
          <th>Meal</th>
          <th>Stage Decoration</th>
          <th>No. of People</th>
          <th>Meal Package</th>
          <th>Time</th>
          <th>Date</th>
          <th style="min-width: 120px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
          <tr data-id="<?= (int)$row['id'] ?>">
            <td class="name"><?= htmlspecialchars($row['name']) ?></td>
            <td class="phone_no"><?= htmlspecialchars($row['phone_no']) ?></td>
            <td class="venu_type"><?= htmlspecialchars($row['venu_type']) ?></td>
            <td class="meal_type"><?= htmlspecialchars($row['meal_type']) ?></td>
            <td class="select_deco"><?= htmlspecialchars($row['select_deco']) ?></td>
            <td class="people_no"><?= (int)$row['people_no'] ?></td>
            <td class="meal_pkg"><?= htmlspecialchars($row['meal_pkg']) ?></td>
            <td class="time"><?= htmlspecialchars($row['time']) ?></td>
            <td class="date"><?= htmlspecialchars($row['date']) ?></td>
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
      <form method="post" class="modal-content">
        <input type="hidden" name="addRecord" value="1" />
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Add New Party Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" name="name" class="form-control mb-3" placeholder="Name" required />
          <input type="text" name="phone_no" class="form-control mb-3" placeholder="Contact #" required />
          <select name="venu_type" class="form-select mb-3" required>
            <option value="">Select Party Type</option>
            <option value="Birthday Party">Birthday Party</option>
            <option value="Wedding">Wedding</option>
            <option value="Corporate">Corporate</option>
          </select>
          <select name="meal_type" class="form-select mb-3" required>
            <option value="">Select Meal Type</option>
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
            <option value="Break Fast">Break Fast</option>
          </select>
          <select name="select_deco" class="form-select mb-3" required>
            <option value="">Select Stage Decoration</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
          <input type="number" name="people_no" class="form-control mb-3" placeholder="No. of People" min="1" required />
          <select name="meal_pkg" class="form-select mb-3" required>
            <option value="">Select Meal Package</option>
            <option value="Standard">Standard</option>
            <option value="Special">Special</option>
            <option value="Premium">Premium</option>
          </select>
          <input type="time" name="time" class="form-control mb-3" required />
          <input type="date" name="date" class="form-control mb-3" required />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add Record</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="post" class="modal-content">
        <input type="hidden" name="updateRecord" value="1" />
        <input type="hidden" name="id" id="editId" />
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Party Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" name="name" id="editName" class="form-control mb-3" placeholder="Name" required />
          <input type="text" name="phone_no" id="editPhone" class="form-control mb-3" placeholder="Contact #" required />
          <select name="venu_type" id="editVenuType" class="form-select mb-3" required>
            <option value="">Select Party Type</option>
            <option value="Birthday Party">Birthday Party</option>
            <option value="Wedding">Wedding</option>
            <option value="Corporate">Corporate</option>
          </select>
          <select name="meal_type" id="editMealType" class="form-select mb-3" required>
            <option value="">Select Meal Type</option>
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
            <option value="Break Fast">Break Fast</option>
          </select>
          <select name="select_deco" id="editStageDeco" class="form-select mb-3" required>
            <option value="">Select Stage Decoration</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
          <input type="number" name="people_no" id="editPeopleNo" class="form-control mb-3" placeholder="No. of People" min="1" required />
          <select name="meal_pkg" id="editMealPkg" class="form-select mb-3" required>
            <option value="">Select Meal Package</option>
            <option value="Standard">Standard</option>
            <option value="Special">Special</option>
            <option value="Premium">Premium</option>
          </select>
          <input type="time" name="time" id="editTime" class="form-control mb-3" required />
          <input type="date" name="date" id="editDate" class="form-control mb-3" required />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function(){
      <?php if (isset($_SESSION['success_message'])): ?>
        Swal.fire('Success!', '<?= $_SESSION['success_message'] ?>', 'success');
      <?php
        unset($_SESSION['success_message']);
        endif;
      ?>

      // Delete button handler
      $('.delete').click(function(e){
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
          if(result.isConfirmed) {
            $.post('party_delete.php', {id: id}, function(response){
              if(response.trim() === 'success'){
                Swal.fire('Deleted!', 'Record deleted successfully.', 'success').then(() => {
                  location.reload();
                });
              } else {
                Swal.fire('Error!', 'Failed to delete record.', 'error');
              }
            }).fail(() => {
              Swal.fire('Error!', 'Request failed.', 'error');
            });
          }
        });
      });

      // Edit button handler: populate modal and show
      $('.edit').click(function(e){
        e.preventDefault();
        const row = $(this).closest('tr');

        $('#editId').val(row.data('id'));
        $('#editName').val(row.find('.name').text());
        $('#editPhone').val(row.find('.phone_no').text());
        $('#editVenuType').val(row.find('.venu_type').text());
        $('#editMealType').val(row.find('.meal_type').text());
        $('#editStageDeco').val(row.find('.select_deco').text());
        $('#editPeopleNo').val(row.find('.people_no').text());
        $('#editMealPkg').val(row.find('.meal_pkg').text());
        $('#editTime').val(row.find('.time').text());
        $('#editDate').val(row.find('.date').text());

        var editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
      });
    });
  </script>

</body>
</html>
