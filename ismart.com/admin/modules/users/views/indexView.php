<?php
get_header();
?>

<div id="content">
    <h1>Thành viên</h1>
    <table>
        <thead>
        <tr>
            <td>STT</td>
            <td>Tên</td>
            <td>Email</td>
            <td>Tuổi</td>
            <td>Thu nhập</td>
        </tr>

        </thead>
        <tbody>
        <?php
        if (!empty($list_users)) {
            $t = 0;
            foreach ($list_users as $user) {
                $t++;
                ?>
                <tr>
                    <td><?=$t?></td>
                    <td><?=$user['fullname']?></td>
                    <td><?=$user['email']?></td>
                    <td><?=$user['age']?></td>
                    <td><?=currency_format( $user['earn'], ' USD')?></td>
                </tr>

                <?php
            }
        }
        ?>

        </tbody>
    </table>
</div>
<?php get_footer();?>

