
# AirRoot Dev
|||
|--------------------------------------------------------------------|---|
|1. สร้าง Git เพื่อจัดการ source code ด้วย Git อะไรก็ได้ เช่น Github, Gitlab|	✅	|
|2. ออกแบบและพัฒนาเว็บ ไซด์ด้วย Laravel|	✅	|
|.....2.1. มีระบบ authentication|	✅|
|.....2.2. ผู้ที่สมัครสมาชิกสามารถ upload รูปได้|	✅|
|.........2.2.1. เก็บ รูปลง local storage|✅|
|.........2.2.2. เก็บข้อ มูลรูปลง database เช่น size, mime, date time create|✅|
|.........2.2.3. สามารถลบ เปลี่ยน รูปได้|✅|
|.....2.3. มีหน้าสำหรับแสดงรูปภาพทั้งหมด โดยเรียงแถวละ 1 รูปและแสดง mime, size, date time create แสดงขนาดรูปรวมอยู่ด้านบนสุดและแยกตาม mime รูป เช่น jpg, gif, png|✅	|
|.....2.4. เจ้า ของรูปที่ upload สามารถสร้าง catalog ของรูปภาพได้|✅	|
|.........2.4.1. เก็บ ข้อมูล catalog ใน database|✅|
|.........2.4.2. ใน 1 catalog มีรูปภาพได้ไม่จำกัด|✅|
|.........2.4.3. สามารถนํารูปภาพที่ upload มาเข้า catalog ได้|✅|
|.........2.4.4. สามารถเลือกรูปให้แสดงตามลาํ ดับได้|✅|
|.........2.4.5. สามารถ ลบ หรือเปลี่ยนชื่อ catalog ได้|✅|
|.....2.5. มีหน้าสำหรับแสดงรูปภาพใน catelog โดยเอาเฉพาะรูปภาพใน catelog นั้น ออกมาแสดง แสดง เฉพาะรูปใน 1 แถวมี 3 รูป แสดงขนาดรูปรวมอยู่ด้นนบนสุดและแยกค้นหาตาม mime รูป เช่น jpg, gif, png|	✅|
|.....2.6. ส่ง email บอกเม่ือ upload ขนาดรูปใกล้ ตม็ (90%) โดยกำหนดพื้นฐานคือ 100mb แก่สมาชิกที่ upload รูปขึ้นมา|✅	|

## Run Locally

Clone the project

```bash
  git clone https://link-to-project
```

Go to the project directory

```bash
  cd my-project
```

To run all of your outstanding migrations, execute the migrate Artisan command:
```bash
  php artisan migrate
```
Running Seeders
```bash
  php artisan db:seed
```

Install dependencies
```bash
  composer install
```
```bash
  npm install
```

Start the server

```bash
  npm run dev
```

```bash
  php artisan serve
```
## Screenshots

![App Screenshot](https://github.com/titanman1989/AirRoot-Dev-Test/blob/115ea2bf06066697da4df300b2920aab615e56a2/public/Screenshot%202565-07-31%20at%2003.34.18.png) ![App Screenshot](https://github.com/titanman1989/AirRoot-Dev-Test/blob/115ea2bf06066697da4df300b2920aab615e56a2/public/Screenshot%202565-07-31%20at%2003.34.42.png)

