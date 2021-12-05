step 01 : run command "composer install"
step 02 : config .env file
step 03 : run command "php migrate"
step 04 : run command "php db:seed"
step 05 : copy .env file to .env.testing file
step 06 : edit line DB_DATABASE= to testing database of .env file
step 07 : run command "php migrate"
step 08 : run command "php db:seed"
step 09 : revert line DB_DATABASE= to main database of .env file

-------- post man ------------
Example : 
1. Create a loan
   url       : http://aspire.local/api/loan
   Method    : POST
   parameter : 
                user_id  = 1
                amount = 10
                week = 1

2. Get a loan list
    url : http://aspire.local/api/loan/list
    Method : GET

3. Update or approve a loan
    url : http://aspire.local/api/loan/1
    
    3.1 Approver case :
        parameters :
            approver_id = 2

    3.2 Customer update a loan
        parameters :
            amount = 10
