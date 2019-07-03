<?php require "view/header.php";?>

    <form class="form-inline" method="post" action="postUpdate"
          onsubmit="return confirm('Do you really want to update the form?');">
        <input type="hidden" class="form-control" id="inputId" name="inputId" value=<?= $this->studentId?>>
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputName" class="sr-only">Name</label>
            <input type="text" class="form-control" id="inputName" name="inputName" value=<?= $this->studentName?>>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputBirthdate" class="sr-only">Age</label>
            <input type="text" class="form-control" id="inputBirthdate" name="inputBirthdate" value=<?= $this->studentBd?>>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Update Student</button>
    </form>

<?php require "view/footer.php";?>