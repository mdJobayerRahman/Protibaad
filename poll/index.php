<?php include '../includes/connection.php'; ?>

<?php

include 'functions.php';
session_start();

$pdo = pdo_connect_mysql();

$stmt = $pdo->query('SELECT p.*, GROUP_CONCAT(pa.title ORDER BY pa.id) AS answers FROM polls p LEFT JOIN poll_answers pa ON pa.poll_id = p.id GROUP BY p.id');
$polls = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php include('../include_2/user_header_2.php') ?>
<?php include('../include_2/user_navbar_2.php') ?>

<div class="content home">
    <h2>Polls</h2>
    <?php if ($_SESSION["role"] == 'admin') { ?>
        <a href="create.php" class="create-poll">Create Poll</a>
    <?php } ?>
    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Answers</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($polls as $poll) : ?>
                <tr>
                    <td><?= $poll['id'] ?></td>
                    <td><?= $poll['title'] ?></td>
                    <td><?= $poll['answers'] ?></td>
                    <td class="actions">
                        <a href="vote.php?id=<?= $poll['id'] ?>" class="view" title="View Poll"><i class="fas fa-eye fa-xs"></i></a>

                        <?php if ($_SESSION["role"] == 'admin') { ?>
                            <a href="delete.php?id=<?= $poll['id'] ?>" class="trash" title="Delete Poll"><i class="fas fa-trash fa-xs"></i></a>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div style="display: none;">
    <table>
        <tr>
            <th>Question</th>
            <th>Votes</th>
        </tr>

        <tbody id="data"></tbody>
    </table>

    <script>
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "../ajax/poolajax.php", true);
        ajax.send();

        ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                console.log(data);

                var html = "";
                for (var a = 0; a < data.length; a++) {
                    var Question = data[a].title;
                    var Description = data[a].description;


                    html += "<tr>";
                    html += "<td>" + Question + "</td>";
                    html += "<td>" + Description + "</td>";
                    html += "</tr>";
                }
                document.getElementById("data").innerHTML += html;


            }
        };
    </script>
</div>

<?php include('../include_2/user_footer_2.php') ?>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="../js/script.js"></script>

</body>

</html>