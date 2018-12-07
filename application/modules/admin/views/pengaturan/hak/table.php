<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Menu</th>
            <th>Otoritas</th>
        </tr>
    </thead>
    <tbody>
    <?php $i=1;foreach ($data->result() as $r) {?>
        <tr>
            <td><?=$i++?></td>
            <td><?=$r->title?></td>
            <td>
                <?php 
                $f = array('menu_id'=>'where/'.$r->id, 'user_id'=>'where/'.$user_id);
                $num = getValue('view', 'users_permission', $f);
                ?>
                <input onclick="updatePermission('<?=$r->id?>', '<?=$user_id?>')" type="checkbox" class="checkbox" <?=($num == 1) ? 'checked="checked"' : '';?>/>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script>
    
</script>