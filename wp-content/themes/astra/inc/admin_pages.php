<?php
function advisers_dashboard_page() {
    // Check if the user has the appropriate role
    if (!current_user_can('administrator') && !current_user_can('editor')) {
        return '<p>You do not have permission to access this page.</p>';
    }

    global $wpdb;
    $table_name = 'advisers';
    $advisers = $wpdb->get_results("SELECT * FROM $table_name");

    // URLs for navigation
    $admin_dashboard_url = get_permalink(get_page_by_path('admin-dashboard'));
    $journal_dashboard_url = get_permalink(get_page_by_path('journal-dashboard'));
    $article_dashboard_url = get_permalink(get_page_by_path('article-dashboard'));
    $advise_dashboard_url = get_permalink(get_page_by_path('advise-dashboard'));
    $user_dashboard_url = get_permalink(get_page_by_path('user-dashboard'));
    $request_dashboard_url = get_permalink(get_page_by_path('request-dashboard'));

    ob_start();
    ?>
    <div class="container">
      <div class="sidebar">
        <h2>Logo</h2>
        <a href="<?php echo $admin_dashboard_url; ?>">Dashboard</a>
        <a href="<?php echo $journal_dashboard_url; ?>">Journal Repository</a>
        <a href="<?php echo $article_dashboard_url; ?>">Article Repository</a>
        <a href="<?php echo $advise_dashboard_url; ?>">Advisers</a>
        <a href="<?php echo $user_dashboard_url; ?>">Users</a>
        <a href="<?php echo $request_dashboard_url; ?>">Requests</a>
        <hr />
        <a href="#">Profile</a>
        <a href="#">Logout</a>
      </div>
      <div class="content">
        <div class="dashboard-header">
            <h1>Advisers Dashboard</h1>
        </div>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr style="background-color: #0073aa; color: white;">
                    <th style="padding: 10px; border: 1px solid #ddd;">Name</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">College</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Email</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($advisers) : ?>
                    <?php foreach ($advisers as $adviser) : ?>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($adviser->Name); ?></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($adviser->College); ?></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($adviser->Email); ?></td>
                            <td style="padding: 10px; border: 1px solid #ddd;">
                                <a href="javascript:void(0);" class="edit-adviser" data-id="<?php echo $adviser->ID; ?>" data-name="<?php echo esc_attr($adviser->Name); ?>" data-college="<?php echo esc_attr($adviser->College); ?>" data-email="<?php echo esc_attr($adviser->Email); ?>">Edit</a> |
                                <a href="javascript:void(0);" class="delete-adviser" data-id="<?php echo $adviser->ID; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 10px; border: 1px solid #ddd;">No advisers found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <!-- Add Adviser Button -->
        <button id="addAdviserBtn" style="position: absolute; bottom: 30px; right: 150px; padding: 10px 15px; background-color: #0073aa; color: white; border: none;">Add Adviser</button>
        </table>

        
    </div>
    </div>

    <!-- Popup Form for Adding Adviser -->
    <div id="addAdviserPopup" style="display:none; background: rgba(0,0,0,0.5); position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 999;">
        <div style="background: white; padding: 20px; margin: 100px auto; width: 400px; position: relative;">
            <h2>Add Adviser</h2>
            <form id="addAdviserForm">
                <?php wp_nonce_field('add_adviser_nonce', 'add_adviser_nonce_field'); ?>
                <label for="name">Name</label>
                <input type="text" name="name" id="add_name" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <label for="college">College</label>
                <input type="text" name="college" id="add_college" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <label for="email">Email</label>
                <input type="email" name="email" id="add_email" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <button type="submit" style="padding: 10px 15px; background-color: #0073aa; color: white; border: none;">Add Adviser</button>
                <button type="button" onclick="document.getElementById('addAdviserPopup').style.display='none'" style="padding: 10px 15px; background-color: red; color: white; border: none; margin-left: 10px;">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Popup Form for Editing Adviser -->
    <div id="editAdviserPopup" style="display:none; background: rgba(0,0,0,0.5); position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 999;">
        <div style="background: white; padding: 20px; margin: 100px auto; width: 400px; position: relative;">
            <h2>Edit Adviser</h2>
            <form id="editAdviserForm">
                <input type="hidden" name="adviser_id" id="adviser_id">
                <?php wp_nonce_field('update_adviser_nonce', 'update_adviser_nonce_field'); ?>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <label for="college">College</label>
                <input type="text" name="college" id="college" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <button type="submit" style="padding: 10px 15px; background-color: #0073aa; color: white; border: none;">Update Adviser</button>
                <button type="button" onclick="document.getElementById('editAdviserPopup').style.display='none'" style="padding: 10px 15px; background-color: red; color: white; border: none; margin-left: 10px;">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        // Open the edit popup and pre-fill the data
        const editLinks = document.querySelectorAll('.edit-adviser');
        editLinks.forEach(link => {
            link.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const college = this.getAttribute('data-college');
                const email = this.getAttribute('data-email');

                document.getElementById('adviser_id').value = id;
                document.getElementById('name').value = name;
                document.getElementById('college').value = college;
                document.getElementById('email').value = email;

                document.getElementById('editAdviserPopup').style.display = 'block';
            });
        });

        // Open the add adviser popup
        document.getElementById('addAdviserBtn').addEventListener('click', function() {
            document.getElementById('addAdviserPopup').style.display = 'block';
        });

        // AJAX form submission for adding adviser
        const addForm = document.getElementById('addAdviserForm');
        addForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(addForm);
            formData.append('action', 'add_adviser');
            formData.append('nonce', document.querySelector('input[name="add_adviser_nonce_field"]').value);

            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Adviser added successfully');
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert('Error adding adviser');
                }
            });
        });

        // AJAX form submission for editing
        const editForm = document.getElementById('editAdviserForm');
        editForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(editForm);
            formData.append('action', 'update_adviser');
            formData.append('nonce', document.querySelector('input[name="update_adviser_nonce_field"]').value);

            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Adviser updated successfully');
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert('Error updating adviser');
                }
            });
        });

        // Delete an adviser using AJAX
        document.querySelectorAll('.delete-adviser').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this adviser?')) {
                    const adviserId = this.getAttribute('data-id');
                    const nonce = '<?php echo wp_create_nonce('delete_adviser_nonce'); ?>';

                    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            action: 'delete_adviser',
                            adviser_id: adviserId,
                            nonce: nonce
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.data);
                            location.reload(); // Reload the page to update the list
                        } else {
                            alert(data.data);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An unexpected error occurred.');
                    });
                }
            });
        });
    </script>

    <?php
    return ob_get_clean(); // Return the buffered content
}

add_shortcode('advisers_dashboard', 'advisers_dashboard_page');

// AJAX handler for adding adviser
add_action('wp_ajax_add_adviser', 'add_adviser_callback');
function add_adviser_callback() {
    check_ajax_referer('add_adviser_nonce', 'nonce');

    global $wpdb;

    $name = sanitize_text_field($_POST['name']);
    $college = sanitize_text_field($_POST['college']);
    $email = sanitize_email($_POST['email']);

    $table_name = 'advisers';
    $result = $wpdb->insert($table_name, [
        'Name' => $name,
        'College' => $college,
        'Email' => $email
    ]);

    if ($result) {
        wp_send_json_success('Adviser added successfully.');
    } else {
        wp_send_json_error('Failed to add adviser.');
    }
}







function dashboard_data_shortcode() {
    global $wpdb;

    // Create a new wpdb object for the smc database connection
    $smc_db = new wpdb(DB_USER, DB_PASSWORD, 'SMC', DB_HOST); // Use 'SMC' as the database name

    // Get the number of users in the smcuser table
    $user_count = $smc_db->get_var("SELECT COUNT(*) FROM smcusers");

    // Get the total number of journals and articles from the specified tables
    $tables = ['nurse', 'coe', 'coc', 'chtm', 'ced', 'ccs', 'cbaa', 'cas'];
    $total_journals_articles = 0;

    $total_advisers = $smc_db->get_var("SELECT COUNT(*) FROM advisers");

    foreach ($tables as $table) {
        $total_journals_articles += $smc_db->get_var("SELECT COUNT(*) FROM $table");
    }

    // Get the URL of the pages
    $admin_dashboard_url = get_permalink( get_page_by_path( 'admin-dashboard' ) );
    $journal_dashboard_url = get_permalink( get_page_by_path( 'journal-dashboard' ) );
    $article_dashboard_url = get_permalink( get_page_by_path( 'article-dashboard' ) );
    $advise_dashboard_url = get_permalink( get_page_by_path( 'advise-dashboard' ) );
    $user_dashboard_url = get_permalink( get_page_by_path( 'user-dashboard' ) );
    $request_dashboard_url = get_permalink( get_page_by_path( 'request-dashboard' ) );



    ob_start();
    ?>
    <div class="container">
      <div class="sidebar">
        <h2>Logo</h2>
        <a href="<?php echo $admin_dashboard_url; ?>">Dashboard</a>
        <a href="<?php echo $journal_dashboard_url; ?>">Journal Repository</a>
        <a href="<?php echo $article_dashboard_url; ?>">Article Repository</a>
        <a href="<?php echo $advise_dashboard_url; ?>">Advisers</a>  <!-- Link to the Admin Dashboard page -->
        <a href="<?php echo $user_dashboard_url; ?>">Users</a>
        <a href="<?php echo $request_dashboard_url; ?>">Requests</a>

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
          <h3>No. of Advisers</h3>
          <?php echo $total_advisers; ?>
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


//User Dashboard///
//
//

//

//

//
function users_dashboard_page() {
    // Check if the user has the appropriate role
    if (!current_user_can('administrator') && !current_user_can('editor')) {
        return '<p>You do not have permission to access this page.</p>';
    }

    global $wpdb;
    $table_name = 'smcusers';
    $users = $wpdb->get_results("SELECT ID, user_nicename, user_pass, user_email, college, user_registered FROM $table_name");

    // URLs for navigation
    $admin_dashboard_url = get_permalink(get_page_by_path('admin-dashboard'));
    $journal_dashboard_url = get_permalink(get_page_by_path('journal-dashboard'));
    $article_dashboard_url = get_permalink(get_page_by_path('article-dashboard'));
    $advise_dashboard_url = get_permalink(get_page_by_path('advise-dashboard'));
    $user_dashboard_url = get_permalink(get_page_by_path('user-dashboard'));
    $request_dashboard_url = get_permalink(get_page_by_path('request-dashboard'));

    ob_start();
    ?>
    <div class="container">
      <div class="sidebar">
        <h2>Logo</h2>
        <a href="<?php echo $admin_dashboard_url; ?>">Dashboard</a>
        <a href="<?php echo $journal_dashboard_url; ?>">Journal Repository</a>
        <a href="<?php echo $article_dashboard_url; ?>">Article Repository</a>
        <a href="<?php echo $advise_dashboard_url; ?>">Advisers</a>
        <a href="<?php echo $user_dashboard_url; ?>">Users</a>
        <a href="<?php echo $request_dashboard_url; ?>">Requests</a>
        <hr />
        <a href="#">Profile</a>
        <a href="#">Logout</a>
      </div>
      <div class="content">
        <div class="dashboard-header">
            <h1>Users Dashboard</h1>
        </div>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr style="background-color: #0073aa; color: white;">
                    <th style="padding: 10px; border: 1px solid #ddd;">User Name</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Password</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Email</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">College</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Registered On</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($users) : ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($user->user_nicename); ?></td>
                            <td style="padding: 10px; border: 1px solid #ddd;">******</td> <!-- Hide password for security -->
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($user->user_email); ?></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($user->college); ?></td>
                            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo esc_html($user->user_registered); ?></td>
                            <td style="padding: 10px; border: 1px solid #ddd;">
                                <a href="javascript:void(0);" class="edit-user" data-id="<?php echo esc_attr($user->ID); ?>" data-name="<?php echo esc_attr($user->user_nicename); ?>" data-email="<?php echo esc_attr($user->user_email); ?>" data-college="<?php echo esc_attr($user->college); ?>" data-password="<?php echo esc_attr($user->user_pass); ?>">Edit</a> |
                                <a href="javascript:void(0);" class="delete-user" data-id="<?php echo esc_attr($user->ID); ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 10px; border: 1px solid #ddd;">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Add User Button -->
        <button id="addUserBtn" style="position: absolute; bottom: 20px; right: 20px; padding: 10px 15px; background-color: #0073aa; color: white; border: none;">Add User</button>
    </div>
    </div>

    <!-- Popup Form for Adding User -->
    <div id="addUserPopup" style="display:none; background: rgba(0,0,0,0.5); position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 999;">
        <div style="background: white; padding: 20px; margin: 100px auto; width: 400px; position: relative;">
            <h2>Add User</h2>
            <form id="addUserForm">
                <?php wp_nonce_field('add_user_nonce', 'add_user_nonce_field'); ?>
                <label for="name">User Name</label>
                <input type="text" name="name" id="add_name" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <label for="password">Password</label>
                <input type="password" name="password" id="add_password" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <label for="email">Email</label>
                <input type="email" name="email" id="add_email" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <label for="college">College</label>
                <input type="text" name="college" id="add_college" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <button type="submit" style="padding: 10px 15px; background-color: #0073aa; color: white; border: none;">Add User</button>
                <button type="button" onclick="document.getElementById('addUserPopup').style.display='none'" style="padding: 10px 15px; background-color: red; color: white; border: none; margin-left: 10px;">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Popup Form for Editing User -->
    <div id="editUserPopup" style="display:none; background: rgba(0,0,0,0.5); position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 999;">
        <div style="background: white; padding: 20px; margin: 100px auto; width: 400px; position: relative;">
            <h2>Edit User</h2>
            <form id="editUserForm">
                <input type="hidden" name="user_id" id="user_id">
                <?php wp_nonce_field('update_user_nonce', 'update_user_nonce_field'); ?>
                <label for="name">User Name</label>
                <input type="text" name="name" id="name" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Leave empty to keep current password" style="width: 100%; padding: 10px; margin: 5px 0;">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <label for="college">College</label>
                <input type="text" name="college" id="college" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <button type="submit" style="padding: 10px 15px; background-color: #0073aa; color: white; border: none;">Update User</button>
                <button type="button" onclick="document.getElementById('editUserPopup').style.display='none'" style="padding: 10px 15px; background-color: red; color: white; border: none; margin-left: 10px;">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        // Open the add user popup
        document.getElementById('addUserBtn').addEventListener('click', function() {
            document.getElementById('addUserPopup').style.display = 'block';
        });

        // AJAX form submission for adding user
        const addForm = document.getElementById('addUserForm');
        addForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(addForm);
            formData.append('action', 'add_user');
            formData.append('nonce', document.querySelector('input[name="add_user_nonce_field"]').value);

            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('User added successfully');
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert('Error adding user');
                }
            });
        });

        // Open the edit popup and pre-fill the data
        const editLinks = document.querySelectorAll('.edit-user');
        editLinks.forEach(link => {
            link.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const email = this.getAttribute('data-email');
                const college = this.getAttribute('data-college');

                document.getElementById('user_id').value = id;
                document.getElementById('name').value = name;
                document.getElementById('email').value = email;
                document.getElementById('college').value = college;

                document.getElementById('editUserPopup').style.display = 'block';
            });
        });

        // AJAX form submission for editing
        const editForm = document.getElementById('editUserForm');
        editForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(editForm);
            formData.append('action', 'update_user');
            formData.append('nonce', document.querySelector('input[name="update_user_nonce_field"]').value);

            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('User updated successfully');
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert('Error updating user');
                }
            });
        });

        // Delete a user using AJAX
        document.querySelectorAll('.delete-user').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this user?')) {
                    const userId = this.getAttribute('data-id');
                    const nonce = '<?php echo wp_create_nonce('delete_user_nonce'); ?>';

                    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            action: 'delete_user',
                            user_id: userId,
                            nonce: nonce
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.data);
                            location.reload(); // Reload the page to update the list
                        } else {
                            alert(data.data);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An unexpected error occurred.');
                    });
                }
            });
        });
    </script>

    <?php
    return ob_get_clean(); // Return the buffered content
}

add_shortcode('users_dashboard', 'users_dashboard_page');

// AJAX handler for adding user
add_action('wp_ajax_add_user', 'add_user_callback');
function add_user_callback() {
    check_ajax_referer('add_user_nonce', 'nonce');

    global $wpdb;

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $college = sanitize_text_field($_POST['college']);
    $password = $_POST['password']; // Get the password from the form

    // Generate hashed password
    $hashed_password = wp_hash_password($password);

    // Current datetime
    $user_registered = current_time('mysql');

    $table_name = 'smcusers';
    $result = $wpdb->insert($table_name, [
        'user_nicename' => $name,
        'user_email' => $email,
        'college' => $college,
        'user_pass' => $hashed_password,
        'user_login' => $name,  // Same as user_nicename
        'display_name' => $name, // Same as user_nicename
        'user_registered' => $user_registered // Set current datetime
    ]);

    if ($result) {
        wp_send_json_success('User added successfully.');
    } else {
        wp_send_json_error('Failed to add user.');
    }
}

// AJAX handler for updating user
add_action('wp_ajax_update_user', 'update_user_callback');
function update_user_callback() {
    check_ajax_referer('update_user_nonce', 'nonce');

    global $wpdb;

    $user_id = intval($_POST['user_id']);
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $college = sanitize_text_field($_POST['college']);
    $password = sanitize_text_field($_POST['password']); // Get the new password from the form

    // Prepare data to update
    $data = [
        'user_nicename' => $name,
        'user_email' => $email,
        'college' => $college,
        'user_login' => $name,  // Same as user_nicename
        'display_name' => $name // Same as user_nicename
    ];

    // Update password if provided
    if (!empty($password)) {
        $data['user_pass'] = wp_hash_password($password);
    }

    $result = $wpdb->update('smcusers', $data, ['ID' => $user_id]);

    if ($result !== false) {
        wp_send_json_success('User updated successfully.');
    } else {
        wp_send_json_error('Failed to update user.');
    }
}

// AJAX handler for deleting user
add_action('wp_ajax_delete_user', 'delete_user_callback');
function delete_user_callback() {
    check_ajax_referer('delete_user_nonce', 'nonce');

    global $wpdb;

    $user_id = intval($_POST['user_id']);

    $result = $wpdb->delete('smcusers', ['ID' => $user_id]);

    if ($result) {
        wp_send_json_success('User deleted successfully.');
    } else {
        wp_send_json_error('Failed to delete user.');
    }
}

//Journal

///

///

///

function journal_repository_dashboard() {
    if (!current_user_can('administrator') && !current_user_can('editor')) {
        return '<p>You do not have permission to access this page.</p>';
    }

    global $wpdb;

    // Fetch colleges from the college table
    $colleges = $wpdb->get_col("SELECT name FROM college"); // Adjust the column name if necessary

    ob_start();
    ?>
    <div class="container">
        <h1>Journal Repository Dashboard</h1>
        
        <div class="filters">
            <input type="text" id="searchTitle" placeholder="Search Title">
            <input type="text" id="searchAuthor" placeholder="Search Author">
            <select id="collegeFilter">
    <option value="">Select College</option>
    <option value="ced">CED</option>
    <option value="cas">CAS</option>
    <option value="coe">COE</option>
    <option value="nurse">Nurse</option>
    <option value="coc">COC</option>
    <option value="cbaa">CBAA</option>
    <option value="chtm">CHTM</option>
    <option value="ccs">CCS</option>
</select>

            <input type="date" id="datePublished">
            <button id="filterBtn">Filter</button>
        </div>
        
        <table id="journalTable" style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr style="background-color: #0073aa; color: white;">
                    <th>Title</th>
                    <th>Author</th>
                    <th>Abstract</th>
                    <th>Date Published</th>
                    <th>Journal Subjects</th>
                    <th>Adviser</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="journalTableBody">
                <!-- Dynamic content will be inserted here -->
            </tbody>
        </table>

        <button id="addJournalBtn" style="margin-top: 20px; padding: 10px 15px; background-color: #0073aa; color: white; border: none;">Add Journal</button>
    </div>

    <!-- Add Journal Popup Form -->
    <div id="addJournalPopup" style="display:none; background: rgba(0,0,0,0.5); position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 999;">
        <div style="background: white; padding: 20px; margin: 100px auto; width: 400px; position: relative;">
            <h2>Add Journal</h2>
            <form id="addJournalForm">
                <?php wp_nonce_field('add_journal_nonce', 'add_journal_nonce_field'); ?>
                <label for="college">College</label>
                <select name="college" id="college" required style="width: 100%; padding: 10px; margin: 5px 0;">
                    <option value="">Select College</option>
                    <option value="ced">CED</option>
                    <option value="cas">CAS</option>
                    <option value="coe">COE</option>
                    <option value="nurse">Nurse</option>
                    <option value="coc">COC</option>
                    <option value="cbaa">CBAA</option>
                    <option value="chtm">CHTM</option>
                    <option value="ccs">CCS</option>
                </select>
                <label for="title">Title</label>
                <input type="text" name="Title" id="title" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <label for="author">Author</label>
                <input type="text" name="Author" id="author" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <label for="abstract">Abstract</label>
                <textarea name="Abstract" id="abstract" required style="width: 100%; padding: 10px; margin: 5px 0;"></textarea>
                <label for="date_published">Date Published</label>
                <input type="date" name="DatePublished" id="date_published" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <label for="subjects">Journal Subjects</label>
                <input type="text" name="JournalSubjects" id="subjects" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <label for="adviser">Adviser</label>
                <input type="text" name="Adviser" id="adviser" required style="width: 100%; padding: 10px; margin: 5px 0;">
                <button type="submit" style="padding: 10px 15px; background-color: #0073aa; color: white; border: none;">Add Journal</button>
                <button type="button" onclick="document.getElementById('addJournalPopup').style.display='none'" style="padding: 10px 15px; background-color: red; color: white; border: none; margin-left: 10px;">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('addJournalBtn').addEventListener('click', function() {
            document.getElementById('addJournalPopup').style.display = 'block';
        });

        // AJAX form submission for adding journal
        const addJournalForm = document.getElementById('addJournalForm');
        addJournalForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(addJournalForm);
            formData.append('action', 'add_journal');
            formData.append('nonce', document.querySelector('input[name="add_journal_nonce_field"]').value);

            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Journal added successfully');
                    location.reload(); // Reload the page to reflect changes
                } else {
                    alert('Error adding journal');
                }
            });
        });

        // Function to fetch and display journals
        function fetchJournals() {
            const title = document.getElementById('searchTitle').value;
            const author = document.getElementById('searchAuthor').value;
            const college = document.getElementById('collegeFilter').value;
            const datePublished = document.getElementById('datePublished').value;

            fetch('<?php echo admin_url('admin-ajax.php'); ?>?action=fetch_journals&title=' + title + '&author=' + author + '&college=' + college + '&date_published=' + datePublished)
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById('journalTableBody');
                tbody.innerHTML = '';
                data.forEach(journal => {
                    const row = `<tr>
                        <td>${journal.Title}</td>
                        <td>${journal.Author}</td>
                        <td>${journal.Abstract}</td>
                        <td>${journal.DatePublished}</td>
                        <td>${journal.JournalSubjects}</td>
                        <td>${journal.adviser}</td>
                        <td>
                            <a href="javascript:void(0);" class="edit-journal" data-id="${journal.id}">Edit</a> |
                            <a href="javascript:void(0);" class="delete-journal" data-id="${journal.id}">Delete</a>
                        </td>
                    </tr>`;
                    tbody.innerHTML += row;
                });
            });
        }

        // Event listener for filter button
        document.getElementById('filterBtn').addEventListener('click', fetchJournals);

        // Fetch journals on page load
        fetchJournals();
    </script>
    <?php
    return ob_get_clean();
}

add_shortcode('journal_repository', 'journal_repository_dashboard');





// AJAX handler for adding journal
add_action('wp_ajax_add_journal', 'add_journal_callback');
function add_journal_callback() {
    check_ajax_referer('add_journal_nonce', 'nonce');

    global $wpdb;

    $college = sanitize_text_field($_POST['college']);
    $title = sanitize_text_field($_POST['Title']);
    $author = sanitize_text_field($_POST['Author']);
    $abstract = sanitize_textarea_field($_POST['Abstract']);
    $date_published = sanitize_text_field($_POST['DatePublished']);
    $subjects = sanitize_text_field($_POST['JournalSubjects']);
    $adviser = sanitize_text_field($_POST['Adviser']);

    // Validate the college to prevent SQL injection
    $valid_tables = ['ced', 'cas', 'coe', 'nurse', 'coc', 'cbaa', 'chtm', 'ccs'];
    if (!in_array($college, $valid_tables)) {
        wp_send_json_error('Invalid college selected.');
        return;
    }

    $result = $wpdb->insert($college, [
        'Title' => $title,
        'Author' => $author,
        'Abstract' => $abstract,
        'DatePublished' => $date_published,
        'JournalSubjects' => $subjects,
        'Adviser' => $adviser
    ]);

    if ($result) {
        wp_send_json_success('Journal added successfully.');
    } else {
        wp_send_json_error('Failed to add journal.');
    }
}

add_action('wp_ajax_fetch_journals', 'fetch_journals_handler');
add_action('wp_ajax_nopriv_fetch_journals', 'fetch_journals_handler');

function fetch_journals_handler() {
    global $wpdb;

    $title = isset($_GET['title']) ? sanitize_text_field($_GET['title']) : '';
    $author = isset($_GET['author']) ? sanitize_text_field($_GET['author']) : '';
    $college = isset($_GET['college']) ? sanitize_text_field($_GET['college']) : '';
    $date_published = isset($_GET['date_published']) ? sanitize_text_field($_GET['date_published']) : '';

    // Validate the college to prevent SQL injection
    $valid_tables = ['ced', 'cas', 'coe', 'nurse', 'coc', 'cbaa', 'chtm', 'ccs'];
    if (!in_array($college, $valid_tables)) {
        wp_send_json_error(['message' => 'Invalid college selected.']);
    }

    // Build the query for the selected college table
    $query = "SELECT * FROM $college WHERE 1=1";
    if ($title) {
        $query .= $wpdb->prepare(" AND title LIKE %s", '%' . $wpdb->esc_like($title) . '%');
    }
    if ($author) {
        $query .= $wpdb->prepare(" AND author LIKE %s", '%' . $wpdb->esc_like($author) . '%');
    }
    if ($date_published) {
        $query .= $wpdb->prepare(" AND date_published = %s", $date_published);
    }

    $results = $wpdb->get_results($query, ARRAY_A);
    wp_send_json($results);
}
add_action('wp_ajax_fetch_journals', 'fetch_journals_handler');
add_action('wp_ajax_nopriv_fetch_journals', 'fetch_journals_handler');



// AJAX handler for deleting journal
add_action('wp_ajax_delete_journal', 'delete_journal_callback');
function delete_journal_callback() {
    check_ajax_referer('delete_journal_nonce', 'nonce');

    global $wpdb;

    $journal_id = intval($_POST['journal_id']);
    $college = sanitize_text_field($_POST['college']);

    // Validate the college
    $valid_tables = ['ced', 'cas', 'coe', 'nurse', 'coc', 'cbaa', 'chtm', 'ccs'];
    if (!in_array($college, $valid_tables)) {
        wp_send_json_error('Invalid college selected.');
        return;
    }

    $result = $wpdb->delete(
        $college,
        ['id' => $journal_id],
        ['%d']
    );

    if ($result !== false) {
        wp_send_json_success('Journal deleted successfully.');
    } else {
        wp_send_json_error('Failed to delete journal.');
    }
}

// AJAX handler for editing journal
add_action('wp_ajax_edit_journal', 'edit_journal_callback');
function edit_journal_callback() {
    check_ajax_referer('edit_journal_nonce', 'nonce');

    global $wpdb;

    $journal_id = intval($_POST['journal_id']);
    $college = sanitize_text_field($_POST['college']);
    
    // Validate the college
    $valid_tables = ['ced', 'cas', 'coe', 'nurse', 'coc', 'cbaa', 'chtm', 'ccs'];
    if (!in_array($college, $valid_tables)) {
        wp_send_json_error('Invalid college selected.');
        return;
    }

    $data = array(
        'Title' => sanitize_text_field($_POST['Title']),
        'Author' => sanitize_text_field($_POST['Author']),
        'Abstract' => sanitize_textarea_field($_POST['Abstract']),
        'DatePublished' => sanitize_text_field($_POST['DatePublished']),
        'JournalSubjects' => sanitize_text_field($_POST['JournalSubjects']),
        'Adviser' => sanitize_text_field($_POST['Adviser'])
    );

    $result = $wpdb->update(
        $college,
        $data,
        ['id' => $journal_id]
    );

    if ($result !== false) {
        wp_send_json_success('Journal updated successfully.');
    } else {
        wp_send_json_error('Failed to update journal.');
    }
}

