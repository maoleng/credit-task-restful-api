# Credit Task RESTful API

## Requirement
Student who missed other submission to get improved marks (QT1) and Student want to achieve Distinction (>=8 in overall (\*) ) should complete this assignment. ( (\*) means: you will also get extra points (pts) to your final project)

### Given the following data tables
- Category(CategoryID, CategoryName, Description,..)
- Item(ItemID, ItemName, Size,....., CategoryID)
- Agent(AgenID, AgentName, Address)
- Order(OrderID, OrderDate, AgentID)
- OrderDetail(ID, OrderID, ItemID, Quantity, UnitAmount)

You are required to add last 4 digits of your studentID to each table, example student ID is 521H1234,
Tables should be Category1234, Item1234, Agent1234, Order1234, OrderDetail1234 ) then Insert 15- 30 rows data for each table, table Agent should have your student record.
1. Create a website by PHP (up to 6.5 pts)
2. Create a website by PHP with AJAX (up to 7.0 pts)
3. Create a website by PHP with MVC model and apply AJAX for searching (8.0 pts)
4. Create & test API for website as follows (up to 9.0 pts) :
- GET /categories
- GET /categories/{category}/products
- GET /categories/{category}/products/{pid}
- POST /categories/{category}/products
- DELETE /categories/{category}/products/{pid}

### Examples:
- GET /categories/Laptops/products // get all products of laptops
- POST /categories/phones/products // add a phone
- DELETE /categories/cameras/products/2 // delete camera 2

You should add a folder name API to contain your API php files (REST Server) and a folder name TestAPI to contain a php file to call API (REST Client).

5. High Distinction Task (up to 10 pts):
- Think about Payment (create a payment table and link to other part of your website, and simulate the payment with VNPay)
- Here you go: https://sandbox.vnpayment.vn/apis/vnpay-demo/
