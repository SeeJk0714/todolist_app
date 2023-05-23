<?php
    $todolist = [];

    $database = connectToDB();

    $sql = 'SELECT * FROM todolist';
    $query = $database->prepare($sql);
    $query->execute();
    $todolist = $query->fetchAll();

  require "parts/header.php";
?>


    <div
      class="card rounded shadow-sm"
      style="max-width: 500px; margin: 60px auto;"
    >
      <div class="card-body">
        <h3 class="card-title mb-3">My Todo List</h3>
          <div class="d-flex gap-3">
            
          </div>
        <?php if ( isset( $_SESSION["user"] ) ) { ?>
          <ul class="list-group">
            <?php foreach ($todolist as $todos) { ?>
                <li
                class="list-group-item d-flex justify-content-between align-items-center"
              >
                <div>
                  <form method="POST" action="/task/update">
                    <input 
                      type="hidden"
                      name="task_completed"
                      value="<?= $todos["completed"];?>"
                    />
                    <input 
                      type="hidden"
                      name="task_id"
                      value="<?= $todos["id"]; ?>"
                    />
                    <?php 
                      if($todos["completed"] == 1) {
                        echo '<button class="btn btn-sm btn-success">'.'<i class="bi bi-check-square"></i>'.'</button>'.'<span class="ms-2 text-decoration-line-through">'.$todos["task"].'</span>';
                      }else{
                        echo'<button class="btn btn-sm btn-light">'.'<i class="bi bi-square"></i>'.'</button>'.'<span class="ms-2">'.$todos["task"].'</span>';
                      }
                    ?>  
                  </form>
                </div>
                <div>
                  <form method="POST" action="/task/delete">
                    <input 
                      type="hidden" 
                      name="task_id"
                      value="<?=$todos["id"];?>"
                    />
                    <button class="btn btn-sm btn-danger">
                      <i class="bi bi-trash"></i>
                    </button>
                  </form>
                </div>
              </li>
            <?php } ?>
          </ul>
          <div class="mt-4">
            <?php require "parts/message_error.php"; ?>
            <form method="POST" action="/task/add" class="d-flex justify-content-between align-items-center">
              <input
                type="text"
                class="form-control"
                placeholder="Add new item..."
                name="task_name"
              />
              <button class="btn btn-primary btn-sm rounded ms-2">Add</button>
            </form>
          </div>
          <div class="d-flex justify-content-center mt-3">
            <a href="/logout" >Logout</a>
          </div>
        <?php } else{ ?>
          <div class="d-flex gap-3">
            <a href="/login">Login</a>
            <a href="/signup">Sign Up</a>
          </div>        
        <?php } ?>
      </div>
    </div>
<?php
  require "parts/footer.php";
