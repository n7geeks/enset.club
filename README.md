# Website of ENSET Mohammedia Clubs

## Setup

- Install dependencies: `composer install`
- Create a new `.env` file from `.env.example` : `cp .env.example .env`
- Change the database credentials with you own in `.env` file
- Run migrations with seeds `php artisan migrate:fresh --seed`
- Launch the website `php artisan serve`

### Setup sub-domains multi-tenancy
#### For Windows/Apache
- Update your hosts file (`C:\Windows\System32\drivers\etc\hosts`) to translate the domains/sub-domains to localhost, example:
    ```
    127.0.0.1	n7geeks.ensetm.club
    ::1	n7geeks.ensetm.club
    
    127.0.0.1	admin.ensetm.club
    ::1	admin.ensetm.club
    
    127.0.0.1	ensetm.club
    ::1	ensetm.club
    ```
- Add virtual hosts for each sub-domain, virtual hosts file is located in `%APACHE_HOME%\conf\extra\httpd-vhosts.conf`. `%APACHE_HOME%` is where your Apache server is located. For WAMP users, `%APACHE_HOME%` may refer to this location: `C:\wamp64\bin\apache\apache<version>`
    - Example (change `c:/wamp64/www/n7geeks/enset.club` to match the path of your local repository):
        ```
        <VirtualHost *:80>
              ServerName admin.ensetm.club
              DocumentRoot "c:/wamp64/www/n7geeks/enset.club/public"
              <Directory  "c:/wamp64/www/n7geeks/enset.club/public/">
                      Options +Indexes +Includes +FollowSymLinks +MultiViews
                      AllowOverride All
                      Require local
              </Directory>
        </VirtualHost>
        
        <VirtualHost *:80>
              ServerName n7geeks.ensetm.club
              DocumentRoot "c:/wamp64/www/n7geeks/enset.club/public"
              <Directory  "c:/wamp64/www/n7geeks/enset.club/public/">
                      Options +Indexes +Includes +FollowSymLinks +MultiViews
                      AllowOverride All
                      Require local
              </Directory>
        </VirtualHost>
        
        <VirtualHost *:80>
        ServerName ensetm.club
        DocumentRoot "c:/wamp64/www/n7geeks/enset.club/public"
        <Directory  "c:/wamp64/www/n7geeks/enset.club/public/">
            Options +Indexes +Includes +FollowSymLinks +MultiViews
            AllowOverride All
            Require local
        </Directory>
        </VirtualHost>
        ```

**NB**: If you don't see the configuration for your case, please consider adding it here when you find the solution.

## To Contribute

- Fork this repository
- Create a new branch. ex: `Feature/YourNewFeature`  or `Fix/TheIssueName`
- Code :computer: 
- Create a PR to the master branch
- Welcome in :clap: 

Don't forget to put a :star: It means a lot to us, Thanks!
