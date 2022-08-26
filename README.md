# PhpProject
A creative yet easy to use dating website designed and coded using PHP and PHPMyAdmin Database

Starting online dating has never been easier. Check out this amazing website by clicking on index.php

## Overview


### index.php

This is our homepage. User can search as per their preferences, that is by *gender, name, or maximum or minimum age*

Below the banner and search criteria you can see multiple photo cards. On modifying search criteria, you can observe these photo cards getting filtered. 

On the header, there is a navigation bar which is common on all pages. 
It has 3 options at the start - Home, login, hello <username>
If a user clicks on login available options are - 	Home, Hello <username>, logout


### login.php

This is where user is navigated to login to there account. Username and password are authenticated via database.

Here is a sample username password you can use - 
<br/>
*Premium account*
username : sam-burriss@gmail.com
password : 1234321

*Registered User*
username : aleksandr-minakov@gmail.com
password : 1234321

While hovering over the photo cards you will find name, gender and age of the person who is looking for a partner.

You will also notice a "connect" button on these photo cards.


If guest user clicks on this button -

they are redirected to login.php. User must register to connect with people from our dating site.

###### Designed and coded by Dhawal and Eby(creating UI, entities, database operations, etc. related to this page)
<br/><br/>

### SignUpUI.php

If user wants to register they can click on "create an account" link right at the bottom after Login button. User will be redicted to SignUpUI.php   

###### Designed and coded by Atul Jairam (creating UI, entities, database operations, etc. related to this page)
<br/><br/>


### view_profile.php

If registered/ premium user clicks on this button and logs in they will be redirected to view_profile.php
 
This page takes a url parmeter pid which stores id of the profile you would like to connect with.
  
+ button adds user to favorites
- button removes user from favorites

Message button opens a chat with that user 
Wink button sends wink from the backend and creates a record in our database in wink table

###### Designed and coded by Diksha (creating UI, entities, database operations, etc. related to this page)
<br/><br/>


### profilePage.php

To access profile page user needs to click on there name on the header. They will be redirected to profilePage.php

Profile shows all the information about the user (content included from profileDetails.php)

###### Coded by Purav and Diksha
<br/><br/>

Wink shows all the winks received by the current user.(content included from wink.php)

Messages shows all the messages received by current user.(content included from messages.php)


###### Coded by Purav
<br/><br/>

### Update Profile  (content included from update_profile.php)

User can upload a new profile image and edit basic details from this page. 

###### Coded by Diksha and Atul
 <br/><br/>


If logged in user is a premium user they can have a favorite list (My Favorites)
On click of My Favorites tab user can see people from their favorite list

###### Coded by Diksha and Atul
