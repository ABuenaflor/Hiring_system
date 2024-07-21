<?php 
//session_start();
include("includes/header.php"); 
include("../middleware/admin_middleware.php"); 

?>
<style>
    .card-body{
        display: flex;
    flex-direction: column;
    overflow-y: auto; 
    max-height: calc(80vh - 30px);
    }
    .app-row{
        height: 20%; 
    box-sizing: border-box; 
    padding: 10px; 
    }
    .card{
        display: flex;
    flex-direction: column;
    overflow-y: auto; 
    max-height: calc(80vh - 30px);
    }
    .app-row-rank{
        height: 20%; 
    box-sizing: border-box;
    padding: 10px; 
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header">
                    <h4>Applicants</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Index</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>College</th>
                                <th>Course</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Pagination logic
                                $limit = 5; // Number of entries to show in a page.
                                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $start = ($page - 1) * $limit;

                                $applicants_query = "SELECT * FROM credentials LIMIT $start, $limit";
                                $applicants = mysqli_query($con, $applicants_query);

                                $total_query = "SELECT COUNT(*) FROM credentials";
                                $total_result = mysqli_query($con, $total_query);
                                $total_applicants = mysqli_fetch_array($total_result)[0];
                                $total_pages = ceil($total_applicants / $limit);

                                if (mysqli_num_rows($applicants) > 0) {
                                    foreach ($applicants as $item) {
                                        ?>
                                            <tr class="app-row">
                                                <td class="app-row"><?= $item['id']; ?></td>
                                                <td class="app-row"><?= $item['first_name']; ?></td>
                                                <td class="app-row"><?= $item['last_name']; ?></td>
                                                <td class="app-row"><?= $item['col_school']; ?></td>
                                                <td class="app-row"><?= $item['course']; ?></td>
                                                <td class="app-row">
                                                    <a href="show.php?id=<?= $item['id']; ?>" class="btn btn-primary">Show More</a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>No records found</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>

                    <!-- Pagination controls -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <?php if ($page > 1): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a></li>
                            <?php endif; ?>
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                            <?php endfor; ?>
                            <?php if ($page < $total_pages): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">Next</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="card">
    <div class="card-header">
        <h4>Results</h4>
    </div>
    <form action="">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Ranked Candidates</h4>
                        <table class="table table-bordered" id="applicant_table">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>SAW Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Pagination logic for ranked candidates
                                    $limit = 5; // Number of entries to show in a page.
                                    $page = isset($_GET['credentials']) ? $_GET['credentials'] : 1;
                                    $start = ($page - 1) * $limit;

                                    $candidates_query = "SELECT * FROM credentials ORDER BY saw_score DESC LIMIT $start, $limit";
                                    $candidates = mysqli_query($con, $candidates_query);

                                    $total_query = "SELECT COUNT(*) FROM credentials";
                                    $total_result = mysqli_query($con, $total_query);
                                    $total_candidates = mysqli_fetch_array($total_result)[0];
                                    $total_pages = ceil($total_candidates / $limit);

                                    $rank = ($page - 1) * $limit + 1; // Start rank for the current page
                                    if (mysqli_num_rows($candidates) > 0) {
                                        foreach ($candidates as $candidate) {
                                            $normalizedSawScore = calculate_saw_score($candidate, $weights);
                                            update_candidate_saw_score($con, $candidate['id'], $normalizedSawScore);
                                            echo "<tr>";
                                            echo "<td class='app-row-rank'>{$rank}</td>";
                                            echo "<td class='app-row-rank'>{$candidate['first_name']}</td>";
                                            echo "<td class='app-row-rank'>{$candidate['last_name']}</td>";
                                            echo "<td class='app-row-rank'>{$normalizedSawScore}</td>";
                                            echo "</tr>";
                                            $rank++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='4'>No records found</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>

                        <!-- Pagination controls -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?php if ($page > 1): ?>
                                    <li class="page-item"><a class="page-link" href="?credentials=<?= $page - 1 ?>">Previous</a></li>
                                <?php endif; ?>
                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link" href="?credentials=<?= $i ?>"><?= $i ?></a></li>
                                <?php endfor; ?>
                                <?php if ($page < $total_pages): ?>
                                    <li class="page-item"><a class="page-link" href="?credentials=<?= $page + 1 ?>">Next</a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>