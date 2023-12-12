CREATE TABLE Customers (
    CustomerID INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    Email VARCHAR(255),
    NomorTelepon VARCHAR(20),
    PasswordHash VARCHAR(255),
    Salt VARCHAR(255)
);

INSERT INTO Customers (FirstName, LastName, Email, NomorTelepon, PasswordHash, Salt) VALUES
('Budi', 'Santoso', 'budi@example.com', '08123456789', 'abc123', 'xyz'),
('Siti', 'Nurbaya', 'siti@example.com', '08123456790', 'def456', 'uvw'),
('Joko', 'Widodo', 'joko@example.com', '08123456791', 'ghi789', 'rst'),
('Ani', 'Susanti', 'ani@example.com', '08123456792', 'jkl012', 'opq'),
('Tono', 'Haryanto', 'tono@example.com', '08123456793', 'mno345', 'lmn'),
('Tina', 'Effendi', 'tina@example.com', '08123456794', 'pqr678', 'kji');

CREATE TABLE Menu (
    MenuID INT PRIMARY KEY AUTO_INCREMENT,
    NamaMenu VARCHAR(255),
    Harga INT,
    Deskripsi TEXT,
    Ketersediaan VARCHAR(3)
);

INSERT INTO Menu (NamaMenu, Harga, Deskripsi, Ketersediaan) VALUES
('Batagor', 15000, '', 'Ya'),
('Nasi Kuning', 20000, '', 'Ya'),
('Nasi Pecel', 18000, '', 'Ya'),
('Apple Juice', 10000, '', 'Ya'),
('Avocado Juice', 12000, '', 'Ya'),
('Coffee', 8000, '', 'Ya');

CREATE TABLE MetodePembayaran (
    MetodeID INT PRIMARY KEY AUTO_INCREMENT,
    NamaMetode VARCHAR(255)
);

INSERT INTO MetodePembayaran (NamaMetode) VALUES
('QRIS'),
('Debit');

CREATE TABLE Orders (
    OrderID INT PRIMARY KEY AUTO_INCREMENT,
    CustomerID INT,
    TanggalPemesanan DATE,
    TotalHarga INT,
    StatusPembayaran VARCHAR(255),
    MetodeID INT,
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID),
    FOREIGN KEY (MetodeID) REFERENCES MetodePembayaran(MetodeID)
);

INSERT INTO Orders (CustomerID, TanggalPemesanan, TotalHarga, StatusPembayaran, MetodeID) VALUES
(1, '2023-11-16', 45000, 'Sudah Dibayar', 1),
(2, '2023-11-16', 30000, 'Sudah Dibayar', 2),
(3, '2023-11-16', 28000, 'Belum Dibayar', 1),
(4, '2023-11-16', 20000, 'Sudah Dibayar', 2),
(5, '2023-11-16', 15000, 'Belum Dibayar', 1),
(6, '2023-11-16', 8000, 'Sudah Dibayar', 2);

CREATE TABLE OrderDetails (
    OrderDetailID INT PRIMARY KEY AUTO_INCREMENT,
    OrderID INT,
    MenuID INT,
    Jumlah INT,
    Catatan TEXT,
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
    FOREIGN KEY (MenuID) REFERENCES Menu(MenuID)
);

INSERT INTO OrderDetails (OrderID, MenuID, Jumlah, Catatan) VALUES
(1, 1, 2, ''),
(1, 4, 1, ''),
(2, 2, 1, ''),
(2, 5, 1, ''),
(3, 3, 1, ''),
(3, 6, 1, '');
