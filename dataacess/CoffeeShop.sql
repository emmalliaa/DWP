DROP DATABASE IF EXISTS CoffeeShopDB;
CREATE DATABASE CoffeeShopDB;
USE CoffeeShopDB;


CREATE TABLE Customer(
    CustomerID int AUTO_INCREMENT PRIMARY KEY,
    FirstName varchar(50) NOT NULL,
    LastName varchar(50) NOT NULL,
    Password varchar(50) NOT NULL,
    Phone varchar (15) NOT NULL, 
    Email varchar (50) NOT NULL UNIQUE
);

CREATE TABLE `Order`(
    OrderID int AUTO_INCREMENT PRIMARY KEY,
    OrderNumber varchar(50) NOT NULL,
    DateTimeofOrder DATETIME,
    CustomerID int NOT NULL,
    FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID)
);

CREATE TABLE  Product(
    ProductID int AUTO_INCREMENT PRIMARY KEY,
    ProductName varchar(50),
    ProductPrice dec,
    Description text, 
    ImageURL varchar(255)
);


CREATE TABLE OrderOf(
        OrderID int NOT NULL,
        ProductID int NOT NULL,
        TotalPrice dec(8,2), 
        Quantity varchar (50),
        CONSTRAINT PK_OrderOf PRIMARY KEY(OrderID, ProductID),
        FOREIGN KEY (OrderID) REFERENCES `Order` (OrderID),
        FOREIGN KEY (ProductID) REFERENCES Product(ProductID)
);

CREATE TABLE ShoppingCart(
    CartID int AUTO_INCREMENT PRIMARY KEY,
    CustomerID int,
    ProductID int,
    Quantity int,
    PriceTotal dec(8,2),
    FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID),
    FOREIGN KEY (ProductID) REFERENCES Product(ProductID)

);


 CREATE TABLE Admin(
    AdminID int AUTO_INCREMENT PRIMARY KEY,
    AdminUsername varchar(50) NOT NULL,
    AdminPass varchar(50) NOT NULL
 );

CREATE TABLE Limited (
    OfferID INT AUTO_INCREMENT PRIMARY KEY,
    ProductID INT NOT NULL,
    StartDate DATE NOT NULL,
    EndDate DATE NOT NULL,
    FOREIGN KEY (ProductID) REFERENCES Product(ProductID)
);





