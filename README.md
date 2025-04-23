#login 
1. Divisi SALES:
Email: sales@example.com
Password: sales

2. Divisi MANAGER:
Email: manager@example.com
Password: manager

#login postgresql
Username: postgres
Password: postgres



Saya mempunyai project website untuk PT. SMART dimana website saya berisi fitur login yang terbagi menjadi 2 role SALES dan MANAGER

Fitur untuk SALES:

1. Fitur calon customer (lead) dimana SALES bisa menambah calon customer, update, dan delete. 
Atribut: id, nama, email, telepon, layanan

2. Fitur layanan dimana SALES bisa menambah layanan, update dan delete. 
Atribut: id, nama, deskripsi, harga

3. Fitur customer dimana SALES bisa melihat list customernya. 
Atribut: id, nama, email, telepon, layanan, status

Fitur untuk MANAGER:

Selain dari 3 fitur diatas terdapat penambahan:

Fitur project dimana MANAGER  yang bisa approve atau reject  calon customer (lead)

Ketika MANAGER approve maka calon customer (lead) berubah menjadi customer dan database yang ada di lead akan terhapus dan masuk ke database customer

Ketika MANAGER reject maka calon customer (lead) akan hilang dari database calon customer (lead) dan juga tidak masuk ke database customer

Lalu juga, setiap kali manager approve atau reject maka data berupa id_project, nama, email, telepon, status akan tersimpan ke dalam database project (semacam history)