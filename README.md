# Delivery - Porter? KP? Kitchen?

### User Permissions
Uses spatie package: https://github.com/spatie/laravel-permission
Users: unverified, customer, restaurateur, driver, super-admin

### Database Schema

Users
----
Name | Username | Email | Number
-> Location
-> Orders
-> Reviews

Restaurant
----
Location | Name | Description | Minimum_order | Contact_Number | status | open | opening_times
-> Location
-> Dishes
-> Orders
-> Reviews

Dish
----
restaurant_id | name |description | price
-> restaurant
-> Tags

Tags
----
tag | description
-> dishes

Dish_Tags 
----
dish_id | tags_id

Order
----
restaurant_id | user_id | status (confirmed / declined / enroute / delivered)
-> dishes
-> delivery
-> restaurant
-> location
-> customer
	
Order_dish
----
order_id | dish_id

Delivery
----
order_id | driver_id | status
-> order
-> driver

Location
---
Address fields
line_1 | line_2 | line_3 | code | county | country | lat_long | meta
-> customer
-> restuarant 
-> delivery
-> driver

Reviews
----
rating | review | reply | customer_id | restaurant_id | order_id
-> customer
-> restuarant
-> order

Logic
User: Login -> Choose Restaurant -> Pick Dishes -> Confirm (make payment) 
If NO -> restaurant to sort this out with customer via call
If YES -> await delivery
Order is now in “confirmed” state

Restuarant : 
Be Logged in -> turn on orders -> Receive Order -> confirm/decline/maybe




	