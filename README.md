# TwitterStyle
An application in style of Twitter written in PHP using active records.

The application is to implement the following functionalities:

    Users: adding, modifying non-core information about oneself, deleting one's account. The user is to be identified by e-mail (cannot be repeated).
    Tweets: Each user can create an unlimited number of tweets. The maximum tweet length is 140 characters.

    Comments: Under each tweet, other users should be able to type comments. The maximum length of a comment is 60 characters.
    Messages: Each user can send a message to another user.


Pages to be included in the application:

Home page

Page displaying all Tweets that are in the system (from the newest to the oldest).
Above them, there should be a form to create a new tweet.


Login page

The website should accept the user's e-mail address and password.

    if they are correct, the user is redirected to the homepage,
    if not, to the login page, which should then display an error message about the login or password,
    the login page should also have a link to the user creation page.


User creation page

The page should download the email and password.

    If there is no such email address in the system (table in the database), we register the user and log in (redirection to the home page).
    If there is such an email address, we redirect to the user creation page (the same page) and display a message about the occupied email address.


User display page

The page is to show all the tweets of a given user ( additionally, under each number of comments to a given entry).

There will also be a button on this page, which will enable us to send messages to this user.

Tweet display page

This page should display:

    a tweet,
    an author of the post,
    all comments to each post,
    a form for creating a new comment for a tweet.


User edit page

The user is to be able to edit information about himself and change the password.
Remember that the user can only edit their information.


Page with messages

The user should be able to view a list of messages he has received and sent.

    Sent messages should display the recipient, the date of sending and the beginning of the message (first 30 characters).
    Received messages should display the sender, the date of sending and the beginning of the message (first 30 characters).

Messages, which are not read yet, should be somehow marked (e.g. bold text containing the sender).


Page of a single message

All information about the message:

    sender
    receiver
    tweet







