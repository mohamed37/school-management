# school-management
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
![students](https://user-images.githubusercontent.com/36480502/167366809-214f2ae0-08f5-41d3-b361-0c90fa86f595.png)
![add new student](https://user-images.githubusercontent.com/36480502/167366805-dcbaa5af-bed9-4c72-84cb-5bcbe8119b7c.png)
![edit student](https://user-images.githubusercontent.com/36480502/167366813-6eb73342-6747-4d4f-a5a6-e927330c697d.png)

proccesses 
add  feesInvoices for the student . create fees from admin .
The amount required from the student will be paid in whole or in part.
if the student leaves the school, the remainder will be taken.
![details students](https://user-images.githubusercontent.com/36480502/167366810-00c14471-91ee-402e-8114-e39bd2973adc.png)

