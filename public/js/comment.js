
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
                },
                error: function(response) {
                    // Handle error (e.g., display an error message)
                    alert('Failed to add comment.');
                }
            });
        });
    });

