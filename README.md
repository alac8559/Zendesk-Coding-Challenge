# Zendesk Coding Challenge

For this coding challenge I used PHP. I downloaded PHP 8.0 (8.0.9) VS16 x64 Thread Safe and used cURL to achieve the requests for tickets and individual tickets.

## Installation

Install PHP from https://windows.php.net/download#php-8.0.

Install MAMP from https://www.mamp.info/en/windows/. This is used to host the server for the PHP files.

## Usage

Once you are connected to the MAMP server open the main PHP file (ticket_viewer.php) to navigate.

**Home Page:** You will have two options, View All Tickets and Individual Ticket Detail (you can always navigate back to this home page by clicking the top header 'ZENDESK TICKET VIEWER').

**View All Tickets:** In this section you will be able to view all your current tickets and basic information such as their 'Ticket ID', 'Subject', 'Description', and 'Status'. If there are more than 25 tickets you will have to navigate to the second page at the bottom.

**Individual Ticket Detail:** In this section you can put the ticket ID which you want to see more information of. If you put an invalid ticket ID you will get an error but if you put a valid ID you will get more information.
