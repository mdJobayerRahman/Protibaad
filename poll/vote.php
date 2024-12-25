<?php include '../includes/connection.php'; ?>


<?php

include 'function_2.php';
session_start();

$pdo = pdo_connect_mysql();

if (isset($_GET['id'])) {
    // MySQL query that selects the poll records by the GET request "id"
    $stmt = $pdo->prepare('SELECT * FROM polls WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the record
    $poll = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the poll record exists with the id specified
    if ($poll) {
        // MySQL query that selects all the poll answers
        $stmt = $pdo->prepare('SELECT * FROM poll_answers WHERE poll_id = ?');
        $stmt->execute([$_GET['id']]);
        // Fetch all the poll anwsers
        $poll_answers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // If the user clicked the "Vote" button...
        if (isset($_POST['poll_answer'])) {
            // Update and increase the vote for the answer the user voted for
            $stmt = $pdo->prepare('UPDATE poll_answers SET votes = votes + 1 WHERE id = ?');
            $stmt->execute([$_POST['poll_answer']]);
            // Redirect user to the result page
            header('Location: vote.php?id=' . $_GET['id']);
            exit;
        }
    } else {
        exit('Poll with that ID does not exist.');
    }
} else {
    exit('No poll ID specified.');
}
?>
<?php include('../include_2/user_header_2.php') ?>
<?php include('../include_2/user_navbar_2.php') ?>

<br>
<br>
<br>

<div class="container">
    <br />
    <br />
    <br />

    <div class="row">
        <div class="col-md-6">
            <h2><?= $poll['title'] ?></h2>
            <p><?= $poll['description'] ?></p>
            <form action="vote.php?id=<?= $_GET['id'] ?>" method="post">
                <?php for ($i = 0; $i < count($poll_answers); $i++) : ?>
                    <label style="display: flex; ">
                        <input type="radio" id="poll_answer" name="poll_answer" value="<?= $poll_answers[$i]['id'] ?>" <?= $i == 0 ? ' checked' : '' ?>>
                        <?= $poll_answers[$i]['title'] ?>
                    </label>
                <?php endfor; ?>
                <div>
                    <input type="submit" id=<?= $poll['id'] ?> name="poll_button" class="btn btn-primary">
                </div>
            </form>
            <br />
        </div>
        <div class="col-md-6">

            <h4>Live Poll Result</h4><br />
            <div id="poll_result"></div>
            <?php

            // Connect to MySQL
            $pdo = pdo_connect_mysql();
            // If the GET request "id" exists (poll id)...
            if (isset($_GET['id'])) {
                // MySQL query that selects the poll records by the GET request "id"
                $stmt = $pdo->prepare('SELECT * FROM polls WHERE id = ?');
                $stmt->execute([$_GET['id']]);
                // Fetch the record
                $poll = $stmt->fetch(PDO::FETCH_ASSOC);
                // Check if the poll record exists with the id specified
                if ($poll) {
                    // MySQL Query that will get all the answers from the "poll_answers" table ordered by the number of votes (descending)
                    $stmt = $pdo->prepare('SELECT * FROM poll_answers WHERE poll_id = ? ORDER BY votes DESC');
                    $stmt->execute([$_GET['id']]);
                    // Fetch all poll answers
                    $poll_answers = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    // Total number of votes, will be used to calculate the percentage
                    $total_votes = 0;
                    foreach ($poll_answers as $poll_answer) {
                        // Every poll answers votes will be added to total votes
                        $total_votes += $poll_answer['votes'];
                    }
                } else {
                    exit('Poll with that ID does not exist.');
                }
            } else {
                exit('No poll ID specified.');
            }
            ?>

            <?= template_header('Poll Results') ?>

            <div class="content poll-result">
                <h2><?= $poll['title'] ?></h2>

                <div class="wrapper">
                    <?php foreach ($poll_answers as $poll_answer) : ?>
                        <div class="poll-question">
                            <p><?= $poll_answer['title'] ?> <span>(<?= $poll_answer['votes'] ?> Votes)</span></p>
                            <div class="result-bar" style="width:<?= @round(($poll_answer['votes'] / $total_votes) * 100) ?>%">
                                <?= @round(($poll_answer['votes'] / $total_votes) * 100) ?>%
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?= template_footer() ?>
        </div>
    </div>

    <br />
    <br />
    <br />
</div>
<?php include('../include_2/user_footer_2.php') ?>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="../js/script.js"></script>

</body>

</html>