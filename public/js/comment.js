
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
/*
    function searchUser() {
        var searchTerm = document.getElementById('searchInput').value;
        if (searchTerm.trim() !== "") {
            window.location.href = "{{ route('user.show', ':username') }}".replace(':username', searchTerm);
        }
    }
    */

    function findUserIdByUsername(username) {
        // Simulate an asynchronous operation with a Promise
        return new Promise((resolve, reject) => {
            // This is a placeholder - replace it with your actual logic to fetch the user ID
            // For demonstration purposes, using a setTimeout to simulate a delay
            setTimeout(() => {
                // Assuming the username "john_doe" corresponds to user ID "123"
                const userMappings = {
                    "john_doe": "123",
                    // Add more username to user ID mappings as needed
                };
    
                const userId = userMappings[username];
    
                if (userId) {
                    resolve(userId);
                } else {
                    reject(new Error('User not found'));
                }
            }, 1000); // Simulate a 1-second delay, replace with actual logic
        });
    }
    
    // Example usage
    function searchUser() {
        var searchTerm = document.getElementById('searchInput').value.trim();
    
        if (searchTerm !== "") {
            findUserIdByUsername(searchTerm)
                .then(userId => {
                    var route = "{{ route('user.show', ':userId') }}";
                    window.location.href = route.replace(':userId', encodeURIComponent(userId));
                })
                .catch(error => {
                    // Handle the case where the username is not found
                    console.log('Username not found:', error.message);
                });
        }
    }
    

