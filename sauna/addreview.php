<div class="modal" id="review-modal">
    <span class="close" onclick="closeEditModal()">&times;</span>
    <h2>Add Review</h2>
    <form action="addreviewaction.php" method="post">
        <div>
            <label for="album_id">Album:</label>
            <select id="album_id" name="album_id" required>
                <?php
                $query = "SELECT album_id, title FROM albums";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['album_id'] . '">' . $row['title'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <div>
            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>
        </div>
        <div>
            <label for="review_text">Review:</label>
            <textarea id="review_text" name="review_text" required></textarea>
        </div>
        <button type="submit">Add Review</button>
    </form>
</div>

<script>
    function openModal() {
        document.getElementById('review-modal').style.display = 'block';
    }


    window.addEventListener('message', function(event) {
        if (event.data.action === 'open-review-modal') {
            openModal();
        }
    });
</script>