<div id="edit-modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditModal()">&times;</span>
        <h2>Edit Review</h2>
        <form id="editReviewForm" action="editreviewaction.php" method="post">
            <input type="hidden" id="editReviewId" name="review_id">
            <div>
                <label for="editRating">Rating:</label>
                <input type="number" id="editRating" name="rating" min="1" max="5" required>
            </div>
            <div>
                <label for="editReviewText">Review:</label>
                <textarea id="editReviewText" name="review_text" required></textarea>
            </div>
            <button type="submit">Save Changes</button>
        </form>
    </div>
</div>
<script>
function openEditModal(reviewId, rating, reviewText) {
    document.getElementById("editReviewId").value = reviewId;
    document.getElementById("editRating").value = rating;
    document.getElementById("editReviewText").value = reviewText;

    document.getElementById("edit-modal").style.display = "block"; 
}
function closeEditModal() {
    document.getElementById("editReviewId").value = "";
    document.getElementById("editRating").value = "";
    document.getElementById("editReviewText").value = "";

    document.getElementById("edit-modal").style.display = "none"; 
}
</script>

