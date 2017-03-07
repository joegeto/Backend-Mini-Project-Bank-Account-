#Models
Accountmodel 
Transactionmodel

#Controllers
AccountController
TransactionController
#Request
It call the request:

AccountRequest
TransactionRequest

#Factory faker in database/factories

ModelFactory


 #To test unit code on test/feature AccountTest
 You will test either the whole code by unit code
 the following functions
 
 test_it_withdraws_from_an_account()
 test_it_deposits_to_an_account()
 test_it_fetches_account_balance()
 test_it_creates_an_account()
 
 #For out put i have the factory fake that will check the success of  the functions
 On the terminal run php artisan tinker  that you will have it configured with you ide on the 
 Appserviceprovider
   
 factory(App\Models\Transaction::class)->make()

That will show the out put