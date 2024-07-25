CREATE SCHEMA AHS_DB;

CREATE TABLE AHS_DB.SHOP (
    sId INT NOT NULL,
    Sname VARCHAR(30) NOT NULL,
    Street VARCHAR(30), 
    City VARCHAR(30),
    StateAb CHAR(2), 
    ZipCode VARCHAR(15), 
    Sdate DATE, 
    Telno BIGINT, 
    URL VARCHAR(30),
    PRIMARY KEY (sId)
);

CREATE TABLE AHS_DB.DEALER (
    dId INT NOT NULL,
    Dname VARCHAR(30), 
    Street VARCHAR(30), 
    City VARCHAR(30), 
    StateAb CHAR(2),
    ZipCode VARCHAR(15),
    PRIMARY KEY (dId)
);

CREATE TABLE AHS_DB.DEALER_SHOP (
    dId INT NOT NULL,
    sId INT NOT NULL,
    PRIMARY KEY (dId, sId),
    FOREIGN KEY (dId) REFERENCES dealer(dId),
    FOREIGN KEY (sId) REFERENCES shop(sId)
);

CREATE TABLE ahs_db.CONTRACT (
    dId INT NOT NULL,
    ctId INT NOT NULL,
    Sdate DATE,
    Ctime TIME,
    Cname VARCHAR(30),
    PRIMARY KEY (dId, ctId),
    FOREIGN KEY (dId) REFERENCES dealer(dId)
);

CREATE TABLE AHS_DB.ITEM (
    iId INT AUTO_INCREMENT NOT NULL,
    Iname VARCHAR(30),
    Sprice INT,
    PRIMARY KEY (iId)
);

CREATE TABLE AHS_DB.DEALER_ITEM (
    dId INT NOT NULL, 
    iId INT NOT NULL,
    dprice INT,
    PRIMARY KEY (dId, iId),
    FOREIGN KEY (dId) REFERENCES DEALER(dId),
    FOREIGN KEY (iId) REFERENCES ITEM(iId)
);

CREATE TABLE AHS_DB.OLDPRICE (
    iId INT,
    Sprice INT, 
    Sdate DATE,
    Edate DATE,
    FOREIGN KEY (iId) REFERENCES ITEM(iId)
);

CREATE TABLE AHS_DB.ORDERS (
    oId INT,
    sId INT,
    cId INT,
    Odate DATE,
    Ddate DATE,
    Amount INT,
    PRIMARY KEY (oId, sId),
    FOREIGN KEY (sId) REFERENCES SHOP(sId)
);

CREATE TABLE AHS_DB.ORDER_ITEM (
    oId INT,
    sId INT,
    iId INT,
    Icount INT,
    PRIMARY KEY (oId, sId, iId),
    FOREIGN KEY (oId) REFERENCES orders(oId),
    FOREIGN KEY (sId) REFERENCES shop(sId),
    FOREIGN KEY (iId) REFERENCES item(iId)
);

CREATE TABLE AHS_DB.SHOP_ITEM (
    sId INT,
    iId INT,
    Scount INT,
    PRIMARY KEY (sId, iId),
    FOREIGN KEY (sId) REFERENCES shop(sId),
    FOREIGN KEY (iId) REFERENCES item(iId)
);

CREATE TABLE AHS_DB.CUSTOMER (
    cId INT NOT NULL,
    Cname VARCHAR(30), 
    Street VARCHAR(30), 
    City VARCHAR(30), 
    StateAb CHAR(2),
    ZipCode VARCHAR(15),
    PRIMARY KEY (cId)
);

CREATE TABLE AHS_DB.SHOP_CUSTOMER (
    sId INT NOT NULL,
    cId INT NOT NULL,
    PRIMARY KEY (sId, cId),
    FOREIGN KEY (sId) REFERENCES shop(sId),
    FOREIGN KEY (cId) REFERENCES customer(cId)
);

CREATE TABLE AHS_DB.EMPLOYEE (
    sId INT,
    SSN INT, 
    Ename VARCHAR(30),
    Street VARCHAR(30),
    City VARCHAR(15),
    StateAb CHAR(2), 
    ZipCode VARCHAR(15), 
    Etype CHAR,
    Bdate DATE,
    Sdate DATE,
    Edate DATE,
    Level VARCHAR(15),
    Asalary INT,
    Agency VARCHAR(30),
    Hsalary INT, 
    Institute VARCHAR(30),
    Itype VARCHAR(30),
    PRIMARY KEY (sId, SSN),
    FOREIGN KEY (sId) REFERENCES SHOP(sId)
);
