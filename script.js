document.addEventListener('DOMContentLoaded', function() {
    var tweetButton = document.getElementById('tweetButton');
    var tweetInputContainer = document.getElementById('tweetInputContainer');
    var sendTweetButton = document.getElementById('sendTweet');
    var tweetContent = document.getElementById('tweetContent');
    var tweetsContainer = document.querySelector('.container');
    var editButton = document.getElementById('editButton');
    var username = document.getElementById('username');
    var userAvatar = document.querySelector('.header-avatar');
    var cancelTweetButton = document.getElementById('cancelTweet');

    function limitUsernameLength(event) {
        if (username.textContent.length >= 15 && event.key !== 'Backspace' && event.key !== 'Delete') {
            event.preventDefault();
        }
    }

    tweetButton.addEventListener('click', function() {
        tweetInputContainer.style.display = 'flex';
    });

    username.addEventListener('keypress', limitUsernameLength);
    username.addEventListener('paste', function(e) {
        var pasteData = e.clipboardData.getData('text/plain');
        if (username.textContent.length + pasteData.length > 15) {
            e.preventDefault();
        }
        else if (pasteData.length > 15) {
            e.preventDefault();
            document.execCommand('insertText', false, pasteData.substring(0, 15));
        }
    }); 

    sendTweetButton.addEventListener('click', function() {
    var content = tweetContent.value.trim();
    var currentUsername = username.textContent; 
    var avatarSrc = userAvatar.getAttribute('src'); 
    if(content) {

        var newTweet = document.createElement('div');
        newTweet.classList.add('tweet');
        newTweet.innerHTML = `
            <div class="avatar">
                <img src="${avatarSrc}" alt="User Avatar" style="width: 50px; height: 50px;"> <!-- Use the avatar source here -->
            </div>
            <div class="content">
                <div class="username">@${currentUsername}</div> <!-- Insert the current username here -->
                <div class="timestamp">Just now</div>
                <div class="message">${content}</div>
            </div>
        `;
            tweetsContainer.appendChild(newTweet);
            

            tweetContent.value = '';
            tweetInputContainer.style.display = 'none';
        }
    });

    cancelTweetButton.addEventListener('click', function() {
    tweetInputContainer.style.display = 'none'; 
    tweetContent.value = '';
});

    editButton.addEventListener('click', function() {
        var isEditable = username.isContentEditable;
        username.contentEditable = !isEditable;
        if (isEditable) {
            editButton.textContent = 'Edit';
            editButton.classList.remove('red-button'); 
        } else {
            editButton.textContent = 'Save';
            editButton.classList.add('red-button');
        }
    });
});
document.getElementById('logoutButton').addEventListener('click', function() {
    window.location = 'logout.php';
});