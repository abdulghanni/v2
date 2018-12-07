<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Menu</th>
            <th>Otoritas</th>
        </tr>
    </thead>
    <tbody>
    <?php $i=0;foreach ($data as $r) {?>
        <tr>
            <td><?=$i++?></td>
            <td><?=$r->title?></td>
            <td><input type="checkbox" class="checkbox"/></td>
        </tr>
    </tbody>
</table>