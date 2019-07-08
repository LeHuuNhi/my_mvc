
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Birthdate</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>


            <?php
            $rows = $this->list;
            if(count($rows)):
                foreach ($rows as $row) :
                    ?>
                    <tr>
                        <th scope="row"><?=$row['student_id'] ?></th>
                        <td><?=$row['student_name'] ?></td>
                        <td><?=$row['student_birthdate'] ?></td>
                        <td>
                            <button type="button" class="btn btn-outline-secondary"><a href="detail?id=<?= $row['student_id'] ?>">Detail</a></button>

                            <form action="update" method="post">
                                <input type="hidden" name="id" value="<?= $row['student_id'] ?>">
                                <input type="hidden" name="name" value="<?= $row['student_name'] ?>">
                                <input type="hidden" name="birthdate" value="<?= $row['student_birthdate'] ?>">
                                <button type="submit" class="btn btn-outline-secondary" name="submitUpdate">Update</button>
                            </form>

                            <form action="postDelete" method="post"
                                  onsubmit="return confirm('Do you really want to delete this student?');">
                                <input type="hidden" name="deleteFlag">
                                <input type="hidden" name="id" value="<?= $row['student_id'] ?>">
                                <button type="submit" name="submitDelete"  class="btn btn-outline-secondary">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>
