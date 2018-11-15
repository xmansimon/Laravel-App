## P3 Peer Review

+ Reviewer's name: Chantal T
+ Reviwee's name: Haogang Su
+ URL to Reviewe's P3 Github Repo URL: *https://github.com/chantalthomas/dwa-p3*


## 1. Interface

The site has two tabs, and it is clean and use a special font, which looks good. The link on the home page does not work as expected. In later development, if the code owner intersted, she or he can add more tabs to enhance the contents of the site such as news, contact and etc. 


## 2. Functional testing

When I input 13 inch in the height box, the application still works. You may consider limiting the second height box from 0 to 12. The weight arguably can have decimals, but your form does not support decimal in the box, which you might consider improving. 
When I tried 404 page, I love the design and animation, it is a highlight of the site. 
In general, all the outcomes are expected and the forms work well. 


## 3. Code: Routes

The route file web.php has three routes, and I can see their functioning well in the site. The controller files cover all the routes, which is good.

## 4. Code: Views

The views implement blades template and I noticed that you created a 404 blade page, which is well done. All the views are in organized folders. The website has only two tabs, and all the views are using inheritance from the master class. I noticed that the value of the submit button is value='S U B M I T', maybe it is a typo, you may consider revising it to 'submit'. 
## 5. Code: General

Whne calculating the calories intake, you may consdier to shorten the code by creating a variable say x =$caloricIntake = ((10 * $this->toKilograms($weight)) + (6.25 * $this->toCentimeters($feet, $inches)) - (5 * $age) - 161). Then add multiplier to the variable, which can reduce the redundant code. 

$feet = $request->input('feet', null); The default can be get rid of since we will always get input from the form. You may only use $feet = $request->input('feet'). 

In general the code is consistent and concise. Nice work!

## 6. Misc
The website implements all the necessary techniques covered by the class, and it is flexible enough to expand in the future development. Keep up with the nice work!
