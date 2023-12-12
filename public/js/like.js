// like.js

$(document).ready(function() {
  // Add this setup before making any AJAX requests
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  // Handle the click event for the like post button
  $('.like-post-btn').each(function() {
      var postId = $(this).data('post-id');
      var likeCountSpan = $(this).siblings('.like-count');
      var heartIcon = $(this).find('i');

      // Set the initial liked status based on the data attribute
      var initialLiked = $(this).data('initial-liked') === 'true';
      if (initialLiked) {
          heartIcon.addClass('liked');
      }

      $(this).on('click', function() {
          // Your existing click event handling code

          // After a successful like, fetch and update the actual like count
          $.ajax({
              type: 'POST',
              url: '/like/post/' + postId, // Adjust the URL as needed
              dataType: 'json',
              success: function(response) {
                  // Update the like count in the UI
                  var likeCountSpan = $('.like-count[data-post-id="' + postId + '"]');
                  likeCountSpan.text(response.count);

                  // Toggle the heart color
                  heartIcon.toggleClass('liked', response.isLiked);

                  // Handle success (e.g., show a notification)
                  alert(response.message);
              },
              error: function(response) {
                  // Handle error (e.g., user has already liked the post)
                  alert(response.responseJSON.message);
              }
          });
      });
  });

  // Handle the click event for the like comment button
  $('.like-comment-btn').each(function() {
      var commentId = $(this).data('comment-id');
      var likeCountSpan = $(this).siblings('.like-count');
      var heartIcon = $(this).find('i');

      // Set the initial liked status based on the data attribute
      var initialLiked = $(this).data('initial-liked') === 'true';
      if (initialLiked) {
          heartIcon.addClass('liked');
      }

      $(this).on('click', function() {
          // Your existing click event handling code

          // After a successful like, fetch and update the actual like count
          $.ajax({
              type: 'POST',
              url: '/like/comment/' + commentId, // Adjust the URL as needed
              dataType: 'json',
              success: function(response) {
                  // Update the like count in the UI
                  var likeCountSpan = $('.like-count[data-post-id="' + postId + '"]');
                  likeCountSpan.text(response.count);

                  // Toggle the heart color
                  heartIcon.toggleClass('liked', response.isLiked);

                  // Handle success (e.g., show a notification)
                  alert(response.message);
              },
              error: function(response) {
                  // Handle error (e.g., user has already liked the comment)
                  alert(response.responseJSON.message);
              }
          });
      });
  });
});

