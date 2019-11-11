INSERT INTO productCategory (productCategoryID, categoryName, categoryDescription)
VALUES (1000, 'Candles', 'The latest incense candles for relaxing the body and soul');
INSERT INTO productCategory (productCategoryID, categoryName, categoryDescription)
VALUES (1001, 'Soaps and Shampoos', 'A selection of our beautiful and luxurious soaps and shampoos');


INSERT INTO products (productID, productCategoryID, productName, productDescription, 
productImage, productPrice, productQuantity)
VALUES (1000, 1000, 'Blue Candle', 'A blue incense candle', '', 20, 5);
INSERT INTO products (productID, productCategoryID, productName, productDescription, 
productImage, productPrice, productQuantity)
VALUES (1001, 1000, 'Red Candle', 'A red incense candle', '', 21, 10);
INSERT INTO products (productID, productCategoryID, productName, productDescription, 
productImage, productPrice, productQuantity)
VALUES (1002, 1000, 'White incense candle', 'Relax with the smooth smell of creamy vanilla', '', 25, 30);
INSERT INTO products (productID, productCategoryID, productName, productDescription, 
productImage, productPrice, productQuantity)
VALUES (1003, 1001, 'Signature Soap', 'Body cafes signature soap cleans the body and the soul', '', 18, 24);
INSERT INTO products (productID, productCategoryID, productName, productDescription, 
productImage, productPrice, productQuantity)
VALUES (1004, 1001, 'Cleansing Package', 'A collection of soaps, shampoos and candles for the', '', 65, 12);