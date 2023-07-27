# DB eshop

show tables
    -> ;
 
| Tables_in_eshop |
|-----------------|
| datos           |
| productos       |
| usuarios        |
| ventas          |
 

describe datos;
 
| Field      | Type         | Null | Key | Default | Extra          |
|------------|--------------|------|-----|---------|----------------|
| ID_Datos   | int          | NO   | PRI | NULL    | auto_increment |
| ID_Usuario | int          | NO   |     | NULL    |                |
| Nombre     | varchar(255) | NO   |     | NULL    |                |
| APaterno   | varchar(255) | NO   |     | NULL    |                |
| Amaterno   | varchar(255) | YES  |     | NULL    |                |
| Direccion  | varchar(255) | NO   |     | NULL    |                |
| Telefono   | varchar(255) | YES  |     | NULL    |                |


describe productos;

| Field       | Type          | Null | Key | Default | Extra          |
|-------------|---------------|------|-----|---------|----------------|
| ID_Producto | int           | NO   | PRI | NULL    | auto_increment |
| Nombre      | varchar(255)  | NO   |     | NULL    |                |
| Cantidad    | int           | NO   |     | NULL    |                |
| Descripcion | varchar(255)  | YES  |     | NULL    |                |
| Costo       | decimal(65,2) | NO   |     | NULL    |                |
| Imagen      | longblob      | YES  |     | NULL    |                |


 describe usuarios;
 
| Field      | Type         | Null | Key | Default | Extra          |
|-------------|-------------|------|-----|---------|----------------|
| ID_Usuario | int          | NO   | PRI | NULL    | auto_increment |
| Nombre     | varchar(255) | NO   |     | NULL    |                |
| Correo     | varchar(255) | NO   |     | NULL    |                |
| Password   | varchar(255) | NO   |     | NULL    |                |

 describe ventas;
 
| Field       | Type          | Null | Key | Default | Extra          |
|-------------|---------------|------|-----|---------|----------------|
| ID_Ventas   | int           | NO   | PRI | NULL    | auto_increment |
| ID_Producto | int           | NO   |     | NULL    |                |
| ID_Usuario  | int           | NO   |     | NULL    |                |
| Cantidad    | int           | NO   |     | NULL    |                |
| Costo_total | decimal(65,2) | NO   |     | NULL    |                |
| Status      | int           | NO   |     | NULL    |                |
| Descripcion | varchar(255)  | YES  |     | NULL    |                |



INSERT INTO productos (Nombre, Cantidad, Descripcion,Costo)
    VALUES ('booster pack', 10,'Sobre de expansion MTG',99.00);
 
