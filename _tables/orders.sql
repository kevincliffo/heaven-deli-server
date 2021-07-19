CREATE TABLE orders (
    OrderId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CustomerName varchar(50) NOT NULL,
    CustomerMobileNo varchar(50) NOT NULL,
    CustomerEmail varchar(50),
    Item varchar(255) NOT NULL,
    BaseFlavour varchar(255),
    Topping varchar(255),
    Theme varchar(255),
    SugarFree varchar(255) NOT NULL,
    TotalCost double(10,2) NOT NULL,
    OrderTime varchar(50) NOT NULL,
    OrderDate varchar(50) NOT NULL,
    CreatedDate datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;