# student-grades
## Machine Problem

Within computer programming, the acronym CRUD stands for create, read, update and delete. These are the four basic functions of persistent storage. Using the CRUD approach, create an application to manage students together with their grades in different subjects.

Pointers:
* Application must have a landing page for student’s log-inand a button below for accessing teachers log-in.
* Student after log-in will be direct to a page where he/she can see his/her latest semester grades in different subjects/teachers.
* Create a Static 4 semester.
* Teachers after log-in direct to a view where he/she can see all of his/her students. 
* Beside every student data must have an action button where the teacher can insert grades for the selected semester. 
* He/she can also update the grades already there or delete it.
* Also create in their specific log-in page a button for registration.
* All students that's register will be enlist to all registered teachers and for the new teacher that will be register in teacher’s log-in page registration.

Reminder: This is a basic CRUD, no need to create student section or year. Let say the all student that will register in your app is 1st Year Diamond. Only use PHP in this machine problem. You can use native/vanilla way or framework within this two preferred framework(laravel/codeigniter). Lastly, if you upload it to GIT make sure to make a step on how to make your app work after we pull it. Same for those who send it via .rar. Kindly focus on the back end not on the front end design.

## Installation
### Installing PHP using XAMPP
1. Go to [www.apachefriends.org/download.html](https://www.apachefriends.org/download.html)
2. Download the **8.1.x** version
3. Open the file and follow the installation wizard

### Running Apache Server in XAMPP
1. Open XAMPP Control Panel
2. Find the Apache row and click **Start** as shown in the image 
![Screenshot 2022-12-24 115858](https://user-images.githubusercontent.com/47745897/209420686-876305a2-d760-4014-b48b-0f7e947a1093.png)
3. Make sure Apache turned Green as same as shown in the image below
![Screenshot 2022-12-24 120401](https://user-images.githubusercontent.com/47745897/209420698-543759b9-228e-4a28-89aa-266e3f931041.png)

### Installing Composer
1. Go to [getcomposer.org/download/](https://getcomposer.org/download/)
2. Download the file and install

### Installing Node.js
1. Go to [nodejs.org/en/download/current/](https://nodejs.org/en/download/current/)
2. Download the file and install

### Downloading the Repository/Project
1. Go to [github.com/compranicles/student-grades](https://github.com/compranicles/student-grades)
2. Click the **<> Code** button and click **Download Zip**
3. Unzip the file and move it anywhere you like


### Installing Dependencies
1. Open the Terminal/PowerShell/Command Prompt in the `root` directory of the project/repository. You can do this by opening the `root` directory of the project and right-clicking on the empty area.
![Screenshot 2022-12-24 121614](https://user-images.githubusercontent.com/47745897/209420924-e03b2e4e-e0b1-411b-ae60-f4ded65a676c.png)
2. When the Terminal/PowerShell/Command Prompt is open, type and run the following command:
`composer install`
![Screenshot 2022-12-24 122419](https://user-images.githubusercontent.com/47745897/209421116-2d57c081-8032-4caf-a81f-afa9959e53e8.png)
3. And wait for the process to be completed.
![Screenshot 2022-12-24 122558](https://user-images.githubusercontent.com/47745897/209421401-39eab7b5-6ccb-4f25-8e40-e2d041fef146.png)

### Configuring ENV file
1. From the `root` directory, open the .env.example using Notepad or any similar text editor.
2. Find the following lines from the file:
`DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=`
3. Replace those lines with these lines:
`DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306`
4. Go to file **Save As** and save the file with **Filename** `.env` and **Save as type** `All types`
![Screenshot 2022-12-24 124742](https://user-images.githubusercontent.com/47745897/209421862-4383f9cf-a4aa-41ca-a437-66debc32474a.png)

### Installing and Running NPM
1. Open the Terminal/PowerShell/Command Prompt in the `root` directory of the project/repository. You can do this by opening the `root` directory of the project and right-clicking on the empty area.
2. When the Terminal/PowerShell/Command Prompt is open, type and run the following command:
`npm install && npm run dev`
3. **Do not close the terminal**

### Creating Database
This project uses sqlite as its database.
1. Open **Notepad**
2. Click **File** and **Save As**
3. Save it with a **File name** `database.sqlite` and **Save as type** `All types`, inside the `database` folder of the project
![image](https://user-images.githubusercontent.com/47745897/209422266-c111d459-6bc3-4f50-adad-9f8c4a806fb8.png)

### Migrating Database
1. Open the Terminal/PowerShell/Command Prompt in the `root` directory of the project/repository. You can do this by opening the `root` directory of the project and right-clicking on the empty area.
2. When the Terminal/PowerShell/Command Prompt is open, type and run the following command:
`php artisan migrate`

### Running the Project/Repository
1. Open the Terminal/PowerShell/Command Prompt in the `root` directory of the project/repository. You can do this by opening the `root` directory of the project and right-clicking on the empty area.
2. When the Terminal/PowerShell/Command Prompt is open, type and run the following command:
`php artisan serve`
3. Go to [http://127.0.0.1:8000](http://127.0.0.1:8000)

