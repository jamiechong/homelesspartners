
<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
            <h2>View Shelters</h2>

            <ul class="breadcrumb">
                <li>Shelter Management</li>
                <li class='active'>View Shelters</li>
            </ul>

            <p class='text-right'>
                <a href='<?php echo $this->createUrl("shelter/edit") ?>' class='btn btn-warning'>+ Create new</a>
            </p>
            <table class='table'>
                <?php foreach($shelters as $shelter): ?>
                <tr>
                    <td><?php echo $shelter->shelter_id ?></td>
                    <td><?php echo $shelter->name ?></td>
                    <td><a class='btn btn-info btn-xs' href='<?php echo $this->createUrl("shelter/edit", array('id' => $shelter->shelter_id)) ?>'>Edit</a>
                        <a class='btn btn-danger btn-xs' href='<?php echo $this->createUrl("shelter/delete", array('id' => $shelter->shelter_id)) ?>' onclick='return confirm("Deleting this shelter will delete all the stories that belong to this shelter. Continue?");'>Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>