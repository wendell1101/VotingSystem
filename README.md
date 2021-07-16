# Computer Society - ONLINE VOTING SYSTEM 
** Polytechnic University of the Philippines


**Quick Features** (Main Branch)
* Authentication
* Exporting of data(CSV, EXCEL, PDF, Print)
* Search and Pagination of data
* Ajax search of candidates
* Administration Panel with dynamic dashboards and voting tallies
* User priveleges(Admin, voter)
* Communication Service (Messenger Plugin)

## Project setup
-   Git clone https://github.com/wendell1101/VotingSystem.git
-   Run `composer install` in the project root
-   Create a new MySQL database named `voting_system` (any db_name is fine)
-   Copy the `.env.example` file to a new file called `.env`
-   Fill out the corresponding database values in the `.env` file
-   Run `php artisan migrate` in the project root
-   (If prompted to generate key) run php artisan key:generate
-   Run php artisan serve
