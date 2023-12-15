$(document).ready(function() {
    // Handle the comment form submission
    $('.comment-form').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var postId = form.find('button').data('post-id');
        var content = form.find('textarea').val();

        $.ajax({
            type: 'POST',
            url: '/comment/post/' + postId,
            data: { content: content },
            dataType: 'json',
            success: function(response) {
                // Handle success (e.g., update the UI to display the new comment)
                alert(response.message);

                // Assume there is a container for comments with the ID 'comments-container'
                var commentsContainer = $('#comments-container');

                // Append the new comment to the container
                commentsContainer.append('<div class="comment">' + content + '</div>');

                // Clear the textarea after submitting the comment
                form.find('textarea').val('');
            },
            error: function(response) {
                // Handle error (e.g., display an error message)
                alert('Failed to add comment.');
            }
        });
    });
});


    function searchUser() {
        var searchTerm = document.getElementById('searchInput').value;
        if (searchTerm.trim() !== "") {
            window.location.href = "{{ route('user.show', ':username') }}".replace(':username', searchTerm);
        }
    }
    
    

