function dashboard_data_shortcode() {
    global $wpdb;

    // Create a new wpdb object for the smc database connection
    $smc_db = new wpdb(DB_USER, DB_PASSWORD, 'SMC', DB_HOST); // Use 'SMC' as the database name

    // Get the number of users in the smcuser table
    $user_count = $smc_db->get_var("SELECT COUNT(*) FROM smcuser");

    // Get the total number of journals and articles from the specified tables
    $tables = ['nurse', 'coe', 'coc', 'chtm', 'ced', 'ccs', 'cbaa', 'cas'];
    $total_journals_articles = 0;

    foreach ($tables as $table) {
        $total_journals_articles += $smc_db->get_var("SELECT COUNT(*) FROM $table");
    }

    ob_start();
    ?>
    <div class="container">
      <div class="sidebar">
        <h2>Logo</h2>
        <a href="#">Dashboarsd</a>
        <a href="#">Journal Repository</a>
        <a href="#">Article Repository</a>
        <a href="#">Users</a>
        <a href="#">Accesses</a>

        <hr />

        <a href="#">Profile</a>
        <a href="#">Logout</a>
      </div>
      <div class="content">
        <div class="dashboard-header">
          <h1>Dashboard</h1>
        </div>
        <div class="cards">
          <div class="card">
            <h3>Users</h3>
            <?php echo $user_count; ?>
          </div>
          <div class="card">
            <h3>Total Journals & Articles</h3>
            <?php echo $total_journals_articles; ?>
          </div>
          <div class="card">
            <!-- You can add more cards or leave this empty -->
          </div>
          <div class="recent-activities">
            <h3>Recent Activities</h3>
            No activities available.
          </div>
        </div>
      </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('dashboard_data', 'dashboard_data_shortcode');
