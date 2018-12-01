## P3 Peer Review

+ Reviewer's name: Haogang Su
+ Reviwee's name: Satya Palvadi
+ URL to Reviewe's P3 Github Repo URL: *<https://github.com/satyapalvadi/p3>*


## 1. Interface
The site has only one page, which covers all the form details. The theme of the website is clearly stated as Calories Burner Estimator on the top of the page. There are not any features to test since the site has only one page. I suggest to add a about page or welcome page just make the site a little more sophiscated. 

## 2. Functional testing
Tried decimals for age, the estimator still gave out estimated result. I suggest to restrict age column to only integers. 


Tried negative numbers in all the inputs, the form gave out correct warnings that all number should be at least 0. 
Tried symbols, letters in all the inputs, the form gave out correct warnings. 
Tried URL http://p3.satyap.me/me, which returned correct 404 page. 
Tried submitting forms with empty fields, the form gave out correct warnings. 

## 3. Code: Routes

The web.php file has two routes, which works as expected. The controller consists all the processing details of the user input, which is correct. 

## 4. Code: Views
The author created a very detailed input modules for the form that every input column is created independently as a template stored in the modules folder. The author shows his understanding of the template inheritance from using these input templates. The form.blade.php appears to be very organized after using all the blade templates in moduels, but  most of the templates created are only used once. So I suggest to put the code that only used once into the form.blade.php, and compile the repetitive code into blade template. In this way, when constructing larger website, the files will be more orgainized.  

Also the welcome page is never used, you may delete it. 

## 5. Code: General

The code created a Person class that put calories calculation function along with all other variables in the app folder, which makes the controller php file compact. When I wrote my project, I put all the calculation process in the controller file. I can see that the author really understands the structure of Laravel well, and it is an excellent way to keep controller file in size. 

The code is also well commented and follows the class style. 



## 6. Misc
The code style is excellent, especially a Person class file has minimized the controller file volume. I suggest to add some additional explainations  to the page, which will give readers like me a better understanding between Harris-Benedict and MD Mifflin St Jeor equation.  In general, the project meets all the expectations of the assignment 3. Keep up with the work. 
