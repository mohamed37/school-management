# school-management
<<<<<<< HEAD
___Page Login___
 Selection log in to more user like (admin , teacher, parent and student).
 
 __page admin login__
 
 enter email and password which found in database.
 if all right,then redirect in dashboard.
 other else redirect back with error.
 
 __page dashboard__
 
=======
Web application than can manage an educational institution. In terms of students, it shows his tuition fees, his grades, attendance and the application also integrates with zoom API to allow for online lessons. For teachers, they can add exams and quizzes, student's attendance, zoom online lessons. Parents can monitor their children's grades and attendance. Admins can monitor and manage all the data and operations on the system.
I built the application from the ground up using PHP Laravel framework for the backend API and utilized AJAX to communicate with the database which is adminstred using MySQL, the frontend made with Bootstrap and Javascript.

selection log in as admin, teacher, parent or student.
![login](https://user-images.githubusercontent.com/36480502/167361645-decbe160-5c5f-4eda-b433-bdeb9e2cb188.png)
Enter the email and password registered with Database.
![admin login](https://user-images.githubusercontent.com/36480502/167361861-544c0aff-235c-4645-9508-18d829d38fea.png)
![dashboard admin](https://user-images.githubusercontent.com/36480502/167362126-5bd8196a-179f-480f-9bf9-a8b618857274.png)

History documented event by liveWire.
![calendar](https://user-images.githubusercontent.com/36480502/167362162-dbc37d45-7ea0-42dd-8a11-ddb878191a74.png)
![add new event](https://user-images.githubusercontent.com/36480502/167362225-81405d1c-0762-44bd-8d84-790764409e62.png)

create ,  edit , update and delete grades by model bootstrap 
![grades](https://user-images.githubusercontent.com/36480502/167362388-b74294d2-ab80-4312-822f-22a634843554.png)
![add new grade](https://user-images.githubusercontent.com/36480502/167362525-85167b7c-906e-494e-9bbe-34211b4a7c2a.png)
![edit grade](https://user-images.githubusercontent.com/36480502/167362527-d834eb0c-28f3-4786-b4f3-b25a0a07f405.png)

the same delete for classrooms and sections.
![delete grade](https://user-images.githubusercontent.com/36480502/167362523-d532cf93-e874-4646-a4a0-aa33d80bec65.png)

CRUD ClassRoom linked to grade by model Bootstrap. 
searching by grade for classroom by Ajax.
delete all select id's classroom.
![classroom](https://user-images.githubusercontent.com/36480502/167362757-dad157ed-6947-4831-a8bd-6cbbebe82be9.png)
![add new class](https://user-images.githubusercontent.com/36480502/167362748-ce7e9483-dd1f-4339-b3ac-4641ad0e4c84.png)
![edit class](https://user-images.githubusercontent.com/36480502/167362752-2b18f054-b8de-4c15-a87c-3f1bc938b1a1.png)
![delete all](https://user-images.githubusercontent.com/36480502/167362755-2807ad85-506a-4ba0-8175-1d70a0a13043.png)
![search with grade](https://user-images.githubusercontent.com/36480502/167362759-41e2fbb8-29cb-4b1e-8753-24c4674a5201.png)

CRUD Sections Linked to classroom.
![sections](https://user-images.githubusercontent.com/36480502/167365772-cfea971e-a47d-4d5b-a7dd-58f16ffffa02.png)
![add new section](https://user-images.githubusercontent.com/36480502/167365776-3e05e38f-c268-4c0f-bc8f-72d39aea36f2.png)
![edit  section](https://user-images.githubusercontent.com/36480502/167365807-1827d25b-aef9-4319-8146-a5b176a4efbd.png)

CRUD Parent by LiveWire
![parents](https://user-images.githubusercontent.com/36480502/167366129-5212de98-86b8-4b67-b6e8-5cc9e30796b9.png)
![add new parent](https://user-images.githubusercontent.com/36480502/167366134-e2bc7584-27d8-43c6-b6fb-3216d5c1acdf.png)
![add parent step2](https://user-images.githubusercontent.com/36480502/167366135-882d7270-1500-4172-b6f2-e59cef435664.png)
![add parent step3](https://user-images.githubusercontent.com/36480502/167366137-d65214ab-703e-49da-9056-0f9c5ed58eb3.png)
![edit parent](https://user-images.githubusercontent.com/36480502/167366139-7d784d34-7e99-4b86-954c-fe0a742d7a74.png)
![edit parent step2](https://user-images.githubusercontent.com/36480502/167366141-6d1b2bb9-25a0-4429-a110-18b4bfc6d89d.png)
![edit parent step3](https://user-images.githubusercontent.com/36480502/167366144-1e9895be-b4d0-42c2-9b2f-a3a734294d8e.png)

CRUD Teachers.
![teachers](https://user-images.githubusercontent.com/36480502/167366417-e712335a-d944-443a-b73c-4a16c62fb214.png)
![add new teacher](https://user-images.githubusercontent.com/36480502/167366412-60e7642c-61c7-428c-83f6-9763fd1ab97d.png)
![edit teacher](https://user-images.githubusercontent.com/36480502/167366409-905757f5-dbb6-4af3-8448-eaaaff82d783.png)

validation for all grade , classroom, sections , sudents and teachers.
![validation form teacher](https://user-images.githubusercontent.com/36480502/167366415-0dfb8f7c-07d9-4400-9e7e-37a089da4cfc.png)

CRUD Students 
![add new student](https://user-images.githubusercontent.com/36480502/167366805-dcbaa5af-bed9-4c72-84cb-5bcbe8119b7c.png)
![edit student](https://user-images.githubusercontent.com/36480502/167366813-6eb73342-6747-4d4f-a5a6-e927330c697d.png)
![details students](https://user-images.githubusercontent.com/36480502/167366810-00c14471-91ee-402e-8114-e39bd2973adc.png)
![attendances_students](https://user-images.githubusercontent.com/36480502/167369626-46e6bc37-1943-46d0-b9da-7ac4f49e8879.png)

proccesses 
add  feesInvoices for the student . create fees from admin .
The amount required from the student will be paid in whole or in part.
if the student leaves the school, the remainder will be taken.
![students](https://user-images.githubusercontent.com/36480502/167369370-9f4b0878-e73e-4e0b-bab7-05c43954a73f.png)

admin create fees that the student must pay.
![fees](https://user-images.githubusercontent.com/36480502/167371091-3ae1eef3-a161-4cb9-9700-812cf506deab.png)
![add new fees](https://user-images.githubusercontent.com/36480502/167371095-9d98f18b-be3b-43c8-a794-fc7f2f416595.png)
they students that paid fees.
![fees_invoice](https://user-images.githubusercontent.com/36480502/167371100-7aee3b08-0b4b-41e9-961e-d0d9f4769bf6.png)

The required amount is paid in part or in full.
![add receipt](https://user-images.githubusercontent.com/36480502/167403249-80579245-4b51-4460-b3a8-84858d12642c.png)
if that the remaining amount has been paid and it is greater than the required amount, an error appears
![error_receipt_student](https://user-images.githubusercontent.com/36480502/167403255-676e22a1-6b53-4a02-8ff4-875aca3c17cb.png)

if the student leaves the school , take the remining amount.
![proccessingFees](https://user-images.githubusercontent.com/36480502/167404764-46b0e244-bf7d-4a33-a6cc-885310432abf.png)

 Students' absence and attendance are recorded daily by selecting the department
![attendances](https://user-images.githubusercontent.com/36480502/167405275-d9aa1e0c-e452-4630-936a-497940d49ee9.png)
![add attendances](https://user-images.githubusercontent.com/36480502/167405271-0871ace6-9bc7-4681-9d59-28d66bc3f20c.png)

CRUD Subjects  
![subjects](https://user-images.githubusercontent.com/36480502/167405710-8e056369-7e3c-412a-a86e-b1fb79ee5fa6.png)
create subject linked to grades , classesroom and teachers.
![add new subject](https://user-images.githubusercontent.com/36480502/167405712-73e87da1-e682-4ebc-b04d-8b7ba56dc576.png)

create exam linked to subjects.
![add new exam](https://user-images.githubusercontent.com/36480502/167405713-dc905679-68f4-4991-8f69-19aa4f081dbf.png)

create quizze linked to subjects , teachers , grades , classesroom and sections.
![add new quizze](https://user-images.githubusercontent.com/36480502/167405715-9b72e05b-6c61-4273-8a37-473ea967a896.png)

create question linked to quizze.
![add new question](https://user-images.githubusercontent.com/36480502/167405716-ae96bf5f-80b0-4ab0-a60c-3938893b1e84.png)

integrates with zoom API to allow for online lessons.
![add new online_class](https://user-images.githubusercontent.com/36480502/167405717-ec987ac1-55a0-4b20-8b79-dbb442e64275.png)

![add new offline_class](https://user-images.githubusercontent.com/36480502/167405722-e78a5e54-1717-4d78-b726-1e4c82265ee8.png)
create library and download 
![add new library](https://user-images.githubusercontent.com/36480502/167405723-86e9da16-e6eb-46cd-b664-2e6379bdf577.png)
![libraries](https://user-images.githubusercontent.com/36480502/167405725-1f888110-8193-4824-99b5-04fb5258cb1d.png)

 can update in the same page.
 seeder in database
![settings](https://user-images.githubusercontent.com/36480502/167405728-3e50da21-21e6-45ff-a635-e09f028cdbd2.png)

>>>>>>> af361cf18749de58f35ad4985703f07f160532a2
