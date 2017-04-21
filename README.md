# ![alt text](https://github.com/ruifengT/etes/raw/master/images/tix.png "Ticket Logo") Electronic Ticket Exchange Service
ETES (Electronic Ticket Exchange Service) is a ticket exchanging website similar to competitors StubHub and TicketMaster. This website allows for users to buy and sell their tickets in conjunction with major ticket sellers, such as the venues near San Jose and events they host. The website allows users to sell their tickets straight from their account. Tickets sold by users will be verified by ETES. Within one hour, ticket sold by a third-party seller on ETES will either be delivered by a person, or by mail.  For this project, we will provide real data in a fully functional website.

## User Guide
ETES is used locally. This section will teach you how to install the required local host to test the project. There are several links throughout the README.md, we suggest you click them and follow along to this guide.

### Requirements
- Windows, iOS, or Linux Operating System
- Browsers: Google Chrome, Mozilla Firefox, Safari, Internet Explorer
- [XAMPP](https://www.apachefriends.org/download.html) Downloaded
	-  Download XAMPP 7.1.1 / PHP 7.1.1
- Downloaded GitHub files
	- Click Clone or Download, and download as a ZIP. Unzip it inside your XAMPP folder in htdocs (C:\xampp\htdocs\).

### XAMPP
Run the executable file. Continue to Set Up Wizard. Make sure all components are selected. Select an appropriate installation folder, typically C:\xampp. Complete installation.
Open XAMPP. Start running Apache and MySQL. Open any browser and type in https://localhost. If XAMPP was installed properly, you will be redirected to https://localhost/dashboard.
Make sure you've unzipped the GitHub files in your XAMPP folder in htdocs (C:\xampp\htdocs\). Now you can see the website at https://localhost/etes-master/.

### Install MySQL Database
Now, we can install the preset database. Go to http://localhost/phpmyadmin/. Click on Databases and create a database with the name ticket_exchange. It should automatically redirect you to your new database. Click Import. Click Choose File and navigate to where you downloaded ETES. Under the folder PHP, you should see a ticket_exchange.sql file. Open it and scroll down to Go. This will give you a starter database to test.

## How to Use
Listed in this section is what to test and try after downloading XAMPP. 

### Home Page
Featured on our home page is a snazzy gradient with a navigation bar (will be referred to as navbar for ease), simple ticket picture, a search bar, two buttons, and copyright information.
Let's start with the navigation bar. Through JavaScript, this feature can actually see if you're logged in, and changes if you are logged in. What do you see now? Home page, Sign In, Buy Tickets, and Contact Us. Try changing your URL to http://localhost/etes/index.html?user_id=abc123. Sign In has now changed to [Dashboard](https://github.com/ruifengT/ETES#dashboard)! (Click to read more about the dashboard.) 
For now, let's return to the home page. Sign In and Register link to the same page, sign_up/signup.html. Contact Us allows you to reach us via email, real-time. The search bar in the middle is fully functional. Would you like to search for a ticket? Try searching for "Oracle Arena" and see what pops up!
### Buy Tickets
You're now at the Buy Tickets page. 
#### Search for Tickets
Your search query should show "Cavaliers vs. Warriors", "Golden State Warriors v. Portland Round 1", and "Golden State Warriors Home Game D". Try searching for anything your heart desires. Upcoming is listing your own tickets.

Click Buy Tickets on the navbar. This will refresh the page and show you all the listings you can purchase. What's that? You want to purchase a ticket? Well, we won't stop you! Confirm the quantity of tickets you want and click the red Checkout button. 

#### Checkout
Thank you for your business!
Listed on the checkout page is the item, quantity, and price. Shipping is a flat fee of $10, combined with a service fee of 5% (of your ticket), and we do not charge sales tax. Your total is calculated from these three things. Now, enter in your details. Don't be shy, try entering a real address. Submit your details.
#### Order
On this page, your data is sent and confirmed. Listed under it is the ticket ETA. Based on Google Maps API, it calculates the origin of the ticket and how long it'll take to get to you. Next is Check out with PayPal. We won't get into this today.
Okay, enough of the ticket buying. Let's get to the databases.
### Sign In
Upon clicking Sign In, there are two options. You can sign in with a username and password, or sign up, creating a new account. If you've checked out your PHPAdmin page and seen the database, you know there are existing logins. Go ahead and log in using one of those, and scroll down to Dashboard. If you're not XAMPP savvy, we can continue with the sign up process.
#### Sign Up
Let's make a new account. Enter in your sign-in credentials. This form will notify you if you leave it empty, the email will know if you miss your @ sign, and through PHP, it confirms your passwords are matching. Currently, for testing purposes, passwords do not need to be long. Upon completion, you'll be redirected to the Dashboard!

#### Dashboard*
(*) This feature requires being logged in.
[For those who want to try a pre-set database login, use 
Username: abc123 
Password: pa$$word
and you'll see pre-set information on the dashboard.]
Oh my, where do we even start? Upon first sight, you'll see the navbar has a new option: Sell Tickets. We'll get to that next. The dashboard shows you your User ID, Email, Name, Phone, Address, Credit Card Number, and the date your account was created. Following this is "My Tickets" and "My Orders" which, as you may have guessed, are tickets that you've listed and orders you've purchased (see [Buy Tickets](https://github.com/ruifengT/ETES#buy-tickets)). How about we try listing a ticket? Click on Sell Tickets in the navbar.
#### Sell Tickets*
(*) This feature requires being logged in.
A simple, straightforward page. At the top is a search bar for tickets, if you want to see if a ticket you want to post is already up, followed by six fields to fill out. The first one, User ID, is filled out for you using Javascript. Go ahead and put in anything you want for the ticket name, details, quantity (requires an integer number), price (takes doubles, if you wish to try this), and an address. Upon completion, you'll be given an alert and be redirected back to your dashboard where your new ticket will appear. Try checking Buy Tickets and see your new ticket!
### Contact Us
Unfortunately, we're nearing the end of this README.md. You have tested all the features this project has - except one: Contact Us. Very simple, it features three fields for you to fill out: Name, Email, and Message. At the end, a security code has been added to ensure no one spams us (yeah, we're looking at you, right there). Go ahead and send us feedback about our project! 
Thank you so much for taking the time to look at it.

Yours Truly,
Group 5
[Christine Pham • Nanthana Thanonklin • Nicholas Tang • Jameson Thai • Ruifeng Tian]
SP17 CS 160, sec 04 w/ Frank Butt
# Electronic Ticket Exchange Service. **Fin.** ![alt text](https://github.com/ruifengT/etes/raw/master/images/tix.png "Ticket Logo") 