# Delivery - Porter? KP? Kitchen?

### Database Schema

Users
----
Scope (Vendor, Driver, Buyer) | Name | Username | Email | Location | Number

Vendors
----
Location | Name | Description | Minimum_order | Contact Number

Dish
----
vendor_id | name |description | price

Dish_Tags 
----
dish_id | tags_id

Tags
----
tag | description

Order
----
vendor_id | user_id | status (confirmed / declined / enroute / delivered)
	
Order_dish
----
order_id | dish_id

Delivery
----
order_id | driver_id

Location
---
Address fields

Reviews
----
rating | review | reply | user_id | vendor_id | order_id

Logic
User: Login -> Choose Restaurant -> Pick Dishes -> Confirm (make payment) 
If NO -> restaurant to sort this out with customer via call
If YES -> await delivery
Order is now in “confirmed” state

Restuarant : 
Be Logged in -> turn on orders -> Receive Order -> confirm/decline/maybe




	