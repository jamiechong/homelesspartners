
<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
            <h2>Explore</h2>
            
            <table class='table'>
                <?php foreach($shelters as $shelter): ?>
                <tr>
                    <td><?php echo $shelter['scount'] ?></td>
                    <td><?php echo $shelter['name'] ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>