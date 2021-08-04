# PHP-Student Mangement System

Xây dựng website quản lý thông tin sinh viên, tài liệu của 1 lớp học có các chức năng như sau:
- Giáo viên có thể thêm, sửa, xóa các thông tin của sinh viên. Thông tin có các trường cơ bản gồm: tên đăng nhập, mật khẩu, họ tên, email, số điện thoại.
- Sinh viên được phép thay đổi các thông tin của mình trừ tên đăng nhập và họ tên.
- 1 người dùng bất kỳ đc phép xem danh sách các người dùng trên website và xem thông tin chi tiết của 1 người dùng khác. Tại trang xem thông tin chi tiết của 1 người dùng có mục để lại tin nhắn cho người dùng đó, có thể sửa/xóa tin nhắn đã gửi
- Chức năng giao bài, trả bài:
  - Giáo viên có thể upload file bài tập lên. Các sinh viên có thể xem danh sách bài tập và tải file bài tập về.
  - Sinh viên có thể upload bài làm tương ứng với bài tập được giao. Chỉ giáo viên mới nhìn thấy danh sách bài làm này.
- Tạo chức năng cho phép giáo viên tổ chức 1 trò chơi giải đố như sau:
  - Giáo viên tạo challenge, trong đó cần thực hiện: upload lên 1 file txt có nội dung là 1 bài thơ, văn,…, tên file được viết dưới định dạng không dấu và các từ cách nhau bởi 1 khoảng trắng. Sau đó nhập gợi ý về quyển sách và submit. (Đáp án chính là tên file mà giáo viên upload lên. Không lưu đáp án ra file, DB,…).
  - Sinh viên xem gợi ý và nhập đáp án. Khi sinh viên nhập đúng thì trả về nội dung bài thơ, văn,… lưu trong file đáp án.

## Setting up database

- Create table, database:
```sql
CREATE DATABASE smsdb;
USE smsdb;

CREATE TABLE user (
  id int auto_increment,
  username varchar(20) unique,
  password varchar(32),
  fullname varchar(50),
  email varchar(40),
  phone varchar(10),
  role varchar(7),
  primary key (id)
);

INSERT INTO user(username, password, fullname, email, phone, role) 
VALUES ('vutq13', '123@123a', 'Tran Quang Vu', 'vutq13@gmail.com', '0234156789', 'Student');

INSERT INTO user(username, password, fullname, email, phone, role) 
VALUES ('vinhvv', '123@123a', 'Vuong Van Vinh', 'vinhvv@gmail.com', '0123425289', 'Teacher');
```

- Create user:
```mysql
CREATE USER 'smsadmin'@'localhost' IDENTIFIED BY 'admin@SMS1';
GRANT ALL PRIVILEGES ON smsdb.* TO 'smsadmin'@'localhost';
FLUSH PRIVILEGES;
```

# Progress

## Hoàn thành

- Tạo CSDL người dùng
- Tạo file index, trang xem info và chức năng thêm người dùng (trong file xem thông tin userinfo.php)
- Chức năng xác thực người dùng, login
- Chức năng sửa, xóa người dùng
- Giáo viên upload bài tập --> sinh viên thấy danh sách bài tập
- Sinh viên upload bài làm

## Đang trong quá trình

Trò chơi giải đố

## Todo

- Nhắn cho người dùng real time
